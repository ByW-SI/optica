@extends('layouts.blank')
@section('content')

<div class="container" id="tab">
	<div role="application" class="panel panel-group">
		@include('convenios.head')
		<ul role="tablist" class="nav nav-tabs">
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('convenios.show', ['convenio' => $convenio]) }}" class="ui-tabs-anchor" id="ui-id-1">Dirección Fisica:</a></li>
			<li class="active"><a href="{{ route('convenios.direccionfiscal.index', ['convenio' => $convenio]) }}">Dirección Fiscal:</a></li>
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('convenios.contactos.index', ['convenio' => $convenio]) }}" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a></li>
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('convenios.tipoconvenios.index', ['convenio' => $convenio]) }}" class="ui-tabs-anchor" id="ui-id-4">Tipos de Convenios:</a></li>
		</ul>
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h5>Dirección Fiscal:</h5>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="calle">Calle:</label>
						<dd>{{$direccion->calle}}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="numext">Numero exterior:</label>
						<dd>{{$direccion->numext}}</dd>
					</div>	
					<div class="form-group col-sm-3">
						<label class="control-label" for="numint">Numero interior:</label>
						<dd>{{$direccion->numint}}</dd>
					</div>		
				</div>
				<div class="row" id="perfisica">
					<div class="form-group col-sm-3">
						<label class="control-label" for="colonia">Colonia:</label>
						<dd>{{$direccion->colonia}}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="municipio">Delegación o Municipio:</label>
						<dd>{{$direccion->municipio}}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="ciudad">Ciudad:</label>
						<dd>{{$direccion->ciudad}}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="estado">Estado:</label>
						<dd>{{$direccion->estado}}</dd>
					</div>
				</div>
				<div class="row" id="perfisica">
					<div class="form-group col-sm-3">
						<label class="control-label" for="calle1">Entre calle:</label>
						<dd>{{$direccion->calle1}}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="calle2">Y calle:</label>
						<dd>{{$direccion->calle2}}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="referencia">Referencia:</label>
						<dd>{{$direccion->referencia}}</dd>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 text-center">
						<a class="btn btn-warning" href="{{ route('convenios.direccionfiscal.edit', ['convenio' => $convenio, 'fiscal' => $direccion]) }}">
							<strong>Editar</strong>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection