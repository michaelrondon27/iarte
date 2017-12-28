@extends('template.main')
@section('content')
    {!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
  <!--  section --> 
    <section>
        <div class="container-fluid">
            <div class="row single-post">
                <!-- article wrap -->
                <div class="col-md-8">
                    <div class="fl-wrap">
                        <!-- article  -->
                        <!-- article  -->
                        <article class="fw-artc">
                            <div class="blog-media">
                                <img src="{{ asset('images/noticias/'.$noticia->imagen) }}" class="respimg" alt="">
                            </div>
                            <ul class="cat-list">
                                <li><i class="fa fa-user" aria-hidden="true"></i> Autor: {{ $noticia->usuario->name }}</li>
                                <li><i class="fa fa-clock-o" aria-hidden="true"></i> Publicado: {{ $noticia->created_at->format('d-M-Y h:i:s A') }}</li>
                                <li><i class="fa fa-eye" aria-hidden="true"></i> Visitas: {{ $noticia->visitas }}</li>
                            </ul>
                            <h2><a href="post-single.html" class="ajax">{{ $noticia->titulo }}</a></h2>
                            {!! $noticia->contenido !!}
                            <!--  tags share-->
                            <div class="fl-wrap bl-opt">
                                <div class="single-post-tags fl-left">
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    @foreach($noticia->etiquetas as $etiqueta)
                                        <a href="{{ route('noticias', 'categoria='.$etiqueta->etiqueta) }}" style="text-transform: capitalize;">{{ $etiqueta->etiqueta }}</a>
                                    @endforeach
                                </div>
                                <div class="share-holder hid-share ">
                                    <div class="showshare"><span>Compartir </span><i class="fa fa-bullhorn"></i></div>
                                    <div class="share-container  isShare"></div>
                                </div>
                            </div>
                            <!--  tags share end -->
                        </article>
                        <!-- article  end -->
                        <!-- post-related -->
                        <div class="post-related con-post-rel   row">
                            @foreach($noticiasRelacionadas as $noticiaRelacionada)
                                <div class="item-related col-md-4">
                                    <a href="{{ route('noticias.show', [$noticiaRelacionada->noticia_id, $noticiaRelacionada->slug]) }}"><img src="{{ asset('images/noticias/'.$noticiaRelacionada->imagen) }}" class="respimg" alt="" style="height: 150px;"></a>
                                    <h3><a href="{{ route('noticias.show', [$noticiaRelacionada->noticia_id, $noticiaRelacionada->slug]) }}">{{ $noticiaRelacionada->titulo }}</a></h3>
                                    <span class="post-date" style="color: #800000 !important;">{{ Carbon\Carbon::parse($noticiaRelacionada->created_at)->format('d M Y h:i:s A') }}</span>
                                </div>
                            @endforeach
                        </div>
                        <!-- post-related  end-->
                    </div>
                </div>
                <!-- article wrap end -->
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