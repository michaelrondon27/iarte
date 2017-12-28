@extends('template.main')
@section('css')
  	<link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
  	<link rel="stylesheet" href="{{ asset('plugins/trumbowyg/ui/trumbowyg.css') }}">
@endsection
@section('content')
	{!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
    {!! Form::hidden('id', $noticia->id, ['id'=>'id']) !!}
    {!! Form::hidden('control', 'edit', ['id'=>'control']) !!}
    <div class="modal fade" id="foto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        	<h4 class="modal-title" id="myModalLabel">Cambiar Imagen</h4>
		      	</div>
		      	@include('template.partials.required')
		      	<div class="modal-body">
		      		{!! Form::open(['id'=>'form_imagen', 'role'=>'form', 'files'=>true, 'name'=>'form_imagen']) !!}
	            		<div class="box-body">
							<div class="form-group col-md-8 col-md-offset-2">
								{!! Form::label('imagen', '*Imagen', ['class'=>'pull-left']) !!}
								{!! Form::file('imagen', ['class'=>'form-control', 'required', 'id'=>'imagen_registrar']) !!}
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
	<!-- section -->
    <section  >
        <div class="container-fluid">
            <div class="section-title ">
                <h2>Editar Noticia</h2>
                <div class="dec-separator"><img src="{{ asset('images/logo.png') }}" alt="" style="width: 50px;"> </div>
            </div>
            <!--<a href="{{ route('noticias.index') }}" class="btn btn-vinotinto">Listado de Noticias</a>-->
            <div class="row single-post">
                <!-- article wrap -->
                <div class="col-md-12">
                    <div class="fl-wrap">
                        <!-- article  -->
                        <article class="fw-artc">
                        	<div class="col-md-3 col-sm-3 col-xs-12">
	                        	<div class="box-header" style="text-align: right; z-index: 1000;" id="imagen_modal"></div>
	                            <div class="blog-media" id="imagen"></div>
	                            <ul class="cat-list">
	                                <li id="publicado"></li>
	                                <li id="visitas"></li>
	                            </ul>
                            	<div class="form-group col-md-12 col-sm-12 col-xs-12">
									{!! Form::label('titulo', '*Título', ['class'=>'pull-left']) !!}
									{!! Form::text('titulo', null, ['class'=>'form-control', 'placeholder'=>'Título', 'required', 'id'=>'titulo']) !!}
								</div>
								{!! Form::text('status_id', null, ['id'=>'status', 'class'=>'ocultar']) !!}
								<div class="form-group col-md-12 col-sm-12 col-xs-12">
									{!! Form::label('etiquetas', '*Etiqueta', ['class'=>'pull-left']) !!}
									{!! Form::select('etiquetas[]', $etiquetas, null, ['class'=>'form-control multiple', 'multiple', 'id'=>'etiquetas']) !!}
								</div>
								<div class="form-group col-sm-8 col-sm-offset-2">
							      	{!! Form::button('Guardar',['class'=>'btn btn-vinotinto', 'id'=>'form_actualizar']) !!}
							    </div>
							</div>
							<div class="col-md-9 col-sm-9 col-xs-12">
                            	<div class="form-group col-md-12 col-sm-12 col-xs-12">
									{!! Form::label('contenido', '*Contenido', ['class'=>'pull-left label_biografia']) !!}
									<br>
									{!! Form::textarea('contenido', null, ['class'=>'form-control contenido', 'required', 'id'=>'contenido_actualizar']) !!}
								</div>
							</div>
                        </article>
                        <!-- article  end -->
                    </div>
                </div>
                <!-- article wrap end -->
            </div>
        </div>
    </section>
    <!--section  end -->
@endsection
@section('js')
  	<script src="{{ asset('js/admin/noticias.js') }}"></script>
  	<script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
  	<script src="{{ asset('plugins/trumbowyg/trumbowyg.js') }}"></script>
  	<script src="{{ asset('plugins/trumbowyg/langs/es.min.js') }}"></script>
@endsection