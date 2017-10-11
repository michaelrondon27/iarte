<div class="box-body ocultar" id="cuadro12">
    <div class="box-body">
        {!! Form::open(['id'=>'form_actualizar_habilidad', 'role'=>'form', 'name'=>'form_actualizar_habilidad', 'method'=>'PUT']) !!}
            <div class="form-group col-md-12">
                {!! Form::label('habilidad', '*Título', ['class'=>'pull-left letra-blanco']) !!}
                {!! Form::text('habilidad', null, ['class'=>'form-control', 'placeholder'=>'Título', 'required', 'id'=>'titulo_habilidad_actualizar']) !!}
            </div>
            <div class="form-group col-md-12">
                {!! Form::label('descripcion', '*Descripción', ['class'=>'pull-left letra-blanco']) !!}
                {!! Form::textarea('descripcion', null, ['class'=>'form-control', 'placeholder'=>'Descripción', 'required', 'id'=>'descripcion_habilidad_actualizar']) !!}
            </div>
            {!! Form::text('id', null, ['id'=>'id_habilidad_actualizar', 'class'=>'ocultar']) !!}
            {!! Form::hidden('status_id', 3) !!}
            <div class="form-group col-md-8 col-md-offset-2">
                {!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
                {!! Form::button('Listado',['class'=>'btn btn-vinotinto', 'id'=>'listado_actualizar_habilidad']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>