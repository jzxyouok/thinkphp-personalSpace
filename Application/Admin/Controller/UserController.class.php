<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
use Think\Upload;
use Think\Image;
class UserController extends Controller {
	/*用户添加界面*/
    public function user(){
    //判断是否有登陆
    $login=A('Admin/Index');
    $login->checklogin();
    $login->pinglundate();
    //判断是否有登陆
    //获取留言信息//
    $message=A('Admin/Message');
    $message->getmessage();
    //获取留言信息//
		  $usergroup=M('usergroup')->select();
		  $this->assign('usergroup',$usergroup);
          $this->display();
    }
	/*管理员添加方法*/
	public function addadmin(){
		if(IS_POST){
			$whe['name']=$_POST['adminname'];
			$data['name']=$_POST['adminname'];
			$data['password']=md5($_POST['adminname'].(md5($_POST['adminpwd'])));
			$data['creattime']=time();
			$data['lasttime']=' ';
			$data['img']='admin.jpg';
			$whes['phone']=$_POST['adminphone'];
			$isphone=M('admin')->where($whes)->find();
			if($isphone){
               $data['status']=-3;          //失败返回参数
               $this->ajaxReturn($data);
			}
			$data['phone']=$_POST['adminphone'];
			$isadmin=M('admin')->where($whe)->find();
			if($isadmin){
				$data['status']=-1;          //失败返回参数
                $this->ajaxReturn($data);
			}else{
			    $result=M('admin')->add($data);
				if($result){
				//添加管理员轨迹表//
				$dagj['creattime']=$data['creattime'];
				$dagj['uid']=$result;
				$dagj['imgtime']=0;
				$dagj['filetime']=0;
				$dagj['logintime']=0;
				$dagj['remesstime']=0;
			    $gj=M('admingj')->add($dagj);
			    //添加管理员轨迹表//
			    //添加管理员登陆表
			    $logimons['uid']=$result;
			    $adminlogin=M('adminlogin')->add($logimons);
			    //添加管理员登录表
					$data['status']=1;          //成功返回参数
                    $this->ajaxReturn($data);
				}else{
					$data['status']=-2;          //失败返回参数
                    $this->ajaxReturn($data);
				}
			}
		}
	}
	/*用户添加方法*/
	public function adduser(){
		if(IS_POST){
			$whe['username']=$_POST['username'];
			$data['username']=$_POST['username'];
			$data['password']=md5($_POST['username'].(md5($_POST['userpwd'])));
			$data['creattime']=time();
			$data['lasttime']=' ';
			$data['img']='user.png';
			$data['groupid']=$_POST['groupid'];
			$data['status']='1';
			$data['phone']=' ';
			$isuser=M('user')->where($whe)->find();
			if($isuser){
				$data['status']=-1;          //失败返回参数
                $this->ajaxReturn($data);
			}else{
			    $result=M('user')->add($data);
				if($result){
					$data['status']=1;          //成功返回参数
                    $this->ajaxReturn($data);
				}else{
					$data['status']=-2;          //失败返回参数
                    $this->ajaxReturn($data);
				}
			}
		}
	}
	/*用户列表*/
	public function lists(){
		//判断是否有登陆
       $login=A('Admin/Index');
       $login->checklogin();
       $login->pinglundate();
        //判断是否有登陆
       //获取留言信息//
       $message=A('Admin/Message');
       $message->getmessage();
       //获取留言信息//
		$count1=M('user')->count();
		$Page = new \Think\Page1($count1,2);// 实例化分页类 传入总记录数和每页显示的记录数
		$result=M('user')->order('id')->page($_GET['p'].',2')->select();
		    //读取用户信息
		$show = $Page->show();// 分页显示输出
		foreach ($result as $key => $value) {
            $arr=explode(',',$value['groupid']);
            foreach ($arr as $k=> $val) {
               $where['id']=$val;
               $re=M('usergroup')->where($where)->getField('name');
               $result[$key]['groupname']=$re;
           }
        }
        $this->assign('result',$result);
        $this->assign('page',$show);// 赋值分页输出
		$this->display();
	}
	/*禁言*/
	public function jy(){
		if($_GET){
			 $whe['id']=$_GET['id'];
		     $re['status']=0;
		     $res=M('user')->where($whe)->save($re);
		     $this->redirect('User/lists');
		}
	}
	/*发言*/
	public function fy(){
		if($_GET){
			$whe['id']=$_GET['id'];
		    $re['status']=1;
		    $res=M('user')->where($whe)->save($re);
		    $this->redirect('User/lists');
		}
	}
	/*删除用户*/
	public function deleteuser(){
		if($_GET){
			$whe['id']=$_GET['id'];
			$res=M('user')->where($whe)->delete();
		    $this->redirect('User/lists');
		}
	}
	/*修改页面*/
	public function update(){
		//判断是否有登陆
        $login=A('Admin/Index');
        $login->checklogin();
        $login->pinglundate();
        //判断是否有登陆 
        //获取留言信息//
        $message=A('Admin/Message');
        $message->getmessage();
        //获取留言信息//
		if($_GET){
			$uid=$_GET['id'];
			$date=M('user')->where('id='.$uid)->select();
			$usergroup=M('usergroup')->select();
		    $this->assign('usergroup',$usergroup);
			$this->assign('date',$date);
			$this->assign('uid',$uid);
			$this->display();
		}	
	}
	/*用户图片上传*/
	public function postimg(){
		//
		$M = M('user');
	    $uid=$_GET['id'];
  	    $config=array(
            'rootPath'=>"./Public/img/uploads/userimg/",
            'maxSize' =>'1048579',
            'saveName'=>$uid,
             'autoSub'=> false,
            'replace'=>true,      
        );
      $Upload = new Upload($config);
      $info = $Upload->upload();
      if ($info) {
         // 
         $saveName = $info['avatar_file']['savename'];
         $avatarData=json_decode(htmlspecialchars_decode(I('avatar_data')),true);
         $return['result']=$saveName;
         $image = new \Think\Image(); 
         $image->open("./Public/img/uploads/userimg/".$saveName);
         //将图片裁剪为400x400并保存为corp.jpg
         $image->crop($avatarData['width'],$avatarData['height'],$avatarData['x'], $avatarData['y'])->save("./Public/img/uploads/userimg/".$saveName);        
         $map['img']=$saveName;
         $M->where('id='.$uid)->save($map);
         $this->ajaxReturn($return);
      	 // 
      }else{
      	$this->ajaxReturn($Upload->getError());
      }
		//
	}
	/*用户修改*/
	public function edituser(){
		if(IS_POST){
			$whe['id']=$_POST['userid'];
			if($_POST['username']){
				$isname['username']=$_POST['username'];
				$isn=M('user')->where($isname)->find();
				if($isn){
				}else{
				  $data['username']=$_POST['username'];
				}
			}
			if($_POST['userphone']){
				$isphone['phone']=$_POST['userphone'];
				$isp=M('user')->where($isphone)->find();
				if($isp){
				}else{
				  $data['phone']=$_POST['userphone'];
				}
			}
			if($_POST['userpwd']){
				if($_POST['username']){
                   $data['password']=md5($_POST['username'].(md5($_POST['userpwd'])));
				}else{
				   $username=M('user')->where($whe)->getField('username');
                   $data['password']=md5($username.(md5($_POST['userpwd'])));
				}
			}
			if($_POST['groupid']){
				$data['groupid']=$_POST['groupid'];
			}
			$result=M('user')->where($whe)->save($data);
			if($result){
				$data['status']=1;          //成功返回参数
                $this->ajaxReturn($data);
			}else{
				$data['status']=-1;          //失败返回参数
                $this->ajaxReturn($data);
			}
		}
	}
	/*用户组页面*/
	public function group(){
		//判断是否有登陆
        $login=A('Admin/Index');
        $login->checklogin();
        $login->pinglundate();
        //判断是否有登陆
        //获取留言信息//
        $message=A('Admin/Message');
        $message->getmessage();
        //获取留言信息//
		 $data=M('usergroup')->select();
		 $this->assign('data',$data);
		 $this->display();
	}
	/*删除用户组*/
	public function deleteusergroup(){
		if($_GET){
			$whe['id']=$_GET['id'];
			$res=M('usergroup')->where($whe)->delete();
		    $this->redirect('User/group');
		}
	}
	/*用户组添加*/
	public function addgroup(){
		if(IS_POST){
			$data['name']=$_POST['groupname'];
			$isname=M('usergroup')->where($data)->find();
			if($isname){
				$data['status']=-1;          //成功返回参数
                $this->ajaxReturn($data);
			}else{
				$result=M('usergroup')->add($data);
				if($result){
					$data['status']=1;          //成功返回参数
                    $this->ajaxReturn($data);
				}else{
					$data['status']=-2;          //成功返回参数
                    $this->ajaxReturn($data);
				}
			}
		}
	}
	/*修改用户组*/
	public function editgroup(){
		if(IS_POST){
			$whe['name']=$_POST['groupnames'];
			$whes['id']=$_POST['groupid'];
			$isname=M('usergroup')->where($whe)->find();
			if($isname){
				$data['status']=-1;          //成功返回参数
                $this->ajaxReturn($data);
			}else{
				$result=M('usergroup')->where($whes)->save($whe);
				if($result){
					$data['status']=1;          //成功返回参数
                    $this->ajaxReturn($data);
				}else{
					$data['status']=-2;          //成功返回参数
                    $this->ajaxReturn($data);
			    }
			}
		}
	}
	/*管理员列表*/
	public function adminlists(){
		//判断是否有登陆
        $login=A('Admin/Index');
        $login->checklogin();
        $login->pinglundate();
        //判断是否有登陆
        //获取留言信息//
        $message=A('Admin/Message');
        $message->getmessage();
        //获取留言信息//
        $data=M('admin')->order('id desc')->page($_GET['p'].',12')->select();
        $count1=M('admin')->count();
		$Page = new \Think\Page1($count1,12);// 实例化分页类
		$show = $Page->show();// 分页显示输出
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('data',$data);
        $this->display();
	}
	/*管理删除*/
	public function deleteadmin(){
        if($_GET){
           $id=$_GET['id'];
           $adminlogin=M('adminlogin');  //管理员登录表
           $admin=M('admin');   //管理员表
           $admingj=M('admingj');  //管理员轨迹表
           $adminfile=M('file');  //管理员文章表
           $adminremess=M('remessage');  //管理员回复表
           $whe['uid']=$id;
           $whes['id']=$id;
           $whed['uid']=$id;
           $whef['author']=$id;
           $wheg['uid']=$id;
           $de=$adminlogin->where($whe)->delete();
           $des=$admin->where($whes)->delete();
           $dess=$admingj->where($whed)->delete();
           $desss=$adminfile->where($whef)->delete();
           $dessss=$adminremess->where($wheg)->delete();
           $this->redirect('User/adminlists');
        }
	}
	/**/
	/*管理员修改页面*/
	public function updateadmin(){
		//判断是否有登陆
        $login=A('Admin/Index');
        $login->checklogin();
        $login->pinglundate();
        //判断是否有登陆
        //获取留言信息//
        $message=A('Admin/Message');
        $message->getmessage();
        //获取留言信息//
		if($_GET){
          $id=$_GET['id'];
          $data=M('admin')->where('id='.$id)->select();
          $this->assign('data',$data);
          $this->assign('uid',$id);
          $this->display();
		}
	}
	/**/
	/*管理员修改方法*/
	public function editadmin(){
		if(IS_POST){
			$whe['id']=$_POST['userid'];
			if($_POST['username']){
				$isname['name']=$_POST['username'];
				$isn=M('admin')->where($isname)->find();
				if($isn){
				}else{
				  $data['name']=$_POST['username'];
				}
			}
			if($_POST['userphone']){
				$isphone['phone']=$_POST['userphone'];
				$isp=M('admin')->where($isphone)->find();
				///
				///
				if($isp){
				}else{
				  $data['phone']=$_POST['userphone'];
				}
			}
			if($_POST['userpwd']){
				if($_POST['username']){
                   $data['password']=md5($_POST['username'].(md5($_POST['userpwd'])));
				}else{
				   $username=M('user')->where($whe)->getField('name');
                   $data['password']=md5($username.(md5($_POST['userpwd'])));
				}
			}
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
	/*管理员头像修改*/
	public function editimgadmin(){
		////
		$M = M('admin');
	    $uid=$_GET['id'];
	    $name=time();
  	    $config=array(
            'rootPath'=>"./Public/img/uploads/admin/",
            'maxSize' =>'1048579',
            'saveName'=>"$name",
             'autoSub'=> false,
            'replace'=>true,      
        );
        $Upload = new Upload($config);
        $info = $Upload->upload();
        if ($info) {
         // 
         $saveName = $info['avatar_file']['savename'];
         $avatarData=json_decode(htmlspecialchars_decode(I('avatar_data')),true);
         $return['result']=$saveName;
         $image = new \Think\Image(); 
         $image->open("./Public/img/uploads/admin/".$saveName);
         //将图片裁剪为400x400并保存为corp.jpg
         $image->crop($avatarData['width'],$avatarData['height'],$avatarData['x'], $avatarData['y'])->save("./Public/img/uploads/admin/".$saveName);      
         $map['img']=$saveName;
         $M->where('id='.$uid)->save($map);
         $this->ajaxReturn($return);
      	 // 
        }else{
      	 $this->ajaxReturn($Upload->getError());
        }
		//
		////
	}
	/**/
}

?>