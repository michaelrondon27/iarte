@extends('template.main')
@section('title', 'Solicitud')
@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
@endsection
@section('content')
	<div class="col-md-10">
		{!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
		{!! Form::hidden('id_user', Auth::user()->id, ['id'=>'id_user']) !!}
		{!! Form::hidden('control', 'solicitante', ['id'=>'control']) !!}
		<div class="box-body ocultar" id="cuadro1" style="z-index: 10000;">
			<div class="form-group col-sm-8 col-sm-offset-2">
    			<h2>Debe llenar el formulario</h2>
    			@include('template.partials.required')
  			</div>
  			{!! Form::open(['id'=>'form_registrar', 'role'=>'form', 'method'=>'POST']) !!}
  				<div class="col-md-12 table-bordered" style="margin: 5px;">
  					<h2 style="font-size: 24px; padding: 10px;">Información Personal</h2>
  					<br>
  					<div class="form-group col-md-3 col-sm-12 col-xs-12">
					{!! Form::label('nombres', '*Nombres', ['class'=>'pull-left']) !!}
					{!! Form::text('nombres', null, ['class'=>'form-control', 'placeholder'=>'Nombres', 'required', 'onkeypress'=>'return sololetras(event)']) !!}
					</div>
					<div class="form-group col-md-3 col-sm-12 col-xs-12">
						{!! Form::label('apellidos', '*Apellidos', ['class'=>'pull-left']) !!}
						{!! Form::text('apellidos', null, ['class'=>'form-control', 'placeholder'=>'Apellidos', 'required', 'onkeypress'=>'return sololetras(event)']) !!}
					</div>
					<div class="form-group col-md-3 col-sm-12 col-xs-12">
						{!! Form::label('cedula', '*Cédula', ['class'=>'pull-left']) !!}
						{!! Form::text('cedula', null, ['class'=>'form-control', 'placeholder'=>'Cédula', 'required', 'onkeypress'=>'return solonumeros(event)', 'max-length'=>'8']) !!}
					</div>
					<div class="form-group col-md-3 col-sm-12 col-xs-12">
						{!! Form::label('fecha_nacimiento', '*Fecha de Nacimiento', ['class'=>'pull-left']) !!}
						{!! Form::text('fecha_nacimiento', null, ['class'=>'form-control fecha', 'placeholder'=>'DD-MM-AAAA', 'required', 'onkeypress'=>'return deshabilitarteclas(event)', 'autocomplete'=>'off', 'onchange'=>'return validarFechaNacimiento(this.value, "nacimiento_registrar")', 'id'=>'nacimiento_registrar']) !!}
					</div>
					<div class="form-group col-md-4 col-sm-12 col-xs-12">
						{!! Form::label('correo', '*Correo', ['class'=>'pull-left']) !!}
						{!! Form::email('correo', null, ['class'=>'form-control', 'placeholder'=>'Correo', 'required']) !!}
					</div>
					<div class="form-group col-md-4 col-sm-12 col-xs-12">
						{!! Form::label('direccion', '*Dirección', ['class'=>'pull-left']) !!}
						{!! Form::text('direccion', null, ['class'=>'form-control', 'placeholder'=>'Dirección', 'required']) !!}
					</div>
					<div class="form-group col-md-4 col-sm-12 col-xs-12">
						{!! Form::label('telefono', '*Teléfono', ['class'=>'pull-left']) !!}
						{!! Form::text('telefono', null, ['class'=>'form-control telefono', 'placeholder'=>'Teléfono', 'required', 'onkeypress'=>'return solonumeros(event)']) !!}
					</div>
					<div class="form-group col-md-3 col-sm-12 col-xs-12">
						{!! Form::label('genero_id', '*Genero', ['class'=>'pull-left']) !!}
						{!! Form::select('genero_id', $generos, null, ['class'=>'form-control select', 'required', 'placeholder'=>'Seleccione una opción']) !!}
					</div>
					<div class="form-group col-md-3 col-sm-12 col-xs-12">
						{!! Form::label('estado_id', '*Estado', ['class'=>'pull-left']) !!}
						{!! Form::select('estado_id', $estados, null, ['class'=>'form-control select', 'required', 'placeholder'=>'Seleccione una opción']) !!}
					</div>
					<div class="form-group col-md-3 col-sm-12 col-xs-12">
						{!! Form::label('estado_civil_id', '*Estado Civil', ['class'=>'pull-left']) !!}
						{!! Form::select('estado_civil_id', $estadosCiviles, null, ['class'=>'form-control select', 'required', 'placeholder'=>'Seleccione una opción']) !!}
					</div>
					<div class="form-group col-md-3 col-sm-12 col-xs-12">
						{!! Form::label('grado_instruccion_id', '*Grado de Instrucción', ['class'=>'pull-left']) !!}
						{!! Form::select('grado_instruccion_id', $gradosInstrucciones, null, ['class'=>'form-control select', 'required', 'placeholder'=>'Seleccione una opción']) !!}
					</div>
  				</div>
  				<div class="col-md-12 table-bordered" style="margin: 5px;">
  					<h2 style="font-size: 24px; padding: 10px;">Información General</h2>
  					<div class="form-group col-md-3 col-sm-12 col-xs-12">
						{!! Form::label(null, '¿Pertenece usted a algún pueblo indígena?', ['class'=>'pull-left']) !!}
						<br>
						{!! Form::label(null, 'Sí', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
						{!! Form::radio('pueblo_indigena', 'Sí') !!}
						{!! Form::label(null, 'No', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
						{!! Form::radio('pueblo_indigena', 'No') !!}
					</div>
					<div class="form-group col-md-2 col-sm-12 col-xs-12">
						{!! Form::label(null, '¿Habla usted otros idiomas?', ['class'=>'pull-left']) !!}
						<br>
						{!! Form::label(null, 'Sí', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
						{!! Form::radio('idiomas', 'Sí') !!}
						{!! Form::label(null, 'No', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
						{!! Form::radio('idiomas', 'No') !!}
					</div>
					<div class="form-group col-md-7 col-sm-12 col-xs-12">
						{!! Form::label('cursos', 'Talleres, conocimientos, cuross y/o saberes (otro tipo de formación)', ['class'=>'pull-left']) !!}
						{!! Form::text('cursos', null, ['class'=>'form-control', 'placeholder'=>'Cursos']) !!}
					</div>
					<div class="form-group col-md-3 col-sm-12 col-xs-12">
						{!! Form::label(null, '¿Están relacionados con su actividad artística?', ['class'=>'pull-left']) !!}
						<br>
						{!! Form::label(null, 'Sí', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
						{!! Form::radio('relacionados_actividad_artistica', 'Sí') !!}
						{!! Form::label(null, 'No', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
						{!! Form::radio('relacionados_actividad_artistica', 'No') !!}
					</div>
					<div class="form-group col-md-3 col-sm-12 col-xs-12">
						{!! Form::label('tiempo_actividad_artistica', '¿Cuántos años tiene realizando la actividad artística?', ['class'=>'pull-left']) !!}
						{!! Form::text('tiempo_actividad_artistica', null, ['class'=>'form-control', 'onkeypress'=>'return solonumeros(event)']) !!}
					</div>
					<div class="form-group col-md-3 col-sm-12 col-xs-12">
						{!! Form::label(null, '¿Ha recibido algún premio o reconocimiento institucional?', ['class'=>'pull-left']) !!}
						<br>
						{!! Form::label(null, 'Sí', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 20px;']) !!}
						{!! Form::radio('premio', 'Sí') !!}
						{!! Form::label(null, 'No', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 20px;']) !!}
						{!! Form::radio('premio', 'No') !!}
					</div>
					<div class="form-group col-md-3 col-sm-12 col-xs-12">
						{!! Form::label('tipo_premio_id', 'Tipo de Premio', ['class'=>'pull-left']) !!}
						{!! Form::select('tipo_premio_id', $tiposPremios, null, ['class'=>'form-control select', 'placeholder'=>'Seleccione una opción']) !!}
					</div>
					<div class="form-group col-md-4 col-sm-12 col-xs-12">
						{!! Form::label('disciplinas', 'Disciplinas Artísticas', ['class'=>'pull-left']) !!}
						{!! Form::select('disciplinas[]', $disciplinas, null, ['class'=>'form-control multiple', 'multiple']) !!}
					</div>
					<div class="form-group col-md-3 col-sm-12 col-xs-12">
						{!! Form::label(null, '¿Pertenece usted a una organiczación, grupo o colectvo?', ['class'=>'pull-left']) !!}
						<br>
						{!! Form::label(null, 'Sí', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 5px;']) !!}
						{!! Form::radio('grupo', 'Sí') !!}
						{!! Form::label(null, 'No', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 5px;']) !!}
						{!! Form::radio('grupo', 'No') !!}
					</div>
					<div class="form-group col-md-5 col-sm-12 col-xs-12">
						{!! Form::label('tipo_grupo', '¿Qué tipo de organiczación, grupo o colectvo?', ['class'=>'pull-left']) !!}
						{!! Form::text('tipo_grupo', null, ['class'=>'form-control']) !!}
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
						{!! Form::radio('apoyo_economico', 'Sí') !!}
						{!! Form::label(null, 'No', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
						{!! Form::radio('apoyo_economico', 'No') !!}
					</div>
					<div class="form-group col-md-2 col-sm-12 col-xs-12">
						{!! Form::label(null, '¿Tiene empleo formal remunerado?', ['class'=>'pull-left']) !!}
						<br>
						{!! Form::label(null, 'Sí', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
						{!! Form::radio('empleo', 'Sí') !!}
						{!! Form::label(null, 'No', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
						{!! Form::radio('empleo', 'No') !!}
					</div>
					<div class="form-group col-md-2 col-sm-12 col-xs-12">
						{!! Form::label(null, '¿Cuál es su ingreso mensual?', ['class'=>'pull-left']) !!}
						{!! Form::text('sueldo', null, ['class'=>'form-control']) !!}
					</div>
					<div class="form-group col-md-4 col-sm-12 col-xs-12">
						{!! Form::label(null, '¿Sus ingresos mensuales son producto de la actividad artística?', ['class'=>'pull-left']) !!}
						<br>
						{!! Form::label(null, 'Sí', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
						{!! Form::radio('ingresos_artisticos', 'Sí') !!}
						{!! Form::label(null, 'No', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
						{!! Form::radio('ingresos_artisticos', 'No') !!}
					</div>
					<div class="form-group col-md-3 col-sm-12 col-xs-12">
						{!! Form::label(null, '¿Es usted jubilado de alguna institución pública o privada?', ['class'=>'pull-left']) !!}
						<br>
						{!! Form::label(null, 'Sí', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
						{!! Form::radio('jubilado', 'Sí') !!}
						{!! Form::label(null, 'No', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
						{!! Form::radio('jubilado', 'No') !!}
					</div>
					<div class="form-group col-md-2 col-sm-12 col-xs-12">
						{!! Form::label(null, '¿Es usted pensionado(a) por el IVSS?', ['class'=>'pull-left']) !!}
						<br>
						{!! Form::label(null, 'Sí', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
						{!! Form::radio('pensionado', 'Sí') !!}
						{!! Form::label(null, 'No', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
						{!! Form::radio('pensionado', 'No') !!}
					</div>
					<div class="form-group col-md-3 col-sm-12 col-xs-12">
						{!! Form::label(null, '¿Recibe usted algún subsidio, recurso o apoyo social?', ['class'=>'pull-left']) !!}
						<br>
						{!! Form::label(null, 'Sí', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
						{!! Form::radio('subsidio', 'Sí') !!}
						{!! Form::label(null, 'No', ['class'=>'pull-left', 'style'=>'padding-top: 5px; margin-left: 10px; margin-bottom: 10px;']) !!}
						{!! Form::radio('subsidio', 'No') !!}
					</div>
  				</div>
				<div class="form-group col-sm-8 col-sm-offset-2">
			      	{!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
			    </div>
  			{!! Form::close() !!}
  		</div>
  		@include('admin.solicitudes.edit')
	</div>
	<div class="col-md-2">
		<div class="main-sidebar">
			<div class="main-sidebar-widgets">
				<div class="main-sidebar-widget" style="margin-top: 20px;">
	                <h3>Usuario: {{ Auth::user()->name }}</h3>
	                <img src="{{ asset('images/usuarios/'.Auth::user()->foto) }}" style="width: auto; height: 240px;">
                	<div style="margin-top: 15px;">
                		<p style="font-weight: bold; font-size: 14px;">Pasos a seguir para enviar la solicitud:</p>
                		<p>1) Debe llenar el formualrio.</p>
                		<p>2) Debe subir al menos 4 imagenes de algunas de sus obras (la calidad de las imagenes debe ser buena).</p>
                	</div>
	                <div style="margin-top: 15px;">
                		<p style="font-size: 14px;">Estatus de la solicitud: <b id="estatus"></b></p>
                	</div>
                	<div id="enviarSolicitud"></div>
	            </div>
	        </div>
		</div>
	</div>
@endsection
@section('js')
	<script src="{{ asset('js/admin/solicitudes.js') }}"></script>
	<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
  	<script src="{{ asset('plugins/datepicker/locales/bootstrap-datepicker.es.js') }}"></script>
  	<script src="{{ asset('plugins/maskedinput/jquery.maskedinput.js') }}"></script>
  	<script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
@endsection