<div class="box-body ocultar" id="cuadro2">
  <div class="form-group col-sm-8 col-sm-offset-2">
    <h2>Editar Cargo</h2>
    @include('template.partials.required')
  </div>
  {!! Form::open(['id'=>'form_actualizar', 'role'=>'form']) !!}
    <div class="form-group col-sm-8 col-sm-offset-2">
      {!! Form::label('cargo', '*Cargo',['class'=>'pull-left']) !!}
      {!! Form::text('cargo', null, ['class'=>'form-control', 'placeholder'=>'Cargo', 'required', 'id' => 'cargo_actualizar', 'onkeypress'=>'return sololetras(event)']) !!}
      {!! Form::hidden('id', null, ['id'=>'id_actualizar']) !!}
    </div>
    <div class="form-group col-sm-8 col-sm-offset-2">
      {!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
      {!! Form::button('Listado',['class'=>'btn btn-vinotinto', 'id'=>'listado_actualizar']) !!}
    </div>
  {!! Form::close() !!}
</div>