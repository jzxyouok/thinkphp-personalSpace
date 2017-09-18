-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-09-13 03:14:23
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `person`
--

-- --------------------------------------------------------

--
-- 表的结构 `tp_admin`
--

CREATE TABLE `tp_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '用户密码',
  `creattime` text NOT NULL COMMENT '创建时间',
  `lasttime` text NOT NULL COMMENT '登陆时间',
  `img` text NOT NULL COMMENT '头像',
  `phone` text NOT NULL COMMENT '手机号码',
  `token` text COMMENT '令牌',
  `tokentime` int(11) DEFAULT NULL COMMENT '令牌时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理者表';

--
-- 转存表中的数据 `tp_admin`
--

INSERT INTO `tp_admin` (`id`, `name`, `password`, `creattime`, `lasttime`, `img`, `phone`, `token`, `tokentime`) VALUES
(1, 'dzx', 'c4c7275ad13f608b1d4ecb84fcdc01cf', '1496465483', '1503677354', '1496979855.png', '15812671184', '9aafc168fbfe46a87087c306bdc833a8', 1503763754),
(2, 'hzx', 'a6c80bf3483f98956b93e0be73b12170', '1496465601', '1505202952', '1504853734.jpg', '13609615061', '51a0ac908376f3a796abe7e5a8f31e61', 1505289352);

-- --------------------------------------------------------

--
-- 表的结构 `tp_admingj`
--

CREATE TABLE `tp_admingj` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL COMMENT '管理员ID',
  `creattime` text NOT NULL COMMENT '创建时间',
  `imgtime` text NOT NULL COMMENT '发表照片时间',
  `filetime` text NOT NULL COMMENT '发表文章时间',
  `logintime` text NOT NULL COMMENT '最近登陆时间',
  `remesstime` text NOT NULL COMMENT '回复留言时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理员轨迹';

--
-- 转存表中的数据 `tp_admingj`
--

INSERT INTO `tp_admingj` (`id`, `uid`, `creattime`, `imgtime`, `filetime`, `logintime`, `remesstime`) VALUES
(1, 1, '1496465483', '1502849424', '1503555856', '1503677354', '1503467993'),
(2, 2, '1496465601', '1504853877', '1504144007', '1505202952', '1504143383');

-- --------------------------------------------------------

--
-- 表的结构 `tp_adminlogin`
--

CREATE TABLE `tp_adminlogin` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL COMMENT '管理员ID',
  `jan` int(11) NOT NULL DEFAULT '0' COMMENT '一月总数',
  `feb` int(11) NOT NULL DEFAULT '0' COMMENT '二月总数',
  `mar` int(11) NOT NULL DEFAULT '0' COMMENT '三月总数',
  `apr` int(11) NOT NULL DEFAULT '0' COMMENT '四月总数',
  `may` int(11) NOT NULL DEFAULT '0' COMMENT '五月总数',
  `jun` int(11) NOT NULL DEFAULT '0' COMMENT '六月总数',
  `jul` int(11) NOT NULL DEFAULT '0' COMMENT '七月总数',
  `aug` int(11) NOT NULL DEFAULT '0' COMMENT '八月总数',
  `sep` int(11) NOT NULL DEFAULT '0' COMMENT '九月总数',
  `oct` int(11) NOT NULL DEFAULT '0' COMMENT '十月总数',
  `nov` int(11) NOT NULL DEFAULT '0' COMMENT '十一月总数',
  `dec` int(11) NOT NULL DEFAULT '0' COMMENT '十二月总数'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理员个人登录';

--
-- 转存表中的数据 `tp_adminlogin`
--

INSERT INTO `tp_adminlogin` (`id`, `uid`, `jan`, `feb`, `mar`, `apr`, `may`, `jun`, `jul`, `aug`, `sep`, `oct`, `nov`, `dec`) VALUES
(1, 1, 1, 0, 0, 1, 1, 22, 0, 34, 0, 0, 0, 0),
(2, 2, 0, 1, 0, 0, 0, 1, 1, 9, 8, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tp_album`
--

CREATE TABLE `tp_album` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL COMMENT '相册名',
  `tid` int(11) NOT NULL COMMENT '分类ID',
  `img` text NOT NULL COMMENT '图片路径',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '相册状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='相册表';

--
-- 转存表中的数据 `tp_album`
--

INSERT INTO `tp_album` (`id`, `name`, `tid`, `img`, `status`) VALUES
(10, 'LOVE', 3, '045613.jpg', 1),
(11, '节日', 5, '105909.jpg', 1),
(12, 'LOVE', 6, '025734.jpg', 1);

-- --------------------------------------------------------

--
-- 表的结构 `tp_articleimg`
--

CREATE TABLE `tp_articleimg` (
  `id` int(11) NOT NULL,
  `imgurl` text NOT NULL COMMENT '图片地址',
  `type` text NOT NULL COMMENT '类型'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='暂时存放';

--
-- 转存表中的数据 `tp_articleimg`
--

INSERT INTO `tp_articleimg` (`id`, `imgurl`, `type`) VALUES
(1, 'noimg.jpg', 'article');

-- --------------------------------------------------------

--
-- 表的结构 `tp_articlemon`
--

CREATE TABLE `tp_articlemon` (
  `id` int(11) NOT NULL,
  `month` text NOT NULL COMMENT '月份',
  `count` int(255) NOT NULL COMMENT '数量'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_articlemon`
--

INSERT INTO `tp_articlemon` (`id`, `month`, `count`) VALUES
(1, 'jan', 0),
(2, 'feb', 0),
(3, 'mar', 0),
(4, 'apr', 0),
(5, 'may', 0),
(6, 'jun', 10),
(7, 'jul', 0),
(8, 'aug', 39),
(9, 'sep', 3),
(10, 'otc', 0),
(11, 'nov', 0),
(12, 'dec', 0);

-- --------------------------------------------------------

--
-- 表的结构 `tp_file`
--

CREATE TABLE `tp_file` (
  `id` int(11) NOT NULL,
  `filename` text NOT NULL COMMENT '文章名称',
  `content` text NOT NULL COMMENT '内容',
  `img` text NOT NULL COMMENT '封面',
  `describe` text NOT NULL COMMENT '描述',
  `author` int(11) NOT NULL COMMENT '作者',
  `publishtime` text NOT NULL COMMENT '发表时间',
  `creattime` text NOT NULL COMMENT '修改时间',
  `status` int(11) NOT NULL COMMENT '状态',
  `fid` int(11) NOT NULL COMMENT '文章类型'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章表';

--
-- 转存表中的数据 `tp_file`
--

INSERT INTO `tp_file` (`id`, `filename`, `content`, `img`, `describe`, `author`, `publishtime`, `creattime`, `status`, `fid`) VALUES
(3, 'Aenean feugiat in ante et blandit', 'Aenean feugiat in ante et blandit. Vestibulum posuere molestie risus, ac interdum magna porta non. Pellentesque rutrum fringilla elementum. Curabitur tincidunt porta lorem vitae accumsan.Aenean feugiat in ante et blandit. Vestibulum posuere molestie risus, ac interdum magna porta non.ac interdum magna porta non. Pellentesque rutrum fringilla elementum. Curabitur tincidunt porta lorem vitae accumsan ', '1496910912.jpg', 'Aenean feugiat in ante et blandit. Vestibulum posuere molestie risus, ac interdum magna porta non', 1, '1496819317', '1496910915', 1, 1),
(4, 'Lorem ipsum dolor sit amet', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Consetetur sadipscing elitr, sed diam nonumy eirmod tempor inviduntut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.justo duo dolores et ea rebum. Consetetur sadipscing elitr, &nbsp;consetetur sadipscing elitr elitr. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '1496830056.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 1, '1496819365', '1502848899', 1, 2),
(7, '上线一周', '<p>上线一周</p>', '1503469663.jpg', '上线一周', 1, '1503469669', ' ', 0, 1),
(9, '七夕情人节', '<p>&nbsp; &nbsp;今天是中国传统的情人节，属于我们的第一个七夕节，也是我们结束异地后的第一个情人节，I LOVE YOU，香香，爱你的小汤圆。感谢你一路以来的支持与包容，我很幸运，因为你带给我的总是快乐与幸福，谢谢你的这一切付出，我也不会让你的付出白白浪费，我会努力创造属于我们彼此的幸福，让你做一个幸福的姑娘，带给你欢乐与幸福，香香，我爱你，七夕节快乐，属于我们的节日！<br/></p><p><br/></p>', '1503885621.jpg', '好想朝朝暮暮，更想天长地久', 1, '1503885821', '1504172068', 1, 1),
(10, '我与香香的日常', '<p>&nbsp; &nbsp; &nbsp;每天醒来第一件事就是互道早安，一起收能量。吃过早饭之后，我便来到你住的公寓，看你吃早餐，帮忙看看哪些没有带上的(你就是这么一个不让人省心的孩子，但我喜欢替你安排妥当)。吃过早餐之后，我们便开始上班的开始，我们总是习惯坐到总站，然后再坐去公司，你每天在地铁上基本就是睡觉，你习惯性的靠着我的肩膀睡，我也喜欢你靠着我的肩膀睡。我总是故意坐过几个站，然后再坐回去，只为多陪伴你一会。</p><p>&nbsp; &nbsp; &nbsp;每天下班，我总会提前在大运地铁站等你的到来，然后一起下班回家吃饭，吃过晚饭之后，我们也会出去逛逛街，享受晚上两人的独处时间，回到你住的地方，我总会等你洗完澡，给你洗衣服，这种状况，已经持续了几个月的时间，我也能为你洗衣服感到很幸福，因为可以为自己喜欢的姑娘的洗衣服，也是一种幸福。</p><p>&nbsp; &nbsp; &nbsp;我们也会在晚上睡觉前通通视频，谈谈心，有时候你也会被我的逗逼所逗笑，每当看到你的笑容，我都会很开心，因为你开心，我便感到莫名的欢喜。这样使我们彼此的感情更加的稳定与牢固，这便是我们每天的基本日常，即是那么的简单，又是那么的开心。</p>', '1504143483.jpg', '两个人在一起是最甜蜜的时光，两个人在一起总会产生矛盾，关键在于我们两个人怎么去解决，怎么去面对', 1, '1504144007', '1504172093', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `tp_filetype`
--

CREATE TABLE `tp_filetype` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL COMMENT '文章分类名称'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章分类表';

--
-- 转存表中的数据 `tp_filetype`
--

INSERT INTO `tp_filetype` (`id`, `type`) VALUES
(1, '心情'),
(2, '游玩');

-- --------------------------------------------------------

--
-- 表的结构 `tp_footervideo`
--

CREATE TABLE `tp_footervideo` (
  `id` int(11) NOT NULL,
  `video` text NOT NULL COMMENT '视频地址',
  `type` text NOT NULL COMMENT '类型',
  `creattime` int(11) NOT NULL COMMENT '创建时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='视频展示表';

--
-- 转存表中的数据 `tp_footervideo`
--

INSERT INTO `tp_footervideo` (`id`, `video`, `type`, `creattime`) VALUES
(1, '025449.mp4', 'video', 0);

-- --------------------------------------------------------

--
-- 表的结构 `tp_img`
--

CREATE TABLE `tp_img` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL COMMENT '图片地址',
  `describe` text NOT NULL COMMENT '描述',
  `tid` int(11) NOT NULL COMMENT '分类ID',
  `aid` int(11) NOT NULL COMMENT '相册ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='图片表';

--
-- 转存表中的数据 `tp_img`
--

INSERT INTO `tp_img` (`id`, `img`, `describe`, `tid`, `aid`) VALUES
(15, '045638.jpg', 'LOVE', 3, 10),
(16, '045649.jpg', 'LOVE', 3, 10),
(17, '045702.jpg', 'LOVE', 3, 10),
(18, '045715.jpg', 'LOVE', 3, 10),
(19, '110003.jpg', '七夕情人节', 5, 11),
(20, '025746.jpeg', 'LOVE', 6, 12),
(21, '025757.jpg', 'LOVE', 6, 12);

-- --------------------------------------------------------

--
-- 表的结构 `tp_imgtype`
--

CREATE TABLE `tp_imgtype` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL COMMENT '分类'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='图片分类表';

--
-- 转存表中的数据 `tp_imgtype`
--

INSERT INTO `tp_imgtype` (`id`, `type`) VALUES
(3, '花'),
(5, '节日'),
(6, 'LOVE');

-- --------------------------------------------------------

--
-- 表的结构 `tp_kprecord`
--

CREATE TABLE `tp_kprecord` (
  `id` int(11) NOT NULL,
  `titlefrist` text NOT NULL COMMENT '第一段',
  `titletwo` text NOT NULL COMMENT '第二段',
  `type` varchar(126) NOT NULL COMMENT '类型',
  `creattime` int(11) NOT NULL COMMENT '创建时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='网站底部备案字段';

--
-- 转存表中的数据 `tp_kprecord`
--

INSERT INTO `tp_kprecord` (`id`, `titlefrist`, `titletwo`, `type`, `creattime`) VALUES
(1, '© DZX', '粤ICP备17107450号', 'footer', 1503554659);

-- --------------------------------------------------------

--
-- 表的结构 `tp_lognum`
--

CREATE TABLE `tp_lognum` (
  `id` int(11) NOT NULL,
  `mon` text NOT NULL COMMENT '月份',
  `count` int(11) NOT NULL DEFAULT '0' COMMENT '数量'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户访问数';

--
-- 转存表中的数据 `tp_lognum`
--

INSERT INTO `tp_lognum` (`id`, `mon`, `count`) VALUES
(1, '01', 0),
(2, '02', 0),
(3, '03', 0),
(4, '04', 0),
(5, '05', 1),
(6, '06', 6),
(7, '07', 0),
(8, '08', 20),
(9, '09', 2),
(10, '10', 0),
(11, '11', 0),
(12, '12', 0);

-- --------------------------------------------------------

--
-- 表的结构 `tp_lunbo`
--

CREATE TABLE `tp_lunbo` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL COMMENT '图片地址',
  `content` text NOT NULL COMMENT '图片描述'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='轮播表';

--
-- 转存表中的数据 `tp_lunbo`
--

INSERT INTO `tp_lunbo` (`id`, `img`, `content`) VALUES
(2, '034343.jpg', 'I LOVE YOU'),
(3, '034403.jpg', 'This is My Love'),
(4, '034506.jpg', 'Hold your hand and grow old together with you'),
(5, '113942.jpg', 'I LOVE YOU'),
(6, '114007.jpg', 'Eternal love'),
(7, '115630.jpg', 'Love you with my whole life');

-- --------------------------------------------------------

--
-- 表的结构 `tp_message`
--

CREATE TABLE `tp_message` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL COMMENT '留着者ID',
  `content` text NOT NULL COMMENT '留言内容',
  `creattime` text NOT NULL COMMENT '留言时间',
  `status` int(11) NOT NULL DEFAULT '2' COMMENT '1：已回复   2：未回复',
  `biaozhi` int(11) NOT NULL DEFAULT '1' COMMENT '标志(1:正常;2:垃圾箱;)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='留言表';

--
-- 转存表中的数据 `tp_message`
--

INSERT INTO `tp_message` (`id`, `uid`, `content`, `creattime`, `status`, `biaozhi`) VALUES
(1, 2, '测速！', '1496990738', 1, 1),
(2, 3, '测试', '1496990738', 1, 1),
(3, 3, '<p>我来了</p>', '1497315571', 1, 1),
(4, 5, '你好！', '1497583133', 1, 1),
(5, 5, '你好！', '1503300494', 1, 1),
(6, 5, '嘿嘿！', '1503300586', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `tp_pinglun`
--

CREATE TABLE `tp_pinglun` (
  `id` int(11) NOT NULL,
  `fid` int(11) NOT NULL COMMENT '文章ID',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `content` text NOT NULL COMMENT '评论内容',
  `time` text NOT NULL COMMENT '评论时间',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '评论浏览状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评论表';

--
-- 转存表中的数据 `tp_pinglun`
--

INSERT INTO `tp_pinglun` (`id`, `fid`, `uid`, `content`, `time`, `status`) VALUES
(1, 4, 5, '<p>英文好难看懂</p>', '1497580972', 1),
(2, 4, 5, '<p>英文好高大上</p>', '1497597748', 1),
(3, 3, 5, '<p>哇，占个楼先</p>', '1497598211', 1);

-- --------------------------------------------------------

--
-- 表的结构 `tp_readartcle`
--

CREATE TABLE `tp_readartcle` (
  `id` int(11) NOT NULL,
  `rjid` int(11) NOT NULL COMMENT '日记ID',
  `reader` int(255) NOT NULL DEFAULT '0' COMMENT '浏览总数',
  `thumbs` int(255) NOT NULL DEFAULT '0' COMMENT '点赞数'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='日记附属表';

--
-- 转存表中的数据 `tp_readartcle`
--

INSERT INTO `tp_readartcle` (`id`, `rjid`, `reader`, `thumbs`) VALUES
(1, 3, 24, 1),
(2, 4, 92, 0),
(5, 7, 0, 0),
(7, 9, 4, 0),
(8, 10, 7, 2);

-- --------------------------------------------------------

--
-- 表的结构 `tp_remessage`
--

CREATE TABLE `tp_remessage` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL COMMENT '留言ID',
  `uid` int(11) NOT NULL COMMENT '留言者ID',
  `aid` int(11) NOT NULL COMMENT '管理员ID',
  `content` text NOT NULL COMMENT '回复内容',
  `creattime` text NOT NULL COMMENT '回复时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='回复留言表';

--
-- 转存表中的数据 `tp_remessage`
--

INSERT INTO `tp_remessage` (`id`, `mid`, `uid`, `aid`, `content`, `creattime`) VALUES
(1, 1, 0, 1, '你好，感谢你的留言', '1497250437'),
(2, 1, 2, 0, '没想到你会回复我！', '1497253501'),
(3, 1, 0, 1, '是啊，惊不惊喜，意不意外', '1497254253'),
(4, 1, 0, 1, '<p><img src="http://img.baidu.com/hi/jx2/j_0057.gif"/></p>', '1497254334'),
(5, 1, 0, 1, '<p>嘿嘿！<br/></p>', '1497314848'),
(6, 2, 0, 1, '<p>嘿嘿!</p>', '1497314870'),
(7, 1, 0, 1, '<p><img src="http://img.baidu.com/hi/jx2/j_0068.gif"/></p>', '1497315204'),
(9, 2, 3, 0, '<p>哈喽</p>', '1497323062'),
(10, 2, 0, 1, '<p>你好呀</p>', '1497323073'),
(11, 2, 3, 0, '<p><img src="http://img.baidu.com/hi/jx2/j_0067.gif"/></p>', '1497323178'),
(12, 2, 3, 0, '<p>哈哈</p>', '1497324114'),
(13, 1, 0, 1, '<p>嘿嘿</p>', '1502849438'),
(14, 3, 0, 1, '<p>好哒</p>', '1502849463'),
(15, 4, 0, 1, '<p>嘿嘿</p>', '1503467993'),
(16, 5, 0, 2, '<p>欢迎欢迎</p>', '1504143376'),
(17, 6, 0, 2, '<p>哈喽！！！</p>', '1504143383');

-- --------------------------------------------------------

--
-- 表的结构 `tp_sms`
--

CREATE TABLE `tp_sms` (
  `id` int(11) NOT NULL,
  `token` text NOT NULL COMMENT 'token',
  `account` text NOT NULL COMMENT 'access',
  `content` text NOT NULL COMMENT '模版内容',
  `type` text NOT NULL COMMENT '类型'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='短信验证码表';

--
-- 转存表中的数据 `tp_sms`
--

INSERT INTO `tp_sms` (`id`, `token`, `account`, `content`, `type`) VALUES
(1, '2c757955d66b47d0839bdae46cc8b1a8', 'aa93642712c54c25950cb12f858873ff', '【我的空间】打死都不要告诉别人你的验证码是：', 'sms');

-- --------------------------------------------------------

--
-- 表的结构 `tp_theme`
--

CREATE TABLE `tp_theme` (
  `id` int(11) NOT NULL,
  `vid` int(11) NOT NULL COMMENT '分类ID',
  `name` text NOT NULL COMMENT '主题名称',
  `img` text NOT NULL COMMENT '照片封面',
  `status` int(11) NOT NULL COMMENT '状态(1:公开,0:保密)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='视频主题表';

-- --------------------------------------------------------

--
-- 表的结构 `tp_title`
--

CREATE TABLE `tp_title` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL COMMENT '标题名称',
  `type` text NOT NULL COMMENT '类型'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='网站标题';

--
-- 转存表中的数据 `tp_title`
--

INSERT INTO `tp_title` (`id`, `title`, `type`) VALUES
(1, '小汤圆快到碗里来', 'top'),
(2, '小汤圆快到碗里来!', 'footer');

-- --------------------------------------------------------

--
-- 表的结构 `tp_user`
--

CREATE TABLE `tp_user` (
  `id` int(120) NOT NULL,
  `password` text NOT NULL COMMENT '密码',
  `creattime` text NOT NULL COMMENT '创建时间',
  `img` text NOT NULL COMMENT '头像',
  `phone` text NOT NULL COMMENT '手机号',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '状态',
  `lasttime` text NOT NULL COMMENT '最近登陆时间',
  `groupid` int(120) NOT NULL COMMENT '用户分组',
  `username` varchar(32) NOT NULL COMMENT '用户名',
  `token` text COMMENT '令牌',
  `tokentime` int(11) DEFAULT '0' COMMENT '令牌时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_user`
--

INSERT INTO `tp_user` (`id`, `password`, `creattime`, `img`, `phone`, `status`, `lasttime`, `groupid`, `username`, `token`, `tokentime`) VALUES
(2, 'a2de9b490314ded3a0b2f83cb7cb8f2c', '1496470045', '2.jpg', '13609615063', 1, ' 1496710136', 2, 'user03', NULL, 0),
(3, '469cb46137ec1963d6ce065bf1bc9918', '1496655008', 'user.png', ' 15223365478', 0, ' 1494645071', 1, 'user01', '68f8d3378e1b0a1ed456c1992556b445', 1503741715),
(4, '11f5926e6608cdc0f38c250d12bb0859', '1496882028', 'user.png', ' ', 1, ' ', 1, 'user02', NULL, 0),
(5, 'df29c6a28ab2cb0e393c1705eb4850a5', '1496892895', '5.jpg', ' ', 1, ' ', 1, 'dzx', 'bdb420511e602e5ba22cca8e73000e29', 1505287525),
(6, 'a2de9b490314ded3a0b2f83cb7cb8f2c', '1497926000', 'user.png', '13609615062', 1, '', 1, 'user', NULL, 0),
(7, 'c114023bc43214a287c7e7c1a3d9403d', '1503652918', 'user.png', '15992259745', 1, '', 1, '慢慢没发现', NULL, 0),
(8, 'be5bed902fe7b7c5c2911ab030a38042', '1505203341', 'user.png', '13609615061', 1, '', 1, 'hzx', '1c14616ac7c3f04e859fbcb079761cfc', 1505289757);

-- --------------------------------------------------------

--
-- 表的结构 `tp_usergroup`
--

CREATE TABLE `tp_usergroup` (
  `id` int(120) NOT NULL,
  `name` text NOT NULL COMMENT '名称'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户组表';

--
-- 转存表中的数据 `tp_usergroup`
--

INSERT INTO `tp_usergroup` (`id`, `name`) VALUES
(1, '普通用户'),
(2, '亲密用户'),
(3, '其他用户');

-- --------------------------------------------------------

--
-- 表的结构 `tp_variable`
--

CREATE TABLE `tp_variable` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL COMMENT '标题',
  `caption` varchar(128) NOT NULL COMMENT '描述',
  `type` text NOT NULL COMMENT '类型',
  `creattime` int(11) NOT NULL COMMENT '创建时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='变量表';

--
-- 转存表中的数据 `tp_variable`
--

INSERT INTO `tp_variable` (`id`, `title`, `caption`, `type`, `creattime`) VALUES
(1, '相册', '甜蜜的日常', 'image', 1503383511),
(2, '日记', '关于我们的点点滴滴', 'filetype', 1503383511),
(3, '美好的时光', '小汤圆快到碗里来', 'videotype', 1503383511),
(4, '我的留言', '时间轴', 'messagetype', 1503383511),
(5, 'Belong to our love', 'Record our sweet and mundane bits and pieces, and gather these bits and pieces into love forever.', 'indextop', 1503383511),
(6, '甜蜜的记忆', '岁月是那么的短暂 &amp; 但有你却是那么的漫长.', 'indexbanner', 1503383511),
(7, '美好 时光', '有你在的每一分每一秒都是那么的甜蜜. <br> 遇上你是我的荣幸 LOVE ', 'indexfooter', 1503383511);

-- --------------------------------------------------------

--
-- 表的结构 `tp_video`
--

CREATE TABLE `tp_video` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL COMMENT '名称',
  `describe` text NOT NULL COMMENT '描述',
  `tid` int(11) NOT NULL COMMENT '分类ID',
  `vid` int(11) NOT NULL COMMENT '主题ID',
  `video` text NOT NULL COMMENT '视频',
  `time` text NOT NULL COMMENT '发表时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='视频表';

--
-- 转存表中的数据 `tp_video`
--

INSERT INTO `tp_video` (`id`, `name`, `describe`, `tid`, `vid`, `video`, `time`) VALUES
(3, '狗狗', '狗狗', 4, 7, '051050.mp4', '1497601396'),
(4, '狗狗', '狗狗', 4, 7, '051114.mp4', '1497601416');

-- --------------------------------------------------------

--
-- 表的结构 `tp_videtype`
--

CREATE TABLE `tp_videtype` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL COMMENT '分类名称'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='视频分类表';

--
-- 转存表中的数据 `tp_videtype`
--

INSERT INTO `tp_videtype` (`id`, `name`) VALUES
(5, '游玩'),
(6, 'LOVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tp_admin`
--
ALTER TABLE `tp_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_admingj`
--
ALTER TABLE `tp_admingj`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_adminlogin`
--
ALTER TABLE `tp_adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_album`
--
ALTER TABLE `tp_album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_articleimg`
--
ALTER TABLE `tp_articleimg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_articlemon`
--
ALTER TABLE `tp_articlemon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_file`
--
ALTER TABLE `tp_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_filetype`
--
ALTER TABLE `tp_filetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_footervideo`
--
ALTER TABLE `tp_footervideo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_img`
--
ALTER TABLE `tp_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_imgtype`
--
ALTER TABLE `tp_imgtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_kprecord`
--
ALTER TABLE `tp_kprecord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_lognum`
--
ALTER TABLE `tp_lognum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_lunbo`
--
ALTER TABLE `tp_lunbo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_message`
--
ALTER TABLE `tp_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_pinglun`
--
ALTER TABLE `tp_pinglun`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tp_readartcle`
--
ALTER TABLE `tp_readartcle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_remessage`
--
ALTER TABLE `tp_remessage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_sms`
--
ALTER TABLE `tp_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_theme`
--
ALTER TABLE `tp_theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_title`
--
ALTER TABLE `tp_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_user`
--
ALTER TABLE `tp_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_usergroup`
--
ALTER TABLE `tp_usergroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_variable`
--
ALTER TABLE `tp_variable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_video`
--
ALTER TABLE `tp_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_videtype`
--
ALTER TABLE `tp_videtype`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `tp_admin`
--
ALTER TABLE `tp_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `tp_admingj`
--
ALTER TABLE `tp_admingj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `tp_adminlogin`
--
ALTER TABLE `tp_adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `tp_album`
--
ALTER TABLE `tp_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用表AUTO_INCREMENT `tp_articleimg`
--
ALTER TABLE `tp_articleimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `tp_articlemon`
--
ALTER TABLE `tp_articlemon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用表AUTO_INCREMENT `tp_file`
--
ALTER TABLE `tp_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `tp_filetype`
--
ALTER TABLE `tp_filetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `tp_footervideo`
--
ALTER TABLE `tp_footervideo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `tp_img`
--
ALTER TABLE `tp_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- 使用表AUTO_INCREMENT `tp_imgtype`
--
ALTER TABLE `tp_imgtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `tp_kprecord`
--
ALTER TABLE `tp_kprecord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `tp_lognum`
--
ALTER TABLE `tp_lognum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用表AUTO_INCREMENT `tp_lunbo`
--
ALTER TABLE `tp_lunbo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `tp_message`
--
ALTER TABLE `tp_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `tp_pinglun`
--
ALTER TABLE `tp_pinglun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `tp_readartcle`
--
ALTER TABLE `tp_readartcle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `tp_remessage`
--
ALTER TABLE `tp_remessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- 使用表AUTO_INCREMENT `tp_sms`
--
ALTER TABLE `tp_sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `tp_theme`
--
ALTER TABLE `tp_theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `tp_title`
--
ALTER TABLE `tp_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `tp_user`
--
ALTER TABLE `tp_user`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `tp_usergroup`
--
ALTER TABLE `tp_usergroup`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `tp_variable`
--
ALTER TABLE `tp_variable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `tp_video`
--
ALTER TABLE `tp_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `tp_videtype`
--
ALTER TABLE `tp_videtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
