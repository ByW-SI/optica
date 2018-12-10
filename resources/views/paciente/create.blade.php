@extends('layouts.test')
@section('content1')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos del paciente:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('pacientes.index') }}" class="btn btn-primary">
							<i class="fa fa-bars"></i><strong> Lista de Pacientes</strong>
						</a>
					</div>
				</div>
			</div>
		@if(!$edit)
			<form role="form" id="form-empleado" method="POST" action="{{ route('pacientes.store') }}" name="form">
		@else
			<form role="form" id="form-empleado" method="POST" action="{{ route('pacientes.update',['id'=>$paciente->id]) }}" name="form">
				<input type="hidden" name="_method" value="PUT">
		@endif
				<div class="panel-body">
					{{ csrf_field() }}
					<div class="row">
						<div class="form-group col-sm-3">
							<label class="control-label">✱Nombre:</label>
							<input class="form-control" type="text" name="nombre" id="nombre" required @if($edit) value="{{ $paciente->nombre }}" @endif>
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label">✱Apellido Paterno:</label>
							<input class="form-control" type="text" name="appaterno" id="appaterno" required @if($edit) value="{{ $paciente->appaterno }}" @endif>
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label">✱Apellido Materno:</label>
							<input class="form-control" type="text" name="apmaterno" id="apmaterno" required @if($edit) value="{{ $paciente->apmaterno }}" @endif>
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label">Identificador:</label>
							<input class="form-control" type="text" readonly name="identificador" id="identificador" @if($edit) value="{{ $paciente->identificador }}" @endif>
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label">Edad:</label>
							<input class="form-control" type="text" readonly id="edad" name="edad" @if($edit) value="{{ $paciente->edad }}" @endif>
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label">✱Fecha de nacimiento:</label>
							<input class="form-control" type="date" id="fecha" name="fecha_nacimiento" required min="1920-01-01" max="{{ date('Y-m-d') }}" @if($edit) value="{{ $paciente->fecha_nacimiento }}" @endif>
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label">✱Sexo:</label>
							<select class="form-control" name="sexo" id="sexo" required>
								<option value="">Seleccione uno</option>
								<option @if($edit && $paciente->sexo == 'Masculino') selected="selected" @endif>Masculino</option>
								<option @if($edit && $paciente->sexo == 'Femenino') selected="selected" @endif>Femenino</option>
								<option @if($edit  && $paciente->sexo == 'Otro') selected="selected" @endif>Otro</option>
							</select>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-4 text-center">
			  				<button type="submit" class="btn btn-success">
				  				<i class="fa fa-check-circle"></i> Guardar
				  			</button>
						</div>
						<div class="col-sm-4 text-right text-danger">
							<h5>✱Campos Requeridos</h5>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	
	$(document).ready(function() {

		$("#nombre").keyup(function() {
			var nombre=$("#nombre").val();
			var prim=nombre.substring(0,1);
			var appaterno=$("#appaterno").val();
			var seg=appaterno.substring(0,1);
			var apmaterno=$("#apmaterno").val();
			var ter=apmaterno.substring(0,1);
			var año1=$("#fecha").val();
			var id=prim+seg+ter+año1;
			var bid=id.toUpperCase(id);
			$("#identificador").val(bid);
		});

		$("#appaterno").keyup(function() {
			var nombre=$("#nombre").val();
			var prim=nombre.substring(0,1);
			var appaterno=$("#appaterno").val();
			var seg=appaterno.substring(0,1);
			var apmaterno=$("#apmaterno").val();
			var ter=apmaterno.substring(0,1);
			var año1=$("#fecha").val();
			var id=prim+seg+ter+año1;
			var bid=id.toUpperCase(id);
			$("#identificador").val(bid);
		});

		$("#apmaterno").keyup(function() {
			var nombre=$("#nombre").val();
			var prim=nombre.substring(0,1);
			var appaterno=$("#appaterno").val();
			var seg=appaterno.substring(0,1);
			var apmaterno=$("#apmaterno").val();
			var ter=apmaterno.substring(0,1);
			var año1=$("#fecha").val();
			var id=prim+seg+ter+año1;
			var bid=id.toUpperCase(id);
			$("#identificador").val(bid);
		});

		$("#fecha").change(function() {
			var fecha_nac=new Date($("#fecha").val());
			var hoy= new Date();
		    var edad=Math.floor((hoy-fecha_nac) / (365.25 * 24 * 60 * 60 * 1000));
		    $("#edad").val(edad);
		    var nombre=$("#nombre").val();
		    var prim=nombre.substring(0,1);
		    var appaterno=$("#appaterno").val();
		    var seg=appaterno.substring(0,1);
		    var apmaterno=$("#apmaterno").val();
		    var ter=apmaterno.substring(0,1);
		    var id=prim+seg+ter+$("#fecha").val();
		    var bid=id.toUpperCase(id);
		    $("#identificador").val(bid);
		});
	});

</script>

@endsection