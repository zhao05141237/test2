<?php

$baseUrl = "http://gw.api.taobao.com/router/rest?";

$param = array();
//$param['method'] = 'taobao.tae.items.list';
//$param['method'] = 'taobao.tbk.tpwd.create';
$param['method'] = 'taobao.tbk.item.get';
$param['app_key'] = '23155155';
$param['sign_method'] = 'md5';
$param['timestamp'] = date('Y-m-d H:i:s');
$param['format'] = 'json';
$param['v'] = '2.0';

$param['q'] = '女装';
$param['fields'] = "num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url,seller_id,volume,nick";
$param['num_iids'] = "551758822483,554249136204,555663229167,553308610670,555736522996,548422160068";

//$param['user_id'] = 123;
//$param['text'] = "长度大于5个字符";
//$param['url'] = "https://uland.taobao.com/";

$url = $baseUrl.http_build_query($param);


$appSecret = '47744c391cfafa61f1ef811953c88d29';
ksort($param);
//var_dump($param);
$md5Str = $appSecret;
foreach($param as $key => $val){
    $md5Str .= $key.$val;
}
$md5Str .=$appSecret;
//echo $md5Str.PHP_EOL;
//$md5Str = "helloworldapp_key12345678fieldsnum_iid,title,nick,price,numformatjsonmethodtaobao.item.seller.getnum_iid11223344sessiontestsign_methodmd5timestamp2016-01-01 12:00:00v2.0helloworld";
$md5Value = md5($md5Str);
$md5Value = strtoupper($md5Value);
//var_dump($md5Value);exit;
//$lastValue = bin2hex($md5Value);
//var_dump($lastValue);
//var_dump(strtoupper($md5Value));exit;
$url = $url.'&sign='.$md5Value;
echo file_get_contents($url);
