@extends('layouts.blank')
@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="container">
	<div role="application" class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading"><h4><strong>Datos del Paciente:</strong></h4>
				<a class="btn btn-info" href="{{ route('pacientes.create') }}"><strong>Nuevo Paciente</strong></a>
			</div>
			<div class="panel-body">
				<div class="col-xs-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="identificador">ID de Paciente:</label>
						<dd><strong>{{$paciente->identificador}}</strong></dd>
					</div>
				</div>
				<div class="col-xs-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="appaterno">Apellido Paterno:</label>
						<dd>{{$paciente->appaterno}}</dd>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="apmaterno">Apellido Materno:</label>
						<dd>{{$paciente->apmaterno}}</dd>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="nombre">Nombre(s):</label>
						<dd>{{$paciente->nombre}}</dd>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="edad">Edad:</label>
						<dd>{{$paciente->edad}}</dd>
					</div>
				</div>
				<div class="col-xs-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="fecha_nacimiento">Fecha de Nacimiento:</label>
						<dd>{{$paciente->fecha_nacimiento}}</dd>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="sexo">Sexo:</label>
						<dd>{{$paciente->sexo}}</dd>
					</div>
				</div>
			</div>
		</div>

		{{-- PESTAÑAS --}}
				
						<ul class="nav nav-justified" >
							<li role="presentation" class="active"><a data-toggle="tab" href="#generales" class="ui-tabs-anchor">Generales:</a></li>

							<li role="presentation"><a data-toggle="tab" href="#hmedico" class="ui-tabs-anchor">Historial Medico:</a></li>

							<li role="presentation"><a data-toggle="tab" href="#ocular" class="ui-tabs-anchor">Ocular:</a></li>

							<li role="presentation"><a data-toggle="tab" href="#" class="ui-tabs-anchor">Ortopedico:(En desarrollo)</a></li>

							<li role="presentation"><a data-toggle="tab" href="#cita" class="ui-tabs-anchor">Citas:</a></li>

							<li role="presentation"><a data-toggle="tab" href="#crm" class="ui-tabs-anchor">C.R.M:</a></li>
						</ul>
		{{-- PESTAÑAS --}}

			{{-- TAB-CONTENT --}}
                   <div class="tab-content">
		{{-- DATOS GENERALES --}}
						<div class="tab-pane fade in " id="generales">
							
							<div class="panel-default">
								<div class="panel-heading"><h5>Datos Generales:</h5></div>
								<div class="panel-body">
									<div class="col-xs-4 col-xs-offset-10">
					
										<button id="submit" type="submit" class="btn btn-success">
									<strong>Agregar</strong>	</button>
										<a id="modificar" class="btn btn-primary" onclick="modificar()" style="display: none;">
									<strong>Modificar</strong>	</a>
										

									</div>
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
						
						
				{{-- DATOS GENERALES --}}

				{{-- HISTORIAL MEDICO --}}
						
						 <div class="tab-pane" id="hmedico">
						 	<div class="panel-default">
						 		<div class="panel-heading"><h4><strong>Historial Médico:</strong> </h4></div>
						 		<div class="panel-body">
						 			<div class="col-xs-4 col-xs-offset-10">
					
										<button id="submit" type="submit" class="btn btn-success">
									<strong>Agregar</strong>	</button>

										<a id="modificar" class="btn btn-primary" onclick="modificar()" style="display: none;">
									<strong>Modificar</strong>	</a>
										

									</div><br><br><br>
					<div class="form-group col-xs-6">
						<div class="boton checkbox-disabled">
                            <label>

                                <input id="chkalerg" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios" onchange="alergias();" >
                                ¿Alèrgico a algùn medicamento ò alguna alèrgia en especial? .
                            </label>
                        </div>
                    </div>

						 	<div class="form-group col-xs-3" style="display: none;" id="alergias1" name="alergias1">
						<label class="control-label"><i class="fa fa-asterisk" aria-hidden="true"></i>¿Cuàl?:</label>
						<input class="form-control" type="text" >
							</div>
							<div class="form-group col-xs-3"  id="alergias2" style="display: none;">
						<label class="control-label">¿Tiene algùn Tratamiento?</label>
						<input class="form-control" type="text"  >
							</div>
						 		</div>
						 		<div class="panel-heading"><h4>Enfermedades</h4></div>
						 		<div class="panel-body">

					<div class="form-group col-xs-6">
						<div class="boton checkbox-disabled">
                            <label>

                                <input id="cronica" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios" >
                                ¿Padece alguna Enfermedad Crònica? .
                            </label>
                        </div>
                    </div><br><br><br>

                    <div class="jumbotron"  id="enfermedades" style="display: none"> 

                    				<div class="row">
                    					<div class="col-sm-3">
                    						<label class="col-xs-4 label-text"><input type="checkbox" class="squaredTwo">Diabetes</label>
                    					</div>
                    					
                    					<div class="col-sm-3">
                    						<label class="col-xs-4 label-text"><input type="checkbox" class="squaredTwo"> Epilepsia</label>
                    					</div>

                    					<div class="col-sm-3" id="especifique" style="display: none">
                    						<label class="control-label">Especifique:</label>
									<input class="form-control" type="text" >
                    					</div>

                    					<div class="col-sm-3">
                    						<div class="boton checkbox-disabled">
                            <label>
                            	 ¿Tiene Tratamiento/Control ?
                            </label>
                                <input id="control" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios" onchange="chkalerg()">
                               
                       						 </div>
                    					</div>
                    				</div>

                    				<div class="row">
                    					<div class="col-sm-3">
                    						<label class="col-xs-4 label-text"><input type="checkbox" class="squaredTwo">Hipertensión</label>
                    					</div>
                    					
                    					<div class="col-sm-3">
                    						<label class="col-xs-4 label-text"><input type="checkbox" class="squaredTwo">  Migraña</label>
                    					</div>

                    				</div>

                    				<div class="row">
                    					<div class="col-sm-3">
                    						<label class="col-xs-4 label-text"><input type="checkbox" class="squaredTwo">Asma</label>
                    					</div>
                    					
                    					<div class="col-sm-3">
                    						<label class="col-xs-4 label-text"><input type="checkbox" class="squaredTwo" id="otra">  Otra</label>
                    					</div>

                    					<div class="col-sm-3" id="trat" style="display: none;">
                    						<label class="control-label">Tratamiento Actual:</label>
			<input class="form-control" type="text" id="tratamiento_enfermedades" name="tratamiento_enfermedades">
                    					</div>
                    				</div>
								    	
								    	
								    

						 			

                    </div>


					<div class="form-group col-xs-6">
						<div class="row">
                    			<div class="col-sm-3">
						 	      <label>
						 	      	<input id="embarazo" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios"  >
                                Embarazo.
                                 </label>	
                                </div>
                                <div class="col-sm-5" style="display: none" id="emb_tiempo">
						 	     <label class="control-label">¿Cuanto Tiempo?:</label>
                                 <input id="embarazo_tiempo" type="text" class="form-control"  >	
                                </div>
                        </div>	
                    </div>
						 			
						 			
						 		</div>
						 	</div>
						 </div>
					{{-- HISTORIAL MEDICO --}}
				</div>
					{{-- TAB-CONTENT --}}
	</div>
</div>
@endsection