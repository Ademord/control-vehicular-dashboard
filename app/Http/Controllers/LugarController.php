<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lugar;
use DB;
use Validator;

class LugarController extends Controller
{
    public function index()
    {
        $query = \Request::get('q');
        $model = new Lugar();
        $data = $query
                ? $model->find($query)
                : $model->getAll();
        return view('lugar.index', compact('data'));
    }

    public function create()
    {
        return view('lugar.create');
    }

    public function store(Request $request)
    {
        $rules = [
              'nombre' => 'required|unique:lugares' 
        ];
              
        $messages = [ 
          'required' => 'Un :attribute es requerido',
          'unique' => 'Ese :attribute ya esta en uso',
        ];
        
        // $validator = Validator::make($request->all(), $rules, $messages);
        
        // if ($validator->fails()) {
        //     return redirect('lugar/create')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }
        $data = $request->except('_token');
        $model = new Lugar();
        $response = $model->store($data);
        return redirect('lugar')->with('message','Lugar creado exitosamente!');
    }
    
    public function show($id)
    {
        // $model = Lugar::findOrFail($id);
        $model = new Lugar();
        $model = $model->get($id);
        return view('lugar.show')->withModel($model);
    }

    public function edit($id)
    {
        $model = new Lugar();
        $model = $model->get($id);
        return view('lugar.edit')->withModel($model);
    }

    public function update(Request $request, $id)
    {
        // $rules = [
        //       'nombre' => 'required' 
        // ];
              
        // $messages = [ 
        //   'required' => 'Un :attribute es requerido',
        //   'unique' => 'Ese :attribute ya esta en uso',
        // ];
        
        // $validator = Validator::make($request->all(), $rules, $messages);
        
        // if ($validator->fails()) {
        //     return redirect('lugar/' . $id . '/edit')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }
        
        $data = $request->only('nombre');
        $model = new Lugar();
        $response = $model->update($id, $data);
        return redirect('lugar')->with('message','Lugar actualizado exitosamente!');
    }

    public function destroy($id)
    {
        $model = new Lugar();
        $model->delete($id);
        return redirect('lugar')->with('message','Lugar eliminado exitosamente!');
    }
}
