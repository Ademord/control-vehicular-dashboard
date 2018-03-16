@extends('layouts.default')
@section('content')


	<div class="page-header col-xl-12 col-lg-12 col-md-12 col-xs-12">
    <div class="col-xl-3 col-lg-4 col-md-6 col-xs-12"><h1>Matriculas</h1></div>
    <div class="col-xl-9 col-lg-8 col-md-6 col-xs-12">
      @include('includes.search',['url'=>'matricula'])
    </div>
	</div>
  @if (session('message'))
      <div class="alert alert-success col-xl-12 col-lg-12 col-md-12 col-xs-12">
          {{ session('message') }}
      </div>
  @endif
  <div class="panel panel-default with-table">
  
    <table id="records" class="table sin-wrap">
      
      @include('matricula.partials._properties')
      
      <tbody>
      @if (!count($data))
        <tr>
          <td colspan="{{{count($columns) + 2}}}">No hay registros.</td>
        </tr>
      @endif
      @foreach ($data as $model)
        @if ($model->mismatch)
          <tr class="danger">
        @else
          <tr>
        @endif

          <td>{{{$model->camara}}}</td>
          <td>{{{$model->lugar}}}</td>
          <td>{{{$model->matricula}}}</td>
          <td>{{{$model->propietario}}}</td>
          <td>{{{$model->created_at}}}</td>
          <td><!-- spacer --></td>

          <td class="actions">
            <a href="{{{ route('matricula.show', ['id' => $model->id]) }}}" class="btn btn-xs btn-outline-info">
              <span class="glyphicon glyphicon-remove"></span>
              Detalles
            </a>
            
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
    <div class="text-center">
    </div>
  </div>


@stop
