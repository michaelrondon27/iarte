@extends('template.main')
@section('content')
	{!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
	{!! Form::hidden('control', 'calificar', ['id'=>'control']) !!}
	<div class="col-md-10" style="margin-top: 10px;">
		<div class="col-md-12 table-bordered">
			<div class="col-md-12" style="margin-bottom: 20px;">
				<h2>Información Personal</h2>
			</div>
			<div style="text-align: left;">
				<div class="form-group col-md-3" style="font-size: 16px; text-transform: capitalize;">
					<label style="font-weight: bold;">Nombre:</label>
					<span>{{ $solicitud->nombres }}</span>
				</div>
				<div class="form-group col-md-3" style="font-size: 16px; text-transform: capitalize;">
					<label style="font-weight: bold;">Apellidos:</label>
					<span>{{ $solicitud->apellidos }}</span>
				</div>
				<div class="form-group col-md-3" style="font-size: 16px; text-transform: capitalize;">
					<label style="font-weight: bold;">Cédula:</label>
					<span>{{ $solicitud->cedula }}</span>
				</div>
				<div class="form-group col-md-3" style="font-size: 16px; text-transform: capitalize;">
					<label style="font-weight: bold;">Fecha de Nacimiento:</label>
					<span>{{ date("d-m-Y", strtotime($solicitud->fecha_nacimiento)) }}</span>
				</div>
				<div class="form-group col-md-3" style="font-size: 16px;">
					<label style="font-weight: bold;">Correo:</label>
					<span>{{ $solicitud->correo }}</span>
				</div>
				<div class="form-group col-md-6" style="font-size: 16px;">
					<label style="font-weight: bold;">Dirección:</label>
					<span>{{ $solicitud->direccion }}</span>
				</div>
				<div class="form-group col-md-3" style="font-size: 16px;">
					<label style="font-weight: bold;">Teléfono:</label>
					<span>{{ $solicitud->telefono }}</span>
				</div>
				<div class="form-group col-md-3" style="font-size: 16px;">
					<label style="font-weight: bold;">Genero:</label>
					<span>{{ $solicitud->genero->genero }}</span>
				</div>
				<div class="form-group col-md-3" style="font-size: 16px;">
					<label style="font-weight: bold;">Estado:</label>
					<span>{{ $solicitud->estado->estado }}</span>
				</div>
				<div class="form-group col-md-3" style="font-size: 16px;">
					<label style="font-weight: bold;">Estado Civil:</label>
					<span>{{ $solicitud->estadoCivil->estado_civil }}</span>
				</div>
				<div class="form-group col-md-3" style="font-size: 16px;">
					<label style="font-weight: bold;">Grado de Instrucción:</label>
					<span>{{ $solicitud->gradoInstruccion->grado_instruccion }}</span>
				</div>
			</div>
		</div>
		<div class="col-md-12 table-bordered">
			<div class="col-md-12" style="margin-bottom: 20px;">
				<h2>Información General</h2>
			</div>
			<div style="text-align: left;">
				<div class="form-group col-md-4" style="font-size: 16px; text-transform: capitalize;">
					<label style="font-weight: bold;">¿Pertenece usted a algún pueblo indígena?</label>
					<br>
					<span>{{ $solicitud->pueblo_indigena }}</span>
				</div>
				<div class="form-group col-md-3" style="font-size: 16px; text-transform: capitalize;">
					<label style="font-weight: bold;">¿Habla usted otros idiomas?</label>
					<br>
					<span>{{ $solicitud->idiomas }}</span>
				</div>
				<div class="form-group col-md-5" style="font-size: 16px; text-transform: capitalize;">
					<label style="font-weight: bold;">Talleres, conocimientos, cuross y/o saberes (otro tipo de formación):</label>
					<br>
					<span>{{ $solicitud->cursos }}</span>
				</div>
				<div class="form-group col-md-4" style="font-size: 16px; text-transform: capitalize;">
					<label style="font-weight: bold;">¿Están relacionados con su actividad artística?</label>
					<br>
					<span>{{ $solicitud->relacionados_actividad_artistica }}</span>
				</div>
				<div class="form-group col-md-4" style="font-size: 16px;">
					<label style="font-weight: bold;">¿Cuántos años tiene realizando la actividad artística?</label>
					<br>
					<span>{{ $solicitud->tiempo_actividad_artistica }} años</span>
				</div>
				<div class="form-group col-md-4" style="font-size: 16px;">
					<label style="font-weight: bold;">¿Ha recibido algún premio o reconocimiento institucional?</label>
					<br>
					<span>{{ $solicitud->premio }}</span>
				</div>
				<div class="form-group col-md-2" style="font-size: 16px;">
					<label style="font-weight: bold;">Tipo de Premio:</label>
					<br>
					<span>{{ $solicitud->tipoPremio->tipo_premio }}</span>
				</div>
				<div class="form-group col-md-3" style="font-size: 16px;">
					<label style="font-weight: bold;">Disciplinas Artísticas:</label>
					<br>
					@foreach($solicitud->disciplinas as $disciplina)
						<span>{{ $disciplina->disciplina }}.</span>
					@endforeach
				</div>
				<div class="form-group col-md-4" style="font-size: 16px;">
					<label style="font-weight: bold;">¿Pertenece usted a una organiczación, grupo o colectvo?</label>
					<br>
					<span>{{ $solicitud->grupo }}</span>
				</div>
				<div class="form-group col-md-3" style="font-size: 16px;">
					<label style="font-weight: bold;">¿Qué tipo de organiczación, grupo o colectvo?</label>
					<br>
					<span>{{ $solicitud->tipo_grupo }}</span>
				</div>
				<div class="form-group col-md-6" style="font-size: 16px;">
					<label style="font-weight: bold;">¿Estaría dispuesto(a) a participar en actividades socioculturales y/o educativas?</label>
					<br>
					<span>{{ $solicitud->activiades_educativas }}</span>
				</div>
				<div class="form-group col-md-6" style="font-size: 16px;">
					<label style="font-weight: bold;">¿Recibe usted apoyo económico para la actividad artística que realiza?</label>
					<br>
					<span>{{ $solicitud->apoyo_economico }}</span>
				</div>
				<div class="form-group col-md-3" style="font-size: 16px;">
					<label style="font-weight: bold;">¿Tiene empleo formal remunerado?</label>
					<br>
					<span>{{ $solicitud->empleo }}</span>
				</div>
				<div class="form-group col-md-3" style="font-size: 16px;">
					<label style="font-weight: bold;">¿Cuál es su ingreso mensual?</label>
					<br>
					<span>{{ $solicitud->sueldo }}</span>
				</div>
				<div class="form-group col-md-6" style="font-size: 16px;">
					<label style="font-weight: bold;">¿Es usted jubilado de alguna institución pública o privada?</label>
					<br>
					<span>{{ $solicitud->jubilado }}</span>
				</div>
				<div class="form-group col-md-4" style="font-size: 16px;">
					<label style="font-weight: bold;">¿Es usted pensionado(a) por el IVSS?</label>
					<br>
					<span>{{ $solicitud->pensionado }}</span>
				</div>
				<div class="form-group col-md-6" style="font-size: 16px;">
					<label style="font-weight: bold;">¿Recibe usted algún subsidio, recurso o apoyo social?</label>
					<br>
					<span>{{ $solicitud->subsidio }}</span>
				</div>
			</div>
		</div>
		<div class="col-md-12 table-bordered">
			<div class="col-md-12" style="margin-bottom: 20px;">
				<h2>Imagenes</h2>
			</div>
			<div class="col-md-12">
				<div class="gallery-items  lightgallery  three-columns">
					@foreach($solicitud->solicitudImagenes as $imagen)
			            <div class="gallery-item">
			                <div class="grid-item-holder">
			                    <div class="box-item fl-wrap   popup-box">
			                        <img  src="{{ asset('images/usuarios/'.$imagen->imagen) }}" style="width: auto; max-height: 200px; height: 200px;" alt="">
			                        <a data-src="{{ asset('images/usuarios/'.$imagen->imagen) }}" class="popup-image"><i class="fa fa-search"></i></a>
			                    </div>
			                </div>
			            </div>
			        @endforeach
			    </div>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<div class="main-sidebar">
			<div class="main-sidebar-widgets">
				<div class="main-sidebar-widget" style="margin-top: 20px;">
	                <h3>Usuario: {{ $solicitud->user->name }}</h3>
	                <img src="{{ asset('images/usuarios/'.$solicitud->user->foto) }}" style="width: auto; height: 240px;">
                	<div style="margin-top: 15px;">
                		<button class="btn btn-success" onclick="calificar({{ $solicitud->id }}, 'aceptar')">Aceptar</button>
                		<button class="btn btn-danger" onclick="calificar({{ $solicitud->id }}, 'rechazar')">Rechazar</button>
                	</div>
	            </div>
	        </div>
		</div>
	</div>
@endsection
@section('js')
	<script src="{{ asset('js/admin/solicitudes.js') }}"></script>
@endsection