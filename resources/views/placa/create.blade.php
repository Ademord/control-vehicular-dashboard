@extends('layouts.default')
@section('content')
	<div class="page-header">
    <h1>Nueva Matricula</h1>
	</div>
  
  @include('placa.partials._session')

  {!! Form::open(array('route' => ['miembro.placa.store', $propietario->id])) !!}
    @include('placa.partials._form')
  {!! Form::close() !!}
@stop
