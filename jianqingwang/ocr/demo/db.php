<?php
/**
 * Created by PhpStorm.
 * User: qi.zhao
 * Date: 2017/11/15
 * Time: 16:52
 */

class Tool{
    public static $db;

    public static function getInstance(){
        if(!empty(self::$db)){
            return self::$db;
        }else{
            try {
                $dsn = "mysql:host=127.0.0.1;dbname=51fanli_research";
                self::$db = new PDO($dsn,'root','');
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

    public function insert($data){
        $sql = "insert into tb_research_ocr (filename,text,type) VALUES ('{$data['filename']}','{$data['text']}',{$data['type']})";
        $sth = $this->getStatement($sql);
        $resp = $sth->execute();
        return $resp;
    }

    public function getList($type){
        $sql = "select * from tb_research_ocr where type = {$type}";
        $sth = $this->getStatement($sql);
        $sth->execute();
        $list = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }
}

function insertData($data){
    $tool = new Tool();
    $tool->insert($data);
}

function getList($type){
    $tool = new Tool();
    return $tool->getList($type);
}

?>