<?php
/**
 * Created by PhpStorm.
 * User: yunzhou.cao
 * Date: 2017/7/4
 * Time: 9:29
 */

define('BASE_DIR', realpath(__DIR__ . '/../../') . '/');
// 引入fsdk
//require_once BASE_DIR . '/../fsdk/lib/fsdk.init.php';

spl_autoload_register('FVBotAutoload::autoload', true, true);

class FVBotAutoload
{
    public static function autoload($class)
    {
        $parts = explode('\\', $class);
        $class_name = array_pop($parts);
        array_walk($parts, function(&$v){
            $v = strtolower($v);
        });
        array_push($parts, $class_name);
        $class_file = implode('/', $parts);
        // require
        require_once(BASE_DIR . $class_file . '.php');
    }
}