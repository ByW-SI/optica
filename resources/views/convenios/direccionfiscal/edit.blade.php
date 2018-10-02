@extends('layouts.blank')
@section('content')

<div class="container" id="tab">
	<div role="application" class="panel panel-group">
		@include('convenios.head')
		<ul role="tablist" class="nav nav-tabs">
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('convenios.show',['convenio'=>$convenio]) }}" class="ui-tabs-anchor" id="ui-id-1">Dirección Fisica:</a></li>
			<li class="active"><a href="{{ route('convenios.direccionfiscal.index',['convenio'=>$convenio]) }}">Dirección Fiscal:</a></li>
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('convenios.contactos.index',['convenio'=>$convenio]) }}" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a></li>
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('convenios.tipoconvenios.index', ['convenio'=>$convenio]) }}" class="ui-tabs-anchor" id="ui-id-4">Tipos de convenio:</a></li>
		</ul>
		<div class="panel panel-default">
			<form role="form" name="domicilio" id="form-cliente" method="POST" action="{{ route('convenios.direccionfiscal.update',['convenio'=>$convenio, 'direccion'=>$direccion]) }}" name="form">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="PUT">
			 	<input type="hidden" name="convenio_id" value="{{$convenio->id}}">
				<div class="panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-sm-4">
								<h5>Dirección Fiscal: <small><i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</small></h5>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-4">
								<div class="toogle-group">
									<label>
										<input id="dirfiscal" checked type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No"  onchange="datosFiscal()"> ¿Usar datos de Dirección Física?.
						            </label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-3">
		    					<label class="control-label" for="calle"><i class="fa fa-asterisk" aria-hidden="true"></i> Calle:</label>
		    					<input type="text" class="form-control" id="calle" name="calle" value="{{ $direccion->calle }}" require autofocus>
		  					</div>
		  					<div class="form-group col-sm-3">
		    					<label class="control-label" for="numext"><i class="fa fa-asterisk" aria-hidden="true"></i> Numero exterior:</label>
		    					<input type="text" class="form-control" id="numext" name="numext" value="{{ $direccion->numext }}" required>
		  					</div>	
		  					<div class="form-group col-sm-3">
		    					<label class="control-label" for="numint">Numero interior:</label>
		    					<input type="text" class="form-control" id="numint" name="numint" value="{{ $direccion->numint }}">
		  					</div>		
						</div>
						<div class="row" id="perfisica">
							<div class="form-group col-sm-3">
		  						<label class="control-label" for="colonia"><i class="fa fa-asterisk" aria-hidden="true"></i> Colonia:</label>
		  						<input type="text" class="form-control" id="colonia" name="colonia" value="{{ $direccion->colonia }}" required>
		  					</div>
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="municipio"><i class="fa fa-asterisk" aria-hidden="true"></i> Delegación o Municipio:</label>
		  						<input type="text" class="form-control" id="municipio" name="municipio" value="{{ $direccion->municipio }}" required>
		  					</div>
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="ciudad"><i class="fa fa-asterisk" aria-hidden="true"></i> Ciudad:</label>
		  						<input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $direccion->ciudad }}" required>
		  					</div>
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="estado"><i class="fa fa-asterisk" aria-hidden="true"></i> Estado:</label>
		  						<input type="text" class="form-control" id="estado" name="estado" value="{{ $direccion->estado }}" required>
		  					</div>
						</div>
						<div class="row" id="perfisica">
							<div class="form-group col-sm-3">
		  						<label class="control-label" for="calle1">Entre calle:</label>
		  						<input type="text" class="form-control" id="calle1" name="calle1" value="{{ $direccion->calle1 }}">
		  					</div>
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="calle2">Y calle:</label>
		  						<input type="text" class="form-control" id="calle2" name="calle2" value="{{ $direccion->calle2 }}">
		  					</div>
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="referencia">Referencia:</label>
		  						<input type="text" class="form-control" id="referencia" name="referencia" value="{{ $direccion->referencia }}">
		  					</div>
						</div>
						<div class="row">
							<div class="col-sm-12 text-center">
								<button type="submit" class="btn btn-success">
									<strong>Guardar</strong>	
								</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

		<script type="text/javascript">
			function datosFiscal(){
				document.domicilio.calle.defaultValue = "{{$convenio->calle}}";
				document.domicilio.numext.defaultValue = "{{$convenio->numext}}"; 
				document.domicilio.numint.defaultValue = "{{$convenio->numinter}}"; 
				document.domicilio.colonia.defaultValue = "{{$convenio->colonia}}"; 
				document.domicilio.municipio.defaultValue = "{{$convenio->municipio}}"; 
				document.domicilio.ciudad.defaultValue = "{{$convenio->ciudad}}"; 
				document.domicilio.estado.defaultValue = "{{$convenio->estado}}"; 
				document.domicilio.calle1.defaultValue = "{{$convenio->calle1}}"; 
				document.domicilio.calle2.defaultValue = "{{$convenio->calle2}}"; 
				document.domicilio.referencia.defaultValue = "{{$convenio->referencia}}"; 
			}
		</script>
	@endsection