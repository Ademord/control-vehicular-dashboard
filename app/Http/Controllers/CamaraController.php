<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UpdateCameraRequest;
use App\Http\Controllers\Controller;
use App\Lugar;
use App\Camara;
use DB;
use Validator;
use App\Recolector;
class CamaraController extends Controller
{
    public function index()
    {
        $query = \Request::get('q');
        $client = new Camara();
        $data = $query
                ? $client->find($query)
                : $client->getAll();
        // $model = $data[0];
        // return $client->lugar_nombre($model->lugar_id);
        return view('camara.index', compact('data', 'client'));
    }

    public function create()
    {
        $model = new Lugar();
        $lugares = $model->getAll();
        $lugares = collect($lugares)->pluck('nombre', 'id')->all();
        return view('camara.create', compact('lugares'));
    }

    public function store(Request $request)
    {
        $model = new Camara();
        $data = $request->except('_token');
        $response = $model->store($data);
        return redirect('camara')->with('message','Camara creada exitosamente!');
    }

    public function show($id)
    {
        $cliente_camara = new Camara();
        $model = $cliente_camara->get($id);
        $cliente_lugar = new Lugar();
        $lugar_nombre = $cliente_lugar->get($model->lugar_id)->nombre;
        return view('camara.show', compact('model', 'lugar_nombre'));
    }

    /* conectar una IP para iniciar proceso de recoleccion de cuadros */
    public function conectar($id)
    {
        $cliente_camara = new Camara();                         // nuevo cliente para conectarse al servicio
        $model = $cliente_camara->get($id);                     // obtener datos de la entidad
        $cliente_recolector = new Recolector();                 // nuevo cliente para conectarse al servicio
        $cliente_recolector->solicitarIP($model->ip);           // enviar solicitud, con datos
        return redirect('camara')->with('message','Camara conectada exitosamente!'); // retornar vista
    }

    public function edit($id)
    {
        $cliente_camara = new Camara();
        $model = $cliente_camara->get($id);
        
        $cliente_lugar = new Lugar();
        $lugares = $cliente_lugar->getAll();
        $lugares = collect($lugares)->pluck('nombre', 'id')->all();
        
        $default = null;
        return view('camara.edit', compact('lugares', 'default'))->withModel($model);;
    }

    public function update(Request $request, $id)
    {
        $data = $request->only('ip', 'lugar_id');
        $cliente = new Camara();
        $response = $cliente->update($id, $data);
        return redirect('camara')->with('message','Camara actualizada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = new Camara();
        $cliente->delete($id);

        return redirect('camara')->with('message','Camara eliminada exitosamente!');
    }
}
