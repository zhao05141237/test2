<?php
/**
 * Created by PhpStorm.
 * User: yunzhou.cao
 * Date: 2017/7/4
 * Time: 14:22
 */
namespace Fanli\Robot\Service;

use Illuminate\Support\Collection;

class SearchService
{
    private static $search_conf;

    public function searchByKeyword($keyword)
    {
        if (empty(self::$search_conf)) {
            self::$search_conf = vbot('config')->get('search');
        }

        $sc = self::$search_conf;
        $result = array();
        if (empty($keyword)) {
            return $result;
        }

        // TODO 暂时不支持返回查询记录条数
        $result['count'] = 0;
        $result['link'] = $sc['url'];
        $params = array(
            'keyword' => $keyword
        );

        $result['link'] = $result['link'] . '?keyword=' . $keyword;
//        $result['link'] = $result['link'];

        return $result;
    }

    public function searchTaobaoItemByKeyWord($keyword)
    {
        $baseUrl = "http://gw.api.taobao.com/router/rest?";
        $param = array();
        $param['method'] = 'taobao.tbk.item.get';
        $param['app_key'] = '23155155';
        $param['sign_method'] = 'md5';
        $param['timestamp'] = date('Y-m-d H:i:s');
        $param['format'] = 'json';
        $param['v'] = '2.0';

        $param['q'] = $keyword;
        $param['fields'] = "num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url,seller_id,volume,nick";

        $url = $baseUrl . http_build_query($param);

        $appSecret = '47744c391cfafa61f1ef811953c88d29';
        ksort($param);
        $md5Str = $appSecret;
        foreach ($param as $key => $val) {
            $md5Str .= $key . $val;
        }
        $md5Str .= $appSecret;
        $md5Value = md5($md5Str);
        $md5Value = strtoupper($md5Value);
        $url = $url . '&sign=' . $md5Value;

        $reslutData =file_get_contents($url);
//        vbot('console')->log('匹配到搜索请求:' .$reslutData);

        $reslutData = json_decode($reslutData,true);

        if(isset($reslutData['tbk_item_get_response']['results']['n_tbk_item'])){
            $result = $reslutData['tbk_item_get_response']['results']['n_tbk_item'][0];
        }else{
            $result = array();
        }
        return $result;
    }
}