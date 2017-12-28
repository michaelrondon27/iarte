@extends('template.main')
@section('content')
    <div class="modal fade" id="images" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Subir Foto</h4>
                </div>
                @include('template.partials.required')
                <div class="modal-body">
                    {!! Form::open(['id'=>'form_foto', 'role'=>'form', 'files'=>true, 'name'=>'form_foto']) !!}
                        <div class="box-body">
                            <div class="form-group col-md-8 col-md-offset-2">
                                {!! Form::label('foto', '*Foto', ['class'=>'pull-left']) !!}
                                {!! Form::file('foto', ['class'=>'form-control', 'required', 'id'=>'foto_subida']) !!}
                            </div>
                            <div class="form-group col-md-8 col-md-offset-2">
                                {!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                    <div class="progress ocultar pb">
                        <div class="progress-bar progress-bar-info progress-bar-striped progressBar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	{!! Form::hidden('id', Auth::user()->id, ['id'=>'id']) !!}
	{!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
    <div class="box-body col-md-4" >
        <div class="form-group">
            <h2>Cambiar Contraseña</h2>
            @include('template.partials.required')
        </div>
        <br>
        {!! Form::open(['id'=>'form_password', 'role'=>'form', 'method'=>'POST']) !!}
            <div class="form-group">
                {!! Form::label('password', '*Contraseña', ['class'=>'pull-left']) !!}
                {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'***********', 'required', 'id'=>'password']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password_confirmation', '*Repetir Contraseña', ['class'=>'pull-left']) !!}
                {!! Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=>'***********', 'required', 'id'=>'password_confirmation']) !!}
            </div>
            {!! Form::hidden('status_id', 1) !!}
            <div class="form-group col-sm-8 col-sm-offset-2">
                {!! Form::submit('Guardar',['class'=>'btn btn-vinotinto']) !!}
            </div>
        {!! Form::close() !!}
    </div>
    <div class="col-md-4">
        <div class="main-sidebar-widget">
            <h3>Información</h3>
            <div class="about-widget">
                <p id="nombre" style="font-size: 14px;"></p>
                <p id="correo" style="font-size: 14px;"></p>
                <p id="perfil" style="font-size: 14px;"></p>
                <p id="estatus" style="font-size: 14px;"></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="main-sidebar-widget">
            <h3>Foto</h3>
            <div class="about-widget">
                <div id="foto"></div>
                <div class="signature"><button class='btn btn-vinotinto' data-toggle='modal' data-target='#images'><i class='fa fa-file-image-o' aria-hidden='true'></i> Cambiar Foto</button></div>
            </div>
        </div>
    </div>
@endsection
@section('js')
	<script src="{{ asset('js/admin/cuentas.js') }}"></script>
@endsection