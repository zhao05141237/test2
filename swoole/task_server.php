<?php
$serv = new swoole_server('127.0.0.1',9501);

$serv->set(
    [
        'worker_num' => 2,
        'task_worker_num' => 1,
    ]
);

$serv->on("Connect",function ($serv,$fd){
   echo "new client connected.".PHP_EOL;
});

$serv->on("Receive",function ($serv,$fd,$fromId,$data){
    echo "worker received data :{$data}".PHP_EOL;

    $serv->task($data);

    $serv->send($fd,'This is a message from server. '.PHP_EOL);

    echo "worker continue run.".PHP_EOL;
});

$serv->on("Task",function ($serv,$taskId,$fromId,$data){
    echo "task start. --- from worker id :{$fromId}.".PHP_EOL;
    for ($i=0;$i<5;$i++){
        sleep(5);
        echo "task runing. ---{$i}".PHP_EOL;
    }
    return "task end.".PHP_EOL;

});

$serv->on("Close",function ($serv,$fd){
    echo "Client close. ".PHP_EOL;
});

$serv->on("Finish",function ($serv,$taskId,$data){
   echo "finish received data '{$data}'".PHP_EOL;
});

$serv->start();