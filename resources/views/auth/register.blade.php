@extends('template.main')
@section('pages', 'Registrarse')
@section('content')
    <div class="content scroll-content">
        <div class="row">
            <!-- article wrap -->
            <div class="col-md-8">
                <!-- section  -->   
                <!-- section  -->                     
                <section data-scrollax-parent="true" id="sec9" class="scroll-con-sec">
                    <div class="container">
                        <div class="section-title ">
                            <h2>Registrarse</h2>
                        </div>            
                        <div class="login-box-body col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                                {!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                                    <input type="text" class="form-control" placeholder="Nombre" name="name" id="name" value="{{ old('name') }}" required autofocus>
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                                    <input type="email" class="form-control" placeholder="Correo" name="email" id="email" value="{{ old('email') }}" required autofocus>
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                                    <input type="password" class="form-control" placeholder="Contraseña" id="password" name="password" required>
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="password" class="form-control" placeholder="Repetir Contraseña" id="password-confirm" name="password_confirmation" required>
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                                        <button type="submit" class="btn btn-block btn-flat btn-vinotinto">Registrarse</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="parallax-title left-pos" data-scrollax="properties: { translateY: '-350px' }">Registrarse</div>
                </section>
                <!-- section end -->
            </div>
            @include('template.partials.sidebar')
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/front/barraLateral.js') }}"></script>
@endsection