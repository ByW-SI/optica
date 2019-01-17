@if(count($productos) > 0)
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
				<tr class="info">
					<th>SKU Interno</th>
					<th class="col-sm-1">Sección</th>
					<th class="col-sm-3">Descripción</th>
					<th class="col-sm-2">Foto</th>
					<th class="col-sm-2">Acciones</th>
				</tr>
				@foreach ($productos as $producto)
					<tr>
						<td class="text-center" style="vertical-align: middle;"><svg id="producto{{ $producto->id }}"></svg></td>
						<td>{{ strtoupper($producto->seccion) }}</td>
						<td>{{ $producto->descripcion }}</td>
						<td class="text-center"><img src="{{ $producto->foto1 ? 'storage/' . $producto->foto1 : 'https://www.mayline.com/products/images/product/noimage.jpg' }}" width="150" height="auto"></td>
						<td class="text-center">
							<a class="btn btn-primary btn-sm" href="{{ route('productos.show', ['producto' => $producto]) }}">
								<i class="fa fa-eye"></i> <strong>Ver</strong>
							</a>
							<a class="btn btn-warning btn-sm" href="{{ route('productos.edit', ['producto' => $producto]) }}">
								<i class="fa fa-pencil-square-o"></i> <strong>Editar</strong>
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
			<h4>Aún no hay productos agregados.</h4>
		</div>
	</div>
@endif

<script>
	
	$( document ).ready(function() {
		@foreach($productos as $producto)
			JsBarcode(
				"#producto{{ $producto->id }}",
				"{{ $producto->sku_interno }}",
				{
					width: 1,
					height: 40,
					fontSize: 12
				}
			);
		@endforeach
	});

</script>