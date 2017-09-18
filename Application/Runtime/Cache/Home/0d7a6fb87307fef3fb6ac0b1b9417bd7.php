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
    <link href="/bridge/Public/home/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bridge/Public/home/css/font-awesome.min.css" rel="stylesheet">
    <link href="/bridge/Public/home/css/animate.min.css" rel="stylesheet"> 
    <link href="/bridge/Public/home/css/lightbox.css" rel="stylesheet"> 
    <link href="/bridge/Public/home/css/main.css" rel="stylesheet">
    <link href="/bridge/Public/home/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="/bridge/Public/home/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/bridge/Public/home/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/bridge/Public/home/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/bridge/Public/home/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/bridge/Public/home/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
    <header id="header">      
        <div class="container">
            <div class="row">
                <div class="col-sm-12 overflow">
                   <div class="social-icons pull-right">
                        <ul class="nav nav-pills">
                         <?php if($_SESSION['username'] != ''): ?><a href="<?php echo U('Home/User/lst');?>">
                            <img src="/bridge/Public/img/uploads/userimg/<?php echo ($_SESSION['userimg']); ?>" alt="..." class="img-circle" style="width:30px;height:30px;margin-left:15px;margin-botton:20px;">
                        </a>
                            <li><a href="<?php echo U('Home/Login/doout');?>" style="font-size:10px;margin-top:5px;">退出</a></li>
                        <?php else: ?>
                            <li><a href="<?php echo U('Home/Login/login');?>" style="font-size:10px;margin-top:5px;">登陆</a></li>
                            <li><a href="<?php echo U('Home/Login/reg');?>" style="font-size:10px;margin-top:5px;">注册</a></li><?php endif; ?>
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
                        <h1><img src="/bridge/Public/home/images/logo.png" alt="logo"></h1>
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

<body>
     <section id="coming-soon">        
         <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">                    
                    <div class="text-center coming-content">
                        <h1>个人中心</h1>
                        <p>你可以在个人中心查看个人账号基本信息<br /> 或者修改个人基本信息.</p>                           
                        <div class="social-link">
                        </div>
                    </div>                    
                </div>
                <div class="col-sm-12">
                    <div class="time-count">
                <!--            主体       -->
                        <div id="countdown">
                           <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><form method="post" class="form-horizontal">
                       <div class="form-group">
                          <label for="" class="col-sm-2 control-label">头像</label>
                          <div class="col-sm-10">
                                  <!--  头像   -->
                            <div class="ibox-content">
                               <div class="row">
                                  <div id="crop-avatar" class="col-md-6">
                                    <div class="avatar-view" style="width:100px;height:100px">
                                      <input  id="img" name="img" type="hidden" value="<?php echo ($vo["user_img"]); ?>">
                                      <input  id="aspectRatio" type="hidden" value="1">
                                      <input  id="img_root_url" type="hidden" value="/bridge/Public/img/uploads/userimg">
                                      <img src="/bridge/Public/img/uploads/userimg/<?php echo ($img); ?>" alt="点击修改图片" style="width:100px;height:100px">
                                     </div>
                                   </div>
                                </div>
                            </div>      
                                  <!--  头像   -->
                          </div>
                       </div>
                       <div class="form-group">
                          <label for="" class="col-sm-2 control-label">用户名</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" placeholder="用户名" name="username" value="<?php echo ($vo["username"]); ?>">
                          </div>
                       </div>
                       <div class="form-group">
                          <label for="" class="col-sm-2 control-label">密码</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password" placeholder="加密不可见">
                          </div>               
                       </div>
                       <div class="form-group">
                          <label for="" class="col-sm-2 control-label">手机号</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="手机号码" value="<?php echo ($vo["phone"]); ?>">
                          </div>
                       </div>
                       <button type="button" class="btn btn-default btn-success" onClick="updateuser()">修改</button>
                       <div class="form-group">
                       </div>
                    </form>                                         
                        </ul><?php endforeach; endif; else: echo "" ;endif; ?>     
                <!--            主体                          --> 
                    </div>
                </div>
            </div>
        </div>       
    </section>
<!-- footer -->
     <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <img src="/bridge/Public/home/images/home/under.png" class="img-responsive inline" alt="">
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="testimonial bottom">
                        <h2>视频</h2>
                        <div class="media">
                <?php if(is_array($newvideo)): $key = 0; $__LIST__ = $newvideo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key; if($vo["open"] < '3' ): if($key > '1' ): ?><div class="media-body">
                           <!-- 存放视频 -->
            <div class="img-thumbnail" style="width: 300px;height:160px;">
                <link href="/bridge/Public/video/css/video-js.css" rel="stylesheet">
                <!-- If you'd like to support IE8 -->
                <script src="/bridge/Public/video/js/videojs-ie8.min.js"></script>
                <div style="width: 300px;height: 160px;">
                  <video id="my-videos" class="video-js" controls preload="auto" width="290" height="150"
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
    <script type="text/javascript" src="/bridge/Public/home/js/lightbox.min.js"></script>
    <script type="text/javascript" src="/bridge/Public/home/js/wow.min.js"></script>
    <script type="text/javascript" src="/bridge/Public/home/js/main.js"></script>   
</body>
</html>
<!--弹框样式-->
  <link rel="stylesheet" type="text/css" href="/bridge/Public/layer/skin/layer.css">
  <script src="/bridge/Public/layer/layer.js"></script>
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


      <!---头像模态框  -->
<link href="/bridge/Public/img_cut_upload/css/cropper.min.css" rel="stylesheet">
<link href="/bridge/Public/img_cut_upload/css/sitelogo.css" rel="stylesheet">
<script src="/bridge/Public/img_cut_upload/js/cropper.min.js"></script>
<script src="/bridge/Public/img_cut_upload/js/sitelogo.js"></script>
<div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-lg"  style="width:1000px;">
    <div class="modal-content">
      <form class="avatar-form" action="<?php echo U('Admin/User/postimg',array('id'=>$uid));?>" enctype="multipart/form-data" method="post">
        <div class="modal-header">
          <button class="close" data-dismiss="modal" type="button">&times;</button>
          <h4 class="modal-title" id="avatar-modal-label">用户头像</h4>
        </div>
        <div class="modal-body">
          <div class="avatar-body">
            <div class="avatar-upload">
              <input class="avatar-src" name="avatar_src" id="avatar_src" type="hidden">
              <input class="avatar-data" name="avatar_data" type="hidden">
              <label for="avatarInput">图片上传</label>
              <input class="avatar-input" id="avatarInput" name="avatar_file" type="file" style="display:none;"></div>
              <img src="/bridge/Public/images/shangchuang.png" onclick="$('#avatarInput').click();">
            <div class="row">
              <div class="col-md-9">
                <div class="avatar-wrapper"></div>
              </div>
              <div class="col-md-3">
                <div class="avatar-preview preview-lg"></div>
                <div class="avatar-preview preview-md"></div>
                <div class="avatar-preview preview-sm"></div>
              </div>
            </div>
            <div class="row avatar-btns">
              <div class="col-md-9">
                <div class="btn-group">
                  <button class="btn" data-method="rotate" data-option="-90" type="button" title="Rotate -90 degrees"><i class="fa fa-undo"></i> 向左旋转</button>
                </div>
                <div class="btn-group">
                  <button class="btn" data-method="rotate" data-option="90" type="button" title="Rotate 90 degrees"><i class="fa fa-repeat"></i> 向右旋转</button>
                </div>
              </div>
              <div class="col-md-3">
                <button class="btn btn-success btn-block avatar-save" type="submit"><i class="fa fa-save"></i> 保存修改</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
<!---头像模态框-->
<!--文本编辑器-->
<!--弹框样式-->
  <link rel="stylesheet" type="text/css" href="/bridge/Public/layer/skin/layer.css">
  <script src="/bridge/Public/layer/layer.js"></script>
<!--弹框样式-->
<!-- 配置文件 -->
<script type="text/javascript" src="/bridge/Public/admin/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/bridge/Public/admin/ueditor/ueditor.all.js"></script>

<script type="text/javascript">
    function updateuser(){
        var username=$('#username').val();
        var userid=$('#userid').val();
        var password=$('#password').val();
        var phone=$('#phone').val();
        var ajaxuserUrl='<?php echo U("Home/User/edituser");?>'; 
        if(username==''){
            layer.msg('用户名不允许为空！');
            return false;
        }
        if(phone==''){
            layer.msg('手机号码不允许为空！');
            return false;
        }
        ///
        $.ajax({
      //提交数据的类型 POST GET
        type: "POST",
      //提交的网址
        url: ajaxuserUrl,
      //提交的数据
        data: {username:username,userid:userid,password:password,phone:phone},
      //返回数据的格式
        datatype: "json",
      //成功返回之后调用的函数
        success: function (data) {
      ////根据ajax返回参数判断验证码发送情况
        if(data['status']=="1"){
            layer.msg('修改成功!'); 
            window.location.href="<?php echo U('/Home/User/lst');?>";
        }else if(data['status']=="-1"){
            layer.msg('存在该用户名！');  
        }else if(data['status']=="-2"){
            layer.msg('存在该手机号码！');  
        }else{
            layer.msg('修改失败！');   
        }
      ////根据ajax返回参数判断验证码发送情况
        }
     });
        ///
    }
</script>