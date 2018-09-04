@extends('layouts.test')
@section('content1')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('js/lentillas.js') }}"></script>
<script src="{{ asset('js/lentes.js') }}"></script>

<div class="container">
	<div role="application" class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-3">
						<h4><strong>Datos del Paciente:</strong></h4>
					</div>
					<div class="col-sm-2">
						<a class="btn btn-info" href="{{ route('pacientes.create') }}"><strong>Nuevo Paciente</strong></a>
					</div>
					<div class="col-sm-2">
						<a class="btn btn-primary" href="{{ route('pacientes.edit',['id'=>$paciente->id]) }}"><strong>Editar Paciente</strong></a>
					</div>
					<div class="col-sm-2">
						<a class="btn btn-primary" href="{{ route('pacientes.index') }}"><strong>Ver Pacientes</strong></a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="col-xs-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="identificador">ID de Paciente:</label>
						<dd><strong>{{$paciente->identificador}}</strong></dd>
					</div>
				</div>
				<div class="col-xs-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="appaterno">Apellido Paterno:</label>
						<dd>{{$paciente->appaterno}}</dd>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="apmaterno">Apellido Materno:</label>
						<dd>{{$paciente->apmaterno}}</dd>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="nombre">Nombre(s):</label>
						<dd>{{$paciente->nombre}}</dd>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="edad">Edad:</label>
						<dd>{{$paciente->edad}}</dd>
					</div>
				</div>
				<div class="col-xs-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="fecha_nacimiento">Fecha de Nacimiento:</label>
						<dd>{{$paciente->fecha_nacimiento}}</dd>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="sexo">Sexo:</label>
						<dd>{{$paciente->sexo}}</dd>
					</div>
				</div>
			</div>
			<div class="panel-heading">
				<ul class="nav nav-pills nav-justified">
					<li role="presentation"><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}"  class="ui-tabs-anchor">Generales:</a></li>
					<li role="presentation" ><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">Historial Médico:</a></li>
					<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">Historial Ocular:</a></li>
					<li role="presentation" class="active"><a href="" class="ui-tabs-anchor">Anteojos:</a></li>
					<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">Ortopédico:</a></li>
					<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">Citas:</a></li>
					<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">C.R.M:</a></li> 
				</ul>
			</div>

			<form role="form" method="POST" action="{{ route('pacientes.anteojos.store',['paciente'=>$paciente]) }}">
				{{ csrf_field() }}
				<input type="hidden" name="paciente_id" value="{{$paciente->id}}">
				<div class="panel-body" style="border: solid #a0a0a0; border-radius: 4px;">
					<div class="row">
						<div class="col-sm-12">
							<h4>Tipo de Anteojo</h4>
						</div>
					</div>
					<div class="row text-center">
						<div class="col-sm-4">
							<label class="control-label">Armazón</label>
							<div class="row">
								<input type="radio" name="tipo_anteojo" value="ARMAZÓN" class="option-input radio" style="top: 0;" 
								id="anteojo_radio1" required="">
							</div>
						</div>	
						<div class="col-sm-4">
							<label class="control-label">Lentes de Contacto</label>
							<div class="row">
								<input type="radio" name="tipo_anteojo" value="LENTES DE CONTACTO" class="option-input radio" style="top: 0;" 
								id="anteojo_radio2">
							</div>
						</div>
					</div>

					<div id="armazon" style="display: none;">
						<div class="row">
							<div class="col-sm-12">
								<h4>Armazón</h4>
							</div>
						</div>
						<div class="jumbotron col-xs-12" style="margin: 0px;">
							<div class="row">
								<div class="col-sm-4 text-center">
									<label class="control-label">Tipo de Lente</label>
									<select class="form-control" name="tipo_lente" id="tipo_lente">
										<option value="">Seleccione uno</option>
										<option value="MONOFOCAL">MONOFOCAL</option>
										<option value="BIFOCAL">BIFOCAL</option>
										<option value="PROGRESIVO">PROGRESIVO</option>
									</select>
								</div>
								<div class="col-sm-8" id="monofocal_div" style="display: none;">
									<div class="" style="background: #fff; border: solid #a0a0a0; border-radius: 4px;">
										<div class="row text-center">
											<div class="col-sm-3">
												<span class="badge badge-secondary">LEJOS</span>
												<div class="row">
													<input type="radio" class="option-input radio"  name="monofocal" value="LEJOS" style="top: 0;">
												</div>
											</div>
											<div class="col-sm-3">
												<span class="badge badge-secondary">CERCA</span>
												<div class="row">
													<input type="radio" class="option-input radio"  name="monofocal" value="CERCA" style="top: 0;">
												</div>
											</div>
											<div class="col-sm-3">
												<span class="badge badge-secondary">AMBAS</span>
												<div class="row">
													<input type="radio" class="option-input radio"  name="monofocal" value="AMBAS" id="monofocal_ambas" style="top: 0;">
												</div>
											</div>
											<div class="col-sm-3">
												<span class="badge badge-secondary">SUB-CORRECCIÓN</span>
												<div class="row">
													<input type="radio" class="option-input radio"  name="monofocal" value="SUB-CORRECCIÓN" style="top: 0;">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-8" id="bifocal_div" style="display: none;">
									<div class="" style="background: #fff; border: solid #a0a0a0; border-radius: 4px;">
										<div class="row text-center">
											<div class="col-sm-6">
												<span class="badge badge-secondary">FLAT-TOP</span>
												<div class="row">
													<input type="radio" class="option-input radio" name="bifocal" value="FLAT-TOP" id="flattop" style="top: 0;">
												</div>
											</div>
											<div class="col-sm-6">
												<span class="badge badge-secondary">BLEND</span>
												<div class="row">
													<input type="radio" class="option-input radio" name="bifocal" value="BLEND" id="blend" style="top: 0;">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-8" id="progresivo_div" style="display: none;">
									<div class="" style="background: #fff; border: solid #a0a0a0; border-radius: 4px;">
										<div class="row text-center">
											<div class="col-sm-6">
												<span class="badge badge-secondary">BÁSICO</span>
												<div class="row">
													<input type="radio" class="option-input radio" name="progresivo" value="BÁSICO" id="progresivo_basico" style="top: 0;">
												</div>
											</div>
											<div class="col-sm-6">
												<span class="badge badge-secondary">PREMIUM</span>
												<div class="row">
													<input type="radio" class="option-input radio" name="progresivo" value="PREMIUM" id="progresivo_premium" style="top: 0;">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div id="modulo_monofocal">
								<div class="row" id="monofocal_material_div" style="display: none;">
									<br>
									<div class="col-sm-4 text-center">
										<label class="control-label">Material</label>
										<select class="form-control" name="monofocal_material" id="monofocal_material">
											<option value="">Seleccione uno</option>
											<option value="BÁSICO">BÁSICO</option>
											<option value="PREMIUM">PREMIUM</option>
										</select>
									</div>
									<div class="col-sm-8" id="monofocal_basico_div" style="display: none;">
										<div class="" style="background: #fff; border: solid #a0a0a0; border-radius: 4px;">
											<div class="row text-center">
												<div class="col-sm-3">
													<span class="badge badge-secondary">CR-39 W</span>
													<div class="row">
														<input type="radio" class="option-input radio"  name="monofocal_material_basico" value="CR-39 W" id="mono_bas" style="top: 0;">
													</div>
												</div>
												<div class="col-sm-3">
													<span class="badge badge-secondary">HIGH-INDEX W</span>
													<div class="row">
														<input type="radio" class="option-input radio"  name="monofocal_material_basico" value="HIGH-INDEX W" style="top: 0">
													</div>
												</div>
												<div class="col-sm-3">
													<span class="badge badge-secondary">POLICARBONATO</span>
													<div class="row">
														<input type="radio" class="option-input radio"  name="monofocal_material_basico" value="POLICARBONATO" style="top: 0">
													</div>
												</div>
												<div class="col-sm-3">
													<span class="badge badge-secondary">CRISTAL W</span>
													<div class="row">
														<input type="radio" class="option-input radio"  name="monofocal_material_basico" value="CRISTAL W" style="top: 0">
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-8" id="monofocal_premium_div" style="display: none;">
										<div class="" style="background: #fff; border: solid #a0a0a0; border-radius: 4px;">
											<div class="row text-center">
												<div class="col-sm-6">
													<span class="badge badge-secondary">ORMA</span>
													<div class="row">
														<input type="radio" class="option-input radio"  name="monofocal_material_premium" value="ORMA" id="orma" style="top: 0">
													</div>
												</div>
												<div class="col-sm-6">
													<span class="badge badge-secondary">AIRWEAR</span>
													<div class="row">
														<input type="radio" class="option-input radio"  name="monofocal_material_premium" value="AIRWEAR" id="airwear" style="top: 0">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row" id="monofocal_tratamiento_div" style="display: none;">
									<br>
									<div class="col-sm-4 text-center">
										<label class="control-label">Tratamiento</label>
										<div class="row">
											<div class="col-sm-6">
												<span class="badge badge-secondary">SI</span>
												<div class="row">
													<input type="radio" class="option-input radio"  name="tratamiento" id="tratamiento1" value="SI" style="top: 0">
												</div>
											</div>
											<div class="col-sm-6">
												<span class="badge badge-secondary">NO</span>
												<div class="row">
													<input type="radio" class="option-input radio"  name="tratamiento" id="tratamiento2" value="NO" style="top: 0">
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-8" id="tratamiento_si_div" style="display: none;">
										<div class="" style="background: #fff; border: solid #a0a0a0; border-radius: 4px;">
											<div class="row text-center">
												<div class="col-sm-4">
													<input type="hidden" name="antirreflejante" value="NO">
													<label class="label-text">Antirreflejante</label>
													<div class="row">
														<input type="checkbox" class="squaredTwo" name="antirreflejante" id="antirreflejante" data-on="SI" data-off="NO" value="SI">
													</div>
												</div>
												<div class="col-sm-4">
													<input type="hidden" name="fotocromatico" value="NO">
													<label class="label-text">Fotocromático</label>
													<div class="row">
														<input type="checkbox" class="squaredTwo" name="fotocromatico" id="fotocromatico" data-on="SI" data-off="NO" value="SI">
													</div>
												</div>
												<div class="col-sm-4">
													<input type="hidden" name="polarizado" value="NO">
													<label class="label-text">Polarizado</label>
													<div class="row">
														<input type="checkbox" class="squaredTwo" name="polarizado" id="polarizado" data-on="SI" data-off="NO" value="SI">
													</div>
												</div>
											</div>
											<div class="row text-center" id="antirreflejante_div" style="display: none;">
												<br>
												<div class="row">
													<label class="control-label">Tipo de Antirreflejante</label>
												</div>
												<div class="row" id="anti_basico_div" style="display: none;">
													<dd>BÁSICO</dd>
													<input type="hidden" name="anti_basico" value="BÁSICO" id="anti_basico">
												</div>
												<div class="row" id="anti_premium_div" style="display: none;">
													<div class="col-sm-offset-1 col-sm-2" id="trio_div">
														<span class="badge badge-secondary">CRIZAL EASY</span>
														<div class="row">
															<input type="radio" class="option-input radio"  name="anti_premium" value="CRIZAL EASY" id="criz_m" style="top: 0">
														</div>
													</div>
													<div class="col-sm-2">
														<span class="badge badge-secondary">TRIO</span>
														<div class="row">
															<input type="radio" class="option-input radio"  name="anti_premium" value="TRIO" id="trio" style="top: 0">
														</div>
													</div>
													<div class="col-sm-2">
														<span class="badge badge-secondary">CRIZAL ALIZE</span>
														<div class="row">
															<input type="radio" class="option-input radio"  name="anti_premium" value="CRIZAL ALIZE" id="aliz_m" style="top: 0">
														</div>
													</div>
													<div class="col-sm-2">
														<span class="badge badge-secondary">CRIZAL FORTE</span>
														<div class="row">
															<input type="radio" class="option-input radio"  name="anti_premium" value="CRIZAL FORTE" id="fort_m" style="top: 0">
														</div>
													</div>
													<div class="col-sm-2">
														<span class="badge badge-secondary">CRIZAL PREVENCIA</span>
														<div class="row">
															<input type="radio" class="option-input radio"  name="anti_premium" value="CRIZAL PREVENCIA" id="prev_m" style="top: 0">
														</div>
													</div>
												</div>
											</div>
											<div class="row text-center" id="fotocromatico_div" style="display: none;">
												<br>
												<div class="row">
													<label class="control-label">Tipo de Fotocromático</label>
												</div>
												<div class="row" id="foto_basico_div" style="display: none;">
													<dd>BÁSICO</dd>
													<input type="hidden" name="foto_basico" value="BÁSICO" id="foto_basico">
												</div>
												<div class="row" id="foto_premium_div" style="display: none;">
													<div class="col-sm-3">
														<span class="badge badge-secondary">TRANSITIONS GRIS</span>
														<div class="row">
															<input type="radio" class="option-input radio"  name="foto_premium" value="TRANSITIONS GRIS" id="t_gris" style="top: 0">
														</div>
													</div>
													<div class="col-sm-3">
														<span class="badge badge-secondary">TRANSITIONS CAFÉ</span>
														<div class="row">
															<input type="radio" class="option-input radio"  name="foto_premium" value="TRANSITIONS CAFÉ" id="t_cafe" style="top: 0">
														</div>
													</div>
													<div class="col-sm-3">
														<span class="badge badge-secondary">TRANSITIONS VERDE</span>
														<div class="row">
															<input type="radio" class="option-input radio"  name="foto_premium" value="TRANSITIONS VERDE" id="t_verde" style="top: 0">
														</div>
													</div>
													<div class="col-sm-3" id="xtrac_div">
														<span class="badge badge-secondary">TRANSITIONS XTRACTIVE</span>
														<div class="row">
															<input type="radio" class="option-input radio"  name="foto_premium" value="TRANSITIONS XTRACTIVE" id="xtrac" style="top: 0">
														</div>
													</div>
												</div>
											</div>
											<div class="row text-center" id="polarizado_div" style="display: none;">
												<br>
												<div class="row">
													<label class="control-label">Tipo de Polarizado</label>
												</div>
												<div class="row" id="polarizado_basico_div" style="display: none;">
													<dd>BÁSICO</dd>
													<input type="hidden" name="polarizado_basico" value="BÁSICO" id="polarizado_basico">
												</div>
												<div class="row" id="polarizado_premium_div" style="display: none;">
													<dd>PREMIUM (XPERIO)</dd>
													<input type="hidden" name="polarizado_premium" value="PREMIUM (XPERIO)" id="xperio">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div id="modulo_bifocal">
								<div class="row" id="bifocal_flat_div" style="display: none;">
									<br>
									<div class="col-sm-4 text-center">
										<label class="control-label">Material</label>
										<div class="col-sm-12" style="background: #fff; border: solid #a0a0a0; border-radius: 4px;">
											<div class="col-sm-6">
												<span class="badge badge-secondary">CR-39 W</span>
												<div class="row">
													<input type="radio" class="option-input radio"  name="bifocal_flat_material" value="CR-39 W" id="cr39" style="top: 0">
												</div>
											</div>
											<div class="col-sm-6" id="xtrac_div">
												<span class="badge badge-secondary">POLICARBONATO</span>
												<div class="row">
													<input type="radio" class="option-input radio"  name="bifocal_flat_material" value="POLICARBONATO" id="policarbonato" style="top: 0">
												</div>
											</div>
										</div>
									</div>
									<div id="bifocal_flat_tratamiento_div" style="display: none;">
										<div class="col-sm-4 text-center">
											<label class="control-label">Tratamiento</label>
											<div class="row">
												<div class="col-sm-6">
													<span class="badge badge-secondary">SI</span>
													<div class="row">
														<input type="radio" class="option-input radio"  name="tratamiento_flat" id="tratamiento1_flat" value="SI" style="top: 0">
													</div>
												</div>
												<div class="col-sm-6">
													<span class="badge badge-secondary">NO</span>
													<div class="row">
														<input type="radio" class="option-input radio"  name="tratamiento_flat" id="tratamiento2_flat" value="NO" style="top: 0">
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-4" id="tratamiento_flat_si" style="display: none">
											<br>
											<div class="col-sm-12 text-center" style="background: #fff; border: solid #a0a0a0; border-radius: 4px;">
												<div class="col-sm-6">
													<span class="badge badge-secondary">ANTIRREFLEJANTE-BÁSICO</span>
													<input type="hidden" name="tratamiento_flat_antirreflejante_basico" value="NO">
													<div class="row">
														<input type="checkbox" class="squaredTwo" name="tratamiento_flat_antirreflejante_basico" id="tratamiento_flat_antirreflejante_basico" data-on="SI" data-off="NO" value="SI">
													</div>
												</div>
												<div class=" col-sm-6">
													<span class="badge badge-secondary">FOTOCROMÁTICO-BÁSICO</span>
													<input type="hidden" name="tratamiento_flat_fotocromatico_basico" value="NO">
													<div class="row">
														<input type="checkbox" class="squaredTwo" name="tratamiento_flat_fotocromatico_basico" id="tratamiento_flat_fotocromatico_basico" data-on="SI" data-off="NO" value="SI">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="row" id="bifocal_blend_div" style="display: none;">
									<br>
									<div class="col-sm-4 text-center">
										<label class="control-label">Material</label>
										<div class="col-sm-12" style="background: #fff; border: solid #a0a0a0; border-radius: 4px;">
											<div class="col-sm-12">
												<span class="badge badge-secondary">CR-39 W</span>
												<input type="hidden" name="bifocal_blend_material" value="NO">
												<div class="row">
													<input type="checkbox" class="squaredTwo" name="bifocal_blend_material" id="bifocal_blend_material" data-on="SI" data-off="NO" value="SI">
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4 text-center" id="bifocal_blend_tratamiento_div" style="display:none;">
										<label class="control-label">Tratamiento</label>
										<div class="row">
											<div class="col-sm-6">
												<span class="badge badge-secondary">SI</span>
												<div class="row">
													<input type="radio" class="option-input radio"  name="tratamiento_blend" id="tratamiento1_blend" value="SI" style="top: 0">
												</div>
											</div>
											<div class="col-sm-6">
												<span class="badge badge-secondary">NO</span>
												<div class="row">
													<input type="radio" class="option-input radio"  name="tratamiento_blend" id="tratamiento2_blend" value="NO" style="top: 0">
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4" id="tratamiento_blend_si" style="display: none;">
										<br>
										<div class="col-sm-12" style="background: #fff; border: solid #a0a0a0; border-radius: 4px;">
											<div class="col-sm-12 text-center">
												<span class="badge badge-secondary">ANTIRREFLEJANTE-BÁSICO</span>
												<input type="hidden" name="tratamiento_blend_basico" value="NO">
												<div class="row">
													<input type="checkbox" class="squaredTwo" name="tratamiento_blend_basico" id="tratamiento_blend_basico" data-on="SI" data-off="NO" value="SI">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div id="modulo_progresivo">
								<div id="progresivo_basico_div" style="display:none;">
									<br>
									<div class="col-sm-4 text-center">
										<label class="control-label">Material</label>
										<div class="col-sm-12" style="background: #fff; border: solid #a0a0a0; border-radius: 4px;">
											<div class="col-sm-12">
												<div class="col-sm-6">
													<span class="badge badge-secondary">CR-39 W</span>
													<div class="row">
														<input type="radio" class="option-input radio"  name="progresivo_basico_material" value="CR-39 W" id="prog_cr" style="top: 0">
													</div>
												</div>
												<div class="col-sm-6">
													<span class="badge badge-secondary">POLICARBONATO</span>
													<div class="row">
														<input type="radio" class="option-input radio"  name="progresivo_basico_material" value="POLICARBONATO" id="prog_poli" style="top: 0">
													</div>
												</div>
											</div>
										</div>
									</div>
									<div id="progresivo_basico_tratamiento_div">
										<div class="col-sm-4 text-center">
											<label class="control-label">Tratamiento</label>
											<div class="row">
												<div class="col-sm-6">
													<span class="badge badge-secondary">SI</span>
													<div class="row">
														<input type="radio" class="option-input radio" name="tratamiento_progresivo_basico" id="tratamiento1_progresivo_basico" value="SI" style="top: 0">
													</div>
												</div>
												<div class="col-sm-6">
													<span class="badge badge-secondary">NO</span>
													<div class="row">
														<input type="radio" class="option-input radio" name="tratamiento_progresivo_basico" id="tratamiento2_progresivo_basico" value="NO" style="top: 0">
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-4" id="tratamiento_progresivo_basico_si" style="display: none;">
											<br>
											<div class="col-sm-12 text-center" style="background: #fff; border: solid #a0a0a0; border-radius: 4px;">
												<div class="col-sm-6">
													<span class="badge badge-secondary">ANTIRREFLEJANTE-BÁSICO</span>
													<input type="hidden" name="tratamiento_progresivo_basico_antirreflejante" value="NO">
													<div class="row">
														<input type="checkbox" class="squaredTwo" name="tratamiento_progresivo_basico_antirreflejante" id="tratamiento_progresivo_basico_antirreflejante" data-on="SI" data-off="NO" value="SI">
													</div>
												</div>
												<div class="col-sm-6">
													<span class="badge badge-secondary">FOTOCROMÁTICO-BÁSICO</span>
													<input type="hidden" name="tratamiento_progresivo_basico_fotocromatico" value="NO">
													<div class="row">
														<input type="checkbox" class="squaredTwo" name="tratamiento_progresivo_basico_fotocromatico" id="tratamiento_progresivo_basico_fotocromatico" data-on="SI" data-off="NO" value="SI">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div id="progresivo_premium_div" style="display:none;">
									<br>
									<div class="row">
										<div class="col-sm-4 text-center">
											<label class="control-label">KODAK</label>
											<div class="col-sm-12" style="background: #fff; border: solid #a0a0a0; border-radius: 4px;">
												<div class="col-sm-4">
													<span class="badge badge-secondary">UNIQUE</span>
													<div class="row">
														<input type="radio" class="option-input radio"  name="progresivo_premium_kodak" value="UNIQUE" id="unique" style="top: 0">
													</div>
												</div>
												<div class="col-sm-4">
													<span class="badge badge-secondary">EASY</span>
													<div class="row">
														<input type="radio" class="option-input radio"  name="progresivo_premium_kodak" value="EASY" id="easy" style="top: 0">
													</div>
												</div>
												<div class="col-sm-4">
													<span class="badge badge-secondary">PRECISE</span>
													<div class="row">
														<input type="radio" class="option-input radio"  name="progresivo_premium_kodak" value="PRECISE" id="precise" style="top: 0">
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-4 text-center">
											<label class="control-label">Material</label>
											<div class="col-sm-12" style="background: #fff; border: solid #a0a0a0; border-radius: 4px;">
												<div class="col-sm-6">
													<span class="badge badge-secondary">ORMA</span>
													<div class="row">
														<input type="radio" class="option-input radio"  name="progresivo_premium_material" value="ORMA" id="prog_orma" style="top: 0">
													</div>
												</div>
												<div class="col-sm-6">
													<span class="badge badge-secondary">AIRWEAR</span>
													<div class="row">
														<input type="radio" class="option-input radio"  name="progresivo_premium_material" value="AIRWEAR" id="air" style="top: 0">
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row" id="progresivo_premium_tratamiento_div">
										<br>
										<div class="col-sm-4 text-center">
											<label class="control-label">Tratamiento</label>
											<div class="row">
												<div class="col-sm-6">
													<span class="badge badge-secondary">SI</span>
													<div class="row">
														<input type="radio" class="option-input radio" name="tratamiento_progresivo_premium" id="tratamiento_progresivo_premium1" value="SI" style="top: 0">
													</div>
												</div>
												<div class="col-sm-6">
													<span class="badge badge-secondary">NO</span>
													<div class="row">
														<input type="radio" class="option-input radio" name="tratamiento_progresivo_premium" id="tratamiento_progresivo_premium2" value="NO" style="top: 0">
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-8" id="tratamiento_progresivo_premium_si_div" style="display: none;">
											<div class="col-sm-12" style="background: #fff; border: solid #a0a0a0; border-radius: 4px;">
												<div class="row text-center">
													<div class="col-sm-6">
														<input type="hidden" name="tratamiento_progresivo_premium_antirreflejante" value="NO">
														<label class="label-text">Antirreflejante</label>
														<div class="row">
															<input type="checkbox" class="squaredTwo" name="tratamiento_progresivo_premium_antirreflejante" id="tratamiento_progresivo_premium_antirreflejante" data-on="SI" data-off="NO" value="SI">
														</div>
													</div>
													<div class="col-sm-6">
														<input type="hidden" name="tratamiento_progresivo_premium_fotocromatico" value="NO">
														<label class="label-text">Fotocromático</label>
														<div class="row">
															<input type="checkbox" class="squaredTwo" name="tratamiento_progresivo_premium_fotocromatico" id="tratamiento_progresivo_premium_fotocromatico" data-on="SI" data-off="NO" value="SI">
														</div>
													</div>
												</div>
												<div class="row" id="tratamiento_progresivo_premium_antirreflejante_div" style="display: none;">
													<br>
													<div class="col-sm-12 text-center">
														<label class="control-label">Tipo de Antirreflejante</label>
														<div class="row">
															<div class="col-sm-3">
																<span class="badge badge-secondary">CRIZAL EASY</span>
																<div class="row">
																	<input type="radio" class="option-input radio"  name="anti_premium_progresivo" value="CRIZAL EASY" id="c_easy" style="top: 0">
																</div>
															</div>
															<div class="col-sm-3">
																<span class="badge badge-secondary">CRIZAL ALIZE</span>
																<div class="row">
																	<input type="radio" class="option-input radio"  name="anti_premium_progresivo" value="CRIZAL ALIZE" id="c_alize" style="top: 0">
																</div>
															</div>
															<div class="col-sm-3">
																<span class="badge badge-secondary">CRIZAL FORTE</span>
																<div class="row">
																	<input type="radio" class="option-input radio"  name="anti_premium_progresivo" value="CRIZAL FORTE" id="c_forte" style="top: 0">
																</div>
															</div>
															<div class="col-sm-3">
																<span class="badge badge-secondary">CRIZAL PREVENCIA</span>
																<div class="row">
																	<input type="radio" class="option-input radio"  name="anti_premium_progresivo" value="CRIZAL PREVENCIA" id="c_prev" style="top: 0">
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row" id="tratamiento_progresivo_premium_fotocromatico_div" style="display: none;">
													<br>
													<div class="col-sm-12 text-center">
														<label class="control-label">Tipo de Fotocromático</label>
														<div class="row">
															<div class="col-sm-4">
																<span class="badge badge-secondary">TRANSITIONS GRIS</span>
																<div class="row">
																	<input type="radio" class="option-input radio"  name="foto_premium_progresivo" value="TRANSITIONS GRIS" id="f_tran" style="top: 0">
																</div>
															</div>
															<div class="col-sm-4">
																<span class="badge badge-secondary">TRANSITIONS CAFÉ</span>
																<div class="row">
																	<input type="radio" class="option-input radio"  name="foto_premium_progresivo" value="TRANSITIONS CAFÉ" id="f_caf" style="top: 0">
																</div>
															</div>
															<div class="col-sm-4">
																<span class="badge badge-secondary">TRANSITIONS VERDE</span>
																<div class="row">
																	<input type="radio" class="option-input radio"  name="foto_premium_progresivo" value="TRANSITIONS VERDE" id="f_ver" style="top: 0">
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="contacto" style="display: none;">
						<div class="row">
							<div class="col-sm-12">
								<h4>Lentes de Contacto</h4>
							</div>
						</div>
						<div class="jumbotron col-sm-12" style="margin-bottom: 0;">
							<div class="row">
								<div class="col-sm-4 text-center">
									<label class="control-label">Tipo de Lente:</label>
									<select class="form-control" name="tipo_lentec" id="tipo_lentec">
										<option value="">Seleccione uno</option>
										<option value="HIDROFÍLICOS">Hidrofílicos</option>
										<option value="RÍGIDO">Rígido</option>
										<option value="HÍBRIDO">Híbrido</option>
									</select>
								</div>
							</div>
							<div class="row" id="categoria" style="display: none;">
								<br>
								<div class="col-sm-4 text-center">
									<label class="control-label">Categoría:</label>
									<select class="form-control" name="categoria" id="tipo_categoria">
										<option value="">Seleccione uno</option>
										<option value="COSMÉTICO">Cosmético</option>
										<option value="ESFÉRICO">Esférico</option>
										<option value="TÓRICO">Tórico</option>
										<option value="MULTIFOCALES">Multifocales</option>
										<option value="PUPILA NEGRA">Pupila Negra</option>
									</select>
								</div>
								<div class="col-sm-8" id="cosmetico" style="display: none;">
									<div class="col-sm-12 text-center" style="background: #fff; border: solid #a0a0a0; border-radius: 4px;">
										<div class="col-sm-4">
											<span class="badge badge-secondary">Air Optix Colors</span>
											<div class="row">
												<input type="radio" name="tipo_cosmetico" value="AIR OPTIX COLORS" class="option-input radio" style="top: 0;" 
												id="cosmetico_radio1">
											</div>
										</div>
										<div class="col-sm-4">
											<span class="badge badge-secondary">Fresh Colorblends</span>
											<div class="row">
												<input type="radio" name="tipo_cosmetico" value="FRESH COLORBLENDS" class="option-input radio" style="top: 0;" 
												id="cosmetico_radio2">
											</div>
										</div>
										<div class="col-sm-4">
											<span class="badge badge-secondary">Freshlook Dailies</span>
											<div class="row">
												<input type="radio" name="tipo_cosmetico" value="FRESHLOOK DAILIES" class="option-input radio" style="top: 0;" 
												id="cosmetico_radio3">
											</div>
										</div>
									</div>
								</div>
								<div id="esferico" style="display: none;">
									<div class="col-sm-4 text-center">
										<label class="control-label">Esférico:</label>
										<select class="form-control" name="tipo_esferico" id="tipo_esferico">
											<option value="">Seleccione uno</option>
											<option value="DESECHABLES">Desechables</option>
											<option value="ANUALES">Anuales</option>
										</select>
									</div>
									<div id="desechable" style="display: none;">
										<div class="col-sm-4 text-center">
											<div class="col-sm-6">
												<span class="badge badge-secondary">Diario</span>
												<div class="row">
													<input type="radio" name="tipo_desechable" value="DIARIO" class="option-input radio" style="top: 0;" id="desechable_radio1">
												</div>
											</div>
											<div class="col-sm-6">
												<span class="badge badge-secondary">Mensual</span>
												<div class="row">
													<input type="radio" name="tipo_desechable" value="MENSUAL" class="option-input radio" style="top: 0;" id="desechable_radio2">
												</div>
											</div>
										</div>
									</div>
									<div id="anual" style="display: none;">
										<div class="col-sm-4 text-center">
											<div class="col-sm-6">
												<span class="badge badge-secondary">Optima 38</span>
												<div class="row">
													<input type="radio" name="anual" value="OPTIMA 38" class="option-input radio" style="top: 0;" id="anual_radio">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div id="torico" style="display: none;">
									<div class="col-sm-4 text-center">
										<label class="control-label">Tórico:</label>
										<select class="form-control" name="tipo_torico" id="tipo_torico">
											<option value="">Seleccione uno</option>
											<option value="NACIONAL">Nacional</option>
											<option value="IMPORTADO">Importado</option>
										</select>
									</div>
									<div id="importado" style="display: none;">
										<div class="col-sm-4 text-center">
											<div class="col-sm-6">
												<span class="badge badge-secondary">Diario</span>
												<div class="row">
													<input type="radio" name="tipo_importado" value="DIARIO" class="option-input radio" style="top: 0;" id="importado_radio1">
												</div>
											</div>
											<div class="col-sm-6">
												<span class="badge badge-secondary">Mensual</span>
												<div class="row">
													<input type="radio" name="tipo_importado" value="MENSUAL" class="option-input radio" style="top: 0;" id="importado_radio2">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-4 text-center" id="multifocal" style="display: none;">
									<div class="col-sm-6">
										<span class="badge badge-secondary">Diario</span>
										<div class="row">
											<input type="radio" name="tipo_multifocal" value="DIARIO" class="option-input radio" style="top: 0;" 
											id="multifocal_radio1">
										</div>
									</div>
									<div class="col-sm-6">
										<span class="badge badge-secondary">Mensual</span>
										<div class="row">
											<input type="radio" name="tipo_multifocal" value="MENSUAL" class="option-input radio" style="top: 0;" 
											id="multifocal_radio2">
										</div>
									</div>
								</div>
								<div class="col-sm-4" id="diario_multifocal" style="display: none;">
									<div class="col-sm-12" style="background: #fff; border: solid #a0a0a0; border-radius: 4px;">
										<div class="row text-center">
											<div class="col-sm-12">
												<span class="badge badge-secondary">Clariti 1 Day multifocal</span>
												<div class="row">
													<input type="radio" name="diario_multifocal" id="diario_multifocal_radio1" value="CLARITI 1 DAY MULTIFOCAL" class="option-input radio" style="top: 0;">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-4" id="mensual_multifocal" style="display: block;">
									<div class="" style="background: #fff; border: solid #a0a0a0; border-radius: 4px;">
										<div class="row text-center">
											<div class="col-sm-6">
												<span class="badge badge-secondary">Biofinity multifocal</span>
												<div class="row">
													<input type="radio" name="mensual_multifocal" id="mensual_multifocal_radio1" value="BIOFINITY MULTIFOCAL" class="option-input radio" style="top: 0;">
												</div>
											</div>
											<div class="col-sm-6">
												<span class="badge badge-secondary">Air Optix multifocal</span>
												<div class="row">
													<input type="radio" name="mensual_multifocal" id="mensual_multifocal_radio2" value="AIR OPTIX MULTIFOCAL" class="option-input radio" style="top: 0;">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-offset-4 col-sm-8" id="diario" style="display: none;">
									<br>
									<div class="col-sm-12" style="background: #fff; border: solid #a0a0a0; border-radius: 4px;">
										<div class="row text-center">
											<div class="col-sm-offset-3 col-sm-3">
												<span class="badge badge-secondary">Clariti 1 Day</span>
												<div class="row">
													<input type="radio" name="diario" id="diario_radio1" value="CLARITI 1 DAY" class="option-input radio" style="top: 0;">
												</div>
											</div>
											<div class="col-sm-3">
												<span class="badge badge-secondary">Dailies Aqua</span>
												<div class="row">
													<input type="radio" name="diario" id="diario_radio2" value="DAILIES AQUA" class="option-input radio" style="top: 0;">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-offset-4 col-sm-8" id="mensual" style="display: none;">
									<br>
									<div class="" style="background: #fff; border: solid #a0a0a0; border-radius: 4px;">
										<div class="row text-center">
											<div class="col-sm-3">
												<span class="badge badge-secondary">Biofinity</span>
												<div class="row">
													<input type="radio" name="mensual" id="mensual_radio1" value="BIOFINITY" class="option-input radio" style="top: 0;">
												</div>
											</div>
											<div class="col-sm-3">
												<span class="badge badge-secondary">Biofinity XR</span>
												<div class="row">
													<input type="radio" name="mensual" id="mensual_radio2" value="BIOFINITY XR" class="option-input radio" style="top: 0;">
												</div>
											</div>
											<div class="col-sm-3">
												<span class="badge badge-secondary">Biomedics Now</span>
												<div class="row">
													<input type="radio" name="mensual" id="mensual_radio3" value="BIOMEDICS NOW" class="option-input radio" style="top: 0;">
												</div>
											</div>
											<div class="col-sm-3">
												<span class="badge badge-secondary">O2 Optix</span>
												<div class="row">
													<input type="radio" name="mensual" id="mensual_radio4" value="O2 OPTIX" class="option-input radio" style="top: 0;">
												</div>
											</div>
										</div>
										<br>
										<div class="row text-center">
											<div class="col-sm-3">
												<span class="badge badge-secondary">Air Optix Aqua</span>
												<div class="row">
													<input type="radio" name="mensual" id="mensual_radio5" value="AIR OPTIX AQUA" class="option-input radio" style="top: 0;">
												</div>
											</div>
											<div class="col-sm-3">
												<span class="badge badge-secondary">Night & Day Aqua</span>
												<div class="row">
													<input type="radio" name="mensual" id="mensual_radio6" value="NIGHT & DAY AQUA" class="option-input radio" style="top: 0;">
												</div>
											</div>
											<div class="col-sm-3">
												<span class="badge badge-secondary">Pure Vision 2</span>
												<div class="row">
													<input type="radio" name="mensual" id="mensual_radio7" value="PURE VISION 2" class="option-input radio" style="top: 0;">
												</div>
											</div>
											<div class="col-sm-3">
												<span class="badge badge-secondary">Acuvue Oasys</span>
												<div class="row">
													<input type="radio" name="mensual" id="mensual_radio8" value="ACUVUE OASYS" class="option-input radio" style="top: 0;">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-offset-4 col-sm-8" id="diario_torico" style="display: none;">
									<br>
									<div class="col-sm-12" style="background: #fff; border: solid #a0a0a0; border-radius: 4px;">
										<div class="row text-center">
											<div class="col-sm-offset-3 col-sm-3">
												<span class="badge badge-secondary">Clariti 1 Day toric</span>
												<div class="row">
													<input type="radio" name="diario_torico" id="diario_torico_radio1" value="CLARITI 1 DAY TORIC" class="option-input radio" style="top: 0;">
												</div>
											</div>
											<div class="col-sm-3">
												<span class="badge badge-secondary">Dailies Aqua</span>
												<div class="row">
													<input type="radio" name="diario_torico" id="diario_torico_radio2" value="DAILIES AQUA" class="option-input radio" style="top: 0;">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-offset-4 col-sm-8" id="mensual_torico" style="display: none;">
									<br>
									<div class="" style="background: #fff; border: solid #a0a0a0; border-radius: 4px;">
										<div class="row text-center">
											<div class="col-sm-3">
												<span class="badge badge-secondary">Biofinity toric</span>
												<div class="row">
													<input type="radio" name="mensual_torico" id="mensual_torico_radio1" value="BIOFINITY TORIC" class="option-input radio" style="top: 0;">
												</div>
											</div>
											<div class="col-sm-3">
												<span class="badge badge-secondary">Biofinity toric XR</span>
												<div class="row">
													<input type="radio" name="mensual_torico" id="mensual_torico_radio2" value="BIOFINITY TORIC XR" class="option-input radio" style="top: 0;">
												</div>
											</div>
											<div class="col-sm-3">
												<span class="badge badge-secondary">Air Optics for astigmatism</span>
												<div class="row">
													<input type="radio" name="mensual_torico" id="mensual_torico_radio3" value="AIR OPTICS FOR ASTIGMATISM" class="option-input radio" style="top: 0;">
												</div>
											</div>
											<div class="col-sm-3">
												<span class="badge badge-secondary">Acuvue Oasys toric</span>
												<div class="row">
													<input type="radio" name="mensual_torico" id="mensual_torico_radio4" value="ACUVUE OASYS TORIC" class="option-input radio" style="top: 0;">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-heading" id="finish" style="display: block;">
					<div class="row">
						<div class="col-sm-offset-2 col-sm-8 text-center">
							<div class="col-sm-4">
								<label class="label-text">Enviar al Área de Ventas</label>
								<div class="row">
									<input type="checkbox" class="squaredTwo" name="opciones[0]" value="ENVIADO A VENTAS" required>
								</div>
							</div>
							<div class="col-sm-4">
								<label class="label-text">Imprimir</label>
								<div class="row">
									<input type="checkbox" class="squaredTwo" name="opciones[1]" value="IMPRESO">
								</div>
							</div>
							<div class="col-sm-4">
								<button id="submit" type="submit" class="btn btn-primary">
									<strong>Agregar</strong>	
								</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


@endsection