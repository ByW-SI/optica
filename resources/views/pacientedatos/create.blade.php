@extends('layouts.infopaciente')
@section('infopaciente')
<div>
		<ul class="nav nav-pills nav-justified">
			<li role="presentation" class="active"><a href=""  class="ui-tabs-anchor">Generales:</a></li> 
			{{--  {{ route('empleados.show',['empleado'=>$empleado]) }}--}}

			<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor" >Historial Médico:</a></li>

			<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">Historial Ocular:</a></li>

			<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">Ortopédico:</a></li>

			<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">Citas:</a></li>

			<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">C.R.M:</a></li>
		</ul>
	</div>
	{{-- DATOS GENERALES --}}
						
							
							<div class="panel-default">
								@if ($edit == true)
				{{-- true expr --}}

		
				<form role="form" method="POST" action="{{ route('pacientes.datosgenerales.update',['paciente'=>$paciente,'datosgenerale'=>$paciente->generales]) }}">

				{{ csrf_field() }}
				<input type="hidden" name="_method" value="PUT">
			@else
				{{-- false expr --}}
			<form role="form" method="POST" action="{{ route('pacientes.datosgenerales.store',['paciente'=>$paciente]) }}">
				{{ csrf_field() }}
			@endif
						
								<div class="panel-heading jumbotron"><h5><strong>Datos Generales:</strong>&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</h5></div>
								<div class="panel-body">
									<input type="hidden" name="paciente_id" value="{{$paciente->id}}" id="paciente_id">	
									<div class="col-xs-offset-2 form-group col-xs-4">
										<label class="control-label">Ocupación:</label>
										<input class="form-control" type="text" name="ocupacion" 
										@if ($edit == true)
										value="{{$paciente->generales->ocupacion}}"
										@endif>
									</div>
									<div class="form-group col-xs-4">
										<label class="control-label">Convenio:</label>
										<select class="form-control" name="convenio">
											<option>Convenio 1</option>
											<option>Convenio 2</option>
											<option>Convenio ...</option>
										</select>
									</div>
								</div>
								<div class="panel-heading jumbotron"><h5><strong>Dirección:<strong>&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</h5></div>
								<div class="panel-body">
								<div class="form-group col-xs-3">
									<label class="control-label">Calle:</label>
									<input class="form-control" type="text" name="calle" 
									@if ($edit == true)
										value="{{$paciente->generales->calle}}"
										@endif>
								</div>
								<div class="form-group col-xs-3">
									<label class="control-label">Número Interior:</label>
									<input class="form-control" type="text" name="numint" 
									@if ($edit == true)
										value="{{$paciente->generales->numint}}"
										@endif>
								</div>
								<div class="form-group col-xs-3">
									<label class="control-label">Número Exterior:</label>
									<input class="form-control" type="text" name="numext"
									@if ($edit == true)
										value="{{$paciente->generales->numext}}"
										@endif>
								</div>
								<div class="form-group col-xs-3">
									<label class="control-label">Codigo Postal:</label>
									<input class="form-control" type="text" name="cp"
									@if ($edit == true)s
										value="{{$paciente->generales->cp}}"
										@endif>
								</div>
								<div class="form-group col-xs-3">
									<label class="control-label">Delegación/Municipio:</label>
									<input class="form-control" type="text" name="municipio"
									@if ($edit == true)
										value="{{$paciente->generales->municipio}}"
										@endif>
								</div>
								<div class="form-group col-xs-3">
									<label class="control-label">Estado:</label>
									<input class="form-control" type="text" name="estado"
									@if ($edit == true)
										value="{{$paciente->generales->estado}}"
										@endif>
								</div>
								</div>
								<div class="panel-heading jumbotron"><h5><strong>Contacto:</strong>&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</h5></div>
								<div class="panel-body">
								<div class="form-group col-xs-4">
									<label class="control-label">Telefono Casa:</label>
									<input class="form-control" type="text" name="telcasa"
									@if ($edit == true)
										value="{{$paciente->generales->telcasa}}"
										@endif>
								</div>
								<div class="form-group col-xs-4">
									<label class="control-label">Telefono Oficina:</label>
									<input class="form-control" type="text" name="teloficina"
									@if ($edit == true)
										value="{{$paciente->generales->teloficina}}"
										@endif>
								</div>
								<div class="form-group col-xs-4">
									<label class="control-label">Telefono celular:</label>
									<input class="form-control" type="text" name="telcelular"
									@if ($edit == true)
										value="{{$paciente->generales->telcelular}}"
										@endif>
								</div>
								<div class="form-group col-xs-4">
									<label class="control-label">Email:</label>
									<input class="form-control" type="mail" name="email"
									@if ($edit == true)
										value="{{$paciente->generales->email}}"
										@endif>
								</div>
								<div class="col-xs-4 col-xs-offset-5">
										
								<button id="submit" type="submit" class="btn btn-success">
										<strong>Guardar</strong>
								</button>
										
										

									</div>
								</div>

								
								
								</form>
								</div>

							
						
						
						
				{{-- DATOS GENERALES --}}





@endsection