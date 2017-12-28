@extends('template.main')
@section('content')
    {!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
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
                        <div class="blog-btn">Categorías <i class="fa fa-list-ul" aria-hidden="true"></i></div>
                        <ul>
                            <li><a href="{{ route('noticias') }}">Todas las noticias</a></li>
                            @foreach($etiquetas as $etiqueta)
                                <li><a href="{{ route('noticias', 'categoria='.$etiqueta->etiqueta) }}">{{ $etiqueta->etiqueta }} ({{ $etiqueta->noticias->count() }})</a></li>
                            @endforeach
                        </ul>
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
                        <div id="articulos">
                            @foreach($noticias as $noticia)
                                <article class="fw-artc">
                                    <div class="blog-media">
                                        <a href="{{ route('noticias.show', [$noticia->id, $noticia->slug]) }}">
                                            <img src="{{ asset('images/noticias/'.$noticia->imagen) }}" class="respimg" alt="">
                                        </a>
                                    </div>
                                    <ul class="cat-list">
                                        <li><i class="fa fa-user" aria-hidden="true"></i> Autor: {{ $noticia->autor }}</li>
                                    </ul>
                                    <h2><a href="{{ route('noticias.show', [$noticia->id, $noticia->slug]) }}" class="ajax">{{ $noticia->titulo }}</a></h2>
                                    {!! $noticia->contenido !!}
                                    <div class="art-opt fl-wrap">
                                        <a href="{{ route('noticias.show', [$noticia->id, $noticia->slug]) }}" class=" btn btn-vinotinto anim-button   flat-btn   transition  fl-l ajax" ><span>Leer</span><i class="fa fa-eye"></i></a>
                                        <ul class="post-counter">
                                            <li><i class="fa fa-eye" aria-hidden="true"></i> <span>{{ $noticia->visitas }}</span></li>
                                            <li><i class="fa fa-clock-o" aria-hidden="true"></i><span>{{ $noticia->creado }}</span></li>
                                        </ul>
                                    </div>
                                </article>
                            @endforeach
                            {!! $noticias->links() !!}
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
            $("#noticias").attr('class', 'active');
            $('#contenido').removeClass('content scroll-content');
            $("#contenido").addClass('content');
        });
    </script>
    <script src="{{ asset('js/front/barraLateral.js') }}"></script>
@endsection