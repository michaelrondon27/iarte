@extends('template.main')
@section('title', 'Museos')
@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/DataTables/dataTables.css') }}">
  	<link rel="stylesheet" href="{{ asset('plugins/DataTables/DataTables-1.10.16/css/jquery.dataTables.css') }}">
  	<link rel="stylesheet" href="{{ asset('plugins/DataTables/Buttons-1.4.2/css/buttons.dataTables.css') }}">
  	<link rel="stylesheet" href="{{ asset('plugins/DataTables/Responsive-2.2.0/css/responsive.bootstrap.css') }}">
  	<link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
  	<link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
  	<link rel="stylesheet" href="{{ asset('plugins/trumbowyg/ui/trumbowyg.css') }}">
@endsection
@section('content')
	{!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
    {!! Form::hidden('id', $museo->id, ['id'=>'id']) !!}
    {!! Form::hidden('control', 'edit', ['id'=>'control']) !!}
    @include('admin.museos.portada')
    @include('admin.museos.historia')
    @include('admin.museos.servicio')
    @include('admin.museos.mapa')
    @include('admin.museosimagenes.create')
    @include('admin.museosimagenes.edit')
    <!-- section -->
    <section class="full-height no-padding scroll-con-sec" id="sec1">
        <!-- Hero section   -->
        <div class="hero-wrap fl-wrap full-height">
        	<div class="box-header" style="text-align: right; z-index: 1000;" id="imagen_portada"></div>
            <div class="hero-wrap-item  alt  entry-wrap">
                <div class="container">
                    <div class="fl-wrap section-entry">
                        <h2 id="nombre_museo"></h2>
                    </div>
                </div>
            </div>
            <div class="bg"  id="bg_portada"></div>
            <div class="overlay"></div>
			<a href="#sec2" class="sec-entr-link custom-scroll-link"><i class="fa fa-angle-double-down" aria-hidden="true"></i></a>
        </div>
        <!-- Hero section   end -->
    </section>
    <!-- section end -->
    <!-- section   -->                  
    <section  id="sec2" data-scrollax-parent="true" class="scroll-con-sec">
    	<div class="box-header" style="text-align: right; z-index: 1000;" id="imagen_historia"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="about-entry">
                        @include('template.partials.required')
                        <h2>Historia</h2>
                        {!! Form::open(['id'=>'form_actualizar', 'role'=>'form', 'files'=>true, 'name'=>'form_actualizar', 'method'=>'PUT']) !!}
                            <div class="box-body">
                                <div class="form-group col-md-4 col-sm-12 col-xs-12 div">
                                    {!! Form::label('foto', 'Foto', ['class'=>'pull-left negrita']) !!}
                                    {!! Form::file('foto', ['class'=>'form-control', 'foto']) !!}
                                </div>
                                <div class="form-group col-md-4 col-sm-12 col-xs-12 div">
                                    {!! Form::label('nombre', '*Nombre', ['class'=>'pull-left negrita']) !!}
                                    {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre', 'required', 'onkeypress'=>'return sololetras(event)', 'id'=>'nombre']) !!}
                                </div>
                                <div class="form-group col-md-4 col-sm-12 col-xs-12 div">
                                    {!! Form::label('fecha_fundacion', '*Fecha de Fundación', ['class'=>'pull-left negrita']) !!}
                                    {!! Form::text('fecha_fundacion', null, ['class'=>'form-control fecha', 'placeholder'=>'DD-MM-AAAA', 'required', 'onkeypress'=>'return deshabilitarteclas(event)', 'autocomplete'=>'off', 'id'=>'fundacion']) !!}
                                </div>
                                <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                    {!! Form::label('tipos_museos', '*Tipo de Museo', ['class'=>'pull-left negrita']) !!}
                                    {!! Form::select('tipos_museos[]', $tiposMuseos, null, ['class'=>'form-control multiple', 'multiple', 'id'=>'tipos_museos']) !!}
                                </div>
                                <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                    {!! Form::label('artistas', 'Artistas Exhibidos', ['class'=>'pull-left negrita']) !!}
                                    {!! Form::select('artistas[]', $artistas, null, ['class'=>'form-control multiple', 'multiple', 'id'=>'artistas_edit']) !!}
                                </div>
                                <div class="form-group col-md-3 col-sm-12 col-xs-12">
                                    {!! Form::label('estado_id', '*Estado', ['class'=>'pull-left']) !!}
                                    {!! Form::select('estado_id', $estados, null, ['class'=>'form-control select', 'required', 'placeholder'=>'Seleccione una opción', 'id'=>'estado']) !!}
                                </div>
                                <div class="ocultar">
                                    {!! Form::select('usuarios[]', $usuarios, null, ['class'=>'form-control multiple', 'multiple', 'id'=>'usuarios_edit']) !!}
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    {!! Form::label('historia', '*Historia', ['class'=>'pull-left label_biografia']) !!}
                                    <br>
                                    {!! Form::textarea('historia', null, ['class'=>'form-control historia', 'required', 'id'=>'historia_edit']) !!}
                                </div>
                                <div class="form-group col-md-8 col-md-offset-2">
                                    {!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="bg " id="bg_historia"></div>
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
                        <div class="num-counter" id="imagenConteo">0</div>
                    </div>
                </div>
                <h6>Total de Imagenes</h6>
            </div>
            <!-- 1  end-->
            <!-- 2  -->
            <div class="inline-facts">
                <div class="milestone-counter">
                    <i class="fa fa-users "></i> 
                    <div class="stats animaper">
                        <div class="num-counter" id="artistasConteo"></div>
                    </div>
                </div>
                <h6>Artistas Exhibidos</h6>
            </div>
            <!-- 2 end  -->
            <!-- 3  -->
            <div class="inline-facts">
                <div class="milestone-counter">
                    <i class="fa fa-line-chart "></i>
                    <div class="stats animaper">
                        <div class="num-counter" id="visitas"></div>
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
                        <div class="num-counter" id="promedio"></div>
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
            <div id="alert_directiva"></div>
            @include('admin.museosdirectivos.create')
            @include('admin.museosdirectivos.edit')
            <div class="table-responsive col-md-12" id="cuadro4">
                <table id="tablaDirectivos" class="table table-bordered table-striped table-hover" style="background-color: #fff;">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Foto</th>
                            <th>Cargo</th>
                            <th>Creado</th>
                            <th>Actualizado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <div class="parallax-title right-pos" data-scrollax="properties: { translateY: '-350px' }">Directiva</div>
    </section>
    <!-- section end -->
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
                <a href="{{ route('museos.show', $museo->id) }}" class="btn btn-vinotinto">Ver Más</a>
            </div>
        </div>
    </section>
    <!-- section end -->
    <!-- section   -->
    <section class="dark-bg scroll-con-sec"     data-scrollax-parent="true" id="sec5">
        <div class="box-header" style="text-align: right; z-index: 1000;" id="imagen_servicio"></div>
        <div class="bg  par-elem"  id="bg_servicios" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay  bold-overlay"></div>
        <div class="container">
            <div id="alert_servicio"></div>
            <div class="column-text fl-wrap ser-wrap">
                <div class="row">
                    @include('admin.museosservicios.create')
                    @include('admin.museosservicios.edit')
                    <div class="col-md-12" id="cuadro7">
                        <h2>Servicios</h2>
                        <div class="table-responsive col-md-12" style="background-color: rgba(255, 255, 255, 0.25); border-radius: 10px;">
                            <table id="tablaServicios" class="table table-bordered table-striped table-hover" style="background-color: #fff;">
                                <thead>
                                    <tr>
                                        <th>Servicio</th>
                                        <th>Creado</th>
                                        <th>Actualizado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
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
            <div id="alert_contacto"></div>
            <div class="about-entry con-entry">
                <div class="row">
                    {!! Form::open(['id'=>'form_contacto', 'role'=>'form', 'name'=>'form_contacto', 'method'=>'POST']) !!}
                        <div class="col-md-3">
                            <h3>Información de <span>Contacto</span></h3>
                            {{ Form::text('contacto', null, ['id'=>'contacto', 'class'=>'form-control', 'placeholder'=>'Contacto']) }}
                        </div>
                        <div class="col-md-9">
                            <div class="contact-list fl-wrap gray-bg">
                                <ul >
                                    <li>
                                        <i class="fa fa-phone"></i> 
                                        <h4>Teléfono : </h4>
                                        {!! Form::text('telefono', null, ['class'=>'form-control telefono', 'placeholder'=>'Teléfono', 'id' => 'telefono', 'onkeypress'=>'return solonumeros(event)']) !!}
                                    </li>
                                    <li>
                                        <i class="fa fa-map-marker"></i>
                                        <h4>Dirección : </h4>
                                        {!! Form::text('direccion', null, ['class'=>'form-control', 'placeholder'=>'Dirección', 'id' => 'direccion']) !!}
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope-o"></i>
                                        <h4>Correo :</h4>
                                         {!! Form::text('correo', null, ['class'=>'form-control', 'placeholder'=>'Correo', 'id' => 'correo']) !!}
                                    </li>
                                    <div class="form-group col-sm-8">
                                        {!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
                                    </div>
                                </ul>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="parallax-title right-pos" data-scrollax="properties: { translateY: '-350px' }">Contacto</div>
    </section>
    <!-- section end -->
    <!-- section   -->
    <section class="no-padding">
        <div id="alert_mapa"></div>
        <div class="map-box">
            <div id="latlog" class="box-header" style="text-align: right; z-index: 1000;"></div>
            <div  id="map-canvas"></div>
        </div>
    </section>
    <!-- Footer -->
    <div class="height-emulator fl-wrap"></div>
    <footer class="fl-wrap vinotinto-bg fixed-footer">
        <div class="container">
            @if (Auth::check())
                <div class="footer-logo"><a href="{{ url('/home') }}" class="ajax"><img src="{{ asset('images/footer.png') }}" alt=""></a></div>
            @else
                <div class="footer-logo"><a href="" class="ajax"><img src="{{ asset('images/footer.png') }}" alt=""></a></div>
            @endif
            <div class="clearfix"></div>
            <div class="copyright">&#169; IARTE 2017 . Todos los derechos reservados. </div>
        </div>
    </footer>
    <!-- footer end -->
@endsection
@section('js')
	<script>
        $(document).ready(function(){
            $('#contenido').removeClass('content scroll-content');
            $("#contenido").addClass('content full-height scroll-content');
        });
    </script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDwJSRi0zFjDemECmFl9JtRj1FY7TiTRRo"></script>
  	<script src="{{ asset('js/admin/museos.js') }}"></script>
  	<script src="{{ asset('plugins/DataTables/dataTables.js') }}"></script>
  	<script src="{{ asset('plugins/DataTables/DataTables-1.10.16/js/jquery.dataTables.js') }}"></script>
  	<script src="{{ asset('plugins/DataTables/Buttons-1.4.2/js/dataTables.buttons.js') }}"></script>
  	<script src="{{ asset('plugins/DataTables/Responsive-2.2.0/js/dataTables.responsive.js') }}"></script>
  	<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
  	<script src="{{ asset('plugins/datepicker/locales/bootstrap-datepicker.es.js') }}"></script>
  	<script src="{{ asset('plugins/maskedinput/jquery.maskedinput.js') }}"></script>
  	<script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
  	<script src="{{ asset('plugins/trumbowyg/trumbowyg.js') }}"></script>
  	<script src="{{ asset('plugins/trumbowyg/langs/es.min.js') }}"></script>
@endsection