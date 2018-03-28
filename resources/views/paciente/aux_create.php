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
					<h4>Datos del paciente:&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-asterisk" aria-hidden="true"></i>
					Campos Requeridos</h4>
				</div>
				<div class="panel-body">
		{{-- FORM DATOS PERSONALES --}}
		<form role="form" id="form-empleado" method="POST" action="{{ route('pacientes.store') }}" name="form">
			{{ csrf_field()}}
					<div class="form-group col-xs-3">
						<label class="control-label"><i class="fa fa-asterisk" aria-hidden="true"></i>Nombre:</label>
						<input class="form-control" type="text" name="nombre" id="nombre">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label"><i class="fa fa-asterisk" aria-hidden="true"></i>Apellido Paterno:</label>
						<input class="form-control" type="text" name="appaterno" id="appaterno">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label">Apellido Materno:</label>
						<input class="form-control" type="text" name="apmaterno" id="apmaterno">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label">ID:(Automàtico)</label>
						<input class="form-control" type="text" readonly style="width:150px" name="identificador" id="identificador">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label">Edad:(Automàtico)</label>
						<input class="form-control" type="text" readonly="" placeholder="Edad" id="edad" name="edad" style="width: 91px" name="edad" id="edad">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label"><i class="fa fa-asterisk" aria-hidden="true"></i>Fecha de nacimiento:</label>
						<input class="form-control" type="date" id="fechanacimiento" name="fecha_nacimiento" required>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label">Sexo:</label>
						<select class="form-control" name="sexo" id="sexo">
							<option>Masculino</option>
							<option>Femenino</option>
							<option>Otro</option>
						</select>
					</div>
					<div class="col-xs-2" align="center">
						<input type="submit" class="btn btn-success" name="submit_1" value="Guardar">
					</div>
				</div>
		</form><br>
		{{-- FORM DATOS PERSONALES --}}
					{{-- PESTAÑAS --}}
				
						<ul class="nav nav-pills">
							<li class="active"><a data-toggle="tab" href="#generales"  class="ui-tabs-anchor">Generales:</a></li>

							<li><a data-toggle="tab" href="#hmedico" class="ui-tabs-anchor">Historial Medico:</a></li>

							<li><a data-toggle="tab" href="#ocular" class="ui-tabs-anchor">Ocular:</a></li>

							<li><a data-toggle="tab" href="#" class="ui-tabs-anchor">Ortopedico:(En desarrollo)</a></li>

							<li><a data-toggle="tab" href="#cita" class="ui-tabs-anchor">Citas:</a></li>

							<li><a data-toggle="tab" href="#crm" class="ui-tabs-anchor">C.R.M:</a></li>
						</ul>
					<div class="tab-content">
						{{-- DATOS GENERALES --}}
						<div class="tab-pane fade in active" id="generales">
							
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

						 {{-- HISTORIAL OCULAR --}}
						  <div class="tab-pane" id="ocular">
						  	<div class="panel-default">
						  		<div class="panel-heading"><h5>Historial Ocular:</h5></div>


						  		<div class="panel-body">

						  			<div class="col-xs-4 col-xs-offset-10">

										<button id="submit" type="submit" class="btn btn-success">
									<strong>Agregar</strong>	</button>

									<button id="submit" type="submit" class="btn btn-warning">
									<strong>Limpiar</strong>	</button>

										<a id="modificar" class="btn btn-primary" onclick="modificar()" style="display: none;">
									<strong>Modificar</strong>	</a>
								</div>

									<div class="form-group col-xs-4">
										<div style="
										height: 250px;
										overflow: scroll;">
										<label class="control-label">Historial de Citas</label>
											<table class="table table-striped table-bordered table-hover" 
										       style="color:rgb(51,51,51); 
										              border-collapse: collapse;
										              margin-bottom: 0px;
										              overflow: scroll;"
										       >
											<thead>
												<tr class="info">
													<th>Fecha</th>
																					
												</tr>
											</thead>
											<tbody >
												<tr onclick='' 
												title='Has Click Aquì para ver o Modificar'
												style='cursor: pointer'>
													<td>21/01/2018</td>
													
												</tr>

												<?php
													for ($i=1; $i <11 ; $i++) { 
														echo"<tr onclick='' 
												title='Has Click Aquì para ver o Modificar'
												style='cursor: pointer'>
													<td>".$i."/02/2018</td>
													
													
													
												</tr>";
													}
												?>
											</tbody>
										</table>
										</div>
									</div>

										
									<div class="col-xs-offset-1 form-group col-xs-4">

										<label class="control-label" for="fecha_act">Fecha de Último Exámen:</label>
										<input type="date" class="form-control" id="fecha_act" name="fecha_act" value="{{ date('Y-m-d') }}" readonly>

										
										<br><br>
									</div>

								<div class="row">
									<div class="col-xs-offset-1 form-group col-sm-4">
										 <label>
						 	      	<input id="cirugias" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios" name="cirugias" >
                                Cirugías en los ojos:
                                 </label>
									</div>
									<div class="col-xs-offset-1 form-group col-sm-4">
										 <label>
						 	      	<input id="padecimientos" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios" name="padecimientos" >
                               Padecimientos oculares:
                                 </label>
									</div>
								</div>	
									
                        <div class="row">
									<div class="form-group col-xs-6">
										 <div class="jumbotron"  id="cirug" style="display: none;">
										 		<div class="row">
									<div class="form-group col-xs-6">
									<label class="control-label">¿Cuál?</label>
									<input class="form-control" type="text" name="cirug_1">
									</div>

									<div class="form-group col-xs-6">
									<label class="control-label">¿Hace Cuánto?</label>
									<input class="form-control" type="text" name="cirug_2">
									</div>
												</div>
												<div class="row">
									<div class="form-group col-xs-6">
									<label class="control-label">¿Tiene Tratamiento Actualmente?</label>
									<input class="form-control" type="text" name="cirug_3">
									</div>
												</div>
								</div>
							</div>

							<div class=" form-group col-xs-6">
								<div class="jumbotron"  id="padec" style="display: none">
									<div class="row">
                    					<div class="col-sm-4">
                    						<label class="col-xs-4 label-text"><input type="checkbox" class="squaredTwo">Catarata</label>
                    					</div>
                    					
                    					<div class="col-sm-4">
                    						<label class="col-xs-4 label-text"><input type="checkbox" class="squaredTwo"> Glaucoma</label>
                    					</div>

                    					<div class="col-sm-4">
                    						<label class="col-xs-4 label-text"><input type="checkbox" class="squaredTwo">Retinopatía Diabética</label>
                    					</div>
                    				</div>
                    				<div class="row">
                    					<div class="col-sm-4">
                    						<label class="col-xs-4 label-text"><input type="checkbox" class="squaredTwo">Retinopatía Hipertensiva</label>
                    					</div>
                    					
                    					<div class="col-sm-4">
                    						<label class="col-xs-4 label-text"><input type="checkbox" class="squaredTwo">Queratocono</label>
                    					</div>

                    					<div class="col-sm-4">
                    						<label class="col-xs-4 label-text"><input type="checkbox" class="squaredTwo" id="padec_otra">Otra</label>
                    					</div>
                    				</div><br>
                    				<div class="row" id="padec_text" style="display: none">
                    					<div class="col-sm-6">
                    					<label class="control-label">Especifíque:</label>
									<input class="form-control" type="text" name="padec_text" >
										</div>
                    				</div>
												
								</div>
							</div>

						</div>


							

							

{{-- JumboTron 1 --}}
  <div class="jumbotron col-xs-12" align="left">
	<div class="form-group " >
		<div class="row">
			<div class="col-sm-2">
			<label class="control-label">Problema Visual</label>
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">LEJOS</span>
				<input type="radio" class="option-input radio" name="problema_visual">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">CERCA</span>
				<input type="radio" class="option-input radio" name="problema_visual">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">AMBAS</span>
				<input type="radio" class="option-input radio" name="problema_visual">
			</div>
		</div><br><br>
		<div class="row">
			
			<div class="col-sm-2 ">
			<label class="control-label">Usuario de Lentes</label>
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">SI</span>
				<input type="radio" class="option-input radio" name="usuario_lentes">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">NO</span>
				<input type="radio" class="option-input radio" name="usuario_lentes">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">OCASIONALMENTE</span>
				<input type="radio" class="option-input radio" name="usuario_lentes">
			</div>
		    
		</div><br><br>
		<div class="row">
			<div class="col-sm-3">
			<label class="control-label">Edad a la que inició uso de Lentes</label>
			</div>
			<div class="form-group col-xs-2">
										
										<select class="form-control" name="edad_lentes">
											<?php for($i=1;$i<71;$i++){ ?>
											
											<?php echo "<option value='".$i."'><h3>".$i." Años</h3></option>";} ?>
										</select>
									</div>
			
		</div><br><br>
		<div class="row">
			
			<div class="col-sm-2 ">
			<label class="control-label">Molestias a la luz Solar</label>
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">SI</span>
				<input type="radio" class="option-input radio" name="molestia_luz">


			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">NO</span>
				<input type="radio" class="option-input radio" name="molestia_luz">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">REGULAR</span>
				<input type="radio" class="option-input radio" name="molestia_luz">
			</div>
		    
		</div><br><br>
		<div class="row">
			
			<div class="col-sm-2 ">
			<label class="control-label">Usuario de Computadora</label>
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">SI</span>
				<input type="radio" class="option-input radio" name="usuario_computadora">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">NO</span>
				<input type="radio" class="option-input radio"  name="usuario_computadora">
			</div>
			
		    
		</div>
	
	</div>
  </div>
  {{-- JumboTron 1 --}}



 <div class=" col-xs-12" align="left">

 	<div class="col-xs-offset-1">
	<strong><h4>Antecedentes Oculares Familiares:</h4></strong>	
	</div>

 	<div class="jumbotron"  id="antecedentes" >
									<div class="row">
                    					<div class="col-sm-4">
                    						<input type="checkbox" class="squaredTwo">
                    						<label class="col-xs-6 label-text">Usuarios de Lentes</label>
                    					</div>
                    					<div class="col-sm-4">
                    						<input type="checkbox" class="squaredTwo">
                    						<label class="col-xs-6 label-text">Catarata</label>
                    					</div>
                    					<div class="col-sm-4">
                    						<input type="checkbox" class="squaredTwo">
                    						<label class="col-xs-6 label-text"> Glaucoma</label>
                    					</div>
                    				</div><br>

                    				<div class="row">
                    					<div class="col-sm-4">
                    						<input type="checkbox" class="squaredTwo">
                    						<label class="col-xs-6 label-text">Estrabismo</label>
                    					</div>
                    					<div class="col-sm-4">
                    						<input type="checkbox" class="squaredTwo" id="ante_otra">
                    						<label class="col-xs-6 label-text">Otra</label>
                    					</div>
                    					
                    				</div> <br>

                    				<div class="row" id="ante_text" style="display: none">
                    					<div class="col-sm-6">
                    					<label class="control-label">Especifíque:</label>
									<input class="form-control" type="text" name="padec_text" >
										</div>
                    				</div>
												
	</div>
 </div>



 <div class=" col-xs-6" align="left" style="border: solid; border-color: grey; padding: 10px;">

 	<div class="col-xs-6" align="center">
	<strong><h4>Revisión Visual</h4></strong>	
	</div><br><br><br><br>

 	
									<div class="row">
										<div class="col-sm-6">
										<label class="col-xs-8 label-text ">A.V. sin Rx. de Lejos(Snellen)</label>
									</div>
                    					<div class="col-sm-3">
                    						<h1><span class="badge badge-secondary">O.D.</span></h1>
                    						<select class="form-control">
											<option value="20/400">20/400</option>
											<option value="20/300">20/300</option>
											<option value="20/200">20/200</option>
											<option value="20/150">20/150</option>
											<option value="20/120">20/120</option>
											<option value="20/100">20/100</option>
											<option value="20/70">20/70</option>
											<option value="20/60">20/60</option>
											<option value="20/50">20/50</option>
											<option value="20/40">20/40</option>
											<option value="20/30">20/30</option>
											<option value="20/25">20/25</option>
											<option value="20/20">20/20</option>
											<option value="20/15">20/15</option>
											<option value="20/10">20/10</option>
											<option value="S.P.L">S.P.L</option>
											<option value="N.P.L">N.P.L</option>
											<option value="Protésis">Protésis</option>
											</select>
                    						
                    					</div>

                    					<div class="col-sm-3">
                    						<h1><span class="badge badge-secondary">O.I.</span></h1>
                    						<select class="form-control">
											<option value="20/400">20/400</option>
											<option value="20/300">20/300</option>
											<option value="20/200">20/200</option>
											<option value="20/150">20/150</option>
											<option value="20/120">20/120</option>
											<option value="20/100">20/100</option>
											<option value="20/70">20/70</option>
											<option value="20/60">20/60</option>
											<option value="20/50">20/50</option>
											<option value="20/40">20/40</option>
											<option value="20/30">20/30</option>
											<option value="20/25">20/25</option>
											<option value="20/20">20/20</option>
											<option value="20/15">20/15</option>
											<option value="20/10">20/10</option>
											<option value="S.P.L">S.P.L</option>
											<option value="N.P.L">N.P.L</option>
											<option value="Protésis">Protésis</option>
										</select>
                    					</div>
                    					

                    					
                    				</div><br><br>


                    				<div class="row">
										<div class="col-sm-6">
										<label class="col-xs-5 label-text ">D.N.P. Ojo Derecho</label>
									</div>
									
                    					<div class="col-sm-3">

                    						<h1><span class="badge badge-secondary">O.D. Lejos</span></h1>
                    						<select class="form-control">
                    							<?php for($i=20;$i<=50;$i+=0.5){
											
											   echo"<option value='".$i."'>".$i." mm</option>";
											}?>
											</select>
                    						
                    					</div>

                    					<div class="col-sm-3">
                    						<h1><span class="badge badge-secondary">O.D. Cerca</span></h1>
                    						<select class="form-control">
											<?php for($i=20;$i<=50;$i+=0.5){
											
											   echo"<option value='".$i."'>".$i." mm</option>";
											}?>
										</select>
                    					</div>

                    					

                    				</div>
                    				<div class="row">
                    					<div class="col-sm-6">
										<label class="col-xs-5 label-text ">D.N.P. Ojo Izquierdo</label>
									</div>
                    					<div class="col-sm-3">
                    						<h1><span class="badge badge-secondary">O.I. Lejos</span></h1>
                    						<select class="form-control">
											<?php for($i=20;$i<=50;$i+=0.5){
											
											   echo"<option value='".$i."'>".$i." mm</option>";
											}?>
										</select>
                    					</div>

                    					<div class="col-sm-3">
                    						<h1><span class="badge badge-secondary">O.I. Cerca</span></h1>
                    						<select class="form-control">
											<?php for($i=20;$i<=50;$i+=0.5){
											
											   echo"<option value='".$i."'>".$i." mm</option>";
											}?>
										</select>
                    					</div>
                    				</div>

                    				

                    				

                    			
												
	
 </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<div class="col-xs-6" align="center">
	<strong><h4>Pantalleo</h4></strong>	
	</div>
<div class="jumbotron col-xs-6">
	
	<div class="row">
		<div class="col-sm-4">
		<label class="col-xs-8 label-text ">Unilateral</label>
	    </div>
		<div class="col-sm-4">
            <span class="badge badge-secondary">Lejos</span>
                <select class="form-control">
					<option value='Orto'>Orto</option>
					<option value='Endo'>Endo</option>
					<option value='Exo'>Exo</option>
					<option value='Hiper'>Hiper</option>
					<option value='Hipo'>Hipo</option>
				</select>
		</div>
		<div class="col-sm-4">
            <span class="badge badge-secondary">Cerca</span>
                <select class="form-control">
					<option value='Orto'>Orto</option>
					<option value='Endo'>Endo</option>
					<option value='Exo'>Exo</option>
					<option value='Hiper'>Hiper</option>
					<option value='Hipo'>Hipo</option>
				</select>
		</div>
	</div><br><br>
	<div class="row">
		<div class="col-sm-4">
		<label class="col-xs-8 label-text ">Alternante</label>
	   </div>
		<div class="col-sm-4">
            <span class="badge badge-secondary">Lejos</span>
                <select class="form-control">
					<option value='Orto'>Orto</option>
					<option value='Endo'>Endo</option>
					<option value='Exo'>Exo</option>
					<option value='Hiper'>Hiper</option>
					<option value='Hipo'>Hipo</option>
				</select>
		</div>
		<div class="col-sm-4">
            <span class="badge badge-secondary">Cerca</span>
                <select class="form-control">
					<option value='Orto'>Orto</option>
					<option value='Endo'>Endo</option>
					<option value='Exo'>Exo</option>
					<option value='Hiper'>Hiper</option>
					<option value='Hipo'>Hipo</option>
				</select>
		</div>
	</div>
</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


<div  align="left" class="col-xs-12">
	<strong><h4>Queratometría</h4></strong>	
	</div>
<div class="jumbotron col-xs-12" align="left">
	 
	<div class="row">
		<div class="col-sm-2">
			<label class="control-label"><h4>O.D.</h4></label>
		   </div>
		<div class="col-sm-2">
            <span class="badge badge-secondary">Plana</span>
                <select class="form-control">
					<?php for($i=32;$i<=55;$i+=0.25){
				echo"<option value='".$i."'>".$i."</option>";
						}?>
				</select>
		</div>
		<div class="col-sm-2">
            <span class="badge badge-secondary">Curva</span>
                <select class="form-control">
				<?php for($i=32;$i<=55;$i+=0.25){
				echo"<option value='".$i."'>".$i."</option>";
						}?>
				</select>
		</div>
		<div class="col-sm-2">
            <span class="badge badge-secondary">Eje</span>
                <select class="form-control">
					<?php for($i=0;$i<=180;$i+=5){
				echo"<option value='".$i."'>".$i."°</option>";
						}?>
				</select>
		</div>
	</div><br><br>
	<div class="row">
		<div class="col-sm-2">
			<label class="control-label"><h4>O.I.</h4></label>
		   </div>
		<div class="col-sm-2">
            <span class="badge badge-secondary">Plana</span>
                <select class="form-control">
					<?php for($i=32;$i<=55;$i+=0.25){
				echo"<option value='".$i."'>".$i."</option>";
						}?>
				</select>
		</div>
		<div class="col-sm-2">
            <span class="badge badge-secondary">Curva</span>
                <select class="form-control">
					<?php for($i=32;$i<=55;$i+=0.25){
				echo"<option value='".$i."'>".$i." </option>";
						}?>
				</select>
		</div>
		<div class="col-sm-2">
            <span class="badge badge-secondary">Eje</span>
                <select class="form-control">
					<?php for($i=0;$i<=180;$i+=5){
				echo"<option value='".$i."'>".$i."°</option>";
						}?>
				</select>
		</div>
	</div>
</div><br><br><br><br>

<div class="form-group col-xs-12" align="center" style="border: solid; border-color: grey; padding: 20px;">
	 <div  align="left">
	<strong><h4>Visión Estereoscópica</h4></strong>	
	</div>
	<div class="row">
		<div class="col-sm-2">
            <span class="badge badge-secondary">seg/arco</span>
                <select class="form-control">
					<option value='40'>40'</option>
					<option value='50'>50'</option>
					<option value='60'>60'</option>
					<option value='80'>80'</option>
					<option value='100'>100'</option>
					<option value='140'>140'</option>
					<option value='200'>200'</option>
					<option value='400'>400'</option>
					<option value='800'>800'</option>
				</select>
		</div>
		
	</div><br><br>
	<div  align="left">
	<strong><h4>Oftalmoscopía</h4></strong>	
	</div><br><br>
	<div class="row">
		
		<div class="col-sm-3">
			<span class="badge badge-secondary">O.D.</span>
			<label class="control-label">Papila</label>
            
            <input class="form-control" type="text" name="papila_od" id="papila_od">
        </div>
        <div class="col-sm-3">
        	<span class="badge badge-secondary">O.I.</span>
			<label class="control-label">Papila</label>
            
            <input class="form-control" type="text" name="papila_oi" id="papila_oi">
        </div>
	</div>
	<div class="row">
		
		<div class="col-sm-3">
			<span class="badge badge-secondary">O.D.</span>
			<label class="control-label">Excavación</label>
            
            <input class="form-control" type="text" name="excavacion_od" id="excavacion_od">
        </div>
        <div class="col-sm-3">
        	 <span class="badge badge-secondary">O.I.</span>
			<label class="control-label">Excavación</label>
            
            <input class="form-control" type="text" name="excavacion_oi" id="excavacion_oi">
        </div>
	</div>
	<div class="row">
		
		<div class="col-sm-3">
			<span class="badge badge-secondary">O.D.</span>
			<label class="control-label">Radio</label>
            
            <input class="form-control" type="text" name="radio_od" id="radio_od">
        </div>
        <div class="col-sm-3">
        	 <span class="badge badge-secondary">O.I.</span>
			<label class="control-label">Radio</label>
            
            <input class="form-control" type="text" name="radio_oi" id="radio_oi">
        </div>
	</div>
	<div class="row">
		
		<div class="col-sm-3">
			<span class="badge badge-secondary">O.D.</span>
			<label class="control-label">Profundidad</label>
            
            <input class="form-control" type="text" name="profundidad_od" id="profundidad_od">
        </div>
        <div class="col-sm-3">
        	 <span class="badge badge-secondary">O.I.</span>
			<label class="control-label">Profundidad</label>
            
            <input class="form-control" type="text" name="profundidad_oi" id="profundidad_oi">
        </div>
	</div>
	<div class="row">
		
		<div class="col-sm-3">
			<span class="badge badge-secondary">O.D.</span>
			<label class="control-label">Vasos</label>
            
            <input class="form-control" type="text" name="vasos_od" id="vasos_od">
        </div>
        <div class="col-sm-3">
        	 <span class="badge badge-secondary">O.I.</span>
			<label class="control-label">Vasos</label>
            
            <input class="form-control" type="text" name="vasos_oi" id="vasos_oi">
        </div>
	</div>
	<div class="row">
		
		<div class="col-sm-3">
			<span class="badge badge-secondary">O.D.</span>
			<label class="control-label">Rel. A/V</label>
            
            <input class="form-control" type="text" name="rel_od" id="rel_od">
        </div>
        <div class="col-sm-3">
        	 <span class="badge badge-secondary">O.I.</span>
			<label class="control-label">Rel. A/V</label>
            
            <input class="form-control" type="text" name="rel_oi" id="rel_oi">
        </div>
	</div>
	<div class="row">
		
		<div class="col-sm-3">
			<span class="badge badge-secondary">O.D.</span>
			<label class="control-label">Macula</label>
          
            <input class="form-control" type="text" name="macula_od" id="macula_od">
        </div>
        <div class="col-sm-3">
        	 <span class="badge badge-secondary">O.I.</span>
			<label class="control-label">Macula</label>
            
            <input class="form-control" type="text" name="macula_oi" id="macula_oi">
        </div>
	</div>
	<div class="row">
		
		<div class="col-sm-3">
			<span class="badge badge-secondary">O.D.</span>
			<label class="control-label">Reflejo</label>
            
            <input class="form-control" type="text" name="reflejo_od" id="reflejo_od">
        </div>
        <div class="col-sm-3">
        	 <span class="badge badge-secondary">O.I.</span>
			<label class="control-label">Reflejo</label>
           
            <input class="form-control" type="text" name="reflejo_oi" id="reflejo_oi">
        </div>
	</div>
	<div class="row">
		
		<div class="col-sm-3">
			<span class="badge badge-secondary">O.D.</span>
			<label class="control-label">Retina Periférica</label>
            
            <input class="form-control" type="text" name="retina_perif_od" id="retina_perif_od">
        </div>
        <div class="col-sm-3">
        	 <span class="badge badge-secondary">O.I.</span>
			<label class="control-label">Retina Periférica</label>
           
            <input class="form-control" type="text" name="retina_perif_oi" id="retina_perif_oi">
        </div>
        <div class="col-sm-6">
        	<div class="form-group col-xs-8" align="left">
<input type="file" name="archivo_foto" ><br>
<input type="button" value="Enviar" class="btn btn-primary">
			</div>
        </div>
	</div>
	<div class="form-group col-xs-12" align="left">
										<label class="control-label">Anexos y Biomicroscopía</label>
										<textarea class="form-control" ></textarea>
	</div>
	<br><br><br><br><br><br>
	<div  align="left">
	<strong><h4>Tonometría</h4></strong>	
	</div><br><br>
      <div class="row">
      	<div class="col-sm-3">
      		<label class="control-label">Fecha</label>
            <input class="form-control" type="date" name="fecha_tono" id="fecha_tono" value="{{date('Y-m-d')}}">
      	</div>
      	<div class="col-sm-3">
      		<label class="control-label">Hora</label>
            <input class="form-control" type="time" name="fecha_tono" id="fecha_tono" value="{{date('H:i')}}">
      	</div>
      </div>
      <div class="row">
      	<div class="col-sm-3">
      		<span class="badge badge-secondary">O.D.</span>
			 <select class="form-control" name="tonometria_od" id="tonometria_od">
				<?php for($i=10;$i<=35;$i++){
				echo"<option value='".$i."'>".$i."mm/Hg</option>";
						}?>
				</select>
      	</div>
      	<div class="col-sm-3">
      		<span class="badge badge-secondary">O.I.</span>
			<select class="form-control" name="tonometria_oi" id="tonometria_oi">
				<?php for($i=10;$i<=35;$i++){
				echo"<option value='".$i."'>".$i."mm/Hg</option>";
						}?>
				</select>
      	</div>
      </div>

</div><br><br><br>



 	<div class="col-xs-offset-1 col-xs-12" style="margin-top: 20px;">
	<strong><h3>Graduación:</h3></strong>	
	</div>

 	<div class="jumbotron col-xs-12" >
		<div class="row">
			<div class="col-sm-2">
			<label class="control-label"><h4>O.D.</h4></label>
		   </div>
			<div class="col-sm-2">
      		<span class="badge badge-secondary">ESF.</span>
			<select class="form-control" name="esf_od" id="esf_od">
				<?php for($i=25;$i>=(-25);$i-=0.25){
				echo"<option value='".$i."'>".$i."</option>";
						}?>
				</select>
      	</div>
      	<div class="col-sm-2">
      		<span class="badge badge-secondary">CIL.</span>
			<select class="form-control" name="esf_od" id="esf_od">
				<?php for($i=(-0.25);$i>=(-15);$i-=0.25){
				echo"<option value='".$i."'>".$i."</option>";
						}?>
				</select>
      	</div>
      	<div class="col-sm-2">
      		<span class="badge badge-secondary">EJE.</span>
			<select class="form-control" name="eje_od" id="eje_od">
				<?php for($i=0;$i<=180;$i+=5){
				echo"<option value='".$i."'>".$i."°</option>";
						}?>
				</select>
      	</div>
      	<div class="col-sm-2">
      		<span class="badge badge-secondary">ADD.</span>
			<select class="form-control" name="add_od" id="add_od">
				<?php for($i=1;$i<=3.50;$i+=0.25){
				echo"<option value='".$i."'>+".$i."</option>";
						}?>
				</select>
      	</div>
      	<div class="col-sm-2">
      		<span class="badge badge-secondary">AV.</span>
			<select class="form-control" name="av_od" id="av_od">
				<option value="20/400">20/400</option>
											<option value="20/300">20/300</option>
											<option value="20/200">20/200</option>
											<option value="20/150">20/150</option>
											<option value="20/120">20/120</option>
											<option value="20/100">20/100</option>
											<option value="20/70">20/70</option>
											<option value="20/60">20/60</option>
											<option value="20/50">20/50</option>
											<option value="20/40">20/40</option>
											<option value="20/30">20/30</option>
											<option value="20/25">20/25</option>
											<option value="20/20">20/20</option>
											<option value="20/15">20/15</option>
											<option value="20/10">20/10</option>
											<option value="S.P.L">S.P.L</option>
											<option value="N.P.L">N.P.L</option>
											<option value="Protésis">Protésis</option>
				</select>
      	</div>
	</div>	
	<div class="row">
			<div class="col-sm-2">
			<label class="control-label"><h4>O.I.</h4></label>
		   </div>
			<div class="col-sm-2">
      		<span class="badge badge-secondary">ESF.</span>
			<select class="form-control" name="esf_oi" id="esf_oi">
				<?php for($i=25;$i>=(-25);$i-=0.25){
				echo"<option value='".$i."'>".$i."</option>";
						}?>
				</select>
      	</div>
      	<div class="col-sm-2">
      		<span class="badge badge-secondary">CIL.</span>
			<select class="form-control" name="esf_oi" id="esf_oi">
				<?php for($i=(-0.25);$i>=(-15);$i-=0.25){
				echo"<option value='".$i."'>".$i."</option>";
						}?>
				</select>
      	</div>
      	<div class="col-sm-2">
      		<span class="badge badge-secondary">EJE.</span>
			<select class="form-control" name="eje_oi" id="eje_oi">
				<?php for($i=0;$i<=180;$i+=5){
				echo"<option value='".$i."'>".$i."°</option>";
						}?>
				</select>
      	</div>
      	<div class="col-sm-2">
      		<span class="badge badge-secondary">ADD.</span>
			<select class="form-control" name="add_oi" id="add_oi">
				<?php for($i=1;$i<=3.50;$i+=0.25){
				echo"<option value='".$i."'>+".$i."</option>";
						}?>
				</select>
      	</div>
      	<div class="col-sm-2">
      		<span class="badge badge-secondary">AV.</span>
			<select class="form-control" name="av_oi" id="av_oi">
				<option value="20/400">20/400</option>
											<option value="20/300">20/300</option>
											<option value="20/200">20/200</option>
											<option value="20/150">20/150</option>
											<option value="20/120">20/120</option>
											<option value="20/100">20/100</option>
											<option value="20/70">20/70</option>
											<option value="20/60">20/60</option>
											<option value="20/50">20/50</option>
											<option value="20/40">20/40</option>
											<option value="20/30">20/30</option>
											<option value="20/25">20/25</option>
											<option value="20/20">20/20</option>
											<option value="20/15">20/15</option>
											<option value="20/10">20/10</option>
											<option value="S.P.L">S.P.L</option>
											<option value="N.P.L">N.P.L</option>
											<option value="Protésis">Protésis</option>
				</select>
      	</div>
	</div>	

<br><br><br><br><br><br>
	<div  align="left">
	<strong><h4>Diagnóstico</h4></strong>	
	</div><br><br>
	<div class="row">
		<div class="col-sm-3">
      		<label class="control-label">Refractivo</label>
            <input class="form-control" type="text" name="refractivo" id="refractivo" >
      	</div>
      	<div class="col-sm-3">
      		<label class="control-label">Patológico</label>
            <input class="form-control" type="text" name="patologico" id="patologico" >
      	</div>
      	<div class="col-sm-3">
      		<label class="control-label">Binocularidad</label>
            <input class="form-control" type="text" name="binocularidad" id="binocularidad" >
      	</div>
	</div>	<br><br>
	<div class="row">
			<div class="col-sm-3">
      		<label class="control-label">Nombre del Lic. Optometrísta</label>
            <select class="form-control" name="optometrista" id="optometrista">
				<option value="Lic.Almendares">Lic.Almendares</option>
				<option value="Lic.Barrera">Lic.Barrera</option>
				<option value="Lic.Carmona">Lic.Carmona</option>
											
				</select>
      	</div>
	</div>			
												
	</div>

<div class="form-group col-xs-12" align="center" style="border: solid; border-color: grey; padding: 20px;">
	 <div  align="left">
	<strong><h4>Tipo de Anteojo</h4></strong>	
	</div><br><br>
	<div class="row">
		<div class="col-sm-3">
			<label class="control-label">Armazón</label>
			<input type="radio" name="armazon_radio" value="lentes_armazon" class="option-input radio" 
			id="armazon_radio1">
		</div>
		<div class="col-sm-3">
			<label class="control-label">Lentes de Contacto</label>
			<input type="radio" name="armazon_radio" value="lentes_contacto" class="option-input radio"
			id="armazon_radio2">
		</div>
		<div class="col-sm-3">
			<label class="control-label">Ambos</label>
			<input type="radio" name="armazon_radio" value="lentes_ambos" class="option-input radio"
			id="armazon_radio3">
		</div>
	</div><br><br>

	<div class="jumbotron col-xs-12" id="armazon" style="display: none;">
	 <div class="row">
	 	<div class="col-sm-3">
      		<label class="control-label">Tipo de Lente</label>
            <select class="form-control" name="tipo_lente" id="tipo_lente">
				<option value="Monofocal" selected>Monofocal</option>
				<option value="Bifocal">Bifocal</option>
				<option value="Progresivo">Progresivo</option>
			</select>
      	</div>
      	<div class="col-sm-8" id="monofocal_div" style="display: block;">
      		<div class="col-sm-2">
      			<span class="badge badge-secondary">LEJOS</span>
				<input type="radio" class="option-input radio"  name="monofocal">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">CERCA</span>
				<input type="radio" class="option-input radio"  name="monofocal">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">AMBAS</span>
				<input type="radio" class="option-input radio"  name="monofocal">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">SUB-CORRECCIÓN</span>
				<input type="radio" class="option-input radio"  name="monofocal">
			</div>
      	</div>
      	<div class="col-sm-8" id="bifocal_div" style="display: none;">
      		<div class="col-sm-2">
      			<span class="badge badge-secondary">FLAT-TOP</span>
				<input type="radio" class="option-input radio"  name="bifocal">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">BLEND</span>
				<input type="radio" class="option-input radio"  name="bifocal">
			</div>
		</div>
		<div class="col-sm-8" id="progresivo_div" style="display: none;">
      		<div class="col-sm-2">
      			<span class="badge badge-secondary">BÁSICO</span>
				<input type="radio" class="option-input radio"  name="progresivo">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">KODAK</span>
				<input type="radio" class="option-input radio"  name="progresivo">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">VARILUX</span>
				<input type="radio" class="option-input radio"  name="progresivo">
			</div>
			
      	</div>
	 </div> <br><br><br><br>
	  <div class="row">
	 	<div class="col-sm-2" align="left">
      		<label class="control-label">Material</label>
        </div>
        	<div class="col-sm-10">
      		<div class="col-sm-2">
      			<span class="badge badge-secondary">CR-39 W</span>
				<input type="radio" class="option-input radio"  name="material">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">HIGH-INDEX W</span>
				<input type="radio" class="option-input radio"  name="material">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">POLICARBONATO</span>
				<input type="radio" class="option-input radio"  name="material">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">CRISTAL W</span>
				<input type="radio" class="option-input radio"  name="material">
			</div>
      	</div>
	 </div>
	 <br><br><br><br>
	  <div class="row">
	 	<div class="col-sm-2" align="left">
      		<label class="control-label">Tratamiento</label>
        </div>
        	<div class="col-sm-10">
      		<div class="col-sm-2">
      			<span class="badge badge-secondary">SI</span>
				<input type="radio" class="option-input radio"  name="tratamiento" id="tratamiento1">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">NO</span>
				<input type="radio" class="option-input radio"  name="tratamiento" id="tratamiento2">
			</div>
	      	</div>
	 </div>
	 <br><br>
	<div class="col-xs-12" id="tratamiento_div" style="border: solid; border-color: grey;background-color: white; padding: 10px; display: none; ">
	    <div class="row">
            <div class="col-sm-4">
                <input type="checkbox" class="squaredTwo" name="antirreflejante" id="antirreflejante">
                <label class="col-xs-6 label-text">Antirreflejante</label>
            </div>
            <div class="col-sm-4">
                <input type="checkbox" class="squaredTwo" name="fotocromatico" id="fotocromatico">
                <label class="col-xs-6 label-text">Fotocromático</label>
            </div>
            <div class="col-sm-4">
                <input type="checkbox" class="squaredTwo" name="polarizado" id="polarizado">
                <label class="col-xs-6 label-text">Polarizado</label>
            </div>
        </div><br><br>
        <div class="row" id="antirreflejante_div" style="display: none;">
        	<div class="col-sm-3">
        	 <label class="control-label">Tipo de Antirreflejante</label>
             <select class="form-control" name="tipo_antirreflejante" id="tipo_antirreflejante">
				<option value="Básico">Básico</option>
				<option value="Premium">Premium</option>
			 </select>
			</div>
			<div class="col-sm-9" id="anti_premium_div" style="display: none;">
      		<div class="col-sm-3">
      			<span class="badge badge-secondary">CRIZAL EASY</span>
				<input type="radio" class="option-input radio"  name="anti_premium">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">CRIZAL ALIZE</span>
				<input type="radio" class="option-input radio"  name="anti_premium">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">CRIZAL FORTE</span>
				<input type="radio" class="option-input radio"  name="anti_premium">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">CRIZAL PREVENCIA</span>
				<input type="radio" class="option-input radio"  name="anti_premium">
			</div>
      	</div>
	    </div><br><br>
	    <div class="row" id="fotocromatico_div" style="display: none;">
        	<div class="col-sm-3">
        	 <label class="control-label">Tipo de Fotocromático</label>
             <select class="form-control" name="tipo_fotocromatico" id="tipo_fotocromatico">
				<option value="Básico">Básico</option>
				<option value="Premium">Premium</option>
			 </select>
			</div>
			<div class="col-sm-9" id="foto_premium_div" style="display: none;">
      		<div class="col-sm-3">
      			<span class="badge badge-secondary">TRANSITIONS GRIS</span>
				<input type="radio" class="option-input radio"  name="foto_premium">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">TRANSITIONS CAFÉ</span>
				<input type="radio" class="option-input radio"  name="foto_premium">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">TRANSITIONS VERDE</span>
				<input type="radio" class="option-input radio"  name="foto_premium">
			</div>
      	    </div>
	    </div><br><br>
	    <div class="row" id="polarizado_div" style="display: none;">
        	<div class="col-sm-3">
        	 <label class="control-label">Tipo de Polarizado</label>
             <select class="form-control" name="tipo_polarizado" id="tipo_polarizado">
				<option value="Básico">Básico</option>
				<option value="Premium">Premium (Xperio)</option>
			 </select>
			</div>
		</div><br><br>
	</div>

	

	

	


</div>
 <br><br>

	<div class="jumbotron col-xs-12" id="contacto" style="display: none;">
	 <div class="row">
	 	<h2>PENDIENTE SECCIÓN DE LENTES DE CONTACTO</h2>
	 </div>
	</div><br><br>

	<div class="jumbotron col-xs-12">
	 <div class="row">
                    					<div class="col-sm-3">
                    						<input type="checkbox" class="squaredTwo">
                    						<label class="col-xs-6 label-text">Enviar al Área de Ventas</label>
                    					</div>
                    					<div class="col-sm-3">
                    						<input type="checkbox" class="squaredTwo">
                    						<label class="col-xs-6 label-text">Imprimir</label>
                    					</div>
                    					<div class="col-sm-3">
                    						<input type="checkbox" class="squaredTwo" checked>
                    						<label class="col-xs-6 label-text"> Guardar</label>
                    					</div>
                    					<div class="col-sm-3">
                    						<button class="btn btn-primary"><strong>ACEPTAR</strong></button>
                    					</div>
                    				</div><br>
	</div><br><br>

										
   
   </div>
  </div>
 </div>
</div>

{{-- HISTORIAL OCULAR --}}








						 {{-- CITAS --}}

						 <div class="tab-pane" id="cita">
						 	<div class="panel-default"  >
							<div class="panel-heading"><h5>Citas&nbsp;&nbsp;&nbsp;&nbsp;</h5>{{--  <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos --}}</div>
							<div class="panel-body" >
									<form role="form" 
									      method="POST" 
									      action="">
										{{ csrf_field() }}
										<input type="hidden" name="provedor_id" value="">
										<div class="col-xs-4 col-xs-offset-10">
											
											<button id="submit" type="submit" class="btn btn-success">
										<strong>Agregar</strong>	</button>
											<a id="modificar" class="btn btn-primary" onclick="modificar()" style="display: none;">
										<strong>Modificar</strong>	</a>
											

										</div>


									<div class="col-md-12 offset-md-2 mt-3">
										<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
											<label class="control-label" for="fecha_act">Fecha Pròxima Cita:</label>
											<input type="date" class="form-control" id="fecha_act" name="fecha_act" value="" >
										</div>

									

										<div class="form-group col-lg-2 col-md-2 col-sm-4 col-xs-8">
											<label class="control-label" for="tipo_cont">Hora:</label>
											<select class="form-control" type="select" name="tipo_cont" id="tipo_cont" >
												<?php
												for($i=0;$i<24;$i++){

													if($i<=11){

									echo"<option id='' value='".$i.":00 am'>".$i.":00 am </option>";

													}else{
									echo"<option id='' value='".$i.":00 pm'>".$i.":00 pm </option>";
													}										


												}
												?>
												
												
											</select>
										</div>

										<div class="form-group col-lg-2 col-md-2 col-sm-4 col-xs-8">
											<label class="control-label" for="tipo_cont">Minutos:</label>
											<select class="form-control" type="select" name="tipo_cont" id="tipo_cont" >
												<?php
												for($i=0;$i<=60;$i+=15){
							echo"<option id='' value='".$i." mins'>".$i." mins </option>";
											}?>
												
												
											</select>
										</div>


										<div class="form-group col-lg-4 col-md-2 col-sm-4 col-xs-8">
											<label class="control-label" for="tipo_cont">Sucursal:</label>
											<select class="form-control" type="select" name="tipo_cont" id="tipo_cont" >
												
												<option id="" value="" selected="selected">Sucursal 1</option>
												<option id="" value="">Sucursal 2</option>
												<option id="" value="">Sucursal 3</option>
												<option id="" value="">Sucursal 4</option>
											</select>
										</div>
										
									</div>
									<div class="col-md-12 offset-md-2 mt-3">
										

										<!-- <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
											<label class="control-label" for="comentarios">Comentarios/Observaciones: </label>
											<textarea class="form-control" rows="5" id="comentarios" name="comentarios" maxlength="500"></textarea>
										</div> -->

										
										
									</div>
										
									
								</div>
								<div class="panel-body">
									<div class="col-md-6 offset-md-1 mt-1">
										<div style="
										height: 450px;
										overflow: scroll;">
											<table class="table table-striped table-bordered table-hover" 
										       style="color:rgb(51,51,51); 
										              border-collapse: collapse;
										              margin-bottom: 0px;
										              overflow: scroll;"
										       >
											<thead>
												<tr class="info">
													<th>Hora</th>
													<th>Estado</th>
													<th>No. de Citas</th>
													
													
												</tr>
											</thead>
											<tbody >
											
												<tr onclick='' 
												title='Has Click Aquì para ver o Modificar'
												style='cursor: pointer'>
													<td>12:45 pm</td>
													<td>Ocupado</td>
													<td>3</td>
													
													
												</tr>

												<?php
													for ($i=0; $i <45 ; $i++) { 
														echo"<tr onclick='' 
												title='Has Click Aquì para ver o Modificar'
												style='cursor: pointer'>
													<td>1:00 pm</td>
													<td>Libre</td>
													<td>0</td>
													
													
												</tr>";
													}
												?>
											</tbody>
										</table>
										</div>
										
										
								</div>
							  </div>
							</div>
						</div>

						{{-- CITAS --}}

				{{-- CRM --}}
				<div class="tab-pane" id="crm">
					<div class="panel-default">
						<div class="panel-heading"><h5>C.R.M.&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</h5>
						</div>
						<div class="panel-body">
							<form role="form" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="personal_id" >
						<div class="col-xs-4 col-xs-offset-10">
							<a class="btn btn-warning" id="limpiar" onclick="limpiar()">
							<strong>Limpiar</strong>
						</a>
							<button id="submit" type="submit" class="btn btn-success">
							<strong>Guardar</strong>
						</button>
							<a id="modificar" class="btn btn-primary" onclick="modificar()" style="display: none;">
							<strong>Modificar</strong>
						</a>
							

						</div>
					<div class="col-md-12 offset-md-2 mt-3">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="fecha_act">Fecha Actual:</label>
							<input type="date" class="form-control" id="fecha_act" name="fecha_act" value="{{ date('Y-m-d') }}" readonly>
						</div>
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="fecha_cont"><i class="fa fa-asterisk" aria-hidden="true"></i> Fecha siguiente contacto:</label>
							<input type="date" class="form-control" id="fecha_cont" name="fecha_cont" required="required" value="">
						</div>
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="fecha_aviso"><i class="fa fa-asterisk" aria-hidden="true"></i> Fecha Aviso:</label>
							<input type="date" class="form-control" id="fecha_aviso" name="fecha_aviso" required="required" value="">
						</div>
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="hora">Hora:</label>
							<input type="time" class="form-control" id="hora" name="hora" name="hora" value="">
						</div>
						<div class="form-group col-lg-6 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="tipo_cont">Forma de contacto:</label>
							<select class="form-control" type="select" name="tipo_cont" id="tipo_cont" >
								<option id="Mail" value="Mail">Email/Correo Electronico</option>
								<option id="Telefono" value="Telefono">Telefono</option>
								<option id="Cita" value="Cita">Cita</option>
								<option id="Whatsapp" value="Whatsapp">Whatsapp</option>
								<option id="Otro" value="Otro" selected="selected">Otro</option>
							</select>
						</div>
						<div class="form-group col-lg-6 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="status">Estado:</label>
							<select class="form-control" type="select" name="status" id="status" >
								<option id="Pendiente" value="Pendiente">Pendiente</option>
								<option id="Cotizando" value="Cotizando">En Cotización</option>
								<option id="Cancelado" value="Cancelado">Cancelado</option>
								<option id="Toma_decision" value="Toma_decision">Tomando decisión</option>
								<option id="Espera" value="Espera">En espera</option>
								<option id="Revisa_doc" value="Revisa_doc">Revisando documento</option>
								<option id="Proceso_aceptar" value="Proceso_aceptar">Proceso de Aceptación</option>
								<option id="Entrega" value="Entrega">Para entrega</option>
								<option id="Otro" value="Otro" selected="selected">Otro</option>
							</select>
						</div>
					</div>
					<div class="col-md-12 offset-md-2 mt-3">
						<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="acuerdos">Acuerdos: </label>
							<textarea class="form-control" rows="5" id="acuerdos" name="acuerdos" maxlength="500"></textarea>
						</div>

						<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="comentarios">Comentarios: </label>
							<textarea class="form-control" rows="5" id="comentarios" name="comentarios" maxlength="500"></textarea>
						</div>

						<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="observaciones">Observaciones: </label>
							<textarea class="form-control" rows="5" id="observaciones" name="observaciones" maxlength="500"></textarea>
						</div>
						
					</div>
						
							
						</div>
					</div>
				</div>
				{{-- CRM --}}
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

<script type="text/javascript">

$(document).ready(function(){

	$("#nombre").keyup(function(){

		
      var nombre=$("#nombre").val();
      var prim=nombre.substring(0,1);
      var appaterno=$("#appaterno").val();
      var seg=appaterno.substring(0,1);
      var apmaterno=$("#apmaterno").val();
      var ter=apmaterno.substring(0,1);
      var año1=$("#fechanacimiento").val();
      var id=prim+seg+ter+año1;
      var bid=id.toUpperCase(id);
       $("#identificador").val(bid);
	});

	$("#appaterno").keyup(function(){

		
      var nombre=$("#nombre").val();
      var prim=nombre.substring(0,1);
      var appaterno=$("#appaterno").val();
      var seg=appaterno.substring(0,1);
      var apmaterno=$("#apmaterno").val();
      var ter=apmaterno.substring(0,1);
      var año1=$("#fechanacimiento").val();
      var id=prim+seg+ter+año1;
      var bid=id.toUpperCase(id);
       $("#identificador").val(bid);
	});

		$("#apmaterno").keyup(function(){

		
      var nombre=$("#nombre").val();
      var prim=nombre.substring(0,1);
      var appaterno=$("#appaterno").val();
      var seg=appaterno.substring(0,1);
      var apmaterno=$("#apmaterno").val();
      var ter=apmaterno.substring(0,1);
      var año1=$("#fechanacimiento").val();
      var id=prim+seg+ter+año1;
      var bid=id.toUpperCase(id);
       $("#identificador").val(bid);
	});


	

    $("#fechanacimiento").change(function(){

        var año1=$("#fechanacimiento").val();
        var año2= Date();
        var nacimiento=año1.substring(0,4);
        var actual=año2.substring(11,15);
        var edad=actual-nacimiento;
       $("#edad").val(edad);

      var nombre=$("#nombre").val();
      var prim=nombre.substring(0,1);
      var appaterno=$("#appaterno").val();
      var seg=appaterno.substring(0,1);
      var apmaterno=$("#apmaterno").val();
      var ter=apmaterno.substring(0,1);
      var id=prim+seg+ter+año1;
      var bid=id.toUpperCase(id);
       $("#identificador").val(bid);
    });


     $("#chkalerg").change(function(){

       
       if($(this).prop('checked') == true){
       	document.getElementById('alergias1').style.display = 'block';
       document.getElementById('alergias2').style.display = 'block';
       }else{
       	document.getElementById('alergias1').style.display = 'none';
       document.getElementById('alergias2').style.display = 'none';
       }
    });


     $("#cronica").change(function(){

       
       if($(this).prop('checked') == true){
       	document.getElementById('enfermedades').style.display = 'block';
       
       }else{
       	document.getElementById('enfermedades').style.display = 'none';
       
       }
    });



     $("#otra").change(function(){

       
       if($(this).prop('checked') == true){
       	document.getElementById('especifique').style.display = 'block';
       
       }else{
       	document.getElementById('especifique').style.display = 'none';
       
       }
    });


        $("#control").change(function(){

       
       if($(this).prop('checked') == true){
       	document.getElementById('trat').style.display = 'block';
       
       }else{
       	document.getElementById('trat').style.display = 'none';
       
       }
    });


        $("#embarazo").change(function(){

       
       if($(this).prop('checked') == true){
       	document.getElementById('emb_tiempo').style.display = 'block';
       
       }else{
       	document.getElementById('emb_tiempo').style.display = 'none';
       
       }
    });

         $("#cirugias").change(function(){

       
       if($(this).prop('checked') == true){
       	document.getElementById('cirug').style.display = 'block';
       
       }else{
       	document.getElementById('cirug').style.display = 'none';
       
       }
    });

         $("#padecimientos").change(function(){

       
       if($(this).prop('checked') == true){
       	document.getElementById('padec').style.display = 'block';
       
       }else{
       	document.getElementById('padec').style.display = 'none';
       
       }
    });


        $("#padec_otra").change(function(){

       
       if($(this).prop('checked') == true){
       	document.getElementById('padec_text').style.display = 'block';
       
       }else{
       	document.getElementById('padec_text').style.display = 'none';
       
       }
    });

          $("#ante_otra").change(function(){

       
       if($(this).prop('checked') == true){
       	document.getElementById('ante_text').style.display = 'block';
       
       }else{
       	document.getElementById('ante_text').style.display = 'none';
       
       }
    });

      $("#tipo_lente").change(function(){

      	var option=document.getElementById("tipo_lente").value;
       

       if(option == 'Monofocal'){
       	
       	document.getElementById('monofocal_div').style.display = 'block';
       	document.getElementById('bifocal_div').style.display = 'none';
       	document.getElementById('progresivo_div').style.display = 'none';
       
       }else if(option  == 'Bifocal'){
       		
       	document.getElementById('monofocal_div').style.display = 'none';
       	document.getElementById('bifocal_div').style.display = 'block';
       	document.getElementById('progresivo_div').style.display = 'none';
       
       }else{
       	
       	document.getElementById('monofocal_div').style.display = 'none';
       	document.getElementById('bifocal_div').style.display = 'none';
       	document.getElementById('progresivo_div').style.display = 'block';		
       }
    });


    $("#armazon_radio1").change(function(){
      document.getElementById('armazon').style.display = 'block';
      document.getElementById('contacto').style.display = 'none';
     });
     $("#armazon_radio2").change(function(){
     document.getElementById('contacto').style.display = 'block';
      document.getElementById('armazon').style.display = 'none';
      
     });
    $("#armazon_radio3").change(function(){
      document.getElementById('armazon').style.display = 'block';
      document.getElementById('contacto').style.display = 'block';
     });


    $("#fotocromatico").change(function(){

       
       if($(this).prop('checked') == true){
       	document.getElementById('fotocromatico_div').style.display = 'block';
       
       }else{
       	document.getElementById('fotocromatico_div').style.display = 'none';
       
       }
    });

     $("#antirreflejante").change(function(){

       
       if($(this).prop('checked') == true){
       	document.getElementById('antirreflejante_div').style.display = 'block';
       
       }else{
       	document.getElementById('antirreflejante_div').style.display = 'none';
       
       }
    });


      $("#polarizado").change(function(){

       
       if($(this).prop('checked') == true){
       	document.getElementById('polarizado_div').style.display = 'block';
       
       }else{
       	document.getElementById('polarizado_div').style.display = 'none';
       
       }
    });

$("#tipo_fotocromatico").change(function(){

      	var option=document.getElementById("tipo_fotocromatico").value;
       

       if(option == 'Premium'){
       	
       	document.getElementById('foto_premium_div').style.display = 'block';
       	
       
       }else{
       	
       	document.getElementById('foto_premium_div').style.display = 'none';
       		
       }
    });

$("#tipo_antirreflejante").change(function(){

      	var option=document.getElementById("tipo_antirreflejante").value;
       

       if(option == 'Premium'){
       	
       	document.getElementById('anti_premium_div').style.display = 'block';
       	
       
       }else{
       	
       	document.getElementById('anti_premium_div').style.display = 'none';
       		
       }
    });

 $("#tratamiento1").change(function(){
      document.getElementById('tratamiento_div').style.display = 'block';
      
     });
  $("#tratamiento2").change(function(){
      document.getElementById('tratamiento_div').style.display = 'none';
      
     });

	

});
	











</script>

@endsection