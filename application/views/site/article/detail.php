<div class="container">
  <div class="row">
    <div class="col-md-12"><?php echo $breadcrumb; ?></div>
  </div>
  <div class="row">
    <aside class="col-md-3 col-sm-3">
        <?php if( !empty( $article_feature ) ): ?>
        <div class="block_right">
           <div class="block_right_title">
             <h3><span>Bài viết nổi bật</span></h3>
           </div>
           <div class="block_right_content">
               <?php foreach( $article_feature as $val ): 
                       $url = $this->my_config->get_url_menu($arr_menu,$val['parent']);
                       $url = base_url( $url.'/'.$val['slug'].'.html' );
                       $$article_feature_avatar = $val['avatar'] != null ? base_url('media/images/article/'.$val['id'].'/'.$val['avatar']) : base_url('templates/site/images/noimage.png');
               ?>   
                    <div class="splq_items">
                         <div class="col-md-5">
                           <a href="<?php echo $url;?>">
                            <img src="<?php echo $$article_feature_avatar;?>" class="img-responsive" />
                           </a>
                          </div>
                          <div class="col-md-7">
                            <p><a href="<?php echo $url;?>"><?php echo $val['name'];?></a></p>
                          </div>
                      </div>
               <?php endforeach; ?>
           </div>
         </div> 
         <?php endif; ?> 
    </aside>
    <article class="col-md-9 col-sm-9">
       <div class="col-md-12">
         <p class="listHeading"><?php echo $item['name'];?></p>
       </div>
       <div class="detailarticle"> 
           <?php echo $item['content'];?>
        </div>   
        <div class="clearfix"></div>
        <?php if( !empty( $relationship ) ): ?>
        <div>
           <div class="listHeading"><h3>Bài viết liên quan</h3></div>
           <ul>
           <?php foreach( $relationship as $val ): 
                   $url = $this->my_config->get_url_menu($arr_menu,$val['parent']);
                   $url = base_url( $url.'/'.$val['slug'].'.html' );
           ?>
             <li><a href="<?php echo $url; ?>"><?php echo $val['name'];?></a></li>
           <?php endforeach; ?>
           </ul>
        </div>
       <?php endif; ?>
    </article>
    
  </div>