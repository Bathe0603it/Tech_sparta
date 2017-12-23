<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemaps_model extends CI_Model {
         public function __construct()
         {
            $this->load->database();
         }
         
         public function Db_count_index( $get )
         {         if( $get['key'] != null )
                   {
                      $this->db->like('loc',$get['key']);
                   }    
                   return $this->db->count_all_results('sitemaps');        
            
         }
         
         public function Db_get_index( $get, $limit )
         { 
                      $offset = ( (int)$get['page'] - 1 ) * $limit;
                      $this->db->select('sm.*');
                      $this->db->from('sitemaps as sm');
                      if($get['key'] != null )
                      {
                        $this->db->like('sm.loc',$get['key']); 
                      }
                      $this->db->order_by( 'sm.orders', $get['order'] );
                      $this->db->limit($limit, $offset); 
                      $query = $this->db->get(); 
                      return $query->result_array();
         }
         
         public function Db_addsitemaps( $url, $current_url = null )
         {
            if( $current_url != null )
            $this->db->where('loc',$current_url)->update('sitemaps',array('loc'=>$url));
            else
            $this->db->insert('sitemaps',array('loc'=>$url,'lastmod'=>date("c",time()),'changefreq'=>'hourly','priority'=>0.8));
         }
         
         public function Db_created_sitemaps()
         {
            $this->db->select('loc,lastmod,changefreq,priority');
            $query = $this->db->get('sitemaps');
            return $query->result_array();
         }
}         