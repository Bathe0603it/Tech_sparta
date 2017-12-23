<?php
class Article extends CI_Controller{
    public $module_view = 'site';
    public $action_view = '';
    public $view        = 'index';
    public $limit       = 20;
    public function __construct()
    {
        parent::__construct();
        $this->action_view =  $this->module_view.'/'.$this->router->fetch_class().'/'.$this->router->fetch_method();
        $this->view        =  $this->module_view.'/'.$this->view;
        $this->load->library(array('site/my_config'));
        $this->load->model(array('site/article_model'));
        $this->load->helper(array('site_helper'));
    }
    
    public function page( $id ){
                          $category                = $this->article_model->db->where( 'id', $id )->get( 'menu' )->row_array();
                          $this->load->model('myconfig_model');
                          $listChildenMenuId   = $this->myconfig_model->Db_list_children_id( $category );
                          //$total               = $this->article_model->Db_count_list( $listChildenMenuId );
                          $data['list']        = $this->article_model->Db_list( $listChildenMenuId, $this->limit, $offset = 0 );
                          
//                        $this->load->library('pagination');
//                        $config['base_url']   = base_url( $slug.'/page/');
//                        $config['total_rows'] = $total;
//                        $config['per_page']   = $this->limit;
//                        $config['last_link']  ='<i class="fa fa-fast-forward"></i>'; 
//                        $config['first_link'] ='<i class="fa fa-fast-backward"></i>';
//                        $config['next_link']  ='<i class="fa fa-step-forward"></i>';
//                        $config['prev_link']  ='<i class="fa fa-step-backward"></i>';
//                        $this->pagination->initialize($config);
//                        $data['pagination']  = $this->pagination->create_links();
                        $data['category']        = $category;
                        $data['title']       = $category['title'];
                        $data['keywords']    = $category['keywords'];
                        $data['description'] = $category['description'];
                        $data['article_feature'] = $this->article_model->Db_article_feature();
                        $data['arr_menu']   = $this->myconfig_model->Db_get_menu();
                        $menu               = $this->article_model->Db_get_Menu($category['id']);
                        $data['breadcrumb'] = breadcrumb($menu);
                        $data['link'] = createdlink($menu);
                        $this->my_config->set_social(
                                                          base_url($category['slug'].'.html'),
                                                          $category['title'],
                                                          $category['description'], 
                                                          base_url('media/images/menu/'.$category['avatar']),
                                                          'article'
                                                      );
                        $data['view'] = $this->action_view;
                        $this->load->view( $this->view, $data );  
    }
    
    public function detail($id = 0){
                          $article = $this->article_model->db->where( 'id', $id )->where( 'state',1 )->get('article')->row_array();
                          if( empty( $article ) ) redirect( 'error');
                          $data['item']        = $article;
                          $data['relationship']= $this->article_model->Db_list_relationship( $article['id'], $article['parent'] ); 
                          $data['title']       = $article['name'];
                          $data['keywords']    = $article['keywords'];
                          $data['description'] = $article['description'];
                          $menu                = $this->article_model->Db_get_Menu($article['parent']);
                          $data['breadcrumb']  = breadcrumb($menu);
                          $data['link'] = createdlink($menu);
                          $data['article_feature'] = $this->article_model->Db_article_feature();
                          $this->my_config->set_social(
                                                          base_url($article['slug'].'.html'),
                                                          $article['title'],
                                                          $article['description'], 
                                                          base_url('media/images/article/'.$article['id'].'/'.$article['avatar']),
                                                          'article'
                                                      );
                          $data['view'] = $this->action_view;
                          $this->load->view( $this->view, $data ); 
    }
}