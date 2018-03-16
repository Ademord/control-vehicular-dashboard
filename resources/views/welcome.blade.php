@extends('layouts.default')
@section('content')
    @if (session('message'))
    <div class="alert alert-success col-xl-12 col-lg-12 col-md-12 col-xs-12">
        {{ session('message') }}
    </div>
    @endif
    <div class="row">
        <div class="col-lg-6 col-md-12 col-xs-12">
            <h2>Grafica</h2>
            <canvas id="chart0" style="width:600px;height:320px"></canvas>
        </div>
        <div class="col-lg-6 col-md-12 col-xs-12">
            <h2>Matriculas (TR)</h2>

<!--            <table class="table the-table" style="margin-bottom:0; text-align: left">-->
<!--                  <tr>-->
<!--                    <td>No hay registros.</td>-->
<!--                  </tr>-->
<!--            </table>-->
<!--            <th>Camara</th>-->
<!--            <th>Lugar</th>-->
<!--            <th>Matricula</th>-->
<!--            <th>Miembro</th>-->

            <div id="records">
                
            </div>
        </div>
    </div> 


    <div class="row">
        <div id="dropzone">
            <h2>Reconocer Archivos</h2>
            {!! Form::open([ 'route' => [ 'recolector.upload' ], 'files' => true,
            'enctype' => 'multipart/form-data', 'class' => 'dropzone needsclick', 'id' => 'image-upload' ]) !!}
            <div class="dz-message needsclick">
                Arrastre y suelte los archivos a subir aquí<br />
            </div>
            {!! Form::close() !!}

        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.2.6/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.3/socket.io.min.js"></script>
    <script src="https://playground.abysscorp.org/chartjs/livecharts/dist/Chart.min.js"></script>
    <!-- <script src="{{ asset('js/vendor/chart.min.js') }}"></script> -->
    <script src="{{ asset('js/matriculas.js') }}"></script>
    <script src="{{ asset('js/livechart.js') }}"></script>
    <script type="text/javascript">
        $(document).one('ready', function() {
            var new_item = $('<div>');
            var table = $('<table>').addClass('table', 'the-table').css('margin-bottom', 0);
            $('<colgroup>').append($('col')).appendTo(table);
            $('<tr>').
            append($('<td>').text('No hay registros')).appendTo(table);
            table.appendTo(new_item)
            new_item.hide().addClass('flash').prependTo('#records').slideDown('slow');

            var $articleCount = $('#records').children().length;
            while ($articleCount > 8) {
                $('#records').children().last().remove();
                $articleCount = $('#records').children().length;
            }
        });
    </script>
    <script type="text/javascript">
        window.onload = function() {
            initialize();
            var socket = io('192.168.99.100:30370');
            socket.on('test-channel:PlateRegistered', function(msg){
                addMatricula(msg);
            });
            socket.on('test-channel:liveChartUpdate', function(msg){
                advanceLiveChart(msg);
            });
        };
    </script>
    <script type="text/javascript">
        Dropzone.options.imageUpload = {
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.avi,.mp4"
        };
    </script>

@stop