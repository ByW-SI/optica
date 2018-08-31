@extends('layouts.test')
@section('content1')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('js/lentillas.js') }}"></script>
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
		</div>
	</div>
</div>

<ul class="nav nav-pills nav-justified">
	<li role="presentation"><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}"  class="ui-tabs-anchor">Generales:</a></li>
	<li role="presentation" ><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">Historial Médico:</a></li>
	<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">Historial Ocular:</a></li>
	<li role="presentation" class="active"><a href="" class="ui-tabs-anchor">Anteojos:</a></li>
	<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">Ortopédico:</a></li>
	<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">Citas:</a></li>
	<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">C.R.M:</a></li> 
</ul>

<div style="padding: 20px;">
	<form role="form" method="POST" action="{{ route('pacientes.anteojos.store',['paciente'=>$paciente]) }}">
		{{ csrf_field() }}
		<input type="hidden" name="paciente_id" value="{{$paciente->id}}">
		<div class="container">
			<div class="panel panel-group">
				<div class="panel-default">
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
							<div class="col-sm-4">
								<label class="control-label">Ambos</label>
								<div class="row">
									<input type="radio" name="tipo_anteojo" value="AMBOS" class="option-input radio" style="top: 0;" 
									id="anteojo_radio3">
								</div>
							</div>
						</div>
						<div id="armazon" style="display: none;">
							<div class="row">
								<div class="col-sm-12">
									<h4>Armazón</h4>
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
										<select class="form-control" name="tipo_lentec" id="tipo_lentec" required="">
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
										<select class="form-control" name="categoria" id="tipo_categoria" required="">
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
					<div class="panel-heading" id="finish" style="display: none;">
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
				</div>
			</div>
		</div>
	</form>
</div>

@endsection