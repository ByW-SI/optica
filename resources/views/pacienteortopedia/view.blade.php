@extends('layouts.test')
@section('content1')

<div class="container">
	<div role="application" class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-3">
						<h4>Datos del Paciente:</h4>
					</div>
					<div class="col-sm-3 text-center">
						<a class="btn btn-success" href="{{ route('pacientes.create') }}"><strong>Nuevo Paciente</strong></a>
					</div>
					<div class="col-sm-3 text-center">
						<a class="btn btn-warning" href="{{ route('pacientes.edit',['id'=>$paciente->id]) }}"><strong>Editar Paciente</strong></a>
					</div>
					<div class="col-sm-3 text-center">
						<a class="btn btn-info" href="{{ route('pacientes.index') }}"><strong>Lista de Pacientes</strong></a>
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
			<!-- PESTAÑAS -->
			<div class="panel-body" style="padding: 0">
				<ul class="nav nav-pills nav-justified">
					<li role="presentation"><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}#generales'"  class="ui-tabs-anchor">Generales:</a></li>
					<li role="presentation" ><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}#hmedico" class="ui-tabs-anchor">Historial Médico:</a></li>
					<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">Historial Ocular:</a></li>
					<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">Anteojos:</a></li>
					<li role="presentation" class="active"><a href="" class="ui-tabs-anchor">Ortopédico:</a></li>
					<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">Citas:</a></li>
					<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">C.R.M:</a></li> 
				</ul>
			</div>
		</div>
		<div class="panel-default">
			<div class="panel-heading">
				<h4>Ortopédico:</h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-4 form-group">
						<label for="fecha" class="control-label">Fecha:</label>
						<input type="date" class="form-control" readonly="" name="fecha" id="fecha" value="{{ $cita->fecha }}">
					</div>
				</div>
				<div class="row">
					<div id="si-cita"<?php echo $cita->clinica == null ? ' style="display: block"' : ' style="display: none"' ?>>
						<div class="col-sm-4 text-center">
							<label for="pie" class="control-label">Foto del pie</label>
							@php($src = url('/storage/' . $cita->path_image))
							<div class="row form-group">
								<img id="imagenpie" src="{{ $src }}" alt="Previa..." style="width: 250px; height: auto;">
					      	</div>
						</div>
						<div class="col-sm-8">
							<div class="form-group">
								<div class="row">
									<div class="col-sm-12">
										<label for="diag" class="control-label">Diagnóstico:</label>
										<textarea class="form-control" name="diagnostico" maxlength="1000" rows="4" readonly="">{{ 
											$cita->diagnostico }}</textarea>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<label for="reco" class="control-label">Recomendación:</label>
										<textarea class="form-control" maxlength="1000" name="recomendacion" rows="4" readonly="">{{ $cita->recomendacion }}</textarea>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<label for="trat" class="control-label">Tipo de tratamiento:</label>
										<textarea class="form-control" maxlength="1000" name="tipo_tratamiento" rows="4" readonly="">{{ $cita->tratamiento }}</textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="no-cita"<?php echo $cita->clinica != null ? ' style="display: block"' : ' style="display: none"' ?>>
						<div class="col-sm-4 form-group text-center">
							<label for="pie2" class="control-label" style=";">Foto de la receta</label>
							<div class="row form-group">
								@php($src = url('/storage/' . $cita->path_image))
								<img id="imagenpre" src="{{ $src }}" alt="Previa..." style="width: 250px; height: auto;">
							</div>
						</div>
						<div class="col-sm-4 form-group">
							<label for="donde" class="control-label">¿De dónde viene?</label>
							<input type="text" name="clinica" class="form-control" id="donde" readonly="" value="{{ $cita->clinica }}">
						</div>
					</div>
				</div>
				<div class="row" id="tratamiento">
					<div class="col-sm-4 form-group">
						<label class="control-label">Tipo de Tratamiento:</label>
						<dd>{{ $cita->tipo }}</dd>
    					<label class="control-label">Número:</label>
						<input type="number" class="form-control" step="0.5" name="medida" readonly="" value="{{ $paciente->ortopedias->last()->medida }}">
					</div>
					<div class="col-sm-4 col-sm-offset-4 form-group">
						<label class="control-label">Plantillas:</label>
						<dd>{{ $cita->plantilla }}</dd>
    					<label class="control-label">Número:</label>
						<input type="number" class="form-control" step="0.5" name="medida_plant" readonly="" value="{{ $paciente->ortopedias->last()->medida_plant }}">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
		
	function previewFile(input){
		if(input.files && input.files[0]){
			var filered = new FileReader();
			filered.onload = function(e){
				$('#imagenpre').attr('src', e.target.result);
			}
			filered.readAsDataURL(input.files[0]);
		}
	}

	function previewFile2(input){
		if(input.files && input.files[0]){
			var filered = new FileReader();
			filered.onload = function(e){
				$('#imagenpie').attr('src', e.target.result);
			}
			filered.readAsDataURL(input.files[0]);
		}
	}

	function cocultar(e){
		if(e.value == "si") {
			$("#no-cita").hide();
            $("#si-cita").show();
            $("#tratamiento").show();
		} else if(e.value == "no") {
			$("#si-cita").hide();
			$("#no-cita").show();
            $("#tratamiento").show();
		}
	}
	
</script>

@endsection