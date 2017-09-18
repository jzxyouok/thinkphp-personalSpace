<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
use Think\Image;
class MessageController extends Controller {
	/*留言界面*/
	public function lst(){
	 //判断是否有登陆
     $login=A('Admin/Index');
     $login->checklogin();
     $login->pinglundate();
   //判断是否有登陆
    $this->getmessage();
    //获取用户组信息
    $usergroup=M('usergroup')->select();
    $this->assign('usergroup',$usergroup);
    if($_GET['groupid']){
       $gid=$_GET['groupid'];
       $isgroup='1';
       $this->assign('isgroup',$isgroup);
    }else{
       $isgroup='0';
       $this->assign('isgroup',$isgroup);
    }
    //获取用户组信息
		//查询留言信息
		if($_GET['status']){      //查询未回复留言
           $where['status']=$_GET['status'];
		}
		if($_GET['isstatus']){      //查询已回复留言
           $where['status']=$_GET['isstatus'];
		}
		if($_GET['all']){      //查询全部留言
           $where['biaozhi']=array('neq',2);
		}
		if($_GET['garbage']){   //查询垃圾邮箱
           $where['biaozhi']=array('eq',2);
		}else{
           $where['biaozhi']=array('neq',2);
		}
		if($_GET['title']){  //根据用户输入内容查询
		   $title=$_GET['title'];
           $where['content']=array('like',"%{$title}%");
		}
		//查询留言
		$data=M('message')->where($where)->page($_GET['p'].',12')->select();
		$count1=M('message')->where($where)->count();
		$Page = new \Think\Page1($count1,12);// 实例化分页类 
		$show = $Page->show();// 分页显示输出
		//根据uid查询用户名
		foreach ($data as $key => $value) {
            $arr=explode(',',$value['uid']);
            foreach ($arr as $k=> $val) {
               $whe['id']=$val;
               $re=M('user')->where($whe)->getField('username');
               $data[$key]['usersname']=$re;
               $ugid=M('user')->where($whe)->getField('groupid');
               if($isgroup='1'){
                  if($ugid==$gid){
                    $data[$key]['grouid']='1';
                  }
               }
           }
           $arrs=explode(',',$value['creattime']);
           foreach ($arrs as $ks=> $vals) {
               $res=date("Y-m-d H:i:s",$vals);
               $data[$key]['time']=$res;
           }
        }
        //根据uid查询用户名
		//查询留言信息
		$norecount=M('message')->where('status=2 and biaozhi=1')->count(); //查询未回复留言总数
		$this->assign('norecount',$norecount);
    $this->assign('page',$show);// 赋值分页输出
		$this->assign('data',$data);
		$this->getumessageuser();
		$this->display();
	}
	/*留言详情界面*/
	/**/
	/*获取顶部用户留言信息*/
	public function getmessage(){
		$where['status']=2;
		$where['biaozhi']=1;
		$datacount=M('message')->where($where)->count(); //未回复留言信息
		$data=M('message')->where($where)->select();
        foreach ($data as $key => $value) {
          $content=$data[$key]['content'];
          $me=preg_replace("/\<p/",'<span',$content);
          $data[$key]['content']=preg_replace("/\[(\S)*\]/",'',$me);
          $me=preg_replace("/\<\/p\>/",'</span>',$data[$key]['content']);
          $data[$key]['content']=preg_replace("/\[(\S)*\]/",'',$me);
            $arr=explode(',',$value['uid']);
            foreach ($arr as $k=> $val) {
              $whe['id']=$val;
              $re=M('user')->where($whe)->getField('username');
              $img=M('user')->where($whe)->getField('img');
              $data[$key]['img']=$img;
              $data[$key]['username']=$re;
           }
           $arrs=explode(',',$value['creattime']);
           foreach ($arrs as $ks=> $vals) {
               $res=date("Y-m-d H:i:s",$vals);
               $data[$key]['time']=$res;
           }
        }
        $this->assign('messdata',$data);
        $this->assign('datacount',$datacount);
	}
	/*获取顶部用户留言信息*/
  /*留言回复详情*/
  public function remess(){
    if(!$_GET['id']){
       $this->redirect('Message/lst');
    }
    //判断是否有登陆
    $login=A('Admin/Index');
    $login->checklogin();
    $login->pinglundate();
    //判断是否有登陆
    //获取头部留言情况
    $this->getmessage();
    //获取头部留言情况
    //留言列表
    if($_GET['id']){
       $whe['id']=$_GET['id'];
       $mid=$_GET['id'];
       $messagedata=M('message')->where($whe)->select();
       foreach ($messagedata as $key => $value) {
        $arr=explode(',',$value['uid']);
        foreach ($arr as $k=> $val) {
          $wheid['id']=$val;
          $userimg=M('user')->where($wheid)->getField('img');
          $username=M('user')->where($wheid)->getField('username');
          $messagedata[$key]['userimg']=$userimg;
          $messagedata[$key]['username']=$username;
        }
       }
       $this->assign('messagedata',$messagedata); //回复留言情况
       $this->assign('mid',$mid);
       //查询有关回复情况
       $messid['mid']=$mid;
       $remessdata=M('remessage')->where($messid)->order('id asc')->select();
       foreach ($remessdata as $keyms => $valuems) {
          $arrms=explode(',',$valuems['uid']);
          foreach ($arrms as $kms=> $valms) {
            if($arrms!=0){
              $uidms['id']=$valms;
              $uimg=M('user')->where($uidms)->getField('img');
              $remessdata[$keyms]['uimg']=$uimg;
            }
          }
          /*管理员*/          
          $arrams=explode(',',$valuems['aid']);
          foreach ($arrams as $kams=> $valams) {
            if($arrams!=0){
              $aidams['id']=$valams;
              $aimg=M('admin')->where($aidams)->getField('img');
              $remessdata[$keyms]['aimg']=$aimg;
            }
          }
          /*管理员*/
       }
       $this->assign('remessdata',$remessdata); 
       //查询有关回复情况
    }
    //留言列表
    $this->display();
  }
  /*留言回复详情*/
  /*管理员留言回复*/
  public function postmessag(){
      if(IS_POST){
         $isreid['id']=$_POST['messid'];
         $isres['status']='1';
         $isre=M('message')->where($isreid)->save($isres);
         $data['mid']=$_POST['messid'];
         $data['uid']='0';
         $data['aid']=$_SESSION['adminid'];
         $data['content']=$_POST['messcontent'];
         $data['creattime']=time();
         $result=M('remessage')->add($data);
         //管理员轨迹//
         $adminid['uid']=$_SESSION['adminid'];
         $admingj['remesstime']=time();
         $agj=M('admingj')->where($adminid)->save($admingj);
         //管理员轨迹//
         if($result){
           $data['status']=1;      //成功返回参数
           $this->ajaxReturn($data);
         }else{
           $data['status']=-1;      //失败返回参数
           $this->ajaxReturn($data);
         }
      }
  }
  /*管理员留言回复*/
  /*获得留言用户信息*/
  public function getumessageuser(){
	  $userdata=M('message')->select();
	  foreach ($userdata as $key => $value) {
        $arr=explode(',',$value['uid']);
        foreach ($arr as $k=> $val) {
          $wheid['id']=$val;
          $username=M('user')->where($wheid)->getField('username');
             $userdata[$key]['username']=$username;
        }
      }
	  $this->assign('userdata',$userdata);
  }
  /*获得留言用户信息*/
  /*回复留言*/
  public function remessage(){
       if($_POST['userid']!=''){
		   $whe['uid']=$_POST['userid'];
		   $whes['id']=$_POST['userid'];
		   $isre=M('remessage')->where($whe)->order('id asc')->limit(1)->select();
		   if($isre){
        ////
         $html="";
         foreach ($isre as $k=> $val) {
           $isuser=M('user')->where($whes)->getField('username');
           $isimg=M('user')->where($whes)->getField('img');
           $html.="<div class='panel-body'>";
           $html.="<div class='timeline-messages'>";
           $html.="<div class='msg-time-chat'>";
           $html.="<input type='hidden' id='messid' name='messid' value='".$val[mid]."'>";
           $html.="<img class='avatar' src='http://localhost/person/Public/img/uploads/userimg/".$isimg."' alt='' style='width:44px;height:44px;'>";
           $html.="<div class='message-body msg-in'>";
           $html.="<span class='arrow'></span>";
           $html.="<div class='text'>";
           $html.="<p class='attribution'>".$isuser." ".date('Y-m-d H:i:s',$val[creattime])."</p>";
           $html.="<p>".$val[content]."</p>";
           $html.="</div>";
                  $html.="</div>";
           $html.="</div>";
           $html.="</div>";
           $html.="</div>"; 
           $data['status']='ok';
           $data['msg']=$html;
           $this->ajaxReturn($data);
         }
        ////
		   }else{
			   $isme=M('message')->where($whe)->order('id asc')->limit(1)->select();
			   $html="";
			   foreach ($isme as $k=> $val) {
				  $isuser=M('user')->where($whes)->getField('username');
				  $isimg=M('user')->where($whes)->getField('img');
				   ////
			      $html.="<div class='panel-body'>";
                  $html.="<div class='timeline-messages'>";
                  $html.="<div class='msg-time-chat'>";
				  $html.="<input type='hidden' id='messid' name='messid' value='".$val[id]."'>";
				  $html.="<img class='avatar' src='http://localhost/person/Public/img/uploads/userimg/".$isimg."' alt='' style='width:44px;height:44px;'>";
                  $html.="<div class='message-body msg-in'>";
                  $html.="<span class='arrow'></span>";
                  $html.="<div class='text'>";
				  $html.="<p class='attribution'>".$isuser." ".date('Y-m-d H:i:s',$val[creattime])."</p>";
				  $html.="<p>".$val[content]."</p>";
				  $html.="</div>";
                  $html.="</div>";
				  $html.="</div>";
				  $html.="</div>";
				  $html.="</div>";   
				   ////
			   }
			   $data['status']='ok';
         $data['msg']=$html;
			   $this->ajaxReturn($data);
		   }
	   }else{
		   $data['status']='ok';
           $data['msg']="";
		   $this->ajaxReturn($data);
	   }
  }
  /*回复留言*/
  /*留言回复*/
  public function dopostmessage(){
     if(IS_POST){
        $whe['id']=$_POST['messid'];
        $whes['status']='1';
        $mess=M('message')->where($whe)->save($whes);
        $data['content']=$_POST['content'];
        $data['mid']=$_POST['messid'];
        $data['creattime']=time();
        $data['uid']='0';
        $data['aid']=$_SESSION['adminid'];
      //管理员轨迹//
        $adminid['uid']=$_SESSION['adminid'];
        $admingj['remesstime']=time();
        $agj=M('admingj')->where($adminid)->save($admingj);
      //管理员轨迹//
        $result=M('remessage')->add($data);
        if($result){
          $data['status']=1;      //成功返回参数
          $this->ajaxReturn($data);
        }else{
          $data['status']=-1;      //失败返回参数
          $this->ajaxReturn($data); 
        }
     }
  }
  /*留言回复*/
}