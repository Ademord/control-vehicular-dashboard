
{!! Form::open(['method'=>'GET','url'=>$url,'class'=>'form-inline float-lg-right','role'=>'search'])  !!}
	{!! Form::input('search', 'q', null, ['class' => 'form-control', 'placeholder' => 'Buscar...']) !!}
    <button class="btn btn-outline-success" type="submit">Buscar</button>
{!! Form::close() !!}

