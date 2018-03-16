@extends('layouts.default')
@section('content')
	<div class="page-header">
    <div class="col-xl-3 col-lg-4 col-md-6 col-xs-12"><h1>Propietarios</h1></div>
    <div class="col-xl-9 col-lg-8 col-md-6 col-xs-12">
      @include('includes.search',['url'=>'miembro'])
    </div>
	</div>

  <div class="panel panel-default with-table">
  
  <div class="table-responsive">
    <table class="table sin-wrap">
      <thead>
        <tr>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th width="22%">Codigo Administrativo</th>
          <th width="90%"><!-- spacer --></th>
          <th><!-- actions --></th>
        </tr>
      </thead>
      
      <tbody>
      @if (count($data))
         @foreach ($data as $model)
          <tr>
            <td>{{{$model->nombres}}}</td>
            <td>{{{$model->apellidos}}}</td>                    
            <td>{{{$model->codigo}}}</td>
            <td><!-- spacer --></td>

            <td class="actions">
              <a href="{{{ route('miembro.show', ['id' => $model->id]) }}}" class="btn btn-xs btn-outline-info">
                <span class="glyphicon glyphicon-remove"></span>
                Detalles
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
