@extends('layouts.blank')
@section('content')
		
<div class="container">
	<div class="panel panel-group">
		<form method="POST" action="{{ route('convenios.store') }}">
			{{ csrf_field() }}
			<div class="panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-sm-4">
							<h4>Datos del Convenio:</h4>
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
	    						<option id="Fisica" value="Fisica">Fisica</option>
	    						<option id="Moral" value="Moral">Moral</option>
	    					</select>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="alias">✱Alias:</label>
	  						<input type="text" class="form-control" id="alias" name="alias" required autofocus>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="rfc">✱RFC:</label>
	  						<input type="text" class="form-control" id="varrfc" name="rfc" required minlength="12" maxlength="13" pattern="^[A-Za-z]{4}[0-9]{6}[A-Za-z0-9]{3}" placeholder="Ingrese 13 caracteres" title="Siga el formato 4 letras seguidas por 6 digitos y 3 caracteres">
	  					</div>
						<div id="perfisica">
							<div class="form-group form-group col-sm-3">
		  						<label class="control-label" for="nombre">✱Nombre:</label>
		  						<input type="text" class="form-control" id="nombre" name="nombre" required="">
		  					</div>
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="apellidopaterno">✱Apellido Paterno:</label>
		  						<input type="text" class="form-control" id="apellidopaterno" name="apellidopaterno" required="">
		  					</div>
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
		  						<input type="text" class="form-control" id="apellidomaterno" name="apellidomaterno">
		  					</div>
						</div>
						<div id="permoral" style="display: none;">
							<div class="form-group col-sm-3">
		  						<label class="control-label" for="razonsocial">✱Razon Social:</label>
		  						<input type="text" class="form-control" id="razonsocial" name="razonsocial">
		  					</div>
						</div>
					</div>
				</div>
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
	    					<input type="text" class="form-control" id="calle" name="calle" required>
	  					</div>
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="numext">✱Numero exterior:</label>
	    					<input type="text" class="form-control" id="numext" name="numext" required>
	  					</div>	
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="numinter">Numero interior:</label>
	    					<input type="text" class="form-control" id="numinter" name="numinter">
	  					</div>
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="colonia">✱Colonia:</label>
	  						<input type="text" class="form-control" id="colonia" name="colonia" required>
	  					</div>
					</div>
					<div class="row" id="perfisica">
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="municipio">✱Delegación o Municipio:</label>
	  						<input type="text" class="form-control" id="municipio" name="municipio" required>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="ciudad">✱Ciudad:</label>
	  						<input type="text" class="form-control" id="ciudad" name="ciudad" required>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="estado">✱Estado:</label>
	  						<input type="text" class="form-control" id="estado" name="estado" required>
	  					</div>
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="calle1">Entre calle:</label>
	  						<input type="text" class="form-control" id="calle1" name="calle1">
	  					</div>
					</div>
					<div class="row" id="perfisica">
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="calle2">Y calle:</label>
	  						<input type="text" class="form-control" id="calle2" name="calle2">
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="referencia">Referencia:</label>
	  						<input type="text" class="form-control" id="referencia" name="referencia">
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

<script>
	
	$('#mytab a').click(function (e) {
		e.preventDefault();
		$('div#tab-pane').tab('hidden');
		$(this).tab('show');
	});

</script>

@endsection