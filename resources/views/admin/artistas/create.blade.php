<div class="box-body ocultar" id="cuadro1">
  	<div class="form-group col-sm-8 col-sm-offset-2">
    	<h2>Registrar Artista</h2>
   		@include('template.partials.required')
  	</div>
    {!! Form::open(['id'=>'form_registrar', 'role'=>'form', 'files'=>true, 'name'=>'form_registrar', 'method'=>'POST']) !!}
		<div class="form-group col-md-3 col-sm-12 col-xs-12">
			{!! Form::label('nombre', '*Nombre', ['class'=>'pull-left']) !!}
			{!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre', 'required', 'onkeypress'=>'return sololetras(event)', 'id'=>'nombre']) !!}
		</div>
		<div class="form-group col-md-3 col-sm-12 col-xs-12">
			{!! Form::label('fecha_nacimiento', '*Fecha de Nacimiento', ['class'=>'pull-left']) !!}
			{!! Form::text('fecha_nacimiento', null, ['class'=>'form-control fecha', 'placeholder'=>'DD-MM-AAAA', 'required', 'onkeypress'=>'return deshabilitarteclas(event)', 'autocomplete'=>'off', 'onchange'=>'return validarFechaNacimiento(this.value, "nacimineto")', 'id'=>'nacimiento']) !!}
		</div>
		<div class="form-group col-md-3 col-sm-12 col-xs-12">
			{!! Form::label('fecha_muerte', 'Fecha de Muerte', ['class'=>'pull-left']) !!}
			{!! Form::text('fecha_muerte', null, ['class'=>'form-control fecha', 'placeholder'=>'DD-MM-AAAA', 'onkeypress'=>'return deshabilitarteclas(event)', 'autocomplete'=>'off', 'onchange'=>'return validarFechaMuerte(this.value)', 'id'=>'muerte']) !!}
		</div>
		<div class="form-group col-md-3 col-sm-12 col-xs-12">
			{!! Form::label('foto', 'Foto', ['class'=>'pull-left']) !!}
			{!! Form::file('foto', ['class'=>'form-control', 'id'=>'foto']) !!}
		</div>
		<div class="form-group col-md-4 col-sm-12 col-xs-12">
			{!! Form::label('pais_nacimiento_id', '*País de Nacimiento', ['class'=>'pull-left']) !!}
			{!! Form::select('pais_nacimiento_id', $paises, null, ['class'=>'form-control select', 'required', 'placeholder'=>'Seleccione una opción', 'id'=>'pais_nacimiento']) !!}
		</div>
		<div class="form-group col-md-4 col-sm-12 col-xs-12">
			{!! Form::label('genero_id', '*Genero', ['class'=>'pull-left']) !!}
			{!! Form::select('genero_id', $generos, null, ['class'=>'form-control select', 'required', 'placeholder'=>'Seleccione una opción', 'id'=>'genero']) !!}
		</div>
		<div class="form-group col-md-4 col-sm-12 col-xs-12">
			{!! Form::label('pais_muerte_id', 'País de Muerte', ['class'=>'pull-left']) !!}
			{!! Form::select('pais_muerte_id', $paises, null, ['class'=>'form-control select', 'placeholder'=>'Seleccione una opción', 'id'=>'pais_muerte']) !!}
		</div>
		<div class="form-group col-md-4 col-sm-12 col-xs-12">
			{!! Form::label('disciplinas', '*Disciplinas', ['class'=>'pull-left']) !!}
			{!! Form::select('disciplinas[]', $disciplinas, null, ['class'=>'form-control multiple', 'multiple', 'id'=>'disciplinas']) !!}
		</div>
		<div class="form-group col-md-4 col-sm-12 col-xs-12">
			{!! Form::label('profesiones', '*Profesiones', ['class'=>'pull-left']) !!}
			{!! Form::select('profesiones[]', $profesiones, null, ['class'=>'form-control multiple', 'multiple', 'id'=>'profesiones']) !!}
		</div>
		<div class="form-group col-md-4 col-sm-12 col-xs-12">
			{!! Form::label('usuarios', '*Asignar Usuarios', ['class'=>'pull-left']) !!}
			{!! Form::select('usuarios[]', $usuarios, null, ['class'=>'form-control multiple', 'multiple', 'id'=>'usuarios']) !!}
		</div>
		<div class="form-group col-md-12 col-sm-12 col-xs-12">
			{!! Form::label('biografia', '*Biografía', ['class'=>'pull-left label_biografia']) !!}
			<br>
			{!! Form::textarea('biografia', null, ['class'=>'form-control biografia', 'required', 'id'=>'biografia']) !!}
		</div>
		{!! Form::hidden('status_id', 4) !!}
		{!! Form::hidden('tipo', 0) !!}
		<div class="form-group col-sm-8 col-sm-offset-2">
	      	{!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
	      	{!! Form::button('Listado',['class'=>'btn btn-vinotinto', 'id'=>'listado_registrar']) !!}
	    </div>
	{!! Form::close() !!}
</div>