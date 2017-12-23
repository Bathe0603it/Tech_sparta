<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Event extends CI_Controller
{
    public $limit = 20;
    public $module_view = 'admin';
    public $action_view = '';
    public $view = 'index';

    public function __construct()
    {
        parent::__construct();
        $this->action_view = $this->module_view . '/' . $this->router->fetch_class() . '/' . $this->router->fetch_method();
        $this->view = $this->module_view . '/' . $this->view;
        $this->load->helper(array(
            'string',
            'my'
        ));
        $this->load->library(array(
            'admin/admin_auth',
            'admin/admin_pagination',
            'form_validation'
        ));
        $this->load->model(array(
            'admin/event_model',
            'admin/tags_model'
        ));
        $this->admin_auth->check_login();
    }

    public function index()
    {
        $this->admin_auth->check_access($this->action_view);
        $get = $this->input->get();
        if (!isset($get['page'])) $get['page'] = 1;
        if (!isset($get['key'])) $get['key'] = null;
        if (!isset($get['category'])) $get['category'] = null;
        if (!isset($get['order'])) $get['order'] = 'desc';
        $total_recod = $this->event_model->Db_count_index($get);
        $list = $this->event_model->Db_get_index($get, $this->limit);
        $this->admin_pagination->set_url($get);
        $this->admin_pagination->set_total_row($total_recod);
        $this->admin_pagination->set_page_row($this->limit);
        $this->admin_pagination->set_current_page($get['page']);
        $data['pagination'] = $this->admin_pagination->created();
        $data['list'] = $list;
        $data['get'] = $get;
        $data['success'] = $this->session->flashdata('success');
        $data['error'] = $this->session->flashdata('error');
        $data['total_recod'] = $total_recod;
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }

    public function add()
    {
        $this->admin_auth->check_access($this->action_view);
        $get = $this->input->get();
        if (!isset($get['id'])) {
            $insert['state'] = 0;
            $insert['created_date'] = time();
            $insert['created_by'] = $this->admin_auth->get_colum('id');
            $this->event_model->db->insert('event', $insert);
            $id = $this->event_model->db->select_max('id')->get('event')->row('id');
            redirect(base_url('admin/event/add?id=' . $id));
        }

        if ($_POST) {
            if ($this->form_validation->run('add_event') == true) {
                $post = $this->input->post();
                $update['name'] = $post['name'];
                $this->load->library('admin/admin_validateslug');
                $slug = $this->admin_validateslug->validation($update['name']);
                $check_slug = $this->event_model->db->where('slug', $slug)->get('event')->row_array();
                if (!empty($check_slug)) {
                    $slug = $slug.= '-' . $get['id'];
                }

                $update['slug'] = $slug;
                $update['parent'] = $post['parent'];
                $update['summary'] = $post['summary'];
                $avatar = explode('/', $post['avatar']);
                $update['avatar'] = array_pop($avatar);
                $update['content'] = $post['content'];
                $update['title'] = $post['title'] != '' ? $post['title'] : $post['name'];
                $update['keywords'] = $post['keywords'];
                $update['description'] = $post['description'];
                $update['state'] = $post['state'];
                $update['feature'] = $post['feature'];
                $update['follow'] = $post['follow'];
                $this->event_model->db->where('id', $get['id'])->update('event', $update);
                $success = '<div class="success"><p>Lưu thành công!</p></div>';
                $this->session->set_flashdata('success', $success);
                if ($get['ac'] == 'save') {
                    redirect(base_url('admin/event/edit?id=' . $get['id']));
                }
                else {
                    redirect(base_url('admin/event/index'));
                }
            }
            else {
                $data['error'] = '<div class="error">' . validation_errors() . '</div>';
            }
        }

        $action_view_image = base_url() . 'media/images/event/' . $get['id'] . '/';
        $this->session->set_userdata('action_view_image', $action_view_image);
        $data['item'] = $this->event_model->Db_get_edit($get);
        if (empty($data['item'])) show_404();
        $data['category'] = $this->event_model->Db_list_menu();
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }

    public function edit()
    {
        $this->admin_auth->check_access($this->action_view);
        $get = $this->input->get();
        if ($_POST) {
            if ($this->form_validation->run('edit_event') == true) {
                $post = $this->input->post();
                $update['name'] = $post['name'];
                $slug = $post['slug'];
                if ($slug == null) {
                    $this->load->library('admin/admin_validateslug');
                    $slug = $this->admin_validateslug->validation($update['name']);
                    $check_slug = $this->event_model->db->where('slug', $slug)->get('event')->row_array();
                    if (!empty($check_slug)) {
                        $slug = $slug.= '-' . $get['id'];
                    }
                }

                $update['slug'] = $slug;
                $update['parent'] = $post['parent'];
                $update['summary'] = $post['summary'];
                $update['content'] = $post['content'];
                $avatar = explode('/', $post['avatar']);
                $update['avatar'] = array_pop($avatar);
                $update['title'] = $post['title'] != '' ? $post['title'] : $post['name'];
                $update['keywords'] = $post['keywords'];
                $update['description'] = $post['description'];
                $update['state'] = $post['state'];
                $update['feature'] = $post['feature'];
                $update['follow'] = $post['follow'];
                $this->event_model->db->where('id', $get['id'])->update('event', $update);
                $success = '<div class="success"><p>Lưu thành công!</p></div>';
                if ($get['ac'] == 'save') {
                    $data['success'] = $success;
                }
                else {
                    $this->session->set_flashdata('success', $success);
                    $page = isset($get['page']) ? (int)$get['page'] : 1;
                    redirect(base_url('admin/event/index?page=' . $page));
                }
            }
            else {
                $data['error'] = '<div class="error">' . validation_errors() . '</div>';
            }
        }

        $data['item'] = $this->event_model->Db_get_edit($get);
        if (empty($data['item'])) show_404();
        if ($data['item']['created_by'] != $this->admin_auth->get_colum('id') && $this->admin_auth->get_colum('manage') != 1 && $this->admin_auth->get_colum('email') != $this->admin_auth->get_root_email()) {
            $this->session->set_flashdata('error', '<div class="error"><p>Bạn không thể thay đổi bản ghi của người khác.</p></div>');
            redirect('admin/event/index');
        }

        $action_view_image = base_url() . 'media/images/event/' . $get['id'] . '/';
        $this->session->set_userdata('action_view_image', $action_view_image);
        $data['category'] = $this->event_model->Db_list_menu();
        $data['listTag'] = $this->tags_model->Db_get_listTags($data['item']['id'], 'event');
        $data['success'] = $this->session->flashdata('success');
        $data['view'] = $this->action_view;
        $this->load->view($this->view, $data);
    }

    public function delete()
    {
        $this->admin_auth->check_access($this->action_view);
        if ($_POST && !empty($_POST['cid'])) {
            $this->load->helper('file');
            $cid = $this->input->post('cid');
            $page = $this->input->post('page');
            $error = false;
            foreach($cid as $val) {
                $created_by = $this->event_model->db->where('id', $val)->get('event')->row('created_by');
                if ($created_by == $this->admin_auth->get_colum('id') || $this->admin_auth->get_colum('manage') == 1 || $this->admin_auth->get_colum('email') == $this->admin_auth->get_root_email()) {
                    $this->event_model->db->where('id', $val)->delete('event');
                    $dir = MEDIAPATH . 'images/event/' . $val;
                    if (is_dir($dir)) {
                        delete_files($dir, true);
                        rmdir($dir);
                    }
                }
                else {
                    $error = true;
                }
            }

            if ($error) $this->session->set_flashdata('error', '<div class="error"><p>Bạn không thể thay đổi bản ghi của người khác.</p></div>');
            else $this->session->set_flashdata('success', '<div class="success"><p>Xóa thành công!</p></div>');
            redirect(base_url('admin/event/index'));
        }
    }

    /** Callback check slug **/
    public

    function check_slug($str)
    {
        $this->load->library('admin/admin_validateslug');
        $id = $this->input->post('id');
        $slug = $this->admin_validateslug->validation($this->input->post('slug'));
        $check = $this->event_model->db->where('slug', $slug)->get('event')->row_array();
        if (!empty($check) && $check['id'] != $id) return false;
        else return true;
    }

    /** AJAX ADD CATEGORY **/
    public

    function ajax_add_category()
    {
        if ($_POST) {
            $this->load->library('admin/admin_validateslug');
            $parent = $this->input->post('parent');
            $category = $this->input->post('category');
            $slug = $this->admin_validateslug->validation($category);
            $count = $this->event_model->db->where('slug', $slug)->count_all_results('url');
            if ($count > 0) {
                $arr['state'] = 'error';
                $arr['message'] = 'Url nÃ y Ä‘Ã£ tá»“n táº¡i.';
            }
            else {
                $arr['state'] = 'true';
                $arr['message'] = '<option value="" selected="">' . $category . '</option>';
            }

            $this->output->set_content_type('application/json')->set_output(json_encode($arr));
        }
    }
}