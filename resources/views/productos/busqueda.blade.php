@if(count($productos) > 0)
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
				<tr class="info">
					<th>SKU Interno</th>
					<th>Sección</th>
					<th>Descripción</th>
					<th>Foto</th>
					<th>Acciones</th>
				</tr>
				@foreach ($productos as $producto)
					<tr>
						<td>{{ $producto->sku_interno }}</td>
						<td>{{ strtoupper($producto->seccion) }}</td>
						<td>{{ $producto->descripcion }}</td>
						<td class="text-center"><img src="{{ $producto->foto1 ? 'storage/' . $producto->foto1 : 'https://pbs.twimg.com/profile_images/425274582581264384/X3QXBN8C.jpeg' }}" width="150" height="auto"></td>
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