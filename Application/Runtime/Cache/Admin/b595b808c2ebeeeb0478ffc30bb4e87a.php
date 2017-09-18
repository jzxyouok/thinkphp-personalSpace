<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="洪壮贤">
    <meta name="keyword" content="洪壮贤">
    <link rel="shortcut icon" href="/Public/admin/img/favicon.html">

    <title>后台管理</title>
    
    <!-- Bootstrap core CSS -->
    <link href="/Public/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/admin/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/Public/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="/Public/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="/Public/admin/css/owl.carousel.css" type="text/css">
    <!-- Custom styles for this template -->
    <link href="/Public/admin/css/style.css" rel="stylesheet">
    <link href="/Public/admin/css/style-responsive.css" rel="stylesheet" />
    <!-- 图标  -->
    <link rel="shortcut icon" href="/Public/home/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/Public/home/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/Public/home/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/Public/home/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/Public/home/images/ico/apple-touch-icon-57-precomposed.png">
    <!-- 图标  -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
            </div>
            <!--logo start-->
            <a href="#" class="logo"><span>香香</span>球球</a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-envelope-alt"></i>
                            <span class="badge bg-important"><?php echo ($datacount); ?></span>
                        </a>
                        <ul class="dropdown-menu extended inbox" id="getmessage">
                            <div class="notify-arrow notify-arrow-red"></div>
                            <li>
                                <p class="red">你有条
                                <span id="messcount"><?php echo ($datacount); ?>
                                </span>留言信息
                                </p>
                            </li>
                <?php if(is_array($messdata)): $i = 0; $__LIST__ = $messdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                      <a href="<?php echo U('Admin/Message/remess','','');?>/id/<?php echo ($vo["id"]); ?>">
                        <span class="photo"><img alt="avatar" src="/Public/img/uploads/userimg/<?php echo ($vo["img"]); ?>"></span>
                        <span class="subject">
                          <span class="from"><?php echo ($vo["username"]); ?></span>
                          <span class="time"><?php echo ($vo["time"]); ?></span>
                        </span>
                        <span class="message">
                          <?php echo ($vo["content"]); ?>
                        </span>
                      </a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    <li>
                      <a href="<?php echo U('Admin/Message/lst');?>">回复留言</a>
                    </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                    <!-- notification dropdown start-->
                    <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="icon-bell-alt"></i>
                            <span class="badge bg-warning"><?php echo ($plcount); ?></span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-yellow"></div>
                            <li>
                                <p class="yellow">你有<?php echo ($plcount); ?>条新的评论</p>
                            </li>
              <?php if(is_array($pldata)): foreach($pldata as $key=>$vo): ?><li>
                                <a href="<?php echo U('Article/articledetails','','');?>/aid/<?php echo ($vo["fid"]); ?>">
                                    <span>
                                      <img alt="avatar" src="/Public/img/uploads/userimg/<?php echo ($vo["userimg"]); ?>" style="width: 29px;height: 29px;">
                                    </span>
                                    <?php echo ($vo["content"]); ?>
                                    <span class="small italic"><?php echo (date('Y-m-d H:i:s',$vo["time"])); ?></span>
                                </a>
                            </li><?php endforeach; endif; ?>               
                            <li>
                                <a href="<?php echo U('Admin/Article/articlelist');?>">日记管理</a>
                            </li>
                        </ul>
                    </li>
                    <!-- notification dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="/Public/img/uploads/admin/<?php echo ($_SESSION['adminimg']); ?>" style="width: 20px;height: 25px;">
                            <span class="username"><?php echo ($_SESSION['adminname']); ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="<?php echo U('Admin/Image/imglist');?>"><i class=" icon-suitcase"></i>相册</a></li>
                            <li><a data-toggle="modal" data-target=".bs-example-modal-sm"><i class="icon-cog"></i> 密码</a></li>
                            <li><a href="<?php echo U('Admin/Message/lst');?>"><i class="icon-bell-alt"></i>留言</a></li>
                            <li><a href="<?php echo U('Admin/Login/loginout');?>"><i class="icon-key"></i>退出</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">
                  <li class="active">
                      <a class="" href="<?php echo U('Admin/Index/index');?>">
                          <i class="icon-dashboard"></i>
                          <span>首页</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-book"></i>
                          <span>文章管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo U('Admin/Article/articletype');?>">日记分类</a></li>
                          <li><a class="" href="<?php echo U('Admin/Article/articlelist');?>">日记管理</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-group"></i>
                          <span>用户管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo U('Admin/User/user');?>">新增用户</a></li>
                          <li><a class="" href="<?php echo U('Admin/User/lists');?>">用户列表</a></li>
                          <li><a class="" href="<?php echo U('Admin/User/group');?>">用户组</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-tasks"></i>
                          <span>图片管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo U('Admin/Image/imglist');?>">图片管理</a></li>
                          <li><a class="" href="<?php echo U('Admin/Image/typelist');?>">分类管理</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-th"></i>
                          <span>视频管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo U('Admin/Audio/audiolist');?>">视频管理</a></li>
                          <li><a class="" href="<?php echo U('Admin/Audio/typelist');?>">分类管理</a></li>
                      </ul>
                  </li>
                  <li>
                      <a class="" href="<?php echo U('Admin/Message/lst');?>">
                          <i class="icon-envelope"></i>
                          <span>留言管理</span>
                          <span id="messcount" class="label label-danger pull-right mail-info"><?php echo ($datacount); ?></span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-glass"></i>
                          <span>系统设置</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo U('Admin/Setting/lunbo');?>">轮播设置</a></li>
                          <li><a class="" href="<?php echo U('Admin/Setting/sms');?>">短信配置</a></li>
                          <li><a class="" href="<?php echo U('Admin/Setting/lst');?>">标题设置</a></li>
                          <li><a class="" href="<?php echo U('Admin/Setting/indexlst');?>">底部设置</a></li>
                      </ul>
                  </li>
                  <li>
                      <a class="" href="<?php echo U('Admin/Login/loginout');?>">
                          <i class="icon-user"></i>
                          <span>用户退出</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
              <div class="row state-overview">
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="icon-user"></i>
                          </div>
                          <div class="value">
                              <h1><?php echo ($usercount); ?></h1>
                              <p>用户数</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="icon-book"></i>
                          </div>
                          <div class="value">
                              <h1><?php echo ($articlecount); ?></h1>
                              <p>日记数</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="icon-envelope-alt"></i>
                          </div>
                          <div class="value">
                              <h1><?php echo ($messcount); ?></h1>
                              <p>留言数</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="icon-edit"></i>
                          </div>
                          <div class="value">
                              <h1><?php echo ($pingluncount); ?></h1>
                              <p>评论数</p>
                          </div>
                      </section>
                  </div>
              </div>
              <!--state overview end-->

              <div class="row">
                  <div class="col-lg-8">
                      <!--custom chart start-->
                      <div class="border-head">
                          <h3>日记浏览量</h3>
                      </div>
                      <div class="custom-bar-chart">
                          <div class="bar">
                              <div class="title">JAN</div>
                              <div class="value tooltips" data-original-title="<?php echo (round($ajan/$anum*100,2)); ?>%" data-toggle="tooltip" data-placement="top"><?php echo (round($ajan/$anum*100,2)); ?>%</div>
                          </div>
                          <div class="bar doted">
                              <div class="title">FEB</div>
                              <div class="value tooltips" data-original-title="<?php echo (round($afeb/$anum*100,2)); ?>%" data-toggle="tooltip" data-placement="top"><?php echo (round($afeb/$anum*100,2)); ?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">MAR</div>
                              <div class="value tooltips" data-original-title="<?php echo (round($amar/$anum*100,2)); ?>%" data-toggle="tooltip" data-placement="top"><?php echo (round($amar/$anum*100,2)); ?>%</div>
                          </div>
                          <div class="bar doted">
                              <div class="title">APR</div>
                              <div class="value tooltips" data-original-title="<?php echo (round($aapr/$anum*100,2)); ?>%" data-toggle="tooltip" data-placement="top"><?php echo (round($aapr/$anum*100,2)); ?>%</div>
                          </div>
                          <div class="bar">
                              <div class="title">MAY</div>
                              <div class="value tooltips" data-original-title="<?php echo (round($amay/$anum*100,2)); ?>%" data-toggle="tooltip" data-placement="top"><?php echo (round($amay/$anum*100,2)); ?>%</div>
                          </div>
                          <div class="bar doted">
                              <div class="title">JUN</div>
                              <div class="value tooltips" data-original-title="<?php echo (round($ajun/$anum*100,2)); ?>%" data-toggle="tooltip" data-placement="top"><?php echo (round($ajun/$anum*100,2)); ?>%</div>
                          </div>
                          <div class="bar">
                              <div class="title">JUL</div>
                              <div class="value tooltips" data-original-title="<?php echo (round($ajul/$anum*100,2)); ?>%" data-toggle="tooltip" data-placement="top"><?php echo (round($ajul/$anum*100,2)); ?>%</div>
                          </div>
                          <div class="bar doted">
                              <div class="title">AUG</div>
                              <div class="value tooltips" data-original-title="<?php echo (round($aaug/$anum*100,2)); ?>%" data-toggle="tooltip" data-placement="top"><?php echo (round($aaug/$anum*100,2)); ?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">SEP</div>
                              <div class="value tooltips" data-original-title="<?php echo (round($asep/$anum*100,2)); ?>%" data-toggle="tooltip" data-placement="top"><?php echo (round($asep/$anum*100,2)); ?>%</div>
                          </div>
                          <div class="bar doted">
                              <div class="title">OCT</div>
                              <div class="value tooltips" data-original-title="<?php echo (round($aotc/$anum*100,2)); ?>%" data-toggle="tooltip" data-placement="top"><?php echo (round($aotc/$anum*100,2)); ?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">NOV</div>
                              <div class="value tooltips" data-original-title="<?php echo (round($anov/$anum*100,2)); ?>%" data-toggle="tooltip" data-placement="top"><?php echo (round($anov/$anum*100,2)); ?>%</div>
                          </div>
                          <div class="bar doted">
                              <div class="title">DEC</div>
                              <div class="value tooltips" data-original-title="<?php echo (round($adec/$anum*100,2)); ?>%" data-toggle="tooltip" data-placement="top"><?php echo (round($adec/$anum*100,2)); ?>%</div>
                          </div>
                      </div>
                      <!--custom chart end-->
                  </div>
                  <div class="col-lg-4">
                      <!--new earning start-->
                      <div class="panel terques-chart">
                          <div class="panel-body chart-texture">
                              <div class="chart">
                                  <div class="heading">
                                      <span>网站访问量</span>
                                      <strong>月份 | 数值</strong>
                                  </div>
                                  <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[<?php echo ($a); ?>,<?php echo ($s); ?>,<?php echo ($d); ?>,<?php echo ($f); ?>,<?php echo ($g); ?>,<?php echo ($h); ?>,<?php echo ($j); ?>,<?php echo ($k); ?>,<?php echo ($l); ?>,<?php echo ($z); ?>,<?php echo ($x); ?>,<?php echo ($c); ?>]"></div>
                              </div>
                          </div>
                          <div class="chart-tittle">
                              <span class="title">最新时间： </span>
                              <span class="value">
                                  <?php echo ($time); ?>
                              </span>
                          </div>
                      </div>
                      <!--new earning end-->

                      <!--total earning start-->
                      <div class="panel green-chart">
                          <div class="panel-body">
                              <div class="chart">
                                  <div class="heading">
                                      <span>管理员在线量</span>
                                      <strong>月份 | 数值</strong>
                                  </div>
                                  <div id="barcharts"></div>
                              </div>
                          </div>
                          <div class="chart-tittle">
                              <span class="title">当前管理员</span>
                              <span class="value"><?php echo ($username); ?></span>
                          </div>
                      </div>
                      <!--total earning end-->
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-4">
                      <!--user info table start-->
                      <section class="panel">
            <?php if(is_array($admindata)): $i = 0; $__LIST__ = $admindata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$adminvo): $mod = ($i % 2 );++$i;?><div class="panel-body">
                            <a href="#" class="task-thumb">
                                  <img src="/Public/img/uploads/admin/<?php echo ($adminvo["img"]); ?>" alt="" style="width: 90;height: 83px;">
                            </a>
                            <div class="task-thumb-details">
                                  <h1><?php echo ($adminvo["name"]); ?></h1>
                                  <p>后台管理员</p>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        <table class="table table-hover personal-task">
                            <tbody>
                                <tr>
                                    <td>
                                        <i class=" icon-tasks"></i>
                                    </td>
                                    <td>发表日记</td>
                                    <td><?php echo ($adminarticlecount); ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="icon-envelope"></i>
                                    </td>
                                    <td>用户留言</td>
                                    <td id="messcount"><?php echo ($messcount); ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class=" icon-bell-alt"></i>
                                    </td>
                                    <td>登陆时间</td>
                                    <td><?php echo ($adminlastime); ?></td>
                                </tr>
                            </tbody>
                        </table>
                      </section>
                      <!--user info table end-->
                  </div>
                  <div class="col-lg-8">
                      <!--work progress start-->
                      <section class="panel">
                          <div class="panel-body progress-panel">
                              <div class="task-progress">
                                  <h1>网站数据</h1>
                                  <p>最新时间:<?php echo ($time); ?></p>
                              </div>
                          </div>
                          <table class="table table-hover personal-task">
                              <tbody>
                              <tr>
                                  <td>1</td>
                                  <td>
                                      用户
                                  </td>
                                  <td>
                                      <span class="badge bg-important">
                                        <?php echo (round($usernum/$num*100,2)); ?>%
                                      </span>
                                  </td>
                                  <td>
                                    <div id="work-progress1"></div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>2</td>
                                  <td>
                                      照片
                                  </td>
                                  <td>
                                      <span class="badge bg-success"><?php echo (round($imgnum/$num*100,2)); ?>%</span>
                                  </td>
                                  <td>
                                      <div id="work-progress2"></div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>3</td>
                                  <td>
                                      日记
                                  </td>
                                  <td>
                                      <span class="badge bg-info"><?php echo (round($fielnum/$num*100,2)); ?>%</span>
                                  </td>
                                  <td>
                                      <div id="work-progress3"></div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>4</td>
                                  <td>
                                      留言
                                  </td>
                                  <td>
                                      <span class="badge bg-warning"><?php echo (round($messnum/$num*100,2)); ?>%</span>
                                  </td>
                                  <td>
                                      <div id="work-progress4"></div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>5</td>
                                  <td>
                                      视频
                                  </td>
                                  <td>
                                      <span class="badge bg-primary"><?php echo (round($videonum/$num*100,2)); ?>%</span>
                                  </td>
                                  <td>
                                      <div id="work-progress5"></div>
                                  </td>
                              </tr>
                              </tbody>
                          </table>
                      </section>
                      <!--work progress end-->
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-8">
                      <!--timeline start-->
                      <section class="panel">
                          <div class="panel-body">
                                  <div class="text-center mbot30">
                                      <h3 class="timeline-title">时间轨迹</h3>
                                      <p class="t-info">这里记录的是你的一些轨迹</p>
                                  </div>

    <div class="timeline">
      <article class="timeline-item">
        <div class="timeline-desk">
          <div class="panel">
        <?php if(is_array($admingj)): $i = 0; $__LIST__ = $admingj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="panel-body">
              <span class="arrow"></span>
              <span class="timeline-icon red"></span>
              <span class="timeline-date"><?php echo ($vo["logintimess"]); ?></span>
              <h1 class="red"><?php echo ($vo["logintime"]); ?></h1>
              <p>您最近一次登陆时间</p>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
           </div>
        </div>
      </article>
      <article class="timeline-item alt">
        <div class="timeline-desk">
          <div class="panel">
          <?php if(is_array($admingj)): $i = 0; $__LIST__ = $admingj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="panel-body">
             <span class="arrow-alt"></span>
             <span class="timeline-icon green"></span>
             <span class="timeline-date"><?php echo ($vo["filetimess"]); ?></span>
             <h1 class="green"><?php echo ($vo["filetime"]); ?></h1>
             <p>你最近发表日记</p>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
          </div>
        </div>
      </article>
      <article class="timeline-item">
        <div class="timeline-desk">
         <div class="panel">
         <?php if(is_array($admingj)): $i = 0; $__LIST__ = $admingj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="panel-body">
            <span class="arrow"></span>
            <span class="timeline-icon blue"></span>
            <span class="timeline-date"><?php echo ($vo["imgtimess"]); ?>
            </span>
            <h1 class="blue"><?php echo ($vo["imgtime"]); ?></h1>
            <p>你最近发表了照片</p>
           <div class="album">
            <a href="<?php echo U('Admin/Image/imglist');?>">
             <img alt="" src="/Public/admin/img/sm-img-1.jpg">
            </a>
            <a href="<?php echo U('Admin/Image/imglist');?>">
             <img alt="" src="/Public/admin/img/sm-img-2.jpg">
            </a>
            <a href="<?php echo U('Admin/Image/imglist');?>">
             <img alt="" src="/Public/admin/img/sm-img-3.jpg">
            </a>
            <a href="<?php echo U('Admin/Image/imglist');?>">
             <img alt="" src="/Public/admin/img/sm-img-1.jpg">
            </a>
            <a href="<?php echo U('Admin/Image/imglist');?>">
             <img alt="" src="/Public/admin/img/sm-img-2.jpg">
            </a>
           </div>
          </div><?php endforeach; endif; else: echo "" ;endif; ?>
         </div>
        </div>
      </article>
      <article class="timeline-item alt">
         <div class="timeline-desk">
    <?php if(is_array($admingj)): $i = 0; $__LIST__ = $admingj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="panel">
            <div class="panel-body">
             <span class="arrow-alt"></span>
             <span class="timeline-icon purple"></span>
             <span class="timeline-date"><?php echo ($vo["remesstimess"]); ?></span>
             <h1 class="purple"><?php echo ($vo["remesstime"]); ?></h1>
             <p>你最近回复了留言</p>
             <div class="notification">
              <i class=" icon-exclamation-sign"></i> 最新留言<a href="<?php echo U('Admin/Message/lst');?>">请点击</a>
             </div>
            </div>
          </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
      </article>
      <article class="timeline-item">
        <div class="timeline-desk">
       <?php if(is_array($admingj)): $i = 0; $__LIST__ = $admingj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="panel">
            <div class="panel-body">
             <span class="arrow"></span>
             <span class="timeline-icon light-green"></span>
             <span class="timeline-date"><?php echo ($vo["creattimess"]); ?></span>
             <h1 class="light-green"><?php echo ($vo["creattime"]); ?></h1>
             <p>恭喜<?php echo ($_SESSION['adminname']); ?>你诞生了</p>
            </div>
          </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
      </article>
   </div>

                                  <div class="clearfix">&nbsp;</div>
                              </div>
                      </section>
                      <!--timeline end-->
                  </div>
                  <div class="col-lg-4">
                      <!--revenue start-->
                      <!--
                      <section class="panel">
                          <div class="revenue-head">
                              <span>
                                  <i class="icon-bar-chart"></i>
                              </span>
                              <h3>Revenue</h3>
                              <span class="rev-combo pull-right">
                                 June 2013
                              </span>
                          </div>
                          <div class="panel-body">
                              <div class="row">
                                  <div class="col-lg-6 col-sm-6 text-center">
                                      <div class="easy-pie-chart">
                                          <div class="percentage" data-percent="35"><span>35</span>%</div>
                                      </div>
                                  </div>
                                  <div class="col-lg-6 col-sm-6">
                                      <div class="chart-info chart-position">
                                          <span class="increase"></span>
                                          <span>Revenue Increase</span>
                                      </div>
                                      <div class="chart-info">
                                          <span class="decrease"></span>
                                          <span>Revenue Decrease</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="panel-footer revenue-foot">
                              <ul>
                                  <li class="first active">
                                      <a href="javascript:;">
                                          <i class="icon-bullseye"></i>
                                          Graphical
                                      </a>
                                  </li>
                                  <li>
                                      <a href="javascript:;">
                                          <i class=" icon-th-large"></i>
                                          Tabular
                                      </a>
                                  </li>
                                  <li class="last">
                                      <a href="javascript:;">
                                          <i class=" icon-align-justify"></i>
                                          Listing
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </section>
                      -->
                      <!--revenue end-->
                      <!--features carousel start-->
                      <!--
                      <section class="panel">
                          <div class="flat-carousal">
                              <div id="owl-demo" class="owl-carousel owl-theme">
                                  <div class="item">
                                      <h1>Flatlab is new model of admin dashboard for happy use</h1>
                                      <div class="text-center">
                                          <a href="javascript:;" class="view-all">View All</a>
                                      </div>
                                  </div>
                                  <div class="item">
                                      <h1>Fully responsive and build with Bootstrap 3.0</h1>
                                      <div class="text-center">
                                          <a href="javascript:;" class="view-all">View All</a>
                                      </div>
                                  </div>
                                  <div class="item">
                                      <h1>Responsive Frontend is free if you get this.</h1>
                                      <div class="text-center">
                                          <a href="javascript:;" class="view-all">View All</a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="panel-body">
                              <ul class="ft-link">
                                  <li class="active">
                                      <a href="javascript:;">
                                          <i class="icon-reorder"></i>
                                          Sales
                                      </a>
                                  </li>
                                  <li>
                                      <a href="javascript:;">
                                          <i class=" icon-calendar-empty"></i>
                                          promo
                                      </a>
                                  </li>
                                  <li>
                                      <a href="javascript:;">
                                          <i class=" icon-camera"></i>
                                          photo
                                      </a>
                                  </li>
                                  <li>
                                      <a href="javascript:;">
                                          <i class=" icon-circle"></i>
                                          other
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </section>
                      -->
                      <!--features carousel end-->
                  </div>
              </div>

           
          </section>
      </section>
      <!--main content end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/Public/admin/js/jquery.js"></script>
    <script src="/Public/admin/js/jquery-1.8.3.min.js"></script>
    <script src="/Public/admin/js/bootstrap.min.js"></script>
    <script src="/Public/admin/js/jquery.scrollTo.min.js"></script>
    <script src="/Public/admin/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="/Public/admin/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="/Public/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="/Public/admin/js/owl.carousel.js" ></script>
    <script src="/Public/admin/js/jquery.customSelect.min.js" ></script>

    <!--common script for all pages-->
    <script src="/Public/admin/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="/Public/admin/js/sparkline-chart.js"></script>
    <script src="/Public/admin/js/easy-pie-chart.js"></script>
<!-- 实时获得留言情况 -->
<!-- 实时获得留言情况 -->
<!-- 密码修改 -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
       <!--  -->
      <section class="panel">
        <header class="panel-heading">
                              密码修改
        </header>
        <div class="panel-body">
          <form class="form-horizontal" role="form">
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">密码</label>
              <div class="col-lg-10">
               <input type="password" class="form-control" id="pwd" name="pwd" placeholder="密码">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword1" class="col-lg-2 control-label">重复密码</label>
              <div class="col-lg-10">
                <input type="password" class="form-control" id="pwds" name="pwds" placeholder="重复密码">
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
                <button type="button" class="btn btn-danger" onclick="editpwd()">修改</button>
              </div>
            </div>
          </form>
        </div>
      </section>
       <!--  -->
    </div>
  </div>
</div>
<!--弹框样式-->
  <link rel="stylesheet" type="text/css" href="/Public/layer/skin/layer.css">
  <script src="/Public/layer/layer.js"></script>
<!--弹框样式-->
<script type="text/javascript">
    function editpwd(){
      var pwd=$('#pwd').val();
      var pwds=$('#pwds').val();
      var ajaxeditpwdUrl='<?php echo U("Index/editpwd");?>'; 
      if((pwd=='')||(pwds=='')){
          layer.msg('密码不允许为空');
      }
      if((pwd!='')&&(pwds!='')){
          if(pwd!=pwds){
            layer.msg('两次密码不一致');
          }else{
        /*ajax提交*/
        $.ajax({
      //提交数据的类型 POST GET
        type: "POST",
      //提交的网址
        url: ajaxeditpwdUrl,
      //提交的数据
        data: {pwd:pwd},
      //返回数据的格式
        datatype: "json",
      //成功返回之后调用的函数
        success: function (data) {
      ////根据ajax返回参数判断验证码发送情况
        if(data['status']=="1"){
            layer.msg('修改成功!'); 
            window.location.href="<?php echo U('/Admin/Login/login');?>";
        }else{
            layer.msg('没有修改！');   
        }
      ////根据ajax返回参数判断验证码发送情况
        }
     });
        /*ajax提交*/ 
          }
      }
    }
</script>
<!-- 密码修改 -->
 <script type="text/javascript">
     //统计管理员登陆时间
      $("#barcharts").sparkline([<?php echo ($adminjan); ?>,<?php echo ($adminfeb); ?>,<?php echo ($adminmar); ?>,<?php echo ($adminapr); ?>,<?php echo ($adminmay); ?>,<?php echo ($adminjun); ?>,<?php echo ($adminjul); ?>,<?php echo ($adminaug); ?>,<?php echo ($adminsep); ?>,<?php echo ($adminoct); ?>,<?php echo ($adminnov); ?>,<?php echo ($admindec); ?>], {
        type: 'bar',
        height: '90',
        barWidth: 12,
        barSpacing: 5,
        barColor: '#fff'
      });

     //统计管理员登陆时间
 </script>
  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>