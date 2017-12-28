<div class="box-body ocultar" id="cuadro9">
  <div class="form-group col-sm-8 col-sm-offset-2">
    <h2>Editar Servicio</h2>
    @include('template.partials.required')
  </div>
  {!! Form::open(['id'=>'form_actualizar_servicio', 'role'=>'form', 'name'=>'form_actualizar_servicio', 'method'=>'PUT']) !!}
    <div class="form-group col-sm-12">
      {!! Form::label('servicio', '*Servicio',['class'=>'pull-left']) !!}
      {!! Form::text('servicio', null, ['class'=>'form-control', 'placeholder'=>'Servicio', 'required', 'id' => 'servicio_actualizar']) !!}
    </div>
        <div class="form-group col-sm-12">
            {!! Form::label('descripcion', '*Descripción', ['class'=>'pull-left negrita label_biografia']) !!}
            <br>
            {!! Form::textarea('descripcion', null, ['class'=>'form-control', 'id'=>'descripcion_actualizar']) !!}
        </div>
        {{ Form::text('id', null, ['id'=>'id_servicio', 'class'=>'ocultar']) }}
    <div class="form-group col-sm-8 col-sm-offset-2">
      {!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
      {!! Form::button('Listado',['class'=>'btn btn-vinotinto', 'id'=>'listado_actualizar_servicio']) !!}
    </div>
  {!! Form::close() !!}
</div>