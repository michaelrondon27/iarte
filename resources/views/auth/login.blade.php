@extends('template.main')
@section('pages', 'Inicio de Sesión')
@section('content')
    <div class="content scroll-content">
        <!-- section  -->                     
        <section data-scrollax-parent="true" id="sec9" class="scroll-con-sec">
            <div class="container">
                <div class="section-title ">
                    <h2>Inicia Sesión</h2>
                </div>            
                <div class="login-box-body col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                    <form action="{{ route('login') }}" method="post">
                        {!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
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
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                                <button type="submit" class="btn btn-block btn-flat btn-vinotinto">Iniciar</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <a href="{{ route('password.request') }}">¿Se te olvido la contraseña?</a><br>
                    <a href="{{ route('register') }}" class="text-center">Registrarme</a>
                </div>
            </div>
            <div class="parallax-title left-pos" data-scrollax="properties: { translateY: '-350px' }">Inicia Sesión</div>
        </section>
        <!-- section end -->
    </div>
@endsection