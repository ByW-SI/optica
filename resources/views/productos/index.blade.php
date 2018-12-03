@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Productos:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-success" href="{{ route('productos.create')}}">
							<i class="fa fa-plus"></i><strong> Agregar Producto</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						@if(count($productos) > 0)
							<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
								<tr class="info">
									<th>SKU</th>
									<th>SKU Interno</th>
									<th>Sección</th>
									<th>Descripción</th>
									<th>Acciones</th>
								</tr>
								@foreach ($productos as $producto)
									<tr>
										<td>{{ $producto->sku }}</td>
										<td>{{ $producto->sku_interno }}</td>
										<td>{{ strtoupper($producto->seccion) }}</td>
										<td>{{ $producto->descripcion }}</td>
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
						@else
							<h4>Aún no hay productos agregados.</h4>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection