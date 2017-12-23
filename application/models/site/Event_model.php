<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Event_model extends CI_Model

{
    public

    function __construct()
    {
        $this->load->database();
    }

    public

    function Db_list($arrId = array() , $limit, $offset)
    {
        $this->db->select('id,name,slug,parent,avatar');
        $this->db->where_in('parent', $arrId);
        $this->db->where('state', 1);
        $this->db->order_by('orders', 'DESC');
        $this->db->limit($limit,$offset);
        $query = $this->db->get('event');
        return $query->result_array();
    }

    public

    function Db_count_list($arrId = array())
    {
        $this->db->select('id,name,slug,parent,avatar');
        $this->db->where_in('parent', $arrId);
        $this->db->where('state', 1);
        $query = $this->db->get('event');
        return $query->result_array();
    }

    public

    function Db_list_relationship($id, $parent)
    {
        $this->db->select('id,parent,name,slug,avatar');
        $this->db->from('event');
        $this->db->where('parent', $parent);
        $this->db->where('id <> ', $id);
        $this->db->where('state', 1);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    }

    public

    function Db_get_Menu($menu_id)
    {
        $curent_menu = $this->db->select('lft,rgt')->where('id', $menu_id)->get('menu')->row_array();
        $this->db->select('id,name,slug,parent');
        $this->db->from('menu');
        $this->db->where('lft <= ', $curent_menu['lft']);
        $this->db->where('rgt >= ', $curent_menu['rgt']);
        $this->db->order_by('lft', 'ASC');
        $this->db->order_by('rgt', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public

    function Db_event_feature()
    {
        $this->db->select('id,parent,name,slug,avatar');
        $this->db->where('state', 1);
        $this->db->where('feature', 1);
        $query = $this->db->get('event');
        return $query->result_array();
    }
}