@extends('layouts.blank')
@section('content')

<div class="container">
  	<div class="panel panel-group">
  		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-3">
						<h4>Datos del Paciente:</h4>
					</div>
					<div class="col-sm-3 text-center">
						<a class="btn btn-success" href="{{ route('pacientes.create') }}"><i class="fa fa-plus"></i><strong> Nuevo Paciente</strong></a>
					</div>
					<div class="col-sm-3 text-center">
						<a class="btn btn-warning" href="{{ route('pacientes.edit', ['paciente' => $paciente]) }}"><i class="fa fa-pencil"></i><strong> Editar Paciente</strong></a>
					</div>
					<div class="col-sm-3 text-center">
						<a class="btn btn-primary" href="{{ route('pacientes.index') }}"><i class="fa fa-bars"></i><strong> Lista de Pacientes</strong></a>
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
						<dd>{{ $paciente->appaterno }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="apmaterno">Apellido Materno:</label>
						<dd>{{ $paciente->apmaterno }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="nombre">Nombre(s):</label>
						<dd>{{ $paciente->nombre }}</dd>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="fecha_nacimiento">Fecha de Nacimiento:</label>
						<dd>{{ $paciente->fecha_nacimiento }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="edad">Edad:</label>
						<dd>{{ $paciente->edad }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="sexo">Sexo:</label>
						<dd>{{ $paciente->sexo }}</dd>
					</div>
				</div>
			</div>
			<div class="panel-body" style="padding: 0">
				<ul class="nav nav-tabs">
					<li><a href="{{ route('pacientes.show', ['paciente' => $paciente]) }}">Generales:</a></li>
					<li class="active"><a href="{{ route('pacientes.historialmedico.index', ['paciente' => $paciente]) }}">Historial Médico:</a></li>
					<li><a href="{{ route('pacientes.historialocular.index', ['paciente' => $paciente]) }}">Historial Ocular:</a></li>
					<li><a href="{{ route('pacientes.anteojos.index', ['paciente' => $paciente]) }}">Anteojos:</a></li>
					<li><a href="{{ route('pacientes.ortopedias.index', ['paciente' => $paciente]) }}">Ortopédico:</a></li>
					<li><a href="{{ route('pacientes.citas.index', ['paciente' => $paciente]) }}">Citas:</a></li>
					<li><a href="{{ route('pacientes.crm.index', ['paciente' => $paciente]) }}">C.R.M:</a></li> 
				</ul>
			</div>
		</div>
		<div class="panel-default">
		    <div class="panel-heading">
		        <div class="row">
		            <div class="col-sm-4">
		                <h5>Historial Médico:</h5>
		            </div>
		            <div class="col-sm-4 text-center">
		                <a class="btn btn-success" href="{{ route('pacientes.historialmedico.create', ['paciente' => $paciente]) }}">
		                    <i class="fa fa-plus"></i><strong> Agregar</strong>
		                </a>
		            </div>
		        </div>
		    </div>
		    <div class="panel-body">
		        @if(count($paciente->medico) > 0)
			        <table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px">
						<tr class="info">
							<th>Fecha de la Cita</th>
							<th>Alergias</th>
							<th>Enfermedades Crónicas</th>
							<th>Tratamiento</th>
							@if($paciente->sexo == 'Femenino')
								<th>Embarazo</th>
							@endif
						</tr>
						@foreach($paciente->medico as $medico)
							<tr class="oc" data-toggle="modal" data-target="#medico_modal{{ $medico->id }}">
								<td>{{ $medico->created_at }}</td>
								<td>{{ $medico->alergia }}</td>
								<td>{{ $medico->enfermedad }}</td>
								<td>{{ $medico->tratamiento }}</td>
								@if($paciente->sexo == 'Femenino')
									<td>{{ $medico->embarazo }}</td>
								@endif
							</tr>
						@endforeach
					</table>
		        @else
		            <div class="row">
		                <div class="col-sm-12">
		                    <h4>Aún no se ha agregado el historial médico.</h4>
		                </div>
		            </div>
		        @endif
		    </div>
		</div>
	</div>
</div>

@foreach($paciente->medico as $medico)
	<div class="modal fade"  id="medico_modal{{ $medico->id }}" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">
						<strong>Datos Médicos</strong>
					</h5>
				</div>
				<div class="modal-body">
					<div class="panel-default">
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-3 form-group">
									<label class="control-label">Alergias:</label>
									<dd>{{ $medico->alergia == 'SI' ? $medico->cual_alergia : 'N/A' }}</dd>
								</div>
								@if($medico->alergia == 'SI')
									<div class="col-sm-3 form-group">
										<label class="control-label">Tratamiento:</label>
										<dd>{{ $medico->tratamiento_alergia }}</dd>
									</div>
								@endif
							</div>
							@if($paciente->sexo == 'Femenino' && $medico->embarazo == 'SI')
								<div class="row">
									<div class="col-sm-3 form-group">
										<label class="control-label" for="apmaterno">Tiempo de embarazo:</label>
										<dd>{{ $medico->tiempo_embarazo }}</dd>
									</div>
								</div>
							@endif
							<div class="row">
								<div class="col-sm-6">
									<label class="control-label" for="apmaterno">Enfermedades Crónicas:</label>
									<dd>{{ $medico->enfermedad == 'SI' ? $medico->enfermedades_array : 'N/A' }}</dd>
								</div>
								@if($medico->tratamiento=='SI')
									<div class="col-sm-6">
										<label class="control-label" for="apmaterno">Tratamiento Enfermedad Crónica:</label>
										<dd>{{ $medico->tratamiento_actual }}</dd>
									</div>
								@endif
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><strong>Cerrar</strong></button>
				</div>
			</div>
		</div>
	</div>
@endforeach

@endsection