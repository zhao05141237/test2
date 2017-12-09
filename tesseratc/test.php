<?php
/**
 * Created by PhpStorm.
 * User: qi.zhao
 * Date: 2017/11/14
 * Time: 16:32
 */

ini_set('display_errors',true);
error_reporting(E_ALL);

require "vendor/autoload.php";
var_dump((new TesseractOCR('kaka.jpg'))
    ->lang('por')->run()) ;