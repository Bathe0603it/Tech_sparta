<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sim_model extends CI_Model {
         public function __construct()
         {
            $this->load->database();
         }
         
         public function Db_mang($mang,$limit)
         {
            $this->db->select('sim,sim1,giaban,mang,loai');
            $this->db->from('sim');
            $this->db->where('mang',$mang);
            if( isset($_GET['so']) )
            $this->db->where('length(sim)',(int)$_GET['so']);
            if( isset($_GET['dauso']) )
            $this->db->like('sim',(int)$_GET['dauso'],'after');
            if( isset($_GET['loai']) )
            $this->db->where('loai',(int)$_GET['loai']);
            $gia = isset($_GET['gia']) ? (int)$_GET['gia'] : 0;
            if( $gia >0 && $gia < 10 )
            {
                $gia = gia_number($gia);
                $this->db->where('giaban >=',$gia['min']);
                $this->db->where('giaban <=',$gia['max']);
            }
            if( isset($_GET['orders']) && ($_GET['orders'] =='asc' || $_GET['orders'] =='desc' ) )
            $this->db->order_by('giaban',$_GET['orders']);
            $offset =  isset( $_GET['page'] ) ?  ( (int)$_GET['page'] - 1 ) * $limit : 0;
            $this->db->limit($limit,$offset);
            $query = $this->db->get();
            return $query->result_array();
         }
         
         public function Db_loai($loai,$key,$limit)
         {
            $this->db->select('sim,sim1,giaban,mang,loai');
            $this->db->from('sim');
            $this->db->where('loai',$loai);
            if( $key != null )
                $this->db->like('sim',$key,'before');
            if( isset($_GET['so']) )
                $this->db->where('length(sim)',(int)$_GET['so']);
            if( isset($_GET['dauso']) )
                $this->db->like('sim',(int)$_GET['dauso'],'after');
            $gia = isset($_GET['gia']) ? (int)$_GET['gia'] : 0;
            if( $gia >0 && $gia < 10 )
            {
                $gia = gia_number($gia);
                $this->db->where('giaban >=',$gia['min']);
                $this->db->where('giaban <=',$gia['max']);
            }
            if( isset($_GET['orders']) && ($_GET['orders'] =='asc' || $_GET['orders'] =='desc' ) )
                $this->db->order_by('giaban',$_GET['orders']);
            $offset =  isset( $_GET['page'] ) ?  ( (int)$_GET['page'] - 1 ) * $limit : 0;
            $this->db->limit($limit,$offset);
            $query = $this->db->get();
            return $query->result_array();
         }
         
         public function Db_mang_loai($mang,$loai,$key,$limit)
         {
            $this->db->select('sim,sim1,giaban,mang,loai');
            $this->db->from('sim');
            $this->db->where('mang',$mang);
            $this->db->where('loai',$loai);
            if( $key != null )
                $this->db->like('sim',$key,'before');
            if( isset($_GET['so']) )
            $this->db->where('length(sim)',(int)$_GET['so']);
            if( isset($_GET['dauso']) )
            $this->db->like('sim',(int)$_GET['dauso'],'after');
            $gia = isset($_GET['gia']) ? (int)$_GET['gia'] : 0;
            if( $gia >0 && $gia < 10 )
            {
                $gia = gia_number($gia);
                $this->db->where('giaban >=',$gia['min']);
                $this->db->where('giaban <=',$gia['max']);
            }
            if( isset($_GET['orders']) && ($_GET['orders'] =='asc' || $_GET['orders'] =='desc' ) )
            $this->db->order_by('giaban',$_GET['orders']);
            $offset =  isset( $_GET['page'] ) ?  ( (int)$_GET['page'] - 1 ) * $limit : 0;
            $this->db->limit($limit,$offset);
            $query = $this->db->get();
            return $query->result_array();
         }
         
         public function Db_dauso($dauso,$limit)
         {
            $this->db->select('sim,sim1,giaban,mang,loai');
            $this->db->from('sim');
            $this->db->like('sim',(int)$dauso,'after');
            if( isset($_GET['so']) )
            $this->db->where('length(sim)',(int)$_GET['so']);
            if( isset($_GET['loai']) )
            $this->db->where('loai',(int)$_GET['loai']);
            $gia = isset($_GET['gia']) ? (int)$_GET['gia'] : 0;
            if( $gia >0 && $gia < 10 )
            {
                $gia = gia_number($gia);
                $this->db->where('giaban >=',$gia['min']);
                $this->db->where('giaban <=',$gia['max']);
            }
            if( isset($_GET['orders']) && ($_GET['orders'] =='asc' || $_GET['orders'] =='desc' ) )
            $this->db->order_by('giaban',$_GET['orders']);
            $offset =  isset( $_GET['page'] ) ?  ( (int)$_GET['page'] - 1 ) * $limit : 0;
            $this->db->limit($limit,$offset);
            $query = $this->db->get();
            return $query->result_array();
         }
         
         public function Db_gia($gia,$limit)
         {
            $this->db->select('sim,sim1,giaban,mang,loai');
            $this->db->from('sim');
            $this->db->where('giaban >= ',$gia['min']);
            $this->db->where('giaban <= ',$gia['max']);
            if( isset($_GET['so']) )
            $this->db->where('length(sim)',(int)$_GET['so']);
            if( isset($_GET['loai']) )
            $this->db->where('loai',(int)$_GET['loai']);
            if( isset($_GET['orders']) && ($_GET['orders'] =='asc' || $_GET['orders'] =='desc' ) )
            $this->db->order_by('giaban',$_GET['orders']);
            $offset =  isset( $_GET['page'] ) ?  ( (int)$_GET['page'] - 1 ) * $limit : 0;
            $this->db->limit($limit,$offset);
            $query = $this->db->get();
            return $query->result_array();
         }
         
         public function Db_namsinh($limit)
         {
            $this->db->select('sim,sim1,giaban,mang,loai');
            $this->db->from('sim');
            $this->db->like('sim','_9','before');
            if( isset($_GET['so']) )
            $this->db->where('length(sim)',(int)$_GET['so']);
            if( isset($_GET['loai']) )
            $this->db->where('loai',(int)$_GET['loai']);
            $gia = isset($_GET['gia']) ? (int)$_GET['gia'] : 0;
            if( $gia >0 && $gia < 10 )
            {
                $gia = gia_number($gia);
                $this->db->where('giaban >=',$gia['min']);
                $this->db->where('giaban <=',$gia['max']);
            }
            if( isset($_GET['orders']) && ($_GET['orders'] =='asc' || $_GET['orders'] =='desc' ) )
            $this->db->order_by('giaban',$_GET['orders']);
            $offset =  isset( $_GET['page'] ) ?  ( (int)$_GET['page'] - 1 ) * $limit : 0;
            $this->db->limit($limit,$offset);
            $query = $this->db->get();
            return $query->result_array();
         }
         
         public function Db_namsinh_nam($namsinh,$limit)
         {
            $this->db->select('sim,sim1,giaban,mang,loai');
            $this->db->from('sim');
            $this->db->like('sim',(int)$namsinh,'before');
            if( isset($_GET['so']) )
            $this->db->where('length(sim)',(int)$_GET['so']);
            if( isset($_GET['loai']) )
            $this->db->where('loai',(int)$_GET['loai']);
            $gia = isset($_GET['gia']) ? (int)$_GET['gia'] : 0;
            if( $gia >0 && $gia < 10 )
            {
                $gia = gia_number($gia);
                $this->db->where('giaban >=',$gia['min']);
                $this->db->where('giaban <=',$gia['max']);
            }
            if( isset($_GET['orders']) && ($_GET['orders'] =='asc' || $_GET['orders'] =='desc' ) )
            $this->db->order_by('giaban',$_GET['orders']);
            $offset =  isset( $_GET['page'] ) ?  ( (int)$_GET['page'] - 1 ) * $limit : 0;
            $this->db->limit($limit,$offset);
            $query = $this->db->get();
            return $query->result_array();
         }
         
}