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

class TulingHandler
{
    public static function messageHandler(Collection $message)
    {
        $api = "http://www.tuling123.com/openapi/api";
        $apiKey = "a583f3c2a6e7407ab43c7885d3495a57";

        if($message['from']['NickName'] == '本地测试' && $message['type'] == 'text'){
            $resp = vbot()->http->json($api, array('key' => $apiKey, 'info' => $message['content']), true);
            if($resp['code'] === 100000){
                Text::send($message['from']['UserName'], $resp['text']);
            }
        }


        return true;
    }
}