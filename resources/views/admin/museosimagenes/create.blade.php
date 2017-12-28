<div class="modal fade" id="imagen_registrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title" id="myModalLabel">Agregar Imagen</h4>
	      	</div>
	      	@include('template.partials.required')
	      	<div class="modal-body">
	      		{!! Form::open(['id'=>'form_imagen_registrar', 'role'=>'form', 'files'=>true, 'name'=>'form_imagen_registrar']) !!}
            		<div class="box-body">
						<div class="form-group col-md-6">
							{!! Form::label('imagen', '*Imagen', ['class'=>'pull-left']) !!}
							{!! Form::file('imagen', ['class'=>'form-control', 'required', 'id'=>'foto_imagen_registrar']) !!}
						</div>
						<div class="form-group col-md-6">
							{!! Form::label('titulo', '*Título', ['class'=>'pull-left']) !!}
							{!! Form::text('titulo', null, ['class'=>'form-control', 'placeholder'=>'Título', 'required', 'id'=>'titulo_registrar']) !!}
						</div>
						<div class="form-group col-md-12">
							{!! Form::label('artista_id', 'Artista', ['class'=>'pull-left']) !!}
                            {!! Form::select('artista_id', $artistas, null, ['class'=>'form-control select', 'id'=>'artista_registrar']) !!}
						</div>
						<div class="form-group col-md-12 col-sm-12 col-xs-12">
                            {!! Form::label('reseña', 'Reseña', ['class'=>'pull-left']) !!}
                            {!! Form::textarea('reseña', null, ['class'=>'form-control', 'id'=>'reseña_registrar']) !!}
                        </div>
						{!! Form::hidden('museo_id', $museo->id) !!}
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