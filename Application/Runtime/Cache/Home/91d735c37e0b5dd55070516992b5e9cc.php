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

 <?php if(is_array($date)): $i = 0; $__LIST__ = $date;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title"><?php echo ($vo["filename"]); ?></h1>
                        </div>                                                                                
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#page-breadcrumb-->

    <section id="blog-details" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <div class="row">
                         <div class="col-md-12 col-sm-12">
                            <div class="single-blog blog-details two-column">
                                <div class="post-thumb">
                                    <img class="img-thumbnail" src="/Public/img/uploads/fileimg/<?php echo ($vo["img"]); ?>" style="width: 850px;height: 400px;">
                                    <div class="post-overlay">
                                        <span class="uppercase"><a href=""><?php echo ($vo["day"]); ?><br><small><?php echo ($vo["month"]); ?></small></a></span>
                                    </div>
                                </div>
                                <div class="post-content overflow">
                                    <h2 class="post-title bold"><?php echo ($vo["describe"]); ?></h2>
                                    <h3 class="post-author"><a href="#"><?php echo (date('Y-m-d H:i:s',$vo["publishtime"])); ?></a></h3>
                                    <p><?php echo ($vo["content"]); ?></p>
                                    <div class="post-bottom overflow">
                                        <ul class="nav navbar-nav post-nav">
                                            <li><a href="#"><i class="fa fa-tag"></i><?php echo ($vo["filetype"]); ?></a></li>
                                            <li><a href="#"><i class="fa fa-users"></i><?php echo ($vo["reader"]); ?></a></li>
                                            <li><a onClick="sendGo(<?php echo ($vo["id"]); ?>)"><i class="fa fa-thumbs-up"></i><?php echo ($vo["thumbs"]); ?></a></li>
                                        </ul>
                                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                    <div class="blog-share">
                                        <span class='st_facebook_hcount'></span>
                                        <span class='st_twitter_hcount'></span>
                                        <span class='st_linkedin_hcount'></span>
                                        <span class='st_pinterest_hcount'></span>
                                        <span class='st_email_hcount'></span>
                                    </div>                              
                                    <div class="response-area">
                                    <h2 class="bold">评论</h2>
                                    <ul class="media-list">
                               <?php if(is_array($pinglun)): $i = 0; $__LIST__ = $pinglun;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="media" style="margin-left:-55px;height:130px;">
                                            <div class="post-comment">
                                                <a class="pull-left" href="#" style="width:86px;">
                                                    <img src="/Public/img/uploads/userimg/<?php echo ($vo["userimg"]); ?>" style="width: 66px;height: 66px;" />
                                                </a>
                                                <div class="media-body">
                                                    <span><i class="fa fa-user"></i>Posted by <a href="#"><?php echo ($vo["username"]); ?></a></span>
                                                    <p style="font-size:18px;"><?php echo ($vo["content"]); ?></p>
                                                    <ul class="nav navbar-nav post-nav">
                                                        <li><a href="#"><i class="fa fa-clock-o"></i><span style="font-size:10px;"><?php echo (date('Y-m-d H:i:s',$vo["time"])); ?></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li><?php endforeach; endif; else: echo "" ;endif; ?>         
                                    </ul>                   
                                </div><!--/Response-area-->
                                <div style="text-align:center;"><?php echo ($page); ?></div>
                                </div>
                               <!-- -->
                               <div>
				   <form method="post">
				      <input type="hidden" class="form-control" id="rjid" name="rjid" value="<?php echo ($artcileid); ?>">
					  <textarea name="content" id="content">
					  </textarea>
					  <center>
                      <?php if($_SESSION['username'] == ''): ?><input class="btn btn-submit" type="button"  value="提交" onClick="window.location.href='<?php echo U('Home/Login/login');?>'" style="float: left;margin-top: 5px;width:150px;">    
                      <?php else: ?>
                          <input class="btn btn-submit" type="button"  value="提交" onClick="dopinglun()" style="float: left;margin-top: 5px;width:150px;"><?php endif; ?>
                      </center>
				   </form>
                   <br/>
			                   </div>
                               <!-- -->
                            </div>
                        </div>
                    </div>
                 </div>
                <div class="col-md-3 col-sm-5">
                    <div class="sidebar blog-sidebar">
                        <div class="sidebar-item  recent">
                            <h3>同类日记</h3>
                  <?php if(is_array($filedata)): $i = 0; $__LIST__ = $filedata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="media">
                                <div class="pull-left">
                                    <a href="<?php echo U('Article/articlelist','','');?>/rid/<?php echo ($vo["id"]); ?>"><img src="/Public/img/uploads/fileimg/<?php echo ($vo["img"]); ?>" style="width: 52px;height: 52px;" /></a>
                                </div>
                                <div class="media-body">
                                    <h4><a href="<?php echo U('Article/articlelist','','');?>/rid/<?php echo ($vo["id"]); ?>"><?php echo ($vo["describe"]); ?></a></h4>
                                    <p><?php echo (date('Y-m-d H:i:s',$vo["publishtime"])); ?></p>
                                </div>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            
                        </div>
                        <div class="sidebar-item categories">
                            <h3>分类</h3>
                            <ul class="nav navbar-stacked">
                     <?php if(is_array($articletype)): $key = 0; $__LIST__ = $articletype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><li><a href="<?php echo U('Article/lst','','');?>/type/<?php echo ($vo["id"]); ?>"><?php echo ($vo["type"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#blog-->
    <!-- -->
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


    <script src="owl-carousel/owl.carousel.js"></script>
	<!--  配置文件 -->
    <script type="text/javascript" src="/Public/admin/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/Public/admin/ueditor/ueditor.all.js"></script>
    <script type="text/javascript">
       $(function(){
           var ue = UE.getEditor('content',{
              elementPathEnabled :false,
              autoHeightEnabled: false,
              "initialFrameHeight" : 100,
			  toolbars: [
           ['fullscreen','undo', 'redo','bold', 'italic', 'underline', 'fontborder', 'strikethrough','emotion']
]
          });
      });      
    </script>
    <!--弹框样式-->
      <link rel="stylesheet" type="text/css" href="/Public/layer/skin/layer.css">
      <script src="/Public/layer/layer.js"></script>
    <!--弹框样式-->
    <script type="text/javascript">
	   function dopinglun(){
         var content=UE.getEditor('content').getContent();
         var fid=$('#rjid').val();
	     var ajaxcontentUrl='<?php echo U("Home/Article/dopinglun");?>';
	     // ajax提交
	     $.ajax({
         //提交数据的类型 POST GET
             type: "POST",
         //提交的网址
             url: ajaxcontentUrl,
         //提交的数据
             data: {fid:fid,content:content},
         //返回数据的格式
             datatype: "json",
         //成功返回之后调用的函数
             success: function (data) {
         ////根据ajax返回参数判断验证码发送情况
               if(data['status']=="1"){
                 layer.msg('评论成功!'); 
                 window.location.href="<?php echo U('Home/Article/articlelist','','');?>/rid/<?php echo ($artcileid); ?>";
               }else if(data['status']=="-2"){
        	     layer.msg('您已被禁言！');  
               }else{
                 layer.msg('评论失败！');   
               }
      ////根据ajax返回参数判断验证码发送情况
             }
            });
	  // ajax提交
	     }
    </script>
    <script type="text/javascript">
        function sendGo($id){
           var id=$id;
           var ajaxcontentUrl='<?php echo U("Home/Article/sendGood");?>';
         // ajax提交
         $.ajax({
         //提交数据的类型 POST GET
             type: "POST",
         //提交的网址
             url: ajaxcontentUrl,
         //提交的数据
             data: {fid:id},
         //返回数据的格式
             datatype: "json",
         //成功返回之后调用的函数
             success: function (data) {
         ////根据ajax返回参数判断验证码发送情况
               if(data['status']=="1"){
                 layer.msg('点赞成功!'); 
                 window.location.href="<?php echo U('Home/Article/articlelist','','');?>/rid/<?php echo ($artcileid); ?>";
               }else{
                 layer.msg('点赞失败！');   
               }
      ////根据ajax返回参数判断验证码发送情况
             }
            });
      // ajax提交

        }
    </script>
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
    <!-- ->