@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Inventario:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('inventarios.create') }}" class="btn btn-success">
							<i class="fa fa-plus"></i><strong> Agregar Inventario</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						@if(count($inventarios) > 0)
							<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
								<tr class="info">
									<th>SKU</th>
									<th>Descripción</th>
									<th>Cantidad</th>
									<th>Fecha</th>
									<th>Acción</th>
								</tr>
								@foreach($inventarios as $inventario)
									<tr>
										<td>{{ $inventario->producto->sku_interno }}</td>
										<td>{{ $inventario->producto->descripcion }}</td>
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
						@else
							<h4>Aún no hay inventarios disponibles.</h4>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection