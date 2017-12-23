<?php
class Sim extends CI_Controller{
    public $module_view = 'site';
    public $action_view = '';
    public $view        = 'index';
    public $limit       = 100;
    public function __construct()
    {
        parent::__construct();
        $this->action_view =  $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method();
        $this->view        =  $this->module_view.'/'.$this->view;
        $this->load->library(array('site/my_config'));
        $this->load->helper(array('site_helper'));
        $this->load->model('site/sim_model');
    }
    
    public function mang($mang)
    {
        $data['list']        = $this->sim_model->Db_mang($mang,$this->limit);
        $data['mang']        = $mang;
        $data['title']       = '';
        $data['keywords']    = '';
        $data['description'] = '';
        $data['view'] = $this->action_view;
        $this->load->view( $this->view, $data ); 
    }
    public function loai($loai,$key=null)
    {
        $data['list']        = $this->sim_model->Db_loai($loai,$key,$this->limit);
        $data['loai']        = $loai;
        $data['title']       = '';
        $data['keywords']    = '';
        $data['description'] = '';
        $data['view'] = $this->action_view;
        $this->load->view( $this->view, $data ); 
    }
    
    public function mang_loai($mang,$loai,$key=null)
    {
        $data['list']        = $this->sim_model->Db_mang_loai($mang,$loai,$key,$this->limit);
        $data['mang']        = $mang;
        $data['loai']        = $loai;
        $data['title']       = '';
        $data['keywords']    = '';
        $data['description'] = '';
        $data['view'] = $this->action_view;
        $this->load->view( $this->view, $data ); 
    }
    
    public function dauso($dauso)
    {
        $data['list']        = $this->sim_model->Db_dauso($dauso,$this->limit);
        $data['mang']        = dauso($dauso);
        $data['dauso']       = $dauso;
        $data['title']       = '';
        $data['keywords']    = '';
        $data['description'] = '';
        $data['view'] = $this->action_view;
        $this->load->view( $this->view, $data ); 
    }
    
    public function gia($gia)
    {
        $mang_gia            = gia_number($gia);
        $data['list']        = $this->sim_model->Db_gia($mang_gia,$this->limit);
        $data['gia']         = $gia;
        $data['title']       = '';
        $data['keywords']    = '';
        $data['description'] = '';
        $data['view'] = $this->action_view;
        $this->load->view( $this->view, $data ); 
    }
    
    public function namsinh( $namsinh = null )
    {
       $data['list']        = $this->sim_model->Db_namsinh($this->limit);
       echo "<Pre>";
       print_r($data['list']);
       echo"</pre>";
    }
    
    public function namsinh_nam( $namsinh = null )
    {
        $data['list']        = $this->sim_model->Db_namsinh_nam($namsinh,$this->limit);
        $data['namsinh']     = $namsinh;
        $data['title']       = '';
        $data['keywords']    = '';
        $data['description'] = '';
        $data['view'] = $this->action_view;
        $this->load->view( $this->view, $data ); 
    }

    public function city(){
        $data['title']       = '';
        $data['keywords']    = '';
        $data['description'] = '';
        $data['view'] = $this->action_view;
        $this->load->view( $this->view, $data ); 
    }
    
    

}    