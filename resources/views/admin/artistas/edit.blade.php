@extends('template.main')
@section('title', 'Artistas')
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
    {!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
    {!! Form::hidden('id', $artista->id, ['id'=>'id']) !!}
    {!! Form::hidden('control', 'edit', ['id'=>'control']) !!}
    {!! Form::hidden('user', Auth::user()->perfiles->first()->perfil, ['id'=>'user']) !!}
    {!! Form::hidden('id_artista', Auth::user()->artistas->first()->id, ['id'=>'id_artista']) !!}
    @include('admin.artistas.biografia')
    @include('admin.artistas.portada')
    @include('admin.artistas.habilidad')
	<!-- section -->
    <section class="full-height no-padding scroll-con-sec" id="sec1">
        <!-- Hero section   -->
        <div class="hero-wrap fl-wrap full-height">
            <div class="box-header" style="text-align: right; z-index: 1000;" id="imagen_portada"></div>
            <div class="hero-wrap-item  alt  entry-wrap">
                <div class="container">
                    <div class="fl-wrap section-entry" id="artista"></div>
                </div>
            </div>
            <div class="bg" id="bg_portada"></div>
            <div class="overlay"></div>
        </div>
        <!-- Hero section   end -->
    </section>
    <!-- section end -->
    <!-- section   -->                  
    <section  id="sec2" data-scrollax-parent="true" class="scroll-con-sec">
        <div class="box-header" style="text-align: right; z-index: 1000;" id="imagen_biografia"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="about-entry">
                        <div id="editar" class="ocultar">
                            @include('template.partials.required')
                            <h2>Biografía</h2>
                            {!! Form::open(['id'=>'form_actualizar', 'role'=>'form', 'files'=>true, 'name'=>'form_actualizar', 'method'=>'PUT']) !!}
                                <div class="box-body">
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12 div">
                                        {!! Form::label('foto', 'Foto', ['class'=>'pull-left']) !!}
                                        {!! Form::file('foto', ['class'=>'form-control', 'foto']) !!}
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12 div">
                                        {!! Form::label('nombre', '*Nombre', ['class'=>'pull-left']) !!}
                                        {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre', 'required', 'onkeypress'=>'return sololetras(event)', 'id'=>'nombre']) !!}
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12 div">
                                        {!! Form::label('fecha_nacimiento', '*Fecha de Nacimiento', ['class'=>'pull-left']) !!}
                                        {!! Form::text('fecha_nacimiento', null, ['class'=>'form-control fecha', 'placeholder'=>'DD-MM-AAAA', 'required', 'onkeypress'=>'return deshabilitarteclas(event)', 'autocomplete'=>'off', 'id'=>'nacimiento']) !!}
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12" id="div-muerte">
                                        {!! Form::label('fecha_muerte', 'Fecha de Muerte', ['class'=>'pull-left']) !!}
                                        {!! Form::text('fecha_muerte', null, ['class'=>'form-control fecha', 'placeholder'=>'DD-MM-AAAA', 'onkeypress'=>'return deshabilitarteclas(event)', 'autocomplete'=>'off', 'id'=>'muerte']) !!}
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12 col-xs-12 div-chosen">
                                        {!! Form::label('pais_nacimiento_id', '*País de Nacimiento', ['class'=>'pull-left']) !!}
                                        {!! Form::select('pais_nacimiento_id', $paises, null, ['class'=>'form-control select', 'required', 'placeholder'=>'Seleccione una opción', 'id'=>'pais_nacimiento']) !!}
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12 col-xs-12 div-chosen">
                                        {!! Form::label('genero_id', '*Genero', ['class'=>'pull-left']) !!}
                                        {!! Form::select('genero_id', $generos, null, ['class'=>'form-control select', 'required', 'placeholder'=>'Seleccione una opción', 'id'=>'genero_id']) !!}
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12 col-xs-12" id="div-pais_muerte">
                                        {!! Form::label('pais_muerte_id', 'País de Muerte', ['class'=>'pull-left']) !!}
                                        {!! Form::select('pais_muerte_id', $paises, null, ['class'=>'form-control select', 'placeholder'=>'Seleccione una opción', 'id'=>'pais_muerte']) !!}
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                        {!! Form::label('disciplinas', 'Disciplina(s)', ['class'=>'pull-left']) !!}
                                        {!! Form::select('disciplinas[]', $disciplinas, null, ['class'=>'form-control col-md-12 col-sm-12 col-xs-12 multiple', 'multiple', 'required', 'id'=>'disciplinas']) !!}
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                        {!! Form::label('profesiones', 'Profesión(es)', ['class'=>'pull-left']) !!}
                                        {!! Form::select('profesiones[]', $profesiones, null, ['class'=>'form-control col-md-12 col-sm-12 col-xs-12 multiple', 'multiple', 'required', 'id'=>'profesiones']) !!}
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        {!! Form::label('biografia', '*Biografía', ['class'=>'pull-left']) !!}
                                        {!! Form::textarea('biografia', null, ['class'=>'form-control biografia', 'required', 'id'=>'biografia_artista']) !!}
                                    </div>
                                    <div class="form-group col-md-8 col-md-offset-2">
                                        {!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                        <div id="informacion" class="ocultar">
                            <div class="col-md-6 col-sm-12 col-xs-12" id="div-biografia"></div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <p style="text-align: right; font-size: 18px;" id="p-genero"></p>
                                <p style="text-align: right; font-size: 18px;" id="p-nacimiento"></p>
                                <p style="text-align: right; font-size: 18px;" class="ocultar" id="p-muerte"></p>
                                <p style="text-align: right; font-size: 18px;" id="p-pais_nacimiento"></p>
                                @if($artista->pais_muerte_id!="")
                                    <p style="text-align: right; font-size: 18px;"><b>País de Muerte: {{ $pais_muerte[0]->pais }}</b></p>
                                @endif
                                <br>
                                <p style="text-align: right; font-size: 18px; text-decoration: underline;"><b>Profesión(es):</b></p>
                                <div style="text-align: right;">
                                    @foreach($artista->profesiones as $profesion)
                                        <span class="badge">{{ $profesion->profesion }}</span>
                                    @endforeach
                                </div>
                                <br>
                                <p style="text-align: right; font-size: 18px; text-decoration: underline;"><b>Disciplina(s):</b></p>
                                <div style="text-align: right;">
                                    @foreach($artista->disciplinas as $disciplina)
                                        <span class="badge">{{ $disciplina->disciplina }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="bg  par-elem"  data-bg="{{ asset('images/artistas/'.$artista->bg_biografia) }}" data-scrollax="properties: { translateY: '30%' }"></div>-->
        <div class="bg "  id="bg_biografia"></div>
        <div class="overlay white-overlay"></div>
        <div class="parallax-title left-pos" data-scrollax="properties: { translateY: '-350px' }" style="text-transform: capitalize;">{{ $artista->nombre }}</div>
    </section>
    <!-- section end -->
    <!-- section -->
    <section class="no-padding gray-bg" id="sec3">
        <div class="inline-facts-holder">
            <!-- 1  -->
            <div class="inline-facts">
                <div class="milestone-counter">
                    <i class="fa fa-picture-o "></i>	
                    <div class="stats animaper">
                        <div class="num-counter"  id="imagenConteo"></div>
                    </div>
                </div>
                <h6>Total de imagenes</h6>
            </div>
            <!-- 1  end-->
            <!-- 2  -->
            <div class="inline-facts">
                <div class="milestone-counter">
                    <i class="fa fa-suitcase "></i>	
                    <div class="stats animaper">
                        <div class="num-counter" id="catalogoConteo"></div>
                    </div>
                </div>
                <h6>Catalogos Subidos</h6>
            </div>
            <!-- 2 end  -->
            <!-- 3  -->
            <div class="inline-facts">
                <div class="milestone-counter">
                    <i class="fa fa-line-chart "></i>
                    <div class="stats animaper">
                        <div class="num-counter" id="visitas"></div>
                    </div>
                </div>
                <h6>Visitas</h6>
            </div>
            <!-- 3 end  -->
            <!-- 4  -->
            <div class="inline-facts">
                <div class="milestone-counter">
                    <i class="fa fa-trophy"></i>
                    <div class="stats animaper">
                        <div class="num-counter" >435</div>
                    </div>
                </div>
                <h6>Clients Working</h6>
                <span>Blandit praesent luptatum</span>
            </div>
            <!-- 4 end  -->
        </div>
    </section>
    <!-- section end -->
    <!-- section   -->
    <section class="column-section scroll-con-sec" data-scrollax-parent="true" id="sec4">
        <div class="section-title ">
            <h2>Mi Portafolio</h2>
            <div class="dec-separator"><img src="public/images/logo.png" alt="" style="width: 50px;"> </div>
        </div>
        <div id="alert_portafolio"></div>
        <div class="box-header ocultar" style="text-align: left;" id="agregarPortafolio">
            <button class='btn btn-vinotinto' onClick='agregar("#cuadro4", "#cuadro5");'><i class='fa fa-folder-o' aria-hidden='true'></i> Nuevo Portafolio</button>
        </div>
        <div class="box-header ocultar" style="text-align: left;" id="listaPortafolio">
            <button class='btn btn-vinotinto' onClick='visualizar("#cuadro5", "#cuadro4");'><i class='fa fa-folder-o' aria-hidden='true'></i> Listado de Portafolio</button>
        </div>
        @include('admin.catalogos.create')
        <div class="container big-container" id="cuadro5">
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
                    <!--<div class="share-holder hid-share">
                        <div class="showshare"><span>Compartir </span><i class="fa fa-bullhorn"></i></div>
                        <div class="share-container  isShare"></div>
                    </div>-->
                </div>
            </div>
            <!--=============== portfolio holder ===============-->
            <div class="gallery-items   three-columns">
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
                    <div class="gallery-item {{ $disciplinas }}">
                        <div class="grid-item-holder">
                            <div class="box-item fl-wrap popup-box">
                                @if($catalogo->artistasCatalogosImagenes->count()>0)
                                    <img src="{{ asset('images/artistas/'.$catalogo->artistasCatalogosImagenes->first()->imagen) }}" alt="Imagen Catalogo" style="max-width: 500px; max-height: 240px; height: 240px;">
                                @else
                                    <img src="{{ asset('images/artistas/noimage.png') }}" alt="Imagen Catalogo" style="max-width: 500px; max-height: 240px; height: 240px;">
                                @endif
                                <a href="{{ route('artistascatalogos.edit', $catalogo->id) }}" class="ajax"><i class="fa fa-link"></i></a>
                            </div>
                            <div class="det-box fl-wrap">
                                @if($artista->tipo==0)
                                    @if($catalogo->status->status=="Disponible")
                                        <h3><a href="{{ route('artistascatalogos.edit', $catalogo->id) }}" class="ajax">{{ $catalogo->titulo }}</a></h3>
                                        <h4>
                                            <a onclick="Item('¿Está seguro de bloquear al público este portafolio?','{{ route('artistascatalogos.lock', $catalogo->id) }}', 'Si, Bloquear!', 'No se ha bloqueado.')" class="btn-warning badge" data-toggle="tooltip" title="Bloquear"><i class="fa fa-lock" aria-hidden="true"></i></a>
                                    @elseif($catalogo->status->status=="Bloqueado")
                                        <h3><a href="{{ route('artistascatalogos.edit', $catalogo->id) }}" class="ajax">Este portafolio ha sido bloqueado, por favor comuniquese con la institución para más información</a></h3>
                                        <h4>
                                            <a onclick="Item('¿Está seguro de habilitar al público este portafolio?','{{ route('artistascatalogos.unlock', $catalogo->id) }}', 'Si, Habilitar!', 'No se ha habilitar.')" class="btn-warning badge" data-toggle="tooltip" title="Bloquear"><i class="fa fa-unlock" aria-hidden="true"></i></a> 
                                    @endif
                                        <a onclick="Item('¿Está seguro de eliminar este portafolio?','{{ route('artistascatalogos.destroy', $catalogo->id) }}', 'Si, Eliminar!', 'No se ha eliminado.')" class="btn-warning badge" data-toggle="tooltip" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </h4>
                                @elseif($artista->tipo==1)
                                    @foreach(Auth::user()->perfiles as $perfil)
                                        @if($perfil->perfil=='Artista')
                                            @if($catalogo->status->status=="Disponible")
                                                <h3><a href="{{ route('artistascatalogos.edit', $catalogo->id) }}" class="ajax">{{ $catalogo->titulo }}</a></h3>
                                            @elseif($catalogo->status->status=="Bloqueado")
                                                <h3><a href="{{ route('artistascatalogos.edit', $catalogo->id) }}" class="ajax">Este portafolio ha sido bloqueado al público, por favor comuniquese con la institución para más información</a></h3>
                                            @endif
                                            <h4><a onclick="Item('¿Está seguro de eliminar este portafolio?','{{ route('artistascatalogos.destroy', $catalogo->id) }}', 'Si, Eliminar!', 'No se ha eliminado.')" class="btn-warning badge" data-toggle="tooltip" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></a></h4>
                                            @break
                                        @else
                                            @if($catalogo->status->status=="Disponible")
                                                <h3><a href="{{ route('artistascatalogos.edit', $catalogo->id) }}" class="ajax">{{ $catalogo->titulo }}</a></h3>
                                                <h4><a onclick="Item('¿Está seguro de bloquear al público este portafolio?','{{ route('artistascatalogos.lock', $catalogo->id) }}', 'Si, Bloquear!', 'No se ha bloqueado.')" class="btn-warning badge" data-toggle="tooltip" title="Bloquear"><i class="fa fa-lock" aria-hidden="true"></i></a></h4>
                                            @elseif($catalogo->status->status=="Bloqueado")
                                                <h3><a href="{{ route('artistascatalogos.edit', $catalogo->id) }}" class="ajax">Este portafolio ha sido bloqueado al público, por favor comuniquese con la institución para más información</a></h3>
                                                <h4><a onclick="Item('¿Está seguro de habilitar al público este portafolio?','{{ route('artistascatalogos.unlock', $catalogo->id) }}', 'Si, Habilitar!', 'No se ha habilitar.')" class="btn-warning badge" data-toggle="tooltip" title="Bloquear"><i class="fa fa-unlock" aria-hidden="true"></i></a></h4>
                                            @endif
                                            @break
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--gallery-item end-->
                @endforeach 
            </div>
            <!-- end gallery items -->
        </div>
        <div class="clearfix"></div>
        <div class="container">
            <div class="section-qoute fl-wrap">
                <p><a href="{{ route('artistascatalogos.show', $artista->id) }}" class="ajax">Ver más.</a></p>
            </div>
        </div>
        <div class="parallax-title right-pos" id="texto_portafolio" data-scrollax="properties: { translateY: '-350px' }">Mi Portafolio</div>
    </section>
    <!-- section -->
    <section class="dark-bg scroll-con-sec"     data-scrollax-parent="true" id="sec7">
    <div class="box-header" style="text-align: right; z-index: 1000;" id="imagen_habilidad"></div>
        <div class="bg  par-elem" id="bg_habilidad" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay  bold-overlay"></div>
        <div class="container">
            <div class="column-text fl-wrap ser-wrap">
                <div class="row">
                    <div class="col-md-12">
                        <div id="alert_habilidad"></div>
                        <h2>  Mis Habilidades </h2>
                        @include('admin.artistashabilidades.create')
                        @include('admin.artistashabilidades.edit')
                        <div class="table-responsive col-md-12" id="cuadro10">
                            <table id="tableHabilidades" class="table table-bordered table-striped table-hover" style="background-color: #fff;">
                                <thead>
                                    <tr>
                                        <th>Habilidad</th>
                                        <th>Creado</th>
                                        <th>Actualizado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <ul class="servicses-holder" id="cuadro13"></ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->
    <!-- section end -->
    <section class="no-padding scroll-con-sec" id="sec8">
        <div class="fl-wrap order-wrap gray-bg">
            <div class="container">
                <div class="row">
                    <div id="alert_red_social"></div>
                    <div class="section-title ">
                        <h2>Redes Sociales</h2>
                        <div class="dec-separator"><img src="public/images/logo.png" alt="" style="width: 50px;"> </div>
                    </div>
                    @include('admin.artistasredessociales.create')
                    @include('admin.artistasredessociales.edit')
                    <div class="table-responsive col-md-12" id="cuadro6">
                        <table id="reddesSociales" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Red Social</th>
                                    <th>Nombre</th>
                                    <th>Creado</th>
                                    <th>Actualizado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div id="cuadro9" class="col-md-12">
                        @foreach($artista->artistasRedesSociales as $artistaRedSocial)
                            <div class="col-md-4" style="font-size: 16px; padding: 10px;">
                                {!! $artistaRedSocial->redSocial->icon->icon !!}{{ ": ".$artistaRedSocial->nombre }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->
    <section class="no-padding scroll-con-sec" id="sec8">
        <div class="fl-wrap order-wrap gray-bg">
            <div class="container">
                <div class="row">
                    <div id="alert_red_social"></div>
                    <div class="section-title ">
                        <h2>Redes Sociales</h2>
                        <div class="dec-separator"><img src="public/images/logo.png" alt="" style="width: 50px;"> </div>
                    </div>
                    @include('admin.artistasredessociales.create')
                    @include('admin.artistasredessociales.edit')
                    <div class="table-responsive col-md-12" id="cuadro6">
                        <table id="reddesSociales" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Red Social</th>
                                    <th>Nombre</th>
                                    <th>Creado</th>
                                    <th>Actualizado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div id="cuadro9" class="col-md-12">
                        @foreach($artista->artistasRedesSociales as $artistaRedSocial)
                            <div class="col-md-4" style="font-size: 16px; padding: 10px;">
                                {!! $artistaRedSocial->redSocial->icon->icon !!}{{ ": ".$artistaRedSocial->nombre }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->
    <!--footer   --> 
    <div class="height-emulator fl-wrap" id="vacio"></div>
    <footer class="fl-wrap vinotinto-bg fixed-footer" id="footer">
        <div class="container">
            @if (Auth::check())
                <div class="footer-logo"><a href="{{ url('/home') }}" class="ajax"><img src="public/images/footer.png" alt=""></a></div>
            @else
                <div class="footer-logo"><a href="" class="ajax"><img src="public/images/footer.png" alt=""></a></div>
            @endif
            <div class="clearfix"></div>
            <div class="copyright">&#169; IARTE 2017 . Todos los derechos reservados. </div>
        </div>
    </footer>
    <!--footer  end -->
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $('#contenido').removeClass('content scroll-content');
            $("#contenido").addClass('content full-height scroll-content');
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