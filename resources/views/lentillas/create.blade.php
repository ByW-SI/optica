@extends('layouts.test')
@section('content1')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
							id="anteojo_radio1">
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
											<input type="radio" name="tipo_cosmetico" value="AMBOS" class="option-input radio" style="top: 0;" 
											id="cosmetico_radio1">
										</div>
					      			</div>
					      			<div class="col-sm-4">
										<span class="badge badge-secondary">Fresh Colorblends (mensual)</span>
										<div class="row">
											<input type="radio" name="tipo_cosmetico" value="AMBOS" class="option-input radio" style="top: 0;" 
											id="cosmetico_radio2">
										</div>
					      			</div>
					      			<div class="col-sm-4">
										<span class="badge badge-secondary">Freshlook Dailies</span>
										<div class="row">
											<input type="radio" name="tipo_cosmetico" value="AMBOS" class="option-input radio" style="top: 0;" 
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
							<div id="multifocal" style="display: none;">
								<div class="col-sm-4 text-center">
						      		<label class="control-label">Tórico:</label>
						            <select class="form-control" name="tipo_multifocal" id="tipo_multifocal">
						            	<option value="">Seleccione uno</option>
										<option value="DIARIO">Diario</option>
										<option value="MENSUAL">Mensual</option>
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
						</div>
						<div class="row">
							<div class="col-sm-offset-4 col-sm-8" id="diario" style="display: none;">
								<br>
			      				<div class="col-sm-12" style="background: #fff; border: solid #a0a0a0; border-radius: 4px;">
			      					<div class="row text-center">
						      			<div class="col-sm-offset-3 col-sm-3">
						      				<span class="badge badge-secondary">Clariti 1 day</span>
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
												<input type="radio" name="mensual" id="mensual_radio1" value="CLARITI 1 DAY" class="option-input radio" style="top: 0;">
											</div>
						      			</div>
						      			<div class="col-sm-3">
						      				<span class="badge badge-secondary">Biofinity XR</span>
											<div class="row">
												<input type="radio" name="mensual" id="mensual_radio2" value="DAILIES AQUA" class="option-input radio" style="top: 0;">
											</div>
						      			</div>
						      			<div class="col-sm-3">
						      				<span class="badge badge-secondary">Biomedics Now</span>
											<div class="row">
												<input type="radio" name="mensual" id="mensual_radio3" value="DAILIES AQUA" class="option-input radio" style="top: 0;">
											</div>
						      			</div>
						      			<div class="col-sm-3">
						      				<span class="badge badge-secondary">O2 Optix</span>
											<div class="row">
												<input type="radio" name="mensual" id="mensual_radio4" value="DAILIES AQUA" class="option-input radio" style="top: 0;">
											</div>
						      			</div>
						      		</div>
						      		<br>
			      					<div class="row text-center">
						      			<div class="col-sm-3">
						      				<span class="badge badge-secondary">Air Optix Aqua</span>
											<div class="row">
												<input type="radio" name="mensual" id="mensual_radio5" value="CLARITI 1 DAY" class="option-input radio" style="top: 0;">
											</div>
						      			</div>
						      			<div class="col-sm-3">
						      				<span class="badge badge-secondary">Night & Day Aqua</span>
											<div class="row">
												<input type="radio" name="mensual" id="mensual_radio6" value="DAILIES AQUA" class="option-input radio" style="top: 0;">
											</div>
						      			</div>
						      			<div class="col-sm-3">
						      				<span class="badge badge-secondary">Pure Vision 2</span>
											<div class="row">
												<input type="radio" name="mensual" id="mensual_radio7" value="DAILIES AQUA" class="option-input radio" style="top: 0;">
											</div>
						      			</div>
						      			<div class="col-sm-3">
						      				<span class="badge badge-secondary">Acuvue Oasys</span>
											<div class="row">
												<input type="radio" name="mensual" id="mensual_radio8" value="DAILIES AQUA" class="option-input radio" style="top: 0;">
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
						      				<span class="badge badge-secondary">Clariti 1 day toric</span>
											<div class="row">
												<input type="radio" name="diario_torico" id="diario_torico_radio1" value="CLARITI 1 DAY" class="option-input radio" style="top: 0;">
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
												<input type="radio" name="mensual_torico" id="mensual_torico_radio1" value="CLARITI 1 DAY" class="option-input radio" style="top: 0;">
											</div>
						      			</div>
						      			<div class="col-sm-3">
						      				<span class="badge badge-secondary">Biofinity toric XR</span>
											<div class="row">
												<input type="radio" name="mensual_torico" id="mensual_torico_radio2" value="DAILIES AQUA" class="option-input radio" style="top: 0;">
											</div>
						      			</div>
						      			<div class="col-sm-3">
						      				<span class="badge badge-secondary">Air optics for astigmatism</span>
											<div class="row">
												<input type="radio" name="mensual_torico" id="mensual_torico_radio3" value="DAILIES AQUA" class="option-input radio" style="top: 0;">
											</div>
						      			</div>
						      			<div class="col-sm-3">
						      				<span class="badge badge-secondary">Acuvue Oasys toric</span>
											<div class="row">
												<input type="radio" name="mensual_torico" id="mensual_torico_radio4" value="DAILIES AQUA" class="option-input radio" style="top: 0;">
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

<script type="text/javascript">
	
	var flag1 = flag2 = flag3 = flag4 = flag5 = flag4t = flag5t = false;
	function cargar() {

		if(flag1) {
     		$("#tipo_lentec").prop('value', '');
      		document.getElementById('categoria').style.display = 'none';
      		flag1 = false;
	    }
	    if(flag2) {
     		$("#tipo_categoria").prop('value', '');
      		document.getElementById('cosmetico').style.display = 'none';
      		document.getElementById('esferico').style.display = 'none';
      		document.getElementById('torico').style.display = 'none';
      		flag2 = false;
	    }
	    if(flag3) {
     		$("#tipo_esferico").prop('value', '');
     		$("#tipo_torico").prop('value', '');
     		$("#cosmetico_radio1").prop('checked', false);
     		$("#cosmetico_radio2").prop('checked', false);
     		$("#cosmetico_radio3").prop('checked', false);
	      	document.getElementById('desechable').style.display = 'none';
	      	document.getElementById('anual').style.display = 'none';
	      	document.getElementById('importado').style.display = 'none';
	      	flag3 = false;
	    }
	    if(flag4) {
     		$("#desechable_radio1").prop('checked', false);
     		$("#desechable_radio2").prop('checked', false);
     		$("#anual_radio").prop('checked', false);
      		document.getElementById('diario').style.display = 'none';
      		document.getElementById('mensual').style.display = 'none';
	      	flag4 = false;
	    }
	    if(flag5) {
     		$("#diario_radio1").prop('checked', false);
     		$("#diario_radio2").prop('checked', false);
     		$("#mensual_radio1").prop('checked', false);
     		$("#mensual_radio2").prop('checked', false);
     		$("#mensual_radio3").prop('checked', false);
     		$("#mensual_radio4").prop('checked', false);
     		$("#mensual_radio5").prop('checked', false);
     		$("#mensual_radio6").prop('checked', false);
     		$("#mensual_radio7").prop('checked', false);
     		$("#mensual_radio8").prop('checked', false);
	      	flag5 = false;
	    }
	    if(flag4t) {
     		$("#importado_radio1").prop('checked', false);
     		$("#importado_radio2").prop('checked', false);
      		document.getElementById('diario_torico').style.display = 'none';
      		document.getElementById('mensual_torico').style.display = 'none';
	      	flag4t = false;
	    }
	    if(flag5t) {
     		$("#diario_torico_radio1").prop('checked', false);
     		$("#diario_torico_radio2").prop('checked', false);
     		$("#mensual_torico_radio1").prop('checked', false);
     		$("#mensual_torico_radio2").prop('checked', false);
     		$("#mensual_torico_radio3").prop('checked', false);
     		$("#mensual_torico_radio4").prop('checked', false);
	      	flag5t = false;
	    }

		// TIPO DE ANTEOJOS
		$('[name="tipo_anteojo"]').change(function() {
			flag1 = true;
			flag2 = true;
	      	flag3 = true;
      		flag4 = true;
      		flag5 = true;
      		flag4t = true;
      		flag5t = true;
		});
		$('#anteojo_radio1').change(function() {
      		document.getElementById('armazon').style.display = 'block';
	      	document.getElementById('contacto').style.display = 'none';
     	});
		$('#anteojo_radio2').change(function() {
      		document.getElementById('armazon').style.display = 'none';
	      	document.getElementById('contacto').style.display = 'block';
     	});
		$('#anteojo_radio3').change(function() {
      		document.getElementById('armazon').style.display = 'block';
	      	document.getElementById('contacto').style.display = 'block';
     	});

		// TIPO DE LENTES DE CONTACTO
		$("#tipo_lentec").change(function() {
      		var tipo = document.getElementById("tipo_lentec").value;
      		if(tipo != "") {
	      		document.getElementById('categoria').style.display = 'block';
      		} else {
	      		document.getElementById('categoria').style.display = 'none';
      		}
	      	flag2 = true;
	      	flag3 = true;
      		flag4 = true;
      		flag5 = true;
      		flag4 = true;
      		flag5 = true;
      		flag4t = true;
      		flag5t = true;
      	});

     	// TIPO DE CATEGORÍA
     	$("#tipo_categoria").change(function() {
      		var tipo = document.getElementById("tipo_categoria").value;
      		if(tipo == "COSMÉTICO") {
	      		document.getElementById('cosmetico').style.display = 'block';
	      		document.getElementById('esferico').style.display = 'none';
	      		document.getElementById('torico').style.display = 'none';
	      		document.getElementById('multifocal').style.display = 'none';
      		} else if(tipo == "ESFÉRICO") {
	      		document.getElementById('cosmetico').style.display = 'none';
	      		document.getElementById('esferico').style.display = 'block';
	      		document.getElementById('torico').style.display = 'none';
	      		document.getElementById('multifocal').style.display = 'none';
      		} else if(tipo == "TÓRICO") {
	      		document.getElementById('cosmetico').style.display = 'none';
	      		document.getElementById('esferico').style.display = 'none';
	      		document.getElementById('torico').style.display = 'block';
	      		document.getElementById('multifocal').style.display = 'none';
      		} else if(tipo == "MULTIFOCALES") {
	      		document.getElementById('cosmetico').style.display = 'none';
	      		document.getElementById('esferico').style.display = 'none';
	      		document.getElementById('torico').style.display = 'none';
	      		document.getElementById('multifocal').style.display = 'block';
      		} else {
	      		document.getElementById('cosmetico').style.display = 'none';
	      		document.getElementById('esferico').style.display = 'none';
	      		document.getElementById('torico').style.display = 'none';
	      		document.getElementById('multifocal').style.display = 'none';
      		}
	      	flag3 = true;
      		flag4 = true;
      		flag5 = true;
      		flag4t = true;
      		flag5t = true;
		});

     	// TIPO DE ESFÉRICO
		$("#tipo_esferico").change(function() {
      		var tipo = document.getElementById("tipo_esferico").value;
      		if(tipo == "DESECHABLES") {
	      		document.getElementById('desechable').style.display = 'block';
	      		document.getElementById('anual').style.display = 'none';
      		} else if(tipo == "ANUALES") {
	      		document.getElementById('desechable').style.display = 'none';
	      		document.getElementById('anual').style.display = 'block';
      		} else {
	      		document.getElementById('desechable').style.display = 'none';
	      		document.getElementById('anual').style.display = 'none';
      		}
      		flag4 = true;
      		flag5 = true;
      		flag4t = true;
      		flag5t = true;
		});

		// TIPO DE DESECHABLE
		$('[name="tipo_desechable"]').change(function() {
	      	flag5 = true;
      		flag5t = true;
		});
		$('#desechable_radio1').change(function() {
      		document.getElementById('diario').style.display = 'block';
	      	document.getElementById('mensual').style.display = 'none';
     	});
		$('#desechable_radio2').change(function() {
      		document.getElementById('diario').style.display = 'none';
	      	document.getElementById('mensual').style.display = 'block';
     	});

     	// TIPO DE TÓRICO
		$("#tipo_torico").change(function() {
      		var tipo = document.getElementById("tipo_torico").value;
      		if(tipo == "IMPORTADO") {
	      		document.getElementById('importado').style.display = 'block';
      		} else {
	      		document.getElementById('importado').style.display = 'none';
      		}
      		flag4 = true;
      		flag5 = true;
      		flag4t = true;
      		flag5t = true;
		});

		// TIPO DE IMPORTADO
		$('[name="tipo_importado"]').change(function() {
	      	flag5 = true;
      		flag5t = true;
		});
		$('#importado_radio1').change(function() {
      		document.getElementById('diario_torico').style.display = 'block';
	      	document.getElementById('mensual_torico').style.display = 'none';
     	});
		$('#importado_radio2').change(function() {
      		document.getElementById('diario_torico').style.display = 'none';
	      	document.getElementById('mensual_torico').style.display = 'block';
     	});

	}

	$(document).ready(function() {
		cargar();
		$(document).change(function() {
			cargar();
		});
	});
</script>
	
@endsection