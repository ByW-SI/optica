@extends('layouts.blank')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="container">
	<div role="application" class="panel panel-group">
		@include('paciente.head')
		@yield('infopaciente')
	</div>
</div>

<script src="{{ asset('bootstrap-toggle/js/bootstrap-toggle.js') }}"></script>
<script src="{{ asset('js/sweetalert.js') }}"></script>
@include('sweet::alert')

@endsection