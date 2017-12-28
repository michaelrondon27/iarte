@extends('template.main')
@section('content')
    {!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
    <div class="modal fade" id="listarPaises" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title" id="myModalLabel" style="border-bottom: 1px solid #800000">Filtrar por País</h2>
                    @foreach($paises as $pais)
                        @if($pais->conteo>0)
                            <div class="col-md-4">
                                <a href="{{ route('artistas', ['order' => request('order'), 'pais='.$pais->pais, 'profesion' => request('profesion')]) }}">
                                    <p style="font-size: 12px;">{{ $pais->pais }} ({{ $pais->conteo }})</p>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="listarProfesiones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title" id="myModalLabel" style="border-bottom: 1px solid #800000">Filtrar por Profesión</h2>
                    @foreach($profesiones as $profesion)
                        @if($profesion->artistas->count()>0)
                            <div class="col-md-4">
                                <a href="{{ route('artistas', ['order' => request('order'), 'pais' => request('pais'), 'profesion='.$profesion->profesion]) }}">
                                    <p style="font-size: 12px;">{{ $profesion->profesion }} ({{ $profesion->artistas->count() }})</p>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--  section --> 
    <section>
        <div class="container-fluid">
            <!-- Share /  filter    -->
            <div class="fl-wrap inline-filter npf blog-filters-wrap">
                <!-- filter  -->
                <div class="blog-filters">
                <span>Filtrar: </span>
                <!-- filter category    -->
                <div class="category-filter blog-btn-filter">
                    <div class="blog-btn">Ordenar <i class="fa fa-list-ul" aria-hidden="true"></i></div>
                    <ul>
                        <li><a href="{{ route('artistas') }}">Sin Filtros</a></li>
                        <li><a href="{{ route('artistas', ['order=populares', 'pais' => request('pais'), 'profesion' => request('profesion')]) }}">Más Vistos</a></li>
                        <li><a href="{{ route('artistas', ['order=az', 'pais' => request('pais'), 'profesion' => request('profesion')]) }}">A - Z</a></li>
                        <li><a href="{{ route('artistas', ['order=za', 'pais' => request('pais'), 'profesion' => request('profesion')]) }}">Z - A</a></li>
                        <li><a href="{{ route('artistas', ['order=recientes', 'pais' => request('pais'), 'profesion' => request('profesion')]) }}">Recientes</a></li>
                    </ul>
                </div>
                <div class="category-filter blog-btn-filter">
                    <div class="filtro-btn" data-toggle='modal' data-target='#listarPaises'>País <i class="fa fa-list-ul" aria-hidden="true"></i></div>
                </div>
                <div class="category-filter blog-btn-filter">
                    <div class="filtro-btn" data-toggle='modal' data-target='#listarProfesiones'>Profesión <i class="fa fa-list-ul" aria-hidden="true"></i></div>
                </div>
                <!-- filter category end  -->
            </div>
            <!-- filter end    -->
            <!-- Share    -->
            <div class="share-holder hid-share">
                <div class="showshare"><span>Compartir </span><i class="fa fa-bullhorn"></i></div>
                <div class="share-container  isShare"></div>
            </div>
            <!-- Share   end   -->
            </div>
            <div class="row">
                <!-- article wrap -->
                <div class="col-md-8">
                    <div class="fl-wrap">
                        <div id="listarArtistas">
                            @foreach($artistas as $artista)
                                <div class="gallery-item">
                                    <div class="grid-item-holder">
                                        <div class="box-item fl-wrap   popup-box">
                                            <img  src="{{ asset('images/artistas/'.$artista->foto) }}" style="height: 250px; width: auto;"   alt="">
                                            <a href="{{ route('artistas.ver', [$artista->id, $artista->slug]) }}" class="ajax"><i class="fa fa-link"></i></a>
                                        </div>
                                        <div class="det-box fl-wrap">
                                            <h3><a href="{{ route('artistas.ver', [$artista->id, $artista->slug]) }}" class="ajax" style="text-transform: capitalize;">{{ $artista->nombre }}</a></h3>
                                            <h4>Visitas: {{ $artista->visitas }} - Galerias: {{ $artista->galerias }}</h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="clearfix"></div>
                            {!! $artistas->links() !!}
                        </div>
                    </div>
                </div>
                <!-- article wrap end -->
                @include('template.partials.sidebar')
            </div>
        </div>
    </section>
    <!--section  end --> 
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $("#artistas").attr('class', 'active');
            $('#contenido').removeClass('content scroll-content');
            $("#contenido").addClass('content');
        });
    </script>
    <script src="{{ asset('js/front/barraLateral.js') }}"></script>
@endsection