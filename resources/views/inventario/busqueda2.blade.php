@if(count($productos) > 0)
	<div class="row">
		<div class="form-group col-sm-12">
			✱Seleccione un producto:
			<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
				<tr class="info">
					<th class="col-sm-3">SKU Interno</th>
					<th class="col-sm-3">Sección</th>
					<th class="col-sm-3">Descripción</th>
					<th class="col-sm-3">Seleccionar</th>
				</tr>
				@foreach ($productos as $producto)
					<tr>
						<td>{{ $producto->sku_interno }}"></td>
						<td>{{ strtoupper($producto->seccion) }}</td>
						<td>{{ $producto->descripcion }}</td>
						<td class="text-center">
							<input type="radio" name="producto_id" value="{{ $producto->id }}">
						</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
@else
	<div class="row">
		<div class="form-group col-sm-12">
			<h4>No hay productos disponibles.</h4>
		</div>
	</div>
@endif