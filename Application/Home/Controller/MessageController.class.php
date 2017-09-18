<?php
namespace Home\Controller;
use Think\Controller;
use Think\Upload;
use Think\Image;
class MessageController extends BaseUserController {
    //获取留言
	public function lst(){
		if($_SESSION['username']==''){
		  $this->redirect('Home/Login/login');
		}
		//查询导航
		$this->top();
		//查询尾部
		$this->getlastvideo();
		//查询导航
		//导航颜色
		$this->topcolor('5');
		if(!$_GET['p']){
          $_GET['p']='1';
		}
		//获取留言情况
		$uid=$_SESSION['userid'];
	    $Message = M('message');
	    $where['uid']=$uid;
		$data=$Message->where($where)->page($_GET['p'].',2')->select();
		foreach ($data as $key => $value) {
			$whe['id']=$value['uid'];
            $userimg=M('user')->where($whe)->getField('img');
            $username=M('user')->where($whe)->getField('username');
            $data[$key]['userimg']=$userimg;
            $data[$key]['username']=$username;
            ///查看日期
            $month=date('m',$value['creattime']);
            $day=date('d',$value['creattime']);
            $data[$key]['month']=$this->getTime($month);
		    $data[$key]['day']=$day;
            ///查看回复情况
            $whecout['mid']=$value['id'];
            $comment=M('remessage')->where($whecout)->count();
            if($comment==''){
              $data[$key]['comment']=0;
            }else{
              $data[$key]['comment']=$comment;	 
            }
            
            ///
		}
		$count1=$Message->where($where)->count();
		$Page = new \Think\Page1($count1,2);// 实例化分页类 
		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('data',$data);
		//获取留言情况
		///////////////
		
		///////////////
		$this->display();
	}
    ////根据日期查找时间
    public function getTime($time){
    	///
    	if($time){
			if($time=='01'){ 
			  $time='Jan';
			}else if($time=='02'){
				$time='Feb';
			}else if($time=='03'){
				$time='Mar';
			}else if($time=='04'){
				$time='Apr';
			}else if($time=='05'){
				$time='May';
			}else if($time=='06'){
				$time='Jun';
			}else if($time=='07'){
				$time='Jul';
			}else if($time=='08'){
				$time='Aug';
			}else if($time=='09'){
				$time='Sept';
			}else if($time=='10'){
				$time='Oct';
			}else if($time=='11'){
				$time='Nov';
			}else{
				$time='Dec';
			}
			return $time;
		}
    	///
    }
	///留言
    public function domessage(){
    	//查询用户是否被禁言//
		$uerjy['id']=$_SESSION['userid'];
		$jy=M('user')->where($uerjy)->getField('status');
		if($jy==0){
          $data['status']=-2;      //成功返回参数
          $this->ajaxReturn($data);
          die;
		}
        //查询用户是否被禁言//
		///
		if(IS_POST){
			$whe['content']=$_POST['content'];
			$whe['creattime']=time();
			$whe['status']='2';
			$whe['uid']=$_SESSION['userid'];
			$whe['biaozhi']='1';
			$result=M('message')->add($whe);
			if($result){
               $data['status']=1;       //成功返回参数
               $this->ajaxReturn($data);
            }else{
               $data['status']=-1;       //失败返回参数
               $this->ajaxReturn($data); 
            }
		}
		///
	}
	///留言
	////获取留言详情
	public function messagelist(){
		//查询导航
		$this->top();
		//查询尾部
		$this->getlastvideo();
		//查询导航
		//导航颜色
		$this->topcolor('5');
		if(!$_GET['p']){
          $_GET['p']='1';
		}
		if($_SESSION['username']==''){
		  $this->redirect('Home/Login/login');
		}
		if($_GET['mid']){
         /////
		  $whe['mid']=$_GET['mid'];   //获取留言ID
		  $data=M('remessage')->where($whe)->page($_GET['p'].',4')->select();
		  $who['id']=$_GET['mid'];
		  $message=M('message')->where($who)->select();
		  foreach ($message as $key => $value) {
		  	$where['id']=$value['uid'];
		  	$userimg=M('user')->where($where)->getField('img');
		  	$username=M('user')->where($where)->getField('username');
		    $message[$key]['userimg']=$userimg;
		  	$message[$key]['username']=$username;
		  	///查看日期
            $month=date('m',$value['creattime']);
            $day=date('d',$value['creattime']);
            $message[$key]['month']=$this->getTime($month);
		    $message[$key]['day']=$day;

		  }
		  foreach ($data as $key => $value) {
		  	  $where['id']=$value['uid'];
		  	  $wheres['id']=$value['aid'];
		  	  if($value['aid']!=0){
                $adminimg=M('admin')->where($wheres)->getField('img');
		  	    $adminname=M('admin')->where($wheres)->getField('name');
		  	    $data[$key]['meth']=1;
		  	    $data[$key]['img']=$adminimg;
		  	    $data[$key]['name']=$adminname;
		  	  }
		  	  if($value['uid']!=0){
                $userimg=M('user')->where($where)->getField('img');
		  	    $username=M('user')->where($where)->getField('username');
		  	    $data[$key]['meth']=0;
		  	    $data[$key]['img']=$userimg;
		  	    $data[$key]['name']=$username;
		  	  }
		  	  ///查看日期
              $month=date('m',$value['creattime']);
              $day=date('d',$value['creattime']);
              $data[$key]['month']=$this->getTime($month);
		      $data[$key]['day']=$day;
		  }
		  $count1=M('remessage')->where($whe)->count();
		  $Page = new \Think\Page1($count1,4);// 实例化分页类 
		  $show = $Page->show();// 分页显示输出
		  $this->assign('page',$show);// 赋值分页输出
		  $this->assign('data',$data);
		  $this->assign('mid',$_GET['mid']);
		  $this->assign('message',$message);
		  $this->display();
		 /////
		}else{
          $this->redirect('Home/Message/lst');
		}
	}
	////获取留言详情
	//获取用户留言//
	//用户回复留言
	public function doremessage(){
		//查询用户是否被禁言//
		$uerjy['id']=$_SESSION['userid'];
		$jy=M('user')->where($uerjy)->getField('status');
		if($jy==0){
          $data['status']=-2;      //成功返回参数
          $this->ajaxReturn($data);
          die;
		}
        //查询用户是否被禁言//
		if(IS_POST){
           $data['mid']=$_POST['mid'];
           $data['uid']=$_SESSION['userid'];
           $data['aid']=0;
           $data['content']=$_POST['recontent'];
           $data['creattime']=time();
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
	//用户回复留言
}