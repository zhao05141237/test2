<?php
/**
 * Created by PhpStorm.
 * User: yunzhou.cao
 * Date: 2017/7/4
 * Time: 13:48
 */
namespace Fanli\Robot\Handlers;

use Fanli\Robot\Service\SearchService;
use Hanson\Vbot\Message\Text;
use Hanson\Vbot\Support\File;
use Illuminate\Support\Collection;

class LogMessageHandler
{
    /**
     * @var array
     * 支持的消息类型
     */
    private static $logType = array(
        'text',
        'share',
    );

    public static function messageHandler(Collection $message)
    {
        // 消息格式(文本或者分享)
        if(!in_array($message['type'], self::$logType)){
            return true;
        }

        $content = $message['content'];
        // 消息内容检测
        if($message['type'] === 'text' && !self::checkContainUrl($content) && !self::checkFanCodeFormat($content)){

            return true;
        }
        $group_name = $message['from']['NickName'];
        $sender = $message['sender']['NickName'];

        $extra = array();
        if($message['type'] === 'share'){
            $extra['title'] = $message['title'];
            $extra['description'] = $message['description'];
            $extra['app'] = $message['app'];
            $extra['url'] = $message['url'];
        }

        self::logMassage($group_name, $message['content'], $sender, $message['type'], $extra);
        return true;
    }

    /**
     * 记录日志到文件
     * @param string $group_name 群名
     * @param string $content 消息内容
     * @param string $sender 消息真是发送者
     * @param string $type 消息类型
     */
    public static function logMassage($group_name, $content, $sender, $type, $extra = array())
    {
        $config = vbot('config')->get('messages');
        $groups = vbot('config')->get('groups');
        // 获取群名对应的配置id
        $group_id = ($i = array_search($group_name, $groups)) ? $i : 0;
        // 构造消息日志文件
        $log_path = $config['path'] . $group_id . '/' . date('Ymd', time()) . '.log';
        $time = date('Y-m-d H:i:s');
        $log = array(
            'time' => $time,
            'group' => $group_name,
            'sender' => $sender,
            'content' => $content,
            'type' => $type,
        );

        $log = array_merge($log, $extra);

        File::appendTo($log_path, json_encode($log, JSON_UNESCAPED_UNICODE). "\n");
    }

    /**
     * 消息中是否包含链接
     * @param $content
     * @return int
     */
    public static function checkContainUrl($content)
    {
        $url_valid = "/\b(?:(?:https?|http|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
        return preg_match($url_valid, $content);
    }

    /**
     * 匹配文本中是否包含返口令
     * @param $content
     * @return bool
     */
    public static function checkFanCodeFormat($content)
    {
        if(strpos($content, '复制这条信息') > 0){
            return true;
        }

        return false;
    }

}