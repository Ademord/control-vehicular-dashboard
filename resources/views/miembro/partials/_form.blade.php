<div class="col-lg-7">
  <div class="form-group">
    {!! Form::label('nombre', 'Nombre', ['for' => 'nombre']) !!}
    <div class="input-group">
      {!! Form::text('nombre', null , [
                    'class' => 'form-control', 
                    'name' => 'nombre',
                    'id' => 'nombre', 
                    'placeholder' => 'Ingresar Nombre',
                    'required' => 'required'
                    ]) 
      !!}
      <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
    </div>
  </div>
  {!! link_to_route('lugar.index', 'Cancelar', null, ['class' => 'btn btn-danger']) !!}
  {!! Form::submit('Guardar', [
                    'class' => 'btn btn-info pull-right', 
                    'id' => 'guardar', 
                    'placeholder' => 'Ingresar Nombre',
                    'required' => 'required']) 
  !!}
</div>