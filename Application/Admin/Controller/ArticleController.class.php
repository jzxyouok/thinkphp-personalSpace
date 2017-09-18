<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
use Think\Image;
class ArticleController extends Controller {
	/*日记分类*/
	public function articletype(){
    //判断是否有登陆
    $login=A('Admin/Index');
    $login->checklogin();
    $login->pinglundate();
    //判断是否有登陆
    //获取留言信息//
    $message=A('Admin/Message');
    $message->getmessage();
    //获取留言信息//
		$articletype=M('filetype')->select();
		$this->assign('articletype',$articletype);
		$this->display();
	}
	/*新增分类*/
	public function addtype(){
       if(IS_POST){
          $whe['type']=$_POST['typename'];
          $istype=M('filetype')->where($whe)->find();
          if($istype){
             $data['status']=-1;       //失败返回参数
             $this->ajaxReturn($data);
          }else{
             $result=M('filetype')->add($whe);
             if($result){
               $data['status']=1;       //成功返回参数
               $this->ajaxReturn($data);
             }else{
               $data['status']=-2;       //失败返回参数
               $this->ajaxReturn($data); 
             }
          }
       }
	}
	/*编辑分类*/
	public function edittype(){
       if(IS_POST){
          $whe['type']=$_POST['typenames'];
          $whes['id']=$_POST['typeid'];
          $istype=M('filetype')->where($whe)->find();
          if($istype){
             $data['status']=-1;       //失败返回参数
             $this->ajaxReturn($data);
          }else{
             $result=M('filetype')->where($whes)->save($whe);
             if($result){
               $data['status']=1;       //成功返回参数
               $this->ajaxReturn($data);
             }else{
               $data['status']=-2;       //失败返回参数
               $this->ajaxReturn($data); 
             }
          }
       }
	}
	/*删除分类*/
	public function deletetype(){
		if($_GET){
           $whe['id']=$_GET['id'];
           $whes['fid']=$_GET['id'];
           $result=M('filetype')->where($whe)->delete();
           $results=M('file')->where($whes)->delete();
           $this->redirect('Article/articletype');
		}
	}
	/*文章列表*/
	public function articlelist(){
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
           $title=$_GET['title'];
           $status=$_GET['status'];
           if($title!=''){
              $where['filename']=array('like',"%{$title}%");
           }
           if($status!='2'){
              $where['status']=$status;
           }else{
              $where['status']=array('in','0,1');
           }
		}
    $where['status']=array('in','0,1');
		//文章列表循环
		$articlelist=M('file')->where($where)->order('id desc')->page($_GET['p'].',12')->select();
		$count1=M('file')->where($where)->count();
		$Page = new \Think\Page1($count1,12);// 实例化分页类 传入总记录数和每页显示的记录数
		/*时间戳转换为时间*/
		foreach ($articlelist as $key => $value) {
      //时间的转换
      $re=date("Y-m-d H:i:s",$value['publishtime']);
      $articlelist[$key]['time']=$re;
      //描述改造
      $res=substr($value['describe'],0,25)."....";
      $articlelist[$key]['describe']=$res;
      ///
    }
    /*时间戳转换为时间*/
		//文章列表循环
		$show = $Page->show();// 分页显示输出
    $this->assign('page',$show);// 赋值分页输出
	  $this->assign('articlelist',$articlelist);
		$this->display();
	}
	/*日记删除*/
	public function deletearticle(){
		if($_GET){
          $whe['id']=$_GET['id'];
          $whes['fid']=$_GET['id'];
          $whess['rjid']=$_GET['id'];
          $result=M('file')->where($whe)->delete();
          $result=M('pinglun')->where($whes)->delete();
          $result=M('readartcle')->where($whess)->delete();
          $this->redirect('Article/articlelist');
		}
	}
	/*添加日记界面*/
	public function addarticle(){
    //判断是否有登陆
    $login=A('Admin/Index');
    $login->checklogin();
    $login->pinglundate();
    //判断是否有登陆
    //获取留言信息//
    $message=A('Admin/Message');
    $message->getmessage();
    //获取留言信息//
		$data=M('filetype')->select();
		$this->assign('data',$data);
		$this->display();
	}
	/*日记添加*/
	public function addfile(){
		//查询已保存的封面图片//
		$imgurl=M('articleimg')->where('id=1')->getField('imgurl');
		//查询已保存的封面图片//
        if(IS_POST){
           $data['filename']=$_POST['filename'];
           $data['describe']=$_POST['describe'];
           $data['content']=$_POST['content'];
           $data['status']=$_POST['status'];
           $data['fid']=$_POST['fid'];
           $data['author']='1';
           $data['publishtime']=time();
           $data['creattime']=' ';
           $data['img']=$imgurl;
           $result=M('file')->add($data);
           if($result){   //发表成功，图片缓存表返回原始值
           	  $newimg['imgurl']='noimg.jpg';
              $updateimg=M('articleimg')->where('id=1')->save($newimg);
              //添加管理员轨迹
              $whe['uid']=$_SESSION['adminid'];
              $articletime['filetime']=time();
              $admingj=M('admingj')->where($whe)->save($articletime);
              //添加管理员轨迹
              //日记附属表
              $readdata['rjid']=$result;
              $readdata['reader']='0';
              $readdata['thumbs']='0';
              $readadd=M('readartcle')->add($readdata);
              //日记附属表
              $data['status']=1;          //成功返回参数
              $this->ajaxReturn($data);
           }else{
              $data['status']=-1;          //失败返回参数
              $this->ajaxReturn($data);
           }
        }
	}
	/*日记编辑界面*/
	public function editarticle(){
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
           $data=M('file')->where('id='.$id)->select();
           $type=M('filetype')->select();
           $this->assign('data',$data);
           $this->assign('type',$type);
           $this->assign('id',$id);
           $this->display();
        }   
	}
	/*日记新增图片保存//*/
	public function postimg(){
      //
	    $name=time();
  	    $config=array(
            'rootPath'=>"./Public/img/uploads/fileimg/",
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
         $image->open("./Public/img/uploads/fileimg/".$saveName);
         //将图片裁剪为400x400并保存为corp.jpg
         $image->crop($avatarData['width'],$avatarData['height'],$avatarData['x'], $avatarData['y'])->save("./Public/img/uploads/fileimg/".$saveName);        
         $map['imgurl']=$saveName;
         $result=M('articleimg')->where('id=1')->save($map);
         $this->ajaxReturn($return);
      	 // 
      }else{
      	$this->ajaxReturn($Upload->getError());
      }
		//
	}
	/*日记修改*/
	public function updatearticle(){
		if(IS_POST){
		   $whe['id']=$_POST['id'];
            if($_POST['filename']){
               $data['filename']=$_POST['filename'];
            }
            if($_POST['content']){
               $data['content']=$_POST['content'];
            }
            if($_POST['describe']){
               $data['describe']=$_POST['describe'];
            }
            $data['status']=$_POST['status'];
            if($_POST['fid']){
               $data['fid']=$_POST['fid'];
            }
            $data['creattime']=time();
            $result=M('file')->where($whe)->save($data);
  ////
            if($result){
               $data['code']=1;          //成功返回参数
               $this->ajaxReturn($data);
            }else{
               $data['code']=-1;          //失败返回参数
               $this->ajaxReturn($data);
            }
		}
	}
	/*日记封面修改*/
	public function editarticleimg(){
	  //
	  $M = M('file');
	  $id=$_GET['id'];
	  $name=time();
  	  $config=array(
         'rootPath'=>"./Public/img/uploads/fileimg/",
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
         $image->open("./Public/img/uploads/fileimg/".$saveName);
         //将图片裁剪为400x400并保存为corp.jpg
         $image->crop($avatarData['width'],$avatarData['height'],$avatarData['x'], $avatarData['y'])->save("./Public/img/uploads/fileimg/".$saveName);        
         $map['img']=$saveName;
         $M->where('id='.$id)->save($map);
         $this->ajaxReturn($return);
      	 // 
      }else{
      	$this->ajaxReturn($Upload->getError());
      }
		//	
	}   
	/*日记详情*/
  public function articledetails(){
    //判断是否有登陆
    $login=A('Admin/Index');
    $login->checklogin();
    $login->pinglundate();
    //判断是否有登陆
    //获取留言信息//
    $message=A('Admin/Message');
    $message->getmessage();
    //获取留言信息//
    if(!$_GET['p']){
      $_GET['p']='1';
    }
    if($_GET['aid']){
      $whe['id']=$_GET['aid'];
      $whes['fid']=$_GET['aid'];
    }
    //修改评论状态//
    $plstat['status']='1';
    $updatestatus=M('pinglun')->where($whes)->save($plstat);
    //修改评论状态//
    $data=M('file')->where($whe)->select();
    //查询其他附属信息
    foreach ($data as $key => $value) {
      //查询作者
      $wheadmin['id']=$value['author'];
      $adminname=M('admin')->where($wheadmin)->getField('name');
      $data[$key]['adminname']=$adminname;
      //查询文章类型
      $whefile['id']=$value['fid'];
      $filetype=M('filetype')->where($whefile)->getField('type');
      $data[$key]['filetype']=$filetype;
      //查询浏览量
      $wheread['rjid']=$value['id'];
      $read=M('readartcle')->where($wheread)->getField('reader');
      $data[$key]['read']=$read;
      $thumbs=M('readartcle')->where($wheread)->getField('thumbs');
      $data[$key]['thumbs']=$thumbs;
      //查询评论数
      $whepinglun['fid']=$value['id'];
      $pinglun=M('pinglun')->where($whepinglun)->count();
      $data[$key]['pinglun']=$pinglun;
      //
    }
    //查询其他附属信息
    $pinglun=M('pinglun')->where($whes)->order('id desc')->page($_GET['p'].',4')->select();
    $count1=M('pinglun')->where($whes)->count();
    $Page = new \Think\Page1($count1,4);// 实例化分页类 传入总记录数和每页显示的记录数
    foreach ($pinglun as $key => $value) {
         $uid['id']=$value['uid'];
         $usname=M('user')->where($uid)->getField('username');
         $usimg=M('user')->where($uid)->getField('img');
         $pinglun[$key]['usname']=$usname;
         $pinglun[$key]['usimg']=$usimg;
    }
    $show = $Page->show();// 分页显示输出
    $this->assign('page',$show);// 赋值分页输出
    $this->assign('pinglun',$pinglun);  //输入评论
    $this->assign('data',$data);  //输出日记
    $this->display();
  }
  /*日记详情*/
  /*评论删除*/
  public function deletepinglun(){
    if($_GET){
       $whe['id']=$_GET['id'];
       $result=M('pinglun')->where($whe)->delete();
       if($result){
          $this->success('新增成功');
       }else{
          $this->redirect("Admin/Article/articledetails/aid/'".$whe['fid']."'");
       }
    }
  }
  /*评论删除*/
}