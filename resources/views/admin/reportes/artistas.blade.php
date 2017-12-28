@extends('template.main')
@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/highcharts/css/highcharts.css') }}">
@endsection
@section('content')
	{!! Form::hidden('_token', csrf_token(), ['id'=>'token']) !!}
	<div class="row">
		<div class="col-md-6">
			<div id="profesiones" style="min-width: 310px; height: 400px; max-width: 600px; margin: 20px;"></div>
		</div>
		<div class="col-md-6">
			<div id="disciplinas" style="min-width: 310px; height: 400px; max-width: 600px margin: 20px;"></div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-6">
			<div id="paises" style="min-width: 310px; height: 400px; max-width: 600px margin: 20px;"></div>
		</div>
		<div class="col-md-6">
			<div id="catalogosArtistas" style="min-width: 310px; height: 400px; max-width: 600px margin: 20px;"></div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-6">
			<div id="visitasArtistas" style="min-width: 310px; height: 400px; max-width: 600px margin: 20px;"></div>
		</div>
		<div class="col-md-6">
			<div id="visitasCatalogosArtistas" style="min-width: 310px; height: 400px; max-width: 600px margin: 20px;"></div>
		</div>
	</div>
@endsection
@section('js')
	<script src="{{ asset('plugins/highcharts/js/highcharts.js') }}"></script>
	<script src="{{ asset('plugins/highcharts/js/modules/exporting.js') }}"></script>
	<script src="{{ asset('js/reportes/artistas.js') }}"></script>
@endsection