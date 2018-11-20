@extends('layouts.blank')
@section('content')
	{{-- expr --}}
	<div class="container">
	<select name="selector" class="form-control" id="selector">
	<br>
	<br>
		<option value="">seleccionar</option>
		<option value="ortopedia">General de ortopedia</option>
		<option value="micas">Micas</option>
		<option value="armazones">Armazones</option>
		<option value="generales">Productos en General</option>
	</select>

	<!-- ORTO -->
		<form id="orto" role="form" method="POST" action="{{ route('proorto.store') }}">
			{{ csrf_field() }}
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="nombre">Código de barras </label>
	  					<input type="text" class="form-control" id="codigobarras" name="codigobarras" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="sku">SKU:</label>
	  					<input type="text" class="form-control" id="sku" name="sku" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="negocio">Negocio:</label>
	  					<input type="text" class="form-control" id="negocio" name="descripcion" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="proveedor">Proveedor:</label>
	  					<input type="text" class="form-control" id="proveedor" name="proveedor" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="descripcion">Descripcion:</label>
	  					<input type="text" class="form-control" id="descripcion" name="descripcion" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="producto">Producto:</label>
	  					<input type="text" class="form-control" id="producto" name="producto" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="producto">Producto:</label>
	  					<input type="text" class="form-control" id="producto" name="producto" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="marca">Marca:</label>
	  					<input type="text" class="form-control" id="marca" name="marca" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="modelo">Modelo:</label>
	  					<input type="text" class="form-control" id="modelo" name="modelo" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="talla">Talla:</label>
	  					<input type="text" class="form-control" id="talla" name="talla" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="color">Color:</label>
	  					<input type="text" class="form-control" id="color" name="color" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="unidad">Unidad:</label>
	  					<input type="text" class="form-control" id="unidad" name="unidad" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="fecha">Fecha:</label>
	  					<input readonly type="date" value="{{date('Y-m-d')}}" class="form-control" id="fecha" name="fecha" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="foto">Foto:</label>
	  					<input type="text" class="form-control" id="foto" name="foto" required>
					</div>
					
				</div>
				<div class="panel-body">
						<button type="submit" class="btn btn-success">
					<strong>Guardar</strong>	</button>
				</div>	
			</div>
		</form>
	<!-- MICA -->
		<form id="mica" role="form" method="POST" action="{{ route('promica.store') }}">
			{{ csrf_field() }}
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="nombre">Código de barras </label>
	  					<input type="text" class="form-control" id="codigobarras" name="codigobarras" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="sku">SKU:</label>
	  					<input type="text" class="form-control" id="sku" name="sku" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="negocio">Negocio:</label>
	  					<input type="text" class="form-control" id="negocio" name="descripcion" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="proveedor">Proveedor:</label>
	  					<input type="text" class="form-control" id="proveedor" name="proveedor" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="descripcion">Descripcion:</label>
	  					<input type="text" class="form-control" id="descripcion" name="descripcion" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="familia">Familia:</label>
	  					<input type="text" class="form-control" id="familia" name="familia" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="materiales">Materiales:</label>
	  					<input type="text" class="form-control" id="materiales" name="materiales" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="marca">Marca:</label>
	  					<input type="text" class="form-control" id="marca" name="marca" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="rangos">rangos:</label>
	  					<input type="text" class="form-control" id="rangos" name="rangos" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="color">color:</label>
	  					<input type="text" class="form-control" id="color" name="color" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="tratamientos">tratamientos:</label>
	  					<input type="text" class="form-control" id="tratamientos" name="tratamientos" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="unidad">Unidad:</label>
	  					<input type="text" class="form-control" id="unidad" name="unidad" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="fecha">Fecha:</label>
	  					<input readonly type="date" value="{{date('Y-m-d')}}" class="form-control" id="fecha" name="fecha" required>
					</div>
					
				</div>
				<div class="panel-body">
						<button type="submit" class="btn btn-success">
					<strong>Guardar</strong>	</button>
				</div>	
			</div>
		
		</form>

	<!-- ARMAZON -->
		<form id="mica" role="form" method="POST" action="{{ route('proarma.store') }}">
			{{ csrf_field() }}
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="nombre">Código de barras </label>
	  					<input type="text" class="form-control" id="codigobarras" name="codigobarras" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="sku">SKU:</label>
	  					<input type="text" class="form-control" id="sku" name="sku" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="negocio">Negocio:</label>
	  					<input type="text" class="form-control" id="negocio" name="descripcion" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="proveedor">Proveedor:</label>
	  					<input type="text" class="form-control" id="proveedor" name="proveedor" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="descripcion">Descripcion:</label>
	  					<input type="text" class="form-control" id="descripcion" name="descripcion" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="marca">marca:</label>
	  					<input type="text" class="form-control" id="marca" name="marca" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="modelo">modelo:</label>
	  					<input type="text" class="form-control" id="modelo" name="modelo" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="color">color:</label>
	  					<input type="text" class="form-control" id="color" name="color" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="medidas">medidas:</label>
	  					<input type="text" class="form-control" id="medidas" name="medidas" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="unidad">unidad:</label>
	  					<input type="text" class="form-control" id="unidad" name="unidad" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="fecha">Fecha:</label>
	  					<input readonly type="date" value="{{date('Y-m-d')}}" class="form-control" id="fecha" name="fecha" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="foto">foto:</label>
	  					<input type="text" class="form-control" id="foto" name="foto" required>
					</div>
					
				</div>
				<div class="panel-body">
						<button type="submit" class="btn btn-success">
					<strong>Guardar</strong>	</button>
				</div>	
			</div>
		</form>

	<!-- HENERALES -->
		<form id="mica" role="form" method="POST" action="{{ route('progene.store') }}">
			{{ csrf_field() }}
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="nombre">Código de barras </label>
	  					<input type="text" class="form-control" id="codigobarras" name="codigobarras" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="sku">SKU:</label>
	  					<input type="text" class="form-control" id="sku" name="sku" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="negocio">Negocio:</label>
	  					<input type="text" class="form-control" id="negocio" name="descripcion" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="proveedor">Proveedor:</label>
	  					<input type="text" class="form-control" id="proveedor" name="proveedor" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="descripcion">Descripcion:</label>
	  					<input type="text" class="form-control" id="descripcion" name="descripcion" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="producto">producto:</label>
	  					<input type="text" class="form-control" id="producto" name="producto" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="marca">marca:</label>
	  					<input type="text" class="form-control" id="marca" name="marca" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="modelo">modelo:</label>
	  					<input type="text" class="form-control" id="modelo" name="modelo" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="color">color:</label>
	  					<input type="text" class="form-control" id="color" name="color" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="unidad">unidad:</label>
	  					<input type="text" class="form-control" id="unidad" name="unidad" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="fecha">Fecha:</label>
	  					<input readonly type="date" value="{{date('Y-m-d')}}" class="form-control" id="fecha" name="fecha" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="foto">foto:</label>
	  					<input type="text" class="form-control" id="foto" name="foto" required>
					</div>
					
				</div>
				<div class="panel-body">
						<button type="submit" class="btn btn-success">
					<strong>Guardar</strong>	</button>
				</div>	
			</div>
		</form>
		


	</div>

	<script>
		$(document).ready(function(){
			alert();
		});
	</script>
@endsection