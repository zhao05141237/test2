<?php
require_once 'Core/Core.php';
\Core\Core::getInstance()->frameWorkInitialize();


$db = \Core\Component\Di::getInstance()->get('MYSQL');

$content = $db->get('tb_research_topic',1); //contains an Array of all users

var_dump($content);
