<?php
namespace Home\Controller;
use Think\Controller;
use Think\Upload;
use Think\Image;
class ImageController extends BaseUserController {
    //图片
	public function lst(){
		//查询导航
		$this->top();
		//查询尾部
		$this->getlastvideo();
		//查询导航
		//导航颜色
		$this->topcolor('2');
		if(!$_GET['p']){
          $_GET['p']='1';
		}
		//查询相册//
		if($_GET){
			$alumbid=$_GET['id'];
			$whe['tid']=$alumbid;
			$whe['status']=1;
			$alumbdata=M('album')->where($whe)->select();
			//查询图片//
			if($_GET['aid']){
				/////
				$ops='';
				foreach ($alumbdata as $key => $value) {
					 if($value['id']==$_GET['aid']){
                        $alumbdata[$key]['op']='active';
					 }else{
                        $alumbdata[$key]['op']='';
					 }
				}
				/////
				$imgaid=$_GET['aid'];
				$imgdata=M('img')->where('aid='.$imgaid)->order('id desc')->page($_GET['p'].',12')->select();
				$count1=M('img')->where('aid='.$imgaid)->count();
		        $Page = new \Think\Page1($count1,12);// 实例化分页类 传入总记录数和每页显示的记录数
			    $show = $Page->show();// 分页显示输出
                $this->assign('page',$show);// 赋值分页输出
	            $this->assign('imgdata',$imgdata);
			}else{
				$ops='active';
				foreach ($alumbdata as $key => $value) {
                        $alumbdata[$key]['op']='';
				}
				$imgaid=$alumbid;
				$imgdata=M('img')->where('tid='.$imgaid)->order('id desc')->page($_GET['p'].',12')->select();
				$count1=M('img')->where('tid='.$imgaid)->count();
		        $Page = new \Think\Page1($count1,12);// 实例化分页类 传入总记录数和每页显示的记录数
			    $show = $Page->show();// 分页显示输出
                $this->assign('page',$show);// 赋值分页输出
	            $this->assign('imgdata',$imgdata);  
			}
			$this->assign('ops',$ops);
			$this->assign('tid',$alumbid);
			$this->assign('alumbdata',$alumbdata);
			//查询图片//
		}
		//查询相册//
		$this->display();
	}

}