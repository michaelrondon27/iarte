@extends('template.main')
@section('content')
	<!-- section  -->
    <section   class="parallax-section scroll-con-sec"    data-scrollax-parent="true"  id="sec1" >
    	<br><br><br><br><br>
        <div class="bg  par-elem"  data-bg="{{ asset('images/errores/404.png') }}" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="container-fluid">
        	<div style="position: absolute; margin: auto; padding: 5% 40%;">
	            <h4 style="font-size: 16px;">Lo sentimos la página que intenta ver ya no se encuenta disponible.</h4>
	            <div class="clearfix"></div>
	            <div class="dec-separator"><img src="{{ asset('images/logo.png') }}" alt="" style="width: 50px;"> </div>
	        </div>
        </div>
    </section>
    <!-- section end  -->
@endsection