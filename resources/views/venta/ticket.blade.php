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
			    <p>Nombre del cliente: {{ $paciente->nombre.' '.$paciente->appaterno.' '.$paciente->apmaterno }} </p>
			    <div class="row">
			    	<table class="table table-bordered">
			    		<thead>
			    			<tr>
			    				<th>Cantidad</th>
			    				<th>Descripción</th>
								<th>Precio</th>
								<th>Importe</th>
			    			</tr>
			    		</thead>
			    		<tbody>
			    			@foreach($ventas->productos as $producto)
			    			<tr>
			    				<td>{{ $producto->pivot->cantidad }}</td>
			    				<td>{{ $producto->descripcion }}</td>
			    				<td>{{ $producto->precio['precio'] }}</td>
			    				<td>{{ $producto->precio['precio'] * $producto->pivot->cantidad }}</td>
			    			</tr>
			    			@endforeach
			    		</tbody>
			    	</table>
			    	<div class="panel-heading">
		              <div class="col-xs-3">
		                <p>Quedo a sus ordenes: </p>
		              </div>
		              <div class="col-xs-offset-3 col-xs-6">
		                <p>
		                  <strong>Empleado</strong>
		                </p>
		                <p>
		                  <strong>Ventas</strong>
		                </p>
		              </div>
		            </div>
			    </div>
			  </div>
			</div>
		</div>
	</body>
@endsection