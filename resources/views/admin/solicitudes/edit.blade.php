<div class="box-body ocultar" id="cuadro2" style="z-index: 10;">
	<div class="form-group col-sm-8 col-sm-offset-2">
		<h2>Editar Solicitud</h2>
		@include('template.partials.required')
	</div>
	{!! Form::open(['id'=>'form_actualizar', 'role'=>'form', 'method'=>'PUT']) !!}
		<div class="col-md-12 table-bordered" style="margin: 5px;">
			<h2 style="font-size: 24px; padding: 10px;">Información Personal</h2>
			<br>
			{!! Form::hidden('id', null, ['id'=>'id_editar']) !!}
			<div class="form-group col-md-3 col-sm-12 col-xs-12">
				{!! Form::label('nombres', '*Nombres', ['class'=>'pull-left']) !!}
				{!! Form::text('nombres', null, ['class'=>'form-control', 'placeholder'=>'Nombres', 'required', 'onkeypress'=>'return sololetras(event)', 'id'=>'nombres_editar']) !!}
			</div>
			<div class="form-group col-md-3 col-sm-12 col-xs-12">
				{!! Form::label('apellidos', '*Apellidos', ['class'=>'pull-left']) !!}
				{!! Form::text('apellidos', null, ['class'=>'form-control', 'placeholder'=>'Apellidos', 'required', 'onkeypress'=>'return sololetras(event)', 'id'=>'apellidos_editar']) !!}
			</div>
			<div class="form-group col-md-3 col-sm-12 col-xs-12">
				{!! Form::label('cedula', '*Cédula', ['class'=>'pull-left']) !!}
				{!! Form::text('cedula', null, ['class'=>'form-control', 'placeholder'=>'Cédula', 'required', 'onkeypress'=>'return solonumeros(event)', 'max-length'=>'8', 'id'=>'cedula_editar']) !!}
			</div>
			<div class="form-group col-md-3 col-sm-12 col-xs-12">
				{!! Form::label('fecha_nacimiento', '*Fecha de Nacimiento', ['class'=>'pull-left']) !!}
				{!! Form::text('fecha_nacimiento', null, ['class'=>'form-control fecha', 'placeholder'=>'DD-MM-AAAA', 'required', 'onkeypress'=>'return deshabilitarteclas(event)', 'autocomplete'=>'off', 'onchange'=>'return validarFechaNacimiento(this.value, "nacimiento_editar")', 'id'=>'nacimiento_editar']) !!}
			</div>
			<div class="form-group col-md-4 col-sm-12 col-xs-12">
				{!! Form::label('correo', '*Correo', ['class'=>'pull-left']) !!}
				{!! Form::email('correo', null, ['class'=>'form-control', 'placeholder'=>'Correo', 'required', 'id'=>'correo_editar']) !!}
			</div>
			<div class="form-group col-md-4 col-sm-12 col-xs-12">
				{!! Form::label('direccion', '*Dirección', ['class'=>'pull-left']) !!}
				{!! Form::text('direccion', null, ['class'=>'form-control', 'placeholder'=>'Dirección', 'required', 'id'=>'direccion_editar']) !!}
			</div>
			<div class="form-group col-md-4 col-sm-12 col-xs-12">
				{!! Form::label('telefono', '*Teléfono', ['class'=>'pull-left']) !!}
				{!! Form::text('telefono', null, ['class'=>'form-control telefono', 'placeholder'=>'Teléfono', 'required', 'onkeypress'=>'return solonumeros(event)', 'id'=>'telefono_editar']) !!}
			</div>
			<div class="form-group col-md-3 col-sm-12 col-xs-12">
				{!! Form::label('genero_id', '*Genero', ['class'=>'pull-left']) !!}
				{!! Form::select('genero_id', $generos, null, ['class'=>'form-control select', 'required', 'placeholder'=>'Seleccione una opción', 'id'=>'genero_editar']) !!}
			</div>
			<div class="form-group col-md-3 col-sm-12 col-xs-12">
				{!! Form::label('estado_id', '*Estado', ['class'=>'pull-left']) !!}
				{!! Form::select('estado_id', $estados, null, ['class'=>'form-control select', 'required', 'placeholder'=>'Seleccione una opción', 'id'=>'estado_editar']) !!}
			</div>
			<div class="form-group col-md-3 col-sm-12 col-xs-12">
				{!! Form::label('estado_civil_id', '*Estado Civil', ['class'=>'pull-left']) !!}
				{!! Form::select('estado_civil_id', $estadosCiviles, null, ['class'=>'form-control select', 'required', 'placeholder'=>'Seleccione una opción', 'id'=>'estado_civil_editar']) !!}
			</div>
			<div class="form-group col-md-3 col-sm-12 col-xs-12">
				{!! Form::label('grado_instruccion_id', '*Grado de Instrucción', ['class'=>'pull-left']) !!}
				{!! Form::select('grado_instruccion_id', $gradosInstrucciones, null, ['class'=>'form-control select', 'required', 'placeholder'=>'Seleccione una opción', 'id'=>'grado_instruccion_editar']) !!}
			</div>
		</div>
		<div class="col-md-12 table-bordered" style="margin: 5px;">
			<h2 style="font-size: 24px; padding: 10px;">Información General</h2>
			<div class="form-group col-md-3 col-sm-12 col-xs-12">
				{!! Form::label(null, '¿Pertenece usted a algún pueblo indígena?', ['class'=>'pull-left']) !!}
				<br>
				{!! Form::label(null, 'Sí', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
				{!! Form::radio('pueblo_indigena', 'Sí', false, ['id'=>'pueblo_indigena_si']) !!}
				{!! Form::label(null, 'No', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
				{!! Form::radio('pueblo_indigena', 'No', false, ['id'=>'pueblo_indigena_no']) !!}
			</div>
			<div class="form-group col-md-2 col-sm-12 col-xs-12">
				{!! Form::label(null, '¿Habla usted otros idiomas?', ['class'=>'pull-left']) !!}
				<br>
				{!! Form::label(null, 'Sí', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
				{!! Form::radio('idiomas', 'Sí', false, ['id'=>'idiomas_si']) !!}
				{!! Form::label(null, 'No', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
				{!! Form::radio('idiomas', 'No', false, ['id'=>'idiomas_no']) !!}
			</div>
			<div class="form-group col-md-7 col-sm-12 col-xs-12">
				{!! Form::label('cursos', 'Talleres, conocimientos, cuross y/o saberes (otro tipo de formación)', ['class'=>'pull-left']) !!}
				{!! Form::text('cursos', null, ['class'=>'form-control', 'placeholder'=>'Cursos', 'id'=>'cursos_editar']) !!}
			</div>
			<div class="form-group col-md-3 col-sm-12 col-xs-12">
				{!! Form::label(null, '¿Están relacionados con su actividad artística?', ['class'=>'pull-left']) !!}
				<br>
				{!! Form::label(null, 'Sí', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
				{!! Form::radio('relacionados_actividad_artistica', 'Sí', false, ['id'=>'relacionados_actividad_artistica_si']) !!}
				{!! Form::label(null, 'No', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
				{!! Form::radio('relacionados_actividad_artistica', 'No', false, ['id'=>'relacionados_actividad_artistica_no']) !!}
			</div>
			<div class="form-group col-md-3 col-sm-12 col-xs-12">
				{!! Form::label('tiempo_actividad_artistica', '¿Cuántos años tiene realizando la actividad artística?', ['class'=>'pull-left']) !!}
				{!! Form::text('tiempo_actividad_artistica', null, ['class'=>'form-control', 'onkeypress'=>'return solonumeros(event)', 'id'=>'tiempo_editar']) !!}
			</div>
			<div class="form-group col-md-3 col-sm-12 col-xs-12">
				{!! Form::label(null, '¿Ha recibido algún premio o reconocimiento institucional?', ['class'=>'pull-left']) !!}
				<br>
				{!! Form::label(null, 'Sí', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 20px;']) !!}
				{!! Form::radio('premio', 'Sí', false, ['id'=>'premio_si']) !!}
				{!! Form::label(null, 'No', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 20px;']) !!}
				{!! Form::radio('premio', 'No', false, ['id'=>'premio_no']) !!}
			</div>
			<div class="form-group col-md-3 col-sm-12 col-xs-12">
				{!! Form::label('tipo_premio_id', 'Tipo de Premio', ['class'=>'pull-left']) !!}
				{!! Form::select('tipo_premio_id', $tiposPremios, null, ['class'=>'form-control select', 'required', 'placeholder'=>'Seleccione una opción', 'id'=>'tipo_premio_editar']) !!}
			</div>
			<div class="form-group col-md-4 col-sm-12 col-xs-12">
				{!! Form::label('disciplinas', 'Disciplinas Artísticas', ['class'=>'pull-left']) !!}
				{!! Form::select('disciplinas[]', $disciplinas, null, ['class'=>'form-control multiple', 'multiple', 'id'=>'disciplinas_editar']) !!}
			</div>
			<div class="form-group col-md-3 col-sm-12 col-xs-12">
				{!! Form::label(null, '¿Pertenece usted a una organiczación, grupo o colectvo?', ['class'=>'pull-left']) !!}
				<br>
				{!! Form::label(null, 'Sí', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 5px;']) !!}
				{!! Form::radio('grupo', 'Sí', false, ['id'=>'grupo_si']) !!}
				{!! Form::label(null, 'No', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 5px;']) !!}
				{!! Form::radio('grupo', 'No', false, ['id'=>'grupo_no']) !!}
			</div>
			<div class="form-group col-md-5 col-sm-12 col-xs-12">
				{!! Form::label('tipo_grupo', '¿Qué tipo de organiczación, grupo o colectvo?', ['class'=>'pull-left']) !!}
				{!! Form::text('tipo_grupo', null, ['class'=>'form-control', 'id'=>'tipo_grupo_editar']) !!}
			</div>
			<div class="form-group col-md-4 col-sm-12 col-xs-12">
				{!! Form::label(null, '¿Estaría dispuesto(a) a participar en actividades socioculturales y/o educativas?', ['class'=>'pull-left']) !!}
				<br>
				{!! Form::label(null, 'Sí', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
				{!! Form::radio('activiades_educativas', 'Sí') !!}
				{!! Form::label(null, 'No', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
				{!! Form::radio('activiades_educativas', 'No') !!}
			</div>
			<div class="form-group col-md-4 col-sm-12 col-xs-12">
				{!! Form::label(null, '¿Recibe usted apoyo económico para la actividad artística que realiza?', ['class'=>'pull-left']) !!}
				<br>
				{!! Form::label(null, 'Sí', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
				{!! Form::radio('apoyo_economico', 'Sí', false, ['id'=>'apoyo_economico_si']) !!}
				{!! Form::label(null, 'No', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
				{!! Form::radio('apoyo_economico', 'No', false, ['id'=>'apoyo_economico_no']) !!}
			</div>
			<div class="form-group col-md-2 col-sm-12 col-xs-12">
				{!! Form::label(null, '¿Tiene empleo formal remunerado?', ['class'=>'pull-left']) !!}
				<br>
				{!! Form::label(null, 'Sí', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
				{!! Form::radio('empleo', 'Sí', false, ['id'=>'empleo_si']) !!}
				{!! Form::label(null, 'No', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
				{!! Form::radio('empleo', 'No', false, ['id'=>'empleo_no']) !!}
			</div>
			<div class="form-group col-md-2 col-sm-12 col-xs-12">
				{!! Form::label(null, '¿Cuál es su ingreso mensual?', ['class'=>'pull-left']) !!}
				{!! Form::text('sueldo', null, ['class'=>'form-control', 'id'=>'sueldo_editar']) !!}
			</div>
			<div class="form-group col-md-4 col-sm-12 col-xs-12">
				{!! Form::label(null, '¿Sus ingresos mensuales son producto de la actividad artística?', ['class'=>'pull-left']) !!}
				<br>
				{!! Form::label(null, 'Sí', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
				{!! Form::radio('ingresos_artisticos', 'Sí', false, ['id'=>'ingresos_artisticos_si']) !!}
				{!! Form::label(null, 'No', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
				{!! Form::radio('ingresos_artisticos', 'No', false, ['id'=>'ingresos_artisticos_no']) !!}
			</div>
			<div class="form-group col-md-3 col-sm-12 col-xs-12">
				{!! Form::label(null, '¿Es usted jubilado de alguna institución pública o privada?', ['class'=>'pull-left']) !!}
				<br>
				{!! Form::label(null, 'Sí', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
				{!! Form::radio('jubilado', 'Sí', false, ['id'=>'jubilado_si']) !!}
				{!! Form::label(null, 'No', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
				{!! Form::radio('jubilado', 'No', false, ['id'=>'jubilado_no']) !!}
			</div>
			<div class="form-group col-md-2 col-sm-12 col-xs-12">
				{!! Form::label(null, '¿Es usted pensionado(a) por el IVSS?', ['class'=>'pull-left']) !!}
				<br>
				{!! Form::label(null, 'Sí', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
				{!! Form::radio('pensionado', 'Sí', false, ['id'=>'pensionado_si']) !!}
				{!! Form::label(null, 'No', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
				{!! Form::radio('pensionado', 'No', false, ['id'=>'pensionado_no']) !!}
			</div>
			<div class="form-group col-md-3 col-sm-12 col-xs-12">
				{!! Form::label(null, '¿Recibe usted algún subsidio, recurso o apoyo social?', ['class'=>'pull-left']) !!}
				<br>
				{!! Form::label(null, 'Sí', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
				{!! Form::radio('subsidio', 'Sí', false, ['id'=>'subsidio_si']) !!}
				{!! Form::label(null, 'No', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
				{!! Form::radio('subsidio', 'No', false, ['id'=>'subsidio_no']) !!}
			</div>
		</div>
		<div class="form-group col-sm-8 col-sm-offset-2">
	      	{!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
	    </div>
	{!! Form::close() !!}
	@include('admin.solicitudes.imagen')
	<div class="col-md-12">
		<div id="alert_imagen"></div>
	</div>
	<div class="col-md-12 table-bordered" style="margin: 5px;">
		<div class="col-md-12">
			<h2 style="font-size: 24px; padding: 10px;">Imagenes <button class='btn btn-vinotinto pull-right' data-toggle='modal' data-target='#agregar'><i class='fa fa-file-image-o' aria-hidden='true'></i> Agregar Imagen</button></h2>
		</div>
		<div class="col-md-12">
			<div class=" lightgallery  three-columns" id="listar_imagenes"></div>
		</div>
	</div>
</div>