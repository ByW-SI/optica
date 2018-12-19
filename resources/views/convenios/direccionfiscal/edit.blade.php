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
		<form name="domicilio" method="POST" action="{{ route('convenios.direccionfiscal.update', ['convenio' => $convenio, 'direccion' => $direccion]) }}">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT">
			<div class="panel-default">
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
		    					<label class="control-label" for="calle">✱Calle:</label>
		    					<input type="text" class="form-control" id="calle" name="calle" value="{{ $direccion->calle }}" require autofocus>
		  					</div>
		  					<div class="form-group col-sm-3">
		    					<label class="control-label" for="numext">✱Numero exterior:</label>
		    					<input type="text" class="form-control" id="numext" name="numext" value="{{ $direccion->numext }}" required>
		  					</div>
		  					<div class="form-group col-sm-3">
		    					<label class="control-label" for="numint">Numero interior:</label>
		    					<input type="text" class="form-control" id="numint" name="numint" value="{{ $direccion->numint }}">
		  					</div>
							<div class="form-group col-sm-3">
		  						<label class="control-label" for="colonia">✱Colonia:</label>
		  						<input type="text" class="form-control" id="colonia" name="colonia" value="{{ $direccion->colonia }}" required>
		  					</div>
						</div>
						<div class="row">
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="municipio">✱Delegación o Municipio:</label>
		  						<input type="text" class="form-control" id="municipio" name="municipio" value="{{ $direccion->municipio }}" required>
		  					</div>
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="ciudad">✱Ciudad:</label>
		  						<input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $direccion->ciudad }}" required>
		  					</div>
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="estado">✱Estado:</label>
		  						<input type="text" class="form-control" id="estado" name="estado" value="{{ $direccion->estado }}" required>
		  					</div>
							<div class="form-group col-sm-3">
		  						<label class="control-label" for="calle1">Entre calle:</label>
		  						<input type="text" class="form-control" id="calle1" name="calle1" value="{{ $direccion->calle1 }}">
		  					</div>
						</div>
						<div class="row">
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="calle2">Y calle:</label>
		  						<input type="text" class="form-control" id="calle2" name="calle2" value="{{ $direccion->calle2 }}">
		  					</div>
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="referencia">Referencia:</label>
		  						<input type="text" class="form-control" id="referencia" name="referencia" value="{{ $direccion->referencia }}">
		  					</div>
						</div>
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-sm-4 col-sm-offset-4 text-center">
				  				<button type="submit" class="btn btn-success">
					  				<i class="fa fa-check-circle"></i> Guardar
					  			</button>
							</div>
							<div class="col-sm-4 text-right text-danger">
								<h5>✱Campos Requeridos</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection