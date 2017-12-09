<?php
$serv = new swoole_server('127.0.0.1',9501);

$serv->set(
    [
        'worker_num' => 2,
    ]
);

$serv->on("start",function ($serv){
   swoole_set_process_name('server-process:master');
});

$serv->on("Managerstart",function ($serv){
    swoole_set_process_name('server-process:manager');
});
$serv->on("Workerstart",function ($serv,$workerId){
    if($workerId >= $serv->setting['worker_num']){
        swoole_set_process_name('server-process:task');
    }else{
        swoole_set_process_name('server-process:worker');
    }
});



$serv->on("Connect",function ($serv,$fd){
   echo "new client connected.".PHP_EOL;
});

$serv->on("Receive",function ($serv,$fd,$fromId,$data){
    $serv->send($fd,'Server '.$data);
});

$serv->on("Close",function ($serv,$fd){
    echo "Client close. ".PHP_EOL;
});

$serv->start();