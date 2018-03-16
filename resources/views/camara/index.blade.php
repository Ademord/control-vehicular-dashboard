@extends('layouts.default')
@section('content')
	<div class="page-header col-xl-12 col-lg-12 col-md-12 col-xs-12">
		<div class="col-xl-2 col-lg-3 col-md-3 col-xs-5"><h1>Camaras</h1></div>
    <div class="col-xl-4 col-md-3 col-xs-7">
      @include('includes.create_button')
    </div>      
    <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
      @include('includes.search',['url'=>'camara'])
    </div>  
  </div>
  @if (session('message'))
      <div class="alert alert-success col-xl-12 col-lg-12 col-md-12 col-xs-12">
          {{ session('message') }}
      </div>
  @endif
  <div class="panel panel-default with-table">
    <table class="table sin-wrap">
      @if (count($data))
      <thead>
        <tr>
          <th>IP</th>
          <th>Lugar</th>
          <th width="90%"><!-- spacer --></th>
          <th><!-- actions --></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $model)
          <tr>
            <td>{{{$model->ip}}}</td>
            <td>{{{$client->lugar_nombre($model->lugar_id)}}}</td>
            <td><!-- spacer --></td>

            <td class="actions">
              <a href="{{{ route('camara.show', ['id' => $model->id]) }}}" class="btn btn-xs btn-outline-info">
                <span class="glyphicon glyphicon-remove"></span>
                Detalles
              </a>
              
              <a href="{{{ route('camara.edit', ['id' => $model->id]) }}}" class="btn btn-xs btn-outline-warning">
                <span class="glyphicon glyphicon-pencil"></span>
                Modificar
              </a>
              
            </td>
          </tr>
        @endforeach
      @else
        <tr>
          <td>No hay registros.</td>
        </tr>
      @endif
      </tbody>
    </table>
  </div>
@stop
