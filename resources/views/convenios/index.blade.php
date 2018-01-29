@extends('layouts.blank')
@section('content')
<div class="container">
	<div class="panel-body">
		<div class="col-lg-6">
			<form action="buscarprovedor">
				<div class="input-group">
					<input type="text" id="provedor" 
					       name="query" 
					       class="form-control" 
					       placeholder="Buscar..."
					       autofocus
					       onKeypress="if(event.keyCode == 13) event.returnValue = false;">


				</div>
				<a class="btn btn-info" 
				   href="{{ route('convenios.create')}}">
							        <strong>
							   Agregar Convenio</strong>
							</a>
			</form>
		</div>
	</div>

{{-- TABLA AJAX DE PROVEEDORES --}}
	<div id="datos" name="datos" class="jumbotron">
		<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
			<thead>
				<tr class="info">
					<th>@sortablelink('id', 'Identificador')</th>
					<th>@sortablelink('nombre', 'Nombre/Razón Social'){{-- Nombre --}}</th>
					<th>@sortablelink('tipopersona', 'Tipo de persona')</th>
					<th>@sortablelink('alias', 'Alias')</th>
					<th>@sortablelink('rfc', 'RFC')</th>
					<th>@sortablelink('vendedor', 'Vendedor') </th>
					<th>Operacion</th>
				</tr>
			</thead>

			@foreach($convenios as $convenio)
				<tr class="active"
				    title="Haz Click Aquì para Ver"
					style="cursor: pointer"
					href="#{{$convenio->id}}">
					<td>{{$convenio->id}}</td>
					<td>
						@if ($convenio->tipopersona == "Fisica")
						{{$convenio->nombre}} {{ $convenio->apellidopaterno }} {{ $convenio->apellidomaterno }}
						@else
						{{$convenio->razonsocial}}
						@endif
					</td>
					<td>{{ $convenio->tipopersona }}</td>
					<td>{{ $convenio->alias }}</td>
					<td>{{ strtoupper($convenio->rfc) }}</td>
					<td>{{$convenio->vendedor}}</td>
					<td>
							<a class="btn btn-success btn-sm" href="{{ route('convenios.show',['provedor'=>$convenio]) }}">
								<i class="fa fa-eye" aria-hidden="true"></i> 
								<strong>Ver
							</strong></a>

							<a class="btn btn-info btn-sm" href="{{ route('convenios.edit',['provedor'=>$convenio]) }}">
								
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i> <strong>Editar</strong>
							</a>
				</tr>
				</td>
			</tbody>
		</div>
			@endforeach
		</table>


	</div>
{{-- TABLA AJAX DE PROVEEDORES --}}


{{--   TABLA VISTA RÀPIDA  --}}
@foreach ($convenios as $convenio)
	{{-- expr --}}
	<div class="persona" id="{{$convenio->id}}">
		<div class="container" id="tab">
			<div role="application" class="panel panel-group" >
				<div class="panel-default">
					<div class="panel-heading"><h4>@if ($convenio->tipopersona == "Fisica")
						{{-- true expr --}}
						{{ucwords($convenio->nombre)." ".ucwords($convenio->apellidopaterno)." ".ucwords($convenio->apellidomaterno)}}
					@else
						{{-- false expr --}}
						{{ucwords($convenio->razonsocial)}}
					@endif:</h4></div>
					
				</div>
				<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
					<li role="tab" tabindex="0" aria-controls="tabs-1" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active active"><a href="#tab1{{$convenio->id}}" tabindex="-1">Dirección Fiscal:</a></li>
					<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false"><a href="#tab2{{$convenio->id}}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-2">Dirección Fisica:</a></li>
					<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tab3{{$convenio->id}}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a></li>
					<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tab4{{$convenio->id}}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Tipo de convenio:</a></li>
				</ul>
				<div class="panel-default pestana" aria-hidden="false" id="tab1{{$convenio->id}}" style="display: block;">
					<div class="panel-heading">Dirección Fiscal:</div>
					<div class="panel-body">
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="calle">Calle:</label>
		    					<dd>{{ $convenio->calle }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numext">Numero exterior:</label>
		    					<dd>{{ $convenio->numext }}</dd>
		  					</div>	
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numinter">Numero interior:</label>
		    					<dd>{{ $convenio->numinter }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="cp">Código postal:</label>
		    					<dd>{{ $convenio->cp }}</dd>
		  					</div>		
						</div>
						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="colonia">Colonia:</label>
		  						<dd>{{ $convenio->colonia }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="municipio">Delegación o Municipio:</label>
		  						<dd>{{ $convenio->municipio }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="ciudad">Ciudad:</label>
		  						<dd>{{ $convenio->ciudad }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="estado">Estado:</label>
		  						<dd>{{ $convenio->estado }}</dd>
		  					</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle1">Entre calle:</label>
		  						<dd>{{ $convenio->calle1 }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle2">Y calle:</label>
		  						<dd>{{ $convenio->calle2 }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="referencia">Referencia:</label>
		  						<dd>{{ $convenio->referencia }}</dd>
		  					</div>
						</div>
					</div>
				</div>
				<div class="panel-default pestana" id="tab2{{$convenio->id}}">

					<div class="panel-heading">Dirección Fisica:</div>
					<div class="panel-body">
						@if (!isset($convenio->direccionFisicaProvedor))
							{{-- true expr --}}
							<h3>Aun no tiene direccion Fisica</h3>
						@else
							{{-- false expr --}}

						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="calle">Calle:</label>
		    					<dd>{{$convenio->direccionFisicaProvedor->calle}}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numext">Numero exterior:</label>
		    					<dd>{{$convenio->direccionFisicaProvedor->numext}}</dd>
		  					</div>	
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numint">Numero interior:</label>
		    					<dd>{{$convenio->direccionFisicaProvedor->numint}}</dd>
		  					</div>		
						</div>
						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="colonia">Colonia:</label>
		  						<dd>{{$convenio->direccionFisicaProvedor->colonia}}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="municipio">Delegación o Municipio:</label>
		  						<dd>{{$convenio->direccionFisicaProvedor->municipio}}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="ciudad">Ciudad:</label>
		  						<dd>{{ $convenio->direccionFisicaProvedor->ciudad }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="estado">Estado:</label>
		  						<dd>{{$convenio->direccionFisicaProvedor->estado}}</dd>
		  					</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle1">Entre calle:</label>
		  						<dd>{{$convenio->direccionFisicaProvedor->calle1}}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle2">Y calle:</label>
		  						<dd>{{$convenio->direccionFisicaProvedor->calle2}}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="referencia">Referencia:</label>
		  						<dd>{{$convenio->direccionFisicaProvedor->referencia}}</dd>
		  					</div>
						</div>
						@endif
					</div>
				</div>
				<div class="panel-default pestana" id="tab3{{$convenio->id}}">
					<div class="panel-heading">
						contactos Provedor:
					</div>
					
					@if (!isset($convenio->contactosProvedor))
					<div class="panel-body">
						<h3>Aún no tienes contactos Provedor</h3>
					</div>
					@endif
					@if (isset($convenio->contactosProvedor))
					<div class="panel-body">
						<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
							<thead>
								<tr class="info">
									<th>Nombre del contacto</th>
									<th>Telèfono Directo</th>
									
									<th>Telèfono celular</th>
								</tr>
							</thead>
							@foreach ($convenio->contactosProvedor as $contacto)
								<tr class="active">
									<td>{{ $contacto->nombre }} {{$contacto->apater}} {{$contacto->amater}}</td>

									<td>{{$contacto->telefono1}}</td>
									
									<td>{{$contacto->celular1}}</td>
									
								</tr>
								</tbody>
							@endforeach
						</table>
					</div>
					@endif
				</div>
				
							
				<div class="panel-default pestana" id="tab4{{$convenio->id}}">
				 	<div class="panel-heading">Datos Generales:</div>
				 	@if ($convenio->datosGeneralesProvedor == null)
						<div class="panel-body">
							<h3>Aún no tienes datos generales</h3>
						</div>
						@endif
						@if ($convenio->datosGeneralesProvedor != null)
				 	<div class="panel-body">
				 		<div class="col-md-12 offset-md-2 mt-3">
				 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				 			<label class="control-label" for="nombre">Tamaño de la empresa:</label>
								<dd>{{$convenio->datosGeneralesProvedor->nombre}}</dd>
				 			</div>
				 		</div>
				 		<div class="col-md-12 offset-md-2 mt-3">
				 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				 				<label class="control-label" for="web">Sitio web:</label>
				 				<dd>{{$convenio->datosGeneralesProvedor->web}}</dd>
				 			</div>

				 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				 				<label class="control-label" for="comentario">Comentarios:</label>
				 				<dd>{{$convenio->datosGeneralesProvedor->comentario}}</dd>
				 			</div>
				 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				 				<label class="control-label" for="fechacontacto">Fecha de contacto:</label>
				 				<dd>{{$convenio->datosGeneralesProvedor->fechacontacto}}</dd>
				 			</div>
				 		</div>
				 	</div>
				 	@endif
				</div>
			</div>
		</div>
	</div>
@endforeach
					{{--   TABLA VISTA RÀPIDA  --}}





	
</div>


@endsection