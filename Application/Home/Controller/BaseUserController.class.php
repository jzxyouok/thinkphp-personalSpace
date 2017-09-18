<?php
namespace Home\Controller;
use Think\Controller;
class  BaseUserController extends Controller {
     public function top(){
		 $this->getFileType();   //日记
		 $this->getImgType();    //图片
		 $this->getViedoType();  //视频
     $this->getWebinformation();  //标语
     $this->getwebfooter();   //获取底部备案号
	 }
    /************************导航共用***********************************/
    //获取标语
  public function getWebinformation(){
      //查询标题//
      $where['type']='top';
      $webTitle=M('title')->where()->getField('title');
      $this->assign('webTitle',$webTitle);
      //查询标题//
      //查询首页标语
      $webinformation=M('variable')->select();
      //令牌机制
      $this->tokenUser();
      $this->assign('webinformation',$webinformation);
      //
    }
    //获取标语
    //获取导航日记分类
	public function getFileType(){
		//查询日记分类
		  $articletype=M('filetype')->select();
		  $this->assign('articletype',$articletype);
        //查询日记分类	 
	}
	//获取导航相册
	public function getImgType(){
		//查询日记分类
		  $imgtype=M('imgtype')->select();
		  $this->assign('imgtype',$imgtype);
        //查询日记分类	 
	}
	//获取导航视频
	public function getViedoType(){
		//查询日记分类
		  $viedotype=M('videtype')->select();
		  $this->assign('viedotype',$viedotype);
        //查询日记分类	 
	}
  //用户令牌访问
  public function tokenUser(){
    $userId = cookie('UserId');
    $userToken=cookie('UserToken');
    $userTokenTime=cookie('UserTokenTime');
    if($userId!=''){
        $where['id']=$userId;
        $token=M('user')->where($where)->getField('token');
        $tokenTime=M('user')->where($where)->getField('tokenTime');
        if($token!=$userToken){
           $this->redirect('Home/Login/login');
           cookie('UserId',null);
           cookie('UserToken',null);
           cookie('UserTokenTime',null);
        }else{
           if($tokenTime<time()){
              $this->redirect('Home/Login/login');
              cookie('UserId',null);
              cookie('UserToken',null);
              cookie('UserTokenTime',null);
           }
        }
    }
  }  
    /************************导航共用***********************************/

	/************************尾部共用***********************************/
	    /*获取最新视频*/
    public function getlastvideo(){
      $where['type']='video';
    	$newvideo=M('footervideo')->where($where)->select();
      $this->assign('newvideo',$newvideo);
    }
    /*获取最新视频*/
    /*导航颜色*/
    public function topcolor($number){
    	if($number=='1'){
           $topStatusOne="active";
           $topStatustwo="";
           $topStatusthree="";
           $topStatusfour="";
           $topStatusfive="";
    	}else if($number=='2'){
    	   $topStatusOne="";
           $topStatustwo="active";
           $topStatusthree="";
           $topStatusfour="";
           $topStatusfive="";
    	}else if($number=='3'){
    	   $topStatusOne="";
           $topStatustwo="";
           $topStatusthree="active";
           $topStatusfour="";
           $topStatusfive="";
    	}else if($number=='4'){
           $topStatusOne="";
           $topStatustwo="";
           $topStatusthree="";
           $topStatusfour="active";
           $topStatusfive="";
    	}else if($number=='5'){
           $topStatusOne="";
           $topStatustwo="";
           $topStatusthree="";
           $topStatusfour="";
           $topStatusfive="active";
    	}
        $this->assign('topStatusOne',$topStatusOne);
        $this->assign('topStatustwo',$topStatustwo);
        $this->assign('topStatusthree',$topStatusthree);
        $this->assign('topStatusfour',$topStatusfour);
        $this->assign('topStatusfive',$topStatusfive);

    }
    /*获取底部标语*/
    public function getwebfooter(){
      $webfooter=M('kprecord')->select();
      $this->assign('webfooter',$webfooter);
    }
    /*获取最新视频*/
	/************************尾部共用***********************************/
}