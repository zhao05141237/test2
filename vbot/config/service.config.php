<?php

$_common_config = array(
	'LOG_LEVEL' => 2, # 0=disable 1=error 2=info 3=debug

	# 服务运行时pid相关存储目录
	'PID_DIR' => "/data/app_flip/pid/vbot/",
	'LOG_FILE' => "/data/app_flip/log/vbot/%service.%Y%m%d.log", # 支持时间参数 %Y %m %d %H

	'DEBUG' => false,
    
    'FSDK_USERNAME' => 'flip-scripts',
	'FSDK_PASSWORD' => '123456',

	# 发生错误时，休眠多久
	'SLEEP_WHEN_ERROR' => 1,

	# PASSPORT
	'PASSPORT_WHITELIST_IP' => '127.0.0.1',
	'PASSPORT_SECRET_KEY' => '996746c6195ec344bf9ec6a5230ade97',

	# 知会系统REDIS
	'REDIS_ZHIHUI' => array(
		'host' => 'redis.51fanli.it',
		'port' => 6382,
		'timeout' => 5,
	),

	# 主站REDIS
	'REDIS_COMMON' => array(
		'host' => 'redis.51fanli.it',
		'port' => 6381,
		'timeout' => 5,
	),

	# GOSHOP_REDIS
	'REDIS_GOSHOP' => array(
		'host' => 'redis.51fanli.it',
		'port' => 6394,
		'timeout' => 5,
	),

	# 最小化注册REDIS
	'REDIS_MIN_SITE' => array(
		'host' => 'redis.51fanli.it',
		'port' => 6393,
		'timeout' => 5,
	),

	# 主站SQL SERVER MASTER
	'DSN_SQLSVR_MASTER' => array(
		'dsn' => 'odbc:prddsn',
		'username' => 'trace',
		'password' => 'trace',
	),

	# 主站SQL SERVER SLAVE
	'DSN_SQLSVR_SLAVE' => array(
		'dsn' => 'odbc:readsqldsn',
		'username' => 'readonly',
		'password' => 'readonly',
	),

	# 51fanli_activity
	'DSN_ACTIVITY' => array(
		'dsn' => 'mysql:host=192.168.100.60;dbname=51fanli_activity',
		'username' => 'root',
		'password' => 'root',
		'options' => array(
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
		),
	),

	# 51fanli_activity_slave
	'DSN_ACTIVITY_SLAVE' => array(
		'dsn' => 'mysql:host=192.168.100.60;dbname=51fanli_activity',
		'username' => 'readonly',
		'password' => 'readonly',
		'options' => array(
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
		),
	),

	# 51fanli_app
	'DSN_APP' => array(
		'dsn' => 'mysql:host=192.168.100.60;dbname=51fanli_app',
		'username' => 'root',
		'password' => 'root',
		'options' => array(
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
		),
	),

	# 51fanli_passport
	'DSN_PASSPORT' => array(
		'dsn' => 'mysql:host=192.168.100.60;dbname=51fanli_passport',
		'username' => 'root',
		'password' => 'root',
		'options' => array(
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
		),
	),

	# 51fanli_passport_slave
	'DSN_PASSPORT_SLAVE' => array(
		'dsn' => 'mysql:host=192.168.100.60;dbname=51fanli_passport',
		'username' => 'readonly',
		'password' => 'readonly',
		'options' => array(
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
		),
	),
	# 51fanli_user
	'DSN_USER' => array(
		'dsn' => 'mysql:host=192.168.100.60;dbname=51fanli_user',
		'username' => 'root',
		'password' => 'root',
		'options' => array(
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
		),
	),

	# 51fanli_finance
	'DSN_FINANCE' => array(
		'dsn' => 'mysql:host=192.168.100.60;dbname=51fanli_finance',
		'username' => 'root',
		'password' => 'root',
		'options' => array(
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
		),
	),

	# 51fanli_fun
	'DSN_FUN' => array(
		'dsn' => 'mysql:host=192.168.100.60;dbname=51fanli_fun',
		'username' => 'root',
		'password' => 'root',
		'options' => array(
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
		),
	),

	# 51fanli_union
	'DSN_UNION' => array(
		'dsn' => 'mysql:host=192.168.100.60;dbname=51fanli_union',
		'username' => 'root',
		'password' => 'root',
		'options' => array(
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
		),
	),

	# 51fanli_super
	'DSN_SUPER' => array(
		'dsn' => 'mysql:host=192.168.100.60;dbname=51fanli_super',
		'username' => 'root',
		'password' => 'root',
		'options' => array(
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
		),
	),

	# taobao
	'DSN_TAOBAO' => array(
		'dsn' => 'mysql:host=192.168.100.60;dbname=taobao',
		'username' => 'root',
		'password' => 'root',
		'options' => array(
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
		),
	),

	'PUSHNOTE_SHOP' => array(
		'1763' => '我们已经知道%s你在%s下单了，此订单为直降订单无返利哦~', //布兜妈妈
		'1780' => '您%s返利卡消费已跟单，最高返200元！返正有钱，还不快点！',
	),

	'OAUTH_WECHAT_SERV' => array(
		'key' => 'wx94da490b1f7bb7a5',
		'secret' => '08a9b3648f7d73e929deb7198bf9bf19',
	),

	'ORDER_PRE_REDO_TIME' => 3600, # 预订单重新执行时间间隔

        'SUPER_ORDER_REMARK_24547_START_TIME' => '2016-10-12',
        'SUPER_ORDER_REMARK_24547_END_TIME' => '2016-10-26',

    'CENTER_ORDERS_LIST_REDIS_STRTIME'=>'2016-11-10 23:55:00',
    'CENTER_ORDERS_LIST_REDIS_ENDTIME'=>'2016-11-11 00:05:00', 
	
	'TAOBAO_2ND_QUEUE_STTIME' => '2017-01-01', # 第二淘客队列开始时间
);

return $_common_config;
