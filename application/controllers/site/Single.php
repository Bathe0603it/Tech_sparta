<?php
class Single extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->action_view =  $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method();
        $this->view        =  $this->module_view.'/'.$this->view;
        $this->load->library(array('site/my_config'));
        $this->load->model(array('site/single_model'));
        $this->load->helper(array('site_helper'));
    }
    
    public function page( $slug ){
        echo __METHOD__;
        exit();
        $category            = $this->article_model->db->where( 'id', $id )->get( 'menu' )->row_array();
        $data['category']    = $category;
        $data['title']       = $category['title'];
        $data['keywords']    = $category['keywords'];
        $data['description'] = $category['description'];
        $data['arr_menu']   = $this->myconfig_model->Db_get_menu();
        $menu               = $this->article_model->Db_get_Menu($category['id']);
        $data['breadcrumb'] = breadcrumb($menu);
        $data['link'] = createdlink($menu);
        $data['view'] = $this->action_view;
        $this->load->view( $this->view, $data ); 
    }
}