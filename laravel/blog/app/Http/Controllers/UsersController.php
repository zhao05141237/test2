<?php

namespace App\Http\Controllers;

use App\Contracts\SmsSenderContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class UsersController extends Controller
{
    public function registerSms(SmsSenderContract $smsSender)
    {
        $smsSender->sender('111111111','122233333');
    }

    public function cache(){
//        $key = 'abc:user:id:test';

        Redis::pipeline(function ($pipe) {
            for ($i = 0; $i < 1000; $i++) {
                $pipe->set("key:$i", $i);
            }
        });

        echo "ok";

//        $value = Redis::smembers($key);
//        var_dump($value);
    }
}
