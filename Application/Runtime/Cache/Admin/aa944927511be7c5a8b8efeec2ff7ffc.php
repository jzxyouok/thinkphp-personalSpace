<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="洪壮贤">
    <meta name="keyword" content="洪壮贤">
    <link rel="shortcut icon" href="/Public/admin/img/favicon.html">

    <title>后台管理</title>

    <!-- Bootstrap core CSS -->
    <link href="/Public/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/admin/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/Public/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="/Public/admin/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="/Public/admin/css/style.css" rel="stylesheet">
    <link href="/Public/admin/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
          </div>
          <!--logo start-->
          <a href="#" class="logo" ><span>香香</span>球球</a>
          <!--logo end-->
          <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
              <!-- inbox dropdown start-->
                <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-envelope-alt"></i>
                            <span class="badge bg-important"><?php echo ($datacount); ?></span>
                        </a>
                        <ul class="dropdown-menu extended inbox" id="getmessage">
                            <div class="notify-arrow notify-arrow-red"></div>
                            <li>
                                <p class="red">你有条
                                <span id="messcount"><?php echo ($datacount); ?>
                                </span>留言信息
                                </p>
                            </li>
                <?php if(is_array($messdata)): $i = 0; $__LIST__ = $messdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                      <a href="<?php echo U('Admin/Message/remess','','');?>/id/<?php echo ($vo["id"]); ?>">
                        <span class="photo"><img alt="avatar" src="/Public/img/uploads/userimg/<?php echo ($vo["img"]); ?>"></span>
                        <span class="subject">
                          <span class="from"><?php echo ($vo["username"]); ?></span>
                          <span class="time"><?php echo ($vo["time"]); ?></span>
                        </span>
                        <span class="message">
                          <?php echo ($vo["content"]); ?>
                        </span>
                      </a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    <li>
                      <a href="<?php echo U('Admin/Message/lst');?>">回复留言</a>
                    </li>
                        </ul>
                    </li>
              <!-- inbox dropdown end -->
              <!-- notification dropdown start-->
                    <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="icon-bell-alt"></i>
                            <span class="badge bg-warning"><?php echo ($plcount); ?></span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-yellow"></div>
                            <li>
                                <p class="yellow">你有<?php echo ($plcount); ?>条新的评论</p>
                            </li>
              <?php if(is_array($pldata)): foreach($pldata as $key=>$vo): ?><li>
                                <a href="<?php echo U('Article/articledetails','','');?>/aid/<?php echo ($vo["fid"]); ?>">
                                    <span>
                                      <img alt="avatar" src="/Public/img/uploads/userimg/<?php echo ($vo["userimg"]); ?>" style="width: 29px;height: 29px;">
                                    </span>
                                    <?php echo ($vo["content"]); ?>
                                    <span class="small italic"><?php echo (date('Y-m-d H:i:s',$vo["time"])); ?></span>
                                </a>
                            </li><?php endforeach; endif; ?>               
                            <li>
                                <a href="<?php echo U('Admin/Article/articlelist');?>">日记管理</a>
                            </li>
                        </ul>
                    </li>
              <!-- notification dropdown end -->
          </ul>
          </div>
          <div class="top-nav ">
              <ul class="nav pull-right top-menu">
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <img alt="" src="/Public/img/uploads/admin/<?php echo ($_SESSION['adminimg']); ?>" style="width: 20px;height: 25px;">
                          <span class="username"><?php echo ($_SESSION['adminname']); ?></span>
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu extended logout">
                          <div class="log-arrow-up"></div>
                          <li><a href="<?php echo U('Admin/Image/imglist');?>"><i class=" icon-suitcase"></i>相册</a></li>
                          <li><a data-toggle="modal" data-target=".bs-example-modal-sm"><i class="icon-cog"></i> 密码</a></li>
                          <li><a href="<?php echo U('Admin/Message/lst');?>"><i class="icon-bell-alt"></i>留言</a></li>
                          <li><a href="<?php echo U('Admin/Login/loginout');?>"><i class="icon-key"></i>退出</a></li>
                      </ul>
                  </li>
                  <!-- user login dropdown end -->
              </ul>
          </div>
      </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">
                  <li>
                      <a class="" href="<?php echo U('Admin/Index/index');?>">
                          <i class="icon-dashboard"></i>
                          <span>首页</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-book"></i>
                          <span>文章管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="general.html">日记发表</a></li>
                          <li><a class="" href="buttons.html">日记管理</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-group"></i>
                          <span>用户管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo U('Admin/User/user');?>">新增用户</a></li>
                          <li><a class="" href="<?php echo U('Admin/User/lists');?>">用户列表</a></li>
                          <li><a class="" href="<?php echo U('Admin/User/group');?>">用户组</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-tasks"></i>
                          <span>图片管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li class="active"><a class="" href="<?php echo U('Admin/Image/imglist');?>">图片管理</a></li>
                          <li><a class="" href="<?php echo U('Admin/Image/typelist');?>">分类管理</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu  active">
                      <a href="javascript:;" class="">
                          <i class="icon-th"></i>
                          <span>视频管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo U('Admin/Audio/audiolist');?>">视频管理</a></li>
                          <li><a class="" href="<?php echo U('Admin/Audio/typelist');?>">分类管理</a></li>
                      </ul>
                  </li>
                  <li>
                      <a class="" href="<?php echo U('Admin/Message/lst');?>">
                          <i class="icon-envelope"></i>
                          <span>留言管理</span>
                          <span class="label label-danger pull-right mail-info"><?php echo ($datacount); ?></span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-glass"></i>
                          <span>系统设置</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo U('Admin/Setting/lunbo');?>">轮播设置</a></li>
                          <li><a class="" href="<?php echo U('Admin/Setting/sms');?>">短信配置</a></li>
                          <li><a class="" href="<?php echo U('Admin/Setting/lst');?>">标题设置</a></li>
                      </ul>
                  </li>
                  <li>
                      <a class="" href="<?php echo U('Admin/Login/loginout');?>">
                          <i class="icon-user"></i>
                          <span>用户退出</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <aside class="col-lg-3">
                <!--图片总类-->
                      <h4 class="drg-event-title">主题编辑</h4>
                      <div id='external-events'>
                      <!-- 相册修改 -->
  <section class="panel">
      <header class="panel-heading">
           主题基本信息                 
      </header>
      <div class="panel-body">
  <?php if(is_array($themedata)): $i = 0; $__LIST__ = $themedata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ab): $mod = ($i % 2 );++$i;?><form role="form">
          <div class="form-group">
            <label for="exampleInputEmail1">封面</label>
        <!-- 封面 -->
        <div class="ibox-content">
          <div class="row">
            <div id="crop-avatar" class="col-md-6">
              <div class="avatar-view" style="width:60px;height:60px">
                <input  id="img" name="img" type="hidden" value="<?php echo ($vo["user_img"]); ?>">
                <input  id="aspectRatio" type="hidden" value="1">
                <input  id="img_root_url" type="hidden" value="/Public/img/uploads/theme">
                <img src="/Public/img/uploads/theme/<?php echo ($ab["img"]); ?>" alt="点击修改图片" style="width:60px;height:60px">
              </div>
            </div>
          </div>
        </div>
        <!-- 封面 -->
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">主题名</label>
            <input type="text" class="form-control" id="alubmname" name="alubmname" placeholder="相册名" value="<?php echo ($ab["name"]); ?>">
            <input type="hidden" class="form-control" id="alubmid" name="alubmid"  value="<?php echo ($ab["id"]); ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">主题状态</label><br/>
    <?php if($ab["status"] == 1): ?><select class="form-control m-bot15" id="status" name="status">
              <option  value="1">公开</option>
              <option  value="0">保密</option>
            </select>
    <?php else: ?> 
            <select class="form-control m-bot15" id="status" name="status">
              <option  value="0">保密</option>
              <option  value="1">公开</option>   
            </select><?php endif; ?>
          </div>
          <button type="button" class="btn btn-info" onclick="edittheme()">修改</button>
          <button type="button" class="btn btn-danger" onclick="deletetheme()">删除</button>
        </form><?php endforeach; endif; else: echo "" ;endif; ?>
      </div>
  </section>                    
                      <!-- 相册修改 -->
                      </div>
                 <!--图片总类-->
                  </aside>
                  <aside class="col-lg-9">
                      <section class="panel">
                          <div class="panel-body">
                              <div class="panel-body">
                                 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">上传视频</button>
                              </div>
                              <div id="calendar" class="has-toolbar"></div>
                             <!--相册-->
                      <!-- **************-->
  <div class="bs-example" data-example-id="thumbnails-with-custom-content">
    <div class="row">
    <?php if(is_array($data)): foreach($data as $key=>$vo): ?><div class="col-sm-6 col-md-4" style="width: 390px;height: 260px;margin-top: 10px;">
        <div class="thumbnail">
        <!-- 视频 -->
  <link href="/Public/video/css/video-js.css" rel="stylesheet">
  <!-- If you'd like to support IE8 -->
  <script src="/Public/video/js/videojs-ie8.min.js"></script>
          <div style="width:380px;height:200px;">
            <video id="my-video" class="video-js" controls preload="auto" width="350" height="200"
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
<!--           <video width="230" height="200" controls>
            <source src="/Public/img/uploads/video/<?php echo ($vo["video"]); ?>" type="video/mp4">
            <source src="/Public/img/uploads/video/<?php echo ($vo["video"]); ?>" type="video/ogg">
            <source src="/Public/img/uploads/video/<?php echo ($vo["video"]); ?>" type="video/webm">
            <source src="/Public/img/uploads/video/<?php echo ($vo["video"]); ?>" type="video/wmv">
            <object data="movie.mp4" width="230" height="200">
              <embed src="/Public/img/uploads/video/<?php echo ($vo["video"]); ?>" width="230" height="200">
            </object> 
          </video> -->
          <!-- 视频 -->
          <div class="caption" style="padding-left:15px;">
            <p><a href="#" class="btn btn-primary" role="button" onClick="window.location.href='<?php echo U('Audio/update','','');?>/id/<?php echo ($vo["id"]); ?>'">修改</a> 
            <a onClick="window.location.href='<?php echo U('Audio/deletevideo','','');?>/id/<?php echo ($vo["id"]); ?>'" class="btn btn-default" role="button">删除</a></p>
          </div>
        </div>
      </div><?php endforeach; endif; ?>
      <!--  -->
    </div>
    <div style="text-align:center;padding-top:30px;">
       <?php echo ($page); ?>
    </div>
  </div>
              <!-- ************* -->

                         <!--  <?php if(is_array($result)): foreach($result as $key=>$alubm): ?><img src="/Public/img/uploads/alumb/<?php echo ($alubm["img"]); ?>" alt="<?php echo ($alubm["name"]); ?>" class="img-thumbnail" style="width:120px;height:120px;cursor:default;"  onClick="window.location.href='<?php echo U('Image/imgs','','');?>/id/<?php echo ($alubm["id"]); ?>'"><?php endforeach; endif; ?> -->
                             <!--相册-->
                          </div>
                      </section>
                  </aside>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
  <script src="/Public/admin/js/jquery.js"></script>

 <!-- <script src="/Public/admin/assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>  -->
  <script src="/Public/admin/js/bootstrap.min.js"></script>
  <script src="/Public/admin/js/jquery.scrollTo.min.js"></script>
  <script src="/Public/admin/js/jquery.nicescroll.js" type="text/javascript"></script>

    <!--common script for all pages-->
    <script src="/Public/admin/js/common-scripts.js"></script>

    <!--script for this page only-->
    <script src="/Public/admin/js/external-dragging-calendar.js"></script>
 <!---相册封面模态框-->
<link href="/Public/img_cut_upload/css/cropper.min.css" rel="stylesheet">
<link href="/Public/img_cut_upload/css/sitelogo.css" rel="stylesheet">
<script src="/Public/img_cut_upload/js/cropper.min.js"></script>
<script src="/Public/img_cut_upload/js/sitelogo.js"></script>
<div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-lg"  style="width:1000px;">
    <div class="modal-content">
      <form class="avatar-form" action="<?php echo U('Audio/postthemeimg',array('id'=>$aid));?>" enctype="multipart/form-data" method="post">
        <div class="modal-header">
          <button class="close" data-dismiss="modal" type="button">&times;</button>
          <h4 class="modal-title" id="avatar-modal-label">相册封面</h4>
        </div>
        <div class="modal-body">
          <div class="avatar-body">
            <div class="avatar-upload">
              <input class="avatar-src" name="avatar_src" id="avatar_src" type="hidden">
              <input class="avatar-data" name="avatar_data" type="hidden">
              <label for="avatarInput">图片上传</label>
              <input class="avatar-input" id="avatarInput" name="avatar_file" type="file" style="display:none;"></div>
              <img src="/Public/images/shangchuang.png" onclick="$('#avatarInput').click();">
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
<!---相册封面模态框-->
 <!--新增相册模态框-->
 <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">上传视频</h4>
      </div>
   <form role="form" action="<?php echo U('Audio/addvideo');?>" enctype="multipart/form-data" method="post">
      <div class="modal-body">
        <!--内容区-->
            <div class="form-group">
               <label for="exampleInputEmail1">名称</label>
               <input type="text" class="form-control" id="videoname" name="videoname" placeholder="名称">
            </div>
            <div class="form-group">
               <label for="exampleInputEmail1">描述</label>
               <input type="text" class="form-control" id="describe" name="describe" placeholder="描述">
               <input type="hidden" class="form-control" id="aid" name="aid" value="<?php echo ($aid); ?>">
            </div>
            <div class="form-group">
               <label for="exampleInputFile">视频地址</label>
               <input type="file" id="videourl" name="videourl"> 
            </div>
        <!--内容区-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">添加</button>
      </div>
   </form>
    </div>
  </div>
</div>
<!--新增相册模态框-->
<!-- 修改相册信息 -->
<!--弹框样式-->
  <link rel="stylesheet" type="text/css" href="/Public/layer/skin/layer.css">
  <script src="/Public/layer/layer.js"></script>
<!--弹框样式-->
<!-- 密码修改 -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
       <!--  -->
      <section class="panel">
        <header class="panel-heading">
                              密码修改
        </header>
        <div class="panel-body">
          <form class="form-horizontal" role="form">
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">密码</label>
              <div class="col-lg-10">
               <input type="password" class="form-control" id="pwd" name="pwd" placeholder="密码">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword1" class="col-lg-2 control-label">重复密码</label>
              <div class="col-lg-10">
                <input type="password" class="form-control" id="pwds" name="pwds" placeholder="重复密码">
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
                <button type="button" class="btn btn-danger" onclick="editpwd()">修改</button>
              </div>
            </div>
          </form>
        </div>
      </section>
       <!--  -->
    </div>
  </div>
</div>
<script type="text/javascript">
    function editpwd(){
      var pwd=$('#pwd').val();
      var pwds=$('#pwds').val();
      var ajaxeditpwdUrl='<?php echo U("Index/editpwd");?>'; 
      if((pwd=='')||(pwds=='')){
          layer.msg('密码不允许为空');
      }
      if((pwd!='')&&(pwds!='')){
          if(pwd!=pwds){
            layer.msg('两次密码不一致');
          }else{
        /*ajax提交*/
        $.ajax({
      //提交数据的类型 POST GET
        type: "POST",
      //提交的网址
        url: ajaxeditpwdUrl,
      //提交的数据
        data: {pwd:pwd},
      //返回数据的格式
        datatype: "json",
      //成功返回之后调用的函数
        success: function (data) {
      ////根据ajax返回参数判断验证码发送情况
        if(data['status']=="1"){
            layer.msg('修改成功!'); 
            window.location.href="<?php echo U('/Admin/Login/login');?>";
        }else{
            layer.msg('没有修改！');   
        }
      ////根据ajax返回参数判断验证码发送情况
        }
     });
        /*ajax提交*/ 
          }
      }
    }
</script>
<!-- 密码修改 -->
<script type="text/javascript">
//修改相册信息
    function edittheme(){
       var alubmid=$('#alubmid').val();
       var alubmname=$('#alubmname').val();
       var alubmstatus=$('#status').val();
       var ajaxalumbUrl='<?php echo U("Audio/edittheme");?>'; 
       if(alubmname==''){
         layer.msg('请填写主题名称');
         window.location.reload();
       }
      // <!-- ajax提交 -->
      $.ajax({
      //提交数据的类型 POST GET
        type: "POST",
      //提交的网址
        url: ajaxalumbUrl,
      //提交的数据
        data: {alubmid: alubmid,alubmname:alubmname,alubmstatus:alubmstatus},
      //返回数据的格式
        datatype: "json",
      //成功返回之后调用的函数
        success: function (data) {
      ////根据ajax返回参数判断验证码发送情况
        if(data['status']=="1"){
            layer.msg('修改成功!'); 
            window.location.reload();
        }else{
            layer.msg('没有修改！');   
        }
      ////根据ajax返回参数判断验证码发送情况
        }
     });
  // <!-- ajax提交 -->
    }
//删除相册
  function deletetheme(){
    var alubmid=$('#alubmid').val();
    var ajaxalumbUrl='<?php echo U("Admin/Audio/deletetheme");?>';
    // <!-- ajax提交 -->
      $.ajax({
      //提交数据的类型 POST GET
        type: "POST",
      //提交的网址
        url: ajaxalumbUrl,
      //提交的数据
        data: {alubmid: alubmid},
      //返回数据的格式
        datatype: "json",
      //成功返回之后调用的函数
        success: function (data) {
      ////根据ajax返回参数判断验证码发送情况
        if(data['status']=="1"){
            layer.msg('删除成功!'); 
            window.location.href="<?php echo U('Audio/audios');?>";
        }else{
            layer.msg('删除失败！');   
        }
      ////根据ajax返回参数判断验证码发送情况
        }
     });
  // <!-- ajax提交 --> 
  }
</script>
<!-- 修改相册信息 -->
  </body>
</html>