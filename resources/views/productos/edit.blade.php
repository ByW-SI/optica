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
		<form role="form" method="POST" action="{{ route('productos.update', ['producto' => $producto]) }}" enctype="multipart/form-data">
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
				@isset($producto->tipo)
					<div class="form-group col-sm-3">
						<label class="control-label">✱Tipo de lente:</label>
	  					<input type="text" class="form-control" name="tipo" required="" value="{{ $producto->tipo }}">
					</div>
				@endif
				@isset($producto->tipo_abr)
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" name="tipo_abr" required="" value="{{ $producto->tipo_abr }}" maxlength="3">
					</div>
				@endif
				@isset($producto->categoria)
					<div class="form-group col-sm-3">
						<label class="control-label">✱Categoría:</label>
	  					<input type="text" class="form-control" name="categoria" required="" value="{{ $producto->categoria }}">
					</div>
				@endif
				@isset($producto->categoria_abr)
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" name="categoria_abr" required="" value="{{ $producto->categoria_abr }}" maxlength="3">
					</div>
				@endif
				@isset($producto->producto)
					<div class="form-group col-sm-3">
						<label class="control-label">✱Producto:</label>
	  					<input type="text" class="form-control" name="producto" required="" value="{{ $producto->producto }}">
					</div>
				@endif
				@isset($producto->producto_abr)
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" name="producto_abr" required="" value="{{ $producto->producto_abr }}" maxlength="3">
					</div>
				@endif
				@isset($producto->familia)
					<div class="form-group col-sm-3">
						<label class="control-label">✱Familia:</label>
	  					<input type="text" class="form-control" name="familia" required="" value="{{ $producto->familia }}">
					</div>
				@endif
				@isset($producto->familia_abr)
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" name="familia_abr" required="" value="{{ $producto->familia_abr }}">
					</div>
				@endif
				@isset($producto->materiales)
					<div class="form-group col-sm-3">
						<label class="control-label">✱Materiales:</label>
	  					<input type="text" class="form-control" name="materiales" required="" value="{{ $producto->materiales }}">
					</div>
				@endif
				@isset($producto->materiales_abr)
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" name="materiales_abr" required="" value="{{ $producto->materiales_abr }}" maxlength="3">
					</div>
				@endif
				@isset($producto->rangos)
					<div class="form-group col-sm-3">
						<label class="control-label">✱Rangos:</label>
	  					<input type="text" class="form-control" name="rangos" required="" value="{{ $producto->rangos }}">
					</div>
				@endif
				@isset($producto->rangos_abr)
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" name="rangos_abr" required="" value="{{ $producto->rangos_abr }}">
					</div>
				@endif
				@isset($producto->marca)
					<div class="form-group col-sm-3">
						<label class="control-label">✱Marca:</label>
	  					<input type="text" class="form-control" name="marca" required="" value="{{ $producto->marca }}">
					</div>
				@endif
				@isset($producto->marca_abr)
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" name="marca_abr" required="" value="{{ $producto->marca_abr }}" maxlength="3">
					</div>
				@endif
				@isset($producto->modelo)
					<div class="form-group col-sm-3">
						<label class="control-label">✱Modelo:</label>
	  					<input type="text" class="form-control" name="modelo" required="" value="{{ $producto->modelo }}">
					</div>
				@endif
				@isset($producto->modelo_abr)
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" name="modelo_abr" required="" value="{{ $producto->modelo_abr }}" maxlength="3">
					</div>
				@endif
				@isset($producto->talla)
					<div class="form-group col-sm-3">
						<label class="control-label">✱Talla:</label>
	  					<input type="text" class="form-control" name="talla" required="" value="{{ $producto->talla }}">
					</div>
				@endif
				@isset($producto->talla_abr)
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" name="talla_abr" required="" value="{{ $producto->talla_abr }}">
					</div>
				@endif
				@isset($producto->color)
					<div class="form-group col-sm-3">
						<label class="control-label">✱Color:</label>
	  					<input type="text" class="form-control" name="color" required="" value="{{ $producto->color }}">
					</div>
				@endif
				@isset($producto->color_abr)
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" name="color_abr" required="" value="{{ $producto->color_abr }}" maxlength="3">
					</div>
				@endif
				@isset($producto->tratamiento)
					<div class="form-group col-sm-3">
						<label class="control-label">✱Tratamiento:</label>
  						<input type="text" class="form-control" name="tratamiento" required="" value="{{ $producto->tratamiento }}">
					</div>
				@endif
				@isset($producto->tratamiento_abr)
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
  						<input type="text" class="form-control" name="tratamiento_abr" required="" value="{{ $producto->tratamiento_abr }}" maxlength="3">
					</div>
				@endif
				@isset($producto->medidas)
					<div class="form-group col-sm-3">
						<label class="control-label">✱Medidas:</label>
	  					<input type="text" class="form-control" name="medidas" required="" value="{{ $producto->medidas }}">
					</div>
				@endif
				@isset($producto->medidas_abr)
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" name="medidas_abr" required="" value="{{ $producto->medidas_abr }}" maxlength="3">
					</div>
				@endif
				@isset($producto->periodo)
					<div class="form-group col-sm-3">
						<label class="control-label">✱Periodicidad:</label>
	  					<input type="text" class="form-control" name="periodo" required="" value="{{ $producto->periodo }}">
					</div>
				@endif
				@isset($producto->periodo_abr)
					<div class="form-group col-sm-3">
						<label class="control-label">✱Abreviatura:</label>
	  					<input type="text" class="form-control" name="periodo_abr" required="" value="{{ $producto->periodo_abr }}" maxlength="3">
					</div>
				@endif
				<div class="form-group col-sm-3">
					<label class="control-label">✱Unidad:</label>
					<select name="unidad" class="form-control" required="">
						<option value="">Seleccionar</option>
						<option value="m" {{ $producto->unidad == 'm' ? 'selected' : '' }}>Metros</option>
						<option value="cm" {{ $producto->unidad == 'cm' ? 'selected' : '' }}>Centímetros</option>
						<option value="mm" {{ $producto->unidad == 'mm' ? 'selected' : '' }}>Milímetros</option>
					</select>
				</div>
				@isset($producto->renta)
					<div class="form-group col-sm-3">
						<label class="control-label">✱¿Para renta?</label>
						<div class="row text-center">
							<div class="col-sm-6">
								Sí <input type="radio" name="renta" value="Sí" {{ $producto->renta == 'Sí' ? 'checked' : '' }} required="" style="top: 0px;">
							</div>
							<div class="col-sm-6">
								No <input type="radio" name="renta" value="No" {{ $producto->renta == 'No' ? 'checked' : '' }}  style="top: 0px;">
							</div>
						</div>
					</div>
				@endif
				<div class="form-group col-sm-3">
					<label class="control-label">Foto 1:</label>
  					<input type="file" class="form-control" id="foto11" name="foto1" style="font-size: 9px;">
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label">Foto 2:</label>
  					<input type="file" class="form-control" id="foto21" name="foto2" style="font-size: 9px;">
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label">Foto 3:</label>
  					<input type="file" class="form-control" id="foto31" name="foto3" style="font-size: 9px;">
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