<?php
return array(
	//'配置项'=>'配置值'
	'MODULE_ALLOW_LIST'    =>    array('Home','Admin'),
    'DEFAULT_MODULE'       =>    'Home',
	'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => 'localhost', // 服务器地址
    'DB_NAME'   => 'person', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '', // 密码
    'DB_PORT'   => '3306',// 端口
    'DB_PREFIX' => 'tp_', // 数据库表前缀 
    'TMPL_ACTION_ERROR'=>'Error:error', // 定义错误跳转页面URL地址
    'TMPL_ACTION_SUCCESS'=>'Error:success', // 定义成功跳转页面URL地址

    'URL_CASE_INSENSITIVE'  =>  true,   // 默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'             =>  2,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
            // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式
);