@extends('layouts.blank')
@section('content')

<div class="container" id="tab">
	<div class="panel panel-group">
		@include('convenios.head')
		<ul class="nav nav-tabs">
			<li class="active"><a href="{{ route('convenios.show', ['convenio' => $convenio]) }}">Dirección Fisica:</a></li>
			<li><a href="{{ route('convenios.direccionfiscal.index', ['convenio' => $convenio]) }}">Dirección Fiscal:</a></li>
			<li><a href="{{ route('convenios.contactos.index', ['convenio' => $convenio]) }}">Contacto:</a></li>
			<li><a href="{{ route('convenios.tipoconvenios.index', ['convenio' => $convenio]) }}">Tipos de Convenios:</a></li>
		</ul>
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h5>Dirección Fisica:</h5>
					</div>
				</div>
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
						<dd>{{ $convenio->numinter ? $convenio->numinter : 'N/A'  }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="colonia">Colonia:</label>
						<dd>{{ $convenio->colonia }}</dd>
					</div>
				</div>
				<div class="row">
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
					<div class="form-group col-sm-3">
						<label class="control-label" for="calle1">Entre calle:</label>
						<dd>{{ $convenio->calle1 ? $convenio->calle1 : 'N/A'  }}</dd>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="calle2">Y calle:</label>
						<dd>{{ $convenio->calle2 ? $convenio->calle2 : 'N/A' }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="referencia">Referencia:</label>
						<dd>{{ $convenio->referencia ? $convenio->referencia : 'N/A'  }}</dd>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection