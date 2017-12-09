<?php

// 引入文字识别OCR SDK
require_once '../AipOcr.php';
require_once 'db.php';

// 定义常量
const APP_ID = '10361983';
const API_KEY = '8wA0MAHKolBwXm3exg5snuAM';
const SECRET_KEY = 'MCanyGLIpsk04R3ykKHmtltMBgS6sKQZ';


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



// 初始化
    $aipOcr = new AipOcr(APP_ID, API_KEY, SECRET_KEY);

// 身份证识别
//var_dump($aipOcr->idcard(file_get_contents('idcard.jpg'), true));

// 银行卡识别
//var_dump($aipOcr->bankcard(file_get_contents('bankcard.jpg')));

// 通用文字识别
    foreach ($fileList as $key => $val){
//    echo 'file name:'.$val.PHP_EOL;
//    var_dump($aipOcr->general(file_get_contents($val)));
        $result = $aipOcr->general(file_get_contents($val));

        $resultWords = $result['words_result'];
        $str = "";
        if(!empty($resultWords)){
            foreach ($resultWords as $rekey => $rerow){
                $str .= $rerow['words'];
            }
            insertData(array('filename'=>$val,'text'=>$str,'type'=>1));
        }

//        var_dump($aipOcr->general(file_get_contents($val)));exit;
    }
}

