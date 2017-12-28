@extends('template.main')
@section('content')
	{!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
    <div class="modal fade" id="listarEstados" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title" id="myModalLabel" style="border-bottom: 1px solid #800000">Filtrar por País</h2>
                    @foreach($estados as $estado)
                        @if($estado->museos->count()>0)
                            <div class="col-md-4">
                                <a href="{{ route('museos', ['order' => request('order'), 'estado='.$estado->estado, 'tipo_museo' => request('tipo_museo')]) }}">
                                    <p style="font-size: 12px;">{{ $estado->estado }} ({{ $estado->museos->count() }})</p>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="listarTiposMuseos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title" id="myModalLabel" style="border-bottom: 1px solid #800000">Filtrar por Profesión</h2>
                    @foreach($tiposMuseos as $tipoMuseo)
                        @if($tipoMuseo->museos->count()>0)
                            <div class="col-md-4">
                                <a href="{{ route('museos', ['order' => request('order'), 'pais' => request('pais'), 'tipo_museo='.$tipoMuseo->tipo_museo]) }}">
                                    <p style="font-size: 12px;">{{ $tipoMuseo->tipo_museo }} ({{ $tipoMuseo->museos->count() }})</p>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
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
                            <li><a href="{{ route('museos') }}">Sin Filtros</a></li>
                            <li><a href="{{ route('museos', ['order=populares', 'estado' => request('estado'), 'tipo_museo' => request('tipo_museo')]) }}">Más Vistos</a></li>
                            <li><a href="{{ route('museos', ['order=az', 'estado' => request('estado'), 'tipo_museo' => request('tipo_museo')]) }}">A - Z</a></li>
                            <li><a href="{{ route('museos', ['order=za', 'estado' => request('estado'), 'tipo_museo' => request('tipo_museo')]) }}">Z - A</a></li>
                            <li><a href="{{ route('museos', ['order=recientes', 'estado' => request('estado'), 'tipo_museo' => request('tipo_museo')]) }}">Recientes</a></li>
                        </ul>
                    </div>
                    <div class="category-filter blog-btn-filter">
                        <div class="filtro-btn" data-toggle='modal' data-target='#listarEstados'>Estado <i class="fa fa-list-ul" aria-hidden="true"></i></div>
                    </div>
                    <div class="category-filter blog-btn-filter">
                        <div class="filtro-btn" data-toggle='modal' data-target='#listarTiposMuseos'>Tipo de Museo <i class="fa fa-list-ul" aria-hidden="true"></i></div>
                    </div>
                    <!-- filter category end  -->
                </div>
            </div>
            <div class="row">
                <!-- article wrap -->
                <div class="col-md-8">
                    <!--=============== portfolio holder ===============-->
                    <div class="gallery-items   three-columns">
                    	@foreach($museos as $museo)
                            <div class="gallery-item ">
                            	<div class="grid-item-holder">
            	                    <div class="box-item fl-wrap   popup-box">
            	                        <img  src="{{ asset('images/museos/'.$museo->foto) }}" style="height: 200px; width: auto;"   alt="">
            	                        <a href="{{ route('museos.ver', [$museo->id, $museo->slug]) }}" class="ajax"><i class="fa fa-link"></i></a>
            	                    </div>
            	                    <div class="det-box fl-wrap">
            	                        <h3><a href="{{ route('museos.ver', [$museo->id, $museo->slug]) }}" class="ajax">{{ $museo->nombre }}</a></h3>
            	                        <h4>Visitas: {{ $museo->visitas }} - Obras: {{ $museo->obras }}</h4>
            	                    </div>
            	                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- end gallery items -->
                </div>
                @include('template.partials.sidebar')
            </div>
        </div>
    </section>
    <!-- section end-->
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
@endsection