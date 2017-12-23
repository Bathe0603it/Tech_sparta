<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class My_config extends CI_Controller {
         public $message = '';
         public $set_social = array();
         public function __construct(){
             $this->CI =& get_instance();
             $this->CI->load->model( array('site/myconfig_model') );
         }
         
         public function get_config($colum=null)
         {
            $config = $this->CI->db->select('name,value')->get('config')->result_array();
            $mang = array();
            foreach( $config as $key => $val )
            {
                $mang[$val['name']] = $val['value'];
            }
            return $mang[$colum];
         }
         public function get_top_menu()
         {
            $data = $this->CI->myconfig_model->Db_get_position_menu('top');
            $html='';
            if( !empty( $data ) )
            {
                $html.='<ul class="rmv_list">';
                $html.='<li class="pushy-link"><a href="'.base_url().'" title=""><span class="glyphicon glyphicon-home"></span> </a></li>';
                $liLast = false;
                foreach( $data as $key => $val )
                {
                   $url = $val['module'] == 'hyperlink' ? $val['hyperlink'] : base_url($val['slug'].'.html');
                   if( $val['level'] == 0 )
                   {
                      if( isset($data[$key-1]) && $data[$key-1]['level'] > 0 )
                       $html.='</ul></li>';
                      if( isset($data[$key+1]) && $data[$key+1]['level'] > 0 )
                      $html.='<li class="pushy-submenu"><a href="'.$url.'">'.$val['name'].'</a> <ul>';
                      else
                        $html.='<li class="pushy-link"><a href="'.$url.'">'.$val['name'].'</a></li>';
                   }
                   else
                   {
                    $html.='<li class="pushy-link"><a href="'.$url.'">'.$val['name'].'</a></li>';
                   }
                }
                $html.='</ul>';
            }
            return $html;
         }
         
         public function set_social( $url = null, $title = null, $description = null, $images = null, $type='website' )
         {
            $set_social['url']         = $url;
            $set_social['title']       = $title;
            $set_social['description'] = $description;
            $set_social['images']      = $images;
            $set_social['type']        = $type;
            return $this->set_social   = $set_social;
         }
         
         public function get_social()
         {
            if( !empty( $this->set_social ) )
            {
                $html = '';
                $html.='<meta property="og:url" content="'.$this->set_social['url'].'" />'."\n";
                $html.='<meta property="og:type" content="'.$this->set_social['type'].'" />'."\n";
                $html.='<meta property="og:title" content="'.$this->set_social['title'].'" />'."\n";
                $html.='<meta property="og:description" content="'.$this->set_social['description'].'" />'."\n";
                $html.='<meta property="og:image" content="'.$this->set_social['images'].'" />'."\n";
                echo $html;
            }
            
         }
         
         public function get_canonical()
         {
            echo  current_url();
         }
         
         
         
}         