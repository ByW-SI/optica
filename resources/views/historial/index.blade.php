@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Historial:</h4>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						@if(count($historiales) > 0)
							<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
								<tr class="info">
									<th>SKU</th>
									<th>Fecha</th>
									<th>Tipo</th>
									<th>Descripción</th>
									<th>Acción</th>
								</tr>
								@foreach($productos as $producto)
									<tr>
										<td>{{ $producto->sku_interno }}</td>
										<td>{{ $producto->historiales->last()->created_at }}</td>
										<td>{{ $producto->historiales->last()->tipo }}</td>
										<td>{{ $producto->historiales->last()->descripcion }}</td>
										<td class="text-center">
											<a class="btn btn-primary btn-sm" href="{{ route('productos.show', ['producto' => $producto]) }}">
												<i class="fa fa-eye"></i> Ver
											</a>
										</td>
									</tr>
								@endforeach
							</table>
						@else
							<h4>Aún no hay historial disponible.</h4>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection