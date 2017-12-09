<?php
/**
 * Created by PhpStorm.
 * User: qi.zhao
 * Date: 2017/12/9
 * Time: 13:01
 */

// 类未定义时，系统自动调用
function __autoload($class)
{
    /* 具体处理逻辑 */
    echo 'autoclass:'.$class.PHP_EOL;// 简单的输出未定义的类名
    require  $class.'.class.php';
}

$hello = new HelloWorld();
$hello->abc();

$helle = new HelloWorld();
$hello->abc();

/**
 * 输出 HelloWorld 与报错信息
 * Fatal error: Class 'HelloWorld' not found
 */