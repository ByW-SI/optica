@extends('layouts.blank')
@section('content')
	{{-- expr --}}
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-body">
				<select name="selector" class="form-control" id="selector">
					<option value="">seleccionar</option>
					<option value="ortopedia">General de ortopedia</option>
					<option value="micas">Micas</option>
					<option value="armazones">Armazones</option>
					<option value="generales">Productos en General</option>
				</select>
			</div>
		</div>
		

	<!-- ORTO -->
		<form id="orto" class="formu" role="form" method="POST" action="{{ route('proorto.store') }}">
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

		<table id="tablaortos" class=" formu table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
			<thead>
				<tr class="info">
					<th>Código de Barras</th>
					<th>SKU</th>
					<th>Proveedor</th>
					<th>Descripción</th>
					<th>Producto</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Fecha Alta</th>
					<th>Foto</th>
					<th>Operación</th>
				</tr>
			</thead>
			@foreach ($ortos as $orto)
				{{-- expr --}}
				<tr class="active"
				    title="Has Click Aquì para Ver"
					style="cursor: pointer"
					>
					
					<td>{{$orto->codigobarras}}</td>
					<td>{{$orto->sku}}</td>
					<td>{{$orto->proveedor}}</td>
					<td>{{$orto->descripcion}}</td>
					<td>{{$orto->producto}}</td>
					<td>{{$orto->marca}}</td>
					<td>{{$orto->modelo}}</td>
					<td>{{$orto->created_at}}</td>
					<td>{{$orto->foto}}</td>
					<td>
						<a class="btn btn-success btn-sm" href="{{ route('proorto.show',['orto'=>$orto]) }}"><i class="fa fa-eye" aria-hidden="true"></i> 
					<strong>Ver</strong>	</a>
						<a class="btn btn-info btn-sm" href="{{ route('proorto.destroy',['orto'=>$orto]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
					<strong>Borrar</strong>	</a>
					</td>
				</tr>
			@endforeach
		</table>

	<!-- MICA -->
		<form id="mica" class="formu" role="form" method="POST" action="{{ route('promica.store') }}">
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

		<table id="tablamicas" class=" formu table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
			<thead>
				<tr class="info">
					<th>Código de Barras</th>
					<th>SKU</th>
					<th>Proveedor</th>
					<th>Descripción</th>
					<th>Materiales</th>
					<th>Rangos</th>
					<th>Tratamientos</th>
					<th>Unidad</th>
					<th>Fecha Alta</th>
					<th>Operación</th>
				</tr>
			</thead>
			@foreach ($micas as $mica)
				{{-- expr --}}
				<tr class="active"
				    title="Has Click Aquì para Ver"
					style="cursor: pointer"
					>
					
					<td>{{$mica->codigobarras}}</td>
					<td>{{$mica->sku}}</td>
					<td>{{$mica->proveedor}}</td>
					<td>{{$mica->descripcion}}</td>
					<td>{{$mica->materiales}}</td>
					<td>{{$mica->rangos}}</td>
					<td>{{$mica->tratamientos}}</td>
					<td>{{$mica->unidad}}</td>
					<td>{{$mica->created_at}}</td>
					<td>
						<a class="btn btn-success btn-sm" href="{{ route('promica.show',['mica'=>$mica]) }}"><i class="fa fa-eye" aria-hidden="true"></i> 
					<strong>Ver</strong>	</a>
						<a class="btn btn-info btn-sm" href="{{ route('promica.destroy',['mica'=>$mica]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
					<strong>Borrar</strong>	</a>
					</td>
				</tr>
			@endforeach
		</table>

	<!-- ARMAZON -->
		<form id="arma" class="formu" role="form" method="POST" action="{{ route('proarma.store') }}">
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

		<table id="tablaarmas" class=" formu table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
			<thead>
				<tr class="info">
					<th>Código de Barras</th>
					<th>SKU</th>
					<th>Proveedor</th>
					<th>Descripción</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Color</th>
					<th>Medidas</th>
					<th>Fecha Alta</th>
					<th>Operación</th>
				</tr>
			</thead>
			@foreach ($armazones as $arma)
				{{-- expr --}}
				<tr class="active"
				    title="Has Click Aquì para Ver"
					style="cursor: pointer"
					>
					
					<td>{{$arma->codigobarras}}</td>
					<td>{{$arma->sku}}</td>
					<td>{{$arma->proveedor}}</td>
					<td>{{$arma->descripcion}}</td>
					<td>{{$arma->marca}}</td>
					<td>{{$arma->modelo}}</td>
					<td>{{$arma->color}}</td>
					<td>{{$arma->medidas}}</td>
					<td>{{$arma->created_at}}</td>
					<td>
						<a class="btn btn-success btn-sm" href="{{ route('proarma.show',['arma'=>$arma]) }}"><i class="fa fa-eye" aria-hidden="true"></i> 
					<strong>Ver</strong>	</a>
						<a class="btn btn-info btn-sm" href="{{ route('proarma.destroy',['arma'=>$arma]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
					<strong>Borrar</strong>	</a>
					</td>
				</tr>
			@endforeach
		</table>

	<!-- GENERALES -->
		<form id="gene" class="formu" role="form" method="POST" action="{{ route('progene.store') }}">
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
		
		<table id="tablagene" class=" formu table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
			<thead>
				<tr class="info">
					<th>Código de Barras</th>
					<th>SKU</th>
					<th>Proveedor</th>
					<th>Descripción</th>
					<th>Producto</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Fecha Alta</th>
					<th>Foto</th>
					<th>Operación</th>
				</tr>
			</thead>
			@foreach ($generales as $gene)
				{{-- expr --}}
				<tr class="active"
				    title="Has Click Aquì para Ver"
					style="cursor: pointer"
					>
					
					<td>{{$gene->codigobarras}}</td>
					<td>{{$gene->sku}}</td>
					<td>{{$gene->proveedor}}</td>
					<td>{{$gene->descripcion}}</td>
					<td>{{$gene->producto}}</td>
					<td>{{$gene->marca}}</td>
					<td>{{$gene->modelo}}</td>
					<td>{{$gene->created_at}}</td>
					<td>{{$gene->foto}}</td>
					<td>
						<a class="btn btn-success btn-sm" href="{{ route('progene.show',['gene'=>$gene]) }}"><i class="fa fa-eye" aria-hidden="true"></i> 
					<strong>Ver</strong>	</a>
						<a class="btn btn-info btn-sm" href="{{ route('progene.destroy',['gene'=>$gene]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
					<strong>Borrar</strong>	</a>
					</td>
				</tr>
			@endforeach
		</table>

	</div>

	<script>
		$(document).ready(function(){
			$('.formu').hide();
			$('#selector').change(function(){
				switch($(this).val()){
					case 'ortopedia':
						$('.formu').hide();
						$('#orto').show();
						$('#tablaortos').show();
						break;
					case 'micas':
						$('.formu').hide();
						$('#mica').show();
						$('#tablamicas').show();
						break;
					case 'armazones':
						$('.formu').hide();
						$('#arma').show();
						$('#tablaarmas').show();
						break;
					case 'generales':
						$('.formu').hide();
						$('#gene').show();
						$('#tablagene').show();
						break;
				}
			});
		});
	</script>
@endsection