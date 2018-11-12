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
			<form method="post" action="{{ route('tutores.store') }}">
				{{ csrf_field() }}
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-4 form-group">
							<label class="control-label">✱Nombre:</label>
							<input type="text" name="nombre" class="form-control" required="">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">✱Apellido Paterno:</label>
							<input type="text" name="appaterno" class="form-control" required="">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Apellido Materno:</label>
							<input type="text" name="apmaterno" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 form-group">
							<label class="control-label">Fecha de Nacimiento:</label>
							<input type="date" name="fecha_nacimiento" class="form-control">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Edad:</label>
							<input type="number" name="edad" class="form-control">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Sexo:</label>
							<select name="sexo" class="form-control">
								<option value="" selected="">Seleccionar</option>
								<option value="Masculino">Masculino</option>
								<option value="Femenino">Femenino</option>
								<option value="Otro">Otro</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 form-group">
							<label class="control-label">✱Parentesco:</label>
							<select name="parentesco" class="form-control" required="">
								<option value="" selected="">Seleccionar</option>
								<option value="Padre">Padre</option>
								<option value="Madre">Madre</option>
								<option value="Otro">Otro</option>
							</select>
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Teléfono de Casa:</label>
							<input type="number" name="tel_casa" class="form-control">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">Teléfono Celular:</label>
							<input type="number" name="tel_cel" class="form-control">
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

@endsection