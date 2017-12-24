<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    if(!function_exists('get_action_name')){
        function get_action_name($input = null){
            echo 'hello';
        }
    }

    if(!function_exists('dd')){
        function dd($input = null,$break = null){
            echo '<pre>';
            var_dump($input);
            echo '</pre>';
            if(empty($break))
            exit();
        }

    }

    if(!function_exists('ii')){
        function ii($input = null,$break = null){
            echo 'here<div style="display: none;">';
            echo '<pre>';
            var_dump($input);
            echo '</pre>';
            echo '</div>';
            if(!empty($break))
            exit();
        }

    }

    if(!function_exists('get_name_class')){
        function get_name_class(){
            $CI = &get_instance();
            return $CI->router->fetch_class();
        }
    }

    if(!function_exists('get_name_method')){
        function get_name_method($position = null){
            $CI = &get_instance();
            return $CI->router->fetch_method();
        }
    }

    if(!function_exists('public_url')){
        function public_url($input = null){
            return base_url('templates/site/');
        }
    }

    if(!function_exists('show_link_catalog')){
        function show_link_catalog($input = null){
            return base_url($input['slug'].'.html');
        }
    }

    if(!function_exists('show_link_image_catalog')){
        function show_link_image_catalog($input = null,$thump = null){
            $link_url   = empty($input['avatar'])?'templates/site/images/icon/icon_null.png':'media/images/menu/'.$input['avatar'];
            if (!empty($thump)) {
                $link_url   = empty($input['avatar'])?'templates/site/images/icon/icon_null.png':'media/images/menu/_thumbs/'.$input['avatar'];
            }
            return base_url($link_url);
        }
    }

    if(!function_exists('show_link_article')){
        function show_link_article($input = null){
            return base_url($input['slug'].'-A'.$input['id'].'.html');
        }
    }

    if(!function_exists('show_link_image_article')){
        function show_link_image_article($input = null,$thump = null){
            $link_url   = empty($input['avatar'])?'templates/site/images/icon/icon_null.jpg':'media/images/article/'.$input['id'].'/'.$input['avatar'];
            if (!empty($thump)) {
                $link_url   = empty($input['avatar'])?'templates/site/images/icon/icon_null.png':'media/images/article/'.$input['id'].'/_thumbs/'.$input['avatar'];
            }
            return base_url($link_url);
        }
    }

    if(!function_exists('show_link_event')){
        function show_link_event($input = null){
            return base_url($input['slug'].'-E.html');
        }
    }

    if(!function_exists('show_link_image_event')){
        function show_link_image_event($input = null,$thump = null){
            $link_url   = empty($input['avatar'])?'templates/site/images/icon/icon_null.jpg':'media/images/event/'.$input['id'].'/'.$input['avatar'];
            if (!empty($thump)) {
                $link_url   = empty($input['avatar'])?'templates/site/images/icon/icon_null.png':'media/images/event/'.$input['id'].'/_thumbs/'.$input['avatar'];
            }
            return base_url($link_url);
        }
    }

    if(!function_exists('show_link_product')){
        function show_link_product($input = null){
            return base_url($input['slug'].'-P'.$input['id'].'.html');
        }
    }

    if(!function_exists('show_link_image_product')){
        function show_link_image_product($input = null,$thump = null){
            $link_url   = empty($input['avatar'])?'templates/site/images/icon/icon_null.jpg':'media/images/product/'.$input['id'].'/'.$input['avatar'];
            if (!empty($thump)) {
                $link_url   = empty($input['avatar'])?'templates/site/images/icon/icon_null.jpg':'media/images/product/'.$input['id'].'/_thumbs/'.$input['avatar'];
            }
            return base_url($link_url);
        }
    }

    if(!function_exists('show_link_image_slide')){
        function show_link_image_slide($input = null,$thump = null){
            $link_url   = empty($input['image'])?'templates/site/images/icon/icon_null.jpg':'media/images/slide/'.$input['image'];
            if (!empty($thump)) {
                $link_url   = empty($input['image'])?'templates/site/images/icon/icon_null.jpg':'media/images/slide/_thumbs/'.$input['image'];
            }
            return base_url($link_url);
        }
    }

    if(!function_exists('get_articles_feature')){
        function get_articles_feature($category = null){
            $CI = &get_instance();
            $CI->load->model('site/article_model');
            return $article_feature = $CI->article_model->Db_article_feature();
        }
    }

    if(!function_exists('get_articles_feature_in_category')){
        function get_articles_feature_in_category($category = null){
            $CI = &get_instance();
            $CI->load->model('site/article_model');
            return $CI->article_model->getArticleFeatureInCategory($category);
        }
    }

    if(!function_exists('get_products_feature')){
        function get_products_feature($category = null){
            $CI = &get_instance();
            $CI->load->model('site/product_model');
            return $CI->product_model->Db_product_feature($category);
        }
    }

    if(!function_exists('get_products_feature_in_category')){
        function get_products_feature_in_category($category = null){
            $CI = &get_instance();
            $CI->load->model('site/product_model');
            return $CI->product_model->getProductFeatureInCategory($category);
        }
    }

    if(!function_exists('get_link_position')){
        function get_link_position($position = null){
            $CI = &get_instance();
            return $CI->lib_functions->get_link_position($position);
        }
    }

    if(!function_exists('get_config_page')){
        function get_config_page($field = 'title'){
            $CI = &get_instance();
            return $CI->lib_functions->get_config($field);
        }
    }

    if(!function_exists('getSlide')){
        function getSlide($field = 'title'){
            $CI = &get_instance();
            return $CI->lib_functions->getSlide();
        }
    }

    if (!function_exists('show_price_product')) {
        function show_price_product($input){
            if ($input['hidden_price'] != 0) {
                return 'Liên hệ';
            }
            return number_format($input['giaban']);
        }
    }

    if (!function_exists('show_price_product_km')) {
        function show_price_product_km($input){
            if ($input['hidden_price'] != 0) {
                return '';
            }
            return number_format($input['giakhuyenmai']);
        }
    }

    if (!function_exists('show_price_product_sale')) {
        function show_price_product_sale($input){
            if ($input['hidden_price'] != 0) {
                return '';
            }
            return round(($input['giakhuyenmai']-$input['giaban'])/100,0,PHP_ROUND_HALF_UP);
        }
    }

    if (!function_exists('dateViewToStringToTime')) {
        function dateViewToStringToTime($date = null){
            $date   = explode('/', $date);
            $date   = $date[1].'/'.$date[0].'/'.$date[2];
            $date   = strtotime($date);
            return $date;
        }
    }

    if (!function_exists('show_price_product')) {
        function show_price_product($input){
            if ($input['hidden_price'] != 0) {
                return 'Liên hệ';
            }
            return $input['giaban'];
        }
    }

    if(!function_exists('get_parent_in_category')){
        function get_parent_in_category($module){
            $CI = &get_instance();
            $result = $CI->lib_functions->get_all_menu($module);
            return $CI->lib_functions->get_parent_to_ul_li($result);
        }
    }

    if (!function_exists('getArticleInStyleincatalog')) {
        function getArticleInStyleincatalog($style = 1){
            $CI = &get_instance();
            $CI->load->model('site/article_model');
            return $CI->article_model->getArticleInStyleincatalog($style);
        }
    }




    /*** 
        *
        * library chua dung toi 
        *
        **/

    

    if(!function_exists('get_class_have_list_article')){
        function get_class_have_list_article(){
            $arr    = array(
                '','','',
            );
            return $arr;
        }
    }
    
    /** tra ve 1 mang du lieu chi bao gom 1 truong trong bang **/
    if(!function_exists('getListToArray')){
        function getListToArray($feild,$input_arr){
            $temp = null;
            foreach($input_arr as $key => $row){
                $temp[$key] = $row[$feild];
            }
            return $temp;
        }
    }

    if(!function_exists('list_style_in_catalog')){
        function list_style_in_catalog($input = null){
            $arr    = array(
                1   => 'kiểu đội ngũ nhân viên',
                2   => 'kiểu danh mục bằng chứng nhận',
            );
            return $arr;
        }
    }
    
    if(!function_exists('list_sort_orders')){
        function list_sort_orders($input = null){
            $arr    = array(
                'new'   => array('Mới nhất','created_date','desc'),
                'price_asc' => array('Giá thấp đến cao','giaban','asc'),
                'price_desc'    => array('Giá cao đến thấp','giaban','desc'),
            );
            if(!empty($input)){
                if(!array_key_exists($input,$arr)){
                    return false;
                }
                return $arr[$input];
            }
            return $arr;
        }
    }

?>

