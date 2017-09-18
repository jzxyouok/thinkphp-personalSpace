<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
   /*判断管理员是否登陆*/
   public function checklogin(){
      if($_SESSION['adminid']==''){
         $this->redirect('/Admin/Login/login');
      }
      /*令牌机制*/
      $adminTokenId=cookie('adminId');
      $adminToken=cookie('adminToken');
      $whereToken['id']=$adminTokenId;
      $token=M('admin')->where($whereToken)->getField('token');
      $tokenTime=M('admin')->where($whereToken)->getField('tokentime');
      if($token!=$adminToken){
          cookie('adminId',null);
          cookie('adminToken',null);
          cookie('adminTokenTime',null);
          $this->redirect('/Admin/Login/login');
      }else{
        if($tokenTime<time()){
          cookie('adminId',null);
          cookie('adminToken',null);
          cookie('adminTokenTime',null);
          $this->redirect('/Admin/Login/login');
        }
      }
      /*令牌机制*/
   }
   /*判断管理员是否登陆*/
   /*首页*/
    public function index(){
      $this->checklogin();  //检查是否登陆
    //获取留言信息//
    $message=A('Admin/Message');
    $message->getmessage();
    //获取留言信息//
		  $username=$_SESSION['adminname'];
    	$userid=$_SESSION['adminid'];
    	$time=date("Y-m-d H:i:s",time());  //获取当前时间戳
    	$this->loginnum();  //调取用户登陆数据
    	$this->adminlogin();  //调取管理员登陆数据
    	$this->webdata();  //调取网站数据
    	$this->admingj(); //获取管理员轨迹
      $this->articlemont(); //获取日记浏览量
      $this->pinglundate();  //评论数据
		  /*查询面板数据*/ 
		  $usercount=M('user')->count();
		  $videocount=M('videtype')->count();
		  $imgcount=M('imgtype')->count();
		  $articlecount=M('file')->count();
      $messcount=M('message')->where('biaozhi=1')->count();
		  $adminauto['author']=$userid;
		  $adminarticlecount=M('file')->where($adminauto)->count();
		  /*查询面板数据*/ 
		  /*查询当前管理信息*/ 
		  $admindata=M('admin')->where('id='.$userid)->select();
		  $adminlastime=M('admin')->where('id='.$userid)->getField('lasttime');
		  $adminlastime=date("Y-m-d H:i:s",$adminlastime);
		  /*查询当前管理信息*/ 
      /*获取评论数*/
      $pingluncount=M('pinglun')->count();
      /*获取评论数*/
		  $this->assign('username',$username);
		  $this->assign('usercount',$usercount); //用户总数
		  $this->assign('admindata',$admindata); 
		  $this->assign('articlecount',$articlecount); //日记数
		  $this->assign('messcount',$messcount); //用户留言
		  $this->assign('adminarticlecount',$adminarticlecount);  //当前管理员发表的日记数
		  $this->assign('time',$time); //获取当前时间戳
		  $this->assign('adminlastime',$adminlastime); //管理员登陆时间
      $this->assign('pingluncount',$pingluncount); //获取评论数
      $this->display();
    }
    /*获得管理员发表信息*/
    public function getartcicle(){

    }
    /*获得管理员发表信息*/
    /*获取管理员时间轨迹*/
    public function admingj(){
     	$whe['uid']=$_SESSION['adminid'];;
     	$admingj=M('admingj')->where($whe)->select();
     	foreach ($admingj as $key => $value) {
          //登陆时间
          $re=date("Y-m-d H:i:s",$value['logintime']);
          $ress=substr($re,11);
          $admingj[$key]['logintime']=$re;
          $admingj[$key]['logintimess']=$ress;
          //发表日记
          $reFile=date("Y-m-d H:i:s",$value['filetime']);
          $reFiles=substr($reFile,11);
          $admingj[$key]['filetime']=$reFile;
          $admingj[$key]['filetimess']=$reFiles;
          //发表图片
          $reImg=date("Y-m-d H:i:s",$value['imgtime']);
          $reImgs=substr($re,11);
          $admingj[$key]['imgtime']=$reImg;
          $admingj[$key]['imgtimess']=$reImgs; 
          //创建账号
          $reCreat=date("Y-m-d H:i:s",$value['creattime']);
          $reCreats=substr($reCreat,11);
          $admingj[$key]['creattime']=$reCreat;
          $admingj[$key]['creattimess']=$reCreats;
          //回复留言
          $reRemess=date("Y-m-d H:i:s",$value['remesstime']);
          $reRemesss=substr($re,11);
          $admingj[$key]['remesstime']=$reRemess;
          $admingj[$key]['remesstimess']=$reRemesss;
          //
      }
     	$this->assign('admingj',$admingj);
    }
    /*获取管理员时间轨迹*/
    /*获取网站统计数据*/
    public function webdata(){
    	/*统计网站数据*/
		  $usernum=M('user')->count();  //用户
		  $imgnum=M('img')->count();    //照片
		  $videonum=M('video')->count();    //视频
		  $messnum=M('message')->count();    //留言
		  $fielnum=M('file')->count();    //日记
		  $num=$usernum+$imgnum+$videonum+$messnum+$fielnum;
		  /*统计网站数据*/
		  /*网站数据*/
		  $this->assign('usernum',$usernum);
		  $this->assign('imgnum',$imgnum);
		  $this->assign('videonum',$videonum);
		  $this->assign('messnum',$messnum);
		  $this->assign('fielnum',$fielnum);
		  $this->assign('num',$num);
		  /*网站数据*/
    }
    /*获取网站统计数据*/
    /*统计用户登陆信息*/
    public function loginnum(){
    	/*统计月份登陆*/  
		  $a=0;$s=0;$d=0;$f=0;$g=0;$h=0;
          $j=0;$k=0;$l=0;$z=0;$x=0;$c=0;
		  $a=M('lognum')->where('mon=01')->getField('count');
		  $s=M('lognum')->where('mon=02')->getField('count');
		  $d=M('lognum')->where('mon=03')->getField('count');
		  $f=M('lognum')->where('mon=04')->getField('count');
		  $g=M('lognum')->where('mon=05')->getField('count');
		  $h=M('lognum')->where('mon=06')->getField('count');
		  $j=M('lognum')->where('mon=07')->getField('count');
		  $k=M('lognum')->where('mon=08')->getField('count');
		  $l=M('lognum')->where('mon=09')->getField('count');
		  $z=M('lognum')->where('mon=10')->getField('count');
		  $x=M('lognum')->where('mon=11')->getField('count');
		  $c=M('lognum')->where('mon=12')->getField('count');
		  /*用户访问量*/
		  $this->assign('a',$a);     //一月
		  $this->assign('s',$s);     //二月 
		  $this->assign('d',$d);     //三月
		  $this->assign('f',$f);     //四月 
		  $this->assign('g',$g);     //五月
		  $this->assign('h',$h);     //六月
		  $this->assign('j',$j);     //七月 
		  $this->assign('k',$k);     //八月
		  $this->assign('l',$l);     //九月
		  $this->assign('z',$z);     //十月
		  $this->assign('x',$x);     //十一月
		  $this->assign('c',$c);     //十二月
		  /*用户访问量*/
		  /*统计月份登陆*/

    }
    /*统计用户登陆信息*/
    /*统计管理员登录信息*/
    public function adminlogin(){
       /*查询当前管理员访问数据*/
          $userid=$_SESSION['adminid'];
          $adminjan=M('adminlogin')->where('uid='.$userid)->getField('jan');
          $adminfeb=M('adminlogin')->where('uid='.$userid)->getField('feb');
          $adminmar=M('adminlogin')->where('uid='.$userid)->getField('mar');
          $adminapr=M('adminlogin')->where('uid='.$userid)->getField('apr');
          $adminmay=M('adminlogin')->where('uid='.$userid)->getField('may');
          $adminjun=M('adminlogin')->where('uid='.$userid)->getField('jun');
          $adminjul=M('adminlogin')->where('uid='.$userid)->getField('jul');
          $adminaug=M('adminlogin')->where('uid='.$userid)->getField('aug');
          $adminsep=M('adminlogin')->where('uid='.$userid)->getField('sep');
          $adminoct=M('adminlogin')->where('uid='.$userid)->getField('oct');
          $adminnov=M('adminlogin')->where('uid='.$userid)->getField('nov');
          $admindec=M('adminlogin')->where('uid='.$userid)->getField('dec');
          /*当前管理员访问数据*/
		  $this->assign('adminjan',$adminjan);
		  $this->assign('adminfeb',$adminfeb);
		  $this->assign('adminmar',$adminmar);
		  $this->assign('adminapr',$adminapr);
		  $this->assign('adminmay',$adminmay);
		  $this->assign('adminjun',$adminjun);
		  $this->assign('adminjul',$adminjul);
		  $this->assign('adminaug',$adminaug);
		  $this->assign('adminsep',$adminsep);
		  $this->assign('adminoct',$adminoct);
		  $this->assign('adminnov',$adminnov);
		  $this->assign('admindec',$admindec);
		  /*当前管理员访问数据*/
		  /*查询当前管理员访问数据*/	  
    }
    /*统计管理员登陆信息*/
    /*密码修改*/
    public function editpwd(){
        if(IS_POST){
          $pwd=$_POST['pwd'];
          $whe['id']=$_SESSION['adminid'];
          $adminame=$_SESSION['adminname'];
          $data['password']=md5($adminame.(md5($pwd)));
          $result=M('admin')->where($whe)->save($data);
          if($result){
            $data['status']=1;          //成功返回参数
            $this->ajaxReturn($data);
          }else{
            $data['status']=-1;          //失败返回参数
            $this->ajaxReturn($data);
          }
        }
    }
    /*密码修改*/
    /*获取日记浏览量*/
    public function articlemont(){
      $ajan=M('articlemon')->where("month='jan'")->getField('count'); 
      $afeb=M('articlemon')->where("month='feb'")->getField('count');
      $amar=M('articlemon')->where("month='mar'")->getField('count');
      $aapr=M('articlemon')->where("month='apr'")->getField('count');
      $amay=M('articlemon')->where("month='may'")->getField('count');
      $ajun=M('articlemon')->where("month='jun'")->getField('count');
      $ajul=M('articlemon')->where("month='jul'")->getField('count');
      $aaug=M('articlemon')->where("month='aug'")->getField('count');
      $asep=M('articlemon')->where("month='sep'")->getField('count');
      $aotc=M('articlemon')->where("month='otc'")->getField('count');
      $anov=M('articlemon')->where("month='nov'")->getField('count');
      $adec=M('articlemon')->where("month='dec'")->getField('count');
      $anum=$ajan+$afeb+$amar+$aapr+$amay+$ajun+$ajul+$aaug+
      $asep+$aotc+$anov+$adec;
      $this->assign('ajan',$ajan);
      $this->assign('afeb',$afeb);
      $this->assign('amar',$amar);
      $this->assign('aapr',$aapr);
      $this->assign('amay',$amay);
      $this->assign('ajun',$ajun);
      $this->assign('ajul',$ajul);
      $this->assign('aaug',$aaug);
      $this->assign('asep',$asep);
      $this->assign('aotc',$aotc);
      $this->assign('anov',$anov);
      $this->assign('adec',$adec);
      $this->assign('anum',$anum);
    }
    /*获取日记浏览量*/
    /*评论状态*/
    public function pinglundate(){
      $plwhe['status']='0';
      $pldata=M('pinglun')->where($plwhe)->select();
      $plcount=M('pinglun')->where($plwhe)->count();
      foreach ($pldata as $key => $value) {
        //进行优化//
        $content=$pldata[$key]['content'];
        $me=preg_replace("/\<p/",'<span',$content);
        $pldata[$key]['content']=preg_replace("/\[(\S)*\]/",'',$me);
        $me=preg_replace("/\<\/p\>/",'</span>',$pldata[$key]['content']);
        $pldata[$key]['content']=preg_replace("/\[(\S)*\]/",'',$me);
        //进行优化//
        $plid['id']=$value['uid'];
        $username=M('user')->where($plid)->getField('username');
        $userimg=M('user')->where($plid)->getField('img');
        $pldata[$key]['username']=$username;
        $pldata[$key]['userimg']=$userimg;
      }
      $this->assign('pldata',$pldata);
      $this->assign('plcount',$plcount);
    }
    /*评论状态*/
}

?>