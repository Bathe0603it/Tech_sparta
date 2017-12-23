<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    class Lib_functions
    {
        public $message = '';
        public $menu_child = null;
        public $set_value_form = null;
        public $id_parent_root = '';
        
        public function __construct()
        {
            $this->CI = &get_instance();
            $this->CI->load->database();
        }
        
        public function get_all_menu($type = 'article'){
            $list_category  = $this->CI->db->select()
                                                ->from('menu')
                                                ->where('module',$type)
                                                ->where('state',1)
                                                ->get()
                                                ->result_array();
            return $list_category;
        }

        public function get_parent_category($type = 'article'){
            $result = $this->get_all_menu($type);
            
        }
        
        /**
         * ham de quy danh muc
         * 
         * */
        public function get_parent_to_array($input,$id_parent = 0,$char = 0){
            foreach ($input as $key => $item)
            {
                // Nếu là chuyên mục con thì hiển thị
                if ($item['parent'] == $id_parent)
                {
                    $this->menu_child[$id_parent][$item['id']]   = $item['name'];
                    // Xóa chuyên mục đã lặp
                    unset($input[$key]);
                    
                    // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                    $this->get_parent_to_array($input, $item['id'], $char.'|---');
                }
            }
            return $this->menu_child;
        }
        
        /**
         * 
         * get parent input : array -> text
         * have <table></table>
         * 
         * */
        public function get_parent_to_table_tr_td($input,$id_parent = 0,$heading = ''){
            $menu_tmp = array();
            $this->menu_child .= '';
            foreach ($input as $key => $item)
            {
                if ($item['parent'] == $id_parent)
                {
                    $menu_tmp[] = $item;
                    unset($input[$key]);
                }
            }
            if ($menu_tmp)
            {
                
                foreach ($menu_tmp as $item)
                {
                    $this->menu_child .= '<tr class="">';
                    $this->menu_child .= '<td class="">';
                    $this->menu_child .= '<a href="' . base_url($item['slug'].'.html').
                        '">'.$heading.'' . $item['name'].' - '.$item['id'] .
                        '</a>';
                    $this->menu_child .= '</td>';
                    $this->menu_child .= '</tr>';
                    $this->get_parent_to_table_tr_td($input, $item['id'],$heading.'|--');
                    
                }
                
            }
            return $this->menu_child;
        }
        
        /**
         * 
         * get select option input array -> text
         * have <select>
         * 
         * */
        public function get_parent_to_select_option($input,$id_parent = 0,$heading = ''){
            $menu_tmp = array();
            $this->menu_child .= '';
            foreach ($input as $key => $item)
            {
                if ($item['parent'] == $id_parent)
                {
                    $menu_tmp[] = $item;
                    unset($input[$key]);
                }
            }
            if ($menu_tmp)
            {
                
                foreach ($menu_tmp as $item)
                {
                    $this->menu_child .= '<option value="'.$item['id'].'">';
                    $this->menu_child .= ''.$heading.$item['name'].'';
                    $this->menu_child .= '</option>';
                    $this->get_parent_to_select_option($input, $item['id'],$heading.'|--');
                    
                }
                
            }
            return $this->menu_child;
        }
        
        /**
         * 
         * get checkbox input array -> text
         * have <ul>
         * 
         * */
        public function get_parent_to_checkbox($input,$id_parent = 0,$heading = ''){
            $menu_tmp = array();
            $this->menu_child .= '';
            foreach ($input as $key => $item)
            {
                if ($item['parent'] == $id_parent)
                {
                    $menu_tmp[] = $item;
                    unset($input[$key]);
                }
            }
            if ($menu_tmp)
            {
                
                foreach ($menu_tmp as $item)
                {
                    $checked    = null;
                    if(!empty($this->set_value_form)){
                        $checked    = in_array($item['id'],$this->set_value_form)?'checked=""':'';
                    }
                    $this->menu_child .= '<li>';
                    $this->menu_child .= '<label><input type="checkbox" '.$checked.' name="menu_id[]" value="'.$item['id'].'">'.$heading.$item['name'].'</label>';
                    $this->menu_child .= '</li>';
                    $this->get_parent_to_checkbox($input, $item['id'],$heading.'|--');
                    
                }
                
            }
            return $this->menu_child;
        }

        public function get_link_position($position = 'top'){
            $position   = empty($position)?'top':$position;
            $data = $this->CI->myconfig_model->Db_get_position_menu($position);
            $this->link_position    = null;
            foreach ($data as $key => $value) {
                if($value['level'] == 0){
                    $this->link_position[$value['id']]['info']    = $value;
                    $this->id_parent_root   = $value['id'];
                }
                if($value['level'] == 1){
                    $this->link_position[$value['parent']][$value['id']]['info']    = $value;
                }
                if($value['level'] == 2){
                    $this->link_position[$this->id_parent_root][$value['parent']][$value['id']]['info']    = $value;
                }
            }
            return $this->link_position;
        }
        
        public function get_parent_link($id_parent = null){
            $result = $this->CI->db->select('article.*')
                        ->from('article')
                        ->where(array('article.state'=>1,'article.parent'=>$id_parent))
                        ->get()
                        ->result_array();
            return $result;
        }
        
        public function getSlide(){
            return $this->CI->myconfig_model->Db_getSlide();
        }

        public function get_parent_to_ul_li($input,$id_parent = 0,$heading = ''){
            $menu_tmp = array();
            $this->menu_child .= '';
            foreach ($input as $key => $item)
            {
                if ($item['parent'] == $id_parent)
                {
                    $menu_tmp[] = $item;
                    unset($input[$key]);
                }
            }
            if ($menu_tmp)
            {
                foreach ($menu_tmp as $item)
                {
                    $this->menu_child .= '<li class="">';
                    $this->menu_child .= '<a href="' . base_url($item['slug'].'.html').
                        '">' .$heading.$item['name'];
                    $this->menu_child   .= '<div class="pull-right">
                                            <span class="fa fa-chevron-right"></span>
                                        </div>'.'</a>';
                    $this->get_parent_to_ul_li($input, $item['id'],$heading.'|--');
                    $this->menu_child .= '</li>';
                }
            }
            return $this->menu_child;
        }
        
        
    }
