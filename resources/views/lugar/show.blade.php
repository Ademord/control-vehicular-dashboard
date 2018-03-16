@extends('layouts.default')
@section('content')
	<div class="page-header">
		<h1>Lugar</h1>
	</div>
  <div class="col-lg-7">
    <p>
      <strong>Nombre:</strong> {{{$model->nombre}}}
    </p>
    
    {!! link_to_route('lugar.index', 'Volver', null, ['class' => 'btn btn-secondary floaty-left']) !!}
    {!! Form::open([  'method'  => 'DELETE', 
                      'route' => ['lugar.destroy', $model->id], 
                      'class' => '']) !!}
      {!! Form::submit(
                'Eliminar', 
                ['class' => 'btn btn-danger floaty-right']) !!}
    {!! Form::close() !!}
  </div>
@stop
