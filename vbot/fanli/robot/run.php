#!/usr/local/php5/bin/php
<?php
// Robot命名空间
namespace Fanli\Robot;

require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/../../vendor/autoload.php';

$vbot = new Robot();

$vbot->run();
