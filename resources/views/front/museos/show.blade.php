@extends('template.main')
@section('content')
    @include('front.museos.detalles')
    {!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
	<div class="modal fade" id="listaAristas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        	<h2 class="modal-title" id="myModalLabel">Artistas Exhibidos</h2>
		        	<div class="recent-post-widget fl-wrap">
                        <ul>
                        	@foreach($museo->artistas as $artista)
					        	<li>
			                        <div class="recent-post-img"><a href="{{ route('artistas.ver', [$artista->id, $artista->slug]) }}"><img src="{{ asset('images/artistas/'.$artista->foto) }}" alt=""></a></div>
			                        <div class="recent-post-content">
			                            <h4 style="text-transform: capitalize;"><a href="{{ route('artistas.ver', [$artista->id, $artista->slug]) }}" style="color: black !important;">{{ $artista->nombre }}</a></h4>
			                            <div class="recent-post-opt">
			                                <span class="post-date" style="color: black !important;"><i class="fa fa-folder" aria-hidden="true"></i> Catalogos: {{ $artista->artistasCatalogos->count() }}</span> 
			                                <a href="" class="post-comments" style="color: black !important;"><i class="fa fa-eye" aria-hidden="true"></i> Visitas: {{ $artista->visitas }}</a> 
			                            </div>
			                        </div>
			                    </li>
			                @endforeach
		                </ul>
		            </div>
		      	</div>
	    	</div>
	  	</div>
	</div>
	<!-- section -->
    <section class="full-height no-padding scroll-con-sec" id="sec1">
        <!-- Hero section   -->
        <div class="hero-wrap fl-wrap full-height">
            <div class="hero-wrap-item  alt  entry-wrap">
                <div class="container">
                    <div class="fl-wrap section-entry">
                        <h2>{{ $museo->nombre }}</h2>
                        <a href="#sec4" class=" btn btn-vinotinto anim-button custom-scroll-link" ><span>Ver Fotos</span><i class="fa fa-eye" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="bg"  data-bg="{{ asset('images/museos/'.$museo->portada) }}"></div>
            <div class="overlay"></div>
			<a href="#sec2" class="sec-entr-link custom-scroll-link"><i class="fa fa-angle-double-down" aria-hidden="true"></i></a>
        </div>
        <!-- Hero section   end -->
    </section>
    <!-- section end -->
    <!-- section   -->                  
    <section  id="sec2" data-scrollax-parent="true" class="scroll-con-sec">
        <div class="container">
            <div class="row" style="background-color: rgba(255, 255, 255, 0.5);">
                <div class="col-md-12">
                    <div class="about-entry">
                        <h2>Historia</h2>
                        <div >
	                        {!! $museo->historia !!}
    					</div>
    					@if($museo->fecha_fundacion!="2000-01-01")
                   			<div class="col-md-4" style="font-size: 20px;">
                   				<b>Fecha Fundación:</b> 
                   				@if($museo->fecha_fundacion!="2000-01-01")
                   					{{ Carbon\Carbon::parse($museo->fecha_fundacion)->format('d-m-Y') }} 
                   				@else
                   					N/A
                   				@endif
                   			</div>
                   			<div class="col-md-8" style="font-size: 20px;">
	                   			<b>Tipo de Museo:</b> 
	                   			@foreach($museo->tiposMuseos as $tipoMuseo)
	                   				<span style="text-transform: capitalize;" class="badge">{{ $tipoMuseo->tipo_museo }}</span>
	                   			@endforeach
	                   		</div>
	                   		<div style="font-size: 20px; float: left !important; padding: 20px;">
	                   			<b>Artistas Exhibidos:</b> 
	                   			<span style="text-transform: capitalize; font-size: 16px;" class="badge">{!! $museo->nombresArtistas !!}</span>
	                   			<a data-toggle='modal' data-target='#listaAristas' style="color: #800000; cursor: pointer;" data-toggle="tooltip" title="Ver más"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
	                   		</div>
                       	@endif
                        <div class="btn-separator fl-wrap"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg "  data-bg="{{ asset('images/museos/'.$museo->bg_historia) }}"></div>
        <div class="overlay white-overlay"></div>
        <div class="parallax-title left-pos" data-scrollax="properties: { translateY: '-350px' , 'smoothness': 120}">Historia</div>
    </section>
    <!-- section end -->
    <!-- section -->
    <section class="no-padding gray-bg">
        <div class="inline-facts-holder">
            <!-- 1  -->
            <div class="inline-facts">
                <div class="milestone-counter">
                    <i class="fa fa-picture-o "></i>	
                    <div class="stats animaper">
                        <div class="num-counter"  >{{ $museo->museosImagenes->count() }}</div>
                    </div>
                </div>
                <h6>Total de Imagenes</h6>
            </div>
            <!-- 1  end-->
            <!-- 2  -->
            <a data-toggle='modal' data-target='#listaAristas' data-toggle="tooltip" title="Ver Artistas">
	            <div class="inline-facts" style="cursor: pointer;">
	                <div class="milestone-counter">
	                    <i class="fa fa-users "></i>	
	                    <div class="stats animaper">
	                        <div class="num-counter" >{{ $museo->artistas->count() }}</div>
	                    </div>
	                </div>
	                <h6>Artistas Exhibidos</h6>
	            </div>
	        </a>
            <!-- 2 end  -->
            <!-- 3  -->
            <div class="inline-facts" >
                <div class="milestone-counter">
                    <i class="fa fa-line-chart "></i>
                    <div class="stats animaper">
                        <div class="num-counter" >{{ $museo->visitas }}</div>
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
                        <div class="num-counter" >{{ $museo->promedioObrasVistas }}</div>
                    </div>
                </div>
                <h6>Promedio Vistas por Obra</h6>
            </div>
            <!-- 4 end  -->
        </div>
    </section>
    <!-- section end -->
    <!-- section -->
    <section  data-scrollax-parent="true" id="sec3"  class="scroll-con-sec">
        <div class="container">
            <div class="section-title ">
                <h2>Nuestros Directivos</h2>
                <div class="dec-separator"><img src="{{ asset('images/logo.png') }}" alt="" style="width: 50px;"> </div>
            </div>
            <ul class="team-holder">
                @if($museo->museosDirectivos->count()>0)
                	@foreach($museo->museosDirectivos as $directivo)
    	                <li>
    	                    <div class="team-box">
    	                        <div class="team-photo">
    	                            <img src="{{ asset('images/museos/'.$directivo->foto) }}" alt="" class="respimg"> 									
    	                        </div>
    	                        <div class="team-info">
    	                            <h3>{{ $directivo->nombre }}</h3>
    	                            <h4 style="text-transform: capitalize;">{{ $directivo->cargo->cargo }}</h4>
    	                        </div>
    	                    </div>
    	                </li>
    	            @endforeach
                @else
                    <h2>No hay información publicada.</h2>
                @endif
            </ul>
        </div>
        <div class="parallax-title right-pos" data-scrollax="properties: { translateY: '-350px' }">Nuestros Directivos</div>
    </section>
    <!-- section end -->
    <!-- section   -->
    <section data-scrollax-parent="true" id="sec4" class="scroll-con-sec">
        <div class="section-title ">
            <h2>Obras Exhibidas</h2>
            <div class="dec-separator"><img src="{{ asset('images/logo.png') }}" alt="" style="width: 50px;"> </div>
        </div>
        <!--=============== portfolio holder ===============-->
        <div class="gallery-items  lightgallery  three-columns">
            <!--gallery-item -->
            @php $i=1; @endphp
            @if($museo->museosImagenes->count()>0)
	            @foreach($museo->museosImagenes as $imagen)
	            	@if($i<10)
			            <div class="gallery-item">
			                <div class="grid-item-holder">
			                    <div class="box-item fl-wrap   popup-box">
			                        <img  src="{{ asset('images/museos/'.$imagen->imagen) }}" style="width: auto; max-height: 240px; height: 240px;" alt="">
			                        <a data-src="{{ asset('images/museos/'.$imagen->imagen) }}" class="popup-image"><i class="fa fa-search"></i></a>
			                    </div>
			                    <div class="det-box fl-wrap">
                                    @php
                                        $tamaño=strlen($imagen->titulo);
                                        if($tamaño<40)
                                        {
                                            $imagen->title=$imagen->titulo;
                                        }
                                        else
                                        {
                                            $imagen->title=substr($imagen->titulo, 0, 40)."...";
                                        }
                                    @endphp
			                        <h3 data-toggle="tooltip" title="{{ $imagen->titulo }}">{{ $imagen->title }} <i class="fa fa-plus-circle" onclick="detalles({{ $imagen->id }});" aria-hidden="true" style="color: #800000; cursor: pointer;" data-toggle="tooltip" title="Ver detalles"></i></h3>
			                    </div>
			                </div>
			            </div>
			            @php $i++; @endphp
			        @endif
		        @endforeach
		    @else
		    	<h2>No hay imágenes publicadas.</h2>
		    @endif
            <!--gallery-item end-->
        </div>
        <!-- end gallery items -->
        <div class="clearfix"></div>
        <div class="container">
            <div class="section-qoute fl-wrap">
                @if($museo->museosImagenes->count()>0)
                    <a href="{{ route('museos.obras', [$museo->id, $museo->slug]) }}" class="btn btn-vinotinto">Ver Más</a>
                @endif
            </div>
        </div>
    </section>
    <!-- section end -->
    <!-- section   -->
    <section class="dark-bg scroll-con-sec"     data-scrollax-parent="true" id="sec5">
        <div class="bg  par-elem"  data-bg="{{ asset('images/museos/'.$museo->bg_servicios) }}" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay  bold-overlay"></div>
        <div class="container">
            <div class="column-text fl-wrap ser-wrap">
                <div class="row" style="background-color: rgba(255, 255, 255, 0.5);">
                    <div class="col-md-12">
                        <h2 style="color: black !important">Nuestros Servicios</h2>
                        <br>
                    	@if($museo->museosImagenes->count()>0)
                            @foreach($museo->museosServicios as $servicio)
	                            <div class="col-md-12" style="padding: 10px;">
	                                <div class="serv-header fl-wrap">
	                                    <h4>{{ $servicio->servicio }}</h4>
	                                </div>
	                                <div class="clearfix"></div>
	                                <div style="text-align: justify; font-size: 18px;">
	                                	{!! $servicio->descripcion !!}
	                            	</div>
	                            </div>
	                        @endforeach
	                    @else
	                    	<h2>No hay servicios publicados.</h2>
	                    @endif   
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->
    <!-- section   -->
    <section  data-scrollax-parent="true">
        <div class="container">
            <div class="section-title ">
                <h2>Contáctanos</h2>
                <div class="dec-separator"><img src="{{ asset('images/logo.png') }}" alt="" style="width: 50px;"> </div>
            </div>
            <div class="about-entry con-entry">
                <div class="row">
                    <div class="col-md-3">
                        <h3>Información de <span>Contacto</span></h3>
                        <span>{{ $museo->contacto }}</span>
                    </div>
                    <div class="col-md-9">
                        <div class="contact-list fl-wrap gray-bg">
                            <ul >
                                <li>
                                    <i class="fa fa-phone"></i> 
                                    <h4>Teléfono : </h4>
                                    <a style="cursor: default;"> {{ $museo->telefono }}</a>
                                </li>
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    <h4>Dirección : </h4>
                                    <a style="cursor: default;"> {{ $museo->direccion }}</a>
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o"></i>
                                    <h4>Correo :</h4>
                                    <a style="cursor: default;"> {{ $museo->correo }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="parallax-title right-pos" data-scrollax="properties: { translateY: '-350px' }">Contáctanos</div>
    </section>
    <!-- section end -->
    <!-- section   -->
    <section class="no-padding">
        <div class="map-box">
            {!! Form::hidden('latitud', $museo->latitud, ['id'=>'latitud']) !!}
            {!! Form::hidden('longitud', $museo->longitud, ['id'=>'longitud']) !!}
            {!! Form::hidden('nombre', $museo->nombre, ['id'=>'nombre']) !!}
            <div  id="map-canvas"></div>
        </div>
    </section>
    <!-- Footer -->
    <div class="height-emulator fl-wrap"></div>
    <footer class="fl-wrap vinotinto-bg fixed-footer">
        <div class="container">
            <div class="footer-logo"><a href="{{ url('/') }}" class="ajax"><img src="{{ asset('images/footer.png') }}" alt=""></a></div>
            <div class="clearfix"></div>
            <div class="copyright">&#169; IARTE 2017 . Todos los derechos reservados. </div>
        </div>
    </footer>
    <!-- footer end -->
@endsection
@section('js')
    <!--=============== google map ===============-->
    <script src="{{ asset('js/front/museos.js') }}"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDwJSRi0zFjDemECmFl9JtRj1FY7TiTRRo"></script>
    <script>
        $(document).ready(function(){
            $("#map-canvas").gmap3({
                action: "init",
                marker: {
                    values: [ {
                        latLng: [ document.getElementById('latitud').value, document.getElementById('longitud').value ],
                        data: document.getElementById('nombre').value,
                        options: {
                            icon: carpeta+"images/marker.png"
                        }
                    } ],
                    options: {
                        draggable: false
                    },
                    events: {
                        mouseover: function(a, b, c) {
                            var d = $(this).gmap3("get"), e = $(this).gmap3({
                                get: {
                                    name: "infowindow"
                                }
                            });
                            if (e) {
                                e.open(d, a);
                                e.setContent(c.data);
                            } else $(this).gmap3({
                                infowindow: {
                                    anchor: a,
                                    options: {
                                        content: c.data
                                    }
                                }
                            });
                        },
                        mouseout: function() {
                            var a = $(this).gmap3({
                                get: {
                                    name: "infowindow"
                                }
                            });
                            if (a) a.close();
                        }
                    }
                },
                map: {
                    options: {
                        zoom: 14,
                        zoomControl: true,
                        mapTypeControl: true,
                        scaleControl: true,
                        scrollwheel: false,
                        streetViewControl: true,
                        draggable: true,
                        styles:[{featureType:"all",elementType:"labels.text.fill",stylers:[{saturation:36},{color:"#000000"},{lightness:40}]},{featureType:"all",elementType:"labels.text.stroke",stylers:[{visibility:"on"},{color:"#000000"},{lightness:16}]},{featureType:"all",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"administrative",elementType:"geometry.fill",stylers:[{color:"#000000"},{lightness:20}]},{featureType:"administrative",elementType:"geometry.stroke",stylers:[{color:"#000000"},{lightness:17},{weight:1.2}]},{featureType:"landscape",elementType:"geometry",stylers:[{color:"#000000"},{lightness:20}]},{featureType:"poi",elementType:"geometry",stylers:[{color:"#000000"},{lightness:21}]},{featureType:"road.highway",elementType:"geometry.fill",stylers:[{color:"#000000"},{lightness:17}]},{featureType:"road.highway",elementType:"geometry.stroke",stylers:[{color:"#000000"},{lightness:29},{weight:.2}]},{featureType:"road.arterial",elementType:"geometry",stylers:[{color:"#000000"},{lightness:18}]},{featureType:"road.local",elementType:"geometry",stylers:[{color:"#000000"},{lightness:16}]},{featureType:"transit",elementType:"geometry",stylers:[{color:"#000000"},{lightness:19}]},{featureType:"water",elementType:"geometry",stylers:[{color:"#000000"},{lightness:17}]},{featureType:"water",elementType:"geometry.fill",stylers:[{saturation:"-100"},{lightness:"-100"},{gamma:"0.00"}]}]
                    }
                }
            });
        });
    </script>
@endsection