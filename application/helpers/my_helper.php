<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ( ! function_exists('dequy'))
{
    // Đệ quy danh mục
    function dequy( $mang, $parent_id = 0, &$result ){
                if( !empty($mang) )
                {  
                  foreach ($mang as $key => $val)
                    {
                        if ($val['parent'] == $parent_id)
                        {
                            $result[] = $val;
                            unset($mang[$key]);
                            dequy($mang, $val['id'], $result);
                        }
                    }
               }     
   }
}   
   // Tạo Selecbox
if ( ! function_exists('selectbox')){   
   function selectbox( $mang, $config = array() )
   {
     $select_name    = isset( $config['name'] )  ? $config['name']   : '';
     $class          = isset( $config['class'] ) ? $config['class']  : '';
     $id             = isset( $config['id'] )    ? $config['id']     : '';
     $selected       = isset( $config['selected'] ) ? $config['selected'] : '';
     $curent_id      = isset( $config['curent_id'] ) ? $config['curent_id'] : '';
     $extend         = isset( $config['extend'] )    ? $config['extend']     : '';
     $level          = isset( $config['level'] )  ? $config['level']   : 0;
     $select_default = isset( $config['select_default'] ) ? $config['select_default'] : 'Là chuyên mục gốc';
     $html = '<select name="'.$select_name.'" class="'.$class.'" id="'.$id.'" '.$extend.' ><option value="0">'.$select_default.'</option>';
     if( !empty( $mang ) )
     {
        foreach( $mang as $val )
        {
           $char = '';
           for( $i=1; $i<= $val['level']; $i++ )
           {
              $char.='--';
           }
           $slt  = $val['id'] == $selected ? 'selected=""' : '';
           $dsb  = $val['id'] == $curent_id || $val['level'] > $level ? 'disabled=""' : '';
           $html.= '<option value="'.$val['id'].'" '.$slt.' '.$dsb.'>'.$char.' '.$val['name'].'</option>';
        }
     } 
     $html.= '</select>';
     return $html;
   }
}   
   // Tạo sắp xếp menu
   
if ( ! function_exists('sort_menu')){   
   function sort_menu( $mang, $config = array() )
   {
         $select_name    = isset( $config['name'] )  ? $config['name']   : '';
         $class          = isset( $config['class'] ) ? $config['class']  : '';
         $id             = isset( $config['id'] )    ? $config['id']     : '';
         $curent_id      = isset( $config['curent_id'] ) ? $config['curent_id'] : 0;
         $extend         = isset( $config['extend'] )    ? $config['extend']     : '';
         $select_default = isset( $config['select_default'] ) ? $config['select_default'] : 'Là chuyên mục gốc';
         $html = '<select name="'.$select_name.'" class="'.$class.'" id="'.$id.'" '.$extend.' ><option value="">'.$select_default.'</option>';
         $char = '';
         $parent = $curent_id;
         if( !empty( $mang ) )
         {
            foreach( $mang as $val )
            {
               if( $val['level'] > 0 ){
                      for( $i = 0; $i<= $val['level']; $i++ ){
                         $char.='--';
                  }
               }
               $dsb  = '';
               if( $val['position_id'] == $curent_id || $val['parent'] == $parent ){
                  $dsb  = 'disabled=""';
                  $curent_id = $val['position_id'];
               }
               $html.= '<option value="'.$val['position_id'].'" '.$dsb.'>'.$char.' '.$val['name'].'</option>';
               $char ='';
            }
         } 
         $html.= '</select>';
         return $html;
   }
}   