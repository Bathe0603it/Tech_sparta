<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ( ! function_exists('breadcrumb'))
{
    function breadcrumb($menu=array(),$new = array())
    {
        $html ='<ul class="ul" itemscope itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a href="'.base_url().'" title="" itemprop="item">
                            <span itemprop="name">Home</span>  
                        </a>
                        <meta itemprop="position" content="1" />
                    </li>';
        $menu = array_merge($menu,$new);
        if( !empty( $menu ) )
        { 
            $url ='';
            $i = 2;
            foreach( $menu as $val )
            {
                $url.= '/'.$val['slug']; 
                $html.='/ <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a class="active" href="'.base_url($url.'.html').'" title="'.$val['name'].'" itemprop="item" >
                            <span itemprop="name">'.$val['name'].'</span>
                        </a>
                        <meta itemprop="position" content="'.$i.'" />
                    </li>';
                $i++;
            }  
        }
        $html.='</ul>';
        return $html;
    }
}

if ( ! function_exists('createdlink'))
{
    function createdlink($menu=array())
    {
        $url ='';
        if( !empty( $menu ) )
        { 
            foreach( $menu as $val )
            {
                $url.= '/'.$val['slug']; 
            }  
        }
        return $url;
    }
}