@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Convenios:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-success" href="{{ route('convenios.create') }}"><strong>Agregar Convenio</strong></a>
					</div>
				</div>
			</div>
			<div class="panel-body" id="datos" name="datos">
				<div class="row">
					<div class="col-sm-12">
						<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0;">
							<tr class="info">
								<th>@sortablelink('id', 'Identificador')</th>
								<th>@sortablelink('nombre', 'Nombre/Razón Social'){{-- Nombre --}}</th>
								<th>@sortablelink('tipopersona', 'Tipo de persona')</th>
								<th>@sortablelink('alias', 'Alias')</th>
								<th>@sortablelink('rfc', 'RFC')</th>
								<th>@sortablelink('vendedor', 'Vendedor') </th>
								<th>Acción</th>
							</tr>
							@foreach($convenios as $convenio)
							<tr class="active" title="Haz Click Aquì para Ver" style="cursor: pointer" href="#{{ $convenio->id }}">
								<td>{{ $convenio->id }}</td>
								<td>
									@if($convenio->tipopersona == "Fisica")
									{{ $convenio->nombre }} {{ $convenio->apellidopaterno }} {{ $convenio->apellidomaterno }}
									@else
									{{ $convenio->razonsocial }}
									@endif
								</td>
								<td>{{ $convenio->tipopersona }}</td>
								<td>{{ $convenio->alias }}</td>
								<td>{{ strtoupper($convenio->rfc) }}</td>
								<td>{{ $convenio->vendedor }}</td>
								<td class="text-center">
									<a class="btn btn-primary btn-sm" href="{{ route('convenios.show',['provedor' => $convenio]) }}">
										<i class="fa fa-eye" aria-hidden="true"></i> <strong>Ver</strong>
									</a>
									<a class="btn btn-warning btn-sm" href="{{ route('convenios.edit',['provedor' => $convenio]) }}">
										<i class="fa fa-pencil-square-o" aria-hidden="true"></i> <strong>Editar</strong>
									</a>
								</td>
							</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
		</div>
		@foreach ($convenios as $convenio)
		<div class="persona" id="{{ $convenio->id }}">
			<div class="panel-default">
				<div class="panel-heading">
					<h4>
						@if($convenio->tipopersona == "Fisica")
						{{ ucwords($convenio->nombre) . " " . ucwords($convenio->apellidopaterno) . " " . ucwords($convenio->apellidomaterno) }}
						@else
						{{ ucwords($convenio->razonsocial) }}
						@endif:
					</h4>
				</div>
			</div>
			<ul class="nav nav-tabs nav-pills nav-justified">
				<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active active"><a href="#tab1{{ $convenio->id }}" id="ui-id-1">Dirección Física:</a></li>
				<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="#tab2{{ $convenio->id }}" class="ui-tabs-anchor" id="ui-id-2">Dirección Fiscal:</a></li>
				<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="#tab3{{ $convenio->id }}" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a></li>
				<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="#tab4{{ $convenio->id }}" class="ui-tabs-anchor" id="ui-id-4">Tipo de convenio:</a></li>
			</ul>
			<div class="panel-default pestana" aria-hidden="false" id="tab1{{ $convenio->id }}" style="display: block;">
				<div class="panel-heading">
					<h5>Dirección Física:</h5>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-3">
	    					<label class="control-label" for="calle">Calle:</label>
	    					<dd>{{ $convenio->calle }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="numext">Numero exterior:</label>
	    					<dd>{{ $convenio->numext }}</dd>
	  					</div>	
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="numinter">Numero interior:</label>
	    					<dd>{{ $convenio->numinter }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="cp">Código postal:</label>
	    					<dd>{{ $convenio->cp }}</dd>
	  					</div>		
					</div>
					<div class="row" id="perfisica">
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="colonia">Colonia:</label>
	  						<dd>{{ $convenio->colonia }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="municipio">Delegación o Municipio:</label>
	  						<dd>{{ $convenio->municipio }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="ciudad">Ciudad:</label>
	  						<dd>{{ $convenio->ciudad }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="estado">Estado:</label>
	  						<dd>{{ $convenio->estado }}</dd>
	  					</div>
					</div>
					<div class="row" id="perfisica">
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="calle1">Entre calle:</label>
	  						<dd>{{ $convenio->calle1 }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="calle2">Y calle:</label>
	  						<dd>{{ $convenio->calle2 }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="referencia">Referencia:</label>
	  						<dd>{{ $convenio->referencia }}</dd>
	  					</div>
					</div>
				</div>
			</div>
			<div class="panel-default pestana" id="tab2{{ $convenio->id }}">
				<div class="panel-heading">
					<h5>Dirección Fiscal:</h5>
				</div>
				<div class="panel-body">
					@if (!isset($convenio->direccionFiscal))
					<h3>Aún no tiene dirección fiscal</h3>
					@else
					<div class="row">
						<div class="form-group col-sm-3">
	    					<label class="control-label" for="calle">Calle:</label>
	    					<dd>{{$convenio->direccionFiscal->calle}}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="numext">Numero exterior:</label>
	    					<dd>{{$convenio->direccionFiscal->numext}}</dd>
	  					</div>	
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="numint">Numero interior:</label>
	    					<dd>{{$convenio->direccionFiscal->numint}}</dd>
	  					</div>		
					</div>
					<div class="row" id="perfisica">
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="colonia">Colonia:</label>
	  						<dd>{{$convenio->direccionFiscal->colonia}}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="municipio">Delegación o Municipio:</label>
	  						<dd>{{$convenio->direccionFiscal->municipio}}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="ciudad">Ciudad:</label>
	  						<dd>{{ $convenio->direccionFiscal->ciudad }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="estado">Estado:</label>
	  						<dd>{{ $convenio->direccionFiscal->estado }}</dd>
	  					</div>
					</div>
					<div class="row" id="perfisica">
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="calle1">Entre calle:</label>
	  						<dd>{{ $convenio->direccionFiscal->calle1 }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="calle2">Y calle:</label>
	  						<dd>{{ $convenio->direccionFiscal->calle2 }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="referencia">Referencia:</label>
	  						<dd>{{ $convenio->direccionFiscal->referencia }}</dd>
	  					</div>
					</div>
					@endif
				</div>
			</div>
			<div class="panel-default pestana" id="tab3{{ $convenio->id }}">
				<div class="panel-heading">
					<h5>Contactos:</h5>
				</div>
				@if(count($convenio->contactos) == 0)
				<div class="panel-body">
					<h3>Aún no tiene contactos</h3>
				</div>
				@else
				<div class="panel-body">
					<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0;">
						<tr class="info">
							<th>Nombre del contacto</th>
							<th>Telèfono Directo</th>
							<th>Telèfono celular</th>
						</tr>
						@foreach($convenio->contactos as $contacto)
						<tr class="active">
							<td>{{ $contacto->nombre }} {{ $contacto->apater }} {{ $contacto->amater }}</td>
							<td>{{ $contacto->telefono1 }}</td>
							<td>{{ $contacto->celular1 }}</td>
						</tr>
						@endforeach
					</table>
				</div>
				@endif
			</div>	
			<div class="panel-default pestana" id="tab4{{ $convenio->id }}">
			 	<div class="panel-heading">
			 		<h5>Tipo de Convenio:</h5>
			 	</div>
				<div class="panel-body">
				 	@if(count($convenio->tipos) == 0)
					<h3>Aún no tiene tipos de convenio</h3>
					@else
			 		<table class="table table-striped table-hover table-bordered" style="margin-bottom: 0;">
			 			<tr class="info">
				 			<th>Nombre:</th>
				 			<th>Descuento:</th>
				 			<th>Citas y Productos (Anual):</th>
				 			<th>Inicio:</th>
				 			<th>Fin:</th>
			 			</tr>
				 		@foreach($convenio->tipos as $tipo)
						<tr>
							<td>{{ $tipo->nombre }}</td>
							<td>
								{{ $tipo->desc_prod }}% en productos
								<br>
								{{ $tipo->desc_cita }}% en citas
							</td>
							<td>
								{{ $tipo->num_prod }} producto(s)
								<br>
								{{ $tipo->num_cita }} cita(s)
							</td>
							<td>{{ $tipo->valido_inicio }}</td>
							<td>{{ $tipo->valido_fin }}</td>
						</tr>
				 		@endforeach
			 		</table>
				 	@endif
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>

@endsection