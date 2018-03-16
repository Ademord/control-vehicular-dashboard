<?php

namespace App;
use GuzzleHttp\Client;
use  Illuminate\Support\Facades\Redis;

class Recolector
{
    protected $SVC_QUEUE = 'REDIS_RECOLECTOR_QUEUE';

    function __construct(){
        $this->QUEUE = env($this->SVC_QUEUE, 'error_queue');
    }
    public function solicitarImagen($img='image.jpg'){
        Redis::rpush('recolector_requests', 'img:' . $img);
    }
    public function solicitarVideo($vid='video1.avi'){
        Redis::rpush('recolector_requests', 'vid:' . $vid);
    }

    public function solicitarIP($ip='123.123.111'){
        Redis::rpush('recolector_requests', 'ip:' . $ip);
    }
}

