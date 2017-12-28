<div class="modal fade" id="imagen_editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title" id="myModalLabel">Editar Imagen</h4>
	      	</div>
	      	@include('template.partials.required')
	      	<div class="modal-body">
	      		{!! Form::open(['id'=>'form_imagen_editar', 'role'=>'form', 'files'=>true, 'name'=>'form_imagen_editar', 'method'=>'PUT']) !!}
            		<div class="box-body">
						{!! Form::text('id', null, ['id'=>'id_imagen_editar', 'class'=>'ocultar']) !!}
						<div class="form-group col-md-12">
							{!! Form::label('titulo', '*Título', ['class'=>'pull-left']) !!}
							{!! Form::text('titulo', null, ['class'=>'form-control', 'placeholder'=>'Título', 'required', 'id'=>'titulo_editar']) !!}
						</div>
						<div class="form-group col-md-12">
							{!! Form::label('artista_id', 'Artista', ['class'=>'pull-left']) !!}
                            {!! Form::select('artista_id', $artistas, null, ['class'=>'form-control select', 'id'=>'artista_editar']) !!}
						</div>
						<div class="form-group col-md-12 col-sm-12 col-xs-12">
                            {!! Form::label('reseña', 'Reseña', ['class'=>'pull-left']) !!}
                            {!! Form::textarea('reseña', null, ['class'=>'form-control', 'id'=>'reseña_editar']) !!}
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