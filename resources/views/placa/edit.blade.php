@extends('layouts.default')
@section('content')
	<div class="page-header">
		<h1>Editar Matricula</h1>
	</div>
  
  @include('placa.partials._session')

  {!! Form::model($model, array('route' => ['miembro.placa.update', $propietario->id, $model->id], 'method' => 'PUT')) !!}
    @include('placa.partials._form')
  {!! Form::close() !!}

@stop
