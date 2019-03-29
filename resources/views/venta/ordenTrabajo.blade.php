@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Generar orden de trabajo:</h4>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<form role="form" method="POST" action="{{ url('guardar-orden') }}" id="orden">
				{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-12">
							@if(isset($datos))		
								<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0;">
									<tr class="info">
										<th>seleccionar</th>
										<th>Producto</th>
										<th>SKU</th>
										<th>Cantidad</th>
										<th>Descuento</th>
										<input type="hidden" name="id_venta" value="{{ $datos->id }}">
										<input type="hidden" name="fecha_entrega" value="{{ $datos->fecha_entrega}}">
										<input type="hidden" name="fecha_generacion" value="{{ $datos->fecha_venta }}">
									</tr>
									@foreach($datos->productos as $producto)
										<tr>
											<td>
												<input type="checkbox" name="sel[]" class="control-label" value="{{ $producto->id }}">
											</td>
											<td>{{ $producto->descripcion }}</td>
											<td>
												@if(isset($producto->sku_interno) )
													{{ $producto->sku_interno }}
												@else
													Sin SKU
												@endif
											</td>
											<td>
												{{ $producto->pivot->cantidad }}
												<input type="hidden" name="cantidad[]" value="{{ $producto->pivot->cantidad }}">
											</td>
											<td>
												@if(isset($datos->monto_convenio ))
													{{ $datos->monto_convenio }}
													<input type="hidden" name="descuento[]" value="{{ $datos->monto_convenio }}">
												@else
													Sin descuento
												@endif
											</td>
										</tr>
									@endforeach
								</table>
							@else
								<h4>No se agregaron productos</h4>
							@endif
						</div>
					</div>
					<br><br>
					<div class="row">
						<div class="col-sm-offset-4 col-sm-4 text-center">
							<button type="submit" class="btn btn-success">
								<strong> Continuar</strong>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
@section('script')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">

	$(document).ready(function() {
		w = window.open('{{ url('ticket-venta') }}', '_blank');
	});
/*
	$("#orden").on('submit', function(evt){
	    evt.preventDefault();  
	    var datos = new Array();
	    var tabla = new Array();
	    var inputs = $('#orden input[type=checkbox]');
	    for (var i = 0; i < inputs.length; i++) {
	    	datos[datos.length] = inputs[i].parentElement.parentElement.children;
	    }
	    for (var i = 0; i < datos.length; i++) {
	    	for (var j = 1; j < datos[i].length; j++) {
	    		tabla[tabla.length] = datos[i][j].textContent.trim();
	    	}
	    	datos[i] = JSON.stringify(tabla);
	    	tabla = new Array();
		}

	    console.log(datos);
	    console.log(JSON.parse(datos[0]));

	    $.ajax({
			url : "guardar-orden",
			type : "POST",
			dataType : "json",
			data : {
				productos : datos,
			},
		}).done(function(data) {
			console.log(data);
		}).fail(function(data){
			console.log(data);
		});	
	 });
	 */
	
</script>
@endsection