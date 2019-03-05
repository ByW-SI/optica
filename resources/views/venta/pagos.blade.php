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
						<input type="hidden" name="productos_id" value="{{ $productos }}">
						@foreach ($datos_form as $dato)
							<input type="hidden" name="datos_form[]" value="{{ $dato }}">
						@endforeach

						<div class="row">
							<div class="form-group col-sm-3">
								<label class="control-label">
									Total a pagar
								</label>
								@if(isset($datos_form['falta']))
									<input class="form-control" type="text" name="total_pago" id="total_pago" readonly="" value="{{ $datos_form['falta'] }}">
								@else
									<input class="form-control" type="text" name="total_pago" id="total_pago" readonly="" value="{{ "0" }}">
								@endif
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">
									Forma de pago
								</label>
								<select class="form-control" name="forma_pago" id="forma_pago">
									<option value="TC">Tarjeta de crédito/débito</option>
									<option value="efectivo">Efectivo</option>
									<option value="transferencia">Transferencia</option>
								</select>
							</div>
						</div>
						<div class="row" id="tc" style="display: none;">
							<div class="form-group col-sm-3">
								<label class="control-label">
									Número de tarjeta
								</label>
								<input type="text" name="num_tarjeta" class="form-control">
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
									@foreach($bancos as $banco)
										<option value="{{ $banco->nombre }}">{{ $banco->nombre }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label">
									Ultimos 4 digitos Tarjeta
								</label>
								<input type="text" name="digitos" class="form-control">
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
								<button type="submit" class="btn btn-success">Pagar</button>								
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
					if (isNaN(monto)) {
						$('#saldo_TC').val(total.toString());
					} 
					else {
						$('#saldo_TC').val((total - monto).toString());	
					}
				}
				else if (option === "efectivo") {
					$('#trans').hide();
					$('#tc').hide();
					$('#ef').show();
					if (isNaN(monto_ef)) {
						$('#saldo_EF').val(total.toString());
					} 
					else {
						$('#saldo_EF').val((total - monto_ef).toString());
					}
				} else {
					$('#ef').hide();
					$('#tc').hide();
					$('#trans').show();
					if (isNaN(monto_trans)) {
						$('#saldo_TRANS').val(total.toString());
					} 
					else {
						$('#saldo_TRANS').val((total - monto_trans).toString());
					}
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