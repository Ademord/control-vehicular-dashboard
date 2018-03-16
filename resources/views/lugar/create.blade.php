@extends('layouts.default')
@section('content')
	<div class="page-header">
    <h1>Nuevo Lugar</h1>
	</div>

  @include('lugar.partials._form_errors')

  {!! Form::open(array('route' => 'lugar.store')) !!}
    @include('lugar.partials._form')
  {!! Form::close() !!}
@stop
