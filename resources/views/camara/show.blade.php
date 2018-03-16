@extends('layouts.default')
@section('content')
  <div class="page-header col-xl-6 col-lg-6 col-md-6 col-xs-6">
    <h1>Camara</h1>
  </div>
  <div class="page-header col-xl-6 col-lg-6 col-md-6 col-xs-6">
    <a href="{{{ route('camara.conectar', ['id' => $model->id]) }}}" class="btn btn-xs btn-outline-info">
      <span class="glyphicon glyphicon-remove"></span>
      Conectar
    </a>
  </div>
  <div class="col-lg-7" style="padding: 0;">
    <p>
      <strong>IP:</strong> {{{$model->ip}}} <br>
      <strong>Lugar:</strong> {{{$lugar_nombre}}}
    </p>
    

    
  </div>
  <div class="page-header col-xl-6 col-lg-6 col-md-6 col-xs-6">
  {!! link_to_route('camara.index', 'Volver', null, ['class' => 'btn btn-secondary floaty-left']) !!}
  </div>
  <div class="page-header col-xl-6 col-lg-6 col-md-6 col-xs-6">
  {!! Form::open([  'method'  => 'DELETE', 
                    'route' => ['camara.destroy', $model->id] ]) !!}
  {!! Form::submit( 'Eliminar', ['class' => 'btn btn-danger']) !!}
  {!! Form::close() !!}
  </div>
@stop
