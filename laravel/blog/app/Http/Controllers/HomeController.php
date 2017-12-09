<?php

namespace App\Http\Controllers;

use Core\Http\Response;
use Illuminate\Http\Request;
use App\Article;
use Sse\SSE;
use Sse\Event;
use Sse\Data;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        throw new \Exception("我故意的", 1);
        return view('home')->withArticles(Article::all());
    }


    public function sse(SSE $sse)
    {
// Add your event listener
        $sse->addEventListener('event_name',new TimeEvent());

        return $sse->createResponse();
    }

    public function recv()
    {
        $data = new Data('redis', array('server' => '127.0.0.1'));

        // This is a new user
        if(isset($_POST['user']) && !isset($_POST['message'])) {
            // The libSSE data instance is a key-value storage.
            // It works like an associative array, just the data
            // is shared across scripts.
            $data->set('user', json_encode(array(
                    'msg' => htmlentities($_POST['user']),
                    'time' => time()
                )
            ));
        } elseif(isset($_POST['message'], $_POST['user'])) { // This is a new message
            $data->set('message', json_encode(
                array(
                    'msg' => htmlentities($_POST['message']),
                    'time' => time(),
                    'user' => $_POST['user']
                )
            ));
        }
    }


    public function chat(){
        return view('chat');
    }

    public function send(SSE $sse)
    {
        $data = new Data('redis', array('server' => '127.0.0.1'));

        if($data->get('num') > 10){
            return response('oh something has wrong', 204)
                ->header('Content-Type', 'text/event-stream')
                ->header('Cache-Control','no-cache')->header('X-Accel-Buffering','no');
        }
        $sse->addEventListener('user', new LatestUser($data));
        $sse->addEventListener('message', new LatestMessage($data));

        return $sse->createResponse();
    }
}

class TimeEvent implements Event{

    public function check()
    {
        return true;
        // TODO: Implement check() method.
    }

    public function update(){
        return date('l, F jS, Y, h:i:s A');
    }
}


// This event handler checks for new users and broadcast
// the message to all clients.
class LatestUser implements Event {
    private $cache = 0;
    private $data;
    private $storage;

    public function __construct($data) {
        $this->storage = $data;
    }

    public function update(){
        return $this->data->msg;
    }

    public function check(){
        // Fetch data from the data instance
        $this->data = json_decode($this->storage->get('user'));

        // And check if it's a new message by comparing its time
        if($this->data->time !== $this->cache){
            $this->cache = $this->data->time;
            return true;
        }

        return false;
    }
};

// This event handler checks for new messages and broadcast
// it to other clients.
class LatestMessage implements Event {
    private $cache = 0;
    private $data;
    private $storage;

    public function __construct($data) {
        $this->storage = $data;
    }

    public function update(){
        return json_encode($this->data);
    }

    public function check(){
        // Fetch data from the data instance
        $this->data = json_decode($this->storage->get('message'));

        // Check if this connection is a reconnect. If it is, just
        // record last message's time to prevent repeatly sending messages
        if($this->cache == 0 ){
            $this->cache = $this->data->time;
            return false;
        }

        if($this->data->time !== $this->cache){
            $this->cache = $this->data->time;
            return true;
        }

        return false;
    }
};