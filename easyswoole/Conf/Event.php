<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2017/1/23
 * Time: 上午12:06
 */

namespace Conf;


use App\Model\EmailRunner;
use Core\AbstractInterface\AbstractEvent;
use Core\AutoLoader;
use Core\Component\Di;
use Core\Component\Version\Control;
use Core\Http\Request;
use Core\Http\Response;
use Core\Component\ShareMemory;
use App\Utility\SysConst;
use App\Model\Runner;
use Core\Swoole\Timer;
use Core\Swoole\AsyncTaskManager;


class Event extends AbstractEvent
{
    function frameInitialize()
    {
        // TODO: Implement frameInitialize() method.
        date_default_timezone_set('Asia/Shanghai');
        AutoLoader::getInstance()->requireFile("App/Vendor/Db/MysqliDb.php");
//        AutoLoader::getInstance()->requireFile("App/Vendor/Db/SendEmail.php");
        AutoLoader::getInstance()->requireFile('vendor/autoload.php');
    }

    function frameInitialized()
    {
        // TODO: Implement frameInitialized() method.
        Di::getInstance()->set('MYSQL',\MysqliDb::class,Array (
                'host' => '127.0.0.1',
                'username' => 'root',
                'password' => '',
                'db'=> '51fanli_research',
                'port' => 3306,
                'charset' => 'utf8')
        );
        ShareMemory::getInstance()->clear();
//        Di::getInstance()->set('EMAIL',\SendEmail::class,Array());
    }


    function beforeWorkerStart(\swoole_server $server)
    {
        // TODO: Implement beforeWorkerStart() method.
    }

    function onStart(\swoole_server $server)
    {
        // TODO: Implement onStart() method.
    }

    function onShutdown(\swoole_server $server)
    {
        // TODO: Implement onShutdown() method.
    }

    function onWorkerStart(\swoole_server $server, $workerId)
    {
        // TODO: Implement onWorkerStart() method.
      //为第一个进程添加唤起任务执行的定时器；
      if($workerId == 0){
        Timer::loop(1000,function (){
           $share = ShareMemory::getInstance();
           //请勿使得所有worker全部处于繁忙状态   危险操作
           if($share->get(SysConst::TASK_RUNNING_NUM) < 2){
               AsyncTaskManager::getInstance()->add(EmailRunner::class);
           }
        });
      }
    }

    function onWorkerStop(\swoole_server $server, $workerId)
    {
        // TODO: Implement onWorkerStop() method.
    }

    function onRequest(Request $request, Response $response)
    {
        // TODO: Implement onRequest() method.
    }

    function onDispatcher(Request $request, Response $response, $targetControllerClass, $targetAction)
    {
        // TODO: Implement onDispatcher() method.
    }

    function onResponse(Request $request,Response $response)
    {
        // TODO: Implement afterResponse() method.
    }

    function onTask(\swoole_server $server, $taskId, $workerId, $taskObj)
    {
        // TODO: Implement onTask() method.
    }

    function onFinish(\swoole_server $server, $taskId, $taskObj)
    {
        // TODO: Implement onFinish() method.
    }

    function onWorkerError(\swoole_server $server, $worker_id, $worker_pid, $exit_code)
    {
        // TODO: Implement onWorkerError() method.
    }
}
