<?php
define("CURL_TIMEOUT",   2000);
define("URL",            "http://openapi.youdao.com/ocrapi");
define("APP_KEY",         "4b187776be84376b"); //替换为您的APPKey
define("SEC_KEY",        "WP0RvslDrcsLWbKSMIQMHJ9XNcYd6Ksi");//替换为您的密钥
require_once 'db.php';
//翻译入口
function ocr($img, $imgType, $detectType, $langType)
{
    $args = array(
        'img' => $img,
        'appKey' => APP_KEY,
        'salt' => rand(10000,99999),
        'imageType' => $imgType,
        'detectType' => $detectType,
        'langType' => $langType,

    );
    $args['sign'] = buildSign(APP_KEY, $img, $args['salt'], SEC_KEY);
    $ret = call(URL, $args);
//    echo $ret.PHP_EOL;
//    $ret = json_decode($ret, true);
    return $ret;
}

//加密
function buildSign($appKey, $query, $salt, $secKey)
{/*{{{*/
    $str = $appKey . $query . $salt . $secKey;
    $ret = md5($str);
    return $ret;
}/*}}}*/

//发起网络请求
function call($url, $args=null, $method="post", $testflag = 0, $timeout = CURL_TIMEOUT, $headers=array())
{/*{{{*/
    $ret = false;
    $i = 0;
    while($ret === false)
    {
        if($i > 1)
            break;
        if($i > 0)
        {
            sleep(1);
        }
        $ret = callOnce($url, $args, $method, false, $timeout, $headers);
        $i++;
    }
    return $ret;
}/*}}}*/

function callOnce($url, $args=null, $method="post", $withCookie = false, $timeout = CURL_TIMEOUT, $headers=array())
{/*{{{*/
    $ch = curl_init();
    if($method == "post")
    {
        $data = convert($args);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_POST, 1);
    }
    else
    {
        $data = convert($args);
        if($data)
        {
            if(stripos($url, "?") > 0)
            {
                $url .= "&$data";
            }
            else
            {
                $url .= "?$data";
            }
        }
    }
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if(!empty($headers))
    {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }
    if($withCookie)
    {
        curl_setopt($ch, CURLOPT_COOKIEJAR, $_COOKIE);
    }
    $r = curl_exec($ch);
    curl_close($ch);
    return $r;
}/*}}}*/

function convert(&$args)
{/*{{{*/
    $data = '';
    if (is_array($args))
    {
        foreach ($args as $key=>$val)
        {
            if (is_array($val))
            {
                foreach ($val as $k=>$v)
                {
                    $data .= $key.'['.$k.']='.rawurlencode($v).'&';
                }
            }
            else
            {
                $data .="$key=".rawurlencode($val)."&";
            }
        }
        return trim($data, "&");
    }
    return $args;
}/*}}}*/



function read_all_dir ( $dir )
{
    $result = array();
    $handle = opendir($dir);
    if ( $handle )
    {
        while ( ( $file = readdir ( $handle ) ) !== false )
        {
            if ( $file != '.' && $file != '..')
            {
                $cur_path = $dir . DIRECTORY_SEPARATOR . $file;
                if ( is_dir ( $cur_path ) )
                {
                    $result['dir'][$cur_path] = read_all_dir ( $cur_path );
                }
                else
                {
                    $result['file'][] = $cur_path;
                }
            }
        }
        closedir($handle);
    }
    return $result;
}


$arr = array('pic1114','pic1115');

foreach ($arr as $akey => $aval){
    $result = read_all_dir($aval);
    $fileList = $result['file'];
    echo 'file_list:'.PHP_EOL;
    var_dump($fileList);

    foreach ($fileList as $key => $val){
        echo 'file name:'.$val.PHP_EOL;
        $fp=fopen($val,"r")or die("Can't open file");
        $img=chunk_split(base64_encode(fread($fp,filesize($val))));//base64编码
        fclose($fp);
//调用翻译
//        $result = ocr($img,"1","10011","zh-en");
//        $result = json_decode($result,true);
//        var_dump($result);exit;
//        if(!empty($result['Result']['regions'])){
//            $regions = $result['Result']['regions'];
//            $str = "";
//            foreach ($regions as $keyr => $rowr){
//
//            }
//
//
//
//        }
        insertData(array('filename'=>$val,'text'=>ocr($img,"1","10011","zh-en"),'type'=>2));

//    ocr($img,"1","10011","zh-en");
    }
}

?>