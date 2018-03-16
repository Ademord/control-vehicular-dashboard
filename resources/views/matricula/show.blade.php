@extends('layouts.default')
@section('content')
	<div class="page-header">
		<h1>Matricula de Coincidencia</h1>
	</div>
  <div class="col-lg-7">
    <p>
      <strong>{!! Form::label('fecha', 'Fecha: ') !!}</strong>
      {{{$model->created_at}}} 
      <br>
      <strong>{!! Form::label('camara', 'Camara: ') !!}</strong>
      {{{$model->camara}}} 
      <br>
      <strong>{!! Form::label('lugar', 'Lugar: ') !!}</strong>
      {{{$model->lugar}}} 
      <br>
      <strong>{!! Form::label('matricula', 'Matricula: ') !!}</strong>
      {{{$model->matricula}}} 
      <br>
      <strong>{!! Form::label('propietario', 'Propietario: ') !!}</strong>
      {{{$model->propietario}}}
      <br>
      <strong>{!! Form::label('filefield', 'Imagen: ') !!}</strong>
      <div class="input-group">
        <span class="input-group-addon">
          <a href="{{$path}}" target="_blank">
            <img zoom="50%" border="0" align="center"  src="{{$path}}"/>
          </a>
        </span>
      </div>
    </p>
    
    {!! link_to_route('matricula.index', 'Volver', null, ['class' => 'btn btn-secondary floaty-left']) !!}
    
    {!! Form::open([  'method'  => 'DELETE', 
                      'route' => ['matricula.destroy', $model->id],
                      'class' => 'pull-right']) !!}
      {!! Form::submit(
                'Eliminar', 
                ['class' => 'btn btn-danger floaty-right']) !!}
    {!! Form::close() !!}
  </div>
@stop
