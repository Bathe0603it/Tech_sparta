<div class="row">
    <div class="col-md-12"><?php echo $breadcrumb; ?></div>
</div>
<article class="">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title_page"><span><?php echo $category['name'];?></span></h1>
        </div>
    </div>
    <div class="row listarticle">
        <?php 
            if( !empty($list) ):
            foreach( $list as $val ): 
                   $article_avatar = $val['avatar'] != null ? base_url('media/images/article/'.$val['id'].'/'.$val['avatar']) : base_url('templates/site/images/noimage.png');
                   $article_url = base_url( $val['slug'].'-A.html' );
            ?>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <a href="<?php echo $article_url;?>"><img src="<?php echo $article_avatar; ?>" class="img-responsive" /></a>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <p><a href="<?php echo $article_url;?>"><?php echo $val['name'];?></a></p>
            </div>
        </div>
        <?php endforeach; endif; ?>
    </div>
    <div class="row">
        <div class="page_seo col-md-12">
            <?php echo $category['content'];?>
        </div>
    </div>
</article>