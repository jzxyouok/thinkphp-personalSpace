<?php
namespace Home\Controller;
use Think\Controller;
use Think\Upload;
use Think\Image;
class VideoController extends BaseUserController {
    //图片
	public function lst(){
		if(!$_GET['p']){
          $_GET['p']='1';
		}
		//查询导航
		$this->top();
		//查询尾部
		$this->getlastvideo();
		//查询导航
		//导航颜色
		$this->topcolor('4');
		if($_GET['id']){
		   $whe['vid']=$_GET['id'];
		   $whe['status']='1';
           $theme=M('theme')->where($whe)->select();
           $vid=$_GET['id'];
		}
		if($_GET['tid']){
			/*用于判断前端样式*/
		   $ops="";
		   foreach ($theme as $key => $value) {
		   	   if($value['id']==$_GET['tid']){
                   $theme[$key]['op']="active";
		   	   }else{
		   	   	   $theme[$key]['op']="";
		   	   }
		   }
		   /*用于判断前端样式*/
		   $whes['vid']=$_GET['tid'];
           $videodata=M('video')->where($whes)->order('id desc')->page($_GET['p'].',6')->select();
		   foreach ($videodata as $key => $value) {
			   $videodata[$key]['open']='1';
		   }
           $count1=M('video')->where($whes)->count();
		   $Page = new \Think\Page1($count1,6);// 实例化分页类 传入总记录数和每页显示的记录数
		   $show = $Page->show();// 分页显示输出
           $this->assign('page',$show);// 赋值分页输出
	       $this->assign('videodata',$videodata);
		}else{
		   $ops="active";
		   foreach ($theme as $key => $value) {
		   	   	   $theme[$key]['op']="";
		   }
		   $whes['tid']=$vid;
           $videodata=M('video')->where($whes)->order('id desc')->page($_GET['p'].',6')->select();
           foreach ($videodata as $key => $value) {
        	 $arr=explode(',',$value['vid']);
             foreach ($arr as $k=> $val) {
               $whe['id']=$val;
               $isopen=M('theme')->where($whe)->getField('status');
               if($isopen=='1'){
                 $videodata[$key]['open']='1';
               }else{
              	 $videodata[$key]['open']='0';
               }
             }
           }
           $count1=M('video')->where($whes)->count();
		   $Page = new \Think\Page1($count1,6);// 实例化分页类 传入总记录数和每页显示的记录数
		   $show = $Page->show();// 分页显示输出
           $this->assign('page',$show);// 赋值分页输出
	       $this->assign('videodata',$videodata);
		}
		$this->assign('ops',$ops);
		$this->assign('vid',$vid);
        $this->assign('theme',$theme);
		$this->display();
	}
}