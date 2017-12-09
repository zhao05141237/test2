<?php
/**
 * Created by PhpStorm.
 * User: qi.zhao
 * Date: 2017/11/7
 * Time: 18:20
 */

namespace App\Model;

use App\Utility\db\Redis;
class EmailQueue
{
    const QUEUE_NAME = 'task_email_list';

    static function set(TaskEmailBean $taskBean){
        return Redis::getInstance()->rPush(self::QUEUE_NAME,$taskBean);
    }

    static function pop(){
        return Redis::getInstance()->lPop(self::QUEUE_NAME);
    }
}