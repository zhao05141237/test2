<?php
/**
 * Created by PhpStorm.
 * User: qi.zhao
 * Date: 2017/11/2
 * Time: 16:17
 */

$client = new swoole_client(SWOOLE_SOCK_TCP,SWOOLE_SOCK_SYNC);


$client->connect('127.0.0.1',9501) || exit("connect failed. Error:{$client->errCode}\n");

$client->send('Hello server');

$response = $client->recv();

echo $response.PHP_EOL;

$client->close();