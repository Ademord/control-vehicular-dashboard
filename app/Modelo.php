<?php

namespace App;
use GuzzleHttp\Client;

class Modelo
{
    protected $client;
    protected $SVC_NAME = null;
    public $URI = null;
    function __construct(){
        $this->client = new Client(['headers' => [ 'Content-Type' => 'application/json' ]]);
        $this->URI = env($this->SVC_NAME, 'svc_endpoint_not_found_in_env');
    }
    public function find($query){
        return json_decode($this->client->get($this->URI . "search/" . $query)->getBody()->getContents());
    }
    public function getAll(){
        return json_decode($this->client->get($this->URI)->getBody()->getContents());
    }
    public function get($id){
        return json_decode($this->client->get($this->URI . $id)->getBody()->getContents());
    }
    public function store($data){
        return $this->client->post($this->URI, ['body' => json_encode($data)]);
    }    
    public function update($id, $data){
        return $this->client->put($this->URI . $id, ['body' => json_encode($data)]);
    }
    public function delete($id){
        return $this->client->delete($this->URI . $id);
    }
}

