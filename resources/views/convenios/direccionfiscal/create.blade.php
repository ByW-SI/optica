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
			<form method="POST" name="domicilio" action="{{ route('convenios.direccionfiscal.store', ['convenio' => $convenio]) }}">
				{{ csrf_field() }}
				<input type="hidden" name="convenio_id" value="{{ $convenio->id }}">
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
							<div class="form-group col-sm-12 text-center">
								<div class="toogle-group">
									<label>¿Usar datos de Dirección Física?</label>
									<div class="row">
										<div class="col-sm-12">
											<input id="dirfiscal" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" onchange="datosFiscal()">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-3">
								<label class="control-label" for="calle">✱Calle:</label>
								<input type="text" class="form-control" id="calle" name="calle" value="" autofocus required>
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="numext">✱Numero exterior:</label>
								<input type="text" class="form-control" id="numext" name="numext" value="" required>
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="numint">Numero interior:</label>
								<input type="text" class="form-control" id="numint" name="numint" value="">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="colonia">✱Colonia:</label>
								<input type="text" class="form-control" id="colonia" name="colonia" value="" required>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-3">
								<label class="control-label" for="municipio">✱Delegación o Municipio:</label>
								<input type="text" class="form-control" id="municipio" name="municipio" value="" required>
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="ciudad">✱Ciudad:</label>
								<input type="text" class="form-control" id="ciudad" name="ciudad" value="" required>
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="estado">✱Estado:</label>
								<input type="text" class="form-control" id="estado" name="estado" value="" required>
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="calle1">Entre calle:</label>
								<input type="text" class="form-control" id="calle1" name="calle1" value="">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-3">
								<label class="control-label" for="calle2">Y calle:</label>
								<input type="text" class="form-control" id="calle2" name="calle2" value="">
							</div>
							<div class="form-group col-sm-3">
								<label class="control-label" for="referencia">Referencia:</label>
								<input type="text" class="form-control" id="referencia" name="referencia" value="">
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

<script>

	function datosFiscal() {
        if($('#dirfiscal').prop('checked')) {
	    	document.domicilio.calle.defaultValue = "{{ $convenio->calle }}";
	   		document.domicilio.numext.defaultValue = "{{ $convenio->numext }}";
	    	document.domicilio.numint.defaultValue = "{{ $convenio->numinter }}";
	    	document.domicilio.colonia.defaultValue = "{{ $convenio->colonia }}";
	    	document.domicilio.municipio.defaultValue = "{{ $convenio->municipio }}";
	    	document.domicilio.ciudad.defaultValue = "{{ $convenio->ciudad }}";
	    	document.domicilio.estado.defaultValue = "{{ $convenio->estado }}";
	    	document.domicilio.calle1.defaultValue = "{{ $convenio->calle1 }}";
	    	document.domicilio.calle2.defaultValue = "{{ $convenio->calle2 }}";
	    	document.domicilio.referencia.defaultValue = "{{ $convenio->referencia }}";
		} else {
            document.domicilio.calle.defaultValue = "";
            document.domicilio.numext.defaultValue = "";
            document.domicilio.numint.defaultValue = "";
            document.domicilio.colonia.defaultValue = "";
            document.domicilio.municipio.defaultValue = "";
            document.domicilio.ciudad.defaultValue = "";
            document.domicilio.estado.defaultValue = "";
            document.domicilio.calle1.defaultValue = "";
            document.domicilio.calle2.defaultValue = "";
            document.domicilio.referencia.defaultValue = "";
		}
    }

</script>

@endsection