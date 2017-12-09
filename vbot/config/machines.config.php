<?php
/**
 *  array(
 *  	'machine_name' => array(
 *  		'service name' => array(
 *  			'file' => 'realpath to service', // 不填写时，请保证已在config.php存在file配置
 *  			'num' => 'service process num',
 *  		)),
 *  );
 * 注：
 * 	1.config中包含的service可以不写file，否则必须包含文件完整路径file
 * 	2.在service服务具体代码中增加$forbidLock=true，以关闭锁
 *
 */
return array();