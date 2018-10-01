@extends('layouts.blank')
@section('content')

<div class="container" id="tab">
	<div role="application" class="panel panel-group">
		@include('convenios.head')
		<ul role="tablist" class="nav nav-tabs">
			<li class="active"><a href="#tab1">Dirección Fisica:</a></li>
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('convenios.direccionfiscal.index', ['convenio' => $convenio]) }}" class="ui-tabs-anchor" id="ui-id-2">Dirección Fiscal:</a></li>
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('convenios.contactos.index', ['convenio' => $convenio]) }}" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a></li>
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('convenios.tipoconvenios.index', ['convenio' => $convenio]) }}" class="ui-tabs-anchor" id="ui-id-3">Tipo de Convenios:</a></li>
		</ul>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h5>Dirección Fisica:</h5>
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
	</div>
</div>

@endsection