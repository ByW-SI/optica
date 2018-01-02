@extends('layouts.blank')
@section('content')
	{{-- expr --}}
	<div class="container">
		<form role="form" method="POST" action="{{ route($guardar) }}">
			{{ csrf_field() }}
			<div class="panel panel-default">
				<div class="panel-heading">
					Nuevo {{$titulo}} &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-asterisk" aria-hidden="true"></i>
					Campos Requeridos
				</div>
				<div class="panel-body">
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i> Nombre de {{$titulo}}:</label>
	  					<input type="text" class="form-control" id="nombre" name="nombre" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="descripcion">Descripción:</label>
	  					<input type="text" class="form-control" id="descripcion" name="descripcion">
					</div>
				</div>
				<div class="panel-body">
						<button type="submit" class="btn btn-success">
					<strong>Guardar</strong>	</button>
				
				</div>	
			</div>
		</form>
	</div>
@endsection