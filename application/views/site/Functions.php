<?php
    if(!function_exists('get_action')){
        function get_action($input = null){
            $CI = &get_instance();
            echo '<section class="fixed_left">ObJect : <b>'.$CI->router->fetch_class().'</b><br>';
            echo 'Method : <b>'.$CI->router->fetch_method().'</b><br>';
            echo 'View : <b>'.$input['view'].'</b><br></section>';
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

    /* --------------------- action ------------------ */

    // $menu_top       = get_link_position('top');
    $menu_menu       = get_link_position('top');
    $menu_footer    = get_link_position('footer');
    $menu_content   = get_link_position('content');
    // $get_class_have_list_article    = get_class_have_list_article();
    $get_name_class = get_name_class();
    $get_name_method                = get_name_method();
    $get_products_feature   = get_products_feature();
    $get_articles_feature   = get_articles_feature();
    $getSlide       = getSlide();
    
?>
