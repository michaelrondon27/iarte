@extends('template.main')
@section('content')
    @include('front.museos.detalles')
	{!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
	<section data-scrollax-parent="true" class="col-md-8">
        <div class="fl-wrap inline-filter npf blog-filters-wrap">
            <!-- filter  -->
            <div class="blog-filters">
                <span>Filtrar: </span>
                <!-- filter category    -->
                <div class="category-filter blog-btn-filter">
                    <div class="blog-btn">Ordenar <i class="fa fa-list-ul" aria-hidden="true"></i></div>
                    <ul>
                        <li><a href="{{ route('museos.obras', [$museo->id, $museo->slug]) }}">Más Vistos</a></li>
                        <li><a href="{{ route('museos.obras', [$museo->id, $museo->slug, 'order=az']) }}">A - Z</a></li>
                        <li><a href="{{ route('museos.obras', [$museo->id, $museo->slug, 'order=za']) }}">Z - A</a></li>
                        <li><a href="{{ route('museos.obras', [$museo->id, $museo->slug, 'order=recientes']) }}">Recientes</a></li>
                    </ul>
                    <span style="padding: 0px 0px 0px 20px; font-size: 16px; color: #800000;">Museo: {{ $museo->nombre }} </span>
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
        <!--=============== portfolio holder ===============-->
        <div class="gallery-items  lightgallery  three-columns">
            <!--gallery-item -->
            @foreach($imagenes as $imagen)
                <div class="gallery-item">
                    <div class="grid-item-holder">
                        <div class="box-item fl-wrap   popup-box">
                            <img  src="{{ asset('images/museos/'.$imagen->imagen) }}" style="width: auto; max-height: 200px; height: 200px;" alt="">
                            <a data-src="{{ asset('images/museos/'.$imagen->imagen) }}" class="popup-image"><i class="fa fa-search"></i></a>
                        </div>
                        <div class="det-box fl-wrap">
                            <h3 data-toggle="tooltip" title="{{ $imagen->titulo }}">{{ $imagen->title }} <i class="fa fa-plus-circle" onclick="detalles({{ $imagen->id }});" aria-hidden="true" style="color: #800000; cursor: pointer;" data-toggle="tooltip" title="Ver detalles"></i></h3>
                        </div>
                    </div>
                </div>
            @endforeach
            <!--gallery-item end-->
        </div>
         {!! $imagenes->links() !!}
        <!-- end gallery items -->
    </section>
    <!-- section end-->
    @include('template.partials.sidebar')
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $("#museos").attr('class', 'active');
            $('#contenido').removeClass('content scroll-content');
            $("#contenido").addClass('content');
        });
    </script>
    <script src="{{ asset('js/front/barraLateral.js') }}"></script>
    <script src="{{ asset('js/front/museos.js') }}"></script>
@endsection