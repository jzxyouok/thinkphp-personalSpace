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
	<script src="/Public/home/loginjs/jquery-2.1.1.js"></script>
    <script src="/Public/home/loginjs/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/layer/skin/layer.css">
    <script src="/Public/layer/layer.js"></script>
</head>
<body class="templatemo-bg-gray">
	<div class="container">
		<div class="col-md-12">
			<h1 class="margin-bottom-15"><?php echo ($loginTitle); ?></h1>
			<form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" role="form"  method="post">				
		        <div class="form-group">
		          <div class="col-xs-12">		            
		            <div class="control-wrapper">
		            	<label for="username" class="control-label fa-label"><i class="fa fa-user fa-medium"></i></label>
		            	<input type="text" class="form-control" id="username" name="username" placeholder="用户名">
		            </div>		            	            
		          </div>              
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		            	<label for="password" class="control-label fa-label"><i class="fa fa-lock fa-medium"></i></label>
		            	<input type="password" class="form-control" id="password" name="password" placeholder="密码" >
		            </div>
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
	             	<div class="checkbox control-wrapper">
	                	<label>
	                  		<input type="checkbox"> Remember me
                		</label>
	              	</div>
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		          		<input type="button" onclick="dologin()" value="登陆" class="btn btn-info">
		          		<a href="<?php echo U('Login/zhmm');?>" class="text-right pull-right">忘记密码?</a>
		          	</div>
		          </div>
		        </div>
		        <hr>
		      </form>
		      <div class="text-center">
		      	<?php if(is_array($loginfooter)): $i = 0; $__LIST__ = $loginfooter;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Index/index');?>" class="templatemo-create-new"><?php echo ($vo["title"]); ?><i class="fa fa-arrow-circle-o-right"></i></a><?php endforeach; endif; else: echo "" ;endif; ?>
		      </div>
		</div>
	</div>
</body>
<!---//end-copyright-->
<script type="text/javascript">
  function dologin(){
	  var username=$('#username').val();
	  var password=$('#password').val();
	  var ajaxSidUrl='<?php echo U("Login/dologin");?>'; 
	 if(username==''){
		 layer.msg('账号不允许为空！');
		 return false;
	 }
	 if(password==''){
		 layer.msg('密码不允许为空！');
		 return false;
	 }
	 //ajax请求//
	 $.ajax({
      //提交数据的类型 POST GET
        type: "POST",
      //提交的网址
        url: ajaxSidUrl,
      //提交的数据
        data: {username: username,password:password},
      //返回数据的格式
        datatype: "json",
      //成功返回之后调用的函数
        success: function (data) {
      ////根据ajax返回参数判断验证码发送情况
        if(data['status']=="1"){
            window.location.href="<?php echo U('Home/Index/index');?>";
        }else if(data['status']=="-1"){
            layer.msg('账号或密码错误!');           
        }else if(data['status']=="-2"){
            layer.msg('不存在该用户!');           
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