<div class="col-lg-7">
  <div class="form-group">
    
    {!! Form::label('ip', 'IP', ['for' => 'ip']) !!}
    <div class="input-group">
      {!! Form::text('ip', null , [
                    'class' => 'form-control', 
                    'name' => 'ip',
                    'placeholder' => 'xxx.xxx.xxx.xxx',
                    'required' => 'required'
                    ]) 
      !!}
      <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
      
    </div>
    
    {!! Form::label('lugar_id', 'Lugar') !!}
    <div class="input-group">
      {!! Form::select('lugar_id', $lugares, null, ['class' => 'form-control'] ) !!}
      <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
    </div>
  </div>
  {!! link_to_route('camara.index', 'Cancelar', null, ['class' => 'btn btn-danger']) !!}
  {!! Form::submit('Guardar', [
                    'class' => 'btn btn-info pull-right', 
                    'id' => 'guardar', 
                    'required' => 'required']) 
  !!}
</div>