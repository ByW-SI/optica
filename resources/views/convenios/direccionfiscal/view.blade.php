@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		@include('convenios.head')
		<ul class="nav nav-tabs">
			<li><a href="{{ route('convenios.show', ['convenio' => $convenio]) }}">Dirección Fisica:</a></li>
			<li class="active"><a href="{{ route('convenios.direccionfiscal.index', ['convenio' => $convenio]) }}">Dirección Fiscal:</a></li>
			<li><a href="{{ route('convenios.contactos.index', ['convenio' => $convenio]) }}">Contacto:</a></li>
			<li><a href="{{ route('convenios.tipoconvenios.index', ['convenio' => $convenio]) }}">Tipos de Convenios:</a></li>
		</ul>
		<div class="panel-default">
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
						<dd>{{ $direccion->calle }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="numext">Numero exterior:</label>
						<dd>{{ $direccion->numext }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="numint">Numero interior:</label>
						<dd>{{ $direccion->numint ? $direccion->numint : 'N/A' }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="colonia">Colonia:</label>
						<dd>{{ $direccion->colonia }}</dd>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="municipio">Delegación o Municipio:</label>
						<dd>{{ $direccion->municipio }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="ciudad">Ciudad:</label>
						<dd>{{ $direccion->ciudad }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="estado">Estado:</label>
						<dd>{{ $direccion->estado }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="calle1">Entre calle:</label>
						<dd>{{ $direccion->calle1 ? $direccion->calle1 : 'N/A' }}</dd>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="calle2">Y calle:</label>
						<dd>{{ $direccion->calle2 ? $direccion->calle2 : 'N/A' }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="referencia">Referencia:</label>
						<dd>{{ $direccion->referencia ? $direccion->referencia : 'N/A' }}</dd>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<div class="row">
					<div class="col-sm-12 text-center">
						<a class="btn btn-warning" href="{{ route('convenios.direccionfiscal.edit', ['convenio' => $convenio, 'fiscal' => $direccion]) }}">
							<i class="fa fa-pencil"></i> Editar
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection