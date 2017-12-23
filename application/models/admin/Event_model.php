<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Event_model extends CI_Model

{
    protected $table = 'event';
    public

    function __construct()
    {
        $this->load->database();
    }

    public

    function Db_count_index($get)
    {
        if (isset($get['key']) && $get['key'] != null) $this->db->like('name', $get['key']);
        if ($get['category'] != null) $this->db->where('parent', $get['category']);
        return $this->db->count_all_results('event as a');
    }

    public

    function Db_get_index($get, $limit)
    {
        $offset = ((int)$get['page'] - 1) * $limit;
        $this->db->select('a.id, a.parent, a.name, a.created_date, a.state, u.fullname as created_by,a.orders, m.name as chuyenmuc');
        $this->db->from('event as a');
        $this->db->join('menu as m', 'm.id = a.parent', 'left');
        $this->db->join('user as u', 'u.id = a.created_by');
        if ($get['key'] != null) $this->db->like('a.name', $get['key']);
        if ($get['category'] != null) $this->db->where('a.parent', $get['category']);
        $this->db->order_by('a.created_date', $get['order']);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }

    public

    function Db_get_edit($get)
    {
        $event_id = isset($get['id']) ? $get['id'] : 0;
        $this->db->select('a.*');
        $this->db->from('event as a');
        $this->db->where('a.id', $event_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public

    function Db_list_menu()
    {
        $this->db->select('name,id,level');
        $this->db->from('menu');
        $this->db->where('module', 'event');
        $this->db->order_by('lft', 'ASC');
        $this->db->order_by('rgt', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
}