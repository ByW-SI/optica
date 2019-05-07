@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Ventas:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-success" href="{{ route('ventas.create') }}">
							 <i class="fa fa-plus"></i><strong> Punto de Venta</strong> 
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
                    <div class="col-sm-4 form-group">
                        <label class="control-label">Desde:</label>
                        <input name="fechaD" type="date" class="form-control" id="desde">
                    </div>
                    <div class="col-sm-4 form-group">
                        <label class="control-label">Hasta:</label>
                        <input name="fechaH" type="date" class="form-control" id="hasta">
                    </div>
                    <div class="col-sm-4 form-group">
                        <label class="control-label">Sucursal:</label>
                        <div class="input-group">
                            <input type="text" id="buscador" class="form-control" autofocus placeholder="Sucursal">
                            <span class="input-group-btn">
                                <a class="btn btn-default" onclick="buscar()"><i class="fa fa-search"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
				<div class="row" id="ventas">
					<div class="col-sm-12">
						@if(count($ventas) > 0)
							<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;" id="tabla_productos">
								<tr class="info">
									<th>ID Venta</th>
									<th>Sucursal</th>
									<th>Fecha de venta</th>
									<th>No. de Productos</th>
									<th>Total</th>
									<th>Saldo</th>
									<th>Acciones</th>
								</tr>
								@foreach($ventas as $venta)
				                   	<tr>
										<td>{{ $venta->numero_venta }}</td>
										<td>{{ $venta->sucursal }}</td>
										<td>{{ $venta->fecha_venta }}</td>
										<?php 
											$cant = 0;
											foreach ($venta->Productos as $producto) {
												$cant += $producto->pivot->cantidad;
											}
											echo '<td align="center">'.$cant.'</td>';
										?>
										<td>{{ $venta->total }}</td>
										<td>{{ $venta->saldo }}</td>
										<td class="text-center">
											<a class="btn btn-primary btn-sm" href="{{ route('pago.show', ['venta' => $venta, 'id' => $venta->id]) }}">
												<i class="fa fa-eye"></i> Ver
											</a>
										</td>
									</tr>
								@endforeach
								<tr>
									<td colspan="4">Total de ventas</td>
									<td id="total" style="font-weight: bold;"></td>
									<td colspan="2"></td>
								</tr>
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
<script type="text/javascript">
    
    function buscar() {
        var desde = $('#desde').val();
        var hasta = $('#hasta').val();
        var buscador = $('#buscador').val();
        $.ajax({
            url : "{{ route('ventas.buscar') }}",
            type : "GET",
            dataType : "html",
            data : {
                desde : desde,
                hasta : hasta,
                query : buscador,
                selector : 1,
            },
        }).done(function(resultado){
            $("#ventas").html(resultado);
        }).fail(function(res){
        });
    }
    $(document).ready(function() {
    	var tabla = $('#tabla_productos tr');
    	var total_ventas = 0;
    	for (var i = 1; i < tabla.length- 1; i++) {
    		total_ventas += parseInt(tabla[i].cells[4].innerHTML);
    	}
    	$('#total').text(total_ventas);
    });

</script>
@endsection