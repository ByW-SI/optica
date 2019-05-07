@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group" >
		<form  method="POST" action="{{ route('convenios.update', ['convenio' => $convenio]) }}">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT">
			<div class="panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-sm-4">
							<h4>Datos del Convenio:</h4>
						</div>
						<div class="col-sm-4 text-center">
							<a class="btn btn-success" href="{{ route('convenios.create')}}">
								<i class="fa fa-plus"></i><strong> Agregar Convenio</strong>
							</a>
						</div>
						<div class="col-sm-4 text-center">
							<a class="btn btn-primary" href="{{ route('convenios.index') }}">
								<i class="fa fa-bars"></i><strong> Lista de Convenios</strong>
							</a>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="tipopersona">✱Tipo de Persona:</label>
	    					<select type="select" name="tipopersona" class="form-control" id="tipopersona" onchange="persona(this)">
	    						<option id="Fisica" value="Fisica"<?php echo $convenio->tipopersona == 'Fisica' ? 'selected=""' : '' ?>>Fisica</option>
	    						<option id="Moral" value="Moral"<?php echo $convenio->tipopersona == 'Moral' ? 'selected=""' : '' ?>>Moral</option>
	    					</select>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="alias">✱Alias:</label>
	  						<input type="text" class="form-control" id="alias" name="alias" value="{{ $convenio->alias }}" required autofocus>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="rfc">✱RFC:</label>
	  						<input type="text" class="form-control" id="rfc" name="rfc" value="{{ $convenio->rfc }}" required>
	  					</div>
						<div id="perfisica">
							<div class="form-group col-sm-3">
		  						<label class="control-label" for="nombre">✱Nombre(s):</label>
		  						<input type="text" class="form-control" id="nombre" name="nombre" value="{{ $convenio->nombre }}">
		  					</div>
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="apellidopaterno">✱Apellido Paterno:</label>
		  						<input type="text" class="form-control" id="apellidopaterno" name="apellidopaterno" value="{{ $convenio->apellidomaterno }}">
		  					</div>
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
		  						<input type="text" class="form-control" id="apellidomaterno" name="apellidomaterno" value="{{ $convenio->apellidomaterno }}">
		  					</div>
						</div>
						<div id="permoral" style="display: none;">
							<div class="form-group col-sm-3">
		  						<label class="control-label" for="razonsocial">✱Razon Social:</label>
		  						<input type="text" class="form-control" id="razonsocial" name="razonsocial" value="{{ $convenio->razonsocial }}">
		  					</div>
						</div>
					</div>
				</div>
			</div>
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
	    					<label class="control-label" for="calle">✱Calle:</label>
	    					<input type="text" class="form-control" id="calle" name="calle" value="{{ $convenio->calle }}" required>
	  					</div>
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="numext">✱Numero exterior:</label>
	    					<input type="text" class="form-control" id="numext" name="numext" value="{{ $convenio->numext }}" required>
	  					</div>	
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="numinter">Numero interior:</label>
	    					<input type="text" class="form-control" id="numinter" name="numinter" value="{{ $convenio->numinter }}">
	  					</div>	
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="colonia">✱Colonia:</label>
	  						<input type="text" class="form-control" id="colonia" name="colonia" value="{{ $convenio->colonia }}" required>
	  					</div>
					</div>
					<div class="row">
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="municipio">✱Delegación o Municipio:</label>
	  						<input type="text" class="form-control" id="municipio" name="municipio" value="{{ $convenio->municipio }}" required>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="ciudad">✱Ciudad:</label>
	  						<input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $convenio->ciudad }}" required>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="estado">✱Estado:</label>
	  						<input type="text" class="form-control" id="estado" name="estado" value="{{ $convenio->estado }}" required>
	  					</div>
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="calle1">Entre calle:</label>
	  						<input type="text" class="form-control" id="calle1" name="calle1" value="{{ $convenio->calle1 }}">
	  					</div>
					</div>
					<div class="row">
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="calle2">Y calle:</label>
	  						<input type="text" class="form-control" id="calle2" name="calle2" value="{{ $convenio->calle2 }}">
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="referencia">Referencia:</label>
	  						<input type="text" class="form-control" id="referencia" name="referencia" value="{{ $convenio->referencia }}">
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
		</form>
	</div>
</div>

@endsection