@extends('template.main')
@section('title', 'Cargos')
@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/DataTables/dataTables.css') }}">
  	<link rel="stylesheet" href="{{ asset('plugins/DataTables/DataTables-1.10.16/css/jquery.dataTables.css') }}">
  	<link rel="stylesheet" href="{{ asset('plugins/DataTables/Buttons-1.4.2/css/buttons.dataTables.css') }}">
  	<link rel="stylesheet" href="{{ asset('plugins/DataTables/Responsive-2.2.0/css/responsive.bootstrap.css') }}">
@endsection
@section('content')
	<div class="">
		<!-- /.box-header -->
		{!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
		{!! Form::hidden('control', Auth::user()->perfiles->first()->id, ['id'=>'control']) !!}
		@include('admin.cargos.create')
    	@include('admin.cargos.edit')
		<div class="box-body" id="cuadro3" style="z-index: 10;">
			<div class="table-responsive">
  				<table id="tabla" class="table table-bordered table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>								
							<th>Cargo</th>
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
  	<script src="{{ asset('js/admin/cargos.js') }}"></script>
  	<script src="{{ asset('plugins/DataTables/dataTables.js') }}"></script>
  	<script src="{{ asset('plugins/DataTables/DataTables-1.10.16/js/jquery.dataTables.js') }}"></script>
  	<script src="{{ asset('plugins/DataTables/Buttons-1.4.2/js/dataTables.buttons.js') }}"></script>
  	<script src="{{ asset('plugins/DataTables/Responsive-2.2.0/js/dataTables.responsive.js') }}"></script>
@endsection