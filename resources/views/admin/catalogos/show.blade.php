@extends('template.main')
@section('title', $artista->nombre)
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
    <section data-scrollax-parent="true">
        <div class="section-title ">
            <h2>Mi Portafolio</h2>
            <h4 style="text-transform: capitalize;">{{ $artista->nombre }}</h4>
        </div>
        <div class="container big-container">
            <div class="fl-wrap inline-filter npf">
                <div class="container big-container">
                    <div class="filter-button">Filtro</div>
                    <div class="gallery-filters ">
                        <span>Filtro : </span>
                        <a href="#" class="gallery-filter transition2 gallery-filter_active" data-filter="*">Todos</a>
                        @foreach($tags as $tag)
                            <a href="#" class="gallery-filter transition2" data-filter=".{{ $tag->disciplina }}">{{ $tag->disciplina }}</a>
                        @endforeach
                    </div>
                    <div class="folio-counter">
                        <div class="num-album"></div>
                        <div class="all-album"></div>
                        <i class="fa fa-align-right" aria-hidden="true"></i>
                    </div>
                    <div class="share-holder hid-share">
                        <div class="box-header ocultar" style="text-align: left;" id="agregarPortafolio">
                            <button class='btn btn-vinotinto' onClick='agregar("#cuadro4", "#cuadro5");'><i class='fa fa-folder-o' aria-hidden='true'></i> Nuevo Portafolio</button>
                        </div>
                        <div class="box-header ocultar" style="text-align: left;" id="listaPortafolio">
                            <button class='btn btn-vinotinto' onClick='visualizar("#cuadro5", "#cuadro4");'><i class='fa fa-folder-o' aria-hidden='true'></i> Listado de Portafolio</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=============== portfolio holder ===============-->
        @include('admin.catalogos.create')
        <div class="gallery-items   three-columns" id="cuadro5">
            @if($catalogos->count()>0)
                @foreach($catalogos as $catalogo)
                    @php
                        $disciplinas="";
                    @endphp
                    @foreach($catalogo->disciplinas as $disciplina)
                        @php
                            $disciplinas.=$disciplina->disciplina." ";
                        @endphp
                    @endforeach
                    <!--gallery-item -->
                    <div class="gallery-item  {{ $disciplinas }}">
                        <div class="grid-item-holder">
                            <div class="box-item fl-wrap   popup-box">
                                @if($catalogo->artistasCatalogosImagenes->count()>0)
                                    <img src="{{ asset('images/artistas/'.$catalogo->artistasCatalogosImagenes->first()->imagen) }}" alt="Imagen Catalogo" style="max-width: 500px; max-height: 240px; height: 240px;">
                                @else
                                    <img src="{{ asset('images/artistas/noimage.png') }}" alt="Imagen Catalogo" style="max-width: 500px; max-height: 240px; height: 240px;">
                                @endif
                                <a href="{{ route('artistascatalogos.edit', $catalogo->id) }}" class="ajax"><i class="fa fa-link"></i></a>
                            </div>
                            <div class="det-box fl-wrap" >
                                @if($artista->tipo==0)
                                    @if($catalogo->status->status=="Disponible")
                                        <h3><a href="{{ route('artistascatalogos.edit', $catalogo->id) }}" class="ajax">{{ $catalogo->titulo }}</a></h3>
                                        <p style="text-align: center !important;"><a onclick="Item('¿Está seguro de bloquear al público este portafolio?','{{ route('artistascatalogos.lock', $catalogo->id) }}', 'Si, Bloquear!', 'No se ha bloqueado.')" class="btn-warning badge" data-toggle="tooltip" title="Bloquear"><i class="fa fa-lock" aria-hidden="true"></i></a> <a onclick="Item('¿Está seguro de eliminar este portafolio?','{{ route('artistascatalogos.destroy', $catalogo->id) }}', 'Si, Eliminar!', 'No se ha eliminado.')" class="btn-warning badge" data-toggle="tooltip" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></a></p>
                                    @elseif($catalogo->status->status=="Bloqueado")
                                        <h3><a href="{{ route('artistascatalogos.edit', $catalogo->id) }}" class="ajax">Este portafolio ha sido bloqueado</a></h3>
                                        <p style="text-align: center !important;"><a onclick="Item('¿Está seguro de habilitar al público este portafolio?','{{ route('artistascatalogos.unlock', $catalogo->id) }}', 'Si, Habilitar!', 'No se ha habilitar.')" class="btn-warning badge" data-toggle="tooltip" title="Bloquear"><i class="fa fa-unlock" aria-hidden="true"></i></a> <a onclick="Item('¿Está seguro de eliminar este portafolio?','{{ route('artistascatalogos.destroy', $catalogo->id) }}', 'Si, Eliminar!', 'No se ha eliminado.')" class="btn-warning badge" data-toggle="tooltip" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></a></p>
                                    @endif
                                @elseif($artista->tipo==1)
                                    @if($catalogo->status->status=="Disponible")
                                        <h3><a href="{{ route('artistascatalogos.edit', $catalogo->id) }}" class="ajax">{{ $catalogo->titulo }}</a></h3>
                                    @elseif($catalogo->status->status=="Bloqueado")
                                        <h3><a href="{{ route('artistascatalogos.edit', $catalogo->id) }}" class="ajax">Este portafolio ha sido bloqueado.</a></h3>
                                    @endif
                                    <p><a onclick="Item('¿Está seguro de eliminar este portafolio?','{{ route('artistascatalogos.destroy', $catalogo->id) }}', 'Si, Eliminar!', 'No se ha eliminado.')" class="btn-warning badge" data-toggle="tooltip" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></a></p>
                                    @foreach(Auth::user()->perfiles as $perfil)
                                        @if($perfil->perfil!='Artista')
                                            @if($catalogo->status->status=="Disponible")
                                                <p style="text-align: center !important;"><a onclick="Item('¿Está seguro de bloquear al público este portafolio?','{{ route('artistascatalogos.lock', $catalogo->id) }}', 'Si, Bloquear!', 'No se ha bloqueado.')" class="btn-warning badge" data-toggle="tooltip" title="Bloquear"><i class="fa fa-lock" aria-hidden="true"></i></a></p>
                                            @elseif($catalogo->status->status=="Bloqueado")
                                                <p style="text-align: center !important;"><a onclick="Item('¿Está seguro de habilitar al público este portafolio?','{{ route('artistascatalogos.unlock', $catalogo->id) }}', 'Si, Habilitar!', 'No se ha habilitar.')" class="btn-warning badge" data-toggle="tooltip" title="Bloquear"><i class="fa fa-unlock" aria-hidden="true"></i></a></p>
                                            @endif
                                            @break
                                        @endif
                                    @endforeach
                                @endif
                                <h4>
                                    @foreach($catalogo->disciplinas as $disciplina)
                                        <a style="color: black; cursor: default;">{{ $disciplina->disciplina }}</a> <span> / </span>
                                    @endforeach
                                </h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h2>No hay catalogos del artista.</h2>
            @endif
        </div>
        {!! Form::hidden('id', $artista->id, ['id'=>'id']) !!}
        {!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
        {!! Form::hidden('user', Auth::user()->perfiles->first()->perfil, ['id'=>'user']) !!}
        {!! Form::hidden('id_artista', Auth::user()->artistas->first()->id, ['id'=>'id_artista']) !!}
        {!! Form::hidden('control', 'show', ['id'=>'control']) !!}
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $('#contenido').removeClass('content scroll-content');
            $("#contenido").addClass('content hor-content full-height');
        });
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