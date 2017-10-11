<div class="modal fade" id="imagen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title" id="myModalLabel">Añadir Foto al catalogo</h4>
	      	</div>
	      	@include('template.partials.required')
	      	<div class="modal-body">
	      		{!! Form::open(['route'=>'artistasimagenes.store', 'method'=>'POST', 'role'=>'form', 'files'=>true]) !!}
            		<div class="box-body">
						<div class="form-group col-md-12">
							{!! Form::label('imagen', '*Imagen', ['class'=>'pull-left']) !!}
							{!! Form::file('imagen', ['class'=>'form-control', 'required']) !!}
						</div>
						<div class="form-group col-md-12">
							{!! Form::label('nombre', '*Nombre',['class'=>'pull-left']) !!}
							{!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre', 'required']) !!}
						</div>
						<div class="form-group col-md-12">
							{!! Form::label('descripcion', 'Descripción',['class'=>'pull-left']) !!}
							{!! Form::textarea('descripcion', null, ['class'=>'form-control', 'placeholder'=>'Descripción']) !!}
						</div>
						{!! Form::hidden('artista_catalogo_id', $catalogo->id) !!}
						{!! Form::hidden('artista_id', $catalogo->artista_id) !!}
						{!! Form::hidden('status_id', 3) !!}
						{!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
						<div class="form-group col-md-8 col-md-offset-2">
							{!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
						</div>
					</div>
				{!! Form::close() !!}
	      	</div>
    	</div>
  	</div>
</div>