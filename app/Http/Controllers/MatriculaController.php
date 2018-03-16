<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Http\Requests\CreateMatriculaRequest;
use App\Http\Requests\UpdateMatriculaRequest;
use App\Coincidencia;
use DB;
use Illuminate\Http\Response;


class MatriculaController extends Controller
{

    public function index()
    {
        $query = \Request::get('q');
        $model = new Coincidencia();
        $data = $query
                ? $model->find($query)
                : $model->getAll();
        $columns = ['Camara', 'Lugar', 'Matricula', 'Miembro', 'Fecha'];
        return view('matricula.index', compact('data', 'columns'));
    }

    public function get($filename)
    {
        return response()->download(storage_path("media/frames/{$filename}"));
        $file = Storage::disk('public')->get('media/frames/' . $filename);

        $response = response($file, 200, [
            'Content-Type' => 'image/png',
            'Content-Description' => 'File Transfer',
            'Content-Disposition' => "attachment; filename={$filename}",
            'Content-Transfer-Encoding' => 'binary',
        ]);

        ob_end_clean(); // <- this is important

        return $response;
    }

    public function requestHasFilefield($request)
    {
        return $request->hasFile('filefield')
            && $request->file('filefield')->isValid()
            && ($request->file('filefield')->getError() == UPLOAD_ERR_OK);
    }

    public function show($id)
    {
        $cliente = new Coincidencia();
        $model = $cliente->get($id);
        $URI = $cliente->URI;
        $path = 'http://192.168.99.100:30369/matricula/get/' . $model->filename;
        // return $path;
        return view('matricula.show', compact('path'))->withModel($model);
    }

    public function destroy($id)
    {
        $model = new Coincidencia();
        $model ->delete($id);

        return redirect('matricula')->with('message','Matricula eliminado exitosamente!');
    }


}
