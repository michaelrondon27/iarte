<div class="box-body ocultar" id="cuadro1">
	<div class="form-group col-sm-8 col-sm-offset-2">
		<h2>Registrar Etiqueta</h2>
		@include('template.partials.required')
	</div>
	{!! Form::open(['id'=>'form_registrar', 'role'=>'form']) !!}
		<div class="form-group col-sm-8 col-sm-offset-2">
			{!! Form::label('etiqueta', '*Etiqueta',['class'=>'pull-left']) !!}
			{!! Form::text('etiqueta', null, ['class'=>'form-control', 'placeholder'=>'Etiqueta', 'required', 'id' => 'etiqueta_registrar', 'onkeypress'=>'return sololetras(event)']) !!}
		</div>
		<div class="form-group col-sm-8 col-sm-offset-2">
			{!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
			{!! Form::button('Listado',['class'=>'btn btn-vinotinto', 'id'=>'listado_registrar']) !!}
		</div>
	{!! Form::close() !!}
</div>