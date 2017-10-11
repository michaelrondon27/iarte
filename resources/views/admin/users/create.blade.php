<div class="box-body ocultar" id="cuadro1">
  	<div class="form-group col-sm-8 col-sm-offset-2">
    	<h2>Registrar Usuario</h2>
   		@include('template.partials.required')
  	</div>
    {!! Form::open(['id'=>'form_registrar', 'role'=>'form']) !!}
		<div class="form-group col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
			{!! Form::label('name', '*Nombre', ['class'=>'pull-left']) !!}
			{!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre', 'required', 'onkeypress'=>'return sololetras(event)', 'id'=>'name_registrar']) !!}
		</div>
		<div class="form-group col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
			{!! Form::label('email', '*Correo', ['class'=>'pull-left']) !!}
			{!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'ejemplo@ejemplo.com', 'required', 'id'=>'email_registrar']) !!}
		</div>
		<div class="form-group col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
			{!! Form::label('password', '*Contraseña', ['class'=>'pull-left']) !!}
			{!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'***********', 'required', 'id'=>'password_registrar']) !!}
		</div>
		<div class="form-group col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
			{!! Form::label('password_confirmation', '*Contraseña', ['class'=>'pull-left']) !!}
			{!! Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=>'***********', 'required', 'id'=>'password_confirmation_registrar']) !!}
		</div>
		<div class="form-group col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
			{!! Form::label('perfil', '*Perfil(es)', ['class'=>'pull-left']) !!}
			{!! Form::select('perfil[]', $perfiles, null, ['class'=>'form-control col-md-12 col-sm-12 col-xs-12', 'multiple', 'required', 'id'=>'perfil_registrar']) !!}
		</div>
		{!! Form::hidden('status_id', 1) !!}
		<div class="form-group col-sm-8 col-sm-offset-2">
	      	{!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
	      	{!! Form::button('Listado',['class'=>'btn btn-vinotinto', 'id'=>'listado_registrar']) !!}
	    </div>
	{!! Form::close() !!}
</div>