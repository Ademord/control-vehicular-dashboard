@extends('layouts.default')
@section('content')
	<div class="page-header">
		<h1>Matricula</h1>
	</div>
  <div class="col-lg-7">
    <p>
      <strong>Numero:</strong> {{{$model->numero}}} <br>
    </p>
    
    {!! link_to_route('miembro.show', 'Volver', ['id' => $propietario->id], ['class' => 'btn btn-secondary floaty-left']) !!}
    
    {!! Form::open([  'method'  => 'DELETE', 
                      'route' => ['miembro.placa.destroy', $propietario->id, $model->id], 
                      'class' => 'pull-right']) !!}
      {!! Form::submit(
                'Eliminar', 
                ['class' => 'btn btn-danger floaty-right']) !!}
    {!! Form::close() !!}
  </div>
@stop
