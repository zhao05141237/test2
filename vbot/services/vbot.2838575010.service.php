<?php
require_once(dirname(__FILE__) . '/lib/init.php');

FsdkService()->run('vbot_monitor', 300);

//vbot_monitor();
// 微信机器人进程管理
function vbot_monitor() {
    // 微信id
    $wx_account = '2838575010';
    // get process
    $ps = "ps -ef | grep session=".$wx_account;
    exec($ps, $output);
    if(count($output) < 3){
        // 进程未启动
        start_vbot($wx_account);
    }else{
        // 进程最后启动时间
        $last_start_up = read_log('startup', $wx_account);
        // 二维码最后发送时间
        $last_qrcode = read_log('qrcode', $wx_account);
        // 最后登录成功时间
        $last_login = read_log('login', $wx_account);
        // 最后免扫码登录成功时间
        $last_relogin = read_log('relogin', $wx_account);
        // parse log
        if($last_login < $last_qrcode && $last_relogin < $last_start_up){
            // 没有登录
            start_vbot($wx_account);
        }
    }
}

function read_log($type, $wx_account)
{
    // log path
    $log_path = require_once(dirname(__FILE__) . '/../config/vbot.config.php');
    $logs = $log_path['logs'];

    $path = $logs[$type]['path'] . $wx_account . '/' . $logs[$type]['file'];
    return file_get_contents($path);
}

function start_vbot($wx_account)
{
    // start process
    $vbot_path = dirname(__FILE__) . "/../fanli/robot/";
    $console_file = dirname(__FILE__) . '/../tmp/log/' . $wx_account . '/console.log';
    if(!file_exists($console_file)){
        mkdir(dirname($console_file), 0777, true);
    }
    $command = $vbot_path . "run.php --session=".$wx_account." >> ". $console_file ." 2>&1 &";
    exec($command);
}

function restart_vbot()
{
    global $wx_account;
    $ps = "ps aux | grep session=$wx_account | awk '{print $2}'";
    // kill
    // start
}
