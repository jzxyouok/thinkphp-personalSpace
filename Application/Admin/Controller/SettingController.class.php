<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
use Think\Image;
class SettingController extends Controller {
	/*留言界面*/
	public function lunbo(){
	 //判断是否有登陆
     $login=A('Admin/Index');
     $login->checklogin();
     $login->pinglundate();
   //判断是否有登陆
   //获取顶部消息
    $message=A('Admin/Message');
    $message->getmessage();
   //获取顶部消息
   //获取内容
    $data=M('lunbo')->select();
    $this->assign('data',$data);
   //获取内容  
		$this->display();
	}
 /*轮播删除*/
  public function deletelunbo(){
    if($_GET){
      $whe['id']=$_GET['id'];
      $result=M('lunbo')->where($whe)->delete();
      $this->redirect('Setting/lunbo');
    }
  }
 /*轮播添加*/
  public function addlunbo(){
     if(IS_POST){
     //
      $time=time();
      $upload = new \Think\Upload();// 实例化上传类
      $upload->autoSub=true;
      $upload->autoSub=false;
      $upload->maxSize=3145728 ;// 设置附件上传大小
      $upload->exts   =array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
      $upload->saveName=array('date',array('his',$time));;
      $upload->rootPath='./Public/img/uploads/lunbo/';
      $info =$upload->upload();  
      if(!$info) {  // 上传错误提示错误信息
        $this->error($upload->getError());   
      }else{
        $data['content']=$_POST['content'];
        $data['img']=$info['img']['savename'];
        $result=M('lunbo')->add($data);
        if($result){
          $this->success('新增轮播成功！');
        }else{
          $this->error('新增轮播失败！');
        }

      }
    //
     }
  }
 /*轮播编辑*/
 public function editlunbo(){
    if(IS_POST){
      $time=time();
      $upload = new \Think\Upload();// 实例化上传类
      $upload->autoSub=true;
      $upload->autoSub=false;
      $upload->maxSize=3145728 ;// 设置附件上传大小
      $upload->exts   =array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
      $upload->saveName=array('date',array('his',$time));;
      $upload->rootPath='./Public/img/uploads/lunbo/';
      $info =$upload->upload();  
      if(!$info) {  // 上传错误提示错误信息
        $this->error($upload->getError());   
      }else{
        $data['content']=$_POST['edcontent'];
        $data['img']=$info['img']['savename'];
        $whe['id']=$_POST['lbid'];
        $result=M('lunbo')->where($whe)->save($data);
        if($result){
          $this->success('编辑轮播成功！');
        }else{
          $this->error('编辑轮播失败！');
        }

      }
    }
 }
 /*短信配置*/
 public function sms(){
   //判断是否有登陆
    $login=A('Admin/Index');
    $login->checklogin();
    $login->pinglundate();
   //判断是否有登陆
   //获取顶部消息
    $message=A('Admin/Message');
    $message->getmessage();
   //获取顶部消息
   $whe['type']='sms';
   $data=M('sms')->where($whe)->select();
   $this->assign('data',$data);
   $this->display();
 }
 /*短信配置修改*/
 public function editsms(){
    if(IS_POST){
      $data['account']=$_POST['account'];
      $data['token']=$_POST['token'];
      $data['content']=$_POST['content'];
      $whe['type']='sms';
      $result=M('sms')->where($whe)->save($data);
      if($result){
        $data['status']=1;          //成功返回参数
        $this->ajaxReturn($data);
      }else{
        $data['status']=-1;          //失败返回参数
        $this->ajaxReturn($data);
      }
    }
 }

 /*标题设置*/
 public function lst(){
   //判断是否有登陆
    $login=A('Admin/Index');
    $login->checklogin();
    $login->pinglundate();
   //判断是否有登陆
   //获取顶部消息
    $message=A('Admin/Message');
    $message->getmessage();
   //获取顶部消息  
    $wheq['type']='top';
    $dataq=M('title')->where($wheq)->select();
    //获取其他设置
    $this->webinformation();
    //获取其他设置
    //前台底部
    $this->webinfooter();
    //前台底部
    //登陆底部
    $this->loginfooter();
    //登陆底部
    $this->assign('dataq',$dataq);
    $this->display();
 }
 /*修改前台标题*/
 public function edittitle(){
    if(IS_POST){
      $data['title']=$_POST['title'];
      $whe['type']='top';
      $result=M('title')->where($whe)->save($data);
      if($result){
        $data['status']=1;          //成功返回参数
        $this->ajaxReturn($data);
      }else{
        $data['status']=-1;          //失败返回参数
        $this->ajaxReturn($data);  
      }
    }
 }
 /*修改前台标题*/
 /*显示信息*/
   public function webinformation(){
      $webinformationdata=M('variable')->select();
      $this->assign('webinformationdata',$webinformationdata);
   }
 /*显示信息*/
 /*修改基本信息*/
   public function editweb(){
      $where['id']=$_POST['type'];
      $data['title']=$_POST['title'];
      $data['caption']=$_POST['caption'];
      $result=M('variable')->where($where)->save($data);
      if($result){
          $this->success('编辑成功！');
      }else{
          $this->error('编辑失败！');
      }
  }
 /*修改基本信息*/
  /*显示信息*/
   public function webinfooter(){
      $webinfooter=M('kprecord')->select();
      $this->assign('webinfooter',$webinfooter);
   }
 /*显示信息*/
  /*修改前台底部*/
   public function editwebfooter(){
      $where['id']=$_POST['type'];
      $data['titlefrist']=$_POST['titlefrist'];
      $data['titletwo']=$_POST['titletwo'];
      $result=M('kprecord')->where($where)->save($data);
      if($result){
          $this->success('编辑成功！');
      }else{
          $this->error('编辑失败！');
      }
  }
 /*修改前台底部*/
   /*显示信息*/
   public function loginfooter(){
      $where['type']='footer';
      $loginfooter=M('title')->where($where)->select();
      $this->assign('loginfooter',$loginfooter);
   }
  /*修改登陆底部*/
   public function editloginfooter(){
      $where['id']=$_POST['type'];
      $data['title']=$_POST['title'];
      $result=M('title')->where($where)->save($data);
      if($result){
          $this->success('编辑成功！');
      }else{
          $this->error('编辑失败！');
      }
  }
 /*修改登陆底部*/
 /*底部视频修改*/
     public function indexlst(){
        //判断是否有登陆
        $login=A('Admin/Index');
        $login->checklogin();
        $login->pinglundate();
        //判断是否有登陆
        //获取顶部消息
        $message=A('Admin/Message');
        $message->getmessage();
        //获取顶部消息
        //获取内容
        $where['type']='video';
        $data=M('footervideo')->where($where)->select();
        $this->assign('data',$data);
        //获取内容  
        $this->display();
     }
  /*底部视频修改*/
  /*上传视频*/
  public function addvideo(){
    if(IS_POST){
        ////
        $time=time();
        $upload = new \Think\Upload();// 实例化上传类
        $upload->autoSub=true;
        $upload->autoSub=false;
        $upload->maxSize= 314572800000000;// 设置附件上传大小
        $upload->exts   =array('mp4','wmv','ogg','webm','mpg');// 设置附件上传类型
        $upload->saveName=array('date',array('his',$time));;
        $upload->rootPath='./Public/img/uploads/lastvideo/'; // 设置附件上传根目录
    //上传图片配置//
        // 上传文件 
        $info =$upload->upload();
        if(!$info) {  // 上传错误提示错误信息
            $this->error($upload->getError());   
        }else{// 上传成功
          $data['video']=$info['videourl']['savename'];
          $where['type']='video';
          $result=M('footervideo')->where($where)->save($data);
          if($result){
            $this->success('上传成功！');
          }else{
            $this->error('上传失败');
          }
        }
        ////
    }
  }
}