<?php
class Tool{
    public static $db;

    public static function getInstance(){
        if(!empty(self::$db)){
            return self::$db;
        }else{
            try {
                $dsn = "mysql:host=127.0.0.1;dbname=laravel";
                self::$db = new PDO($dsn,'root','123456');
                self::$db->query("SET NAMES utf8");
                return self::$db;
            }
            catch (PDOException $e) {
                var_dump('Connection failed: ' . $e->getMessage());
                exit(1);
            }
        }
    }

    public function getStatement($sql){
        $db = $this->getInstance();
        $sth = $db->prepare($sql);
        return $sth;
    }

    public function insetData($data){
        $sql = "insert into category (name,org_catid) VALUE ('{$data['name']}',{$data['org_catid']})";

        $sth = $this->getStatement($sql);
        $sth->execute();

        return true;

    }

    public function getList(){
        $sql = "select * from category where id >= 1681";
        $sth = $this->getStatement($sql);
        $sth->execute();
        $resp = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $resp;
    }
}

//$file = 'data1.csv';
//$data = file($file);
//$tool = new Tool;
//foreach ($data as $key => $row){
//    $exp = explode(",",$row);
//    if(!empty($exp[0]) && !empty($exp[1])){
//        $exp[0] = str_replace("\"","",$exp[0]);
//        $val = array('name'=>$exp[0],'org_catid'=>$exp[1]);
//        $tool->insetData($val);
//    }
//
//}


//var_dump($data[0]);exit;
//$exper = explode(" ",$data[0]);
//var_dump($exper);exit;
//var_dump(file($file));exit;
//if(!empty($userId)){
//    $tool = new Tool();
//    $list = $tool->getList($userId);
//}

$hasArray = [659,
    697,
    727,
    861,
    962,
    1047,
    1287,
    1350,
    1362,
    1365,
    1369,
    1371,
    1394,
    1409,
    1411,
    1412,
    1419,
    1426,
    1427,
    1446,
    1455,
    1474,
    1517,
    1519,
    1538,
    1539,
    1573,
    1631,
    2580,
    2691,
    3983,
    4000,
    4942,
    4954,
    5003,
    5020,
    5021,
    5152,
    5155,
    5156,
    5161,
    5256,
    5258,
    6150,
    6159,
    6173,
    6175,
    6176,
    6179,
    6181,
    6184,
    6186,
    6190,
    6192,
    6201,
    6209,
    6210,
    6319,
    6739,
    6752,
    6807,
    6908,
    6910,
    6911,
    6912,
    6919,
    6920,
    7055,
    7170,
    9189,
    9205,
    9209,
    9212,
    9215,
    9221,
    9222,
    9224,
    9225,
    9226,
    9227,
    9705,
    9706,
    9708,
    9710,
    9711,
    9712,
    9714,
    9715,
    9721,
    9725,
    9728,
    9729,
    9731,
    9732,
    9734,
    9737,
    9738,
    9745,
    9747,
    9749,
    9754,
    9757,
    9758,
    9761,
    9762,
    9763,
    9764,
    9769,
    9770,
    9776,
    9778,
    9781,
    9793,
    9867,
    9869,
    9898,
    9924,
    9927,
    9929,
    9930,
    9934,
    9937,
    9938,
    11156,
    11162,
    11226,
    11231,
    11233,
    11929,
    11930,
    11936,
    11937,
    11981,
    11987,
    11988,
    11989,
    11991,
    11993,
    12005,
    12008,
    12011,
    12012,
    12014,
    12015,
    12019,
    12021,
    12022,
    12026,
    12027,
    12028,
    12035,
    12043,
    12054,
    12057,
    12067,
    12079,
    12089,
    12104,
    12105,
    12108,
    12109,
    12119,
    12120,
    12129,
    12130,
    12138,
    12140,
    12153,
    12157,
    12167,
    12168,
    12169,
    12170,
    12191,
    12355,
    12417,
    12623,
    12624,
    12626,
    12629,
    12649,
    12774,
    12808,
    12810,
    13063,
    13064,
    13066,
    13068,
    13069,
    13070,
    13071,
    13073,
    13080,
    13172,
    13207,
    13224,
    13225,
    13227,
    13289,
    13538,
    13542,
    13662,
    13665,
    13666,
    13667,
    13668,
    13818,];


$tool = new Tool();

$data = $tool->getList();
$ctime = $utime = time();

foreach ($data as $key => $row){

    if(in_array($row['org_catid'],$hasArray)) continue;
    $sql = "INSERT INTO tb_source_categories (shop_id,cat_name,org_cat_id,parent_id,level,flag,createtime,updatetime,category_id,is_always_show) VALUES (544,'{$row['name']}',{$row['org_catid']},0,3,2,{$ctime},{$ctime},0,0);<br/>";

echo $sql;
}

?>
