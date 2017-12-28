<div class="box-body ocultar" id="cuadro1">
	<div class="form-group col-sm-8 col-sm-offset-2">
		<h2>Registrar Museo</h2>
		@include('template.partials.required')
	</div>
	{!! Form::open(['id'=>'form_registrar', 'role'=>'form']) !!}
		<div class="form-group col-md-4 col-sm-12 col-xs-12">
			{!! Form::label('nombre', '*Nombre',['class'=>'pull-left']) !!}
			{!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre', 'required', 'id' => 'nombre']) !!}
		</div>
		<div class="form-group col-md-4 col-sm-12 col-xs-12">
			{!! Form::label('fecha_fundacion', 'Fecha Fundación',['class'=>'pull-left']) !!}
			{!! Form::text('fecha_fundacion', null, ['class'=>'form-control fecha', 'placeholder'=>'DD-MM-AAAA', 'id' => 'fecha_fundacion']) !!}
		</div>
		<div class="form-group col-md-4 col-sm-12 col-xs-12">
			{!! Form::label('foto', 'Foto', ['class'=>'pull-left']) !!}
			{!! Form::file('foto', ['class'=>'form-control', 'id'=>'foto']) !!}
		</div>
		<div class="form-group col-md-3 col-sm-12 col-xs-12">
			{!! Form::label('direccion', 'Dirección',['class'=>'pull-left']) !!}
			{!! Form::text('direccion', null, ['class'=>'form-control', 'placeholder'=>'Dirección', 'id' => 'direccion']) !!}
		</div>
		<div class="form-group col-md-3 col-sm-12 col-xs-12">
			{!! Form::label('telefono', 'Teléfono',['class'=>'pull-left']) !!}
			{!! Form::text('telefono', null, ['class'=>'form-control telefono', 'placeholder'=>'Teléfono', 'id' => 'telefono', 'onkeypress'=>'return solonumeros(event)']) !!}
		</div>
		<div class="form-group col-md-3 col-sm-12 col-xs-12">
			{!! Form::label('correo', 'Correo',['class'=>'pull-left']) !!}
			{!! Form::text('correo', null, ['class'=>'form-control', 'placeholder'=>'Correo', 'id' => 'correo']) !!}
		</div>
		<div class="form-group col-md-3 col-sm-12 col-xs-12">
			{!! Form::label('contacto', 'Información de Contacto',['class'=>'pull-left']) !!}
			{!! Form::text('contacto', null, ['class'=>'form-control', 'placeholder'=>'Información de Contacto', 'id' => 'contacto']) !!}
		</div>
		<div class="form-group col-md-3 col-sm-12 col-xs-12">
			{!! Form::label('estado_id', '*Estado', ['class'=>'pull-left']) !!}
			{!! Form::select('estado_id', $estados, null, ['class'=>'form-control select', 'required', 'placeholder'=>'Seleccione una opción', 'id'=>'estado']) !!}
		</div>
		<div class="form-group col-md-3 col-sm-12 col-xs-12">
			{!! Form::label('tipos_museos', '*Tipo de Museo', ['class'=>'pull-left']) !!}
			{!! Form::select('tipos_museos[]', $tiposMuseos, null, ['class'=>'form-control multiple', 'multiple', 'id'=>'tipos_museos']) !!}
		</div>
		<div class="form-group col-md-3 col-sm-12 col-xs-12">
			{!! Form::label('usuarios', '*Asignar Usuarios', ['class'=>'pull-left']) !!}
			{!! Form::select('usuarios[]', $usuarios, null, ['class'=>'form-control multiple', 'multiple', 'id'=>'usuarios', 'required']) !!}
		</div>
		<div class="form-group col-md-3 col-sm-12 col-xs-12">
			{!! Form::label('artistas', 'Artistas Exhibidos', ['class'=>'pull-left']) !!}
			{!! Form::select('artistas[]', $artistas, null, ['class'=>'form-control multiple', 'multiple', 'id'=>'artistas']) !!}
		</div>
		<div class="form-group col-md-12 col-sm-12 col-xs-12">
			{!! Form::label('historia', '*Historia', ['class'=>'pull-left label_biografia']) !!}
			<br>
			{!! Form::textarea('historia', null, ['class'=>'form-control historia', 'required', 'id'=>'historia']) !!}
		</div>
		<div class="form-group col-sm-8 col-sm-offset-2">
			{!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
			{!! Form::button('Listado',['class'=>'btn btn-vinotinto', 'id'=>'listado_registrar']) !!}
		</div>
	{!! Form::close() !!}
</div>