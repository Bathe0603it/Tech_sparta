<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_html extends CI_Controller {
         public function __construct(){
             $this->CI =& get_instance();
         }
         
         public function get_html_tag($content)
         {
            
         }
         
         public function text($content)
         {
            $html = '<div class="field">
                       <label>'.$content['name'].'</label>
                       <input type="text" name="'.$content['name'].'" value="'.$content['value'].'">
                     </div>';
            return $html;
         }
         
         public function select($content)
         {
            $html = '<div class="field">
                       <label>'.$content['name'].'</label>
                       <select name="'.$content['name'].'">';
             $arroption = explode("\n",$content['name']);
             foreach($arroption as $val)
             {
                $option = explode('=',$val);
                $html.='<option ="'.$option[0].'">'.$option[1].'</option>';
             }
             
            $html.='</select>
                     </div>';
            return $html;
         }
         
         public function textarea($content)
         {
            $html = '<div class="field">
                       <label>'.$content['name'].'</label>
                       <textarea name="'.$content['name'].'">'.$content['value'].'</textarea>
                     </div>';
            return $html;
         }
         
         public function editor($content)
         {
            $html = '<div class="field">
                       <label>'.$content['name'].'</label>
                       <textarea name="'.$content['name'].'" id="'.$content['name'].'">'.$content['value'].'</textarea>
                       <script>
                            CKEDITOR.replace( "'.$content['name'].'" );
                            CKEDITOR.config.filebrowserBrowseUrl = ckeditor_config.base_url + "/" + ckeditor_config.html_path;
                            CKEDITOR.config.filebrowserImageBrowseUrl = ckeditor_config.base_url + "/" + ckeditor_config.html_path +"?type=Images";
                            CKEDITOR.config.filebrowserFlashBrowseUrl = ckeditor_config.base_url + "/" + ckeditor_config.html_path +"?type=Images";
                            CKEDITOR.config.filebrowserUploadUrl = ckeditor_config.base_url + "/" + ckeditor_config.connector_path +"?command=QuickUpload&type=Files"; 
                            CKEDITOR.config.filebrowserImageUploadUrl = ckeditor_config.base_url + "/" + ckeditor_config.connector_path +"?command=QuickUpload&type=Images";
                        </script>
                     </div>';
            return $html;
         }
}         