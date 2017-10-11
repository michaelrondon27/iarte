<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <base href="http://localhost/iarte/">
        <title>@yield('title', 'IARTE')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <!--=============== css  ===============-->
		<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
		<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
		<link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('css/color.css') }}">
		<link rel="stylesheet" href="{{ asset('css/yourstyle.css') }}">
		<link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.css') }}">
		<link rel="stylesheet" href="{{ asset('plugins/sweetalert/sweetalert.css') }}">
		@yield('css')
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="public/images/favicon.ico">
    </head>
    <body>
        <!--================= loader ================-->
        <div class="loader">
            <div class="cssload-container">
                <div class="cssload-speeding-wheel"></div>
            </div>
        </div>
        <!--================= loader end ================-->
        <!--================= main start ================-->
        <div id="main">
            @include('template.partials.nav')
            <!--=============== wrapper ===============-->	
            <div id="wrapper">
                <div class="content-holder   scale-bg2">
                    <div class="content scroll-content" id="contenido">
                        @include('flash::message')
                        <div id="alert"></div>
        				@include('template.partials.errors')
        				@yield('content')
                    </div>
                    <!--footer   --> 
                    <div class="height-emulator fl-wrap" id="vacio"></div>
                    <footer class="fl-wrap vinotinto-bg fixed-footer" id="footer">
                        <div class="container">
                            @if (Auth::check())
                                <div class="footer-logo"><a href="{{ url('/home') }}" class="ajax"><img src="public/images/footer.png" alt=""></a></div>
                            @else
                                <div class="footer-logo"><a href="" class="ajax"><img src="public/images/footer.png" alt=""></a></div>
                            @endif
                            <div class="clearfix"></div>
                            <div class="copyright">&#169; IARTE 2017 . Todos los derechos reservados. </div>
                        </div>
                    </footer>
                    <!--footer  end -->
                </div>
                <!--fixed-icons --> 
                <div class="fixed-icons">
                    <ul>
                        <li>
                            <div class="to-top"><i class="fa fa-angle-up"></i></div>
                        </li>
                    </ul>
                </div>
                <!--fixed-icons -->
                <!--content-holder end --> 
            </div>
            <!-- wrapper end -->
            <!-- cd-transition-layer -->
            <div class="cd-transition-layer">
                <div class="bg-layer"></div>
            </div>
            <!-- cd-transition-layer end -->
        </div>
        <!-- Main end -->
        <!--=============== google map ===============-->
        <!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDwJSRi0zFjDemECmFl9JtRj1FY7TiTRRo"></script>-->
        <!--=============== scripts  ===============-->
        <script src="{{ asset('plugins/jquery/jquery-2.2.3.min.js') }}"></script>
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="{{ asset('js/core.js') }}"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="{{ asset('plugins/jqueryUI/jquery-ui.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
        <script src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}"></script>
		<script src="{{ asset('js/generales.js') }}"></script>
		@yield('js')
    </body>
</html>