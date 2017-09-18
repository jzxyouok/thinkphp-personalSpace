<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="/bridge/Public/login/css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
</script>
<script src="/bridge/Public/home/js/jquery-2.1.1.js"></script>
<script src="/bridge/Public/home/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/bridge/Public/layer/skin/layer.css">
<script src="/bridge/Public/layer/layer.js"></script>
<style type="text/css">
input[type=button] {
	padding: 17px 30px;
	color: #fff;
	float: right;
	font-family: "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
	background: #40A46F;
	border: 1px solid #40A46F;
	cursor: pointer;
	font-size: 18px;
	transition: all 0.5s ease-out;
	-webkit-transition: all 0.5s ease-out;
	-moz-transition: all 0.5s ease-out;
	-ms-transition: all 0.5s ease-out;
	-o-transition: all 0.5s ease-out;
	outline:none;
	width: 100%;
}

.submit input[type=button]:hover {
	 background:#07793D;
	 border:1px solid #07793D;
}
</style>
</head>
<body>
<div class="main">
<!-----start-main---->
	<form>
	<!--	<div class="lable">
		    <input type="text" class="text" value="First Name" onfocus="this.value = '';" onblur="if (this.value == '') 
            {this.value = 'First Name';}" id="active">
            <input type="text" class="text" value="Last Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Last Name';}">
		</div> -->
		<div class="clear"> </div>
		<div class="lable-2">
		    <input type="text" class="text" value="<?php echo ($username); ?>"  onblur="" placeholder="用户名" readonly="true" id="username" name="username">
		    <input type="password" class="text" value="" onblur="" id="password" name="password" placeholder="密码">
		    <input type="password" class="text" value="" onblur="" id="passwords" name="passwords" placeholder="重复密码">
		    <input type="hidden" class="text" value="<?php echo ($userid); ?>" onblur="" id="userid" name="userid" placeholder="">
		</div>
		<div class="clear"> </div>
		<h3>没有账号？ <span><a href="<?php echo U('Home/Login/reg');?>">注册</a></span></h3>
		<div class="submit">
			<input type="button" onclick="dologin()" value="修改" >
		</div>
		<div class="clear"> </div>
	 </form>
<!---//end-main-->
</div>
<!---start-copyright-->
<div class="copy-right">
		<p>More Templates <a href="" target="_blank" title="个人空间">个人空间</a></p> 
</div>
<!---//end-copyright-->
<script type="text/javascript">
  function dologin(){
	  var password=$('#password').val();
	  var passwords=$('#passwords').val();
	  var username=$('#username').val();
	  var userid=$('#userid').val();
	  var ajaxSidUrl='<?php echo U("Login/dopassword");?>'; 
	 if((password=='')||(passwords=='')){
		 layer.msg('密码不允许为空！');
		 return false;
	 }
	 if((password!='')&&(passwords!='')){
         if(password!=passwords){
           layer.msg('两次密码不一致！');
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
        data: {username: username,password:password,userid:userid},
      //返回数据的格式
        datatype: "json",
      //成功返回之后调用的函数
        success: function (data) {
      ////根据ajax返回参数判断验证码发送情况
        if(data['status']=="1"){
        	layer.msg('修改成功!');     
            window.location.href="<?php echo U('Home/Login/login');?>";
        }else{
            layer.msg('未知错误!');   
        }
      ////根据ajax返回参数判断验证码发送情况
        }
     });
	 //ajax请求//
  }
</script>
</body>
</html>