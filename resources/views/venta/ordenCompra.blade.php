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
				<div class="row">
					<div class="col-sm-12">
						@if(isset($productos))
							<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0;">
								<tr class="info">
									<th>seleccionar</th>
									<th>Producto</th>
									<th>SKU</th>
									<th>Cantidad</th>
									<th>Descuento</th>
								</tr>
								@foreach($productos as $producto)
								@php
								$cont = 0;
								@endphp
									<tr>
										<td>
											<input type="checkbox" name="sel" class="control-label">
										</td>
										<td>{{ $producto->descripcion }}</td>
										<td>
											@if(isset($producto->sku_interno) )
												{{ $producto->sku_interno }}
											@else
												Sin descuento
											@endif
										</td>
										<td name="cantidad">{{ $cantidad[$cont] }}</td>
										@php
											$cont = $cont +1;
										@endphp
										<td>
											@if(isset($producto->descuento) )
												{{ $producto->sku_interno }}
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
					<div class="col-sm-offset-1 col-sm-4 text-center">
						<a class="btn btn-success" href="#">
							<strong> Imprimir Ticket</strong></a>
					</div>
					<div class="col-sm-offset-1 col-sm-4 text-center">
						<a class="btn btn-success" href="#">
							<strong>Generar Orden de trabajo</strong></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@section('script')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">
	$(function () {
		var cantidad =[
	    		@foreach ($cantidad as $c)
	    			{
	    				label:"{{ $c }}",
	    			},
	    		@endforeach
	    	];
		console.log($('tr')[ 2].cells[3]);
		for (var i = 0; i < cantidad.length; i++) {
			$('tr')[i + 1].cells[3].innerHTML = cantidad[i].label;
			console.log($('tr')[i + 1].cells[3].innerHTML);
		}
	});
</script>
@endsection