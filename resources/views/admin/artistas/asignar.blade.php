<div class="box-body ocultar" id="cuadro3">
  	<div class="form-group col-sm-8 col-sm-offset-2">
    	<h2>Asignar Usuarios</h2>
   		@include('template.partials.required')
  	</div>
    {!! Form::open(['id'=>'form_asignar', 'role'=>'form', 'name'=>'form_asignar', 'method'=>'POST']) !!}
		<div class="form-group col-sm-8 col-sm-offset-2"">
			{!! Form::label('usuarios', '*Asignar Usuarios', ['class'=>'pull-left']) !!}
			{!! Form::select('usuarios[]', $usuarios, null, ['class'=>'form-control multiple', 'multiple', 'id'=>'asignar']) !!}
		</div>
		{{ Form::text('artista_id', null, ['id'=>'artista_id', 'class'=>'ocultar']) }}
		<div class="form-group col-sm-8 col-sm-offset-2">
	      	{!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
	      	{!! Form::button('Listado',['class'=>'btn btn-vinotinto', 'id'=>'listado_asignar']) !!}
	    </div>
	{!! Form::close() !!}
</div>