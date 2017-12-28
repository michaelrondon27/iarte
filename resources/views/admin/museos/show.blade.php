@extends('template.main')
@section('title', 'Museos')
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
@endsection
@section('content')
	{!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
    {!! Form::hidden('id', $museo->id, ['id'=>'id']) !!}
    {!! Form::hidden('control', 'show', ['id'=>'control']) !!}
    @include('admin.museosimagenes.create')
    @include('admin.museosimagenes.edit')
    <!-- section   -->
    <section data-scrollax-parent="true" id="sec4" class="scroll-con-sec">
        <div class="section-title ">
            <h2>Obras Exhibidas</h2>
            <div class="dec-separator"><img src="{{ asset('images/logo.png') }}" alt="" style="width: 50px;"> </div>
            <div class="box-header" style="text-align: right; z-index: 1000;" id="imagen_create"></div>
        </div>
        <div id="alert_imagenes"></div>
        <!--=============== portfolio holder ===============-->
        <div class=" lightgallery  three-columns" id="listar_imagenes"></div>
        <!-- end gallery items -->
        <div class="clearfix"></div>
        <div class="container">
            <div class="section-qoute fl-wrap">
                <div id="interface">
                    <input type="text" id="take" value="9" class="ocultar">
                    <button id="loadButton" class="boton" onclick="cargarImagenes(9, this, 9);">Mostrar más</button>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->
    <div class="height-emulator fl-wrap"></div>
@endsection
@section('js')
	<script>
        $(document).ready(function(){
            $('#contenido').removeClass('content scroll-content');
            $("#contenido").addClass('content full-height scroll-content');
        });
    </script>
  	<script src="{{ asset('js/admin/museos.js') }}"></script>
    <script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
@endsection