@extends('template.main')
@section('title', 'Usuarios')
@section('css')
  	<link rel="stylesheet" href="{{ asset('plugins/DataTables/dataTables.css') }}">
  	<link rel="stylesheet" href="{{ asset('plugins/DataTables/DataTables-1.10.16/css/jquery.dataTables.css') }}">
  	<link rel="stylesheet" href="{{ asset('plugins/DataTables/Buttons-1.4.2/css/buttons.dataTables.css') }}">
  	<link rel="stylesheet" href="{{ asset('plugins/DataTables/Responsive-2.2.0/css/responsive.bootstrap.css') }}">
  	<link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
@endsection
@section('content')
  	<div class="">
    	@include('admin.users.create')
      @include('admin.users.edit')
      @include('admin.users.show')
    	<!-- /.box-header -->
    	{!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
    	{!! Form::hidden('control', Auth::user()->perfiles->first()->id, ['id'=>'control']) !!}
    	<div class="box-body" id="cuadro3" style="z-index: 10;">
      		<div class="table-responsive">
        		<table id="tabla" class="table table-bordered table-hover" cellspacing="0" width="100%">
          			<thead>
            			<tr>                
              				<th>Nombre</th>
              				<th>Correo</th>
              				<th>Perfil(es)</th>
              				<th>Estatus</th>
              				<th>Artistas Asignados</th>
                      <th>Museos Asignados</th>
              				<th>Creado</th>
              				<th>Actualizado</th>
              				<th>Acción</th>
            			</tr>
          			</thead>  
          			<tbody></tbody>        
        		</table>
      		</div>
    	</div>
    	<!-- /.box-body -->
  	</div>
@endsection
@section('js')
	  <script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
  	<script src="{{ asset('js/admin/users.js') }}"></script>
  	<script src="{{ asset('plugins/DataTables/dataTables.js') }}"></script>
  	<script src="{{ asset('plugins/DataTables/DataTables-1.10.16/js/jquery.dataTables.js') }}"></script>
  	<script src="{{ asset('plugins/DataTables/Buttons-1.4.2/js/dataTables.buttons.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/Responsive-2.2.0/js/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/Buttons-1.4.2/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/Buttons-1.4.2/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/Buttons-1.4.2/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/Buttons-1.4.2/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/dataTables.fixedColumns.min.js') }}"></script>
@endsection