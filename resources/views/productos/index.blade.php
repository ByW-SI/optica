@extends('layouts.blank')
@section('content')

<script type="text/javascript" src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js"></script>

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
						<button onclick="buscar()" class="btn btn-default btn-block"><i class="fa fa-search"></i></button>
					</div>
				</div>
				<div id="productos">
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
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

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
	
	function buscar() {
		var val = $('#buscador').val();
		var sec = $('#seccion').val();
		$.ajax({
			url : "buscarProducto",
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