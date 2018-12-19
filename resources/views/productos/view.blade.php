@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-3">
						<h4>Datos del Producto:</h4>
					</div>
					<div class="col-sm-3 text-center">
						<a class="btn btn-warning" href="{{ route('productos.edit', ['producto' => $producto])}}">
							<i class="fa fa-pencil"></i><strong> Editar Producto</strong>
						</a>
					</div>
					<div class="col-sm-3 text-center">
						<a class="btn btn-success" href="{{ route('productos.create')}}">
							<i class="fa fa-plus"></i><strong> Agregar Producto</strong>
						</a>
					</div>
					<div class="col-sm-3 text-center">
						<a class="btn btn-primary" href="{{ route('productos.index')}}">
							<i class="fa fa-bars"></i><strong> Lista de Productos</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label">SKU:</label>
						<dd>{{ $producto->sku }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">SKU Interno:</label>
						<dd>{{ $producto->sku_interno }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">Negocio:</label>
						<dd>{{ $producto->negocio }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">Proveedor:</label>
						<dd>{{ $producto->provedor->nombre . ' ' . $producto->provedor->apellidopaterno }}{{ $producto->provedor->razonsocial }}</dd>
					</div>
					@isset($producto->producto)
						<div class="form-group col-sm-3">
							<label class="control-label">Producto:</label>
		  					<dd>{{ $producto->producto }}</dd>
						</div>
					@endif
					@isset($producto->producto_abr)
						<div class="form-group col-sm-3">
							<label class="control-label">Abreviatura:</label>
		  					<dd>{{ $producto->producto_abr }}</dd>
						</div>
					@endif
					@isset($producto->familia)
						<div class="form-group col-sm-3">
							<label class="control-label">Familia:</label>
		  					<dd>{{ $producto->familia }}</dd>
						</div>
					@endif
					@isset($producto->materiales)
						<div class="form-group col-sm-3">
							<label class="control-label">Materiales:</label>
		  					<dd>{{ $producto->materiales }}</dd>
						</div>
					@endif
					@isset($producto->materiales_abr)
						<div class="form-group col-sm-3">
							<label class="control-label">Abreviatura:</label>
		  					<dd>{{ $producto->materiales_abr }}</dd>
						</div>
					@endif
					@isset($producto->rangos)
						<div class="form-group col-sm-3">
							<label class="control-label">Rangos:</label>
		  					<dd>{{ $producto->rangos }}</dd>
						</div>
					@endif
					@isset($producto->marca)
						<div class="form-group col-sm-3">
							<label class="control-label">Marca:</label>
		  					<dd>{{ $producto->marca }}</dd>
						</div>
					@endif
					@isset($producto->marca_abr)
						<div class="form-group col-sm-3">
							<label class="control-label">Abreviatura:</label>
		  					<dd>{{ $producto->marca_abr }}</dd>
						</div>
					@endif
					@isset($producto->modelo)
						<div class="form-group col-sm-3">
							<label class="control-label">Modelo:</label>
		  					<dd>{{ $producto->modelo }}</dd>
						</div>
					@endif
					@isset($producto->modelo_abr)
						<div class="form-group col-sm-3">
							<label class="control-label">Abreviatura:</label>
		  					<dd>{{ $producto->modelo_abr }}</dd>
						</div>
					@endif
					@isset($producto->talla)
						<div class="form-group col-sm-3">
							<label class="control-label">Talla:</label>
		  					<dd>{{ $producto->talla }}</dd>
						</div>
					@endif
					<div class="form-group col-sm-3">
						<label class="control-label">Color:</label>
		  				<dd>{{ $producto->color }}</dd>
					</div>
					@isset($producto->color_abr)
						<div class="form-group col-sm-3">
							<label class="control-label">Abreviatura:</label>
		  					<dd>{{ $producto->color_abr }}</dd>
						</div>
					@endif
					@isset($producto->tratamiento)
						<div class="form-group col-sm-3">
							<label class="control-label">Tratamiento:</label>
		  					<dd>{{ $producto->tratamiento }}</dd>
						</div>
					@endif
					@isset($producto->tratamiento_abr)
						<div class="form-group col-sm-3">
							<label class="control-label">Abreviatura:</label>
		  					<dd>{{ $producto->tratamiento_abr }}</dd>
						</div>
					@endif
					@isset($producto->medidas)
						<div class="form-group col-sm-3">
							<label class="control-label">Medidas:</label>
		  					<dd>{{ $producto->medidas }}</dd>
						</div>
					@endif
					@isset($producto->medidas_abr)
						<div class="form-group col-sm-3">
							<label class="control-label">Medidas:</label>
		  					<dd>{{ $producto->medidas_abr }}</dd>
						</div>
					@endif
					<div class="form-group col-sm-3">
						<label class="control-label">Unidad:</label>
		  				<dd>{{ $producto->unidad }}</dd>
					</div>
					@isset($producto->renta)
						<div class="form-group col-sm-3">
							<label class="control-label">¿Para renta?</label>
							<dd>{{ $producto->renta == 'Sí' ? 'Sí' : 'No' }}</dd>
						</div>
					@endif
					<div class="form-group col-sm-3">
						<label class="control-label">Precio:</label>
						<dd>{{ $producto->precio ? '$' . $producto->precio->precio : 'No disponible.' }}</dd>
					</div>
				</div>
				<div class="col-sm-12 text-center">
					<div class="d-flex justify-content-between">
						<img src="{{ $producto->foto1 ? '../storage/' . $producto->foto1 : 'https://www.mayline.com/products/images/product/noimage.jpg'}}" width="300px" height="auto">
						<img src="{{ $producto->foto2 ? '../storage/' . $producto->foto2 : 'https://www.mayline.com/products/images/product/noimage.jpg' }}" width="300px" height="auto">
						<img src="{{ $producto->foto3 ? '../storage/' . $producto->foto3 : 'https://www.mayline.com/products/images/product/noimage.jpg'}}" width="300px" height="auto">
					</div>
				</div>
			</div>
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h5>Historial:</h5>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<table class="table table-stripped table-bordered table-hover" style="margin-bottom: 0px;">
							<tr class="info">
								<th>Fecha</th>
								<th>Tipo</th>
								<th>Descripción</th>
							</tr>
							@foreach($producto->historiales as $historial)
								<tr>
									<td>{{ $historial->created_at }}</td>
									<td>{{ $historial->tipo }}</td>
									<td>{{ $historial->descripcion }}</td>
								</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection