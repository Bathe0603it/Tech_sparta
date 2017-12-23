<?php
    //$this->load->view('site/functions');
    require_once('application/views/site/Functions.php');
    get_action();
?>
<!DOCTYPE HTML>
<html lang="vi">
<head>
	<title><?php echo $title;?></title>
	<meta name="keywords" content="<?php echo $keywords;?>"/>
    <meta name="description" content="<?php echo $description;?>"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Bathepro"/>
    <?php if( isset($noindex) ) echo $noindex;?>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="canonical" href="<?php echo current_url();?>" />
    <?php $this->my_config->get_social();?>
    
    <link rel="stylesheet" href="<?php echo public_url(); ?>plugins/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo public_url(); ?>plugins/slick/slick.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo public_url(); ?>plugins/slick/slick-theme.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo public_url(); ?>plugins/slick/slick-custom-theme.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo public_url(); ?>css/global-style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo public_url(); ?>css/hai's_style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo public_url(); ?>css/response.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo public_url(); ?>plugins/font-awesome-4.6.3/css/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo public_url(); ?>css/hover.css" />
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

	<script type="text/javascript" src="<?php echo public_url(); ?>scripts/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="<?php echo public_url(); ?>js/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="<?php echo public_url(); ?>js/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="<?php echo public_url(); ?>plugins/slick/slick.js"></script>
	<script type="text/javascript" src="<?php echo public_url(); ?>plugins/bootstrap/js/bootstrap.js"></script>
	<script src="<?php echo public_url(); ?>js/jquery-ui.min.js"></script>
	<script src="<?php echo public_url(); ?>js/jsmobile.js"></script>
    
</head>
<body>
    <!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog modal-xs">
			<div class="modal-content">
				<div class="modal-header">
					<p class="text-center"><b>ĐẶT LỊCH TỔ CHỨC SỰ KIỆN</b></p>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<input type="text" class="form-control" id="text" placeholder="Họ và tên">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="text" placeholder="Điện thoại">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="text" placeholder="Thời gian dự kiến">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="text" placeholder="Số lượng khách dự kiến">
						</div>
					</form>
					<div class="row">
						<div class="col-md-6">
							<p><b>Hỗ trợ : 0911.165.165</b></p>
							<p>Địa chỉ : tầng M, 165 Thái Hà - Hà Nội</p>
						</div>
						<div class="col-md-6 text-right" style="">
							<button class="buttonOrder"><img src="<?php echo public_url(); ?>images/datban-icon.png">Đặt bàn</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section id="wrap" class="wrap-bgblack" >
		<header class="main-header">
			<div class="fixTopHead clearfix">
				<div class="leftTopHead">
					<a href="#">
						<img src="<?php echo public_url(); ?>images/logo.png">
					</a>
				</div>
				<div class="rightTopHead">
					<nav class="menuTopHead">
						<ul class="ul clearfix">
							<li>
								<a href="" data-target="#myModal" data-toggle="modal" class="buttonOrder"> <img src="<?php echo public_url(); ?>images/datban-icon.png">Đặt bàn</a>
							</li>
							<?php if ($menu_menu): ?>
								<?php foreach ($menu_menu as $value): ?>
									<?php
										$name_catalog = $value['info']['name'];
										$link_catalog = show_link_catalog($value['info']); 
										$id_catalog   = $value['info']['menu_id'];
										unset($value['info']);
									?>
									<li>
										<a href="<?php echo $link_catalog; ?>"><?php echo $name_catalog; ?></a>
									</li>
								<?php endforeach ?>
							<?php endif ?>
						</ul>
					</nav>
				</div>
			</div>
		</header> 
		<?php $this->load->view($view);?>
		<footer class="main-footer clearfix">
			<section class="leftFootPage">
				<nav>
					<ul class="ul clearfix">
						<li>
							<a href=""><img src="<?php echo public_url(); ?>images/mesicon.png"></a>
						</li>
						<li>
							<a href=""><img src="<?php echo public_url(); ?>images/ficon.png"></a>
						</li>
						<li>
							<a href=""><img src="<?php echo public_url(); ?>images/twicon.png"></a>
						</li>
						<li>
							<a href=""><img src="<?php echo public_url(); ?>images/mayanhicon.png"></a>
						</li>
						<li>
							<a href=""><img src="<?php echo public_url(); ?>images/youtuicon.png"></a>
						</li>
						<li>
							<a href=""><img src="<?php echo public_url(); ?>images/inboxicon.png"></a>
						</li>
					</ul>
				</nav>
			</section>
			<section class="rightFootPage">
				<p>165 Thái Hà, Đống Đa, Hà Nội   |   Hotline: 0977.165.165 - 0888.165.165</p>
			</section>
		</footer>
	</section>
	<script type="text/javascript">
		$('.slideFootGioithieu').slick({
	      	slidesToShow: 5,
	      	slidesToScroll: 1,
	      	autoplay: true,
	      	autoplaySpeed: 2000,
	      	dots: true,
	      	responsive: [
	            {
	            breakpoint: 1000,
	            settings: {
	                slidesToShow: 5,
	                slidesToScroll: 2
	            }
	            },
	            {
	            breakpoint: 800,
	            settings: {
	                slidesToShow: 4,
	                slidesToScroll: 1
	            }
	            },
	            {
	            breakpoint: 481,
	            settings: {
	                slidesToShow: 3,
	                slidesToScroll: 1
	            }
	            },
	            {
	            breakpoint: 321,
	            settings: {
	                slidesToShow: 2,
	                slidesToScroll: 1
	            }
	            }
	            // You can unslick at a given breakpoint now by adding:
	            // settings: "unslick"
	            // instead of a settings object
	        ]
	    });
	</script>
</body>
</html>