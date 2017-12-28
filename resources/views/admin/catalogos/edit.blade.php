@extends('template.main')
@section('title', $catalogo->artista->nombre)
@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/DataTables/dataTables.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/DataTables/DataTables-1.10.16/css/jquery.dataTables.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/DataTables/Buttons-1.4.2/css/buttons.dataTables.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/DataTables/Responsive-2.2.0/css/responsive.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/trumbowyg/ui/trumbowyg.css') }}">
@endsection
@section('content')
    @include('admin.catalogos.imagen')
    @foreach($catalogo->artistasCatalogosImagenes as $imagen)
        <div class="modal fade" id="imagen{{ $imagen->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Editar información de la imagen</h4>
                    </div>
                    @include('template.partials.required')
                    <div class="modal-body">
                        {!! Form::open(['route'=>['artistasimagenes.update', $imagen->id],'method'=>'PUT', 'role'=>'form', 'files'=>true]) !!}
                            {!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
                            <div class="box-body">
                                <div class="form-group col-md-12">
                                    {!! Form::label('imagen', 'Imagen', ['class'=>'pull-left']) !!}
                                    {!! Form::file('imagen', ['class'=>'form-control', 'id'=>'imagen_imagen']) !!}
                                </div>
                                <div class="form-group col-md-12">
                                    {!! Form::label('nombre', '*Nombre',['class'=>'pull-left']) !!}
                                    {!! Form::text('nombre', $imagen->nombre, ['class'=>'form-control', 'placeholder'=>'Nombre', 'required', 'id'=>'nombre_imagen']) !!}
                                </div>
                                <div class="form-group col-md-12">
                                    {!! Form::label('descripcion', 'Descripción',['class'=>'pull-left']) !!}
                                    {!! Form::textarea('descripcion', $imagen->descripcion, ['class'=>'form-control', 'placeholder'=>'Descripción', 'id'=>'descripcion_imagen']) !!}
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
    @endforeach
    <!-- portfolio  Images  -->
    <div class="vis-pan bvp no-mpan">
        <div class="show-details cpdet novisdet">Detalles</div>
        <div class="caption alc"></div>
        <span class="show-thumbs vis-con-panel vis-t" data-textshow="Mostrar en miniatura" data-texthide="Esconder miniaturas"></span>
        <div class="num-holder2"></div>
    </div>
    <div class="resize-carousel-holder lightgallery nofssc">
        <div id="opciones"></div>
        <div id="gallery_horizontal" class="gallery_horizontal" data-cen="1" data-loops="1">
            @foreach($catalogo->artistasCatalogosImagenes as $imagen)
                <!-- gallery Item-->
                @if($imagen->status->status=='Disponible')
                    <div class="horizontal_item" data-phname="{{ $imagen->nombre }}" data-phdesc="- {{ $imagen->descripcion }} -">
                @elseif($imagen->status->status=='Bloqueado')
                    <div class="horizontal_item" style="color: #dd4b39 !important;" data-phname="¡Esta imagen ha sido bloqueada al público en general!" data-phdesc="Por favor, cambie o elimine la imagen.">
                @endif
                    <img src="{{ asset('images/artistas/'.$imagen->imagen) }}" alt="">
                    <a data-src="{{ asset('images/artistas/'.$imagen->imagen) }}" class="popup-image slider-zoom" data-toggle="tooltip" title="Zoom"><i class="fa fa-expand"></i></a>
                    @if($catalogo->artista->tipo==0)
                        <a onclick="Item('¿Está seguro de eliminar la imagen?','{{ route('artistasimagenes.destroy', $imagen->id) }}', 'Si, Eliminar!', 'No se ha elimininado la imagen.')" class="slider-zoom" style="margin-right: 40px;" ata-toggle="tooltip" title="Eliminar"><i class="fa fa-trash"></i></a>
                        <a data-toggle='modal' data-target='#imagen{{ $imagen->id }}' class="slider-zoom" style="margin-right: 80px;" ata-toggle="tooltip" title="Editar"><i class="fa fa-pencil-square-o"></i></a>
                    @elseif($catalogo->artista->tipo==1)
                        @foreach(Auth::user()->perfiles as $perfil)
                            @if($perfil->perfil=='Artista')
                                 @foreach($catalogo->artista->users as $user)
                                    @if($user->id==Auth::user()->id)
                                        <a onclick="Item('¿Está seguro de eliminar la imagen?','{{ route('artistasimagenes.destroy', $imagen->id) }}', 'Si, Eliminar!', 'No se ha elimininado la imagen.')" class="slider-zoom" style="margin-right: 80px;" ata-toggle="tooltip" title="Eliminar"><i class="fa fa-trash"></i></a>
                                        <a data-toggle='modal' data-target='#imagen{{ $imagen->id }}' class="slider-zoom" style="margin-right: 120px;" ata-toggle="tooltip" title="Editar"><i class="fa fa-file-image-o"></i></a>
                                    @endif
                                @endforeach
                            @else
                                @if($imagen->status->status=='Disponible')
                                    <a onclick="Item('¿Está seguro de bloquear la imagen?','{{ route('artistasimagenes.lock', $imagen->id) }}', 'Si, Bloquear!', 'No se ha bloqueado la imagen.')" class="slider-zoom" style="margin-right: 40px;" ata-toggle="tooltip" title="Bloquear"><i class="fa fa-lock"></i></a>
                                @elseif($imagen->status->status=='Bloqueado')
                                    <a onclick="Item('¿Está seguro de desbloquear la imagen?','{{ route('artistasimagenes.unlock', $imagen->id) }}', 'Si, Desbloquear!', 'No se ha desbloquear la imagen.')" class="slider-zoom" style="margin-right: 40px;" ata-toggle="tooltip" title="Desbloquear"><i class="fa fa-unlock"></i></a>
                                @endif
                                @break
                            @endif
                        @endforeach
                    @endif
                </div>
                <!-- gallery item end-->
            @endforeach                            
        </div>
        <!--  navigation -->
        <div class="customNavigation gals">
            <a class="prev-slide transition"> <i class="fa fa-angle-left"></i></a>
            <a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
        </div>
        <!--  navigation end-->
    </div>
    <!-- portfolio  Images  end-->
    <!-- pdet-container -->
    <div class="det-container anim-sb ver-scroll">
        <div class="content-nav">
            <h2 style="text-transform: capitalize; font-size: 28px; font-style: italic;">{{ $catalogo->artista->nombre }}</h2>
        </div>
        {!! Form::hidden('id', 0, ['id'=>'id']) !!}
        {!! Form::hidden('id', $catalogo->id, ['id'=>'id_catalogo']) !!}
        {!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
        {!! Form::hidden('user', Auth::user()->perfiles->first()->perfil, ['id'=>'user']) !!}
        {!! Form::hidden('id_artista', Auth::user()->artistas->first()->id, ['id'=>'id_artista']) !!}
        <div class="det-info">
            <div class="ocultar" id="editar">
                {!! Form::open(['id'=>'form_actualizar', 'role'=>'form', 'files'=>true, 'name'=>'form_actualizar', 'method'=>'PUT']) !!}
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        {!! Form::label('titulo', '*Título', ['class'=>'pull-left']) !!}
                        {!! Form::text('titulo', null, ['class'=>'form-control', 'placeholder'=>'Título', 'required', 'id'=>'titulo']) !!}
                    </div>
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        {!! Form::label('descripcion', '*Descripción', ['class'=>'pull-left']) !!}
                        {!! Form::textarea('descripcion', null, ['class'=>'form-control', 'placeholder'=>'Descripción', 'required', 'rows'=>'20', 'id'=>'descripcion_catalogo']) !!}
                    </div>
                    <div class="form-group col-md-9 col-sm-12 col-xs-12" style="margin-top: 6%;">
                        {!! Form::label('disciplinas', 'Disciplina(s)', ['class'=>'pull-left']) !!}
                        {!! Form::select('disciplinas[]', $disciplinas, null, ['class'=>'form-control col-md-12 col-sm-12 col-xs-12 multiple', 'multiple', 'required', 'id'=>'disciplinas']) !!}
                    </div>
                    <div class="form-group col-md-8 col-md-offset-2">
                        {!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="ocultar" id="informacion">
                <h2 style="text-align: justify; font-size: 20px;" id="p_titulo"></h2>
                <h3></h3>
                <p style="text-align: justify;" id="p_descripcion"></p>
                <h4><strong>Disciplinas</strong></h4>
                <p id="p_disciplinas"></p>
            </div>
        </div>
    </div>
    <!-- pdet-container end-->
@endsection
@section('js')
    <script>
        $('#contenido').removeClass('content scroll-content');
        $("#contenido").addClass('content hor-content full-height');
        $("#footer").attr('style', 'display: none;');
        $("#vacio").attr('style', 'display: none;');
    </script>
	<script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
    <script src="{{ asset('js/admin/artistas.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/dataTables.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/DataTables-1.10.16/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/Buttons-1.4.2/js/dataTables.buttons.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/Responsive-2.2.0/js/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('plugins/trumbowyg/trumbowyg.js') }}"></script>
    <script src="{{ asset('plugins/trumbowyg/langs/es.min.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/locales/bootstrap-datepicker.es.js') }}"></script>
@endsection