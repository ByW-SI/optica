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
					@if($producto->seccion == 'ortopedia' || $producto->seccion == 'generales')
						<div class="form-group col-sm-3">
							<label class="control-label">Producto:</label>
							<dd>{{ $producto->producto }}</dd>
						</div>
					@endif
					@if($producto->seccion == 'micas')
						<div class="form-group col-sm-3">
							<label class="control-label">Familia:</label>
							<dd>{{ $producto->familia }}</dd>
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label">Materiales:</label>
							<dd>{{ $producto->materiales }}</dd>
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label">Rangos:</label>
							<dd>{{ $producto->rangos }}</dd>
						</div>
					@endif
					@if($producto->seccion != 'micas')
						<div class="form-group col-sm-3">
							<label class="control-label">Marca:</label>
							<dd>{{ $producto->marca }}</dd>
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label">Modelo:</label>
							<dd>{{ $producto->modelo }}</dd>
						</div>
					@endif
					@if($producto->seccion == 'ortopedia')
						<div class="form-group col-sm-3">
							<label class="control-label">Talla:</label>
							<dd>{{ $producto->talla }}</dd>
						</div>
					@endif
					<div class="form-group col-sm-3">
						<label class="control-label">Color:</label>
						<dd>{{ $producto->color }}</dd>
					</div>
					@if($producto->seccion == 'micas')
						<div class="form-group col-sm-3">
							<label class="control-label">Tratamiento:</label>
							<dd>{{ $producto->tratamiento }}</dd>
						</div>
					@endif
					<div class="form-group col-sm-3">
						<label class="control-label">Unidad:</label>
						<dd>{{ $producto->unidad }}</dd>
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