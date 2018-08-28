@extends('layouts.test')
@section('content1')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-body" style="border: solid #a0a0a0;">
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
							id="armazon_radio1" required>
						</div>
					</div>	
					<div class="col-sm-4">
						<label class="control-label">Lentes de Contacto</label>
						<div class="row">
							<input type="radio" name="tipo_anteojo" value="LENTES DE CONTACTO" class="option-input radio" style="top: 0;" 
							id="armazon_radio2" required>
						</div>
					</div>
					<div class="col-sm-4">
						<label class="control-label">Ambos</label>
						<div class="row">
							<input type="radio" name="tipo_anteojo" value="AMBOS" class="option-input radio" style="top: 0;" 
							id="armazon_radio3" required>
						</div>
					</div>
				</div>
				<div class="row" id="cont-tipo">
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var $flag = false;

	$(document).ready(function() {

		$('[name="tipo_anteojo"]').change(function() {

			if($flag) {
				$('#cont-tipo').remove('');
				$flag = false;
			}

			$('#armazon_radio1').change(function() {
				$('#cont-tipo').append(
					"<div class='col-sm-12'>"
					+ ""
				);
				flag = true;
	     	});

			$('#armazon_radio2').change(function() {
				
	     	});

			$('#armazon_radio3').change(function() {
				
	     	});

     	});

	});
</script>

@endsection