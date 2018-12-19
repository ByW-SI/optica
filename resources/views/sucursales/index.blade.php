@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Sucursales:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-success" href="{{ route('sucursales.create') }}">
							<i class="fa fa-plus"></i><strong> Agregar Sucursal</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						@if(count($sucursales) > 0)
							<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
								<tr class="info">
									<th>ID</th>
									<th>Nombre</th>
									<th>Responsable</th>
									<th>Región</th>
									<th>Estado</th>
									<th>Acciones</th>
								</tr>
								@foreach($sucursales as $sucursal)
				                   	<tr>
										<td>{{ $sucursal->claveid }}</td>
										<td>{{ $sucursal->nombre }}</td>
										<td>{{ $sucursal->responsable }}</td>
										<td>{{ $sucursal->region }}</td>
										<td>{{ $sucursal->estado }}</td>
										<td class="text-center">
											<a class="btn btn-primary btn-sm" href="{{ route('sucursales.show', ['sucursal' => $sucursal]) }}">
												<i class="fa fa-eye"></i> Ver
											</a>
											<a class="btn btn-warning btn-sm" href="{{ route('sucursales.edit', ['sucursal' => $sucursal->id]) }}">
												<i class="fa fa-pencil"></i> Editar
											</a>
										</td>
									</tr>
								@endforeach
							</table>
						@else
							<h4>No hay sucursales disponibles.</h4>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection



