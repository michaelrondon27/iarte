<div class="modal fade" id="portada" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title" id="myModalLabel">Cambiar Imagen de Portada</h4>
	      	</div>
	      	@include('template.partials.required')
	      	<div class="modal-body">
	      		{!! Form::open(['id'=>'form_portada', 'role'=>'form', 'files'=>true, 'name'=>'form_portada']) !!}
            		<div class="box-body">
						<div class="form-group col-md-8 col-md-offset-2">
							{!! Form::label('foto', '*Foto', ['class'=>'pull-left']) !!}
							{!! Form::file('foto', ['class'=>'form-control', 'required', 'id'=>'foto_portada']) !!}
						</div>
						<div class="form-group col-md-8 col-md-offset-2">
							{!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
						</div>
					</div>
				{!! Form::close() !!}
				<div class="progress ocultar pb">
				  	<div class="progress-bar progress-bar-info progress-bar-striped progressBar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>
				</div>
	      	</div>
    	</div>
  	</div>
</div>