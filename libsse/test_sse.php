<?php
require_once "vendor/autoload.php";
//header('Access-Control-Allow-Origin:*');
use Sse\Event;
use Sse\SSE;

//create the event handler
class YourEventHandler implements Event {
    public function update(){
        //Here's the place to send data
        return 'Hello, world!';
    }

    public function check(){
        //Here's the place to check when the data needs update
        $redis = new Redis();

        $redis->connect('127.0.0.1');

        if($redis->get('abcde') == 1){
            return true;
        }else{
            return false;
        }

    }
}
$sse = new SSE(); //create a libSSE instance

//$sse->exec_limit = 10; //the execution time of the loop in seconds. Default: 600. Set to 0 to allow the script to run as long as possible.
//$sse->sleep_time = 1; //The time to sleep after the data has been sent in seconds. Default: 0.5.
//$sse->client_reconnect = 10; //the time for the client to reconnect after the connection has lost in seconds. Default: 1.
//$sse->use_chunked_encodung = true; //Use chunked encoding. Some server may get problems with this and it defaults to false
//$sse->keep_alive_time = 600; //The interval of sending a signal to keep the connection alive. Default: 300 seconds.
$sse->allow_cors = true; //Allow cross-domain access? Default: false. If you want others to access this must set to true.


$sse->addEventListener('event_name', new YourEventHandler());//register your event handler
$sse->start();//start the event loop