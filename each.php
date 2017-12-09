<?php
$url = "https://oapi.dingtalk.com/robot/send?access_token=56405bcbb9eba099ae1e512e198d2c42e07511e7d67f7e4707d6b4da1d61f021";
$data = array(
    'msgtype' => "text",
    'text' => array(
        'content' => "亲们 吃饭啦!! 吃饭啦!! 吃饭啦!! 吃饭啦!! 吃饭啦!! 吃饭啦!!"
    )
);

http_post($url,json_encode($data));

function http_post($url,$param){
    $header[] = "Content-type: application/json";//定义content-type为xml
    $oCurl = curl_init();
    if(stripos($url,"https://")!==FALSE){
        curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, false);
    }
    $strPOST = $param;
    curl_setopt($oCurl, CURLOPT_URL, $url);
    curl_setopt($oCurl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt($oCurl, CURLOPT_POST,true);
    curl_setopt($oCurl, CURLOPT_POSTFIELDS,$strPOST);
    $sContent = curl_exec($oCurl);
    return $sContent;
}