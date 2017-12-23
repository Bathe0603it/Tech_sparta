<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ( ! function_exists('giaban'))
{
   function giaban($item,$text_giaban='Giá bán:',$text_giakhuyemai='Giá khuyến mãi:',$sale = false,$echo = true)
   {
        $giagoc = '';
        $giamgia='';
        if( $item['hidden_price'] == 1 )
        {
            $giaban = '<p><span>'.$text_giaban.'</span> <b class="psale">Liên hệ</b></p>';
        }
        else
        {
            if( $item['giakhuyenmai'] > 0 )
            {
                $giaban = '<p><span>'.$text_giakhuyemai.'</span> <b class="psale">'.number_format($item['giakhuyenmai']).' đ</b></p>';
                $giagoc = '<p><span>'.$text_giaban.'</span> <b class="pprice">'.number_format($item['giaban']).' đ</b></p>';
                if( $sale == true )
                {
                    $giamgia = 100 - ( $item['giakhuyenmai'] * 100 / $item['giaban'] );
                    $giamgia = '<div class="sale">-'.number_format($giamgia,0).'%</div>';
                }
            }
            else
            {
                $giaban = '<p><span>'.$text_giaban.'</span> <b class="psale">'.number_format($item['giaban']).' đ</b></p>';
            }
        }
        if( $echo == true )
           echo $giagoc.$giaban.$giamgia;
        else 
           return $giagoc.$giaban.$giamgia;    
   }
}