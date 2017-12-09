<?php
/**
 * Created by PhpStorm.
 * User: yunzhou.cao
 * Date: 2017/7/4
 * Time: 16:57
 */
namespace Fanli\Robot\Handlers;

use Hanson\Vbot\Contact\Friends;
use Hanson\Vbot\Message\Text;
use Illuminate\Support\Collection;

class NewFriendHandler
{
    public static function messageHandler(Collection $message, Friends $friends)
    {
        // gaea配置
        $gaea = vbot()->config->get('gaea.rule');
        $search_key_word = $gaea['search_key_word'];
        if(empty($search_key_word)){
            vbot('console')->log('未找到gaea配置: search_key_word');
            return true;
        }
        usort($search_key_word, function($a, $b){
            return $a['data1'] - $b['data1'];
        });
        $welcome_words = array_column($search_key_word, 'data2');
        vbot('console')->log('收到好友申请:'.$message['info']['Content']);
        $friends->approve($message);
        // 添加好友后发送问候语
        foreach($welcome_words as $msg){
            Text::send($message['info']['UserName'], $msg);
        }

        return true;
    }
}