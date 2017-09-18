<?php
namespace Home\Controller;
use Think\Controller;
use Think\Upload;
use Think\Image;
class ArticleController extends BaseUserController {
    //图片
	public function lst(){
		//查询导航
		$this->top();
		//查询尾部
		$this->getlastvideo();
    //导航颜色
    $this->topcolor('3');
		//查询导航
		if(!$_GET['p']){
          $_GET['p']='1';
		}
		if($_GET['type']){
           $whe['fid']=$_GET['type'];
		   $whe['status']='1';
           $data=M('file')->where($whe)->order('id desc')->page($_GET['p'].',6')->select();
           $count1=M('file')->where($whe)->count();
		   $Page = new \Think\Page1($count1,6);// 实例化分页类 传入总记录数和每页显示的
		   ///查询附属表//
	       foreach ($data as $key => $value) {
			   ///////
			   /*查询浏览量跟赞*/
			   $rid['rjid']=$value['id'];
               $reader=M('readartcle')->where($rid)->getField('reader');
               $thumbs=M('readartcle')->where($rid)->getField('thumbs');
               $data[$key]['reader']=$reader;
               $data[$key]['thumbs']=$thumbs;
			   /*查询管理员*/
			   $wheadmin['id']=$value['author'];
               $adminname=M('admin')->where($wheadmin)->getField('name');
               $data[$key]['adminname']=$adminname;
			   /*查询文章类型*/
			   $whetype['id']=$value['fid'];
               $filetype=M('filetype')->where($whetype)->getField('type');
               $data[$key]['filetype']=$filetype;
			   /*查询日期*/
			   $month=date('m',$value['publishtime']);
               $day=date('d',$value['publishtime']);
               $data[$key]['month']=$this->articledata($month);
			   $data[$key]['day']=$day;
			   ///////
          }
		  ///查询附属表//
		  $show = $Page->show();// 分页显示输出
          $this->assign('page',$show);// 赋值分页输出
	      $this->assign('data',$data);
		  //查询最新用户评论
	      $pinglun=M('pinglun')->order('id desc')->limit(3)->select();
	      foreach ($pinglun as $key => $valuep) {
	           $user['id']=$valuep['uid'];
	           $userimg=M('user')->where($user)->getField('img');
	           $username=M('user')->where($user)->getField('username');
	           $pinglun[$key]['userimg']=$userimg;
	           $pinglun[$key]['username']=$username;
	      }
	      $this->assign('pinglun',$pinglun);
		//获取文章情况
		}
		$this->display();
	}
	
	
	//查看日记
	public function articlelist(){ 
	////
	   /*日记浏览量*/
	   $mons=date("Y-m-d",time());
     $this->unifymon($mons);
	   /*查询导航*/
	   $this->top();
	   /*查询尾部*/
	   $this->getlastvideo();
    //导航颜色
     $this->topcolor('3');
	   /**/
	   if(!$_GET['p']){
          $_GET['p']='1';
	   }
      //*查询文章*//
	   if($_GET['rid']){
		  $artcileid=$_GET['rid'];
          $whe['id']=$_GET['rid'];
          $whes['fid']=$_GET['rid'];
          $whess['rjid']=$_GET['rid'];
          $reader=M('readartcle')->where($whess)->getField('reader');
		  /*获取同类文章*/
		  $fileId=M('file')->where($whe)->getField('fid');
		  $result=$this->getfile($fileId);
		  /*获取同类文章*/
          $dap['reader']=$reader+1;
          $re=M('readartcle')->where($whess)->save($dap);
	   }else{
		  $this->redirect('Home/Article/lst');
	   }
	   $date=M('file')->where($whe)->select();
	   foreach ($date as $key => $value) {
		   /*查询文章附属*/
		   $rid['rjid']=$value['id'];
           $reader=M('readartcle')->where($rid)->getField('reader');
           $thumbs=M('readartcle')->where($rid)->getField('thumbs');
           $date[$key]['reader']=$reader;
           $date[$key]['thumbs']=$thumbs;
           /*查询作者*/
		   $wheadmin['id']=$value['author'];
           $adminname=M('admin')->where($wheadmin)->getField('name');
           $date[$key]['adminname']=$adminname;
		   /*查询日期*/
		   $month=date('m',$value['publishtime']);
           $day=date('d',$value['publishtime']);
           $date[$key]['month']=$this->articledata($month);
		   $date[$key]['day']=$day;
		   /*查询文章类型*/
		   $whetype['id']=$value['fid'];
           $filetype=M('filetype')->where($whetype)->getField('type');
           $date[$key]['filetype']=$filetype;
		   /**/
       }
	   $this->assign('date',$date);
	   //*查询文章*//
	   ///查看评论
        $pinglun=M('pinglun')->where($whes)->order('id desc')->page($_GET['p'].',5')->select();
        $count1=M('pinglun')->where($whes)->order('id desc')->count();
		$Page = new \Think\Page1($count1,5);// 实例化分页类 传入总记录数和每页显示的记录数
	    foreach ($pinglun as $key => $valuep) {
	    /*编辑标题*/ 
        $content=$pinglun[$key]['content'];
        $me=preg_replace("/\<p/",'<span',$content);
        $pinglun[$key]['content']=preg_replace("/\[(\S)*\]/",'',$me);
        $me=preg_replace("/\<\/p\>/",'</span>',$pinglun[$key]['content']);
        $pinglun[$key]['content']=preg_replace("/\[(\S)*\]/",'',$me);
        /*编辑标题*/
	    $arrp=explode(',',$valuep['uid']);
	       foreach ($arrp as $kp=> $valp) {
	         $user['id']=$valp;
	         $userimg=M('user')->where($user)->getField('img');
	         $username=M('user')->where($user)->getField('username');
	         $pinglun[$key]['userimg']=$userimg;
	         $pinglun[$key]['username']=$username;
	       } 
	    }
        $show = $Page->show();// 分页显示输出
        $this->assign('page',$show);// 赋值分页输出
	    $this->assign('pinglun',$pinglun);
	    $this->assign('artcileid',$artcileid); //当前日记ID
        ///查看评论
	    $this->display();
	////
	}

	/*用户发表评论*/
	public function dopinglun(){
		if(IS_POST){
           $whe['id']=$_SESSION['userid'];
           $isjy=M('user')->where($whe)->getField('status');
           if($isjy=='0'){
              $data['status']=-2;      //用户被禁言
              $this->ajaxReturn($data);
           }else{
              $data['uid']=$_SESSION['userid'];
              $data['fid']=$_POST['fid'];
              $data['content']=$_POST['content'];
              $data['time']=time();
              $result=M('pinglun')->add($data);
              if($result){
                $data['status']=1;      //成功返回参数
                $this->ajaxReturn($data);
              }else{
                $data['status']=-1;      //失败返回参数
                $this->ajaxReturn($data);
              }
           }
		}
	}
  //统计日记浏览量//
  public function unifymon($mon){
    ///
    $month=substr($mon,5,2);

    if($month=='01'){
       $whe['month']='jan';
       $count=M('articlemon')->where($whe)->getField('count');
       $data['count']=$count+1;
       $result=M('articlemon')->where($whe)->save($data);
    }else if($month=='02'){
       $whe['month']='feb';
       $count=M('articlemon')->where($whe)->getField('count');
       $data['count']=$count+1;
       $result=M('articlemon')->where($whe)->save($data);
    }else if($month=='03'){
       $whe['month']='mar';
       $count=M('articlemon')->where($whe)->getField('count');
       $data['count']=$count+1;
       $result=M('articlemon')->where($whe)->save($data);
    }else if($month=='04'){
       $whe['month']='apr';
       $count=M('articlemon')->where($whe)->getField('count');
       $data['count']=$count+1;
       $result=M('articlemon')->where($whe)->save($data);
    }else if($month=='05'){
       $whe['month']='may';
       $count=M('articlemon')->where($whe)->getField('count');
       $data['count']=$count+1;
       $result=M('articlemon')->where($whe)->save($data);
    }else if($month=='06'){
       $whe['month']='jun';
       $count=M('articlemon')->where($whe)->getField('count');
       $data['count']=$count+1;
       $result=M('articlemon')->where($whe)->save($data);
    }else if($month=='07'){
       $whe['month']='jul';
       $count=M('articlemon')->where($whe)->getField('count');
       $data['count']=$count+1;
       $result=M('articlemon')->where($whe)->save($data);
    }else if($month=='08'){
       $whe['month']='aug';
       $count=M('articlemon')->where($whe)->getField('count');
       $data['count']=$count+1;
       $result=M('articlemon')->where($whe)->save($data);
    }else if($month=='09'){
       $whe['month']='sep';
       $count=M('articlemon')->where($whe)->getField('count');
       $data['count']=$count+1;
       $result=M('articlemon')->where($whe)->save($data);
    }else if($month=='10'){
       $whe['month']='otc';
       $count=M('articlemon')->where($whe)->getField('count');
       $data['count']=$count+1;
       $result=M('articlemon')->where($whe)->save($data);
    }else if($month=='11'){
       $whe['month']='nov';
       $count=M('articlemon')->where($whe)->getField('count');
       $data['count']=$count+1;
       $result=M('articlemon')->where($whe)->save($data);
    }else{
       $whe['month']='dec';
       $count=M('articlemon')->where($whe)->getField('count');
       $data['count']=$count+1;
       $result=M('articlemon')->where($whe)->save($data);
    }
    ///
  }
  //统计日记浏览量//
  	//查询日记当前时间
	public function articledata($time){
        if($time){
			if($time=='01'){ 
			  $time='Jan';
			}else if($time=='02'){
				$time='Feb';
			}else if($time=='03'){
				$time='Mar';
			}else if($time=='04'){
				$time='Apr';
			}else if($time=='05'){
				$time='May';
			}else if($time=='06'){
				$time='Jun';
			}else if($time=='07'){
				$time='Jul';
			}else if($time=='08'){
				$time='Aug';
			}else if($time=='09'){
				$time='Sept';
			}else if($time=='10'){
				$time='Oct';
			}else if($time=='11'){
				$time='Nov';
			}else{
				$time='Dec';
			}
			return $time;
		}
	}
	/*查询同类其他文章*/
	public function getfile($type){
		$whe['fid']=$type;
		$whe['status']='1';
        $filedata=M('file')->where($whe)->order('id desc')->limit(3)->select();
		$this->assign('filedata',$filedata);
	}
	/*用户点赞*/
  public function sendGood(){
    if(IS_POST){
      $fid=$_POST['fid'];
      $where['rjid']=$fid;
      $count=M('readartcle')->where($where)->getField('thumbs');
      $datas['thumbs']=$count+1;
      $result=M('readartcle')->where($where)->save($datas);
      if($result){
        $data['status']=1;          //成功返回参数
        $data['id']=$fid;
        $this->ajaxReturn($data);
      }else{
        $data['status']=-1;          //失败返回参数
        $this->ajaxReturn($data);  
      }
    }
  }
  /**/
}