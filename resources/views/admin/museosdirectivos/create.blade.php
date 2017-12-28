<div class="box-body ocultar" id="cuadro5">
	<div class="form-group col-sm-8 col-sm-offset-2">
		<h2>Registrar Directivo</h2>
		@include('template.partials.required')
	</div>
	{!! Form::open(['id'=>'form_registrar_directivo', 'role'=>'form', 'files'=>true, 'name'=>'form_registrar_directivo', 'method'=>'POST']) !!}
		<div class="form-group col-sm-8 col-sm-offset-2">
			{!! Form::label('nombre', '*Nombre',['class'=>'pull-left']) !!}
			{!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre', 'required', 'id' => 'nombre_registrar_directivo', 'onkeypress'=>'return sololetras(event)']) !!}
		</div>
		<div class="form-group col-sm-8 col-sm-offset-2">
            {!! Form::label('foto', 'Foto', ['class'=>'pull-left negrita']) !!}
            {!! Form::file('foto', ['class'=>'form-control', 'id'=>'foto_directivo_registrar']) !!}
        </div>
        <div class="form-group col-sm-8 col-sm-offset-2">
            {!! Form::label('cargo_id', 'Cargo', ['class'=>'pull-left negrita']) !!}
            {!! Form::select('cargo_id', $cargos, null, ['class'=>'form-control select', 'id'=>'cargo_registrar', 'placeholder'=>'Seleccione una opción',]) !!}
        </div>
        {{ Form::text('museo_id', null, ['id'=>'museo_id_diretivo_registrar', 'class'=>'ocultar']) }}
		<div class="form-group col-sm-8 col-sm-offset-2">
			{!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
			{!! Form::button('Listado',['class'=>'btn btn-vinotinto', 'id'=>'listado_registrar_directivo']) !!}
		</div>
	{!! Form::close() !!}
</div>