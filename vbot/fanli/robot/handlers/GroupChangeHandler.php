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

class GroupChangeHandler
{
    public static function messageHandler(Collection $message, Groups $groups)
    {
        // gaea配置
        $gaea = vbot()->config->get('gaea.rule');
        $community_welcome_word = array_shift($gaea['community_welcome_word']);
        if(empty($community_welcome_word)){
            vbot('console')->log('未找到gaea配置: community_welcome_word');
            return true;
        }
        $welcome_str = $community_welcome_word['data1'];
        if(strtolower($message['action']) == 'add'){
            vbot('console')->log('欢迎新人进群:'.$message['invited']);
            Text::send($message['from']['UserName'], str_replace('<>', $message['invited'], $welcome_str));
        }

        return true;
    }
}