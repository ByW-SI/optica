@extends('layouts.infopaciente')
@section('infopaciente')
<div>
		<ul class="nav nav-pills nav-justified">
			<li role="presentation" class="active"><a href=""  class="ui-tabs-anchor">Generales:</a></li> 
			{{--  {{ route('empleados.show',['empleado'=>$empleado]) }}--}}

			<li role="presentation" class=""><a href="" class="ui-tabs-anchor">Historial Médico:</a></li>

			<li role="presentation" class=""><a href="" class="ui-tabs-anchor">Historial Ocular:</a></li>

			<li role="presentation" class=""><a href="" class="ui-tabs-anchor">Ortopédico:</a></li>

			<li role="presentation" class=""><a href="" class="ui-tabs-anchor">Citas:</a></li>

			<li role="presentation" class=""><a href="" class="ui-tabs-anchor">C.R.M:</a></li>
		</ul>
	</div>
	{{-- DATOS GENERALES --}}
						
							
							<div class="panel-default">
								@if ($edit == true)
				{{-- true expr --}}

		
				<form role="form" method="POST" action="{{ route('pacientes.datosgenerales.store',['paciente'=>$paciente]) }}">

				{{ csrf_field() }}
			@else
				{{-- false expr --}}
			<form role="form" method="POST" action="{{ route('pacientes.datosgenerales.store',['paciente'=>$paciente]) }}">
				{{ csrf_field() }}
			@endif
						
								<div class="panel-heading"><h5><strong>Datos Generales:</strong></h5></div>
								<div class="panel-body">
									<input type="hidden" name="paciente_id" value="{{$paciente->id}}" id="paciente_id">	
									<div class="col-xs-offset-2 form-group col-xs-4">
										<label class="control-label">Ocupación:</label>
										<input class="form-control" type="text" name="ocupacion">
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
								<div class="panel-heading"><h5><strong>Dirección:<strong></h5></div>
								<div class="panel-body">
								<div class="form-group col-xs-3">
									<label class="control-label">Calle:</label>
									<input class="form-control" type="text" name="calle">
								</div>
								<div class="form-group col-xs-3">
									<label class="control-label">Número Interior:</label>
									<input class="form-control" type="text" name="numint">
								</div>
								<div class="form-group col-xs-3">
									<label class="control-label">Número Exterior:</label>
									<input class="form-control" type="text" name="numext">
								</div>
								<div class="form-group col-xs-3">
									<label class="control-label">Codigo Postal:</label>
									<input class="form-control" type="text" name="cp">
								</div>
								<div class="form-group col-xs-3">
									<label class="control-label">Delegación/Municipio:</label>
									<input class="form-control" type="text" name="municipio">
								</div>
								<div class="form-group col-xs-3">
									<label class="control-label">Estado:</label>
									<input class="form-control" type="text" name="estado">
								</div>
								</div>
								<div class="panel-heading"><h6>Contacto:</h6></div>
								<div class="panel-body">
								<div class="form-group col-xs-4">
									<label class="control-label">Telefono Casa:</label>
									<input class="form-control" type="text" name="telcasa">
								</div>
								<div class="form-group col-xs-4">
									<label class="control-label">Telefono Oficina:</label>
									<input class="form-control" type="text" name="teloficina">
								</div>
								<div class="form-group col-xs-4">
									<label class="control-label">Telefono celular:</label>
									<input class="form-control" type="text" name="telcelular">
								</div>
								<div class="form-group col-xs-4">
									<label class="control-label">Email:</label>
									<input class="form-control" type="mail" name="email">
								</div>
								<div class="col-xs-4 col-xs-offset-5">
										@if($edit==false)
										<button id="submit" type="submit" class="btn btn-success">
									<strong>Agregar</strong>	</button>
										@else
										<a id="modificar" class="btn btn-primary" onclick="modificar()">
									<strong>Modificar</strong>	</a>
										@endif

									</div>
								</div>
								<div class="panel-heading">Tutores:</div>
								<div class="panel-body">
									
									<button type="button" class="btn btn-info" data-toggle="modal" data-target="#formularioTutor"><strong>Agregar Tutores</strong></button>
									<br>
									<br>
									<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
										<thead>
											<tr class="info">
												<th>Nombre</th>
												<th>Apellido Paterno</th>
												<th>Apellido Materno</th>
												<th>Relación</th>
												<th>Telefono Casa</th>
												<th>Celular</th>
												<th>Ver/Modificar</th>
											</tr>
										</thead>
										
											<tr class="active"{{--  onclick="vistarapida({{$personal->id}})" --}}>
											</tr>
									</table>
								</div>
								
								</form>
								</div>

							
						
						
						
				{{-- DATOS GENERALES --}}



{{-- Modal --}} 
								<div class="modal fade" id="formularioTutor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="position: 0,0 !important; right: -200px;">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLongTitle">Agregar Tutor</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
								        </button>
								      </div>
								      <div class="modal-body">
								        <div class="panel-default">
								        	<div class="panel-heading"><h5>Tutor:</h5></div>
								        	<div class="panel-body">
								        		<div class="form-group col-xs-4">
													<label class="control-label">Nombre:</label>
													<input class="form-control" type="text">
												</div>
												<div class="form-group col-xs-4">
													<label class="control-label">Apellido Paterno:</label>
													<input class="form-control" type="text">
												</div>
												<div class="form-group col-xs-4">
													<label class="control-label">Apellido Materno:</label>
													<input class="form-control" type="text">
												</div>
												<div class="form-group col-xs-4">
													<label class="control-label">Edad:</label>
													<input class="form-control" type="text">
												</div>
												<div class="form-group col-xs-4">
													<label class="control-label">Fecha de nacimiento:</label>
													<input class="form-control" type="date">
												</div>
												<div class="form-group col-xs-4">
													<label class="control-label">Sexo:</label>
													<select class="form-control">
														<option>Masculino</option>
														<option>Femenino</option>
														<option>Otro</option>
													</select>
												</div>
												<div class="col-xs-offset-4 form-group col-xs-4">
													<label class="control-label">Relación con el paciente:</label>
													<select class="form-control">
														<option>Padre</option>
														<option>Madre</option>
														<option>Tio/Tia</option>
														<option>Abuelo/Abuela</option>
														<option>Hermano/Hermana</option>
														<option>Primos</option>
														<option>Otros</option>
													</select>
												</div>
								        	</div>
								        </div>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
								        <button type="button" class="btn btn-primary">Agregar</button>
								      </div>
								    </div>
								  </div>
								</div>
								{{-- Modal --}} 

@endsection