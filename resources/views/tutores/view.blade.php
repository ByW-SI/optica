@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-3">
						<h4>Datos del Tutor:</h4>
					</div>
					<div class="col-sm-3 text-center">
						<a class="btn btn-warning" href="{{ route('tutores.edit', ['tutor' => $tutor])}}">
							<i class="fa fa-pencil"></i><strong> Editar Tutor</strong>
						</a>
					</div>
					<div class="col-sm-3 text-center">
						<a class="btn btn-success" href="{{ route('tutores.create')}}">
							<i class="fa fa-plus"></i><strong> Agregar Tutor</strong>
						</a>
					</div>
					<div class="col-sm-3 text-center">
						<a class="btn btn-primary" href="{{ route('tutores.index')}}">
							<i class="fa fa-bars"></i><strong> Lista de Tutores</strong>
						</a>
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
						<h5>Tutorados:</h5>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						@if(count($tutor->relaciones) > 0)
							<table class="table table-stripped table-hover table-bordered" style="margin-bottom: 0px;">
								<tr class="info">
									<th>Identificador</th>
									<th>Nombre</th>
									<th>Apellido Paterno</th>
									<th>Apellido Materno</th>
									<th>Relacion</th>
									<th>Acción</th>
								</tr>
								@foreach($tutor->relaciones as $relacion)
									<tr>
										<td>{{ $relacion->paciente->identificador }}</td>
										<td>{{ $relacion->paciente->nombre }}</td>
										<td>{{ $relacion->paciente->appaterno }}</td>
										<td>{{ $relacion->paciente->apmaterno }}</td>
										<td>{{ $relacion->relacion }}</td>
										<td>
											<a href="{{ route('pacientes.show', ['paciente' => $relacion->paciente->id]) }}" class="btn btn-primary btn-sm">
												<i class="fa fa-eye"></i><string> Ver</string>
											</a>
										</td>
									</tr>
								@endforeach
							</table>
						@else
							<h4>Aún no hay tutorados asignados.</h4>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection