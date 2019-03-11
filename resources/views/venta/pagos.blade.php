@extends('layouts.blank')
@section('content')

	<div class="container">
		<div class="panel pnale-group">
			<div class="panel-defautl">
				<div class="panel-heading">
					<div class="row">
						<div class="col-sm-4">
							<h4>Metodo de pago</h4>
						</div>
					</div>
				</div>
				<form role="form" method="POST" action="{{ url('pagar') }}">
					{{ csrf_field() }}
					<div class="panel-body">
						<div class="row">
							<div class="form-group col-sm-3">
								<label class="control-label">
									Total a pagar
								</label>
								@if(isset($datos_form->total_pagar))
									<input class="form-control" type="text" name="total_pago" id="total_pago" readonly="" value="{{ $datos_form->total_pagar }}">
								@else
									<input class="form-control" type="text" name="total_pago" id="total_pago" readonly="" value="{{ "0" }}">
								@endif
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">
									Forma de pago
								</label>
								<select class="form-control" name="forma_pago" id="forma_pago">
									<option value="">Seleccionar --</option>
									<option value="TC">Tarjeta de crédito/débito</option>
									<option value="efectivo">Efectivo</option>
									<option value="transferencia">Transferencia</option>
								</select>
							</div>
						</div>
						<div class="row" id="tc" style="display: none;">
							<div class="form-group col-sm-3">
								<label class="control-label">
									Ultimos 4 digitos Tarjeta
								</label>
								<input type="text" name="digitos" class="form-control" maxlength="4" pattern="[0-9]{4,4}" id="digitos" placeholder="3454">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">
									Nombre de Tarjetahabiente:
								</label>
								<input type="text" name="nombre_tarjetaH" class="form-control">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">
									Banco
								</label>
								<select class="form-control" name="banco_TC" id="banco_TC">
									<option>Seleccionar Banco</option>
									@foreach($bancos as $banco)
										<option value="{{ $banco->nombre }}">{{ $banco->nombre }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">
									Monto a pagar
								</label>
								<input type="text" name="monto_pagar_TC" class="form-control" id="monto_pagar_TC" onchange="setSaldo();">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">
									Número de Referencia
								</label>
								<input type="text" name="num_ref" class="form-control">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">
									Saldo
								</label>
								<input type="text" name="saldo_TC" class="form-control" readonly="" id="saldo_TC">
							</div>
						</div>

						<div class="row" id="ef" style="display: none;">
							<div class="form-group col-sm-3">
								<label class="control-label">
									Monto a pagar
								</label>
								<input type="text" name="monto_pagar_EF" class="form-control" id="monto_pagar_EF" onchange="setSaldo();">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">
									Saldo
								</label>
								<input type="text" name="saldo_EF" class="form-control" readonly="" id="saldo_EF">
							</div>
						</div>
						<div class="row" id="trans" style="display: none;">
							<div class="form-group col-sm-3">
								<label class="control-label">
									Banco
								</label>
								<select class="form-control" name="banco_TRANS" id="banco_TRANS">
									@foreach($bancos as $banco)
										<option value="{{ $banco->nombre }}">{{ $banco->nombre }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">
									Referencia
								</label>
								<input type="text" name="referencia" class="form-control">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">
									Fecha depósito
								</label>
								<input type="date" name="fecha_deposito" class="form-control">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">
									Monto a pagar
								</label>
								<input type="text" name="monto_pagar_TRANS" class="form-control" id="monto_pagar_TRANS" onchange="setSaldo();">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">
									Saldo
								</label>
								<input type="text" name="saldo_TRANS" class="form-control" readonly="" id="saldo_TRANS">
							</div>
						</div>

						<div class="row">
							<div class="form-group col-sm-3 text-center">
								<button type="submit" class="btn btn-success" disabled>Pagar</button>								
							</div>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>

@endsection
@section('script')

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript">
		$(function () {
			// body...
			$('#forma_pago').change(function(event) {
				var option = $('#forma_pago option:selected').val();
				var total = parseFloat($('#total_pago').val());
				var monto = parseFloat($('#monto_pagar_TC').val());
				var monto_ef = parseFloat($('#monto_pagar_EF').val());
				var monto_trans = parseFloat($('#monto_pagar_TRANS').val());
				if (option === "TC") {
					$('#trans').hide();
					$('#ef').hide();
					$('#tc').show();
					$('button[type=submit]').prop('disabled', false);
					if (isNaN(monto)) {
						$('#saldo_TC').val(total.toString());
					} 
					else {
						$('#saldo_TC').val((total - monto).toString());	
					}
					$('input[name=monto_pagar_TC]').attr('required', '');
					$('input[name=digitos]').attr('required', '');
					$('input[name=num_ref]').attr('required', '');

					$('input[name=monto_pagar_EF]').removeAttr('required');
					$('input[name=referencia]').removeAttr('required');
					$('input[name=fecha_deposito]').removeAttr('required');
					$('input[name=monto_pagar_TRANS]').removeAttr('required');
				}
				else if (option === "efectivo") {
					$('#trans').hide();
					$('#tc').hide();
					$('#ef').show();
					$('button[type=submit]').prop('disabled', false);
					if (isNaN(monto_ef)) {
						$('#saldo_EF').val(total.toString());
					} 
					else {
						$('#saldo_EF').val((total - monto_ef).toString());
					}
					$('input[name=monto_pagar_EF]').attr('required', '');

					$('input[name=monto_pagar_TC]').removeAttr('required');
					$('input[name=digitos]').removeAttr('required');
					$('input[name=num_ref]').removeAttr('required');
					$('input[name=referencia]').removeAttr('required');
					$('input[name=fecha_deposito]').removeAttr('required');
					$('input[name=monto_pagar_TRANS]').removeAttr('required');
				} 
				else if(option === "transferencia") {
					$('#ef').hide();
					$('#tc').hide();
					$('#trans').show();
					$('button[type=submit]').prop('disabled', false);
					if (isNaN(monto_trans)) {
						$('#saldo_TRANS').val(total.toString());
					} 
					else {
						$('#saldo_TRANS').val((total - monto_trans).toString());
					}
					$('input[name=referencia]').attr('required', '');
					$('input[name=fecha_deposito]').attr('required', '');
					$('input[name=monto_pagar_TRANS]').attr('required', '');

					$('input[name=monto_pagar_TC]').removeAttr('required');
					$('input[name=digitos]').removeAttr('required');
					$('input[name=num_ref]').removeAttr('required');
					$('input[name=monto_pagar_EF]').removeAttr('required');
				}
				else{
					$('#ef').hide();
					$('#tc').hide();
					$('#trans').hide();
					$('button[type=submit]').prop('disabled', true);

				}

			});

		});
		function setSaldo() {
			var option = $('#forma_pago option:selected').val();
			var total = parseFloat($('#total_pago').val(), 10);
			var monto = parseFloat($('#monto_pagar_TC').val(), 10);
			var monto_ef = parseFloat($('#monto_pagar_EF').val(), 10);
			var monto_trans = parseFloat($('#monto_pagar_TRANS').val(), 10);
			if (option === "TC") {
				if (isNaN(monto)) {
					$('#saldo_TC').val(total.toString());
				} 
				else {
					$('#saldo_TC').val((total - monto).toString());	
				}
			}
			else if (option === "efectivo") {
				if (isNaN(monto_ef)) {
					$('#saldo_EF').val(total.toString());
				} 
				else {
					$('#saldo_EF').val((total - monto_ef).toString());
				}
			}
			else {
				if (isNaN(monto_trans)) {
					$('#saldo_TRANS').val(total.toString());
				} 
				else {
					$('#saldo_TRANS').val((total - monto_trans).toString());
				}
			}
		}
	</script>

@endsection