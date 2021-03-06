@extends('template.main')
@section('title', 'Museos')
@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/DataTables/dataTables.css') }}">
  	<link rel="stylesheet" href="{{ asset('plugins/DataTables/DataTables-1.10.16/css/jquery.dataTables.css') }}">
  	<link rel="stylesheet" href="{{ asset('plugins/DataTables/Buttons-1.4.2/css/buttons.dataTables.css') }}">
  	<link rel="stylesheet" href="{{ asset('plugins/DataTables/Responsive-2.2.0/css/responsive.bootstrap.css') }}">
  	<link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
  	<link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
  	<link rel="stylesheet" href="{{ asset('plugins/trumbowyg/ui/trumbowyg.css') }}">
@endsection
@section('content')
	<div class="">
		<!-- /.box-header -->
		{!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
		{!! Form::hidden('control', 'edit', ['id'=>'control']) !!}
		@include('admin.museos.create')
		@include('admin.museos.asignar')
		<div class="box-body" id="cuadro2" style="z-index: 10;">
			<div class="table-responsive">
  				<table id="tabla" class="table table-bordered table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>								
							<th>Nombre</th>
							<th>Foto</th>
							<th>Fundado</th>
							<th>Teléfono</th>
							<th>Correo</th>
							<th>Estatus</th>
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
  	<script src="{{ asset('js/admin/museos.js') }}"></script>
  	<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
  	<script src="{{ asset('plugins/datepicker/locales/bootstrap-datepicker.es.js') }}"></script>
  	<script src="{{ asset('plugins/maskedinput/jquery.maskedinput.js') }}"></script>
  	<script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
  	<script src="{{ asset('plugins/trumbowyg/trumbowyg.js') }}"></script>
  	<script src="{{ asset('plugins/trumbowyg/langs/es.min.js') }}"></script>
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