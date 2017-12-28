@extends('template.main')
@section('content')
	<!-- section -->
    <section class="full-height no-padding scroll-con-sec" id="sec1">
        <!-- Hero section   -->
        <div class="hero-wrap fl-wrap full-height">
            <div class="hero-wrap-item  alt  entry-wrap">
                <div class="container">
                    <div class="fl-wrap section-entry">
                    	<h2>{{ $artista->nombre }}</h2>
                    </div>
                </div>
            </div>
            <div class="bg"  data-bg="{{ asset('images/artistas/'.$artista->portada) }}"></div>
            <div class="overlay"></div>
        </div>
        <!-- Hero section   end -->
    </section>
    <!-- section end -->
    <!-- section   -->                  
    <section  id="sec2" data-scrollax-parent="true" class="scroll-con-sec">
        <div class="container">
            <div class="row" style="background-color: rgba(255, 255, 255, 0.5);">
                <div class="col-md-12" style="padding: 10px;">
                    <div class="about-entry">
                    	<h2>Biografia</h2>
                        <div class="col-md-6 col-sm-12 col-xs-12">{!! $artista->biografia !!}</div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <p style="text-align: right; font-size: 18px;"><b>Sexo: {{ $artista->genero->genero }}</b></p>
                            <p style="text-align: right; font-size: 18px;"><b>Fecha de Nacimiento: {{ Carbon\Carbon::parse($artista->fecha_nacimiento)->format('d-m-Y') }} </b></p>
                            @if($artista->fecha_muerte!='1969-12-31')
								<p style="text-align: right; font-size: 18px;"><b>Fecha de Nacimiento: {{ Carbon\Carbon::parse($artista->fecha_muerte)->format('d-m-Y') }} </b></p>
                            @endif
                            <p style="text-align: right; font-size: 18px;"><b>País de Nacimiento: {{ $artista->pais_nacimiento->pais }}</b></p>
                            @if($artista->pais_muerte!="")
                            	<p style="text-align: right; font-size: 18px;"><b>País de Muerte: {{ $artista->pais_muerte->pais }}</b></p>
                            @endif
                            <p style="text-align: right; font-size: 18px;">
                            	<b>Profesión(es):</b>
                            	<br>
                            	@foreach($artista->profesiones as $profesion)
									<span class='badge'>{{ $profesion->profesion }}</span>
                            	@endforeach
                            </p>
                            <p style="text-align: right; font-size: 18px;">
                            	<b>Disciplina(s):</b>
                            	<br>
                            	@foreach($artista->disciplinas as $disciplina)
									<span class='badge'>{{ $disciplina->disciplina }}</span>
                            	@endforeach
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg  par-elem"  data-bg="{{ asset('images/artistas/'.$artista->bg_biografia) }}" data-scrollax="properties: { translateY: '30%' }"></div>
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
                        <div class="num-counter">
                        	{{ $artista->imagenes }}
                        </div>
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
                        <div class="num-counter">
                        	{{ $artista->artistasCatalogos->count() }}
                        </div>
                    </div>
                </div>
                <h6>Galerías Publicadas</h6>
            </div>
            <!-- 2 end  -->
            <!-- 3  -->
            <div class="inline-facts">
                <div class="milestone-counter">
                    <i class="fa fa-line-chart "></i>
                    <div class="stats animaper">
                        <div class="num-counter">
                        	{{ $artista->visitas }}
                        </div>
                    </div>
                </div>
                <h6>Visitas</h6>
            </div>
            <!-- 3 end  -->
            <!-- 4  -->
            <div class="inline-facts">
                <div class="milestone-counter">
                    <i class="fa fa-area-chart"></i>
                    <div class="stats animaper">
                        <div class="num-counter">
                        	{{ $artista->promedioVisitaCatalogo }}
                        </div>
                    </div>
                </div>
                <h6>Promedio Visitas por Catalogo</h6>
            </div>
            <!-- 4 end  -->
        </div>
    </section>
    <!-- section end -->
    <!-- section   -->
    <section class="column-section scroll-con-sec" data-scrollax-parent="true" id="sec4">
        <div class="section-title ">
            <h2>Mi Galería</h2>
            <div class="dec-separator"><img src="{{ asset('images/logo.png') }}" alt="" style="width: 50px;"> </div>
        </div>
        <div class="container-fluid">
            <!--=============== portfolio holder ===============-->
            <div class="gallery-items   three-columns">
            	@if($catalogos!="")
	                @foreach($catalogos as $catalogo)
	                    <!--gallery-item -->
	                    <div class="gallery-item ">
	                        <div class="grid-item-holder">
	                            <div class="box-item fl-wrap popup-box">
	                                @if($catalogo->artistasCatalogosImagenes->count()>0)
	                                    <img src="{{ asset('images/artistas/'.$catalogo->artistasCatalogosImagenes->first()->imagen) }}" alt="Imagen Catalogo" style="width: auto; max-height: 240px; height: 240px;">
	                                @else
	                                    <img src="{{ asset('images/artistas/noimage.png') }}" alt="Imagen Catalogo" style="max-width: 500px; max-height: 240px; height: 240px;">
	                                @endif
	                                <a href="{{ route('galeria.ver', [$catalogo->id, $catalogo->slug]) }}" class="ajax"><i class="fa fa-link"></i></a>
	                            </div>
	                            <div class="det-box fl-wrap">
                                    @php
                                        $tamaño=strlen($catalogo->titulo);
                                        if($tamaño<50)
                                        {
                                            $catalogo->title=$catalogo->titulo;
                                        }
                                        else
                                        {
                                            $catalogo->title=substr($catalogo->titulo, 0, 50)."...";
                                        }
                                    @endphp
	                                <h3><a href="{{ route('galeria.ver', [$catalogo->id, $catalogo->slug]) }}" class="ajax" data-toggle="tooltip" title="{{ $catalogo->titulo }}">{{ $catalogo->title }}</a></h3>
	                            </div>
	                        </div>
	                    </div>
	                    <!--gallery-item end-->
	                @endforeach
	            @else
					<h2>No hay galerías publicadas.</h2>
	            @endif
            </div>
            <!-- end gallery items -->
        </div>
        <div class="clearfix"></div>
        <div class="container">
            <div class="section-qoute fl-wrap">
            	@if($catalogos!="")
                	<a href="{{ route('galerias.show', [$artista->id, $artista->slug]) }}" class="btn btn-vinotinto">Ver más.</a>
                @endif
            </div>
        </div>
        <div class="parallax-title right-pos" id="texto_portafolio" data-scrollax="properties: { translateY: '-350px' }">Mi Galería</div>
    </section>
    <!-- section -->
    <!-- section -->
    <section class="dark-bg scroll-con-sec"     data-scrollax-parent="true" id="sec7">
        <div class="bg  par-elem"  data-bg="{{ asset('images/artistas/'.$artista->bg_habilidades) }}" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay  bold-overlay"></div>
        <div class="container">
            <div class="column-text fl-wrap ser-wrap">
                <div class="row" style="background-color: rgba(255, 255, 255, 0.5);">
                    <div class="col-md-12">
                        <h2 style="color: black !important">  Mis Habilidades </h2>
                        @if($artista->artistasHabilidades->count()>0)
                        	@foreach($artista->artistasHabilidades as $habilidad)
								<div class="col-md-12" style="padding: 10px;">
	                                <div class="serv-header fl-wrap">
	                                    <h4>{{ $habilidad->habilidad }}</h4>
	                                </div>
	                                <div class="clearfix"></div>
	                                <div style="text-align: justify; font-size: 18px;">
	                                	{!! $habilidad->descripcion !!}
	                            	</div>
	                            </div>
	                        @endforeach
                        @else
                    		<h2>No hay información publicada.</h2>
                        @endif
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
                        <div class="dec-separator"><img src="{{ asset('images/logo.png') }}" alt="" style="width: 50px;"> </div>
                    </div>
                    <div class="col-md-12">
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
    <!--footer   --> 
    <div class="height-emulator fl-wrap" id="vacio"></div>
    <footer class="fl-wrap vinotinto-bg fixed-footer" id="footer">
        <div class="container">
            <div class="footer-logo"><a href="{{ url('/') }}" class="ajax"><img src="{{ asset('images/footer.png') }}" alt=""></a></div>
            <div class="clearfix"></div>
            <div class="copyright">&#169; IARTE 2017 . Todos los derechos reservados. </div>
        </div>
    </footer>
    <!--footer  end -->
@endsection
@section('js')
	<script>
        $(document).ready(function(){
        	$("#artistas").attr('class', 'active');
            $('#contenido').removeClass('content scroll-content');
            $("#contenido").addClass('content full-height scroll-content');
        });
    </script>
@endsection