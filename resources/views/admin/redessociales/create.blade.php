<div class="box-body ocultar" id="cuadro1">
  <div class="form-group col-sm-8 col-sm-offset-2">
    <h2>Registrar Red Social</h2>
    @include('template.partials.required')
  </div>
  {!! Form::open(['id'=>'form_registrar', 'role'=>'form']) !!}
    <div class="form-group col-sm-8 col-sm-offset-2">
      {!! Form::label('red_social', '*Red Social',['class'=>'pull-left']) !!}
      {!! Form::text('red_social', null, ['class'=>'form-control', 'placeholder'=>'Red Social', 'required', 'id' => 'red_social_registrar', 'onkeypress'=>'return sololetras(event)']) !!}
    </div>
    <div class="form-group col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
      {!! Form::label('icon_id', '*Icono', ['class'=>'pull-left']) !!}
      {!! Form::select('icon_id', $icons, null, ['class'=>'form-control redSocial', 'required', 'id' => 'icon_id_registrar']) !!}
    </div>
    <div class="form-group col-sm-8 col-sm-offset-2">
      {!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
      {!! Form::button('Listado',['class'=>'btn btn-vinotinto', 'id'=>'listado_registrar']) !!}
    </div>
  {!! Form::close() !!}
</div>