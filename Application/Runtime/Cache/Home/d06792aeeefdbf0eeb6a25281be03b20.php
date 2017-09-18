<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>小汤圆快到碗里来</title>
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

<body>
    <header id="header">      
        <div class="container">
            <div class="row">
                <div class="col-sm-12 overflow">
                   <div class="social-icons pull-right">
                        <ul class="nav nav-pills">
                         <?php if($_SESSION['username'] != ''): ?><a href="<?php echo U('Home/User/lst');?>">
                            <img src="/Public/img/uploads/userimg/<?php echo ($_SESSION['userimg']); ?>" alt="..." class="img-circle" style="width:30px;height:30px;margin-left:15px;margin-botton:20px;">
                        </a>
                            <li><a href="<?php echo U('Home/Login/doout');?>" style="font-size:10px;margin-top:5px;">退出</a></li>
                        <?php else: ?>
                            <li><a href="<?php echo U('Home/Login/login');?>" style="font-size:10px;margin-top:5px;">登陆</a></li>
                            <li><a href="<?php echo U('Home/Login/doout');?>" style="font-size:10px;margin-top:5px;">注册</a></li><?php endif; ?>
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

                    <a class="navbar-brand" href="<?php echo U('Admin/Index/index');?>">
                        <h1><img src="/Public/home/images/logo.png" alt="logo"></h1>
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="<?php echo ($topStatusOne); ?>"><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
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
    
    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">我的留言</h1>
                            <p>时间轴</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#page-breadcrumb-->
    
    <section id="blog" class="padding-bottom">
        <div class="container">
            <div class="row">
                <div class="timeline-blog overflow padding-top">
                    <div class="timeline-date text-center">
                        <a href="#" class="btn btn-common uppercase">聊天详情</a>
                    </div>

                    <div class="timeline-divider overflow padding-bottom">
                    <!--
                    <?php if(is_array($message)): $i = 0; $__LIST__ = $message;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-sm-6 padding-right arrow-right wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms>
                            <div class="single-blog timeline">
                                <div class="single-blog-wrapper">
                                    <div class="post-thumb">
                                        <img src="/Public/img/uploads/userimg/<?php echo ($vo["userimg"]); ?>" class="img-responsive" alt="" style="width: 60px;height: 60px;">
                                        <div class="post-overlay">
                                           <span class="uppercase"><a href="<?php echo U('Message/messagelist','','');?>/mid/<?php echo ($vo["id"]); ?>"><?php echo ($vo["day"]); ?>  <br><small><?php echo ($vo["month"]); ?></small></a></span>
                                       </div>
                                    </div>
                                </div>
                                <div class="post-content overflow">
                                    <h2 class="post-title bold"><a href="<?php echo U('Message/messagelist','','');?>/mid/<?php echo ($vo["id"]); ?>">发表留言内容：</a></h2>
                                    <h3 class="post-author"></h3>
                                    <p><?php echo ($vo["content"]); ?></p>
                                    <a href="<?php echo U('Message/messagelist','','');?>/mid/<?php echo ($vo["id"]); ?>" class="read-more">View More</a>
                                    <div class="post-bottom overflow">
                                        <span class="post-date pull-left"><?php echo (date('Y-m-d H:i:s',$vo["creattime"])); ?></span>
                                        <span class="comments-number pull-right"><a href="<?php echo U('Message/messagelist','','');?>/mid/<?php echo ($vo["id"]); ?>">用户</a></span>
                                    </div>
                                </div>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    -->
              <?php if(is_array($data)): $key = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><!-- 1-->
                  <?php if($key == 1): ?><div class="col-sm-6 padding-right arrow-right wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
                            <div class="single-blog timeline">
                                <div class="single-blog-wrapper">
                                    <div class="post-thumb">
                                      <?php if($vo["meth"] == 0): ?><img src="/Public/img/uploads/userimg/<?php echo ($vo["img"]); ?>" class="img-responsive" alt="" style="width: 60px;height: 60px;">   
                                      <?php elseif($vo["meth"] == 1): ?>
                                        <img src="/Public/img/uploads/admin/<?php echo ($vo["img"]); ?>" class="img-responsive" alt="" style="width: 60px;height: 60px;"><?php endif; ?>
                                        <div class="post-overlay">
                                           <span class="uppercase"><a href=""><?php echo ($vo["day"]); ?>  <br><small><?php echo ($vo["month"]); ?></small></a></span>
                                       </div>
                                    </div>
                                </div>
                                <div class="post-content overflow">
                                    <h2 class="post-title bold"><a href="">发表留言内容：</a></h2>
                                    <h3 class="post-author"></h3>
                                    <p><?php echo ($vo["content"]); ?></p>
                                    <a href="" class="read-more">View More</a>
                                    <div class="post-bottom overflow">
                                        <span class="post-date pull-left"><?php echo (date('Y-m-d H:i:s',$vo["creattime"])); ?></span>
                                      <?php if($vo["meth"] == 0): ?><span class="comments-number pull-right"><a href="">用户:<?php echo ($vo["name"]); ?></a></span>   
                                      <?php elseif($vo["meth"] == 1): ?>
                                        <span class="comments-number pull-right"><a href="">管理员:<?php echo ($vo["name"]); ?></a></span><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    <?php elseif($key == 2): ?>
                     <!--2-->
                        <div class="col-sm-6 padding-left padding-top arrow-left wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">
                            <div class="single-blog timeline">
                                <div class="single-blog-wrapper">
                                    <div class="post-thumb">
                                      <?php if($vo["meth"] == 0): ?><img src="/Public/img/uploads/userimg/<?php echo ($vo["img"]); ?>" class="img-responsive" alt="" style="width: 60px;height: 60px;">   
                                      <?php elseif($vo["meth"] == 1): ?>
                                        <img src="/Public/img/uploads/admin/<?php echo ($vo["img"]); ?>" class="img-responsive" alt="" style="width: 60px;height: 60px;"><?php endif; ?>
                                        <div class="post-overlay">
                                           <span class="uppercase"><a href=""><?php echo ($vo["day"]); ?> <br><small><?php echo ($vo["month"]); ?></small></a></span>
                                       </div>
                                    </div>
                                </div>
                                <div class="post-content overflow">
                                    <h2 class="post-title bold"><a href="">发表留言内容：</a></h2>
                                    <h3 class="post-author"></h3>
                                    <p><?php echo ($vo["content"]); ?></p>
                                    <a href="" class="read-more">View More</a>
                                    <div class="post-bottom overflow">
                                        <span class="post-date pull-left"><?php echo (date('Y-m-d H:i:s',$vo["creattime"])); ?></span>
                                      <?php if($vo["meth"] == 0): ?><span class="comments-number pull-right"><a href="">用户:<?php echo ($vo["name"]); ?></a></span>   
                                      <?php elseif($vo["meth"] == 1): ?>
                                        <span class="comments-number pull-right"><a href="">管理员:<?php echo ($vo["name"]); ?></a></span><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- 1-->
                  <elseif condition="$key eq 3">
                      <div class="col-sm-6 padding-right arrow-right wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
                            <div class="single-blog timeline">
                                <div class="single-blog-wrapper">
                                    <div class="post-thumb">
                                      <?php if($vo["meth"] == 0): ?><img src="/Public/img/uploads/userimg/<?php echo ($vo["img"]); ?>" class="img-responsive" alt="" style="width: 60px;height: 60px;">   
                                      <?php elseif($vo["meth"] == 1): ?>
                                        <img src="/Public/img/uploads/admin/<?php echo ($vo["img"]); ?>" class="img-responsive" alt="" style="width: 60px;height: 60px;"><?php endif; ?>
                                        <div class="post-overlay">
                                           <span class="uppercase"><a href=""><?php echo ($vo["day"]); ?>  <br><small><?php echo ($vo["month"]); ?></small></a></span>
                                       </div>
                                    </div>
                                </div>
                                <div class="post-content overflow">
                                    <h2 class="post-title bold"><a href="">发表留言内容：</a></h2>
                                    <h3 class="post-author"></h3>
                                    <p><?php echo ($vo["content"]); ?></p>
                                    <a href="" class="read-more">View More</a>
                                    <div class="post-bottom overflow">
                                        <span class="post-date pull-left"><?php echo (date('Y-m-d H:i:s',$vo["creattime"])); ?></span>
                                      <?php if($vo["meth"] == 0): ?><span class="comments-number pull-right"><a href="">用户:<?php echo ($vo["name"]); ?></a></span>   
                                      <?php elseif($vo["meth"] == 1): ?>
                                        <span class="comments-number pull-right"><a href="">管理员:<?php echo ($vo["name"]); ?></a></span><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    <?php elseif($key == 4): ?>
                     <!--2-->
                        <div class="col-sm-6 padding-left padding-top arrow-left wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">
                            <div class="single-blog timeline">
                                <div class="single-blog-wrapper">
                                    <div class="post-thumb">
                                      <?php if($vo["meth"] == 0): ?><img src="/Public/img/uploads/userimg/<?php echo ($vo["img"]); ?>" class="img-responsive" alt="" style="width: 60px;height: 60px;">   
                                      <?php elseif($vo["meth"] == 1): ?>
                                        <img src="/Public/img/uploads/admin/<?php echo ($vo["img"]); ?>" class="img-responsive" alt="" style="width: 60px;height: 60px;"><?php endif; ?>
                                        <div class="post-overlay">
                                           <span class="uppercase"><a href=""><?php echo ($vo["day"]); ?> <br><small><?php echo ($vo["month"]); ?></small></a></span>
                                       </div>
                                    </div>
                                </div>
                                <div class="post-content overflow">
                                    <h2 class="post-title bold"><a href="">发表留言内容：</a></h2>
                                    <h3 class="post-author"></h3>
                                    <p><?php echo ($vo["content"]); ?></p>
                                    <a href="" class="read-more">View More</a>
                                    <div class="post-bottom overflow">
                                        <span class="post-date pull-left"><?php echo (date('Y-m-d H:i:s',$vo["creattime"])); ?></span>
                                      <?php if($vo["meth"] == 0): ?><span class="comments-number pull-right"><a href="">用户:<?php echo ($vo["name"]); ?></a></span>   
                                      <?php elseif($vo["meth"] == 1): ?>
                                        <span class="comments-number pull-right"><a href="">管理员:<?php echo ($vo["name"]); ?></a></span><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div><?php endif; ?>
                  <!-- --><?php endforeach; endif; else: echo "" ;endif; ?>     
                    </div>
                    <div class="text-center">
                        <?php echo ($page); ?>
                    </div>
            <!--   -->
                <div style="text-align: center;">
                  <form method="post">
                     <input type="hidden" class="form-control" id="mid" name="mid" value="<?php echo ($mid); ?>">
                     <textarea name="recontent" id="recontent">
                     </textarea><br/>
                     <center><input class="btn btn-success" type="button"  value="提交" onClick="remessage()"></center>
                  </form>
                </div>
            <!--  -->


                </div>
            </div>
        
        </div>
    </section>
    <!--/#blog-->
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
                <?php if(is_array($newvideo)): $key = 0; $__LIST__ = $newvideo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key; if($vo["open"] < '3' ): if($key > '1' ): ?><div class="media-body">
                           <!-- 存放视频 -->
            <div class="img-thumbnail" style="width: 300px;height:160px;">
                <link href="/Public/video/css/video-js.css" rel="stylesheet">
                <!-- If you'd like to support IE8 -->
                <script src="/Public/video/js/videojs-ie8.min.js"></script>
                <div style="width: 300px;height: 160px;">
                  <video id="my-videos" class="video-js" controls preload="auto" width="290" height="150"
                      poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
                    <source src="/Public/img/uploads/video/<?php echo ($vo["video"]); ?>" type="video/mp4">
                    <source src="/Public/img/uploads/video/<?php echo ($vo["video"]); ?>" type="video/webm">
                    <source src="/Public/img/uploads/video/<?php echo ($vo["video"]); ?>" type="video/ogg">
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
                      </div><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
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
                        如若发现账号违规将被禁言 <br> 
                        请遵守规则 <br> 
                        </address>
 
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="contact-form bottom">
                        <h2>发表你的看法</h2>
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
                        <p>&copy; Your Company 2014. All Rights Reserved.</p>
                        <p>Designed by Themeum</p>
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


   <!--文本编辑器-->
<!--弹框样式-->
  <link rel="stylesheet" type="text/css" href="/Public/layer/skin/layer.css">
  <script src="/Public/layer/layer.js"></script>
<!--弹框样式-->
<!-- 配置文件 -->
  <script type="text/javascript" src="/Public/admin/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
  <script type="text/javascript" src="/Public/admin/ueditor/ueditor.all.js"></script>
  <script type="text/javascript">
      $(function(){
        var ue = UE.getEditor('content',{
            elementPathEnabled :false,
            autoHeightEnabled: false,
            "initialFrameHeight" : 250,
            toolbars: [
            ['fullscreen','undo', 'redo','bold', 'italic', 'underline', 'fontborder', 'strikethrough','emotion']]
            });
            var reue = UE.getEditor('recontent',{
               elementPathEnabled :false,
               autoHeightEnabled: false,
               "initialFrameHeight" : 100,
               toolbars: [['fullscreen','undo', 'redo','bold', 'italic', 'underline', 'fontborder', 'strikethrough','emotion']]
            });
      });
   </script>
   <!-- 回复留言 -->
   <script type="text/javascript">
    function remessage(){
      var mid=$('#mid').val();
      var recontent=UE.getEditor('recontent').getContent();
      var ajaxMessageUrl='<?php echo U("Home/Message/doremessage");?>';
      if(recontent==''){
         layer.msg('亲，请说点什么吧！');
         return false;
      }
///
        $.ajax({
      //提交数据的类型 POST GET
        type: "POST",
      //提交的网址
        url: ajaxMessageUrl,
      //提交的数据
        data: {mid:mid,recontent:recontent},
      //返回数据的格式
        datatype: "json",
      //成功返回之后调用的函数
        success: function (data) {
      ////根据ajax返回参数判断验证码发送情况
        if(data['status']=="1"){
            layer.msg('回复成功!'); 
            window.location.href="<?php echo U('/Home/Message/lst');?>";
        }else if(data['status']=="-2"){
            layer.msg('您已被禁言！');  
        }else{
            layer.msg('回复失败！');   
        }
      ////根据ajax返回参数判断验证码发送情况
        }
     });
        ///
    }
   </script>
  <!-- 回复留言 -->
  <!--文本编辑器-->    
    <!-- JS -->
    <script src="owl-carousel/owl.carousel.js"></script>
    <script>
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
        autoPlay: 3000,
        items : 5,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [979,4]
      });

    });
    </script>