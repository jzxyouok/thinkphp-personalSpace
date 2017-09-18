<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
use Think\Image;
class ImageController extends Controller {
	/*图片管理*/
	public function imglist(){
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
		$imgtype=M('imgtype')->order('id desc')->select();
		//查询相册
		if($_GET){
			$where['tid']=$_GET['mid'];
			$result=M('album')->where($where)->select();
			$_SESSION['alumbid']=$_GET['mid'];
		}else{
      $where['tid']=M('imgtype')->order('id desc')->limit(1)->getField('id');
			$result=M('album')->where($where)->select();
			$alumb=$where['tid']=M('imgtype')->order('id desc')->limit(1)->getField('id');
			$_SESSION['alumbid']=$alumb;
		}
		$this->assign('result',$result);  //相册
		$this->assign('imgtype',$imgtype);   //图片总类
		$this->display();
	}
	/*新增相册*/
	public function addalumb(){
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
          $upload->rootPath='./Public/img/uploads/alumb/'; // 设置附件上传根目录
		//上传图片配置//
        // 上传文件 
          $info =$upload->upload();  
		 
		//上传文件/
		//图片类型//
		  if(!$info) {  // 上传错误提示错误信息
            $this->error($upload->getError());   
          }else{// 上传成功
		     $data['tid']=$_SESSION['alumbid'];
			   $data['name']=$_POST['alumbname'];
			   $data['img']=$info['alumbimg']['savename'];
			   $data['status']=$_POST['status'];
			   $result=M('album')->add($data);
			 if($result){
				 $this->success('新增相册成功！');
			 }else{
				 $this->error('新增相册失败');
			 }
		  }
		////
	  }
	  ////
	}
	/*图片详情*/
	public function imgs(){
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
			$whe['aid']=$_GET['id'];
			$whea['id']=$_GET['id'];
			//查询相册相关信息
			$alumbdata=M('album')->where($whea)->select();	
			//查询相册相关信息
			$aid=$_GET['id'];
			$img=M('img');
			$data=$img->where($whe)->order('id desc')->page($_GET['p'].',12')->select();
			$count1=$img->where($whe)->count();
		    $Page = new \Think\Page1($count1,12);// 实例化分页类 传入总记录数和每页显示的记录数
		    $isimg=$img->where($whe)->find();
		    if($isimg){
              $isad=1;
		    }else{
		      $isad=0;	
		    }
            $show = $Page->show();// 分页显示输出
            $this->assign('page',$show);// 赋值分页输出
            $this->assign('data',$data);
            $this->assign('aid',$aid);
            $this->assign('isad',$isad);
            $this->assign('alumbdata',$alumbdata); //相册信息
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
	public function postalubmimg(){
		//
	  $M = M('album');
	  $aid=$_GET['id'];
	  $name=time();
  	  $config=array(
         'rootPath'=>"./Public/img/uploads/alumb/",
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
         $image->open("./Public/img/uploads/alumb/".$saveName);
         //将图片裁剪为400x400并保存为corp.jpg
         $image->crop($avatarData['width'],$avatarData['height'],$avatarData['x'], $avatarData['y'])->save("./Public/img/uploads/alumb/".$saveName);        
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
	public function editalumb(){
		if(IS_POST){
           $whe['id']=$_POST['alubmid'];

           $data['name']=$_POST['alubmname'];
           $data['status']=$_POST['alubmstatus'];
           $result=M('album')->where($whe)->save($data);
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
	public function deletealumb(){
		if(IS_POST){
           $whe['id']=$_POST['alubmid'];
           $whes['aid']=$_POST['alubmid'];
           $result=M('album')->where($whe)->delete();
           $results=M('img')->where($whes)->delete();
           $data['status']=1;          //成功返回参数
           $this->ajaxReturn($data); 
		}
	}
	/*图片上传*/
	public function addimg(){
		//
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
          $upload->rootPath='./Public/img/uploads/imgs/'; // 设置附件上传根目录
		//上传图片配置//
        // 上传文件 
          $info =$upload->upload(); 
		//上传文件/
		//图片类型//
		  if(!$info) {  // 上传错误提示错误信息
            $this->error($upload->getError());   
          }else{// 上传成功

            /*添加水印*/
            $imageAddress='./Public/img/uploads/imgs/'.$info['img']['savename'];  //要添加水印的照片
            $waterImage='./Public/img/uploads/logo/water.png';
            $image = new \Think\Image();
            $image->open($imageAddress);
            $image->open($imageAddress)->water($waterImage,\Think\Image::IMAGE_WATER_SOUTHEAST,60)->
            save($imageAddress);
            /*添加水印*/
          	//查询分类Id//
            $tid=M('album')->where('id='.$_POST['aid'])->getField('tid');
          	////
		        $data['tid']=$_SESSION['alumbid'];
			      $data['describe']=$_POST['describe'];
			      $data['img']=$info['img']['savename'];
			      $data['tid']=$tid;
			      $data['aid']=$_POST['aid'];
			      $result=M('img')->add($data);
			 if($result){
        //添加管理员轨迹
        $imgtime['imgtime']=time();
        $imggj=M('admingj')->where('uid='.$_SESSION['adminid'])->save($imgtime);
        //添加管理员轨迹
				 $this->success('图片上传成功！');
			 }else{
				 $this->error('图片上传失败');
			 }
		  }
		////
	  }
	  ////	
	}
	/*图片修改*/
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
           $whe['id']=$_GET['id'];
           $data=M('img')->where($whe)->select();
           $this->assign('date',$data);
           $this->assign('imgid',$_GET['id']);
           $this->display();
		}
	}
	/*图片修改*/
	public function updateimg(){
		///
		//
		$M = M('img');
	    $id=$_GET['id'];
	    $time=time();
  	    $config=array(
            'rootPath'=>"./Public/img/uploads/imgs/",
            'maxSize' =>'1048579',
            'saveName'=>"$time",
             'autoSub'=> false,
            'replace'=>true,      
        );
      $Upload = new Upload($config);
      $info = $Upload->upload();
      if ($info) {
         $saveName = $info['avatar_file']['savename'];
         $avatarData=json_decode(htmlspecialchars_decode(I('avatar_data')),true);
         $return['result']=$saveName;
         $image = new \Think\Image(); 
         $image->open("./Public/img/uploads/imgs/".$saveName);
         //将图片裁剪为400x400并保存为corp.jpg
         $image->crop($avatarData['width'],$avatarData['height'],$avatarData['x'], $avatarData['y'])->save("./Public/img/uploads/imgs/".$saveName);        
         $map['img']=$saveName;
         $M->where('id='.$id)->save($map);
         $this->ajaxReturn($return); 
      }else{
      	$this->ajaxReturn($Upload->getError());
      }
		///
	}
	/*图片信息修改*/
	public function editimg(){
       if(IS_POST){
          $data['describe']=$_POST['imgdescribe'];
          $whe['id']=$_POST['imgid'];
          $result=M('img')->where($whe)->save($data);
          if($result){
            $data['status']=1;          //成功返回参数
            $this->ajaxReturn($data); 
          }else{
            $data['status']=-1;          //失败返回参数
            $this->ajaxReturn($data); 
          }
       }
	}
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
      $data=M('imgtype')->select();
      $this->assign('data',$data);
      $this->display();
	}
	/*新增分类*/ 
	public function addtype(){
		if(IS_POST){
           $data['type']=$_POST['type'];
           $istype=M('imgtype')->where($data)->find(); //判断是否存在相同分类
           if($istype){
              $data['status']=-1;          //失败返回参数
              $this->ajaxReturn($data);
           }else{
              $result=M('imgtype')->add($data);
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
           $data['type']=$_POST['newtype'];
           $imgtype=M('imgtype');
           $istype=$imgtype->where($data)->find();  //判断是否存在相同类名
           if($istype){
              $data['status']=-1;          //失败返回参数
              $this->ajaxReturn($data);
           }else{
           	  $result=$imgtype->where($whe)->save($data);
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
          $whes['tid']=$_POST['tid'];
          $result=M('imgtype')->where($whe)->delete();
          $results=M('img')->where($whes)->delete();
          $resultss=M('album')->where($whes)->delete();
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