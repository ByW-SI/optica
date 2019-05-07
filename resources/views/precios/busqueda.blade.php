@if(count($precios) > 0)
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
				<tr class="info">
					<th class="col-sm-3">SKU</th>
					<th class="col-sm-3">Precio</th>
					<th class="col-sm-3">Fecha</th>
					<th class="col-sm-3">Acción</th>
				</tr>
				@foreach($precios as $precio)
					<tr>
						<td>{{ $precio->producto->sku_interno }}</td>
						<td>${{ $precio->precio }}</td>
						<td>{{ $precio->updated_at }}</td>
						<td class="text-center">
							<a class="btn btn-primary btn-sm" href="{{ route('productos.show', ['producto' => $precio->producto]) }}">
								<i class="fa fa-eye"></i> Ver
							</a>
							<a class="btn btn-warning btn-sm" href="{{ route('precios.edit', ['precio' => $precio]) }}">
								<i class="fa fa-pencil"></i> Editar
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
			<h4>No hay precios disponibles.</h4>
		</div>
	</div>
@endif