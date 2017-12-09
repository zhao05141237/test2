<?php
/**
 * Created by PhpStorm.
 * User: yunzhou.cao
 * Date: 2017/7/4
 * Time: 18:02
 */
namespace Fanli\Robot\Handlers;

use Hanson\Vbot\Contact\Groups;
use Hanson\Vbot\Message\Text;
use Illuminate\Support\Collection;

class GroupFilterHandler
{
    public static function messageHandler(Collection $message)
    {
        // 过滤所有不属于配置中群组的消息
        $groups_conf = vbot('config')->get('groups');
        if(!in_array($message['from']['NickName'], $groups_conf)){
            return false;
        }

        return true;
    }
}