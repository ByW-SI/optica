@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-3">
						<h4>Datos de la Venta:</h4>
					</div>
					<div class="col-sm-3 text-center">
						<a class="btn btn-primary" href="{{ route('pago.index') }}">
							<i class="fa fa-bars"></i><strong> Lista de Ventas</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="nombre">Numero de venta:</label>
						<dd>{{ $venta->numero_venta }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="responsable">Sucursal:</label>
						<dd>{{ $venta->sucursal }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="claveid">Fecha de Venta:</label>
						<dd>{{ $venta->fecha_venta }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="region">Fecha de Entrega:</label>
    					<dd>{{ $venta->fecha_entrega }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="region">Vendedor:</label>
    					<dd>{{ $empleado->nombre }} {{ $empleado->appaterno }} {{ $empleado->apmaterno }}</dd>
					</div>
				</div>
			</div>
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos Relacionado con el paciente:</h4>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-sm-3">
    					<label class="control-label" for="calle">Paciente:</label>
    					<dd>{{ $paciente->nombre.' '.$paciente->appaterno.' '.$paciente->apmaterno}}</dd>
  					</div>
  					<div class="form-group col-sm-3">
    					<label class="control-label" for="numext">Identificador:</label>
    					<dd>{{ $venta->id_paciente}}</dd>
  					</div>
  					<div class="form-group col-sm-3">
    					<label class="control-label" for="numint">Tipo Convenio:</label>
    					<dd>{{ $venta->tipo_convenio }}</dd>
  					</div>
  					@if($venta->tipo_convenio === "convenio")
					<div class="form-group col-sm-3">
  						<label class="control-label" for="colonia">Numero de autorización:</label>
  						<dd>{{ $venta->numero_autorizacion }}</dd>
  					</div>
				</div>
				<div class="row">
  					<div class="form-group col-sm-3">
  						<label class="control-label" for="delegacion">Personal:</label>
  						<dd>{{ $venta->personal }}</dd>
  					</div>
  					<div class="form-group col-sm-3">
  						<label class="control-label" for="ciudad">Nombre Convenio:</label>
  						<dd>{{ $venta->convenio }}</dd>
  					</div>
  					<div class="form-group col-sm-3">
  						<label class="control-label" for="ciudad">Monto Convenio:</label>
  						<dd>{{ $venta->monto_convenio/$venta->cantidad_tramites }}</dd>
  					</div>
  					<div class="form-group col-sm-3">
  						<label class="control-label" for="ciudad">Número de trámites:</label>
  						<dd>{{ $venta->cantidad_tramites }}</dd>
  					</div>
  					@else
  				</div>
  				<div class="row">
  					@endif
  					<div class="form-group col-sm-3">
  						<label class="control-label" for="estado">Forma de Pago:</label>
  						@if($venta->forma_pago === "TC")
  							<dd>Tarjeta de Crédito/Débito</dd>
  						@elseif($venta->forma_pago === "transferencia")
  							<dd>Transferencia</dd>
  						@else
  							<dd>Efectivo</dd>
  						@endif
  					</div>
  					@if($venta->forma_pago === "TC")
  						<div class="form-group col-sm-3">
	  						<label class="control-label" for="calle1">Ultimos Digitos:</label>
	  						<dd>{{ $venta->ultimos_digitos}}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="calle1">Dueño de la Tarjeta:</label>
	  						<dd>{{ $venta->nombre_dueno_tarjeta }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="calle1">Banco:</label>
	  						<dd>{{ $venta->banco }}</dd>
	  					</div>
					@elseif($venta->forma_pago === "transferencia")
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="calle1">Banco:</label>
	  						<dd>{{ $venta->banco }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="calle1">Referencia:</label>
	  						<dd>{{ $venta->numero_referencia }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="calle1">Fecha del Deposito:</label>
	  						<dd>{{ $venta->fecha_deposito }}</dd>
	  					</div>
					@endif
				</div>
				<div class="row">
  					<div class="form-group col-sm-3">
  						<label class="control-label" for="calle2">Subtotal:</label>
  						<dd>{{ $venta->subtotal }}</dd>
  					</div>
  					<div class="form-group col-sm-3">
  						<label class="control-label" for="referencia">Total:</label>
  						<dd>{{ $venta->total }}</dd>
  					</div>
  					<div class="form-group col-sm-3">
  						<label class="control-label" for="referencia">Monto Pagado:</label>
  						<dd>{{ $venta->monto_pagar }}</dd>
  					</div>
  					<div class="form-group col-sm-3">
  						<label class="control-label" for="referencia">Saldo deudor:</label>
  						<dd>{{ $venta->saldo }}</dd>
  					</div>
  				</div>
  				<div class="row">
					<div class="col-sm-4">
						<h4>Productos Comprados:</h4>
					</div>
				</div>
  				<div class="row">
					<div class="col-sm-12">
						@if(count($venta->productos) > 0)
							<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
								<tr class="info">
									<th>SKU</th>
									<th>Descripcion</th>
									<th>Precio</th>
									<th>Cantidad</th>
									<th>Importe</th>
								</tr>
								@foreach($venta->productos as $producto)
				                   	<tr>
										<td>{{ $producto->sku_interno }}</td>
										<td>{{ $producto->descripcion }}</td>
										<td>{{ $producto->precio['precio'] }}</td>
										<td>{{ $producto->pivot->cantidad }}</td>
										<td>{{ $producto->pivot->cantidad * $producto->precio['precio']}}</td>
									</tr>
								@endforeach
							</table>
						@else
							<h4>No hay ventas disponibles.</h4>
						@endif
					</div>
				</div>
       		</div>
		</div>
	</div>
</div>

@endsection