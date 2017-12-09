<?php
/**
 * Created by PhpStorm.
 * User: yunzhou.cao
 * Date: 2017/7/4
 * Time: 17:36
 */
namespace Fanli\Robot\Handlers;

use Hanson\Vbot\Contact\Groups;
use Illuminate\Support\Collection;

class GroupInviteHandler
{
    private static $groups_conf;

    public static function messageHandler(Collection $message, Groups $groups)
    {
        if(empty(self::$groups_conf)){
            // 加群指令和群名称匹配走配置
            self::$groups_conf = vbot('config')->get('groups');
        }
        if(!empty(self::$groups_conf)){
            $gid = $message['content'];
            if(key_exists($gid, self::$groups_conf)){
                $g_name = self::$groups_conf[$gid];
                // 邀请进群
                $groups->addMember($groups->getUsernameByNickname($g_name), $message['from']['UserName']);
            }
        }
    }
}