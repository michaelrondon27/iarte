<div class="box-body ocultar" id="cuadro6">
  <div class="form-group col-sm-8 col-sm-offset-2">
    <h2>Editar Directivo</h2>
    @include('template.partials.required')
  </div>
  {!! Form::open(['id'=>'form_actualizar_directivo', 'role'=>'form', 'files'=>true, 'name'=>'form_actualizar_directivo', 'method'=>'PUT']) !!}
    <div class="form-group col-sm-8 col-sm-offset-2">
      {!! Form::label('nombre', '*Nombre',['class'=>'pull-left']) !!}
      {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre', 'required', 'id' => 'nombre_actualizar_directivo', 'onkeypress'=>'return sololetras(event)']) !!}
    </div>
    <div class="form-group col-sm-8 col-sm-offset-2">
            {!! Form::label('foto', 'Foto', ['class'=>'pull-left negrita']) !!}
            {!! Form::file('foto', ['class'=>'form-control', 'id'=>'foto_actualizar_directivo']) !!}
        </div>
        <div class="form-group col-sm-8 col-sm-offset-2">
            {!! Form::label('cargo_id', 'Cargo', ['class'=>'pull-left negrita']) !!}
            {!! Form::select('cargo_id', $cargos, null, ['class'=>'form-control select', 'id'=>'cargo_actualizar', 'placeholder'=>'Seleccione una opción',]) !!}
        </div>
        {{ Form::text('id', null, ['id'=>'id_directivo', 'class'=>'ocultar']) }}
    <div class="form-group col-sm-8 col-sm-offset-2">
      {!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
      {!! Form::button('Listado',['class'=>'btn btn-vinotinto', 'id'=>'listado_actualizar_directivo']) !!}
    </div>
  {!! Form::close() !!}
</div>