@extends('layouts.default')
@section('content')
	<div class="page-header">
		<h1>Propietario</h1>
	</div>
  <div class="col-lg-7">
    <p>
      <strong>Nombres:</strong> {{{$model->nombres}}}<br>
      <strong>Apellidos:</strong> {{{$model->apellidos}}}<br>
      <strong>Codigo Administrativo:</strong> {{{$model->codigo}}}
    </p>
    @include('miembro.partials._session')
    <div class="panel panel-default with-table">

      <h2>Matriculas
        <a href="{{{ Request::url() }}}/placa/create" class="btn btn-outline-primary"><span class="glyphicon glyphicon-plus"></span> Nuevo</a>
      </h2>
      <div class="table-responsive">
        <table class="table">
          <thead class="hideme">
            <tr>
              <th>Matriculas</th>
              <th width="90%"><!-- spacer --></th>
              <th><!-- actions --></th>
            </tr>
          </thead>
          <tbody>
          @if (!count($matriculas))
            <tr>
              <td colspan="{{{1 + 2}}}">No existen matriculas registradas.</td>
            </tr>
          @endif
          @foreach ($matriculas as $placa)
            <tr>
              <td>{{{$placa->numero}}}</td>
              <td><!-- spacer --></td>
    
              <td class="actions">
                <a href="{{{ route('miembro.placa.show', [$model->id, $placa->id]) }}}" class="btn btn-xs btn-outline-info">
                  <span class="glyphicon glyphicon-remove"></span>
                  Detalles
                </a>
                
                <a href="{{{ route('miembro.placa.edit', [$model->id, $placa->id]) }}}" class="btn btn-xs btn-outline-warning">
                  <span class="glyphicon glyphicon-pencil"></span>
                  Modificar
                </a>
                
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
     {!! link_to_route('miembro.index', 'Volver', null, ['class' => 'btn btn-secondary floaty-left']) !!}
    </div>
  </div>
@stop
