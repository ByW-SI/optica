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
						<a class="btn btn-success" href="{{ route('pacientes.create') }}">
							<i class="fa fa-plus"></i><strong> Agregar Paciente</strong>
						</a>
					</div>
					<div class="col-sm-4 text-center">
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
						<dd><strong>{{$paciente->identificador}}</strong></dd>
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
						<label class="control-label" for="edad">Edad:</label>
						<dd>{{$paciente->edad}}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="fecha_nacimiento">Fecha de Nacimiento:</label>
						<dd>{{$paciente->fecha_nacimiento}}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="sexo">Sexo:</label>
						<dd>{{$paciente->sexo}}</dd>
					</div>
				</div>
			</div>
			<div class="panel-body" style="padding: 0">
				<ul class="nav nav-pills nav-justified">
					<li  role="presentation" class="active"><a data-toggle="tab" href="#generales" >Generales:</a></li>
					<li role="presentation"><a data-toggle="tab" href="#hmedico">Historial Médico:</a></li>
					<li role="presentation"><a data-toggle="tab" href="#ocular">Historial Ocular:</a></li>
					<li role="presentation"><a data-toggle="tab" href="#anteojos">Anteojos:</a></li>
					<li role="presentation"><a data-toggle="tab" href="#ortopedico" class="ui-tabs-anchor">Ortopédico:</a></li>
					<li role="presentation"><a data-toggle="tab" href="#cita" class="ui-tabs-anchor">Citas:</a></li>
					<li role="presentation"><a data-toggle="tab" href="#crm" class="ui-tabs-anchor">C.R.M:</a></li> 
				</ul>
			</div>
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h5>Historial Médico:</h5>
					</div>
				</div>
			</div>
			<div class="panel-body">
		@if($edit)
			<form role="form" method="POST" action="{{ route('pacientes.historialmedico.update',['paciente'=>$paciente,'datosgenerale'=>$paciente->generales]) }}">
				<input type="hidden" name="_method" value="PUT">
		@else
			<form role="form" method="POST" action="{{ route('pacientes.historialmedico.store',['paciente'=>$paciente]) }}">
		@endif
				{{ csrf_field() }}
					<div class="form-group col-sm-6">
							<label class="control-label">¿Alérgico/a?</label>
							<div class="row">
								<input id="chkalerg" type="checkbox" class="option-input" onchange="alergias();" name="alergia">
							</div>
					</div>

								<div class="form-group col-sm-3" style="display: none;" id="alergias1" name="alergias1">
							<label class="control-label"><i class="fa fa-asterisk" aria-hidden="true"></i>¿Cuál?:</label>
							<input class="form-control" type="text" name="cual_alergia" id="cual_alergia">
								</div>
								<div class="form-group col-sm-3"  id="alergias2" style="display: none;">
							<label class="control-label">¿Tiene algún Tratamiento?</label>
							<input class="form-control" type="text" name="tratamiento_alergia" id="tratamiento_alergia">
								</div>
									</div>

									<div class="panel-heading"><h4>Enfermedades</h4></div>
									<div class="panel-body">

						<div class="form-group col-xs-6">
							<div class="boton checkbox-disabled">
															<label><input id="cronica" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios" name="enfermedad">¿Padece alguna Enfermedad Crónica? .</label>
													</div>
											</div></div>

											<div class="jumbotron"  id="enfermedades" style="display: none"> 

															<div class="row">
																<div class="col-sm-3">
																	<label class="col-xs-4 label-text">
																	<input type="checkbox" class="squaredTwo"
																	 name="enfermedades[0]" value="Diabetes">Diabetes</label>
																</div>
																
																<div class="col-sm-3">
																	<label class="col-xs-4 label-text">
																	<input type="checkbox" class="squaredTwo"
																	name="enfermedades[1]" value="Epilepsia">Epilepsia</label>
																</div>

																<div class="col-sm-3" id="especifique" style="display: none">
																	<label class="control-label">Especifique:</label>
														<input class="form-control" type="text" name="enfermedad_cronica" id="enfermedad_cronica">
																</div>

																<div class="col-sm-3">
																	<div class="boton checkbox-disabled">
															<label>
																 ¿Tiene Tratamiento/Control?
															</label>
																	<input id="control" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios" onchange="chkalerg()" name="tratamiento">
																 
																		 </div>
																</div>
															</div>

															<div class="row">
																<div class="col-sm-3">
																	<label class="col-xs-4 label-text">
																	<input type="checkbox" class="squaredTwo"
																	name="enfermedades[2]" value="Hipertensión">Hipertensión</label>
																</div>
																
																<div class="col-sm-3">
																	<label class="col-xs-4 label-text">
																	<input type="checkbox" class="squaredTwo"
																	name="enfermedades[3]" value="Migraña">Migraña</label>
																</div>

															</div>

															<div class="row">
																<div class="col-sm-3">
																	<label class="col-xs-4 label-text">
																	<input type="checkbox" class="squaredTwo"
																	name="enfermedades[4]" value="Asma">Asma</label>
																</div>
																
																<div class="col-sm-3">
																	<label class="col-xs-4 label-text">
																	<input type="checkbox" class="squaredTwo" id="otra"
																	name="enfermedades[5]" value="Otra">Otra</label>
																</div>

																<div class="col-sm-3" id="trat" style="display: none;">
																	<label class="control-label">Tratamiento Actual:</label>
				<input class="form-control" type="text" id="tratamiento_actual" name="tratamiento_actual">
																</div>
															</div>
						</div>


						<div class="form-group col-xs-6">
										@if($paciente->sexo=='Femenino')
														<div class="col-sm-5">
											<label>
												<input id="embarazo" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios"  name="embarazo">
																	¿Embarazo?.
																	 </label>	
																	</div>
																	@endif
																	<div class="col-sm-5" style="display: none" id="emb_tiempo">
										 <label class="control-label">¿Cuánto Tiempo?:</label>
																	 <input id="tiempo_embarazo" type="text" class="form-control" name="tiempo_embarazo">	
																	</div>
																	
																		<div class="col-xs-4 col-xs-offset-10">
						<input type="hidden" name="paciente_id" value="{{$paciente->id}}">
											<button id="submit" type="submit" class="btn btn-success">
										<strong>Agregar</strong>	</button>

											
											

									</div>
															
												
										</div>
									
									
								</div>
							</form>
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