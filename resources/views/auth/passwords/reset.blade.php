@extends('template.main')
@section('pages', 'Reestablecer Contraseña')
@section('content')
    <div class="content scroll-content">
        <!-- section  -->                     
        <section data-scrollax-parent="true" id="sec9" class="scroll-con-sec">
            <div class="container">
                <div class="section-title ">
                    <h2>Reestablecer Contraseña</h2>
                </div>            
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="login-box-body col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ $token }}">
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
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} has-feedback">
                            <input type="password" class="form-control" placeholder="Repetir Contraseña" id="password-confirm" name="password_confirmation" required>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                                <button type="submit" class="btn btn-block btn-flat btn-vinotinto">Reestablecer Contraseña</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
            </div>
            <div class="parallax-title left-pos" data-scrollax="properties: { translateY: '-350px' }">Reestablecer Contraseña</div>
        </section>
        <!-- section end -->
    </div>
@endsection