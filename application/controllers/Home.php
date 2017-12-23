<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public $module_view = 'site';
    public $action_view = '';
    public $view        = 'index';
    
    public function __construct()
    {
        parent::__construct();
        $this->action_view =  $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method();
        $this->view        =  $this->module_view.'/'.$this->view;
        $this->load->library(array('site/my_config'));
        $this->load->model(array('site/home_model','site/myconfig_model'));
        $this->load->helper(array('product_helper'));
    }
    public function index()
	{
        $data['title']       = $this->my_config->get_config('title');
        $data['keywords']    = $this->my_config->get_config('keywords');
        $data['description'] = $this->my_config->get_config('description');
        $data['view'] = $this->action_view;
        $this->load->view( $this->view, $data );   
	}
    
    
}
