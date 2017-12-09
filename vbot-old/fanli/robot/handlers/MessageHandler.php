<?php

namespace Fanli\Robot\Handlers;

use Fanli\Robot\Handlers\Types\RecallType;
use Fanli\Robot\Handlers\SearchHandler;
use Hanson\Vbot\Api\Search;
use Hanson\Vbot\Contact\Friends;
use Hanson\Vbot\Contact\Groups;
use Hanson\Vbot\Contact\Members;
use Hanson\Vbot\Message\Emoticon;
use Hanson\Vbot\Message\Text;
use Illuminate\Support\Collection;

class MessageHandler
{

    public static function messageHandler(Collection $message)
    {
        /** @var Friends $friends */
//        $friends = vbot('friends');

        /** @var Members $members */
//        $members = vbot('members');

        /** @var Groups $groups */
//        $groups = vbot('groups');

        // 自动添加好友
//        if($message['type'] == 'request_friend'){
//            NewFriendHandler::messageHandler($message, $friends);
//        }
        // 处理进群邀请
//        if($message['fromType'] == 'Friend'){
//            GroupInviteHandler::messageHandler($message, $groups);
//        }

        // 群组过滤,只处理来自指定群组的消息
//        if(!GroupFilterHandler::messageHandler($message)){
//            return false;
//        }

        if(vbot('config')->get('self_off')){
            if($message['fromType'] == 'Self'){
                // 不处理自己发的消息
                return false;
            }
        }

        // 记录群内链接到文件
        LogMessageHandler::messageHandler($message);
        if($message['type'] == 'text'){
            // 文字搜索功能
            SearchHandler::messageHandler($message);
            // 聊天功能
//            ChatHandler::messageHandler($message);
        }


        // 新人入群欢迎语
//        if($message['type'] == 'group_change'){
//            GroupChangeHandler::messageHandler($message, $groups);
//        }

        return true;
    }
}
