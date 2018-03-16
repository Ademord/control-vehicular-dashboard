<div class="col-lg-7">
  <div class="form-group">
    
    {!! Form::label('numero', 'Numero', ['for' => 'numero']) !!}
    <div class="input-group">
      {!! Form::text('numero', null , [
                    'class' => 'form-control', 
                    'name' => 'numero',
                    'id' => 'numero', 
                    'placeholder' => 'Ingresar numero de matricula',
                    'required' => 'required'
                    ]) 
      !!}
      <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
    </div>
  </div>
  {!! link_to_route('miembro.show', 'Cancelar', ['id' => $propietario->id], ['class' => 'btn btn-danger']) !!}
  {!! Form::submit('Guardar', [
                    'class' => 'btn btn-info pull-right', 
                    'id' => 'guardar', 
                    'required' => 'required']) 
  !!}
</div>