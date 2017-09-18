<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
	<title><?php echo ($loginTitle); ?></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="/Public/login/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="/Public/login/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/Public/login/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="/Public/login/css/templatemo_style.css" rel="stylesheet" type="text/css">	
	<script src="/Public//home/loginjs/jquery-2.1.1.js"></script>
    <script src="/Public/home/loginjs/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/layer/skin/layer.css">
    <script src="/Public/layer/layer.js"></script>
</head>
<body class="templatemo-bg-gray">
	<div class="container">
		<div class="col-md-12">
			<h1 class="margin-bottom-15"><?php echo ($loginTitle); ?></h1>
			<form class="form-horizontal templatemo-forgot-password-form templatemo-container" role="form" method="post">	
				<div class="form-group">
		          <div class="col-md-12">
		          	Please enter your phone that you registered in our website.
		          </div>
		        </div>		
		        <div class="form-group">
		          <div class="col-md-12">
		            <input type="text" class="form-control" id="userphone" name="userphone" placeholder="手机号码">
		          </div>             
		        </div>
            <div class="form-group">
              <div class="col-md-12">
                <input type="text" class="form-control" id="code" name="code" placeholder="验证码">
              </div>               
            </div>
		        <div class="form-group">
		          <div class="col-md-12">
		            <input type="button" value="确认" class="btn btn-danger" onclick="doreg()">
		            <input type="button" value="获取验证码" id="send" class="btn btn-danger" readonly="true" onclick="onsend()">
                    <br><br>
                    <a href="<?php echo U('Login/login');?>">登陆</a> |
                    <a href="<?php echo U('Login/reg');?>">注册</a>
		          </div>
		        </div>
		      </form>
          <div class="text-center">
            <?php if(is_array($loginfooter)): $i = 0; $__LIST__ = $loginfooter;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Index/index');?>" class="templatemo-create-new"><?php echo ($vo["title"]); ?><i class="fa fa-arrow-circle-o-right"></i></a><?php endforeach; endif; else: echo "" ;endif; ?> 
          </div>
		</div>
	</div>
</body>
<!-- 获取验证码 -->
<script type="text/javascript">
function onsend(){
  var ajaxSidUrl='<?php echo U("Home/Login/zhmmsend");?>';
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
</script>
<!-- 获取验证码 -->
<script type="text/javascript">
  function doreg(){
    var code=$('#code').val();
    var phone=$('#userphone').val();
    var ajaxSidUrl='<?php echo U("Login/surecode");?>'; 
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
          window.location.href="<?php echo U('Home/Login/modefiy');?>";
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
</script>
</html>