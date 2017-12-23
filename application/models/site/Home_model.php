<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
         public function __construct()
         {
            $this->load->database();
         }
         
         public function Db_box_home($position)
         {
            $this->db->select('m.id, m.name, m.slug, p.lft, p.rgt');
            $this->db->from('menu as m');
            $this->db->join('position as p','p.menu_id = m.id');
            $this->db->where('p.position',$position);
            $this->db->where('p.level',0);
            $this->db->order_by('p.lft','ASC');
            $this->db->order_by('p.rgt','DESC');
            $query = $this->db->get();
            $data  = $query->result_array();
            if( !empty( $data ) )
            {
                foreach( $data as $key => $val )
                {
                    $submenu = $this->Db_get_submenu( $val['lft'], $val['rgt'], $position );
                    $data[ $key ]['submenu'] = $submenu['submenu'];
                    $submenu['listId'][] = $val['id'];
                    if( !empty( $submenu['listId'] ) )
                    $data[ $key ]['product'] = $this->db->select('id,parent,name,slug,avatar,giaban,giakhuyenmai, hidden_price,code')->where_in('parent',$submenu['listId'])->order_by('id','DESC')->limit(8)->get('product')->result_array();
                }
            }
            return $data;
         }
         
         public function Db_Product_Tag()
         {
            $this->db->select('name,slug');
            $this->db->from('tags');
            $this->db->where('table','product');
            $query = $this->db->get();
            return $query->result_array();
         }
         
         public function Db_get_submenu($lft, $rgt, $position )
         {
            $this->db->select('m.id, m.name, m.slug');
            $this->db->from('menu as m');
            $this->db->join('position as p', 'p.menu_id = m.id');
            $this->db->where('p.lft > ', $lft);
            $this->db->where('p.rgt < ', $rgt);
            $this->db->where('p.position',$position);
            $query = $this->db->get();
            $data  = $query->result_array();
            $return['submenu'] = $data;
            $return['listId'] = array();
            if( !empty( $data ) )
            {
                foreach( $data as $val )
                {
                    $return['listId'][] = $val['id'];
                }
            }
            return $return;
         }
}         