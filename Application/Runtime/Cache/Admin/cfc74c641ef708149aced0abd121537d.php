<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="洪壮贤">
    <meta name="keyword" content="洪壮贤">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>管理员登陆</title>

    <!-- Bootstrap core CSS -->
    <link href="/Public/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/admin/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/Public/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="/Public/admin/css/style.css" rel="stylesheet">
    <link href="/Public/admin/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

    <div class="container">

      <form class="form-signin">
        <h2 class="form-signin-heading">找回密码</h2>
        <div class="login-wrap">
            <input type="text" class="form-control" placeholder="手机号码" autofocus name="userphone" id="userphone">
        <div class="form-inline">
            <input type="text" class="form-control" placeholder="验证码" name="code" id="code" style="width: 60%;">
            <input onclick="onsend()" id="send" value="获取验证码" type="button" style="width: 38%;height: 39px;margin-bottom: 15px;" class="btn btn-success">
        </div>
            <label class="checkbox">
                <span class="pull-right"> <a href="<?php echo U('Admin/login/login');?>"> Existing Account?</a></span>
            </label>
              <button class="btn btn-lg btn-login btn-block" type="button" onclick="onsure()">登陆</button>
            <!-- <p>or you can sign in via social network</p>
            <div class="login-social-link">
                <a href="index.html" class="facebook">
                    <i class="icon-facebook"></i>
                    Facebook
                </a>
                <a href="index.html" class="twitter">
                    <i class="icon-twitter"></i>
                    Twitter
                </a> -->
            </div>

        </div>

      </form>

    </div>
<script src="/Public/admin/js/jquery.js"></script>
<script src="/Public/admin/js/jquery-1.8.3.min.js"></script>
<!--弹框样式-->
<link rel="stylesheet" type="text/css" href="/Public/layer/skin/layer.css">
<script src="/Public/layer/layer.js"></script>
<!--弹框样式-->
<script type="text/javascript">
    // 获取验证码
function onsend(){
  var ajaxSidUrl='<?php echo U("Admin/Login/zhmmsend");?>';
  var userphone = $("#userphone").val();
//判断用户手机是否为空
  if(userphone.length==0){     
     layer.msg('手机号不允许为空!');     
  }else{
//用户手机不为空
     var reg=/^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;
     isok= reg.test(userphone);
     if (!isok) {
       layer.msg('请输入正确的手机号!');        
       return false;
     } 
///提交ajax
    $.ajax({
     //提交数据的类型 POST GET
        type: "POST",
       //提交的网址
        url: ajaxSidUrl,
       //提交的数据
        data: {phone: userphone},
       //返回数据的格式
        datatype: "json",//"xml", "html", "script", "json", "jsonp", "text".
       //成功返回之后调用的函数
        success: function (data) {
      ////根据ajax返回参数判断验证码发送情况
          if(data['status']=="1"){
            layer.msg('短信已成功发送!'); 
          }else if(data['status']=="-1"){
            layer.msg('不存在该用户!');         
          }else if(data['status']=="-2"){
            layer.msg('该手机24小时内只能接收10条!'); 
          }else if(data['status']=="-4"){
            layer.msg('一分钟内只允许发送一条短信!'); 
          }else{
             layer.msg('未知错误!');   
          }
      ////根据ajax返回参数判断验证码发送情况
        }
    });
///提交ajax结束  
///60秒限制    
    settime();
///60秒限制       
  }
//手机号码不为空结束
}
/*  发送验证码请求类 */
/* 倒计时时间类 */
    // var iTime = 60; 
    if(<?php echo ($showtime); ?>>59){
      var iTime=60;
    }else{
      var iTime=60-<?php echo ($showtime); ?>;   
    }   
    var Account;
    function settime(){
      document.getElementById('send').disabled = true;
      var iSecond,sSecond="",sTime="";
      if (iTime >= 0){
          iSecond = parseInt(iTime%60);
          iMinute = parseInt(iTime/60)
          if (iSecond >= 0){
            if(iMinute>0){
                sSecond = iMinute + "分" + iSecond + "秒";
              }else{
                sSecond = iSecond + "秒";
              }
            }
            sTime="倒计时"+sSecond;
            if(iTime==0){
                clearTimeout(Account);
                sTime='获取验证码';
                iTime = 60;
                document.getElementById('send').disabled = false;
            }else{
                Account = setTimeout("settime()",1000);
                iTime=iTime-1;
                 
            }
        }else{
           sTime='获取验证码';
           
        }
        document.getElementById('send').value = sTime;
    }   
    // 获取验证码
</script>
<script type="text/javascript">
    //进行验证码判断
    function onsure(){
      var code=$('#code').val();
      var phone=$('#userphone').val();
      var ajaxSidUrl='<?php echo U("Admin/Login/onsure");?>'; 
      if(code==''){
         layer.msg('验证码不允许为空！');
         return false;
      }
      if(phone==''){
         layer.msg('手机号码不允许为空！');
         return false;
      }else{
         var reg=/^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;
         isok= reg.test(phone);
         if (!isok) {
           layer.msg('请输入正确的手机号!');        
           return false;
         }
      }
     //ajax请求//
     $.ajax({
      //提交数据的类型 POST GET
        type: "POST",
      //提交的网址
        url: ajaxSidUrl,
      //提交的数据
        data: {code:code,phone:phone},
      //返回数据的格式
        datatype: "json",
      //成功返回之后调用的函数
        success: function (data) {
      ////根据ajax返回参数判断验证码发送情况
        if(data['status']=="1"){  
        window.location.href="<?php echo U('Admin/Login/modefiy');?>";
        }else if(data['status']=="-1"){
            layer.msg('验证码错误!');           
        }else if(data['status']=="-2"){
            layer.msg('请先请求验证码!');           
        }else{
            layer.msg('未知错误!');   
        }
      ////根据ajax返回参数判断验证码发送情况
        }
     });
     //ajax请求//
    }
    //进行验证码判断
</script>
  </body>
</html>