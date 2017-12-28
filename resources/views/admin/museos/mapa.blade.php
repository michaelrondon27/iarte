<div class="modal fade" id="mapa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title" id="myModalLabel">Configurar Coordenadas del Mapa</h4>
	      	</div>
	      	@include('template.partials.required')
	      	<div class="modal-body">
	      		{!! Form::open(['id'=>'form_mapa', 'role'=>'form', 'name'=>'form_mapa', 'method'=>'POST']) !!}
            		<div class="box-body">
						<div class="form-group col-md-8 col-md-offset-2">
							{!! Form::label('latitud', '*Latitud', ['class'=>'pull-left']) !!}
							{!! Form::text('latitud', null, ['class'=>'form-control', 'required', 'id'=>'latitud', 'onkeypress'=>'return solonumeros(event)']) !!}
						</div>
						<div class="form-group col-md-8 col-md-offset-2">
							{!! Form::label('longitud', '*Longitud', ['class'=>'pull-left']) !!}
							{!! Form::text('longitud', null, ['class'=>'form-control', 'required', 'id'=>'longitud', 'onkeypress'=>'return solonumeros(event)']) !!}
						</div>
						<div class="form-group col-md-8 col-md-offset-2">
							{!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
						</div>
					</div>
				{!! Form::close() !!}
	      	</div>
    	</div>
  	</div>
</div>