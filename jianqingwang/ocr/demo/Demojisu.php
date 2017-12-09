<?php
/**
 * Created by PhpStorm.
 * User: qi.zhao
 * Date: 2017/11/15
 * Time: 15:43
 */

require_once 'curl.func.php';
require_once 'db.php';

$appkey = '09496aaa822e0b7a';//你的appkey
$url = "http://api.jisuapi.com/generalrecognition/recognize?appkey=$appkey";

$arr = array('pic1114','pic1115');

foreach ($arr as $akey => $aval){
    $result = read_all_dir($aval);
    $fileList = $result['file'];
    echo 'file_list:'.PHP_EOL;
    var_dump($fileList);

    foreach ($fileList as $key => $val){
        echo 'file name:'.$val.PHP_EOL;
        $post = array(
            'type'=>'cnen',
            'pic'=>base64_encode(file_get_contents($val)), //'@'.realpath('11.jpg')
        );
        $result = curlOpen($url, array('post'=>$post, 'isupfile'=>true));
        $jsonarr = json_decode($result, true);

        if($jsonarr['status'] != 0)
        {
            echo $jsonarr['msg'];
            exit();
        }
        $result = $jsonarr['result'];
        $text = "";
        foreach($result as $key1=>$val1)
        {
//        echo $key1.' '.$val1. '<br>';
            $text.= $val1;
        }
        insertData(array('filename'=>$val,'text'=>$text,'type'=>3));

    }
}




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

