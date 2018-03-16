@extends('layouts.default')
@section('content')
	<div class="page-header">
		<h1>Editar Lugar</h1>
	</div>
  
  @include('lugar.partials._form_errors')

  {!! Form::model($model, array('route' => ['lugar.update', $model->id], 'method' => 'PUT')) !!}
    @include('lugar.partials._form')
  {!! Form::close() !!}

@stop
