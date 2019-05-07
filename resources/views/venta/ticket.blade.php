@extends('layouts.pdf')
@section('content')
<body>
		<div class="row-fluid">
			<div class="row">
				<table class="table">
					<td class="col-sm-3" align="center">
						<img class="pequeña center-block" src="images/logo.png">
					</td>
				</table>
			</div>
			<div class="row">
				<div class="col-sm-6">ÓPTICA ORTOGLER S.A. DE C.V.</div>
				<div class="col-sm-6">R.F.C. OOG-090623-4B6</div>
				<div class="col-sm-3">Sucursal: {{ $sucursal->nombre }}</div>
			</div>
			<div class="row">
				<div class="col-sm-12">{{'Calle '.$sucursal->calle.' No '.$sucursal->numext.' Colonia '.$sucursal->colonia.', '.$sucursal->ciudad.' '.$sucursal->estado}}</div>
			</div>
			<div class="panel panel-default">
			  <div class="panel-heading">
			  	Fecha: {{date('d-m-Y')}} Hora: {{ date('h:i:s A') }}
			  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No. Ticket: {{ $ventas->numero_venta }}
			  </div>
			  <div class="panel-body">
			    <div class="row">
			    	<div class="col-xs-6">
			    		Nombre del cliente: {{ $paciente->nombre.' '.$paciente->appaterno.' '.$paciente->apmaterno }}
			    	</div>
			    	@if($ventas->forma_pago === "TC")
			    		<div class="col-xs-3">Método de Pago: Tarjeta de Crédito / Debito</div>
			    	@elseif ($ventas->forma_pago === "transferencia")
			    		<div class="col-xs-3">Método de Pago: Transferencia</div>
			    	@else
			    		<div class="col-xs-3">Método de Pago: Efectivo</div>
			    	@endif
			    </div>
			    <div class="row">
			    	<table class="table table-bordered">
			    		<thead>
			    			<tr>
			    				<th class="col-">Cantidad</th>
			    				<th class="col-">Descripción</th>
								<th class="col-">Precio</th>
								<th class="col-">Importe</th>
			    			</tr>
			    		</thead>
			    		<tbody>
			    			@foreach($ventas->productos as $producto)
			    			<tr>
			    				<td align="center">{{ $producto->pivot->cantidad }}</td>
			    				<td align="center">{{ $producto->descripcion }}</td>
			    				<td align="center">{{ $producto->precio['precio'] }}</td>
			    				<td align="center">{{ $producto->precio['precio'] * $producto->pivot->cantidad }}</td>
			    			</tr>
			    			@endforeach
			    			<tr>
								<td colspan="3" class="sinBordes"></td>
			    				<td><strong>Subtotal &nbsp;&nbsp;&nbsp;$ {{ $ventas->subtotal }}</strong></td>
			    			</tr>
			    			<tr>
			    				<td colspan="3" class="sinBordes"></td>
			    				<td><strong>IVA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$ {{ $ventas->total * 0.16 }}</strong></td>
			    			</tr>
			    			<tr>
			    				<td colspan="3" class="sinBordes"></td>
			    				<td><strong>Total &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$ {{ $ventas->total }}</strong></td>
			    			</tr>
			    			<tr>
			    				<td colspan="3" class="sinBordes"></td>
			    				<td><strong>Anticipo &nbsp;&nbsp;&nbsp;$ {{ $ventas->monto_pagar }}</strong></td>
			    			</tr>
			    			<tr>
			    				<td colspan="3" class="sinBordes"></td>
			    				<td><strong>Saldo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$ {{ $ventas->saldo }}</strong></td>
			    			</tr>
			    		</tbody>
			    	</table>
			    	@if($ventas->tipo_convenio === "convenio")
			    		<div class="panel-heading">
							<div class="col-xs-3">
								Convenio: {{ $ventas->convenio }}
							</div>
							<div class="col-xs-3">
								No. tramites: {{ $ventas->cantidad_tramites }}
							</div>
							<div class="col-xs-4">
								No. Autorización: {{ $ventas->numero_autorizacion }}
							</div>
			            </div>
			    	@endif
			    </div>
			    <div class="row">
			    	<div class="col-xs-offset-4">
			    		<?php  echo ($barra); ?>
			    	</div>
			    </div>
			  </div>
			</div>
		</div>
	</body>
@endsection