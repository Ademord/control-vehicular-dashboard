<?php

namespace App;

use App\Modelo;

class Coincidencia extends Modelo
{
    // public $URI = 'http://afe5442b319e311e7b5e50240b9fc56e-1181552982.eu-central-1.elb.amazonaws.com/';
    protected $SVC_NAME = 'COINCIDENCIA_EP';
        
	public function getCountByPlace()
	{
        return json_decode($this->client->get($this->URI . 'count/place')->getBody()->getContents());
	}
	public function getCountKnownByPlace()
	{
        return json_decode($this->client->get($this->URI . 'count/propietarios/lugar')->getBody()->getContents());
	}
	public function getCountUnknownByPlace()
	{
        return json_decode($this->client->get($this->URI . 'count/desconocidos/lugar')->getBody()->getContents());
	}
	public function getCountKnown()
	{
        return json_decode($this->client->get($this->URI . 'count/propietarios')->getBody()->getContents());
	}
	public function getCountUnknown()
	{
        return json_decode($this->client->get($this->URI . 'count/desconocidos')->getBody()->getContents());
	}
	public function getDateCountKnown()
	{
        return json_decode($this->client->get($this->URI . 'date-count/propietarios')->getBody()->getContents());
	}
	public function getDateCountUnknown()
	{
        return json_decode($this->client->get($this->URI . 'date-count/desconocidos')->getBody()->getContents());
	}
}
