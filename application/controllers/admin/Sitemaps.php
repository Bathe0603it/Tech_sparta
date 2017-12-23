<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sitemaps extends CI_Controller {
        public $limit = 20;
        public $module_view = 'admin';
        public $action_view = '';
        public $view        = 'index';
        public function __construct(){
                             parent::__construct();
                             $this->action_view =  $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method();
                             $this->view        =  $this->module_view.'/'.$this->view;
                             $this->load->helper( array('string','my') );
                             $this->load->library( array('admin/admin_auth','admin/admin_pagination','admin/admin_sitemaps', 'form_validation') );
                             $this->load->model( array('admin/sitemaps_model') );
                             $this->admin_auth->check_login();
        }
        
        public function index()
        {
              $this->admin_auth->check_access($this->action_view);
              $get          = $this->input->get();
              if( !isset( $get['page'] ) )      $get['page'] = 1;
              if( !isset( $get['key'] ) )       $get['key'] = null;
              if( !isset( $get['order'] ) )     $get['order'] = 'desc';
              $total_recod  = $this->sitemaps_model->Db_count_index($get);
              $list         = $this->sitemaps_model->Db_get_index( $get, $this->limit );
              $this->admin_pagination->set_url($get);
              $this->admin_pagination->set_total_row($total_recod);
              $this->admin_pagination->set_page_row($this->limit);
              $this->admin_pagination->set_current_page($get['page']);
              $data['pagination'] = $this->admin_pagination->created();
              $data['list'] = $list;
              $data['get']  = $get;
              $data['success'] = $this->session->flashdata('success');
              $data['total_recod'] = $total_recod;
              $data['view'] = $this->action_view;
              $this->load->view( $this->view, $data );  
        }
        
        public function created_sitemaps()
        {
                            $sitemaps   = $this->sitemaps_model->Db_created_sitemaps();
                            foreach ( $sitemaps AS $val )
                            {
                                $val['loc'] = base_url($val['loc'].'.html');
                                $this->admin_sitemaps->add_item($val);
                            }
                            $file_name = $this->admin_sitemaps->build("sitemap.xml", false);
        }
        
        
        
        
        
        
        

}        