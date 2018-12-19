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
					<div class="col-sm-3 col-sm-offset-1 form-group">
						<input type="text" id="buscador" class="form-control" placeholder="SKU" autofocus>
					</div>
					<div class="col-sm-3 form-group">
						<input type="number" id="min" class="form-control" placeholder="Mínimo" step="0.01" min="0">
					</div>
					<div class="col-sm-3 form-group">
						<input type="number" id="max" class="form-control" placeholder="Máximo" step="0.01" min="0">
					</div>
					<div class="col-sm-1 form-group">
						<a onclick="buscar()" class="btn btn-default btn-block"><i class="fa fa-search"></i></a>
					</div>
				</div>
				<div id="precios">
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
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	
	function buscar() {
		var val = $('#buscador').val();
		var min = $('#min').val();
		var max = $('#max').val();
		$.ajax({
			url : "buscarPrecio",
			type : "GET",
			dataType : "html",
			data : {
				query : val,
				min : min,
				max : max
			},
		}).done(function(res) {
			$("#precios").html(res);
		});
	}
	
</script>

@endsection