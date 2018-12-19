@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos de la Sucursal:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-success" href="{{ route('sucursales.create') }}">
							<i class="fa fa-plus"></i><strong> Agregar Sucursal</strong>
						</a>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-primary" href="{{ route('sucursales.index') }}">
							<i class="fa fa-bars"></i><strong> Lista de Sucursales</strong>
						</a>
					</div>
				</div>
			</div>
			<form role="form" id="form-sucursal" method="POST" action="{{ route('sucursales.update', ['sucursal' => $sucursal]) }}">
				<input type="hidden" name="_method" value="PUT">
				{{ csrf_field() }}
				<div class="panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="form-group col-sm-3">
								<label class="control-label" for="nombre">✱Nombre:</label>
								<input type="text" class="form-control" id="nombre" name="nombre" required="" value="{{ $sucursal->nombre }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="responsable">✱Responsable :</label>
								<input type="text" class="form-control" id="responsable" name="responsable" required="" value="{{ $sucursal->responsable }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="claveid">ID:</label>
								<input type="text" class="form-control" id="claveid" name="claveid" readonly value="{{ $sucursal->claveid }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="region">✱Región:</label>
		    					<select name="region" class="form-control" id="region" required="">
		    						<option value="">Seleccionar</option>
		    						<option value="Región 1" {{ $sucursal->region == 'Región 1' ? 'selected' : '' }}>Región 1</option>
		    						<option value="Región 2" {{ $sucursal->region == 'Región 2' ? 'selected' : '' }}>Región 2</option>
		    						<option value="Región 3" {{ $sucursal->region == 'Región 3' ? 'selected' : '' }}>Región 3</option>
		    						<option value="Región 4" {{ $sucursal->region == 'Región 4' ? 'selected' : '' }}>Región 4</option>
		    					</select>
							</div>
						</div>
					</div>
					<div class="panel-heading">
						<div class="row">
							<div class="col-sm-4">
								<h5>Direcciòn de la Sucursal:</h5>
							</div>
						</div>
					</div>
			        <div class="panel-body">
			        	<div class="row">
							<div class="form-group col-sm-3">
								<label class="control-label" for="calle">✱Calle:</label>
								<input type="text" class="form-control" id="calle" name="calle" required="" value="{{ $sucursal->calle }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="numext">✱Número exterior:</label>
								<input type="text" class="form-control" id="numext" name="numext" required="" value="{{ $sucursal->numext }}">
							</div>	
							<div class="form-group col-sm-3">
								<label class="control-label" for="numint">Número interior:</label>
								<input type="text" class="form-control" id="numint" name="numint" value="{{ $sucursal->numint }}">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-3">
								<label class="control-label" for="colonia">✱Colonia:</label>
								<input type="text" class="form-control" id="colonia" name="colonia" required="" value="{{ $sucursal->colonia }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="delegacion">✱Municipio:</label>
								<input type="text" class="form-control" id="delegacion" name="delegacion" required="" value="{{ $sucursal->delegacion }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="ciudad">✱Ciudad:</label>
								<input type="text" class="form-control" id="ciudad" name="ciudad" required="" value="{{ $sucursal->ciudad }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="estado">✱Estado:</label>
								<input type="text" class="form-control" id="estado" name="estado" required="" value="{{ $sucursal->estado }}">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-3">
								<label class="control-label" for="calle1">Entre calle:</label>
								<input type="text" class="form-control" id="calle1" name="calle1" value="{{ $sucursal->calle1 }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="calle2">Y calle:</label>
								<input type="text" class="form-control" id="calle2" name="calle2" value="{{ $sucursal->calle2 }}">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="referencia">Referencia:</label>
								<input type="text" class="form-control" id="referencia" name="referencia" value="{{ $sucursal->referencia }}">
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
</div>

<script type="text/javascript">
	
	$(document).ready(function() {
		$("#calle").keyup(function() {
			var calle = $("#calle").val();
			var sub = calle.substring(0, 3);
			$("#claveid").val(sub + {{ $integer }});
		});
	});

</script>

@endsection