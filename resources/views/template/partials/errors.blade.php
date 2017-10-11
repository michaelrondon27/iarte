@if(count($errors)>0)
	<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</div>
@endif