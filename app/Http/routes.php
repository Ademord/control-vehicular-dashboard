<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'home_path', 'uses' => function () {
    return view('welcome');
}]);

Route::get('camara/conectar/{id}', [
	'as' => 'camara.conectar', 'uses' => 'CamaraController@conectar']);

Route::resource('lugar', 'LugarController');
Route::resource('camara', 'CamaraController');
Route::resource('miembro', 'MiembroController', ['except' => ['edit', 'destroy', 'create', 'update', 'store'] ]);
Route::resource('miembro.placa', 'PlacaController', ['except' => ['index'] ]);
Route::resource('matricula', 'MatriculaController');
Route::get('matricula/get/{filename}', [
	'as' => 'getentry', 'uses' => 'MatriculaController@get']);

Route::get('/db', function(){
	return DB::table('lugar')->insertGetId(['nombre' => 'UPSA2']);
});

Route::get('/reportes/coincidencias/lugar', 'ReportsController@coincidenciasPorLugar');
Route::get('/reportes/coincidencias/propietario', 'ReportsController@coincidenciasPorPropietario');
Route::get('/reportes/fake-coincidencias', ['as' => 'reportes.fake_coincidencias', 'uses' => 'ReportsController@fakeCoincidencias']);
Route::get('/reportes/fake-propietarios', ['as' => 'reportes.fake_propietarios', 'uses' => 'ReportsController@fakePropietarios']);
Route::get('/reportes/empty-database', ['as' => 'reportes.empty_database', 'uses' => 'ReportsController@emptyDatabase']);


Route::get('/recolector/imagen', ['as' => 'recolector.imagen', 'uses' => 'RecolectorController@solicitarImagen']);
Route::get('/recolector/video', ['as' => 'recolector.video', 'uses' => 'RecolectorController@solicitarVideo']);
//Route::post('/recolector/upload', ['as' => 'recolector.upload', 'uses' => 'RecolectorController@postUpload']);
Route::post('recolector/upload', ['as'=>'recolector.upload','uses'=>'RecolectorController@postUpload']);


