@extends('template.main')
@section('content')
    <!-- portfolio  Images  -->
    <div class="vis-pan bvp no-mpan">
        <div class="show-details cpdet novisdet" style="color: #800000; border: 1px solid #800000;">Detalles</div>
        <div class="caption alc"></div>
        <span class="show-thumbs vis-con-panel vis-t" data-textshow="Mostrar en miniatura" data-texthide="Esconder miniaturas" style="color: #800000; border: 1px solid #800000;"></span>
        <div class="num-holder2" style="color: #800000;"></div>
    </div>
    <div class="resize-carousel-holder lightgallery nofssc">
        <div id="opciones"></div>
        <div id="gallery_horizontal" class="gallery_horizontal" data-cen="1" data-loops="1">
            @foreach($galeria->artistasCatalogosImagenes as $imagen)
                <!-- gallery Item-->
                @if($imagen->status->status=='Disponible')
                    <div class="horizontal_item" data-phname="{{ $imagen->nombre }}" data-phdesc="- {{ $imagen->descripcion }} -">
                    	<img src="{{ asset('images/artistas/'.$imagen->imagen) }}" alt="">
                   		<a data-src="{{ asset('images/artistas/'.$imagen->imagen) }}" class="popup-image slider-zoom" data-toggle="tooltip" title="Zoom"><i class="fa fa-expand"></i></a>
               		</div>
                @endif
                <!-- gallery item end-->
            @endforeach                            
        </div>
        <!--  navigation -->
        <div class="customNavigation gals">
            <a class="prev-slide transition"> <i class="fa fa-angle-left"></i></a>
            <a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
        </div>
        <!--  navigation end-->
    </div>
    <!-- portfolio  Images  end-->
    <!-- pdet-container -->
    <div class="det-container anim-sb ver-scroll">
        <div class="content-nav">
            <h2 style="text-transform: capitalize; font-size: 28px; font-style: italic;">{{ $galeria->artista->nombre }}</h2>
        </div>
        <div class="det-info">
            <div>
                <h2 style="text-align: justify; font-size: 20px;">{{ $galeria->titulo }}</h2>
                <h3>Visitas: {{ $galeria->visitas }}</h3>
                <p style="text-align: justify;">{{ $galeria->descripcion }}</p>
                <h4><strong>Disciplinas</strong></h4>
                @foreach($galeria->disciplinas as $disciplina)
                	<span class="badge">{{ $disciplina->disciplina }}</span>
                @endforeach
            </div>
            <div class="share-holder block-share  fl-wrap ">
                <span style="color: #800000;">Compartir :</span><br><br>
                <div class="share-container  isShare"></div>
            </div>
        </div>
    </div>
    <!-- pdet-container end-->
@endsection
@section('js')
    <script>
        $('#contenido').removeClass('content scroll-content');
        $("#contenido").addClass('content hor-content full-height');
        $("#footer").attr('style', 'display: none;');
        $("#vacio").attr('style', 'display: none;');
    </script>
	<script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
    <script src="{{ asset('js/admin/artistas.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/dataTables.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/DataTables-1.10.16/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/Buttons-1.4.2/js/dataTables.buttons.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/Responsive-2.2.0/js/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('plugins/trumbowyg/trumbowyg.js') }}"></script>
    <script src="{{ asset('plugins/trumbowyg/langs/es.min.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/locales/bootstrap-datepicker.es.js') }}"></script>
@endsection