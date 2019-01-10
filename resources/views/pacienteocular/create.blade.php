@extends('layouts.blank')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{ asset('js/ocular.js') }}"></script>

<div class="container">
	<div class="panel panel-group">
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
						<a class="btn btn-warning" href="{{ route('pacientes.edit', ['id' => $paciente->id]) }}"><strong>Editar Paciente</strong></a>
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
					<li><a href="{{ route('pacientes.crm.index', ['paciente' => $paciente]) }}">CRM:</a></li> 
				</ul>
			</div>
		</div>
		<div id="ocular">
			<form role="form" method="POST" action="{{ route('pacientes.historialocular.store',['paciente'=>$paciente]) }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
				<div class="panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-sm-4">
								<h5>Historial Ocular:</h5>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="form-group col-sm-6 text-center">
								<label class="control-label">¿Cirugías oculares?</label>
								<div class="boton">
									<label>
										<input type="hidden" name="cirugias" value="NO">	 	
										<input id="cirugias" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No"  name="cirugias" value="SI" class="toggle btn btn-primary">
									</label>
								</div>
							</div>
							<div class="form-group col-sm-6 text-center">
								<label class="control-label">¿Padecimientos oculares?</label>
								<div class="boton">
									<label>
										<input type="hidden" name="padecimientos" value="NO">
										<input id="padecimientos" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No"  name="padecimientos" value="SI" class="toggle btn btn-primary">
									</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div id="cirug" style="display: none; background: #f5f5f5; padding: 15px;">
									<div class="row">
										<div class="form-group col-sm-6">
											<label class="control-label">¿Cuál?</label>
											<input class="form-control" type="text" name="cirug_1" id="cirug_1">
										</div>
										<div class="form-group col-sm-6">
											<label class="control-label">¿Hace cuánto?</label>
											<input class="form-control" type="text" name="cirug_2" id="cirug_2">
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<label class="control-label">¿Tiene tratamiento?</label>
											<textarea class="form-control" name="cirug_3" id="cirug_3"></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div id="padec" style="display: none; background: #f5f5f5; padding: 15px;">
									<div class="row">
										<div class="form-group col-sm-4 text-center">
											<label class="control-label">Catarata</label>
											<div class="row">
												<div class="col-sm-12">
													<input type="checkbox" class="squaredTwo" name="padecimientos_array[0]" value="Catarata">
												</div>
											</div>
										</div>
										<div class="form-group col-sm-4 text-center">
											<label class="control-label">Glaucoma</label>
											<div class="row">
												<div class="col-sm-12">
													<input type="checkbox" class="squaredTwo" name="padecimientos_array[1]" value="Glaucoma">
												</div>
											</div>
										</div>
										<div class="form-group col-sm-4 text-center">
											<label class="control-label">Ret. Diabética</label>
											<div class="row">
												<div class="col-sm-12">
													<input type="checkbox" class="squaredTwo" name="padecimientos_array[2]" value="Retinopatía Diabética">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-4 text-center">
											<label class="control-label">Ret. Hipertensiva</label>
											<div class="row">
												<div class="col-sm-12">
													<input type="checkbox" class="squaredTwo" name="padecimientos_array[3]" value="Retinopatía Hipertensiva">
												</div>
											</div>
										</div>
										<div class="form-group col-sm-4 text-center">
											<label class="control-label">Queratocono</label>
											<div class="row">
												<div class="col-sm-12">
													<input type="checkbox" class="squaredTwo" name="padecimientos_array[4]" value="Queratocono">
												</div>
											</div>
										</div>
										<div class="form-group col-sm-4 text-center">
											<label class="control-label">Otra</label>
											<div class="row">
												<div class="col-sm-12">
													<input type="checkbox" class="squaredTwo" name="padecimientos_array[5]" id="padec_otra" value="Otra">
												</div>
											</div>
										</div>
									</div>
									<div class="row" id="padec_text" style="display: none;">
										<div class="form-group col-sm-12">
											<label class="control-label">Especifíque:</label>
											<textarea class="form-control" name="padec_text" id="padec_textc"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel-heading">
						<div class="row">
							<div class="col-sm-4">
								<h5>Antecedentes:</h5>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12 text-center">
								<label class="control-label">Problema Visual</label>
							</div>
						</div>
						<div class="row text-center">
							<div class="form-group col-sm-4">
								<span class="badge badge-secondary">LEJOS</span>
								<div class="row">
									<input type="radio" class="option-input radio" name="problema_visual" value="LEJOS" required style="top: 0px;">
								</div>
							</div>
							<div class="form-group col-sm-4">
								<span class="badge badge-secondary">CERCA</span>
								<div class="row">
									<input type="radio" class="option-input radio" name="problema_visual" value="CERCA" style="top: 0px;">
								</div>
							</div>
							<div class="form-group col-sm-4">
								<span class="badge badge-secondary">AMBAS</span>
								<div class="row">
									<input type="radio" class="option-input radio" name="problema_visual" value="AMBAS" style="top: 0px;">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 text-center">
								<label class="control-label">Usuario de Lentes</label>
							</div>
						</div>
						<div class="row text-center">
							<div class="form-group col-sm-4">
								<span class="badge badge-secondary">Sí</span>
								<div class="row">
									<input type="radio" class="option-input radio" name="usuario_lentes" id="usuario_lentes1" value="SI" required style="top: 0px;">
								</div>
							</div>
							<div class="form-group col-sm-4">
								<span class="badge badge-secondary">No</span>
								<div class="row">
									<input type="radio" class="option-input radio" name="usuario_lentes" id="usuario_lentes2" value="NO" style="top: 0px;">
								</div>
							</div>
							<div class="form-group col-sm-4">
								<span class="badge badge-secondary">Ocasionalmente</span>
								<div class="row">
									<input type="radio" class="option-input radio" name="usuario_lentes" id="usuario_lentes3" value="OCASIONALMENTE" style="top: 0px;">
								</div>
							</div>
						</div>
						<div class="row" id="edad_lentes" style="display: none;">
							<div class="col-sm-4 col-sm-offset-4 text-center form-group">
								<label class="control-label">¿A qué edad empezó a usar lentes?</label>
								<select class="form-control" name="edad_lentes" id="edad_lentes_select">
									<option value="">Seleccionar</option>
									@for($i = 1; $i < 71; $i++)
										<option value="{{ $i }}">{{ $i }} años</option>
									@endfor
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 text-center">
								<label class="control-label">¿Molestias por luz solar?</label>
							</div>
						</div>
						<div class="row text-center">
							<div class="form-group col-sm-4">
								<span class="badge badge-secondary">Sí</span>
								<div class="row">
									<input type="radio" class="option-input radio" name="molestia_luz" value="SI" required style="top: 0px;">
								</div>
							</div>
							<div class="form-group col-sm-4">
								<span class="badge badge-secondary">No</span>
								<div class="row">
									<input type="radio" class="option-input radio" name="molestia_luz" value="NO" style="top: 0px;">
								</div>
							</div>
							<div class="form-group col-sm-4">
								<span class="badge badge-secondary">Regular</span>
								<div class="row">
									<input type="radio" class="option-input radio" name="molestia_luz" value="REGULAR" style="top: 0px;">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 text-center">
								<label class="control-label">¿Es usuario de computadora?</label>
							</div>
						</div>
						<div class="row text-center">
							<div class="col-sm-6">
								<span class="badge badge-secondary">SI</span>
								<div class="row">
									<input type="radio" class="option-input radio" name="usuario_computadora" value="SI" required style="top: 0px;">
								</div>
							</div>
							<div class="col-sm-6">
								<span class="badge badge-secondary">NO</span>
								<div class="row">
									<input type="radio" class="option-input radio"  name="usuario_computadora" value="NO" style="top: 0px;">
								</div>
							</div>
						</div>
					</div>
					<div class="panel-heading">
						<div class="row">
							<div class="col-sm-4">
								<h5>Antecedentes Familiares:</h5>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="row text-center">
							<div class="form-group col-sm-4">
								<label class="control-label">Usuarios de lentes</label>
								<div class="row">
									<div class="col-sm-12">
										<input type="checkbox" class="squaredTwo" name="antecedentes_array[0]" value="Usuarios de Lentes">
									</div>
								</div>
							</div>
							<div class="form-group col-sm-4">
								<label class="control-label">Cataratas</label>
								<div class="row">
									<div class="col-sm-12">
										<input type="checkbox" class="squaredTwo" name="antecedentes_array[1]" value="Catarata">
									</div>
								</div>
							</div>
							<div class="form-group col-sm-4">
								<label class="control-label">Glaucoma</label>
								<div class="row">
									<div class="col-sm-12">
										<input type="checkbox" class="squaredTwo" name="antecedentes_array[2]" value="Glaucoma">
									</div>
								</div>
							</div>
						</div>
						<div class="row text-center">
							<div class="form-group col-sm-4">
								<label class="control-label">Estrabismo</label>
								<div class="row">
									<div class="col-sm-12">
										<input type="checkbox" class="squaredTwo" name="antecedentes_array[3]" value="Estrabismo">
									</div>
								</div>
							</div>
							<div class="form-group col-sm-4">
								<label class="control-label">Otra</label>
								<div class="row">
									<div class="col-sm-12">
										<input type="checkbox" class="squaredTwo" name="antecedentes_array[4]" id="ante_otra" value="Otra">
									</div>
								</div>
							</div>
							<div class="form-group col-sm-4" id="ante_text" style="display: none">
								<label class="control-label">Especifíque:</label>
								<input class="form-control" type="text" name="antecedente_text" id="antecedente_text">
							</div>
						</div>
					</div>
					<div class="panel-heading">
						<div class="row">
							<div class="col-sm-4">
								<h5>Revisión Visual:</h5>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="form-group col-sm-4">
								<label class="control-label">A.V. sin Rx. de Lejos (Snellen)</label>
							</div>
							<div class="form-group col-sm-4">
								<span class="badge badge-secondary">Ojo derecho</span>
								<select class="form-control" name="snellen_1">
									<option value="20/400">20/400</option>
									<option value="20/300">20/300</option>
									<option value="20/200">20/200</option>
									<option value="20/150">20/150</option>
									<option value="20/120">20/120</option>
									<option value="20/100">20/100</option>
									<option value="20/70">20/70</option>
									<option value="20/60">20/60</option>
									<option value="20/50">20/50</option>
									<option value="20/40">20/40</option>
									<option value="20/30">20/30</option>
									<option value="20/25">20/25</option>
									<option value="20/20">20/20</option>
									<option value="20/15">20/15</option>
									<option value="20/10">20/10</option>
									<option value="S.P.L">S.P.L</option>
									<option value="N.P.L">N.P.L</option>
									<option value="Protésis">Prótesis</option>
								</select>
							</div>
							<div class="form-group col-sm-4">
								<span class="badge badge-secondary">Ojo izquierdo</span>
								<select class="form-control" name="snellen_2">
									<option value="20/400">20/400</option>
									<option value="20/300">20/300</option>
									<option value="20/200">20/200</option>
									<option value="20/150">20/150</option>
									<option value="20/120">20/120</option>
									<option value="20/100">20/100</option>
									<option value="20/70">20/70</option>
									<option value="20/60">20/60</option>
									<option value="20/50">20/50</option>
									<option value="20/40">20/40</option>
									<option value="20/30">20/30</option>
									<option value="20/25">20/25</option>
									<option value="20/20">20/20</option>
									<option value="20/15">20/15</option>
									<option value="20/10">20/10</option>
									<option value="S.P.L">S.P.L</option>
									<option value="N.P.L">N.P.L</option>
									<option value="Protésis">Prótesis</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3" align="left">
								<strong><h4>Pantalleo</h4></strong>	
							</div>
							<div class="col-xs-8">
								<div class="row">
									<div class="col-sm-4">
										<label class="col-xs-8 label-text ">Unilateral</label>
									</div>
									<div class="col-sm-4">
										<span class="badge badge-secondary">Lejos</span>
										<select class="form-control" name="unilateral_lejos">
											<option value='ORTO'>ORTO</option>
											<option value='ENDO'>ENDO</option>
											<option value='EXO'>EXO</option>
											<option value='HIPER'>HIPER</option>
											<option value='HIPO'>HIPO</option>
										</select>
									</div>
									<div class="col-sm-4">
										<span class="badge badge-secondary">Cerca</span>
										<select class="form-control" name="unilateral_cerca">
											<option value='ORTO'>ORTO</option>
											<option value='ENDO'>ENDO</option>
											<option value='EXO'>EXO</option>
											<option value='HIPER'>HIPER</option>
											<option value='HIPO'>HIPO</option>
										</select>
									</div>
								</div><br><br>
								<div class="row">
									<div class="col-sm-4">
										<label class="col-xs-8 label-text ">Alternante</label>
									</div>
									<div class="col-sm-4">
										<span class="badge badge-secondary">Lejos</span>
										<select class="form-control" name="alternamente_lejos">
											<option value='ORTO'>ORTO</option>
											<option value='ENDO'>ENDO</option>
											<option value='EXO'>EXO</option>
											<option value='HIPER'>HIPER</option>
											<option value='HIPO'>HIPO</option>
										</select>
									</div>
									<div class="col-sm-4">
										<span class="badge badge-secondary">Cerca</span>
										<select class="form-control" name="alternamente_cerca">
											<option value='ORTO'>ORTO</option>
											<option value='ENDO'>ENDO</option>
											<option value='EXO'>EXO</option>
											<option value='HIPER'>HIPER</option>
											<option value='HIPO'>HIPO</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="row" style="background-color: lightgray; padding: 15px;">
							<div class="col-sm-3" align="left">
								<strong><h4>Queratometría</h4></strong>	
							</div>
							<div class=" col-xs-8" align="left">

								<div class="row">
									<div class="col-sm-3">
										<label class="control-label"><h4><strong>O.D.</strong></h4></label>
									</div>
									<div class="col-sm-3">
										<span class="badge badge-secondary">Plana</span>
										<select class="form-control" name="queratometria_od_plana">
											<?php for( $i=32;$i<=55;$i+=0.25){
												echo"<option value='".sprintf("%.2f", $i)."'>".sprintf("%.2f", $i)."</option>";
											}?>
										</select>
									</div>
									<div class="col-sm-3">
										<span class="badge badge-secondary">Curva</span>
										<select class="form-control" name="queratometria_od_curva">
											<?php for($i=32;$i<=55;$i+=0.25){
												echo"<option value='".sprintf("%.2f", $i)."'>".sprintf("%.2f", $i)."</option>";
											}?>
										</select>
									</div>
									<div class="col-sm-3">
										<span class="badge badge-secondary">Eje</span>
										<select class="form-control" name="queratometria_od_eje">
											<?php for($i=0;$i<=180;$i+=5){
												echo"<option value='".$i."°'>".$i."°</option>";
											}?>
										</select>
									</div>
								</div><br><br>
								<div class="row">
									<div class="col-sm-3">
										<label class="control-label"><h4><strong>O.I.</strong></h4></label>
									</div>
									<div class="col-sm-3">
										<span class="badge badge-secondary">Plana</span>
										<select class="form-control" name="queratometria_oi_plana">
											<?php for($i=32;$i<=55;$i+=0.25){
												echo"<option value='".sprintf("%.2f", $i)."'>".sprintf("%.2f", $i)."</option>";
											}?>
										</select>
									</div>
									<div class="col-sm-3">
										<span class="badge badge-secondary">Curva</span>
										<select class="form-control" name="queratometria_oi_curva">
											<?php for($i=32;$i<=55;$i+=0.25){
												echo"<option value='".sprintf("%.2f", $i)."'>".sprintf("%.2f", $i)." </option>";
											}?>
										</select>
									</div>
									<div class="col-sm-3">
										<span class="badge badge-secondary">Eje</span>
										<select class="form-control" name="queratometria_oi_eje">
											<?php for($i=0;$i<=180;$i+=5){
												echo"<option value='".$i."°'>".$i."°</option>";
											}?>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="row" style="background-color: lightgray; padding: 15px;">
							<div class="col-sm-5" align="left">
								<strong><h4>Visión Estereoscópica</h4></strong>	
							</div>
							<div class="col-sm-2">
								<span class="badge badge-secondary">seg/arco</span>
								<select class="form-control" name="vision_estereo">
									<option value='40'>40'</option>
									<option value='50'>50'</option>
									<option value='60'>60'</option>
									<option value='80'>80'</option>
									<option value='100'>100'</option>
									<option value='140'>140'</option>
									<option value='200'>200'</option>
									<option value='400'>400'</option>
									<option value='800'>800'</option>
								</select>
							</div>
						</div>
						<div class="row" style="background-color: lightgray; padding: 15px;">
							<div class="col-sm-3" align="left">
								<strong><h4>Oftalmoscopía</h4></strong>	
							</div><br><br><br>
							<div class="row">
								<div class="col-sm-3">
									<span class="badge badge-secondary">PARÁMETROS</span>
								</div>
								<div class="col-sm-3">
									<span class="badge badge-secondary">OJO DERECHO</span>
								</div>
								<div class="col-sm-3">
									<span class="badge badge-secondary">OJO IZQUIERDO</span>
								</div>
							</div><br>

							<div class="row">
								<div class="col-sm-3">
									<label class="control-label">Papila</label>
								</div>
								<div class="col-sm-3">
									<input class="form-control" type="text" name="papila_od" id="papila_od">
								</div>
								<div class="col-sm-3">
									<input class="form-control" type="text" name="papila_oi" id="papila_oi">
								</div>
							</div><br>
							<div class="row">
								<div class="col-sm-3">
									<label class="control-label">Excavación</label>
								</div>
								<div class="col-sm-3">
									<input class="form-control" type="text" name="excavacion_od" id="excavacion_od">
								</div>
								<div class="col-sm-3">
									<input class="form-control" type="text" name="excavacion_oi" id="excavacion_oi">
								</div>
							</div><br>
							<div class="row">
								<div class="col-sm-3">
									<label class="control-label">Radio</label>
								</div>
								<div class="col-sm-3">
									<input class="form-control" type="text" name="radio_od" id="radio_od">
								</div>
								<div class="col-sm-3">
									<input class="form-control" type="text" name="radio_oi" id="radio_oi">
								</div>
							</div><br>
							<div class="row">
								<div class="col-sm-3">
									<label class="control-label">Profundidad</label>
								</div>
								<div class="col-sm-3">
									<input class="form-control" type="text" name="profundidad_od" id="profundidad_od">
								</div>
								<div class="col-sm-3">
									<input class="form-control" type="text" name="profundidad_oi" id="profundidad_oi">
								</div>
							</div><br>
							<div class="row">
								<div class="col-sm-3">
									<label class="control-label">Vasos</label>
								</div>
								<div class="col-sm-3">
									<input class="form-control" type="text" name="vasos_od" id="vasos_od">
								</div>
								<div class="col-sm-3">
									<input class="form-control" type="text" name="vasos_oi" id="vasos_oi">
								</div>
							</div><br>
							<div class="row">
								<div class="col-sm-3">
									<label class="control-label">Rel. A/V</label>
								</div>
								<div class="col-sm-3">
									<input class="form-control" type="text" name="rel_od" id="rel_od">
								</div>
								<div class="col-sm-3">
									<input class="form-control" type="text" name="rel_oi" id="rel_oi">
								</div>
							</div><br>
							<div class="row">
								<div class="col-sm-3">
									<label class="control-label">Macula</label>
								</div>
								<div class="col-sm-3">
									<input class="form-control" type="text" name="macula_od" id="macula_od">
								</div>
								<div class="col-sm-3">
									<input class="form-control" type="text" name="macula_oi" id="macula_oi">
								</div>
							</div><br>
							<div class="row">
								<div class="col-sm-3">
									<label class="control-label">Reflejo</label>
								</div>
								<div class="col-sm-3">
									<input class="form-control" type="text" name="reflejo_od" id="reflejo_od">
								</div>
								<div class="col-sm-3">
									<input class="form-control" type="text" name="reflejo_oi" id="reflejo_oi">
								</div>
							</div><br>
							<div class="row">
								<div class="col-sm-3">
									<label class="control-label">Retina Periférica</label>
								</div>
								<div class="col-sm-3">
									<input class="form-control" type="text" name="retina_od" id="retina_od">
								</div>
								<div class="col-sm-3">
									<input class="form-control" type="text" name="retina_oi" id="retina_oi">
								</div>
							</div>
						</div>
						<div class="row" style="background-color: lightgray; padding: 15px;">
							<div class="col-sm-5" align="left">
								<strong><h4>Anexos y Biomicroscopía</h4></strong>	
							</div>
							<div class="col-sm-12">
								<textarea class="form-control" name="anexos"></textarea>
							</div><br>
							<div class="form-group col-xs-12" align="left">
								<input type="file" name="archivo_imagen" class="form-control" ><br>

							</div>
						</div>
						<div class="row" style="background-color: lightgray; padding: 15px;">
							<div class="col-sm-12" align="left">
								<strong><h4>Tonometría</h4></strong>	
							</div><br><br>
							<div class="row">
								<div class="col-sm-3">
									<label class="control-label">Fecha</label>
									<input class="form-control" type="date" name="fecha_tono" id="fecha_tono" value="{{ date('Y-m-d') }}">
								</div>
								<div class="col-sm-3">
									<label class="control-label">Hora</label>
									<input class="form-control" type="time" name="hora_tono" id="hora_tono" value="{{ date('H:i') }}">
								</div>
							</div><br>
							<div class="row">
								<div class="col-sm-3">
									<span class="badge badge-secondary">O.D.</span>
									<select class="form-control" name="tonometria_od" id="tonometria_od">
										<?php for($i=10;$i<=35;$i++){
											echo"<option value='".$i."'>".$i."mm/Hg</option>";
										}?>
									</select>
								</div>
								<div class="col-sm-3">
									<span class="badge badge-secondary">O.I.</span>
									<select class="form-control" name="tonometria_oi" id="tonometria_oi">
										<?php for($i=10;$i<=35;$i++){
											echo"<option value='".$i."'>".$i."mm/Hg</option>";
										}?>
									</select>
								</div>
							</div>
						</div>
					</div>




</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>











</div>





<div class="jumbotron col-xs-16" >
	<div class="row" style="margin-top: 20px;">
		<strong><h3>Graduación:</h3></strong>	
	</div><br>

	<div class="row">
		<div class="col-sm-2">
			<label class="control-label"><h4><strong>Ojo Derecho.</strong></h4></label>
		</div>
	</div>
	<div class="row">

		<div class="col-sm-2">
			<span class="badge badge-secondary">ESF.</span>
			<select class="form-control" name="esf_od" id="esf_od" required>
				<option value="">Seleccione uno</option>
				<?php for($i=25;$i>=(-25);$i-=0.25){
					if($i>0){echo"<option value='+".sprintf("%.2f", $i)."'>+".sprintf("%.2f", $i)."</option>";}
					else{echo"<option value='".sprintf("%.2f", $i)."'>".sprintf("%.2f", $i)."</option>";}
				}?>
			</select>
		</div>
		<div class="col-sm-2">
			<span class="badge badge-secondary">CIL.</span>
			<select class="form-control" name="cil_od" id="cil_od">
				<option value="">Seleccione uno</option>
				<?php for($i=(-0.25);$i>=(-15);$i-=0.25){
					if($i>0){echo"<option value='+".sprintf("%.2f", $i)."'>+".sprintf("%.2f", $i)."</option>";}
					else{echo"<option value='".sprintf("%.2f", $i)."'>".sprintf("%.2f", $i)."</option>";}

				}?>
			</select>
		</div>
		<div class="col-sm-2" id="eje_od_div" style="display: none;">
			<span class="badge badge-secondary">EJE.</span>
			<select class="form-control" name="eje_od" id="eje_od">
				<option value="">Seleccione uno</option>
				<?php for($i=0;$i<=180;$i+=5){
					echo"<option value='".$i."'>".$i."°</option>";
				}?>
				<option value="Otro">Otro</option>
			</select>
		</div>
		<div class="col-sm-2" id="val_od" style="display: none;">
			<span class="badge badge-secondary">VALOR EJE.</span>
			<input class="form-control" type="text" name="val_eje_od">
		</div>

		<div class="col-sm-2">
			<span class="badge badge-secondary">ADD.</span>
			<select class="form-control" name="add_od" id="add_od">
				<option value="">Seleccione uno</option>
				<?php for($i=1;$i<=3.50;$i+=0.25){
					echo"<option value='".sprintf("%.2f", $i)."'>+".sprintf("%.2f", $i)."</option>";
				}?>
			</select>
		</div>
		<div class="col-sm-2">
			<span class="badge badge-secondary">AV.</span>
			<select class="form-control" name="av_od" id="av_od" required>
				<option value="">Seleccione uno</option>
				<option value="20/400">20/400</option>
				<option value="20/300">20/300</option>
				<option value="20/200">20/200</option>
				<option value="20/150">20/150</option>
				<option value="20/120">20/120</option>
				<option value="20/100">20/100</option>
				<option value="20/70">20/70</option>
				<option value="20/60">20/60</option>
				<option value="20/50">20/50</option>
				<option value="20/40">20/40</option>
				<option value="20/30">20/30</option>
				<option value="20/25">20/25</option>
				<option value="20/20">20/20</option>
				<option value="20/15">20/15</option>
				<option value="20/10">20/10</option>
				<option value="S.P.L">S.P.L</option>
				<option value="N.P.L">N.P.L</option>
				<option value="Protésis">Protésis</option>
			</select>
		</div>

	</div>	<br>
	<div class="row">
		<div class="col-sm-2">
			<span class="badge badge-secondary">D.N.P. Lejos</span>
			<select class="form-control" name="dnp_od_lejos" required>
				<option value="">Seleccione uno</option>
				<?php for($i=20;$i<=50;$i+=0.50){

					echo"<option value='".sprintf("%.2f", $i)."'>".sprintf("%.2f", $i)." mm</option>";
				}?>
			</select>
		</div>
		<div class="col-sm-2">
			<span class="badge badge-secondary">D.N.P. Cerca</span>
			<select class="form-control" name="dnp_od_cerca" required>
				<option value="">Seleccione uno</option>
				<?php for($i=20;$i<=50;$i+=0.5){

					echo"<option value='".sprintf("%.2f", $i)."'>".sprintf("%.2f", $i)." mm</option>";
				}?>
			</select>
		</div>
	</div><br><hr>
	<div class="row">
		<div class="col-sm-3">
			<label class="control-label"><h4><strong>Ojo Izquierdo</strong></h4></label>
		</div>
	</div>
	<div class="row">

		<div class="col-sm-2">
			<span class="badge badge-secondary">ESF.</span>
			<select class="form-control" name="esf_oi" id="esf_oi" required>
				<option value="">Seleccione uno</option>
				<?php for($i=25;$i>=(-25);$i-=0.25){
					if($i>0){echo"<option value='+".sprintf("%.2f", $i)."'>+".sprintf("%.2f", $i)."</option>";}
					else{echo"<option value='".sprintf("%.2f", $i)."'>".sprintf("%.2f", $i)."</option>";}
				}?>
			</select>
		</div>
		<div class="col-sm-2">
			<span class="badge badge-secondary">CIL.</span>
			<select class="form-control" name="cil_oi" id="cil_oi">
				<option value="">Seleccione uno</option>
				<?php for($i=(-0.25);$i>=(-15);$i-=0.25){
					if($i>0){echo"<option value='+".sprintf("%.2f", $i)."'>+".sprintf("%.2f", $i)."</option>";}
					else{echo"<option value='".sprintf("%.2f", $i)."'>".sprintf("%.2f", $i)."</option>";}

				}?>
			</select>
		</div>
		<div class="col-sm-2" id="eje_oi_div" style="display: none;">
			<span class="badge badge-secondary">EJE.</span>
			<select class="form-control" name="eje_oi" id="eje_oi">
				<option value="">Seleccione uno</option>
				<?php for($i=0;$i<=180;$i+=5){
					echo"<option value='".$i."'>".$i."°</option>";
				}?>
				<option value="Otro">Otro</option>
			</select>
		</div>
		<div class="col-sm-2" id="val_oi" style="display: none;">
			<span class="badge badge-secondary">VALOR EJE.</span>
			<input class="form-control" type="text" name="val_eje_oi">
		</div>
		<div class="col-sm-2">
			<span class="badge badge-secondary">ADD.</span>
			<select class="form-control" name="add_oi" id="add_oi">
				<option value="">Seleccione uno</option>
				<?php for($i=1;$i<=3.50;$i+=0.25){
					echo"<option value='".sprintf("%.2f", $i)."'>+".sprintf("%.2f", $i)."</option>";
				}?>
			</select>
		</div>
		<div class="col-sm-2">
			<span class="badge badge-secondary">AV.</span>
			<select class="form-control" name="av_oi" id="av_oi" required>
				<option value="">Seleccione uno</option>
				<option value="20/400">20/400</option>
				<option value="20/300">20/300</option>
				<option value="20/200">20/200</option>
				<option value="20/150">20/150</option>
				<option value="20/120">20/120</option>
				<option value="20/100">20/100</option>
				<option value="20/70">20/70</option>
				<option value="20/60">20/60</option>
				<option value="20/50">20/50</option>
				<option value="20/40">20/40</option>
				<option value="20/30">20/30</option>
				<option value="20/25">20/25</option>
				<option value="20/20">20/20</option>
				<option value="20/15">20/15</option>
				<option value="20/10">20/10</option>
				<option value="S.P.L">S.P.L</option>
				<option value="N.P.L">N.P.L</option>
				<option value="Protésis">Protésis</option>
			</select>
		</div>

	</div>	<br>
	<div class="row">
		<div class="col-sm-2">
			<span class="badge badge-secondary">D.N.P. Lejos</span>
			<select class="form-control" name="dnp_oi_lejos" required>
				<option value="">Seleccione uno</option>
				<?php for($i=20;$i<=50;$i+=0.50){

					echo"<option value='".sprintf("%.2f", $i)."'>".sprintf("%.2f", $i)." mm</option>";
				}?>
			</select>
		</div>
		<div class="col-sm-2">
			<span class="badge badge-secondary">D.N.P. Cerca</span>
			<select class="form-control" name="dnp_oi_cerca" required>
				<option value="">Seleccione uno</option>
				<?php for($i=20;$i<=50;$i+=0.5){

					echo"<option value='".sprintf("%.2f", $i)."'>".sprintf("%.2f", $i)." mm</option>";
				}?>
			</select>
		</div>
	</div>


	<br><br><br>
	<div  align="left">
		<strong><h4>Diagnóstico</h4></strong>	
	</div><br><br>
	<div class="row">
		<div class="col-sm-3">
			<label class="control-label">Refractivo</label>
			<input class="form-control" type="text" name="refractivo" id="refractivo" >
		</div>
		<div class="col-sm-3">
			<label class="control-label">Patológico</label>
			<input class="form-control" type="text" name="patologico" id="patologico" >
		</div>
		<div class="col-sm-3">
			<label class="control-label">Binocularidad</label>
			<input class="form-control" type="text" name="binocularidad" id="binocularidad" >
		</div>
		<div class="col-sm-3">
			<label class="control-label">Nombre del Lic. Optometrísta</label>
			<input class="form-control" type="text" name="optometrista" id="optometrista" readonly="" value="{{ Auth::user()->empleado->nombre . ' ' . Auth::user()->empleado->appaterno }}">
		</div>
	</div>	
</div>



<div class="panel-default">
	<div class="panel-footer">
		<div class="row text-center">
			<div class="col-sm-4">
				<label class="control-label">Enviar al área de ventas</label>
				<div class="row">
					<input type="checkbox" class="squaredTwo" name="opciones[0]" value="ENVIADO A VENTAS" required>
				</div>
			</div>
			<div class="col-sm-4">
				<label class="control-label">Imprimir</label>
				<div class="row">
					<input type="checkbox" class="squaredTwo" name="opciones[1]" value="IMPRESO">
				</div>
			</div>
			<div class="col-sm-4">
				<button id="submit" type="submit" class="btn btn-success" style="margin-top: 12px;">
					<strong>Guardar</strong>	
				</button>
			</div>
		</div>
	</div>
</div>
</form>
</div>
</div>
</div>


{{-- HISTORIAL OCULAR --}}



<script type="text/javascript">

	$(document).ready(function() {
		$('#eje_od').change(function() {
			var sel = document.getElementById("eje_od").value;
			if(sel == 'Otro')
				document.getElementById('val_od').style.display = 'block';
			else
				document.getElementById('val_od').style.display = 'none';
		});

		$('#eje_oi').change(function() {
			var sel = document.getElementById("eje_oi").value;
			if(sel == 'Otro')
				document.getElementById('val_oi').style.display = 'block';
			else
				document.getElementById('val_oi').style.display = 'none';
		});
	});


</script>

@endsection