<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
use Think\Image;
class AudioController extends Controller {
	/*图片管理*/
	public function audiolist(){
    //判断是否有登陆
    $login=A('Admin/Index');
    $login->checklogin();
    $login->pinglundate();
    //判断是否有登陆
    //获取留言信息//
    $message=A('Admin/Message');
    $message->getmessage();
    //获取留言信息//
    $message=A('Admin/Message');
    $message->getmessage();
    //获取留言信息//
		//查询图片总类
		$autiotype=M('videtype')->order('id desc')->select();
		//查询相册
		if($_GET){
			$where['vid']=$_GET['vid'];
			$result=M('theme')->where($where)->select();
      $_SESSION['thembid']=$_GET['vid'];
		}else{
      $where['vid']=M('videtype')->order('id desc')->limit(1)->getField('id');
			$result=M('theme')->where($where)->select();
      $_SESSION['thembid']=M('videtype')->order('id desc')->limit(1)->getField('id');
		}
		$this->assign('result',$result);  //视频
		$this->assign('autiotype',$autiotype);   //图片总类
		$this->display();
	}
	/*新增相册*/
	public function addtheme(){
      if(IS_POST){
	    ////
		  //上传图片配置//
		  $time=time();
          $upload = new \Think\Upload();// 实例化上传类
          $upload->autoSub=true;
          $upload->autoSub=false;
          $upload->maxSize=3145728 ;// 设置附件上传大小
          $upload->exts   =array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
          $upload->saveName=array('date',array('his',$time));;
          $upload->rootPath='./Public/img/uploads/theme/'; // 设置附件上传根目录
		//上传图片配置//
        // 上传文件 
          $info =$upload->upload();  
		//上传文件/
		//图片类型//
		  if(!$info) {  // 上传错误提示错误信息
            $this->error($upload->getError());   
      }else{// 上传成功
		   $data['vid']=$_POST['themeid'];
			 $data['name']=$_POST['alumbname'];
			 $data['img']=$info['alumbimg']['savename'];
			 $data['status']=$_POST['status'];

			 $result=M('theme')->add($data);
			 if($result){
				 $this->success('新增主题成功！');
			 }else{
				 $this->error('新增主题失败');
			 }
		  }
		////
	  }
	  ////
	}
	/*视频详情*/
	public function audios(){
    //判断是否有登陆
    $login=A('Admin/Index');
    $login->checklogin();
    $login->pinglundate();
    //判断是否有登陆
    //获取留言信息//
    $message=A('Admin/Message');
    $message->getmessage();
    //获取留言信息//
		if(IS_GET){
			$whe['vid']=$_GET['id'];
			$whea['id']=$_GET['id'];
			//查询主题相关信息
			$themedata=M('theme')->where($whea)->select();	
			//查询主题相关信息
			$aid=$_GET['id'];
			$video=M('video');
			$data=$video->where($whe)->order('id desc')->page($_GET['p'].',12')->select();
			$count1=$video->where($whe)->count();
		    $Page = new \Think\Page1($count1,12);// 实例化分页类 传入总记录数和每页显示的记录数
		    $isvideo=$video->where($whe)->find();
		    if($isvideo){
              $isad=1;
		    }else{
		      $isad=0;	
		    }
            $show = $Page->show();// 分页显示输出
            $this->assign('page',$show);// 赋值分页输出
            $this->assign('data',$data);
            $this->assign('aid',$aid);
            $this->assign('isad',$isad);
            $this->assign('themedata',$themedata); //相册信息
            $this->display();
		}
	}
	/*删除图片*/
	public function deleteimg(){
		if($_GET){
			$whe['id']=$_GET['id'];
			$res=M('img')->where($whe)->delete();
		    $this->redirect('Image/imglist');
		}
	}
	/*修改相册封面*/
	public function postthemeimg(){
		//
	  $M = M('theme');
	  $aid=$_GET['id'];
	  $name=time();
  	  $config=array(
         'rootPath'=>"./Public/img/uploads/theme/",
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
         $image->open("./Public/img/uploads/theme/".$saveName);
         //将图片裁剪为400x400并保存为corp.jpg
         $image->crop($avatarData['width'],$avatarData['height'],$avatarData['x'], $avatarData['y'])->save("./Public/img/uploads/theme/".$saveName);        
         $map['img']=$saveName;
         $M->where('id='.$aid)->save($map);
         $this->ajaxReturn($return);
      	 // 
      }else{
      	$this->ajaxReturn($Upload->getError());
      }
		//
	}
	/*修改相册信息*/
	public function edittheme(){
		if(IS_POST){
           $whe['id']=$_POST['alubmid'];

           $data['name']=$_POST['alubmname'];
           $data['status']=$_POST['alubmstatus'];
           $result=M('theme')->where($whe)->save($data);
           if($result){
              $data['status']=1;          //成功返回参数
              $this->ajaxReturn($data);
           }else{
              $data['status']=-1;          //失败返回参数
              $this->ajaxReturn($data);
           }
		}
	}
	/*删除相册信息*/
	public function deletetheme(){
		if(IS_POST){
           $whe['id']=$_POST['alubmid'];
           $whes['tid']=$_POST['alubmid'];
           $result=M('theme')->where($whe)->delete();
           $results=M('video')->where($whes)->delete();
           $data['status']=1;          //成功返回参数
           $this->ajaxReturn($data); 
		}
	}
/********视频上传************/
  /*上传视频*/
  public function addvideo(){
      if(IS_POST){
        ////
        $time=time();
        $upload = new \Think\Upload();// 实例化上传类
        $upload->autoSub=true;
        $upload->autoSub=false;
        $upload->maxSize= 314572800000000;// 设置附件上传大小
        $upload->exts   =array('mp4','wmv','ogg','webm');// 设置附件上传类型
        $upload->saveName=array('date',array('his',$time));;
        $upload->rootPath='./Public/img/uploads/video/'; // 设置附件上传根目录
    //上传图片配置//
        // 上传文件 
        $info =$upload->upload();
        if(!$info) {  // 上传错误提示错误信息
            $this->error($upload->getError());   
        }else{// 上传成功
          $data['name']=$_POST['videoname'];
          $data['describe']=$_POST['describe'];
          $data['tid']=$_SESSION['thembid'];
          $data['vid']=$_POST['aid'];
          $data['video']=$info['videourl']['savename'];
          $data['time']=time();
          $result=M('video')->add($data);
          if($result){
            $this->success('上传成功！');
          }else{
            $this->error('上传失败');
          }
        }
        ////
      }
  }
  /*视频修改*/
  /*视频删除*/
  public function deletevideo(){
     if(IS_GET){
        $whe['id']=$_GET['id'];
        $result=M('video')->where($whe)->delete();
        if($result){
          $this->success('上传成功！');
        }else{
          $this->error('上传失败');
        }
     }
  }
  /*视频修改页面*/
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
     $whe['id']=$_GET['id'];
     $date=M('video')->where($whe)->select();
     $this->assign('date',$date);
     $this->display();
  }
  /*视频修改*/
  public function editvideo(){
    if(IS_POST){
       $whe['id']=$_POST['videoid'];
       $data['name']=$_POST['videoname'];
       $data['describe']=$_POST['describe'];
       $result=M('video')->where($whe)->save($data);
       if($result){
          $data['status']=1;          //成功返回参数
          $this->ajaxReturn($data);
       }else{
          $data['status']=-1;          //成功返回参数
          $this->ajaxReturn($data);
       }
    }
  }
  /*更换视频*/
  public function updatevideo(){
     if(IS_POST){
        ////
        $time=time();
        $upload = new \Think\Upload();// 实例化上传类
        $upload->autoSub=true;
        $upload->autoSub=false;
        $upload->maxSize= 314572800000000;// 设置附件上传大小
        $upload->exts   =array('mp4','wmv','ogg','webm');// 设置附件上传类型
        $upload->saveName=array('date',array('his',$time));;
        $upload->rootPath='./Public/img/uploads/video/'; // 设置附件上传根目录
    //上传图片配置//
        // 上传文件 
        $info =$upload->upload();
        if(!$info) {  // 上传错误提示错误信息
            $this->error($upload->getError());   
        }else{// 上传成功
          $whe['id']=$_POST['videoid'];
          $data['video']=$info['videourl']['savename'];
          $result=M('video')->where($whe)->save($data);
          if($result){
            $this->success('修改成功！');
          }else{
            $this->error('修改失败');
          }
        }
        ////
      }
  }
/********视频上传************/
	/*分类管理*/
	public function typelist(){
    //判断是否有登陆
    $login=A('Admin/Index');
    $login->checklogin();
    $login->pinglundate();
    //判断是否有登陆
    //获取留言信息//
    $message=A('Admin/Message');
    $message->getmessage();
    //获取留言信息//
      $data=M('videtype')->select();
      $this->assign('data',$data);
      $this->display();
	}
	/*新增分类*/ 
	public function addtype(){
		if(IS_POST){
           $data['name']=$_POST['type'];
           $istype=M('videtype')->where($data)->find(); //判断是否存在相同分类
           if($istype){
              $data['status']=-1;          //失败返回参数
              $this->ajaxReturn($data);
           }else{
              $result=M('videtype')->add($data);
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
	/*编辑分类*/ 
	public function edittype(){
		if(IS_POST){
           $whe['id']=$_POST['tid'];
           $data['name']=$_POST['newtype'];
           $videotype=M('videtype');
           $istype=$videotype->where($data)->find();  //判断是否存在相同类名
           if($istype){
              $data['status']=-1;          //失败返回参数
              $this->ajaxReturn($data);
           }else{
           	  $result=$videotype->where($whe)->save($data);
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
	/*删除分类*/ 
	public function deletetype(){
		if(IS_POST){
          $whe['id']=$_POST['tid'];
          $whes['vid']=$_POST['tid'];
          $result=M('videtype')->where($whe)->delete();
          $results=M('theme')->where($whes)->delete();
          $resultss=M('video')->where($whes)->delete();
          if($result){
            $data['status']=1;          //成功返回参数
            $this->ajaxReturn($data);
          }else{
            $data['status']=-1;          //失败返回参数
            $this->ajaxReturn($data);
          }
		}
	}
	/**/
}