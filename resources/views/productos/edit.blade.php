@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos del Producto:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('productos.create') }}" class="btn btn-success">
							<i class="fa fa-plus"></i><strong> Agregar Producto</strong>
						</a>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('productos.index') }}" class="btn btn-primary">
							<i class="fa fa-bars"></i><strong> Lista de Productos</strong>
						</a>
					</div>
				</div>
			</div>
		</div>
		<form role="form" method="POST" action="{{ route('productos.update', ['producto' => $producto]) }}">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT">
			<div class="panel-body">
				<div class="form-group col-sm-3">
					<label class="control-label">✱SKU:</label>
  					<input type="text" class="form-control" name="sku" required="" value="{{ $producto->sku }}">
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label">✱Negocio:</label>
  					<input type="text" class="form-control" name="negocio" required="" value="{{ $producto->negocio }}">
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label">✱Proveedor:</label>
					<select class="form-control" name="provedor_id" required="">
						<option value="">Seleccionar</option>
						@foreach($proveedores as $proveedor)
							<option value="{{ $proveedor->id }}" @if($proveedor->id == $producto->provedor_id) selected="" @endif>{{ $proveedor->razonsocial }}{{ $proveedor->nombre . ' ' . $proveedor->apellidopaterno }}</option>
						@endforeach
					</select>
				</div>
				@if($producto->seccion == 'ortopedia' || $producto->seccion == 'generales')
					<div class="form-group col-sm-3">
						<label class="control-label">✱Producto:</label>
	  					<input type="text" class="form-control" name="producto" required="" value="{{ $producto->producto }}">
					</div>
				@endif
				@if($producto->seccion == 'micas')
					<div class="form-group col-sm-3">
						<label class="control-label">✱Familia:</label>
	  					<input type="text" class="form-control" name="familia" required="" value="{{ $producto->familia }}">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Materiales:</label>
	  					<input type="text" class="form-control" name="materiales" required="" value="{{ $producto->materiales }}">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Rangos:</label>
	  					<input type="text" class="form-control" name="rangos" required="" value="{{ $producto->rangos }}">
					</div>
				@endif
				@if($producto->seccion != 'micas')
					<div class="form-group col-sm-3">
						<label class="control-label">✱Marca:</label>
	  					<input type="text" class="form-control" name="marca" required="" value="{{ $producto->marca }}">
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label">✱Modelo:</label>
	  					<input type="text" class="form-control" name="modelo" required="" value="{{ $producto->modelo }}">
					</div>
				@endif
				@if($producto->seccion == 'ortopedia')
					<div class="form-group col-sm-3">
						<label class="control-label">✱Talla:</label>
	  					<input type="text" class="form-control" name="talla" required="" value="{{ $producto->talla }}">
					</div>
				@endif
				<div class="form-group col-sm-3">
					<label class="control-label">✱Color:</label>
  					<input type="text" class="form-control" name="color" required="" value="{{ $producto->color }}">
				</div>
				@if($producto->seccion == 'micas')
					<div class="form-group col-sm-3">
						<label class="control-label">✱Tratamiento:</label>
  					<input type="text" class="form-control" name="tratamiento" required="" value="{{ $producto->tratamiento }}">
					</div>
				@endif
				<div class="form-group col-sm-3">
					<label class="control-label">✱Unidad:</label>
  					<input type="text" class="form-control" name="unidad" required="" value="{{ $producto->unidad }}">
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

@endsection