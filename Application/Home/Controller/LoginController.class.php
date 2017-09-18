<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
          $this->loginfooter();
          $this->display();
    }
	public function dologin(){
          if(IS_POST){
			  $whe['username']=$_POST['username'];
			  $data['username']=$_POST['username'];
			  $username=$_POST['username'];
			  $data['password']=md5($_POST['username'].(md5($_POST['password'])));;
			  $user=M('user');
			  $isuser=$user->where($whe)->find();
			  if($isuser){
				  //
				  $result=$user->where($data)->find();
				  $userimg=$user->where($data)->getField('img');
				  if($result){
					  $_SESSION['username']=$_POST['username'];
					  //插入登陆时间
					  $time['lasttime']=time();
					  $lo['username']=$_POST['username'];
					  $res=$user->where($lo)->save($lotime);
					  //插入登陆时间
					  //设置SESSION//
					  $_SESSION['username']= $username;
					  $getid['username']= $username;
            $userid=M('user')->where('username='."'".$username."'")->getField('id');
					  $_SESSION['userid']=$userid;
					  $_SESSION['userimg']= $userimg;
					  //设置SESSION//
            //设置cookies
            $token=md5(rand_number().md5($_POST['username'].$_POST['password']));
            $tokenTime=time()+(24*3600);
            cookie('UserId',$userid,3600);
            cookie('UserToken',$token,3600);
            cookie('UserTokenTime',$tokenTime,3600);
            $whereToken['token']=$token;
            $whereToken['tokentime']=$tokenTime;
            $whereUser['id']=$userid;
            $insertToken=M('user')->where($whereUser)->save($whereToken);
            //设置cookies
					  //统计登陆
					  $this->loginum();
					  //统计登陆
					  $data['status']=1;          //失败返回参数
                      $this->ajaxReturn($data);
				  }else{
					  $data['status']=-1;          //失败返回参数
                      $this->ajaxReturn($data);
				  }
				  //
			  }else{
				  $data['status']=-2;          //失败返回参数
                  $this->ajaxReturn($data);
			  }
		  }
    }
	///用户退出
	public function doout(){
		$_SESSION['username']='';
		$_SESSION['userid']='';
		$_SESSION['userimg']='';
    cookie('UserId',null);
    cookie('UserToken',null);
    cookie('UserTokenTime',null);
		$this->redirect('Home/Index/index');
		
	}
	///
	///统计登陆方法
	public function loginum(){
		$time=time();
		$time=date("Y-m-d",$time);
		$logintime=substr($time,5,2);
		if($logintime=='01'){
			$login['mon']='01';
			$loginnum=M('lognum')->where($login)->getField('count');
			$datalogin['count']=$loginnum+1;
			$rlogin=M('lognum')->where($login)->save($datalogin);
		}else if($logintime=='02'){
			$login['mon']='02';
			$loginnum=M('lognum')->where($login)->getField('count');
			$datalogin['count']=$loginnum+1;
			$rlogin=M('lognum')->where($login)->save($datalogin);
		}else if($logintime=='03'){
			$login['mon']='03';
			$loginnum=M('lognum')->where($login)->getField('count');
			$datalogin['count']=$loginnum+1;
			$rlogin=M('lognum')->where($login)->save($datalogin);
		}else if($logintime=='04'){
			$login['mon']='04';
			$loginnum=M('lognum')->where($login)->getField('count');
			$datalogin['count']=$loginnum+1;
			$rlogin=M('lognum')->where($login)->save($datalogin);
		}else if($logintime=='05'){
			$login['mon']='05';
			$loginnum=M('lognum')->where($login)->getField('count');
			$datalogin['count']=$loginnum+1;
			$rlogin=M('lognum')->where($login)->save($datalogin);
		}else if($logintime=='06'){
			$login['mon']='06';
			$loginnum=M('lognum')->where($login)->getField('count');
			$datalogin['count']=$loginnum+1;
			$rlogin=M('lognum')->where($login)->save($datalogin);
		}else if($logintime=='07'){
			$login['mon']='07';
			$loginnum=M('lognum')->where($login)->getField('count');
			$datalogin['count']=$loginnum+1;
			$rlogin=M('lognum')->where($login)->save($datalogin);
		}else if($logintime=='08'){
			$login['mon']='08';
			$loginnum=M('lognum')->where($login)->getField('count');
			$datalogin['count']=$loginnum+1;
			$rlogin=M('lognum')->where($login)->save($datalogin);
		}else if($logintime=='09'){
			$login['mon']='09';
			$loginnum=M('lognum')->where($login)->getField('count');
			$datalogin['count']=$loginnum+1;
			$rlogin=M('lognum')->where($login)->save($datalogin);
		}else if($logintime=='10'){
			$login['mon']='10';
			$loginnum=M('lognum')->where($login)->getField('count');
			$datalogin['count']=$loginnum+1;
			$rlogin=M('lognum')->where($login)->save($datalogin);
		}else if($logintime=='11'){
			$login['mon']='11';
			$loginnum=M('lognum')->where($login)->getField('count');
			$datalogin['count']=$loginnum+1;
			$rlogin=M('lognum')->where($login)->save($datalogin);
		}else{
			$login['mon']='12';
			$loginnum=M('lognum')->where($login)->getField('count');
			$datalogin['count']=$loginnum+1;
			$rlogin=M('lognum')->where($login)->save($datalogin);
		}
		////
	}
	///统计登陆方法、
	/*注册*/
	public function reg(){
       $this->loginfooter();
	     $ft=$_SESSION['stime'];
       $lt=time();
       $showtime=$lt-$ft;
       $this->assign('showtime',$showtime);
	   $this->display();
	}
	/*注册*/
	/*获取验证码*/
    public function send(){
      $_SESSION['stime']=0;      // 设置第一次点击时间      
//设置SESSION
      $_SESSION['phone']='';
      $_SESSION['code']='';
      $_SESSION['codetime']=0;    //设置验证码保存时间
      if($_SESSION['phone']!=''){
         session("phone", null);
      }
      if($_SESSION['code']!=''){
         session("code", null);
      }
      $ftime=$_SESSION['stime'];    //储存当前时间戳
      $ltime=time();                //获取用户每次点击的时间戳
//判断用户是否在一分钟以后进行操作
      if(($ltime-$ftime)>59){
        $_SESSION['stime']=$ltime;   //一分钟以内重新对当前时间戳赋值
//判断是否存在该用户
        $phone=I('post.phone');  //获取用户输入的手机号码
        $abc =M('user');
        $aa['phone']=$phone;
        $re=$abc->where($aa)->find();
        if(!$re){
  //存在该用户时
      //从数据库中获取$ACCOUNT_SID, $AUTH_TOKEN;
          $sms=M('sms');
          $ACCOUNT_SID=trim($sms->where("type='sms'")->getField('account'));
          $AUTH_TOKEN =trim($sms->where("type='sms'")->getField('token'));
          $Content    =$sms->where("type='sms'")->getField('content');
       //获取随机数
          $code=rand_number();
       // url中{function}/{operation}?部分
          $funAndOperate = "industrySMS/sendSMS";
       // 参数详述请参考http://miaodiyun.com/https-xinxichaxun.html
       // 生成body
          $body = createBasicAuthDatas($ACCOUNT_SID,$AUTH_TOKEN);
       // 在基本认证参数的基础上添加短信内容和发送目标号码的参数
          $body['smsContent'] = $Content .$code; 
          $body['to'] = $phone;
       // 提交请求
          $result = posts($funAndOperate,$body);
       //判断是否发送成功
          if($result=="00000"){
         // alert("发送成功");
             $data['status'] = 1;
        //设置SESSION
             $codet=time();
             $_SESSION['codetime']=$codet;  //将当前时间储存在验证码时间里
             $_SESSION['phone']=$phone;
             $_SESSION['code']= $code;      
        //将当前时间储存在验证码时间里
        //设置SESSION结束       
           }else if($result=="00099"){
             $data['status']= -2;    
             // alert("该手机24小时内只能接收10条");   
           }else{
            $data['status']= -3;    
            // alert("发送失败");           
           }
        //
        }else{
         //不存在该用户
          $data['status']= -1;
        }           
///
     }else{   //提醒用户倒计时未结束
     	$data['status']= -4;
        $_SESSION['stime']=time();  //将当前时间戳存入最近一次时间起点 
     }
// 
       $this->ajaxReturn($data);  //返回发送状态参数
   //
    }  
	/*获取验证码*/
	/*用户注册*/
	public function dereg(){
	  if(IS_POST){
	  	//判断是否请求了验证码//
	  	if($_SESSION['phone']==''){
          $data['status']= -3;
          $this->ajaxReturn($data);
	  	}
	  	if(($_POST['phone']!=$_SESSION['phone'])&&
	  		($_POST['code']!=$_SESSION['code'])){
          $data['status']= -1;
          $this->ajaxReturn($data);  die;
	  	}
	  	//判断是否请求了验证码//
        $whe['username']=trim($_POST['username']);
        $user=M('user');
        $isname=$user->where($whe)->find();
        if($isname){
           $data['status']= -2;
           $this->ajaxReturn($data);
        }else{
            $data['username']=trim($_POST['username']);
            $data['password']=md5($_POST['username'].(md5($_POST['password'])));
            $data['img']='user.png';
            $data['status']='1';
            $data['phone']=trim($_POST['phone']);
            $data['lasttime']='';
            $data['groupid']='1';
            $data['creattime']=time();
            $result=M('user')->add($data);
            if($result){
              $_SESSION['phone']='';
       	      $_SESSION['code']='';
              $data['status']= 1;
              $this->ajaxReturn($data);
            }else{
              $data['status']= -4;
              $this->ajaxReturn($data);
            }
        }
        
	  }
	}
	/*用户注册*/
	/*用户找回密码页面*/
	public function zhmm(){
       $this->loginfooter();
	     $ft=$_SESSION['stime'];
       $lt=time();
       $showtime=$lt-$ft;
       $this->assign('showtime',$showtime);
	   $this->display();
	}
	/*用户找回密码页面*/
 /*找回密码验证码*/
    public function zhmmsend(){
      $_SESSION['stime']=0;      // 设置第一次点击时间      
//设置SESSION
      $_SESSION['phone']='';
      $_SESSION['code']='';
      $_SESSION['codetime']=0;    //设置验证码保存时间
      if($_SESSION['phone']!=''){
         session("phone", null);
      }
      if($_SESSION['code']!=''){
         session("code", null);
      }
      $ftime=$_SESSION['stime'];    //储存当前时间戳
      $ltime=time();                //获取用户每次点击的时间戳
//判断用户是否在一分钟以后进行操作
      if(($ltime-$ftime)>59){
        $_SESSION['stime']=$ltime;   //一分钟以内重新对当前时间戳赋值
//判断是否存在该用户
        $phone=I('post.phone');  //获取用户输入的手机号码
        $abc =M('user');
        $aa['phone']=$phone;
        $re=$abc->where($aa)->find();
        if($re){
  //存在该用户时
      //从数据库中获取$ACCOUNT_SID, $AUTH_TOKEN;
          $sms=M('sms');
          $ACCOUNT_SID=trim($sms->where("type='sms'")->getField('account'));
          $AUTH_TOKEN =trim($sms->where("type='sms'")->getField('token'));
          $Content    =$sms->where("type='sms'")->getField('content');
       //获取随机数
          $code=rand_number();
       // url中{function}/{operation}?部分
          $funAndOperate = "industrySMS/sendSMS";
       // 参数详述请参考http://miaodiyun.com/https-xinxichaxun.html
       // 生成body
          $body = createBasicAuthDatas($ACCOUNT_SID,$AUTH_TOKEN);
       // 在基本认证参数的基础上添加短信内容和发送目标号码的参数
          $body['smsContent'] = $Content .$code; 
          $body['to'] = $phone;
       // 提交请求
          $result = posts($funAndOperate,$body);
       //判断是否发送成功
          if($result=="00000"){
         // alert("发送成功");
             $data['status'] = 1;
        //设置SESSION
             $codet=time();
             $_SESSION['codetime']=$codet;  //将当前时间储存在验证码时间里
             $_SESSION['phone']=$phone;
             $_SESSION['code']= $code;      
        //将当前时间储存在验证码时间里
        //设置SESSION结束       
           }else if($result=="00099"){
             $data['status']= -2;    
             // alert("该手机24小时内只能接收10条");   
           }else{
            $data['status']= -3;    
            // alert("发送失败");           
           }
        //
        }else{
         //不存在该用户
          $data['status']= -1;
        }           
///
     }else{   //提醒用户倒计时未结束
     	$data['status']= -4;
        $_SESSION['stime']=time();  //将当前时间戳存入最近一次时间起点 
     }
// 
       $this->ajaxReturn($data);  //返回发送状态参数
   //
    }  
/*找回密码验证码*/
/*用户进行验证码匹配*/
  public function surecode(){
  	///
  	if(IS_POST){
       $phone=trim($_POST['phone']);
       $code=trim($_POST['code']);
       if(($_SESSION['phone']=='')||(($_SESSION['code']==''))){
           $data['status']= -2;
           $this->ajaxReturn($data);
       }
       if(($phone==$_SESSION['phone'])&($code==$_SESSION['code'])){
       	  $_SESSION['phone']='';
       	  $_SESSION['code']='';
       	  $_SESSION['modefiyphone']=$phone;
          $data['status']=1;
          $this->ajaxReturn($data);
       }else{
       	  $data['status']= -1;
          $this->ajaxReturn($data);
       }
  	}
  	///
  }
/*用户进行验证码匹配*/
/*用户密码修改页面*/
   public function modefiy(){
      $this->loginfooter();
   	  $whe['phone']=$_SESSION['modefiyphone'];
   	  $userid=M('user')->where($whe)->getField('id');
   	  $username=M('user')->where($whe)->getField('username');
   	  $this->assign('userid',$userid);
   	  $this->assign('username',$username);
   	  $this->display();
   }
/*用户密码修改页面*/
/*用户密码修改*/
   public function dopassword(){
   	  if(IS_POST){
   	  	$username=trim($_POST['username']);
   	  	$password=trim($_POST['password']);
   	  	$whe['id']=$_POST['userid'];
        $data['password']=md5($username.(md5($password)));
        $result=M('user')->where($whe)->save($data);
        if($result){
          $_SESSION['modefiyphone']='';
          $data['status']=1;
          $this->ajaxReturn($data);
        }else{
          $data['status']= -1;
          $this->ajaxReturn($data);
        }
   	  }
   }
/*用户密码修改*/
   /*查询登陆底部*/
   public function loginfooter(){
      $where['type']='footer';
      $loginfooter=M('title')->where($where)->select();
      $wheres['type']='top';
      $loginTitle=M('title')->where($wheres)->getField('title');
      $this->assign('loginfooter',$loginfooter);
      $this->assign('loginTitle',$loginTitle);
   }
   /*查询登陆底部*/
}