<div class="box-body ocultar" id="cuadro8">
  	<div class="form-group col-sm-8 col-sm-offset-2">
    	<h2>Editar Red Social</h2>
   		@include('template.partials.required')
  	</div>
<<<<<<< HEAD
    {!! Form::open(['id'=>'form_actualizar_red_social', 'role'=>'form', 'files'=>true, 'name'=>'form_actualizar_red_social', 'method'=>'POST']) !!}
=======
	{!! Form::open(['id'=>'form_actualizar_red_social', 'role'=>'form', 'name'=>'form_actualizar_red_social', 'method'=>'PUT']) !!}
>>>>>>> Prueba
		<div class="box-body">
			<div class="form-group col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
				{!! Form::label('nombre', '*Nombre', ['class'=>'pull-left']) !!}
				{!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre', 'required', 'id'=>'nombre_actualizar']) !!}
			</div>
			<div class="form-group col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
				{!! Form::label('red_social_id', '*Red Social', ['class'=>'pull-left']) !!}
				{!! Form::select('red_social_id', $redesSociales, null, ['class'=>'form-control select', 'required', 'placeholder'=>'Seleccione una opción', 'id'=>'red_social_actualizar']) !!}
			</div>
			{!! Form::text('id_actualizar', null, ['id'=>'id_actualizar', 'class'=>'ocultar']) !!}
			<div class="form-group col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
				{!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
				{!! Form::button('Listado',['class'=>'btn btn-vinotinto', 'id'=>'listado_actualizar_red_social']) !!}
			</div>
		</div>
	{!! Form::close() !!}
	<br><br><br><br>
</div>