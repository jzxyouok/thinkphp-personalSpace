<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseUserController {
	public function index(){
		//查询三张轮播图片
        $lunbo=M('lunbo')->order('id asc')->limit(8)->select();
		$this->assign('lunbo',$lunbo);
		//查询最新两篇日记
        $this->getNewFile();
		//查询最新图片 
        $this->getNewImg();
		//查询导航标题
		$this->gettitle();
		//查询视频
		$this->getlastvideo();
		//查询导航
		$this->top();
		//查询导航
		//导航颜色
		$this->topcolor('1');
		//判断时间是早上还是晚上
        $this->getTime();
		//
		$this->display();
	}

	/****************************私有方法*******************************/
	/*查询标题*/
	public function gettitle(){
		$whe['type']='top';
		$title=M('title')->where($whe)->getField('title');
		$this->assign('title',$title);
	}

    /*获取最新三篇日记*/
    public function getNewFile(){
	    $article=M('file')->where('status=1')->order('id desc')->limit(3)->select();
		  foreach ($article as $key => $value) {
            $arr=explode(',',$value['author']);
            foreach ($arr as $k=> $val) {
               $re=M('admin')->where('id='.$val)->getField('name');
               $article[$key]['author']=$re;
            }
          }
		$this->assign('article',$article);
    }
    /*获取最新三篇日记*/

    /*获取最新图片*/
    public function getNewImg(){
		$threeimg=M('img')->order('id desc')->select(); 
		$imgdata=array(); 
		foreach ($threeimg as $key => $value) {
			$status=M('album')->where('id='.$value['aid'])->order('id desc')->getField('status');
			if($status==1){
                $imgdata[] = array(
		            'img' => $value['img'],
		            'describe' => $value['describe'],
		            'tid' => $value['tid'],
		            'aid' => $value['aid']
		        );
			}
		}
		$this->assign('imgdata',$imgdata);
    }
    /*获取最新图片*/
	/*判断当前时间*/
	public function getTime(){
		$newTime=date('Y-m-d',time());
		$beginTime=$newTime.' '.'18:00:00';
		$overTime=$newTime.' '.'06:00:00';
		$beginTime=strtotime($beginTime);
		$overTime=strtotime($overTime);
		$time=time();
		$status=0;
		///
	$jd=$beginTime;
    $myfile = fopen("aa.txt", "w") or die("Unable to open file!");
    fwrite($myfile,$jd);
    fclose($myfile);
		///
		if(($time<=$beginTime)&&($time>=$overTime)){
			$status=0;
		}else{
			$status=1;
		}
		$this->assign('status',$status);
	}
    /****************************私有方法*******************************/
}