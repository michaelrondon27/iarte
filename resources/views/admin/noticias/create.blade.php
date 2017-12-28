<div class="box-body ocultar" id="cuadro1">
  	<div class="form-group col-sm-8 col-sm-offset-2">
    	<h2>Crear Noticia</h2>
   		@include('template.partials.required')
  	</div>
    {!! Form::open(['id'=>'form_registrar', 'role'=>'form', 'files'=>true, 'name'=>'form_registrar', 'method'=>'POST']) !!}
		<div class="form-group col-md-6 col-sm-12 col-xs-12">
			{!! Form::label('titulo', '*Título', ['class'=>'pull-left']) !!}
			{!! Form::text('titulo', null, ['class'=>'form-control', 'placeholder'=>'Título', 'required', 'id'=>'titulo']) !!}
		</div>
		<div class="form-group col-md-6 col-sm-12 col-xs-12">
			{!! Form::label('imagen', 'Imagen', ['class'=>'pull-left']) !!}
			{!! Form::file('imagen', ['class'=>'form-control', 'id'=>'imagen']) !!}
		</div>
		<div class="form-group col-md-6 col-sm-12 col-xs-12">
			{!! Form::label('status_id', '*Estatus', ['class'=>'pull-left']) !!}
			{!! Form::select('status_id', $status, null, ['class'=>'form-control select', 'required', 'placeholder'=>'Seleccione una opción', 'id'=>'status']) !!}
		</div>
		<div class="form-group col-md-6 col-sm-12 col-xs-12">
			{!! Form::label('etiquetas', '*Etiqueta', ['class'=>'pull-left']) !!}
			{!! Form::select('etiquetas[]', $etiquetas, null, ['class'=>'form-control multiple', 'multiple', 'id'=>'etiquetas']) !!}
		</div>
		<div class="form-group col-md-12 col-sm-12 col-xs-12">
			{!! Form::label('contenido', '*Contenido', ['class'=>'pull-left label_biografia']) !!}
			<br>
			{!! Form::textarea('contenido', null, ['class'=>'form-control contenido', 'required', 'id'=>'contenido']) !!}
		</div>
		<div class="form-group col-sm-8 col-sm-offset-2">
	      	{!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
	      	{!! Form::button('Listado',['class'=>'btn btn-vinotinto', 'id'=>'listado_registrar']) !!}
	    </div>
	{!! Form::close() !!}
</div>