@extends('layouts.blank')
@section('content')

@if($tipo == 'orto')
        <form id="orto" class="formu" role="form" method="POST" action="{{ route('proorto.store') }}">
			{{ csrf_field() }}
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="nombre">Código de barras </label>
	  					<input readonly value="{{$orto->codigobarras}}" type="text" class="form-control" id="codigobarras" name="codigobarras" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="sku">SKU:</label>
	  					<input readonly value="{{$orto->sku}}" type="text" class="form-control" id="sku" name="sku" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="negocio">Negocio:</label>
	  					<input readonly value="{{$orto->negocio}}" type="text" class="form-control" id="negocio" name="descripcion" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="proveedor">Proveedor:</label>
	  					<input readonly type="text"  value="{{$orto->proveedor}}" class="form-control" id="proveedor" name="proveedor" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="descripcion">Descripcion:</label>
	  					<input readonly type="text" value="{{$orto->descripcion}}" class="form-control" id="descripcion" name="descripcion" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="producto">Producto:</label>
	  					<input readonly type="text" value="{{$orto->producto}}" class="form-control" id="producto" name="producto" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="marca">Marca:</label>
	  					<input readonly type="text" value="{{$orto->marca}}" class="form-control" id="marca" name="marca" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="modelo">Modelo:</label>
	  					<input readonly type="text" value="{{$orto->modelo}}" class="form-control" id="modelo" name="modelo" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="talla">Talla:</label>
	  					<input readonly type="text" value="{{$orto->talla}}" class="form-control" id="talla" name="talla" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="color">Color:</label>
	  					<input readonly type="text" value="{{$orto->color}}" class="form-control" id="color" name="color" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="unidad">Unidad:</label>
	  					<input readonly type="text" value="{{$orto->unidad}}" class="form-control" id="unidad" name="unidad" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="fecha">Fecha:</label>
	  					<input readonly readonly type="text" value="{{$orto->created_at}}"  class="form-control" id="fecha" name="fecha" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="foto">Foto:</label>
	  					<input readonly type="text" value="{{$orto->foto}}" class="form-control" id="foto" name="foto" required>
					</div>
					
				</div>	
			</div>
		</form>
@elseif($tipo == 'mica')
        <form id="mica" class="formu" role="form" method="POST" action="{{ route('promica.store') }}">
			{{ csrf_field() }}
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="nombre">Código de barras </label>
	  					<input readonly value="{{$orto->codigobarras}}" type="text" class="form-control" id="codigobarras" name="codigobarras" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="sku">SKU:</label>
	  					<input readonly value="{{$orto->sku}}" type="text" class="form-control" id="sku" name="sku" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="negocio">Negocio:</label>
	  					<input readonly value="{{$orto->negocio}}" type="text" class="form-control" id="negocio" name="descripcion" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="proveedor">Proveedor:</label>
	  					<input readonly value="{{$orto->proveedor}}" type="text" class="form-control" id="proveedor" name="proveedor" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="descripcion">Descripcion:</label>
	  					<input readonly value="{{$orto->descripcion}}" type="text" class="form-control" id="descripcion" name="descripcion" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="familia">Familia:</label>
	  					<input readonly value="{{$orto->familia}}" type="text" class="form-control" id="familia" name="familia" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="materiales">Materiales:</label>
	  					<input readonly value="{{$orto->materiales}}" type="text" class="form-control" id="materiales" name="materiales" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="marca">Marca:</label>
	  					<input readonly value="{{$orto->marca}}" type="text" class="form-control" id="marca" name="marca" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="rangos">rangos:</label>
	  					<input readonly value="{{$orto->rangos}}" type="text" class="form-control" id="rangos" name="rangos" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="color">color:</label>
	  					<input readonly value="{{$orto->color}}" type="text" class="form-control" id="color" name="color" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="tratamientos">tratamientos:</label>
	  					<input readonly value="{{$orto->tratamientos}}" type="text" class="form-control" id="tratamientos" name="tratamientos" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="unidad">Unidad:</label>
	  					<input readonly value="{{$orto->unidad}}" type="text" class="form-control" id="unidad" name="unidad" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="fecha">Fecha:</label>
	  					<input readonly type="text" value="{{$orto->created_at}}" class="form-control" id="fecha" name="fecha" required>
					</div>
					
				</div>
			</div>
		
		</form>
@elseif($tipo == 'arma')
        <form id="arma" class="formu" role="form" method="POST" action="{{ route('proarma.store') }}">
			{{ csrf_field() }}
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="nombre">Código de barras </label>
	  					<input readonly value="{{$orto->codigobarras}}" type="text" class="form-control" id="codigobarras" name="codigobarras" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="sku">SKU:</label>
	  					<input readonly value="{{$orto->sku}}" type="text" class="form-control" id="sku" name="sku" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="negocio">Negocio:</label>
	  					<input readonly value="{{$orto->negocio}}" type="text" class="form-control" id="negocio" name="negocio" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="proveedor">Proveedor:</label>
	  					<input readonly value="{{$orto->proveedor}}" type="text" class="form-control" id="proveedor" name="proveedor" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="descripcion">Descripcion:</label>
	  					<input readonly value="{{$orto->descripcion}}" type="text" class="form-control" id="descripcion" name="descripcion" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="marca">marca:</label>
	  					<input readonly value="{{$orto->marca}}" type="text" class="form-control" id="marca" name="marca" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="modelo">modelo:</label>
	  					<input readonly value="{{$orto->modelo}}" type="text" class="form-control" id="modelo" name="modelo" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="color">color:</label>
	  					<input readonly value="{{$orto->color}}" type="text" class="form-control" id="color" name="color" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="medidas">medidas:</label>
	  					<input readonly value="{{$orto->medidas}}" type="text" class="form-control" id="medidas" name="medidas" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="unidad">unidad:</label>
	  					<input readonly value="{{$orto->unidad}}" type="text" class="form-control" id="unidad" name="unidad" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="fecha">Fecha:</label>
	  					<input readonly value="{{$orto->created_at}}"  type="text" class="form-control" id="fecha" name="fecha" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="foto">foto:</label>
	  					<input readonly value="{{$orto->foto}}" type="text" class="form-control" id="foto" name="foto" required>
					</div>
					
				</div>
			</div>
		</form>
@elseif($tipo == 'gene')
        <form id="gene" class="formu" role="form" method="POST" action="{{ route('progene.store') }}">
			{{ csrf_field() }}
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="nombre">Código de barras </label>
	  					<input readonly value="{{$orto->codigobarras}}" type="text" class="form-control" id="codigobarras" name="codigobarras" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="sku">SKU:</label>
	  					<input readonly value="{{$orto->sku}}" type="text" class="form-control" id="sku" name="sku" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="negocio">Negocio:</label>
	  					<input readonly value="{{$orto->negocio}}" type="text" class="form-control" id="negocio" name="descripcion" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="proveedor">Proveedor:</label>
	  					<input readonly value="{{$orto->proveedor}}" type="text" class="form-control" id="proveedor" name="proveedor" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="descripcion">Descripcion:</label>
	  					<input readonly value="{{$orto->descripcion}}" type="text" class="form-control" id="descripcion" name="descripcion" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="producto">producto:</label>
	  					<input readonly value="{{$orto->producto}}" type="text" class="form-control" id="producto" name="producto" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="marca">marca:</label>
	  					<input readonly value="{{$orto->marca}}" type="text" class="form-control" id="marca" name="marca" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="modelo">modelo:</label>
	  					<input readonly value="{{$orto->modelo}}" type="text" class="form-control" id="modelo" name="modelo" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="color">color:</label>
	  					<input readonly value="{{$orto->color}}" type="text" class="form-control" id="color" name="color" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="unidad">unidad:</label>
	  					<input readonly value="{{$orto->unidad}}" type="text" class="form-control" id="unidad" name="unidad" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="fecha">Fecha:</label>
	  					<input readonly value="{{$orto->created_at}}" type="text"  class="form-control" id="fecha" name="fecha" required>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="foto">foto:</label>
	  					<input readonly value="{{$orto->foto}}" type="text" class="form-control" id="foto" name="foto" required>
					</div>
					
				</div>
			</div>
		</form>
@endif
        <a href="{{route('productoschidos.create')}}" class="btn btn-info">Regresar</a>
@endsection