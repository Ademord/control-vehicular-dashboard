@extends('layouts.default')
@section('content')
	<h1>Matriculas Observadas</h1>
	<canvas id="reporte-placas" width="600" height="300"></canvas>

	<div class="blank-space"></div>

  <div class="panel panel-default with-table">
    <table class="table table-sm">
      <thead>
        <tr>
          <th class="text-center">Fecha</th>
          <th class="text-center">Propietarios</th>
          <th class="text-center">Desconocidos</th>
        </tr>
      </thead>
      
      <tbody>
      @if (count($x_labels))
         @for ($i = 0; $i < count($x_labels); $i++)
          <tr>
            <td class="text-center">{{{$x_labels[$i]}}}</td>
            <td class="text-center">{{{$propietarios[$i]}}}</td>                    
            <td class="text-center">{{{$desconocidos[$i]}}}</td>                    
          </tr>
        @endfor
      @else
        <tr>
          <td>No hay registros.</td>
        </tr>
      @endif
       
      </tbody>
    </table>
    </div>

@stop

@section('footer')
	<script src="{{ asset('js/vendor/Chart.min.js') }}"></script>

	<script>
		$(function (){
			var ctx = document.getElementById('reporte-placas').getContext('2d');
			var chart = new Chart(ctx, {
				type: 'line',
				data: {
					labels : {!! json_encode($x_labels) !!},
					datasets: [{
						label: "Desconocidos",
						backgroundColor: "rgba(179,181,198,0.2)",
						borderColor: "rgba(179,181,198,1)",
						pointBackgroundColor: "rgba(179,181,198,1)",
						pointBorderColor: "#fff",
						pointHoverBackgroundColor: "#fff",
						pointHoverBorderColor: "rgba(179,181,198,1)",
						data: {!! json_encode($desconocidos) !!}
					},
					{
						label: 'Propietarios',
						backgroundColor: "rgba(255,99,132,0.2)",
						borderColor: "rgba(255,99,132,1)",
						pointBackgroundColor: "rgba(255,99,132,1)",
						pointBorderColor: "#fff",
						pointHoverBackgroundColor: "#fff",
						pointHoverBorderColor: "rgba(255,99,132,1)",
						data: {!! json_encode($propietarios) !!}
					}]
				}
			});
		});
	</script>
@stop
