<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="">
    <meta name="author" content="">
	
    <title>我的空间</title>
	
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="/bridge/Public/home/css/bootstrap.min.css"  type="text/css">
	
	<!-- Owl Carousel Assets -->
    <link href="/bridge/Public/home/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="/bridge/Public/home/owl-carousel/owl.theme.css" rel="stylesheet">
	
	<!-- Custom CSS -->
    <link rel="stylesheet" href="/bridge/Public/home/css/style.css">
	 <link href="/bridge/Public/home/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
	
	<!-- Custom Fonts -->
    <link rel="stylesheet" href="/bridge/Public/home/font-awesome-4.4.0/css/font-awesome.min.css"  type="text/css">
	
	<!-- jQuery and Modernizr-->
	<script src="/bridge/Public/home/js/jquery-2.1.1.js"></script>
	
	<!-- Core JavaScript Files -->  	 
    <script src="/bridge/Public/home/js/bootstrap.min.js"></script>
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<header>
	<!--Top-->
	<nav id="top">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<strong>
				<?php if($_SESSION['username'] == ''): ?>Welcome to 游客!
				<?php else: ?>
				    Welcome to <?php echo ($_SESSION['username']); ?>!<?php endif; ?>
					</strong>
				</div>
				<div class="col-md-6">
					<ul class="list-inline top-link link">
                      <?php if($_SESSION['username'] == ''): ?><li><a href="<?php echo U('Home/Login/login');?>">登陆</a></li>
                      <?php else: ?>
               <li><a href="<?php echo U('Home/Login/doout');?>">退出</a></li><?php endif; ?>
               <li><a href="<?php echo U('Home/Login/doout');?>">注册</a></li>      
					</ul>
				</div>
			</div>
		</div>
	</nav>
	
	<!--Navigation-->
    <nav id="menu" class="navbar container">
		<div class="navbar-header">
			<button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
			<a class="navbar-brand" href="<?php echo U('Admin/Login/login');?>">
				<div class="logo"><span><?php echo ($title); ?></span></div>
			</a>
		</div>
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
				<li><a href="<?php echo U('Home/User/lst');?>">个人中心 </a>
				</li>
				<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">视频<i class="fa fa-arrow-circle-o-down"></i></a>
					<div class="dropdown-menu">
						<div class="dropdown-inner">
							<ul class="list-unstyled">
					<?php if(is_array($audiodata)): $key = 0; $__LIST__ = $audiodata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><li><a href="<?php echo U('Video/lst','','');?>/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						</div> 
					</div>
				</li>
				<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">相册<i class="fa fa-arrow-circle-o-down"></i></a>
					<div class="dropdown-menu" style="margin-left: -203.625px;">
						<div class="dropdown-inner">
							<ul class="list-unstyled">
                        <?php if(is_array($atype)): $key = 0; $__LIST__ = $atype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key; if($key < 3): ?><li><a href="<?php echo U('Image/lst','','');?>/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["type"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($atype)): $key = 0; $__LIST__ = $atype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key; if(($key > 6) and ($key < 9)): ?><li><a href="<?php echo U('Image/lst','','');?>/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["type"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
							</ul>
							<ul class="list-unstyled">
                        <?php if(is_array($atype)): $key = 0; $__LIST__ = $atype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key; if(($key > 2) and ($key < 5)): ?><li><a href="<?php echo U('Image/lst','','');?>/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["type"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($atype)): $key = 0; $__LIST__ = $atype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key; if(($key > 8) and ($key < 11)): ?><li><a href="<?php echo U('Image/lst','','');?>/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["type"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
							</ul>
							<ul class="list-unstyled">
                        <?php if(is_array($atype)): $key = 0; $__LIST__ = $atype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key; if(($key > 4) and ($key < 7)): ?><li><a href="<?php echo U('Image/lst','','');?>/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["type"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($atype)): $key = 0; $__LIST__ = $atype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key; if(($key > 10) and ($key < 13)): ?><li><a href="<?php echo U('Image/lst','','');?>/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["type"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						</div>
					</div>
				</li>
				<li><a href="<?php echo U('Home/Article/lst');?>"><i class="fa fa-cubes"></i> 日记</a></li>
				<li><a href="<?php echo U('Home/Message/lst');?>"><i class="fa fa-envelope"></i>留言</a></li>
			</ul>
		</div>
	</nav>
</header>
	<!-- top-->
	<!-- JS -->
	<script src="/bridge/Public/home/owl-carousel/owl.carousel.js"></script>
    <script>
    $(document).ready(function() {
      $("#owl-demo-1").owlCarousel({
        autoPlay: 3000,
        items : 1,
        itemsDesktop : [1199,1],
        itemsDesktopSmall : [400,1]
      });
	  $("#owl-demo-2").owlCarousel({
        autoPlay: 3000,
        items : 3,
        
      });
    });
    </script>
	
	
	<script type="text/javascript" src="/bridge/Public/home/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="/bridge/Public/home/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
	<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>
</body>
</html>

	<div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >网页模板</a></div>	
	<div class="featured container">
		<div class="row">
			<div class="col-sm-8">
				<!-- Carousel -->
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1"></li>
						<li data-target="#carousel-example-generic" data-slide-to="2"></li>
					</ol>
					<!-- Wrapper for slides -->
					<div class="carousel-inner">
			    <?php if(is_array($lunbo)): $key = 0; $__LIST__ = $lunbo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key; if($key == 1): ?><div class="item active">
							<img src="/bridge/Public/img/uploads/lunbo/<?php echo ($vo["img"]); ?>" alt="First slide" style="width: 749px;height: 421px;">
							<!-- Static Header -->
							<div class="header-text hidden-xs">
								<div class="col-md-12 text-center">
									<!-- <h2></h2> -->
									<br>
									<h3><?php echo ($vo["content"]); ?></h3>
									<br>
								</div>
							</div><!-- /header-text -->
						</div>
				    <?php else: ?>
				        <div class="item">
							<img src="/bridge/Public/img/uploads/lunbo/<?php echo ($vo["img"]); ?>" alt="First slide" style="width: 749px;height: 421px;">
							<!-- Static Header -->
							<div class="header-text hidden-xs">
								<div class="col-md-12 text-center">
								<!-- 	<h2></h2> -->
									<br>
									<h3><?php echo ($vo["content"]); ?></h3>
									<br>
								</div>
							</div><!-- /header-text -->
						</div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</div>
					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
				</div><!-- /carousel -->
			</div>
			<div class="col-sm-4" >
				<div id="owl-demo-1" class="owl-carousel">
                  <?php if(is_array($threeimg)): $i = 0; $__LIST__ = $threeimg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><img src="/bridge/Public/img/uploads/imgs/<?php echo ($vo["img"]); ?>" style="width:359px;height:237px;"/><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
                <?php if(is_array($alubmimg)): $i = 0; $__LIST__ = $alubmimg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><img src="/bridge/Public/img/uploads/alumb/<?php echo ($vo["img"]); ?>" style="width:359px;height:143px;"/><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
	</div>
	
	<!-- /////////////////////////////////////////Content -->
	<div id="page-content" class="index-page container">
		<div class="row">
			<div id="main-content"><!-- background not working -->
				<div class="col-md-6">
			<!-- 最新发表日记 -->
			<?php if(is_array($artcledate)): $i = 0; $__LIST__ = $artcledate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="box wrap-vid">
						<div class="zoom-container">
							<div class="zoom-caption">
								<span class="youtube">最新日记</span>
								<p><?php echo ($vo["filename"]); ?></p>
							</div>
							<img src="/bridge/Public/img/uploads/fileimg/<?php echo ($vo["img"]); ?>" style="height: 353px;" />
						</div>
						<h3 class="vid-name"><?php echo ($vo["filename"]); ?></h3>
						<div class="info">
							<h5>
							</h5>
							<span><i class="glyphicon glyphicon-user"></i><?php echo ($vo["adminname"]); ?></span>
							<span><i class="fa fa-calendar"></i><?php echo (date('Y-m-d H:i:s',$vo["publishtime"])); ?></span> 
							<span><i class="fa fa-comment"></i><?php echo ($vo["reader"]); ?></span>
						</div>
						<p class="more"><?php echo ($vo["content"]); ?></p>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
					<!-- 最新发表日记 -->
					<div class="box">
						<div class="box-header header-vimeo">
							<h2>视频</h2>
						</div>
						<div class="box-content">
							<div class="row">
								<div class="col-md-6">
									<div class="wrap-vid">
										<div class="zoom-container">
			<!-- 视频 -->
        <?php if(is_array($newvideo)): $key = 0; $__LIST__ = $newvideo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key; if($vo["open"] == '1' ): if($key < '2' ): ?><div class="post wrap-vid">
			  <!-- 存放视频 -->
        <div class="img-thumbnail" style="width: 260px;height: 150px;">
          <link href="/bridge/Public/video/css/video-js.css" rel="stylesheet">
          <!-- If you'd like to support IE8 -->
          <script src="/bridge/Public/video/js/videojs-ie8.min.js"></script>
          <div style="width: 260px;height: 130px;">
           <video id="my-video" class="video-js" controls preload="auto" width="250" height="140"
      poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
              <source src="/bridge/Public/img/uploads/video/<?php echo ($vo["video"]); ?>" type="video/mp4">
              <source src="/bridge/Public/img/uploads/video/<?php echo ($vo["video"]); ?>" type="video/webm">
              <source src="/bridge/Public/img/uploads/video/<?php echo ($vo["video"]); ?>" type="video/ogg">
           </video>
           <script src="http://vjs.zencdn.net/5.18.4/video.min.js"></script> 
           <script type="text/javascript">
            var myPlayer = videojs('my-video');
            videojs("my-video").ready(function(){
              var myPlayer = this;
              myPlayer.play();
            });
           </script>
          </div>
        </div>           
			  <!-- 存放视频 -->
			</div>
		  <?php else: endif; ?>
	    <?php else: ?>
	       <div class="post wrap-vid">
			  <!-- 存放视频 -->
            <p class="text-muted">暂没有视频！</p>        
			  <!-- 存放视频 -->
			</div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			<!-- 视频 -->
										</div>	
									</div>
									
								</div>
								<div class="col-md-6">						
			<!-- 显示3个视频 -->
	<?php if(is_array($newvideo)): $key = 0; $__LIST__ = $newvideo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key; if($vo["open"] == '1' ): if($key < '4' ): ?><div class="post wrap-vid">
			  <!-- 存放视频 -->
        <div class="img-thumbnail" style="width: 250px;height:100px;">
          <link href="/bridge/Public/video/css/video-js.css" rel="stylesheet">
          <!-- If you'd like to support IE8 -->
          <script src="/bridge/Public/video/js/videojs-ie8.min.js"></script>
          <div style="width: 250px;height: 100px;">
           <video id="my-videos" class="video-js" controls preload="auto" width="240" height="90"
      poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
              <source src="/bridge/Public/img/uploads/video/<?php echo ($vo["video"]); ?>" type="video/mp4">
              <source src="/bridge/Public/img/uploads/video/<?php echo ($vo["video"]); ?>" type="video/webm">
              <source src="/bridge/Public/img/uploads/video/<?php echo ($vo["video"]); ?>" type="video/ogg">
           </video>
           <script src="http://vjs.zencdn.net/5.18.4/video.min.js"></script> 
           <script type="text/javascript">
            var myPlayer = videojs('my-video');
            videojs("my-video").ready(function(){
              var myPlayer = this;
              myPlayer.play();
            });
           </script>
          </div>
        </div>           
			  <!-- 存放视频 -->
			</div>
		  <?php else: endif; ?>
	    <?php else: ?>
	       <div class="post wrap-vid">
			  <!-- 存放视频 -->
            <p class="text-muted">暂没有视频！</p>        
			  <!-- 存放视频 -->
			</div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				<!-- 显示3个视频 -->
								</div>
							</div>
						</div>
					</div>
					<div class="box">
						<div class="box-header header-photo">
							<h2>图片</h2>
						</div>
						<div class="box-content">
							<div id="owl-demo-2" class="owl-carousel">
								<div class="item">
                         <?php if(is_array($nimg)): $key = 0; $__LIST__ = $nimg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key; if($key < 3): ?><img src="/bridge/Public/img/uploads/imgs/<?php echo ($vo["img"]); ?>" style="width:174px;height:98px;" /><?php endif; endforeach; endif; else: echo "" ;endif; ?>
								</div>
								<div class="item">
                         <?php if(is_array($nimg)): $key = 0; $__LIST__ = $nimg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key; if(($key > 2) and ($key < 5)): ?><img src="/bridge/Public/img/uploads/imgs/<?php echo ($vo["img"]); ?>" style="width:174px;height:98px;" /><?php endif; endforeach; endif; else: echo "" ;endif; ?>
								</div>
								<div class="item">
                         <?php if(is_array($nimg)): $key = 0; $__LIST__ = $nimg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key; if(($key > 4) and ($key < 7)): ?><img src="/bridge/Public/img/uploads/imgs/<?php echo ($vo["img"]); ?>" style="width:174px;height:98px;" /><?php endif; endforeach; endif; else: echo "" ;endif; ?>
								</div>
								<div class="item">
                         <?php if(is_array($nimg)): $key = 0; $__LIST__ = $nimg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key; if(($key > 6) and ($key < 9)): ?><img src="/bridge/Public/img/uploads/imgs/<?php echo ($vo["img"]); ?>" style="width:174px;height:98px;" /><?php endif; endforeach; endif; else: echo "" ;endif; ?>
								</div>
								<div class="item">
                         <?php if(is_array($nimg)): $key = 0; $__LIST__ = $nimg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key; if(($key > 8) and ($key < 11)): ?><img src="/bridge/Public/img/uploads/imgs/<?php echo ($vo["img"]); ?>" style="width:174px;height:98px;" /><?php endif; endforeach; endif; else: echo "" ;endif; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="box">
						<div class="box-header header-natural">
							<h2>日记</h2>
						</div>
						<div class="box-content">
							<div class="row">
                        <?php if(is_array($article)): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-md-6">
									<img src="/bridge/Public/img/uploads/fileimg/<?php echo ($vo["img"]); ?>" style="width:250px;height:149px;"/>
									<h3><a href="<?php echo U('Article/articlelist','','');?>/rid/<?php echo ($vo["id"]); ?>"><?php echo ($vo["filename"]); ?></a></h3>
									<span><i class="fa fa-heart"></i><?php echo ($vo["author"]); ?> / <i class="fa fa-calendar"></i> <?php echo (date('Y-m-d',$vo["publishtime"])); ?> / </span>
									<span class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half"></i>
									</span>
									<p><?php echo ($vo["describe"]); ?></p>
								</div><?php endforeach; endif; else: echo "" ;endif; ?>				
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="sidebar">
				<div class="col-md-3">
					<!-- Start Widget -->
					<div class="widget wid-vid">
						<div class="heading">
							<h4>主题</h4>
						</div>
						<div class="content">
							<div class="tab-content">
								<div id="most" class="tab-pane fade in active">
							<!-- 最新主题 -->
	<?php if(is_array($lasttheme)): $i = 0; $__LIST__ = $lasttheme;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="post wrap-vid">
		  <div class="zoom-container">
			<div class="zoom-caption">
				<span class="youtube">主题</span>
				<a href="<?php echo U('Video/lst','','');?>/id/<?php echo ($vo["id"]); ?>">
					<i class="fa fa-play-circle-o fa-3x" style="color: #fff"></i>
				</a>
				<p><?php echo ($vo["name"]); ?></p>
			</div>
			<img src="/bridge/Public/img/uploads/theme/<?php echo ($vo["img"]); ?>" style="width:105px;height:70px;" />
		  </div>
		  <div class="wrapper">
			<h5 class="vid-name"><a href="<?php echo U('Video/lst','','');?>/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?>
			</a></h5>
			<div class="info">
			  <span class="rating">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-half"></i>
			  </span>
			</div>
		  </div>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
							<!-- 最新主题 -->
								</div>
								<div id="popular" class="tab-pane fade">
									<div class="post wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span class="youtube">Youtube</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-3x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="/bridge/Public/home/images/4.jpg" />
										</div>
										<div class="wrapper">
											<h5 class="vid-name"><a href="#">Video's Name</a></h5>
											<div class="info">
												<h6>By <a href="#">Kelvin</a></h6>
												<span><i class="fa fa-heart"></i>1,200 / <i class="fa fa-calendar"></i>25/3/2015</span>
												<span class="rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-half"></i>
												</span>
											</div>
										</div>
									</div>
									<div class="post wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span class="youtube">Youtube</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-3x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="/bridge/Public/home/images/4.jpg" />
										</div>
										<div class="wrapper">
											<h5 class="vid-name"><a href="#">Video's Name</a></h5>
											<div class="info">
												<h6>By <a href="#">Kelvin</a></h6>
												<span><i class="fa fa-heart"></i>1,200 / <i class="fa fa-calendar"></i>25/3/2015</span>
												<span class="rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-half"></i>
												</span>
											</div>
										</div>
									</div>
									<div class="post wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span class="vimeo">Vimeo</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-3x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="/bridge/Public/home/images/4.jpg" />
										</div>
										<div class="wrapper">
											<h5 class="vid-name"><a href="#">Video's Name</a></h5>
											<div class="info">
												<h6>By <a href="#">Kelvin</a></h6>
												<span><i class="fa fa-heart"></i>1,200 / <i class="fa fa-calendar"></i>25/3/2015</span>
												<span class="rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-half"></i>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div id="random" class="tab-pane fade">
									<div class="post wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span class="vimeo">Vimeo</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-3x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="/bridge/Public/home/images/4.jpg" />
										</div>
										<div class="wrapper">
											<h5 class="vid-name"><a href="#">Video's Name</a></h5>
											<div class="info">
												<h6>By <a href="#">Kelvin</a></h6>
												<span><i class="fa fa-heart"></i>1,200 / <i class="fa fa-calendar"></i>25/3/2015</span>
												<span class="rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-half"></i>
												</span>
											</div>
										</div>
									</div>
									<div class="post wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span class="vimeo">Vimeo</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-3x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="/bridge/Public/home/images/4.jpg" />
										</div>
										<div class="wrapper">
											<h5 class="vid-name"><a href="#">Video's Name</a></h5>
											<div class="info">
												<h6>By <a href="#">Kelvin</a></h6>
												<span><i class="fa fa-heart"></i>1,200 / <i class="fa fa-calendar"></i>25/3/2015</span>
												<span class="rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-half"></i>
												</span>
											</div>
										</div>
									</div>
									<div class="post wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span class="vimeo">Vimeo</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-3x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="/bridge/Public/home/images/4.jpg" />
										</div>
										<div class="wrapper">
											<h5 class="vid-name"><a href="#">Video's Name</a></h5>
											<div class="info">
												<h6>By <a href="#">Kelvin</a></h6>
												<span><i class="fa fa-heart"></i>1,200 / <i class="fa fa-calendar"></i>25/3/2015</span>
												<span class="rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-half"></i>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Start Widget -->
					<div class="widget wid-gallery">
						<div class="heading"><h4>相集</h4></div>
						<div class="content">
							<div class="col-md-4">
								<div class="row">
                             <?php if(is_array($talumb)): $key = 0; $__LIST__ = $talumb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key; if($key < 4): ?><a href="<?php echo U('Image/lst','','');?>/id/<?php echo ($vo["tid"]); ?>/aid/<?php echo ($vo["aid"]); ?>"><img src="/bridge/Public/img/uploads/alumb/<?php echo ($vo["img"]); ?>" style="width:77px;height:77px;" /></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row">
                             <?php if(is_array($talumb)): $key = 0; $__LIST__ = $talumb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key; if(($key < 7) and ($key > 3) ): ?><a href="#"><img src="/bridge/Public/img/uploads/alumb/<?php echo ($vo["img"]); ?>" style="width:77px;height:77px;" /></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row">
                             <?php if(is_array($talumb)): $key = 0; $__LIST__ = $talumb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key; if(($key < 10) and ($key > 6) ): ?><a href="#"><img src="/bridge/Public/img/uploads/alumb/<?php echo ($vo["img"]); ?>" style="width:77px;height:77px;" /></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
								</div>
							</div>
						</div>
					</div>
					<!---Start Widget -->
					<div class="widget wid-new-post">
						<div class="heading"><h4>最新发表</h4></div>
						<div class="content">
                     <?php if(is_array($tarticle)): $i = 0; $__LIST__ = $tarticle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><h6><?php echo ($vo["file"]); ?></h6>
						<img src="/bridge/Public/img/uploads/fileimg/<?php echo ($vo["img"]); ?>" style="width:230px;heght:153px;" />
						<ul class="list-inline">
							<li><i class="fa fa-calendar"></i><?php echo (date('Y-m-d',$vo["publishtime"])); ?></li> 
							<li><i class="fa fa-comments"></i><?php echo ($vo["author"]); ?></li>
						</ul>
						<p><?php echo ($vo["describe"]); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
					<!---- Start Widget ---->
                   <!--
					<div class="widget wid-recent-post">
						<div class="heading"><h4>游客留言</h4></div>
						<div class="content">
                       <?php if(is_array($message)): $i = 0; $__LIST__ = $message;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span><?php echo ($vo["content"]); ?><a href="#">your mind takes</a></span><?php endforeach; endif; else: echo "" ;endif; ?>
							
						</div>
					</div>
                    -->
				</div>
				<div class="col-md-3">
					<div class="widget wid-tags">
						<div class="heading"><h4>日记类别</h4></div>
						<div class="content">
                      <?php if(is_array($articletype)): $i = 0; $__LIST__ = $articletype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Article/lst','','');?>/type/<?php echo ($vo["id"]); ?>"  style="margin-left:10px;"><?php echo ($vo["type"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
					<!---- Start Widget ---->
					<div class="widget wid-comment">
						<div class="heading"><h4>留言榜</h4></div>
						<div class="content">
                    <?php if(is_array($message)): $i = 0; $__LIST__ = $message;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="post">
								<a href="#">
									<img src="/bridge/Public/img/uploads/userimg/<?php echo ($vo["img"]); ?>" class="img-circle" style="width:50px;height:50px;"/>
								</a>
								<div class="wrapper">
									<a href="#"><h5><?php echo ($vo["content"]); ?></h5></a>
									<ul class="list-inline">
										<li><i class="fa fa-calendar"></i><?php echo (date('Y-m-d',$vo["creattime"])); ?></li> 
									</ul>
								</div>
							</div><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
					<!---- Start Widget ---->

			
					<!---- Start Widget ---->
					
				</div>
			</div>
		</div>
	</div>
    <!-- Footer -->

	<footer>
		<div class="wrap-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-footer footer-1">
						<div class="footer-heading"><h1><span style="color: #fff;">留言</span></h1></div>
						<div class="content">
							<p>请留下你的宝贵意见</p>
							<form method="post">
							    <textarea rows="3" cols="34" style="resize: none;" name="content" id="content"></textarea>
							<?php if($_SESSION['username']!=''): ?><input type="button" value="提交" class="btn btn-3" onclick="pomessage()" />
						    <?php else: ?>
						        <input type="button" value="提交" class="btn btn-3" onClick="window.location.href='<?php echo U('Home/Login/login');?>'" /><?php endif; ?>
							</form>
						</div>
					</div>
					<div class="col-md-4 col-footer footer-2">
						<div class="footer-heading"><h4>日记</h4></div>
						<div class="content">
                      <?php if(is_array($articletype)): $i = 0; $__LIST__ = $articletype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Article/lst','','');?>/type/<?php echo ($vo["id"]); ?>"  style="margin-left:10px;"><?php echo ($vo["type"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
					<div class="col-md-4 col-footer footer-3">
                  <!--
						<div class="footer-heading"><h4>Link List</h4></div>
						<div class="content">
							<ul>
								<li><a href="#">MOST VISITED COUNTRIES</a></li>
								<li><a href="#">5 PLACES THAT MAKE A GREAT HOLIDAY</a></li>
								<li><a href="#">PEBBLE TIME STEEL IS ON TRACK TO SHIP IN JULY</a></li>
								<li><a href="#">STARTUP COMPANY’S CO-FOUNDER TALKS ON HIS NEW PRODUCT</a></li>
							</ul>
						</div>
                 -->
					</div>
				</div>
			</div>
		</div>
		<div class="copy-right">
			<p>Copyright &copy; 2017.个人空间.</p>
		</div>
	</footer>
<!--弹框样式-->
  <link rel="stylesheet" type="text/css" href="/bridge/Public/layer/skin/layer.css">
  <script src="/bridge/Public/layer/layer.js"></script>
<!--弹框样式-->
	<script type="text/javascript">
	function pomessage(){
		var content=$('#content').val();
		var ajaxMessageUrl='<?php echo U("Home/Message/domessage");?>'; 
		if(content==''){
			layer.msg('亲，请输入点内容吧！');
			return false;
		}
		///
		 $.ajax({
      //提交数据的类型 POST GET
        type: "POST",
      //提交的网址
        url: ajaxMessageUrl,
      //提交的数据
        data: {content:content},
      //返回数据的格式
        datatype: "json",
      //成功返回之后调用的函数
        success: function (data) {
      ////根据ajax返回参数判断验证码发送情况
        if(data['status']=="1"){
            layer.msg('留言成功!'); 
            window.location.href="<?php echo U('/Home/Message/lst');?>";
        }else if(data['status']=="-2"){
        	layer.msg('您已被禁言！');  
        }else{
            layer.msg('留言成功失败！');   
        }
      ////根据ajax返回参数判断验证码发送情况
        }
     });
		///
	}
</script>
	</script>
	<!-- Footer -->


	<!-- Footer -->
	
	<!-- JS -->
	<script src="/bridge/Public/home/owl-carousel/owl.carousel.js"></script>
    <script>
    $(document).ready(function() {
      $("#owl-demo-1").owlCarousel({
        autoPlay: 3000,
        items : 1,
        itemsDesktop : [1199,1],
        itemsDesktopSmall : [400,1]
      });
	  $("#owl-demo-2").owlCarousel({
        autoPlay: 3000,
        items : 3,
        
      });
    });
    </script>
	
	
	<script type="text/javascript" src="/bridge/Public/home/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="/bridge/Public/home/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
	<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>
</body>
</html>