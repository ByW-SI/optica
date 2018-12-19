@if(count($inventarios) > 0)
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
				<tr class="info">
					<th>SKU</th>
					<th>Sucursal</th>
					<th>Cantidad</th>
					<th>Fecha</th>
					<th>Acción</th>
				</tr>
				@foreach($inventarios as $inventario)
					<tr>
						<td>{{ $inventario->producto->sku_interno }}</td>
						<td>{{ $inventario->sucursal->nombre }}</td>
						<td>{{ $inventario->cantidad }}</td>
						<td>{{ $inventario->updated_at }}</td>
						<td class="text-center">
							<a class="btn btn-primary btn-sm" href="{{ route('productos.show', ['producto' => $inventario->producto]) }}">
								<i class="fa fa-eye"></i> Ver
							</a>
							<a class="btn btn-success btn-sm" href="{{ route('inventarios.alta', ['inventario' => $inventario]) }}">
								<i class="fa fa-plus"></i> Alta
							</a>
							<a class="btn btn-danger btn-sm" href="{{ route('inventarios.baja', ['inventario' => $inventario]) }}">
								<i class="fa fa-times"></i> Baja
							</a>
						</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
@else
	<div class="row">
		<div class="col-sm-12">
			<h4>No hay inventarios disponibles.</h4>
		</div>
	</div>
@endif