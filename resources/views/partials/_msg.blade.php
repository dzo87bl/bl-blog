@if(Session::has('success'))
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Success!</strong> {{ Session::get('success') }}
	</div>
@endif

@if(Session::has('info'))
	<div class="alert alert-info alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Info!</strong> {{ Session::get('info') }}
	</div>
@endif

@if(Session::has('warning'))
	<div class="alert alert-warning alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Warning!</strong> {{ Session::get('warning') }}
	</div>
@endif

@if(Session::has('danger'))
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Danger!</strong> {{ Session::get('danger') }}
	</div>
@endif

@if(count($errors) > 0)
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Errors:</strong>
		@foreach($errors as $error)
			<p>{{ $error }}</p>
		@endforeach
	</div>
@endif