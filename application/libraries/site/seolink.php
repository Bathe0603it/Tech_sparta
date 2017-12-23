<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Seolink {
         public $message = '';
         public $title = '';
         public $keywords = '';
         public $description = '';
         public $text ='';
         public $text1 ='';
         public function __construct( ){
                                 $this->CI =& get_instance();
                                 $this->CI->load->library('site/my_config');
                                 $this->CI->load->database();
         }
                    
         public function set_seolink( $link = null, $param = array() ){
            
                                 if( $link == null )
                                 {
                                     $curent_url =  current_url();
                                     $domain     =  base_url();
                                     $link       = str_replace( $domain, '', $curent_url );
                                     $link       = str_replace( '/trang/'.$page, '', $link );
                                     $link       = str_replace( '.html', '', $link );
                                 }
                                 $seolink = $this->CI->db->where( 'link', $link )->get('seolink')->row_array();
                                 
                                 if( !empty( $seolink ) ){
                                        $this->title       = $seolink['title'];
                                        $this->keywords    = $seolink['keywords'];
                                        $this->description = $seolink['description'];
                                        $this->text        = $seolink['text'];
                                        $this->text1        = $seolink['text1'];
                                        if( !empty($param) )
                                         {
                                            foreach( $param as $key => $val )
                                            {
                                                $this->title       = str_replace('$'.$key,$val,$this->title);
                                                $this->keywords    = str_replace('$'.$key,$val,$this->keywords);
                                                $this->description = str_replace('$'.$key,$val,$this->description);
                                                $this->text        = str_replace('$'.$key,$val,$this->text);
                                                $this->text1       = str_replace('$'.$key,$val,$this->text1);
                                            }
                                         }
                                }else{
                                        //$config             = $this->CI->my_config->get_config('title');
                                        $this->title        = $this->CI->my_config->get_config('title');
                                        $this->keywords     = $this->CI->my_config->get_config('keywords');
                                        $this->description  = $this->CI->my_config->get_config('description');
                                }
         }  
         public function get_title(){
                            return $this->title;
         }
         
         public function get_keywords(){
                            return $this->keywords;
         }
         
         public function get_description(){
                            return $this->description;
         }
         
         public function get_text(){
                            return $this->text; 
         }
         public function get_text1(){
                            return $this->text1; 
         }
         
         
}         