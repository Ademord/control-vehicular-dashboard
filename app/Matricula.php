<?php

namespace App;

use App\Modelo;

class Matricula extends Modelo
{
    protected $SVC_NAME = 'MATRICULA_EP';
	public function find_propietario($id)
	{
        return json_decode($this->client->get($this->URI . "propietario/" . $id)->getBody()->getContents());

	}
}
