@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos del Paciente:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-primary" href="{{ route('pacientes.tutores.index', ['paciente' => $paciente]) }}">
							<i class="fa fa-undo"></i><strong> Volver</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="identificador">ID de Paciente:</label>
						<dd>{{ $paciente->identificador }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="appaterno">Apellido Paterno:</label>
						<dd>{{$paciente->appaterno}}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="apmaterno">Apellido Materno:</label>
						<dd>{{$paciente->apmaterno}}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="nombre">Nombre(s):</label>
						<dd>{{$paciente->nombre}}</dd>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="fecha_nacimiento">Fecha de Nacimiento:</label>
						<dd>{{$paciente->fecha_nacimiento}}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="edad">Edad:</label>
						<dd>{{$paciente->edad}}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="sexo">Sexo:</label>
						<dd>{{$paciente->sexo}}</dd>
					</div>
				</div>
			</div>
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-3">
						<h5>Datos del Tutor:</h5>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-4 form-group">
						<label class="control-label">Nombre:</label>
						<dd>{{ $tutor->nombre ? $tutor->nombre : 'N/A' }}</dd>
					</div>
					<div class="col-sm-4 form-group">
						<label class="control-label">Apellido Paterno:</label>
						<dd>{{ $tutor->appaterno ? $tutor->appaterno : 'N/A' }}</dd>
					</div>
					<div class="col-sm-4 form-group">
						<label class="control-label">Apellido Materno:</label>
						<dd>{{ $tutor->apmaterno ? $tutor->apmaterno : 'N/A' }}</dd>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group">
						<label class="control-label">Fecha de Nacimiento:</label>
						<dd>{{ $tutor->fecha_nacimiento ? $tutor->fecha_nacimiento : 'N/A' }}</dd>
					</div>
					<div class="col-sm-4 form-group">
						<label class="control-label">Edad:</label>
						<dd>{{ $tutor->edad ? $tutor->edad : 'N/A' }}</dd>
					</div>
					<div class="col-sm-4 form-group">
						<label class="control-label">Sexo:</label>
						<dd>{{ $tutor->sexo ? $tutor->sexo : 'N/A' }}</dd>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group">
						<label class="control-label">Teléfono de Casa:</label>
						<dd>{{ $tutor->tel_casa ? $tutor->tel_casa : 'N/A' }}</dd>
					</div>
					<div class="col-sm-4 form-group">
						<label class="control-label">Teléfono Celular:</label>
						<dd>{{ $tutor->tel_cel ? $tutor->tel_cel : 'N/A' }}</dd>
					</div>
				</div>
			</div>
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h5>Parentesco:</h5>
					</div>
				</div>
			</div>
			<form action="{{ route('pacientes.tutores.bind', ['paciente' => $paciente, 'tutor' => $tutor]) }}" method="post">
				{{ csrf_field() }}
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-4">
							<label class="control-label">✱Relación:</label>
							<select name="relacion" class="form-control" required="">
								<option value="" selected="">Seleccionar</option>
								<option value="Padre/Madre">Padre/Madre</option>
								<option value="Tío/a">Tío/a</option>
								<option value="Abuelo/a">Abuelo/a</option>
								<option value="Hermano/a">Hermano/a</option>
								<option value="Primo/a">Primo/a</option>
								<option value="Esposo/a">Esposo/a</option>
								<option value="Nieto/a">Nieto/a</option>
								<option value="Sobrino/a">Sobrino/a</option>
								<option value="Nuero/a">Nuero/a</option>
								<option value="Cuñado/a">Cuñado/a</option>
								<option value="Otro">Otro</option>
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

@endsection