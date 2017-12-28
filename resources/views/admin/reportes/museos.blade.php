@extends('template.main')
@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/highcharts/css/highcharts.css') }}">
@endsection
@section('content')
	{!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
	<div class="row">
		<div class="col-md-6">
			<div id="estados" style="min-width: 310px; height: 400px; max-width: 600px; margin: 20px;"></div>
		</div>
		<div class="col-md-6">
			<div id="tiposMuseos" style="min-width: 310px; height: 400px; max-width: 600px; margin: 20px;"></div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<div id="visistasMuseos" style="min-width: 310px; height: 400px; width: 99%; margin: 20px;"></div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<div id="obrasPorMuseos" style="min-width: 310px; height: 400px; width: 99%; margin: 20px;"></div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<div id="artistasPorMuseos" style="min-width: 310px; height: 400px; width: 99%; margin: 20px;"></div>
		</div>
	</div>
@endsection
@section('js')
	<script src="{{ asset('plugins/highcharts/js/highcharts.js') }}"></script>
	<script src="{{ asset('plugins/highcharts/js/modules/exporting.js') }}"></script>
	<script src="{{ asset('js/reportes/museos.js') }}"></script>
@endsection