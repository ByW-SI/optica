@extends('layouts.infoconvenio')
@section('cliente')
	{{-- expr --}}
	<ul role="tablist" class="nav nav-tabs">
		<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('convenios.show',['convenio'=>$convenio]) }}">Dirección Fisica:</a></li>
		<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('convenios.direccionfiscal.index',['convenio'=>$convenio]) }}">Dirección Fiscal:</a></li>
		<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('convenios.contactos.index',['convenio'=>$convenio]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a></li>
		<li role="presentation" tabindex="-1" class="active" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="{{ route('convenios.tipoconvenios.create', ['convenio'=>$convenio]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Tipo de Convenio:</a></li>
		
	</ul>
	<div class="panel panel-default">
		<div class="panel-heading"> Tipo de Convenio:
		&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</div>
		<div class="panel-body">
			<form> {{-- por agregar información --}}
				{{ csrf_field() }}
				<input type="hidden" name="convenio_id" value="{{$convenio->id}}" required>
				<div class="col-xs-offset-10">
						<button type="submit" class="btn btn-success">
					<strong>Guardar</strong>	</button>
						
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    					<label class="control-label" for="desc_prod"><i class="fa fa-asterisk" aria-hidden="true"></i> Descuento por producto:</label>
    					<div class="input-group">
    					<input type="number" class="form-control" id="desc_prod" name="desc_prod" value=""><span class="input-group-addon">%</span>
    				</div>
  					</div>
			</form>
		</div>
	</div>
@endsection