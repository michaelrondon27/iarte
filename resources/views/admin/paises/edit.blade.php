<div class="box-body ocultar" id="cuadro2">
  <div class="form-group col-sm-8 col-sm-offset-2">
    <h2>Editar País</h2>
    @include('template.partials.required')
  </div>
  {!! Form::open(['id'=>'form_actualizar', 'role'=>'form']) !!}
    <div class="form-group col-sm-8 col-sm-offset-2">
      {!! Form::label('pais', '*País',['class'=>'pull-left']) !!}
      {!! Form::text('pais', null, ['class'=>'form-control', 'placeholder'=>'País', 'required', 'id' => 'pais_actualizar', 'onkeypress'=>'return sololetras(event)']) !!}
      {!! Form::hidden('id', null, ['id'=>'id_actualizar']) !!}
    </div>
    <div class="form-group col-sm-8 col-sm-offset-2">
      {!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
      {!! Form::button('Listado',['class'=>'btn btn-vinotinto', 'id'=>'listado_actualizar']) !!}
    </div>
  {!! Form::close() !!}
</div>