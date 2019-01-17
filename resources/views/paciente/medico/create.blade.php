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
					<li><a href="{{ route('pacientes.crms.create', ['paciente' => $paciente]) }}">CRM:</a></li> 
				</ul>
			</div>
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h5>Historial Médico:</h5>
					</div>
				</div>
			</div>
		</div>
		<form role="form" method="POST" action="{{ route('pacientes.historialmedico.store', ['paciente' => $paciente]) }}">
			{{ csrf_field() }}
			<div class="panel-default">
				<div class="panel-body">
					<input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
					<div class="row">
						<div class="col-sm-4 text-center form-group">
							<label class="control-label">¿Alérgico/a?</label>
							<div class="row">
								<input id="chkalerg" type="checkbox" class="option-input checkbox" onchange="alergias();" name="alergia" value="SI" style="border: solid 1px #c0c0c0; border-radius: 4px; top: 0px;">
							</div>
						</div>
						<div class="col-sm-4 form-group" style="display: none;" id="alergias1" name="alergias1">
							<label class="control-label">✱Especifique:</label>
							<input class="form-control" type="text" name="cual_alergia" id="cual_alergia">
						</div>
						<div class="col-sm-4 form-group" id="alergias2" style="display: none;">
							<label class="control-label">✱Tratamiento:</label>
							<input class="form-control" type="text" name="tratamiento_alergia" id="tratamiento_alergia">
						</div>
					</div>
				</div>
				<div class="panel-heading">
					<div class="row">
						<div class="col-sm-4">
							<h5>Enfermedades:</h5>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-4 text-center form-group">
							<label class="control-label">¿Padece alguna enfermedad crónica?</label>
							<div class="row">
								<input id="cronica" type="checkbox" class="option-input checkbox" name="enfermedad" value="SI" style="border: solid 1px #c0c0c0; border-radius: 4px; top: 0px;">
							</div>
						</div>
						<div class="col-sm-8" id="enfermedades" style="display: none"> 
							<div class="row">
								<div class="col-sm-4 text-center form-group">
									<label class="control-label">Diabetes</label>
									<div class="row">
										<input type="checkbox" class="option-input checkbox" name="enfermedades[0]" value="Diabetes" style="border: solid 1px #c0c0c0; border-radius: 4px; top: 0px;">
									</div>
								</div>
								<div class="col-sm-4 text-center form-group">
									<label class="control-label">Epilepsia</label>
									<div class="row">
										<input type="checkbox" class="option-input checkbox" name="enfermedades[1]" value="Epilepsia" style="border: solid 1px #c0c0c0; border-radius: 4px; top: 0px;">
									</div>
								</div>
								<div class="col-sm-4 text-center form-group">
									<label class="control-label">Hipertensión</label>
									<div class="row">
										<input type="checkbox" class="option-input checkbox" name="enfermedades[2]" value="Hipertensión" style="border: solid 1px #c0c0c0; border-radius: 4px; top: 0px;">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4 text-center form-group">
									<label class="control-label">Migraña</label>
									<div class="row">
										<input type="checkbox" class="option-input checkbox" name="enfermedades[3]" value="Migraña" style="border: solid 1px #c0c0c0; border-radius: 4px; top: 0px;">
									</div>
								</div>
								<div class="col-sm-4 text-center form-group">
									<label class="control-label">Asma</label>
									<div class="row">
										<input type="checkbox" class="option-input checkbox" name="enfermedades[4]" value="Asma" style="border: solid 1px #c0c0c0; border-radius: 4px; top: 0px;">
									</div>
								</div>
								<div class="col-sm-4 text-center form-group">
									<label class="control-label">Otra</label>
									<div class="row">
										<input type="checkbox" class="option-input checkbox" id="otra" name="enfermedades[5]" value="Otra" style="border: solid 1px #c0c0c0; border-radius: 4px; top: 0px;">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4 form-group" id="especifique" style="display: none">
									<label class="control-label">✱Especifique:</label>
									<input class="form-control" type="text" name="enfermedad_cronica" id="enfermedad_cronica">
								</div>
								<div class="col-sm-4 text-center form-group">
									<label class="control-label">¿Tiene tratamiento?</label>
									<div class="row">
										<input id="control" class="option-input checkbox" type="checkbox" onchange="chkalerg()" name="tratamiento" style="border: solid 1px #c0c0c0; border-radius: 4px; top: 0px;">
									</div>
								</div>
								<div class="col-sm-4 form-group" id="trat" style="display: none;">
									<label class="control-label">✱Tratamiento:</label>
									<input class="form-control" type="text" id="tratamiento_actual" name="tratamiento_actual">
								</div>
							</div>
						</div>
					</div>
				</div>
				@if($paciente->sexo == 'Femenino')
					<div class="panel-heading">
						<div class="row">
							<div class="col-sm-4">
								<h5>Otro:</h5>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-4 text-center form-group">
								<label class="control-label">¿Está embarazada?</label>
								<div class="row">
									<input id="embarazo" type="checkbox" name="embarazo"class="option-input checkbox" value="SI" style="border: solid 1px #c0c0c0; border-radius: 4px; top: 0px;">
								</div>
							</div>
							<div class="col-sm-4 form-group" style="display: none" id="emb_tiempo">
								<label class="control-label">✱¿De cuánto tiempo?:</label>
								<input id="tiempo_embarazo" type="text" class="form-control" name="tiempo_embarazo">	
							</div>
						</div>
					</div>
				@endif
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
			</div>
		</form>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function() {

		$("#embarazo").change(function() {
			if($(this).prop('checked')) {
				document.getElementById('emb_tiempo').style.display = 'block';
				$('#tiempo_embarazo').prop('required', true);
			} else {
				document.getElementById('emb_tiempo').style.display = 'none';
				$('#tiempo_embarazo').prop('required', false);
			}
		});

		$("#chkalerg").change(function() {
			if($(this).prop('checked')) {
				document.getElementById('alergias1').style.display = 'block';
				document.getElementById('alergias2').style.display = 'block';
				$('#cual_alergia').prop('required', true);
			} else {
				document.getElementById('alergias1').style.display = 'none';
				document.getElementById('alergias2').style.display = 'none';
				$('#cual_alergia').prop('required', false);
			}
		});

		$("#cronica").change(function() {
			if($(this).prop('checked'))
				document.getElementById('enfermedades').style.display = 'block';
			else
				document.getElementById('enfermedades').style.display = 'none';
		});

		$("#otra").change(function() {
			if($(this).prop('checked')) {
				document.getElementById('especifique').style.display = 'block';
				$('#enfermedad_cronica').prop('required', true);
			} else {
				document.getElementById('especifique').style.display = 'none';
				$('#enfermedad_cronica').prop('required', false);
			}
		});

		$("#control").change(function() {
			if($(this).prop('checked')) {
				document.getElementById('trat').style.display = 'block';
				$('#tratamiento_actual').prop('required', true);
			} else {
				document.getElementById('trat').style.display = 'none';
				$('#tratamiento_actual').prop('required', false);
			}
		});

	});

</script>

@endsection