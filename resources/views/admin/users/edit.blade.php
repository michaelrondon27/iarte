<div class="box-body ocultar" id="cuadro2">
  	<div class="form-group col-sm-8 col-sm-offset-2">
    	<h2 id="usuario"></h2>
   		@include('template.partials.required')
  	</div>
	{!! Form::open(['id'=>'form_actualizar', 'role'=>'form']) !!}
		<div class="box-body">
			<div class="form-group col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
				{!! Form::label('perfil', '*Perfil(es)', ['class'=>'pull-left']) !!}
				{!! Form::select('perfil[]', $perfiles, null, ['class'=>'form-control col-md-12 col-sm-12 col-xs-12', 'multiple', 'required', 'id'=>'perfil_actualizar']) !!}
			</div>
			<div class="form-group col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2" style="text-transform: capitalize;">
				{!! Form::label('artistas', 'Asignar Artistas', ['class'=>'pull-left']) !!}
				{!! Form::select('artistas[]', $artistas, null, ['class'=>'form-control col-md-12 col-sm-12 col-xs-12 perfiles', 'multiple', 'id'=>'artistas_id']) !!}
			</div>
			<div class="form-group col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2" style="text-transform: capitalize;">
				{!! Form::label('museos', 'Asignar Museos', ['class'=>'pull-left']) !!}
				{!! Form::select('museos[]', $museos, null, ['class'=>'form-control col-md-12 col-sm-12 col-xs-12 perfiles', 'multiple', 'id'=>'museos_id']) !!}
			</div>
			{!! Form::hidden('id', null, ['id'=>'id_actualizar']) !!}
			{!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
			<div class="form-group col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
				{!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
	      	{!! Form::button('Listado',['class'=>'btn btn-vinotinto', 'id'=>'listado_actualizar']) !!}
			</div>
		</div>
	{!! Form::close() !!}
</div>