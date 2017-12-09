<?php
/**
 * Created by PhpStorm.
 * User: yunzhou.cao
 * Date: 2017/7/4
 * Time: 16:06
 */
namespace Fanli\Robot\Handlers;

use Hanson\Vbot\Message\Text;
use Illuminate\Support\Collection;

class ChatHandler
{
    public static function messageHandler(Collection $message)
    {
        if($message['type'] !== 'text'){
            return true;
        }

        $gaea = vbot()->config->get('gaea.rule');
        // 对话模式
        $search_hotword_answder = $gaea['search_hotword_answder'];
        $require = array_column($search_hotword_answder, 'data1', 'id');
        $response = array_column($search_hotword_answder, 'data2', 'id');

        foreach($require as $key => $value){
            if($message['content'] == $value){
                vbot('console')->log('匹配到聊天请求:'.$message['content']);
                Text::send($message['from']['UserName'], $response[$key]);
                break;
            }
        }


        return true;
    }
}