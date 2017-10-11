@extends('template.main')
@section('title', 'Redes Sociales')
@section('css')
  <link rel="stylesheet" href="{{ asset('plugins/DataTables/dataTables.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/DataTables/DataTables-1.10.16/css/jquery.dataTables.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/DataTables/Buttons-1.4.2/css/buttons.dataTables.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/DataTables/Responsive-2.2.0/css/responsive.bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
@endsection
@section('content')
  <div class="">
    @include('admin.redessociales.create')
    @include('admin.redessociales.edit')
    <!-- /.box-header -->
    {!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
    {!! Form::hidden('control', Auth::user()->perfiles->first()->id, ['id'=>'control']) !!}
    <div class="box-body" id="cuadro3" style="z-index: 10;">
      <div class="table-responsive">
        <div class="form-inline">
          <div>
            <div class="dt-buttons">
              <a class="dt-buttons btn btn-success" tabindex="0" aria-controls="tabla" title="Agregar Red Social" onClick="agregar()">
                <span><i class="fa fa-handshake-o"></i></span>
              </a>
              <a class="dt-buttons btn btn-primary" tabindex="0" aria-controls="tabla" title="Refrescar Datos" onClick="listar()">
                <span><i class="fa fa-refresh fa-spin fa-fw"></i></span>
              </a>
            </div>
          </div>
        </div>
        <div id="example"></div>
      </div>
    </div>
    <!-- /.box-body -->
  </div>
@endsection
@section('js')
  <script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
  <script src="{{ asset('js/admin/redessociales.js') }}"></script>
  <script src="{{ asset('plugins/DataTables/dataTables.js') }}"></script>
  <script src="{{ asset('plugins/DataTables/DataTables-1.10.16/js/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('plugins/DataTables/Buttons-1.4.2/js/dataTables.buttons.js') }}"></script>
  <script src="{{ asset('plugins/DataTables/Responsive-2.2.0/js/dataTables.responsive.js') }}"></script>
@endsection