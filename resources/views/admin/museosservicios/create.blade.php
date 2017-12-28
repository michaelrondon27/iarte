<div class="box-body ocultar" id="cuadro8" style="background-color: rgba(255, 255, 255, 0.2); border-radius: 10px;">
	<div class="form-group col-sm-8 col-sm-offset-2">
		<h2 style="color: black;">Registrar Servicio</h2>
		@include('template.partials.required')
	</div>
	{!! Form::open(['id'=>'form_registrar_servicio', 'role'=>'form', 'name'=>'form_registrar_servicio', 'method'=>'POST']) !!}
		<div class="form-group col-sm-12">
			{!! Form::label('servicio', '*Servicio',['class'=>'pull-left']) !!}
			{!! Form::text('servicio', null, ['class'=>'form-control', 'placeholder'=>'Servicio', 'required', 'id' => 'servicio_registrar']) !!}
		</div>
        <div class="form-group col-sm-12">
            {!! Form::label('descripcion', '*Descripción', ['class'=>'pull-left negrita label_biografia']) !!}
            <br>
            {!! Form::textarea('descripcion', null, ['class'=>'form-control', 'id'=>'descripcion_registrar']) !!}
        </div>
        {{ Form::text('museo_id', null, ['id'=>'museo_id_servicio_registrar', 'class'=>'ocultar']) }}
		<div class="form-group col-sm-8 col-sm-offset-2">
			{!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
			{!! Form::button('Listado',['class'=>'btn btn-vinotinto', 'id'=>'listado_registrar_servicio']) !!}
		</div>
	{!! Form::close() !!}
</div>