<?php
/**
 * Created by PhpStorm.
 * User: qi.zhao
 * Date: 2017/11/3
 * Time: 10:22
 */

$db = new swoole_mysql();

$server = array(
    'host' => '127.0.0.1',
    'port' => '3306',
    'user' => 'root',
    'password' => '',
    'database' => '51fanli_research',
);

$db->connect($server,function ($db,$r){
   if($r === false){
       var_dump($db->connect_errno,$db->connect_error);
       die;
   }
   $sql = "select * from tb_convert_img_file";
   $db->query($sql,function (swoole_mysql $db ,$r){
      if($r === false){
          var_dump($db->error,$db->errno);
      }elseif ($r === true){
          var_dump($db->affected_rows,$db->insert_id);
      }
      var_dump($r);
      $db->close();
   });
});

echo 'ok';