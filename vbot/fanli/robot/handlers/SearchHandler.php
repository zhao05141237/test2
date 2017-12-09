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
use Illuminate\Support\Collection;

class SearchHandler
{
    public static function messageHandler(Collection $message)
    {
        if ($message['type'] !== 'text') {
            return true;
        }

        $service = new SearchService();

        $keyword = $message['content'];

        $search_response = $service->searchTaobaoItemByKeyWord($keyword);

//         $feedback = '老婆我爱你!!';
        if(!empty($search_response) && !empty($search_response['item_url'])){
            $link = "http://research.office.51fanli.com/web/locate.php?url=".$search_response['item_url'];
            $feedback = '商品标题:'. $search_response['title'].'商品价格:'.$search_response['zk_final_price'].'商品链接:'.$link;
            vbot('console')->log('匹配到搜索请求:' . $message['from']['NickName'] . ':' . $message['content'] . ':' . $feedback);
            Text::send($message['from']['UserName'], $feedback);
        }

//        if (!empty($keyword)) {
//            $search_response = $service->searchByKeyword($keyword);
//            if (!empty($search_response)) {
//                // 处理spm/lc
//                $search_config = vbot('config')->get('search');
//                $from_nick_name = isset($message['from']['NickName']) ? $message['from']['NickName'] : '';
//                $from_py_name = isset($message['from']['PYQuanPin']) ? $message['from']['PYQuanPin'] : '';
//                // 回复查询结果给好友
//                // TODO 暂时没有查询结果数量的展示
//                $feedback = '检索到搜索记录，链接为: ' . $search_response['link'];
////                    $feedback = '检索到搜索记录，链接为: '. $search_response['link'];
//                vbot('console')->log('匹配到搜索请求:' . $message['from']['NickName'] . ':' . $message['content'] . ':' . $feedback);
//                Text::send($message['from']['UserName'], $feedback);
//                // 记录日志到日志文件
////                LogMessageHandler::logMassage($from_nick_name, $feedback, vbot()->myself->nickname, 'text');
//            }
//        }

        return true;
    }

}