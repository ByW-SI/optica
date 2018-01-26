@extends('layouts.blank')
	@section('content')
		<div class="container" id="tab">
			<div role="application" class="panel panel-group" >
				<div class="panel-default">
					<div class="panel-heading"><h4>Datos del provedor:</h4>
						<a class="btn btn-info" 
				           href="{{ route('convenios.create')}}">
							 <strong>
							   Agregar Nuevo Convenio
							</strong>
							</a>
					</div>
					<div class="panel-body">
						<div class="col-md-12 offset-md-2 mt-3">
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="tipopersona">Tipo de Persona:</label>
		    					<dd>{{ $convenio->tipopersona }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="alias">Alias:</label>
		  						<dd>{{ $convenio->alias }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="rfc">RFC:</label>
		  						<dd>{{ $convenio->rfc }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="vendedor">Vendedor:</label>
		  						<dd>{{ $convenio->vendedor }}</dd>
		  					</div>
						</div>
					@if ($convenio->tipopersona == "Fisica")
							{{-- true expr --}}
						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="nombre">Nombre(s):</label>
		  						<dd>{{ $convenio->nombre }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="apellidopaterno">Apellido Paterno:</label>
		  						<dd>{{ $convenio->apellidopaterno }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
		  						<dd>{{ $convenio->apellidomaterno }}</dd>
		  					</div>
						</div>
					@else
							{{-- false expr --}}
						<div class="col-md-12 offset-md-2 mt-3" id="permoral">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">

		  						<label class="control-label" for="razonsocial">Razon Social:</label>
		  						<dd>{{ $convenio->razonsocial }}</dd>
		  					</div>
						</div>
					@endif
					</div>
				</div>

				@yield('cliente')
			</div>
		</div>
	@endsection