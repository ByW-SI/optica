@extends('layouts.test')
@section('content1')

	{{-- expr --}}
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<div class="container">
		<div class="panel panel-group">
			<div class="panel-default">
				<div class="panel-heading">
					<h4>Datos del paciente:</h4>
				</div>
				<div class="panel-body">
					<div class="form-group col-xs-3">
						<label class="control-label">Nombre:</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label">Apellido Paterno:</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label">Apellido Materno:</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label">ID:</label>
						<input class="form-control" type="text" value="001" disabled="">
					</div>
					<div class="col-xs-offset-2 form-group col-xs-3">
						<label class="control-label">Edad:</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label">Fecha de nacimiento:</label>
						<input class="form-control" type="date">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label">Sexo:</label>
						<select class="form-control">
							<option>Masculino</option>
							<option>Femenino</option>
							<option>Otro</option>
						</select>
					</div>
					{{-- PESTAÑAS --}}
				
						<ul class="nav nav-pills">
							<li class="active"><a data-toggle="tab" href="#generales"  class="ui-tabs-anchor">Generales:</a></li>

							<li><a data-toggle="tab" href="#hmedico" class="ui-tabs-anchor">Historial Medico:</a></li>

							<li><a data-toggle="tab" href="#" class="ui-tabs-anchor">Ocular:</a></li>

							<li><a data-toggle="tab" href="#" class="ui-tabs-anchor">Ortopedico:</a></li>

							<li><a data-toggle="tab" href="#" class="ui-tabs-anchor">Citas:</a></li>

							<li><a data-toggle="tab" href="#" class="ui-tabs-anchor">C.R.M.:</a></li>
						</ul>
					<div class="tab-content">
						{{-- DATOS GENERALES --}}
						<div class="tab-pane tab-pane fade in active" id="generales">
							
							<div class="panel-default">
								<div class="panel-heading"><h5>Datos Generales:</h5></div>
								<div class="panel-body">
									<div class="col-xs-offset-2 form-group col-xs-4">
										<label class="control-label">Ocupación:</label>
										<input class="form-control" type="text">
									</div>
									<div class="form-group col-xs-4">
										<label class="control-label">Convenio:</label>
										<select class="form-control">
											<option>Convenio 1</option>
											<option>Convenio 2</option>
											<option>Convenio ...</option>
										</select>
									</div>
								</div>
								<div class="panel-heading"><h6>Dirección:</h6></div>
								<div class="panel-body">
								<div class="form-group col-xs-3">
									<label class="control-label">Calle:</label>
									<input class="form-control" type="text">
								</div>
								<div class="form-group col-xs-3">
									<label class="control-label">Número Interior:</label>
									<input class="form-control" type="text">
								</div>
								<div class="form-group col-xs-3">
									<label class="control-label">Número Exterior:</label>
									<input class="form-control" type="text">
								</div>
								<div class="form-group col-xs-3">
									<label class="control-label">Codigo Postal:</label>
									<input class="form-control" type="text">
								</div>
								<div class="form-group col-xs-3">
									<label class="control-label">Delegación/Municipio:</label>
									<input class="form-control" type="text">
								</div>
								<div class="form-group col-xs-3">
									<label class="control-label">Estado:</label>
									<input class="form-control" type="text">
								</div>
								</div>
								<div class="panel-heading"><h6>Contacto:</h6></div>
								<div class="panel-body">
								<div class="form-group col-xs-4">
									<label class="control-label">Telefono Casa:</label>
									<input class="form-control" type="text">
								</div>
								<div class="form-group col-xs-4">
									<label class="control-label">Telefono Oficina:</label>
									<input class="form-control" type="text">
								</div>
								<div class="form-group col-xs-4">
									<label class="control-label">Telefono celular:</label>
									<input class="form-control" type="text">
								</div>
								<div class="form-group col-xs-4">
									<label class="control-label">Email:</label>
									<input class="form-control" type="mail">
								</div>
								<div class="col-md-12 offset-md-2 mt-3">
									<button class="btn btn-success">Guardar</button>
			  						<p><strong>*Campo requerido</strong></p>
								</div>
								</div>
								<div class="panel-heading">Tutores:</div>
								<div class="panel-body">
									
									<button type="button" class="btn btn-info" data-toggle="modal" data-target="#formularioTutor">Agregar Tutores</button>
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
							</div>
						</div>
						 <div class="tab-pane" id="hmedico">
						 	<div class="panel-default">
						 		<div class="panel-heading"><h5>Historial Medico:</h5></div>
						 		<div class="panel-body">
						 			<div class="col-xs-offset-2 form-group col-xs-4">
										<label class="control-label">Problema Visual:</label>
										<select class="form-control">
											<option>Problema 1</option>
											<option>Problema 2</option>
											<option>Problema ...</option>
										</select>
									</div>
									<div class="form-group col-xs-4">
										<label class="control-label">Problema Ortopedico:</label>
										<select class="form-control">
											<option>Problema Ortopedico 1</option>
											<option>Problema Ortopedico 2</option>
											<option>Problema Ortopedico ...</option>
										</select>
									</div>
						 		</div>
						 		<div class="panel-heading"><h6>Enfermedades</h6></div>
						 		<div class="panel-body">
						 			<div class="col-xs-offset-2 form-group checkbox">
								    	<label class="col-xs-4 label-text"><input type="checkbox" > Diabetes</label>
								      	<label class="col-xs-4 label-text"><input type="checkbox" > Pulmon</label>
								      	<label class="col-xs-4 label-text"><input type="checkbox" > E2</label>	
						 			</div>
						 			<div class="col-xs-offset-2 form-group checkbox">
						 				<label class="col-xs-4 label-text"><input type="checkbox" > Hipertensión</label>
								      	<label class="col-xs-4 label-text"><input type="checkbox" > Reuma</label>
								      	<label class="col-xs-4 label-text"><input type="checkbox" > E3</label>
						 			</div>
						 			<div class="col-xs-offset-2 form-group checkbox">
						 				<label class="col-xs-4 label-text"><input type="checkbox" > Asma</label>
								      	<label class="col-xs-4 label-text"><input type="checkbox" > Migraña</label>
								      	<label class="col-xs-4 label-text"><input type="checkbox" > E4</label>
						 			</div>
						 			<div class="col-xs-offset-2 form-group checkbox">
						 				<label class="col-xs-4 label-text"><input type="checkbox" > Epilepsia</label>
								      	<label class="col-xs-4 label-text"><input type="checkbox" > Corazón</label>
								      	<label class="col-xs-4 label-text"><input type="checkbox" > otro: <textarea class="form-control"></textarea></label>
								      	
						 			</div>
						 			<div class="form-group col-xs-4">
						 				<label class="control-label">Enfermedades crónicas:</label>
						 				<textarea class="form-control"></textarea>
						 			</div>
						 			<div class="form-group col-xs-4">
						 				<label class="control-label">Operaciones:</label>
						 				<textarea class="form-control"></textarea>
						 			</div>
						 			<div class="form-group col-xs-4">
						 				<label class="control-label">Alergias:</label>
						 				<textarea class="form-control"></textarea>
						 			</div>
						 		</div>
						 	</div>
						 </div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
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

@endsection