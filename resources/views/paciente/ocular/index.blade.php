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
						<a class="btn btn-success" href="{{ route('pacientes.create') }}">
							<i class="fa fa-plus"></i><strong> Nuevo Paciente</strong>
						</a>
					</div>
					<div class="col-sm-3 text-center">
						<a class="btn btn-warning" href="{{ route('pacientes.edit', ['paciente' => $paciente]) }}">
							<i class="fa fa-pencil"></i><strong> Editar Paciente</strong>
						</a>
					</div>
					<div class="col-sm-3 text-center">
						<a class="btn btn-primary" href="{{ route('pacientes.index') }}">
							<i class="fa fa-bars"></i><strong> Lista de Pacientes</strong>
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
					<li><a href="{{ route('pacientes.historialmedico.index', ['paciente' => $paciente]) }}">Historial Médico:</a></li>
					<li class="active"><a href="{{ route('pacientes.historialocular.index', ['paciente' => $paciente]) }}">Historial Ocular:</a></li>
					<li><a href="{{ route('pacientes.anteojos.index', ['paciente' => $paciente]) }}">Anteojos:</a></li>
					<li><a href="{{ route('pacientes.ortopedias.index', ['paciente' => $paciente]) }}">Ortopédico:</a></li>
					<li><a href="{{ route('pacientes.citas.index', ['paciente' => $paciente]) }}">Citas:</a></li>
					<li><a href="{{ route('pacientes.crms.create', ['paciente' => $paciente]) }}">CRM:</a></li>
				</ul>
			</div>
		</div>
		<div class="panel-default">
		    <div class="panel-heading">
		        <div class="row">
		            <div class="col-sm-4">
		                <h5>Historial Ocular:</h5>
		            </div>
		            <div class="col-sm-4 text-center">
		                <a class="btn btn-success" href="{{ route('pacientes.historialocular.create', ['paciente' => $paciente]) }}">
		                    <i class="fa fa-plus"></i><strong> Agregar</strong>
		                </a>
		            </div>
		        </div>
		    </div>
		    <div class="panel-body">
		        @if(count($paciente->oculares) > 0)
					@include('paciente.datos.tablas.ocular')
		        @else
		            <div class="row">
		                <div class="col-sm-12">
		                    <h4>No hay historial ocular disponible.</h4>
		                </div>
		            </div>
		        @endif
		    </div>
		</div>  
	</div>
</div>

@foreach($paciente->oculares as $ocular)
	@include('paciente.modals.sub.ocular1')
	@include('paciente.modals.sub.ocular2')
	@include('paciente.modals.sub.ocular3')
	@include('paciente.modals.sub.ocular4')
	@include('paciente.modals.sub.ocular5')
@endforeach

@endsection