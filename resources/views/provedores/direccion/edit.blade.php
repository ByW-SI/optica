@extends('layouts.infoprovedor')
	@section('cliente')
		<ul role="tablist" class="nav nav-tabs">
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab">
				<a href="{{ route('provedores.show',['provedore'=>$provedore]) }}">Dirección Fìsica:</a>
			</li>
			<li class="active">
				<a href="{{ route('provedores.direccionfisica.index',['provedore'=>$provedore]) }}">Dirección Fiscal:</a>
			</li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false">
				<a href="{{ route('provedores.contacto.index',['cliente'=>$provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a>
			</li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false">
				<a href="{{ route('provedores.datosgenerales.index',['cliente'=>$provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Datos Generales:</a>
			</li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false">
				<a href="{{ route('provedores.datosbancarios.index', ['cliente' => $provedore]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-4">Datos Bancarios:</a>
			</li>
		</ul>
	<div class="panel panel-default">
					<div class="panel-heading">Dirección Fiscal:
						&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos

					</div>
		<form role="form" name="domicilio" id="form-cliente" method="POST" action="{{ route('provedores.direccionfisica.update',['provedore'=>$provedore, 'direccion'=>$direccion]) }}" name="form">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="PUT">
					 <input type="hidden" name="provedor_id" value="{{$provedore->id}}">
						<div class="panel-body">
								<div class="col-lg-offset-10">
									<button type="submit" class="btn btn-success">
								<strong>Guardar</strong>	
								</button>
									
								</div>
								<div class="boton checkbox-disabled">
									
									<label>

										<input id="boton-toggle" type="checkbox" checked data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios" onchange="datosFiscal();">
										¿Usar datos de dirección fìsica?.
									</label>
								</div>
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="calle"><i class="fa fa-asterisk" aria-hidden="true"></i> Calle:</label>
			    					<input type="text" class="form-control" id="calle" name="calle" value="{{ $direccion->calle }}" require autofocus>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numext"><i class="fa fa-asterisk" aria-hidden="true"></i> Numero exterior:</label>
			    					<input type="text" class="form-control" id="numext" name="numext" value="{{ $direccion->numext }}" required>
			  					</div>	
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numint">Numero interior:</label>
			    					<input type="text" class="form-control" id="numint" name="numint" value="{{ $direccion->numint }}">
			  					</div>		
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="colonia"><i class="fa fa-asterisk" aria-hidden="true"></i> Colonia:</label>
			  						<input type="text" class="form-control" id="colonia" name="colonia" value="{{ $direccion->colonia }}" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="municipio"><i class="fa fa-asterisk" aria-hidden="true"></i> Delegación o Municipio:</label>
			  						<input type="text" class="form-control" id="municipio" name="municipio" value="{{ $direccion->municipio }}" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ciudad"><i class="fa fa-asterisk" aria-hidden="true"></i> Ciudad:</label>
			  						<input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $direccion->ciudad }}" required>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="estado"><i class="fa fa-asterisk" aria-hidden="true"></i> Estado:</label>
			  						<input type="text" class="form-control" id="estado" name="estado" value="{{ $direccion->estado }}" required>
			  					</div>
							</div>
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle1">Entre calle:</label>
			  						<input type="text" class="form-control" id="calle1" name="calle1" value="{{ $direccion->calle1 }}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle2">Y calle:</label>
			  						<input type="text" class="form-control" id="calle2" name="calle2" value="{{ $direccion->calle2 }}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="referencia">Referencia:</label>
			  						<input type="text" class="form-control" id="referencia" name="referencia" value="{{ $direccion->referencia }}">
			  					</div>
							</div>
						</div>
					</div>
  				</div>
			</form>
		</div>
	</div>
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
		<script type="text/javascript">
			function datosFiscal(){
				document.domicilio.calle.defaultValue = "{{$provedore->calle}}";
				document.domicilio.numext.defaultValue = "{{$provedore->numext}}"; 
				document.domicilio.numint.defaultValue = "{{$provedore->numinter}}"; 
				document.domicilio.colonia.defaultValue = "{{$provedore->colonia}}"; 
				document.domicilio.municipio.defaultValue = "{{$provedore->municipio}}"; 
				document.domicilio.ciudad.defaultValue = "{{$provedore->ciudad}}"; 
				document.domicilio.estado.defaultValue = "{{$provedore->estado}}"; 
				document.domicilio.calle1.defaultValue = "{{$provedore->calle1}}"; 
				document.domicilio.calle2.defaultValue = "{{$provedore->calle2}}"; 
				document.domicilio.referencia.defaultValue = "{{$provedore->referencia}}"; 
			}
		</script>
	@endsection