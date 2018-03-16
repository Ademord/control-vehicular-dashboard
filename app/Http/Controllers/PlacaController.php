<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Matricula;
use App\Propietario;
use DB;
use Validator;


class PlacaController extends Controller
{
    public function create($miembro_id)
    {
        $model = new Propietario();
        $propietario = $model->get($miembro_id);
        return view('placa.create', compact('propietario'));
    }
    
    public function store(Request $request, $miembro_id)
    {
        // $rules = [
        //       'numero' => 'required|unique:matriculas'
        // ];
              
        // $messages = [ 
        //   'required' => 'Un :attribute es requerido',
        //   'unique' => 'Ese :attribute ya esta en uso',
        // ];
        
        // $validator = Validator::make($request->all(), $rules, $messages);
        
        // if ($validator->fails()) {
        //     return redirect('miembro/'. $miembro_id . '/placa/create')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }
        $model = new Propietario();
        $propietario = $model->get($miembro_id);

        $data = $request->except('_token');
        $model = new Matricula();
        $data['propietario_id'] = $propietario->id;
        $response = $model->store($data);
        return redirect()->action('MiembroController@show', [$miembro_id])->with('message','Placa creada exitosamente!');
    }

    public function edit($miembro_id, $id)
    {
        $model = new Propietario();
        $propietario = $model->get($miembro_id);

        $model = new Matricula();
        $model = $model->get($id);

        return view('placa.edit', compact('propietario', 'model'));
    }

    public function show($miembro_id, $id)
    {
        $model = new Propietario();
        $propietario = $model->get($miembro_id);

        $model = new Matricula();
        $model = $model->get($id);
        return view('placa.show', compact('propietario', 'model'));
    }
    
    public function update(Request $request, $miembro_id, $id)
    {
        // $rules = [
        //       'numero' => 'required'
        // ];
              
        // $messages = [ 
        //   'required' => 'Un :attribute es requerido',
        //   'unique' => 'Ese :attribute ya esta en uso',
        // ];
        
        // $validator = Validator::make($request->all(), $rules, $messages);
        
        // if ($validator->fails()) {
        //     return redirect()->action('PlacaController@edit', [$miembro_id, $id])
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }
        $model = new Propietario();
        $propietario = $model->get($miembro_id);

        $data = $request->except('_token');
        $model = new Matricula();
        $data['propietario_id'] = $propietario->id;
        $response = $model->update($id, $data);
        
        return redirect()->action('MiembroController@show', [$miembro_id])->with('message','Placa actualizada exitosamente!');
    }

    public function destroy($miembro_id, $id)
    {
        $model = new Matricula();
        $model->delete($id);
        return redirect()->action('MiembroController@show', [$miembro_id])->with('message','Placa eliminada exitosamente!');
    }
}
