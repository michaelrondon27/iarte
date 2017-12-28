@extends('template.main')
@section('content')
    @include('front.museos.detalles')
    {!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
	<!--  section --> 
    <section>
        <div class="container-fluid">
            <div class="row">
                <!-- article wrap -->
                <div class="col-md-8">
                    <!-- Share /  filter    -->
                    <div class="fl-wrap inline-filter npf blog-filters-wrap">
                        <!-- filter  -->
                        <div class="blog-filters">
                            <h2 style="float: left;">Últimas Noticias</h2>
                        </div>
                        <!-- filter end    -->
                    </div>
                    <!-- Share /  filter end   -->
                    <div class="fl-wrap">
                        <div class="gallery-items   blog-items" id="articulos" style="float: none !important;"></div>
                        <div class="clearfix"></div>
                        <a class="load-more-post" href="{{ route('noticias') }}">
                            <span class="btn btn-vinotinto">ver más noticias</span>
                        </a>
                    </div>
                    <div class="fl-wrap inline-filter npf blog-filters-wrap">
                        <!-- filter  -->
                        <div class="blog-filters">
                            <h2 style="float: left;">Obras Populares</h2>
                        </div>
                        <!-- filter end    -->
                    </div>
                    <!-- Share /  filter end   -->
                    <!--=============== portfolio holder ===============-->
                    <div class="gallery-items  lightgallery  three-columns">
                        <!--gallery-item -->
                        @foreach($obrasPopulares as $obraPopular)
                            <div class="gallery-item">
                                <div class="grid-item-holder">
                                    <div class="box-item fl-wrap   popup-box">
                                        <img  src="{{ asset('images/museos/'.$obraPopular->imagen) }}" style="width: auto; max-height: 200px; height: 180px;" alt="">
                                        <a data-src="{{ asset('images/museos/'.$obraPopular->imagen) }}" class="popup-image"><i class="fa fa-search"></i></a>
                                    </div>
                                    <div class="det-box fl-wrap">
                                        <h3 onclick="detalles({{ $obraPopular->id }})" style="cursor: pointer;">Ver detalles <i class="fa fa-search-plus" aria-hidden="true"></i></h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!--gallery-item end-->
                    </div>
                    <div class="fl-wrap inline-filter npf blog-filters-wrap">
                        <!-- filter  -->
                        <div class="blog-filters">
                            <h2 style="float: left;">Galerías Recientes</h2>
                        </div>
                        <!-- filter end    -->
                    </div>
                    <!-- Share /  filter end   -->
                    <!--=============== portfolio holder ===============-->
                    <div class=" lightgallery  three-columns" id="galeriasRecientes"></div>
                </div>
                <!-- article wrap end -->
                @include('template.partials.sidebar')
            </div>
        </div>
    </section>
    <!--section  end --> 
@endsection
@section('js')
    <script src="{{ asset('js/front/inicio.js') }}"></script>
    <script src="{{ asset('js/front/barraLateral.js') }}"></script>
@endsection