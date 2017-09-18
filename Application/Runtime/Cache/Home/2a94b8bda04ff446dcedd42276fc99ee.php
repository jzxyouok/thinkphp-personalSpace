<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo ($webTitle); ?></title>
    <!--
    <link href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    -->
    <link href="/Public/home/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/home/css/font-awesome.min.css" rel="stylesheet">
    <link href="/Public/home/css/animate.min.css" rel="stylesheet"> 
    <link href="/Public/home/css/lightbox.css" rel="stylesheet"> 
    <link href="/Public/home/css/main.css" rel="stylesheet">
    <link href="/Public/home/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="/Public/home/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/Public/home/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/Public/home/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/Public/home/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/Public/home/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body oncontextmenu=self.event.returnValue=false onselectstart="return false">
    <header id="header">      
        <div class="container">
            <div class="row">
                <div class="col-sm-12 overflow">
                   <div class="social-icons pull-right">
                        <ul class="nav nav-pills">
                         <?php if($_SESSION['username'] != ''): ?><a href="<?php echo U('Home/User/lst');?>">
                            <img src="/Public/img/uploads/userimg/<?php echo ($_SESSION['userimg']); ?>" alt="..." class="img-circle" style="width:30px;height:30px;margin-left:15px;margin-botton:20px;">
                        </a>
                            <li><a href="<?php echo U('Login/doout');?>" style="font-size:10px;margin-top:5px;">退出</a></li>
                        <?php else: ?>
                            <li><a href="<?php echo U('Login/login');?>" style="font-size:10px;margin-top:5px;">登陆</a></li>
                            <li><a href="<?php echo U('Login/reg');?>" style="font-size:10px;margin-top:5px;">注册</a></li><?php endif; ?>
                        </ul>
                    </div> 
                </div>
             </div>
        </div>
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                        <h1><img src="/Public/home/images/logo.png" alt="logo"></h1>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="<?php echo ($topStatusOne); ?>"><a href="<?php echo U('Index/index');?>">首页</a></li>
                        <li class="dropdown <?php echo ($topStatustwo); ?>"><a href="">相册 <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                              <?php if(is_array($imgtype)): $key = 0; $__LIST__ = $imgtype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><li><a href="<?php echo U('Image/lst','','');?>/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["type"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </li>                    
                        <li class="dropdown <?php echo ($topStatusthree); ?>"><a href="">日记 <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                              <?php if(is_array($articletype)): $key = 0; $__LIST__ = $articletype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><li><a href="<?php echo U('Article/lst','','');?>/type/<?php echo ($vo["id"]); ?>"><?php echo ($vo["type"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </li>
                        <li class="dropdown <?php echo ($topStatusfour); ?>"><a href="portfolio.html">视频 <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                              <?php if(is_array($viedotype)): $key = 0; $__LIST__ = $viedotype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><li><a href="<?php echo U('Video/lst','','');?>/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </li>                         
                        <li class="<?php echo ($topStatusfive); ?>"><a href="<?php echo U('Home/Message/lst');?>">留言</a></li>                    
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->

    <section id="home-slider">
        <div class="container">
            <div class="row">
                <div class="main-slider">
                    <div class="slide-text">
                    <?php if(is_array($webinformation)): $i = 0; $__LIST__ = $webinformation;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["type"] == indextop): ?><h1><?php echo ($vo["title"]); ?></h1>
                        <p><?php echo ($vo["caption"]); ?></p><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                 <?php if($status == 0): ?><img src="/Public/home/images/home/slider/hill.png" class="slider-hill" alt="slider image">
                    <img src="/Public/home/images/home/slider/house.png" class="slider-house" alt="slider image">
                    <img src="/Public/home/images/home/slider/sun.png" class="slider-sun" alt="slider image">
                 <?php else: ?>
                    <img src="/Public/home/images/home/slider/hill2.png" class="slider-hill" alt="slider image">
                    <img src="/Public/home/images/home/slider/house2.png" class="slider-house" alt="slider image">
                    <img src="/Public/home/images/home/slider/month.png" class="slider-sun" alt="slider image"><?php endif; ?>
                    
                    <img src="/Public/home/images/home/slider/birds1.png" class="slider-birds1" alt="slider image">
                    <img src="/Public/home/images/home/slider/birds2.png" class="slider-birds2" alt="slider image">
                </div>
            </div>
        </div>
        <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
    </section>
    <!--/#home-slider-->
                                <!-- 轮播图 -->
    <section id="team">
        <div class="container">
            <div class="row">
                <div id="team-carousel" class="carousel slide wow fadeIn" data-ride="carousel" data-wow-duration="400ms" data-wow-delay="400ms">
                    <!-- Indicators -->
                    <ol class="carousel-indicators visible-xs">
                        <li data-target="#team-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#team-carousel" data-slide-to="1"></li>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                    <?php if(is_array($lunbo)): foreach($lunbo as $key=>$vo): if($key < 4): ?><div class="col-sm-3 col-xs-6">
                             <div class="team-single-wrapper">
                               <div class="team-single">
                                 <div class="person-thumb">
                                   <img src="/Public/img/uploads/lunbo/<?php echo ($vo["img"]); ?>" class="img-responsive" alt="" style="width: 262px;height: 270px;">
                                 </div>
                                <div class="social-profile">
                                  <ul class="nav nav-pills">
                                    <li><a href="#">I</a></li>
                                    <li><a href="#">LOVE</a></li>
                                    <li><a href="#">YOU</a></li>
                                  </ul>
                                </div>
                               </div>
                               <div class="person-info">
                                 <h2 style="text-align: center;"><?php echo ($vo["content"]); ?>.</h2>
                                 <!-- <p><?php echo ($vo["content"]); ?>.</p> -->
                               </div>
                             </div>
                          </div><?php endif; endforeach; endif; ?>
                        </div>
                        <div class="item">
                         <?php if(is_array($lunbo)): foreach($lunbo as $key=>$vo): if(($key > 3) AND ($key < 9)): ?><div class="col-sm-3 col-xs-6">
                               <div class="team-single-wrapper">
                                <div class="team-single">
                                   <div class="person-thumb">
                                      <img src="/Public/img/uploads/lunbo/<?php echo ($vo["img"]); ?>" class="img-responsive" alt="" style="width: 262px;height: 270px;">
                                   </div>
                                   <div class="social-profile">
                                     <ul class="nav nav-pills">
                                        <li><a href="#">I</a></li>
                                        <li><a href="#">LOVE</a></li>
                                        <li><a href="#">YOU</a></li>
                                     </ul>
                                   </div>
                                </div>
                                <div class="person-info">
                                   <h2 style="text-align: center;"><?php echo ($vo["content"]); ?>.</h2>
                                   <!-- <p><?php echo ($vo["content"]); ?>.</p> -->
                                </div>
                               </div>
                             </div><?php endif; endforeach; endif; ?>
                    </div>
                    </div>
                    <!-- Controls -->
                    <a class="left team-carousel-control hidden-xs" href="#team-carousel" data-slide="prev">left</a>
                    <a class="right team-carousel-control hidden-xs" href="#team-carousel" data-slide="next">right</a>
                </div>
            </div>
        </div>
    </section>
                            <!-- 轮播图 -->
    <!--/#services-->

    <section id="action" class="responsive">
        <div class="vertical-center">
             <div class="container">
                <div class="row">
                    <div class="action take-tour">
                        <div class="col-sm-7 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                        <?php if(is_array($webinformation)): $i = 0; $__LIST__ = $webinformation;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["type"] == indexbanner): ?><h1 class="title"><?php echo ($vo["title"]); ?></h1>
                            <p><?php echo ($vo["caption"]); ?></p><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <div class="col-sm-5 text-center wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                            <div class="tour-button">
                                <a href="<?php echo U('Article/lst','','');?>/type/1" class="btn btn-common">查看更多</a>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#action-->

    <section id="features">
        <div class="container">
            <div class="row">
            <?php if(is_array($article)): $key = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key; if($key == 1): ?><div class="single-features">
                    <div class="col-sm-5 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                        <img src="/Public/img/uploads/fileimg/<?php echo ($vo["img"]); ?>" class="img-responsive" alt="" style="width: 400px;height: 184px;">
                    </div>
                    <div class="col-sm-6 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                        <h2><?php echo ($vo["filename"]); ?></h2>
                        <P><?php echo ($vo["describe"]); ?>.</P>
                    </div>
                </div>
              <?php elseif($key == 2): ?>
                <div class="single-features">
                    <div class="col-sm-6 col-sm-offset-1 align-right wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                        <h2><?php echo ($vo["filename"]); ?></h2>
                        <P><?php echo ($vo["describe"]); ?>.</P>
                    </div>
                    <div class="col-sm-5 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                        <img src="/Public/img/uploads/fileimg/<?php echo ($vo["img"]); ?>" class="img-responsive" alt="" style="width: 427px;height: 140px;">
                    </div>
                </div>
              <?php elseif($key == 3): ?>
                <div class="single-features">
                    <div class="col-sm-5 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                        <img src="/Public/img/uploads/fileimg/<?php echo ($vo["img"]); ?>" class="img-responsive" alt="" style="width: 385x;height: 130px;">
                    </div>
                    <div class="col-sm-6 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                        <h2><?php echo ($vo["filename"]); ?></h2>
                        <P><?php echo ($vo["describe"]); ?>.</P>
                    </div>
                </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </section>
     <!--/#features-->

    <section id="clients">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="clients text-center wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                        <p><img src="/Public/home/images/home/clients.png" class="img-responsive" alt=""></p>
                    <?php if(is_array($webinformation)): $i = 0; $__LIST__ = $webinformation;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["type"] == indexfooter): ?><h1 class="title"><?php echo ($vo["title"]); ?></h1>
                        <p><?php echo ($vo["caption"]); ?></p><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <div class="clients-logo wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <?php if(is_array($imgdata)): $key = 0; $__LIST__ = $imgdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key; if($key < 7): ?><div class="col-xs-3 col-sm-2">
                            <a href="<?php echo U('Image/lst','','');?>/id/<?php echo ($vo["tid"]); ?>"><img src="/Public/img/uploads/imgs/<?php echo ($vo["img"]); ?>" class="img-responsive" alt="" style="width: 130px;height: 130px;"></a>
                        </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
        </div>
     </section>
    <!--/#clients-->
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <img src="/Public/home/images/home/under.png" class="img-responsive inline" alt="">
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="testimonial bottom">
                        <h2>视频</h2>
                        <div class="media">
                <?php if(is_array($newvideo)): $i = 0; $__LIST__ = $newvideo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="media-body">
                           <!-- 存放视频 -->
            <div class="img-thumbnail" style="width: 300px;height:160px;">
                <link href="/Public/video/css/video-js.css" rel="stylesheet">
                <!-- If you'd like to support IE8 -->
                <script src="/Public/video/js/videojs-ie8.min.js"></script>
                <div style="width: 300px;height: 160px;">
                  <video id="my-videos" class="video-js" controls preload="auto" width="290" height="150"
                      poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
                    <source src="/Public/img/uploads/lastvideo/<?php echo ($vo["video"]); ?>" type="video/mp4">
                    <source src="/Public/img/uploads/lastvideo/<?php echo ($vo["video"]); ?>" type="video/webm">
                    <source src="/Public/img/uploads/lastvideo/<?php echo ($vo["video"]); ?>" type="video/ogg">
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
                      </div><?php endforeach; endif; else: echo "" ;endif; ?>
                         </div>  
                    </div> 
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="contact-info bottom">
                        <h2>说明</h2>
                        <address>
                        本网站只属于个人, <br> 
                        用于记录我们的日常, <br> 
                        不涉及商业运营 <br> 
                        不喜勿喷 <br> 
                        </address>

                        <h2>警告</h2>
                        <address>
                        <a href="<?php echo U('Admin/Index/index');?>">
                          <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </a>
                        如若发现账号违规将被禁言 <br> 
                        请遵守规则 <br> 
                        </address>
 
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="contact-form bottom">
                        <h2>你想对博主说的</h2>
                        <form id="main-contact-form" name="contact-form" method="post">
                            <div class="form-group">
                                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="留言内容"></textarea>
                            </div>                        
                            <div class="form-group">
                               <?php if($_SESSION['username']!=''): ?><input type="type"  class="btn btn-submit" value="留言" onclick="pomessage()">
                               <?php else: ?>
                                 <input type="type"  class="btn btn-submit" value="留言" onClick="window.location.href='<?php echo U('Home/Login/login');?>'"><?php endif; ?>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="copyright-text text-center">
                <?php if(is_array($webfooter)): $i = 0; $__LIST__ = $webfooter;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p><?php echo ($vo["titlefrist"]); ?></p>
                        <p><?php echo ($vo["titletwo"]); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->

    
    <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Public/home/js/lightbox.min.js"></script>
    <script type="text/javascript" src="/Public/home/js/wow.min.js"></script>
    <script type="text/javascript" src="/Public/home/js/main.js"></script>   
</body>
</html>
<!--弹框样式-->
  <link rel="stylesheet" type="text/css" href="/Public/layer/skin/layer.css">
  <script src="/Public/layer/layer.js"></script>
<!--弹框样式-->
	<script type="text/javascript">
	function pomessage(){
		var content=$('#message').val();
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
			window.location.reload(); 
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