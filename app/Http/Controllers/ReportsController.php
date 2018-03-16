<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Coincidencia;
use DB;

class ReportsController extends Controller
{
    public function coincidenciasPorLugar(){
        $cliente = new Coincidencia();
        $lugar = 0;
        $cantidad = 1;

        $x_labels = array();
        $desconocidos = array();
        $dataset = $cliente->getCountKnownByPlace();
        foreach ($dataset as $data){
            array_push($x_labels, $data[$lugar]);
            array_push($desconocidos, $data[$cantidad]);
        }

        $propietarios = array();
        $dataset = $cliente->getCountUnknownByPlace();
        foreach ($dataset as $data){
            array_push($propietarios, $data[$cantidad]);
        }
        return view('reportes.matriculas-lugar', compact('x_labels', 'desconocidos', 'propietarios'));
    }

    public function coincidenciasPorPropietario(){
        $cliente = new Coincidencia();
        $fecha = 0;
        $cantidad = 1;

        $x_labels = array();
        $desconocidos = array();
        $dataset = $cliente->getDateCountUnknown();
        foreach ($dataset as $data){
            array_push($x_labels, $data[$fecha]);
            array_push($desconocidos, $data[$cantidad]);

        $propietarios = array();
        $dataset = $cliente->getDateCountKnown();
        }foreach ($dataset as $data){
            array_push($propietarios, $data[$cantidad]);
        }
        return view('reportes.matriculas-propietario', compact('x_labels', 'desconocidos', 'propietarios'));
    }
    public function fakeCoincidencias(){
        $query = "";
        for( $i = 0; $i<1500; $i++ ) {
            // Iniciar Parametros Aleatorios
            $lugares = array("ENTRADA1", "ENTRADA2", "ENTR ADA3", "SALIDA1", "SALIDA2", "SALIDA3");
            $fake_lugar_key = array_rand($lugares, 1);
            $fake_lugar = $lugares[$fake_lugar_key];

            $matriculas = array("1950HAX", "2005XPL", "2017TLR", "1992DML", "1444MRL", "1753PAF");
            $fake_matricula_key = array_rand($matriculas, 1);
            $fake_matricula = $matriculas[$fake_matricula_key];

            $propietarios = array("Manuel Ramirez", "Desconocido", "Gabriel Marquez");
            $fake_propietario_key = array_rand($propietarios, 1);
            $fake_propietario = $propietarios[$fake_propietario_key];

            // Obtener Plantilla de Consulta Insertar
            $path = public_path('insert_coincidencia.txt');
            $template= file_get_contents($path);

            // Modificar Plantilla
            $template = str_replace('{fake_lugar}', "'" . $fake_lugar . "'", $template);
            $template = str_replace('{fake_matricula}', "'". $fake_matricula . "'", $template);
            $template = str_replace('{fake_propietario}', "'" . $fake_propietario . "'", $template);
            $query = $query . $template;
        }
        $data = ["query" => $query];
        // Ejecutar SQL
        $cliente = new Coincidencia();
        $cliente->URI = $cliente->URI . 'query';
        $cliente->store($data);
        return redirect()->route('home_path')->with('message','Base de Datos (coincidencias) poblada exitosamente!');
    }

    public function fakePropietarios(){
        $query = "";
        for( $i = 0; $i<5; $i++ ) {
            // Iniciar Parametros Aleatorios
            $nombres = array("Juan", "Pedro", "Melanie", "Jose", "Charles", "David", "Manuel", "Eric", "Maria", "Naomi", "Rosa", "Esther");
            $fake_nombres_key = array_rand($nombres, 1);
            $fake_nombres = $nombres[$fake_nombres_key];

            $apellidos= array("Ramirez", "Marquez", "Rodriguez", "Pereira", "Sanchez", "Martinez", "Estrada", "Snow", "Jimenez", "Walther", "Di Napoli");
            $fake_apellidos_key = array_rand($apellidos, 1);
            $fake_apellidos = $apellidos[$fake_apellidos_key];

            // Obtener Plantilla de Consulta Insertar
            $path = public_path('insert_propietario.txt');
            $template= file_get_contents($path);

            // Modificar Plantilla
            $template = str_replace('{fake_nombres}', "'" . $fake_nombres . "'", $template);
            $template = str_replace('{fake_apellidos}', "'". $fake_apellidos . "'", $template);
            $query = $query . $template;
        }
        $data = ["query" => $query];
        // Ejecutar SQL
        $cliente = new Coincidencia();
        $cliente->URI = $cliente->URI . 'query';
        $cliente->store($data);
        return redirect()->route('home_path')->with('message','Base de Datos (propietarios) poblada exitosamente!');
    }

    public function emptyDatabase(){
        $query = "SELECT truncate_tables('homestead');";
        $data = ["query" => $query];
        // Ejecutar SQL
        $cliente = new Coincidencia();
        $cliente->URI = $cliente->URI . 'query';
        $cliente->store($data);
        return redirect()->route('home_path')->with('message','Base de Datos vaciada exitosamente!');
    }

}
