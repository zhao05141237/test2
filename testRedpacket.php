<?php
//date_default_timezone_set("Asia/Shanghai");
//$file = "redpacket22.csv";
//$dataFile = file($file);
//$sqlServer = array();
//$mysqlServer = array();
//foreach ($dataFile as $key => $row){
//    $ctime = time();
//    $date = date('Y-m-d H:i:s');
//    $expArr = explode(",",$row);
//    $did = $expArr[0];
//    $orderNum = $expArr[1];
//    $orderNumParent = $expArr[2];
//    $id = $expArr[3];
//
//    $sqlServer[] = "update tb_user_gift set did = $did , modifydate = '$date' where id = $id and giftstate = 0;";
//
//    $mysqlServer[] = "insert into tb_gift_user_bind_order(giftid,ordernum,ordernum_parent,did,state,ctime,uptime) VALUES ($id,'$orderNum','$orderNumParent',$did,1,$ctime,$ctime);";
//}
//
//
//foreach ($sqlServer as $key => $val){
//    echo $val.'<br>';
//}
//
//echo "<br><br><br><br><br>";
//foreach ($mysqlServer as $key => $val){
//    echo $val.'<br>';
//}

$list = array(
    array('adgroup_id'=>111,'target_hour'=>1),
    array('adgroup_id'=>111,'target_hour'=>2),
    array('adgroup_id'=>111,'target_hour'=>3),
    array('adgroup_id'=>111,'target_hour'=>4),
    array('adgroup_id'=>111,'target_hour'=>5),
    array('adgroup_id'=>111,'target_hour'=>6),
    array('adgroup_id'=>111,'target_hour'=>7),
    array('adgroup_id'=>111,'target_hour'=>8),
)
?>