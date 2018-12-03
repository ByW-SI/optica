@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Precios:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('precios.create') }}" class="btn btn-success">
							<i class="fa fa-plus"></i><strong> Agregar Precio</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						@if(count($precios) > 0)
							<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
								<tr class="info">
									<th>SKU</th>
									<th>Precio</th>
									<th>Fecha</th>
									<th>Acción</th>
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
						@else
							<h4>Aún no hay precios disponibles.</h4>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection