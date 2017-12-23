<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myconfig_model extends CI_Model {
         public function __construct()
         {
            $this->load->database();
         }
         
         public function Db_get_position_menu($position)
         {
            $this->db->select('m.id,m.name,m.module,m.slug,m.hyperlink,p.level,p.menu_id');
            $this->db->from('menu as m');
            $this->db->join('position as p', 'p.menu_id = m.id');
            $this->db->where('position',$position);
            $this->db->order_by('p.lft','asc');
            $this->db->order_by('p.rgt','desc');
            $query = $this->db->get();
            return $query->result_array();
         }
         
         public function Db_get_menu($menu_id)
         {
            $curent_menu = $this->db->select('lft,rgt')->where('id',$menu_id)->get('menu')->row_array();
            $this->db->select('id,name,slug,parent');
            $this->db->from('menu');
            $this->db->where('lft <= ', $curent_menu['lft']);
            $this->db->where('rgt >= ', $curent_menu['rgt']);
            $this->db->order_by('lft','ASC');
            $this->db->order_by('rgt','DESC');
            $query = $this->db->get();
            return $query->result_array();
         }
         
         /** Lấy danh sách id con **/
         public function Db_list_children_id($page)
         {
            $this->db->select('id');
            $this->db->from('menu');
            $this->db->where('lft >= ',$page['lft']);
            $this->db->where('rgt <= ', $page['rgt']);
            $this->db->where('state',1);
            $query = $this->db->get();
            $data  = $query->result_array();
            $arrId = array();
            if( !empty($data) )
            {
                foreach($data as $val)
                {
                    $arrId[] = $val['id'];
                }
            }
            return $arrId;
         }

        public function Db_getSlide(){
            $result = $this->db->select('slide.*')
                                        ->from('slide')
                                        ->where('state',1)
                                        ->order_by('orders','asc')
                                        ->get()
                                        ->result_array();
            return $result;
        }
         
        
}         