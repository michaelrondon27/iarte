@extends('template.main')
@section('content')
    {!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
    <div class="modal fade" id="listarDisciplinas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title" id="myModalLabel" style="border-bottom: 1px solid #800000">Filtrar por País</h2>
                    @foreach($disciplinas as $disciplina)
                        @if($disciplina->artitasCatalogos->count()>0)
                            <div class="col-md-4">
                                <a href="{{ route('galerias', ['order' => request('order'), 'disciplina='.$disciplina->disciplina]) }}">
                                    <p style="font-size: 12px;">{{ $disciplina->disciplina }} ({{ $disciplina->artitasCatalogos->count() }})</p>
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
                        <li><a href="{{ route('galerias') }}">Sin Filtros</a></li>
                        <li><a href="{{ route('galerias', ['order=populares', 'disciplina' => request('disciplina')]) }}">Más Vistos</a></li>
                        <li><a href="{{ route('galerias', ['order=az', 'disciplina' => request('disciplina')]) }}">A - Z</a></li>
                        <li><a href="{{ route('galerias', ['order=za', 'disciplina' => request('disciplina')]) }}">Z - A</a></li>
                        <li><a href="{{ route('galerias', ['order=recientes', 'disciplina' => request('disciplina')]) }}">Recientes</a></li>
                    </ul>
                </div>
                <div class="category-filter blog-btn-filter">
                    <div class="filtro-btn" data-toggle='modal' data-target='#listarDisciplinas'>Disciplina <i class="fa fa-list-ul" aria-hidden="true"></i></div>
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
                    <div class="gallery-items   three-columns">
                        @foreach($galerias as $galeria)
                            <div class="gallery-item">
                                <div class="grid-item-holder">
                                    <div class="box-item fl-wrap   popup-box">
                                        @if($galeria->imagen!=null)
		                                    <img src="{{ asset('images/artistas/'.$galeria->imagen->imagen) }}" alt="Imagen Catalogo" style="width: auto; max-height: 200px; height: 200px;">
		                                @else
		                                    <img src="{{ asset('images/artistas/noimage.png') }}" alt="Imagen Catalogo" style="max-width: 500px; max-height: 200px; height: 200px;">
		                                @endif
                                        <a href="{{ route('galeria.ver', [$galeria->id, $galeria->slug]) }}" class="ajax"><i class="fa fa-link"></i></a>
                                    </div>
                                    <div class="det-box fl-wrap">
                                        <h3><a href="{{ route('galeria.ver', [$galeria->id, $galeria->slug]) }}" class="ajax" data-toggle="tooltip" title="{{ $galeria->titulo }}" style="text-transform: capitalize;">{{ $galeria->title }}</a></h3>
                                        <h4>Visitas: {{ $galeria->visitas }} - <a href="{{ route('artistas.ver', [$galeria->artista->id, $galeria->artista->slug]) }}" style="color: black; text-transform: capitalize;">{{ $galeria->artista->nombre }}</a></h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="clearfix"></div>
                    {!! $galerias->links() !!}
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
            $("#galerias").attr('class', 'active');
            $('#contenido').removeClass('content scroll-content');
            $("#contenido").addClass('content');
        });
    </script>
    <script src="{{ asset('js/front/barraLateral.js') }}"></script>
@endsection