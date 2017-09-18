<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
          $_SESSION['adminname']='';  //清空
          $_SESSION['adminid']='';   //清空
          $_SESSION['adminimg']='';   //清空
          cookie('adminId',null);
          cookie('adminToken',null);
          cookie('adminTokenTime',null);
          $this->display();
    }
    /*管理员退出*/
    public function loginout(){
    	  $_SESSION['adminname']='';  //清空
        $_SESSION['adminid']='';   //清空
        $_SESSION['adminimg']='';   //清空
        cookie('adminId',null);
        cookie('adminToken',null);
        cookie('adminTokenTime',null);
        $this->redirect('Login/login');
    }
	public function dologin(){
          if(IS_POST){
			  $where['name']=$_POST['adminname'];
			  $data['password']=md5($_POST['adminname'].(md5($_POST['adminpwd'])));
			  $result=M('admin')->where($where)->getField('password');
			  if($result==$data['password']){
		        //数值保存与修改
			     $adminid=M('admin')->where($where)->getField('id');
			     $adminimg=M('admin')->where($where)->getField('img');
			     $_SESSION['adminname']=$_POST['adminname'];
			     $_SESSION['adminid']=$adminid;
			     $_SESSION['adminimg']=$adminimg;
           //令牌机制
           $adminToken=md5(rand_number().md5($_POST['adminname'].$_POST['adminpwd']));  //设置令牌
           $adminTime=time()+(24*3600);  //设置令牌时间
           $whereAdmin['id']=$adminid;
           $whereToken['token']=$adminToken;
           $whereToken['tokentime']=$adminTime;
           $insertToken=M('admin')->where($whereAdmin)->save($whereToken);
           cookie('adminId',$adminid,3600);
           cookie('adminToken',$adminToken,3600);
           cookie('adminTokenTime',$adminTime,3600);
           //令牌机制
			     $time=time();
			     $savetime['lasttime']=$time;  //登陆时间
			     $gjtime['logintime']=$time;  //登陆时间
			     $timelogin=date("Y-m-d",time());
			     $logintime=M('admin')->where('id='.$adminid)->save($savetime);
			     $logintimes=M('admingj')->where('uid='.$adminid)->save($gjtime);
			     $this->loginnum($timelogin,$adminid);
				//数值保存与修改
				 $data['status']=1;          
				//失败返回参数
                 $this->ajaxReturn($data);
			  }else{
			     $data['status']=-1;          //失败返回参数
                 $this->ajaxReturn($data);
			  }
				  /////
		  }
    }
    //统计登陆月份//
    public function loginnum($mon,$id){
       $month=substr($mon,5,2);
       $whe['uid']=$id;
       if($month=='01'){
        $num=M('adminlogin')->where($whe)->getField('jan');
        $num+=1;
        $whes['jan']=$num;
        $addnum=M('adminlogin')->where($whe)->save($whes);
       }else if($month=='02'){
        $num=M('adminlogin')->where($whe)->getField('feb');
        $num+=1;
        $whes['feb']=$num;
        $addnum=M('adminlogin')->where($whe)->save($whes);
       }else if($month=='03'){
       	$num=M('adminlogin')->where($whe)->getField('mar');
       	$num+=1;
       	$whes['mar']=$num;
        $addnum=M('adminlogin')->where($whe)->save($whes);
       }else if($month=='04'){
       	$num=M('adminlogin')->where($whe)->getField('apr');
       	$num+=1;
       	$whes['apr']=$num;
        $addnum=M('adminlogin')->where($whe)->save($whes);
       }else if($month=='05'){
       	$num=M('adminlogin')->where($whe)->getField('may');
       	$num+=1;
       	$whes['may']=$num;
        $addnum=M('adminlogin')->where($whe)->save($whes);
       }else if($month=='06'){
       	$num=M('adminlogin')->where($whe)->getField('jun');
       	$num+=1;
       	$whes['jun']=$num;
        $addnum=M('adminlogin')->where($whe)->save($whes);
       }else if($month=='07'){
       	$num=M('adminlogin')->where($whe)->getField('jul');
       	$num+=1;
       	$whes['jul']=$num;
        $addnum=M('adminlogin')->where($whe)->save($whes);
       }else if($month=='08'){
       	$num=M('adminlogin')->where($whe)->getField('aug');
       	$num+=1;
       	$whes['aug']=$num;
        $addnum=M('adminlogin')->where($whe)->save($whes);
       }else if($month=='09'){
       	$num=M('adminlogin')->where($whe)->getField('sep');
       	$num+=1;
       	$whes['sep']=$num;
        $addnum=M('adminlogin')->where($whe)->save($whes);
       }else if($month=='10'){
       	$num=M('adminlogin')->where($whe)->getField('oct');
       	$num+=1;
       	$whes['oct']=$num;
        $addnum=M('adminlogin')->where($whe)->save($whes);
       }else if($month=='11'){
       	$num=M('adminlogin')->where($whe)->getField('nov');
       	$num+=1;
       	$whes['nov']=$num;
        $addnum=M('adminlogin')->where($whe)->save($whes);
       }else{
       	$num=M('adminlogin')->where($whe)->getField('dec');
       	$num+=1;
       	$whes['dec']=$num;
        $addnum=M('adminlogin')->where($whe)->save($whes);
       }
    }
    //统计登陆月份//
    /*找回密码界面*/
    public function zhmm(){
       $ft=$_SESSION['stime'];
       $lt=time();
       $showtime=$lt-$ft;
       $this->assign('showtime',$showtime);
       $this->display();
    }
    /*找回密码界面*/
    /*发送验证码*/
    public function zhmmsend(){
      ////
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
        $abc =M('admin');
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
      ////
    }
    /*发送验证码*/
    /*匹配验证码*/
    public function onsure(){
      ///
      if(IS_POST){
        $phone=trim($_POST['phone']);
        $code=trim($_POST['code']);
        if(($_SESSION['phone']=='')||($_SESSION['code']=='')){
           $data['status']= -2;  
           $this->ajaxReturn($data);
        }
        if(($phone!=$_SESSION['phone'])||($code!=$_SESSION['code'])){
           $_SESSION['phone']='';
           $_SESSION['code']='';     
           $data['status']= -1;  
           $this->ajaxReturn($data);
        }else{
           $_SESSION['aminphone']=$phone;
           $data['status']= 1;  
           $this->ajaxReturn($data);
        }
      }
      ///
    }
    /*匹配验证码*/
    /*密码修改界面*/
    public function modefiy(){
      if(($_SESSION['phone']=='')||($_SESSION['code']=='')){
         $this->redirect('Login/login');
      }
       $whe['phone']=$_SESSION['aminphone'];
       $adminid=M('admin')->where($whe)->getField('id');
       $adminname=M('admin')->where($whe)->getField('name');
       $this->assign('adminid',$adminid);
       $this->assign('adminname',$adminname);
       $this->display();
    }
    /*密码修改界面*/
    /*修改密码*/
    public function editpwdadmin(){
      if(IS_POST){
        $whe['id']=trim($_POST['adminid']);
        $password=trim($_POST['adminpwd']);
        $adminname=trim($_POST['adminname']);
        $data['password']=md5($adminname.(md5($password)));
        $result=M('admin')->where($whe)->save($data);
        if($result){
          $_SESSION['aminphone']='';
          $data['status']= 1;  
          $this->ajaxReturn($data);
        }else{
          $data['status']= -1;  
          $this->ajaxReturn($data);
        }
      }
    }
    /*修改密码*/
}