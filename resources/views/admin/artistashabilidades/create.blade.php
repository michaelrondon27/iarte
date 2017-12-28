<div class="box-body ocultar" id="cuadro11" style="background-color: rgba(255, 255, 255, 0.2); border-radius: 10px;">
    <div class="box-body">
        {!! Form::open(['id'=>'form_registrar_habilidad', 'role'=>'form', 'name'=>'form_registrar_habilidad', 'method'=>'POST']) !!}
            <div class="form-group col-md-12">
                {!! Form::label('habilidad', '*Título', ['class'=>'pull-left letra-blanco']) !!}
                {!! Form::text('habilidad', null, ['class'=>'form-control', 'placeholder'=>'Título', 'required', 'id'=>'titulo_habilidad_registrar']) !!}
            </div>
            <div class="form-group col-md-12">
                {!! Form::label('descripcion', '*Descripción', ['class'=>'pull-left letra-blanco']) !!}
                {!! Form::textarea('descripcion', null, ['class'=>'form-control', 'placeholder'=>'Descripción', 'required', 'id'=>'descripcion_habilidad_agregar']) !!}
            </div>
            {!! Form::hidden('artista_id', $artista->id) !!}
            {!! Form::hidden('status_id', 3) !!}
            <div class="form-group col-md-8 col-md-offset-2">
                {!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
                {!! Form::button('Listado',['class'=>'btn btn-vinotinto', 'id'=>'listado_registrar_habilidad']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>