<?php

namespace App;

use App\Modelo;
use App\Lugar;

class Camara extends Modelo
{
    protected $SVC_NAME = 'CAMARA_EP';
    protected $fillable = array('ip', 'lugar_id');
   	public function lugar_nombre($lugar_id) { 
   		return (new Lugar())->get($lugar_id)->nombre;
   	}

}
