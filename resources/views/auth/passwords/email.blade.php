@extends('template.main')
@section('pages', 'Recuperar Contraseña')
@section('content')
    <div class="content scroll-content">
        <!-- section  -->                     
        <section data-scrollax-parent="true" id="sec9" class="scroll-con-sec">
            <div class="container">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="section-title ">
                    <h2>Recuperar Contraseña</h2>
                </div>            
                <div class="login-box-body col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
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
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                                <button type="submit" class="btn btn-block btn-flat btn-vinotinto">Enviar Correo</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
            </div>
            <div class="parallax-title left-pos" data-scrollax="properties: { translateY: '-350px' }">Recuperar Contraseña</div>
        </section>
        <!-- section end -->
    </div>
@endsection
