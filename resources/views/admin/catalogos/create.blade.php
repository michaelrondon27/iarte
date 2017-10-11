<div class="box-body ocultar" id="cuadro4">
    <div class="box-body">
        {!! Form::open(['route'=>'artistascatalogos.store', 'method'=>'POST', 'role'=>'form']) !!}
            <div class="form-group col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                {!! Form::label('titulo', '*Título', ['class'=>'pull-left']) !!}
                {!! Form::text('titulo', null, ['class'=>'form-control', 'placeholder'=>'Título', 'required', 'id'=>'titulo_registrar']) !!}
            </div>
            <div class="form-group col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                {!! Form::label('descripcion', '*Descripción', ['class'=>'pull-left']) !!}
                {!! Form::textarea('descripcion', null, ['class'=>'form-control', 'placeholder'=>'Descripción', 'required', 'id'=>'descripcion_registrar']) !!}
            </div>
            <div class="form-group col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                {!! Form::label('disciplinas', 'Disciplina(s)', ['class'=>'pull-left']) !!}
                {!! Form::select('disciplinas[]', $disciplinas, null, ['class'=>'form-control col-md-12 col-sm-12 col-xs-12 multiple', 'multiple', 'required', 'id'=>'disciplinas_registrar']) !!}
            </div>
            <div>
                {!! Form::text('artista_id', null, ['id'=>'artista_id_catalogo', 'class'=>'ocultar']) !!}
            </div>
            {!! Form::hidden('status_id', 3) !!}
            <div class="form-group col-md-8 col-md-offset-2">
                {!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>