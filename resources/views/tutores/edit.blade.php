@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos del Tutor:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-success" href="{{ route('tutores.create')}}">
							<i class="fa fa-plus"></i><strong> Agregar Tutor</strong>
						</a>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-primary" href="{{ route('tutores.index')}}">
							<i class="fa fa-bars"></i><strong> Lista de Tutores</strong>
						</a>
					</div>
				</div>
			</div>
			<form method="post" action="{{ route('tutores.update', ['tutor' => $tutor]) }}">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="PUT">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-4 form-group">
							<label class="control-label">✱Nombre:</label>
							<input type="text" name="nombre" class="form-control" required="" value="{{ $tutor->nombre }}">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">✱Apellido Paterno:</label>
							<input type="text" name="appaterno" class="form-control" required="" value="{{ $tutor->appaterno }}">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Apellido Materno:</label>
							<input type="text" name="apmaterno" class="form-control" value="{{ $tutor->apmaterno }}">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 form-group">
							<label class="control-label">Fecha de Nacimiento:</label>
							<input type="date" name="fecha_nacimiento" id="fecha" class="form-control" value="{{ $tutor->fecha_nacimiento }}">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Edad:</label>
							<input type="number" name="edad" id="edad" class="form-control" readonly="" value="{{ $tutor->edad }}">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Sexo:</label>
							<select name="sexo" class="form-control">
								<option value="">Seleccionar</option>
								<option value="Masculino" {{ $tutor->sexo == "Masculino" ? 'selected=""' : '' }}>Masculino</option>
								<option value="Femenino" {{ $tutor->sexo == "Femenino" ? 'selected=""' : '' }}>Femenino</option>
								<option value="Otro" {{ $tutor->sexo == "Otro" ? 'selected=""' : '' }}>Otro</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 form-group">
							<label class="control-label">Teléfono de Casa:</label>
							<input type="number" name="tel_casa" class="form-control" value="{{ $tutor->tel_casa }}">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Teléfono Celular:</label>
							<input type="number" name="tel_cel" class="form-control" value="{{ $tutor->tel_cel }}">
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-4 text-center">
			  				<button type="submit" class="btn btn-success">
				  				<i class="fa fa-check-circle"></i><strong> Guardar</strong>
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
	
	function calculateAge(birthday) {
	   	var ageDifMs = Date.now() - new Date(birthday).getTime();
	   	var ageDate = new Date(ageDifMs);
	   	var res = Math.abs(ageDate.getFullYear() - 1970);
	   	if(res <= 90)
	   		return res;
 	}

    $(document).ready(function() {

    	$('#fecha').change(function() {
    		var val = document.getElementById('fecha').value;
    		var edad = calculateAge(val);
    		$('#edad').val(edad);
    	});

    });

</script>

@endsection