<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Propietario;
use App\Matricula;

use DB;

class MiembroController extends Controller
{
    public function index()
    {
        $query = \Request::get('q');
        $model = new Propietario();
        $data = $query
                ? $model->find($query)
                : $model->getAll();

        $cliente_matricula = new Matricula();
        return view('miembro.index', compact('data', 'cliente_matricula'));
    }

    public function show($id)
    {
        $model = new Propietario();
        $model = $model->get($id);
        $cliente_matricula = new Matricula();
        $matriculas = $cliente_matricula->find_propietario($model->id);
        return view('miembro.show', compact('model', 'matriculas'));
    }
}
