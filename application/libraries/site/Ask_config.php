<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ask_config extends CI_Controller {
         public $message = '';
         public function __construct(){
             $this->CI =& get_instance();
             $this->CI->load->model( array('site/ask_model') );
             $this->CI->load->helper( array('text') );
         }
         
         public function ask($cate_name,$cate_id)
         {
          
           $this->ask_form();
           $this->list_ask();
         }
         
         public function ask_form()
         {
            $member = $this->CI->session->userdata('member');
            $member_info = '';
            $login_register = '';
            if( !empty($member) )
            {
                $member_info = '
                                 <div class="mb_info">
                                   <a href=""><i class="fa fa-user-circle-o" aria-hidden="true"></i> '.$member['email'].'</a>
                                   <span onclick="logout(\''.base_url('member_logout.html').'\')";>Đăng xuất <i class="fa fa-sign-out" aria-hidden="true"></i></span>
                                 </div>  
                               ';
            }
            else
            {
               $login_register = '
                                 <li class="lg_rg">
                                   <input type="radio" name="register" value="1" checked=""> <span>Đã có tài khoản </span>
                                   <input type="radio" name="register" value="0"> <span>Chưa có tài khoản </span>
                                 </li>
                                 <li class="lg_rg">
                                   <div>
                                      <input type="text" name="email" value="" placeholder="Nhập email" />
                                   </div>
                                   <div>
                                      <input type="password" name="password" value="" placeholder="Nhập mật khẩu" />
                                   </div>
                                 </li>
                                ';
            }
            $html = $member_info.
                    '
                      <form id="ask_form" name="" action="'.base_url('hoidap.html').'" method=""> 
                           <ul class="ul_list">
                             <li><textarea name="content" placeholder="Nhập nội dung câu hỏi..."></textarea></li>
                             <li><select name="ask_link_id"><option value="'.$this->get_link_id().'">Chọn chuyên mục cần hỏi</option></select></li>
                              ';
            $html.=  $login_register;         
            $html.='        <li><button id="submit_ask" type="submit">Đặt câu hỏi</button></li>
                           </ul>
                       </form>
                     ';
           echo $html;
         }
         
         public function list_ask()
         {
            $id   = $this->get_link_id();
            $data = $this->CI->ask_model->Db_list_ask($id);
            $html='<div class="list_ask"><ul>';
            if( !empty($data) )
            {
                foreach( $data as $val )
                {
                    $html.='<li>
                               <label>'.$val['email'].'</label>
                               <p>'.word_limiter($val['content'],40).'<p>
                               <div class="cm_ct"><a href="'.base_url('cauhoi/'.$val['id'].'.html').'">Xem tất cả <i class="fa fa-eye" aria-hidden="true"></i></a> <a href="'.base_url('cauhoi/'.$val['id'].'.html').'">Bình luận <i class="fa fa-comments" aria-hidden="true"></i></a></div>
                            </li>';
                }
            }
            $html.='</ul></div>';
            echo $html;
         }
         
         private function get_link_id()
    {
        $link = current_url();
        $id   = $this->CI->ask_model->Db_get_link($link);
        return $id;
    }
         
}         