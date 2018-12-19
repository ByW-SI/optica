@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos del Precio:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('precios.index') }}" class="btn btn-primary">
							<i class="fa fa-bars"></i><strong> Lista de Precios</strong>
						</a>
					</div>
				</div>
			</div>
			<form method="POST" action="{{ route('precios.store') }}">
				{{ csrf_field() }}
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-1 form-group">
							<input type="text" id="buscador" class="form-control" placeholder="SKU/Descripción..." autofocus>
						</div>
						<div class="col-sm-4 form-group">
							<select id="seccion" class="form-control">
								<option value="">Seleccionar</option>
								<option value="ortopedia">Ortopedia</option>
								<option value="micas">Micas</option>
								<option value="armazones">Armazones</option>
								<option value="generales">General</option>
							</select>
						</div>
						<div class="col-sm-1 form-group">
							<a onclick="buscar()" class="btn btn-default btn-block"><i class="fa fa-search"></i></a>
						</div>
					</div>
					<div id="productos">
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
												<td>{{ $producto->sku_interno }}</td>
												<td>{{ strtoupper($producto->seccion) }}</td>
												<td>{{ $producto->descripcion }}</td>
												<td class="text-center">
													<input type="radio" name="producto_id" value="{{ $producto->id }}" required="">
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
					</div>
					<div class="row">
						<div class="form-group col-sm-4 col-sm-offset-4">
							<label class="control-label">✱Precio:</label>
							<input type="number" name="precio" step="0.01" min="0" class="form-control">
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-4 text-center">
			  				<button type="submit" class="btn btn-success">
				  				<i class="fa fa-check-circle"></i> Guardar
				  			</button>
						</div>
						<div class="col-sm-4 text-right text-danger">
							<h5>✱Campos Requeridos</h5>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">

	function buscar() {
		var val = $('#buscador').val();
		var sec = $('#seccion').val();
		$.ajax({
			url : "../buscarProducto3",
			type : "GET",
			dataType : "html",
			data : {
				query : val,
				seccion : sec
			},
		}).done(function(res) {
			$("#productos").html(res);
		});
	}

</script>

@endsection