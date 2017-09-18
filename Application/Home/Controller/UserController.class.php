<?php
namespace Home\Controller;
use Think\Controller;
use Think\Upload;
use Think\Image;
class UserController extends BaseUserController {
    //图片
    public function lst(){
    	if($_SESSION['username']==''){
			$this->redirect('Home/Login/login');
		}
		//查询导航
		$this->top();
		//查询尾部
		$this->getlastvideo();
		//查询导航
		//查询用户信息
		$whe['id']=$_SESSION['userid'];
		$data=M('user')->where($whe)->select();
		$uid=$_SESSION['userid'];
		$img=M('user')->where($whe)->getField('img');
		$this->assign('uid',$uid);
		$this->assign('img',$img);
		$this->assign('data',$data);
		//查询用户信息
    	$this->display();
    }
	/*用户信息修改*/
	public function edituser(){
		if(IS_POST){
			$username=$_POST['username'];
			$userphone=$_POST['phone'];
			$userpassword=$_POST['password'];
			$whe['id']=$_SESSION['userid'];
			if($username!=''){
				$op=$this->isname($username);
				if($op==1){
                    $data['status']=-1;      //成功返回参数
                    $this->ajaxReturn($data);
				}
				$userdata['username']=$username;
			}
			if($userpassword!=''){
				$userdata['password']=md5($username.(md5($userpassword)));
			}
			if($userphone!=''){
				$ops=$this->isphone($userphone);
				if($ops==1){
                    $data['status']=-2;      //成功返回参数
                    $this->ajaxReturn($data);
				}
				$userdata['phone']=$userphone;
			}
			$result=M('user')->where($whe)->save($userdata);
			if($result){
				$data['status']=1;      //成功返回参数
                $this->ajaxReturn($data);
			}else{
			    $data['status']=0;      //成功返回参数
                $this->ajaxReturn($data);
			}
		}
	}
	/**/
	/*判断是否存在用户名*/
	public function isname($name){
        $whe['username']=$name;
        $isname=M('user')->where($whe)->find();
        $op=0;
        if($isname){
           $isid=M('user')->where($whe)->getField('id');
           if($isid!=$_SESSION['userid']){
              $op=1;
           }else{
           	  $op=0;
           }
        }else{
           $op=0;
        }
        return $op;
	}
	/*判断是否存在手机*/
	public function isphone($phone){
        $whe['phone']=$phone;
        $isphone=M('user')->where($whe)->find();
        $op=0;
        if($isphone){
           $isid=M('user')->where($whe)->getField('id');
           if($isid!=$_SESSION['userid']){
              $op=1;
           }else{
           	  $op=0;
           }
        }else{
           $op=0;
        }
        return $op;
	}

	/////
}