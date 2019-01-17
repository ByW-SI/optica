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
					<div class="col-sm-4 col-sm-offset-1 form-group">
						<input type="text" id="buscador" class="form-control" placeholder="SKU" autofocus>
					</div>
					<div class="col-sm-4 form-group">
						<select id="sucursal" class="form-control">
							<option value="">Seleccionar</option>
							@foreach($sucursales as $sucursal)
								<option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-sm-1 form-group">
						<a onclick="buscar()" class="btn btn-default btn-block"><i class="fa fa-search"></i></a>
					</div>
				</div>
				<div id="inventarios">
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
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	function buscar() {
		var val = $('#buscador').val();
		var suc = $('#sucursal').val();
		$.ajax({
			url : "buscarInventario",
			type : "GET",
			dataType : "html",
			data : {
				query : val,
				sucursal : suc
			},
		}).done(function(res) {
			$("#inventarios").html(res);
		});
	}

</script>

@endsection