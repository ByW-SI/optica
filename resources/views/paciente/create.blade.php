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

							<li><a data-toggle="tab" href="#ocular" class="ui-tabs-anchor">Ocular:</a></li>

							<li><a data-toggle="tab" href="#" class="ui-tabs-anchor">Ortopedico:(En desarrollo)</a></li>

							<li><a data-toggle="tab" href="#cita" class="ui-tabs-anchor">Citas:</a></li>

							<li><a data-toggle="tab" href="#" class="ui-tabs-anchor">C.R.M.:(En Desarrollo)</a></li>
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
						 		<div class="panel-heading"><h5>Historial Medico:</h5></div>
						 		<div class="panel-body">
						 			<div class="col-xs-4 col-xs-offset-10">
					
										<button id="submit" type="submit" class="btn btn-success">
									<strong>Agregar</strong>	</button>
										<a id="modificar" class="btn btn-primary" onclick="modificar()" style="display: none;">
									<strong>Modificar</strong>	</a>
										

									</div>
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
										<label class="control-label" for="fecha_act">Fecha Actual:</label>
										<input type="date" class="form-control" id="fecha_act" name="fecha_act" value="{{ date('Y-m-d') }}" readonly>
									</div>
									<div class="col-xs-offset-1 form-group col-xs-4">

										<label class="control-label" for="fecha_act">Fecha de Último Exámen:</label>
										<input type="date" class="form-control" id="fecha_act" name="fecha_act" value="{{ date('Y-m-d') }}" readonly>

										

									</div>

<br><br><br><br><br><br><br><br><br><br><br>

									           <div class="col-xs-offset-1 form-group col-xs-4 ">
              	<label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Panatlleo: &nbsp;&nbsp;&nbsp;</label>
  <table class="table">
    <thead>
      <tr>
      	<th> </th>
        <th>Lejos</th>
        <th>Cerca</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><label class="control-label">Unilaterarlmente</label></td>
        <td><input type="text"  class="form-control"></td>
        <td><input type="text"  class="form-control"></td>
      </tr>
      <tr>
        <td><label class="control-label">Alternamente</label></td>
        <td><input type="text"  class="form-control"></td>
        <td><input type="text"  class="form-control"></td>
      </tr>
     
    </tbody>
  </table>
</div>
<br><br><br><br><br><br><br><br><br>


										<div class="form-group col-xs-5">
										<label class="control-label">&nbsp;&nbsp;&nbsp;Historial Ocular Familiar:</label>
										<textarea class="form-control" ></textarea>
										<br>
										</div>


										<div class="form-group col-xs-2 form-inline">
										<label class="control-label">¿Usa anteojos?</label>
										<br>
										<input type="checkbox" class="form-control" checked data-toggle="toggle"><br><br>

										</div>

									<div class="form-group col-xs-3 form-inline">
										<label>&nbsp;¿Le molesta la luz solar?&nbsp;&nbsp;</label><br>
										<input type="checkbox" checked data-toggle="toggle">
										
									</div>

									<div class="form-group col-xs-3 form-inline">
										<label class="control-label">¿A qué edad empezó a usar anteojos?</label>
										<input type="text" class="input-group form-control" placeholder="Años...">
										</div>
<br><br><br><br><br><br><br><br><br>

										<hr>
							<br><br><br>

<div class="col-xs-offset-2 form-group col-xs-4">
										<label class="col-xs-offset-5 control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Actual:</label>
										<div class="form-inline form-group">
										  <label class="control-label">Tipo de anteojos: &nbsp;&nbsp;</label>
										  <select class="form-control">
										  	<option>Tipo 1</option>
										  	<option>Tipo 2</option>
										  	<option>Tipo ...</option>
										  </select>
										</div>
									</div>

										<div class="form-group col-xs-4">
										<label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Anterior:</label>
										<br>
										<div class="form-group col-xs-4">
										  <input type="text" class="form-control" readonly="">
										</div>
									</div>

									<div class="col-xs-offset-2 form-group col-xs-4">
										<div class="form-inline form-group">
										  <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipo de L/C: &nbsp;&nbsp;&nbsp;</label>
										  <select class="form-control">
										  	<option>Tipo 1</option>
										  	<option>Tipo 2</option>
										  	<option>Tipo ...</option>
										  </select>
										</div>
									</div>
									<div class="form-group col-xs-4">
										<div class="form-group col-xs-4">
										  <input type="text" class="form-control" readonly="">
										</div>
									</div>
									<div class="col-xs-offset-2 form-group col-xs-4">
										<div class="form-inline form-group">
										  <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DR./opt: &nbsp;&nbsp;&nbsp;&nbsp;</label>
										  <input type="text" class="form-control" style="width: 91px">
										</div>
									</div>

									<div class="form-group col-xs-4">
										<div class="form-group col-xs-4">
										  <input type="text" class="form-control" readonly="">
										</div>
									</div>

									<div class="col-xs-offset-2 form-inline col-xs-4">
										<label class="control-label">Observaciones/<br>Comentarios: &nbsp;&nbsp;&nbsp;&nbsp;</label>
										<textarea class="form-control"></textarea>
									</div>

									<div class="form-inline">
										  <textarea class="form-control" readonly=""></textarea>
									</div>

									<hr>


									<div class="row" >
										
										

										  <label class="control-label"> &nbsp;&nbsp;&nbsp;&nbsp;DIP: </label><br>
										   <div class="col-sm-1"> <input type="text" class="form-control" style="width: 91px"></div>
										    <div class="col-sm-1"> <input type="text" class="form-control" style="width: 91px"></div>
										
										 
										


									 <div class="col-xs-offset-1 form-group col-xs-4 ">
              	
  <table class="table">
    <thead>
      <tr>
      	<th> </th>
        <th>Ojo Izq.</th>
        <th>Ojo Der.</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><label class="control-label">Queratometrìa</label></td>
        <td><input type="text"  class="form-control"></td>
        <td><input type="text"  class="form-control"></td>
      </tr>
     
     
    </tbody>
  </table>
</div>
										

									</div>


<div class="row col-xs-3" >

	<ul class="list-group">
  <li class="list-group-item"><label class="control-label">ARN: </label> <input type="text" class="form-control" style="width: 91px"></li>
  <li class="list-group-item"><label class="control-label">ARP: </label> <input type="text" class="form-control" style="width: 91px"></li>
  
</ul>

</div>
<br><br>
 <div class= "col-xs-offset-1 form-group col-xs-4 " >
              	
  <table class="table">
  	<label class="control-label">Amplitud de Acomodaciòn</label>
    <thead>
      <tr>
      	
        <th>Ojo Izq.</th>
        <th>Ojo Der.</th>
        <th>A.O. </th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><input type="text"  class="form-control"></td>
        <td><input type="text"  class="form-control"></td>
        <td><input type="text"  class="form-control"></td>
      </tr>
     
     
    </tbody>
  </table>
</div>
									
										  


									

<!-- 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label class="control-label">Querametometrìa</label> <br>

								<div class=" form-group col-xs-1">
										<div class="form-inline form-group">
											 
										 
										  <input type="text" class="form-control" style="width: 91px" placeholder="Ojo Der">
										</div>

									</div>
									<div class="form-group col-xs-1">
										<div class="form-group col-xs-1">
										  <input type="text" class="form-control" style="width: 91px" placeholder="Ojo Izq">
										</div>
									</div>
 -->








						  			<!-- adentro de panel-body -->
						  		</div>
						  		<!-- afuera de panel-body -->


						  		
						  	</div>
						  	
						  </div>

					


                                    

									

									

									
									
						 		
									
						 	




								<!-- <div class="panel-body">
									<h3><span class="label label-default">A.V.S. Lentes</span></h3>
									<div class="col-xs-offset-2 form-group col-sm-4">
										<label class="col-xs-offset-4 control-label">Actual:</label>
										<div class="input-group">
										  <span class="input-group-addon">O.D.</span>
										  <input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group col-sm-4">
										<label class="col-xs-offset-4 control-label">Anterior:</label>
										<div class="input-group">
										  <span class="input-group-addon">O.D.</span>
										  <input type="text" class="form-control" readonly="">
										</div>
									</div>
									<div class=" col-xs-offset-2 form-group col-sm-4">
										
										<div class="input-group">
										  <span class="input-group-addon">O.L.</span>
										  <input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group col-sm-4">
										
										<div class="input-group">
										  <span class="input-group-addon">O.L.</span>
										  <input type="text" class="form-control" readonly="">
										</div>
									</div>
									<div class="col-xs-offset-2 form-group col-sm-4">
										
										<div class="input-group">
										  <span class="input-group-addon">K.O.D.</span>
										  <input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group col-sm-4">
										
										<div class="input-group">
										  <span class="input-group-addon">K.O.D.</span>
										  <input type="text" class="form-control" readonly="">
										</div>
									</div>
									<div class=" col-xs-offset-2 form-group col-sm-4">
										
										<div class="input-group">
										  <span class="input-group-addon">K.O.L.</span>
										  <input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group col-sm-4">
										
										<div class="input-group">
										  <span class="input-group-addon">K.O.L.</span>
										  <input type="text" class="form-control" readonly="">
										</div>
									</div>

								</div> -->


								<!-- <div class="panel-body">
									<h3><span class="label label-default">A.V. Clientes</span></h3>
									<div class="col-xs-offset-2 form-group col-sm-4">
										<label class="col-xs-offset-4 control-label">Actual:</label>
										<div class="input-group">
										  <span class="input-group-addon">O.D.</span>
										  <input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group col-sm-4">
										<label class="col-xs-offset-4 control-label">Anterior:</label>
										<div class="input-group">
										  <span class="input-group-addon">O.D.</span>
										  <input type="text" class="form-control" readonly="">
										</div>
									</div>
									<div class=" col-xs-offset-2 form-group col-sm-4">
										
										<div class="input-group">
										  <span class="input-group-addon">O.L.</span>
										  <input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group col-sm-4">
										
										<div class="input-group">
										  <span class="input-group-addon">O.L.</span>
										  <input type="text" class="form-control" readonly="">
										</div>
									</div>
								</div> -->


								<!-- <div class="panel-body">
									<h3><span class="label label-default">R.X. Actual</span></h3>
									<div class="form-group col-sm-2">
										<div class="input-group">
										  <span class="input-group-addon">O.D. Est.</span>
										  <input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group col-sm-2">
										<div class="input-group">
										  <span class="input-group-addon">Cil.</span>
										  <input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group col-sm-2">
										<div class="input-group">
										  <span class="input-group-addon">Eje</span>
										  <input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group col-sm-2">
										<div class="input-group">
										  <span class="input-group-addon">Add</span>
										  <input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group col-sm-2">
										<div class="input-group">
										  <span class="input-group-addon">D.N.P.</span>
										  <input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group col-sm-2">
										<div class="input-group">
										  <span class="input-group-addon">A.O.</span>
										  <input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group col-sm-2">
										<div class="input-group">
										  <span class="input-group-addon">O.L. Est.</span>
										  <input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group col-sm-2">
										<div class="input-group">
										  <span class="input-group-addon">Cil.</span>
										  <input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group col-sm-2">
										<div class="input-group">
										  <span class="input-group-addon">Eje</span>
										  <input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group col-sm-2">
										<div class="input-group">
										  <span class="input-group-addon">Add</span>
										  <input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group col-sm-2">
										<div class="input-group">
										  <span class="input-group-addon">D.N.P.</span>
										  <input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group col-sm-2">
										<div class="input-group">
										  <span class="input-group-addon">A.O.</span>
										  <input type="text" class="form-control">
										</div>
									</div>
								</div>


								<div class="panel-body">
									<h3><span class="label label-default">R.X. Anterior</span></h3>
									<div class="form-group col-sm-2">
										<div class="input-group">
										  <span class="input-group-addon">O.D. Est.</span>
										  <input type="text" class="form-control" readonly="">
										</div>
									</div>
									<div class="form-group col-sm-2">
										<div class="input-group">
										  <span class="input-group-addon">Cil.</span>
										  <input type="text" class="form-control" readonly="">
										</div>
									</div>
									<div class="form-group col-sm-2">
										<div class="input-group">
										  <span class="input-group-addon">Eje</span>
										  <input type="text" class="form-control" readonly="">
										</div>
									</div>
									<div class="form-group col-sm-2">
										<div class="input-group">
										  <span class="input-group-addon">Add</span>
										  <input type="text" class="form-control" readonly="">
										</div>
									</div>
									<div class="form-group col-sm-2">
										<div class="input-group">
										  <span class="input-group-addon">D.N.P.</span>
										  <input type="text" class="form-control" readonly="">
										</div>
									</div>
									<div class="form-group col-sm-2">
										<div class="input-group">
										  <span class="input-group-addon">A.O.</span>
										  <input type="text" class="form-control" readonly="">
										</div>
									</div>
									<div class="form-group col-sm-2">
										<div class="input-group">
										  <span class="input-group-addon">O.L. Est.</span>
										  <input type="text" class="form-control" readonly="">
										</div>
									</div>
									<div class="form-group col-sm-2">
										<div class="input-group">
										  <span class="input-group-addon">Cil.</span>
										  <input type="text" class="form-control" readonly="">
										</div>
									</div>
									<div class="form-group col-sm-2">
										<div class="input-group">
										  <span class="input-group-addon">Eje</span>
										  <input type="text" class="form-control" readonly="">
										</div>
									</div>
									<div class="form-group col-sm-2">
										<div class="input-group">
										  <span class="input-group-addon">Add</span>
										  <input type="text" class="form-control" readonly="">
										</div>
									</div>
									<div class="form-group col-sm-2">
										<div class="input-group">
										  <span class="input-group-addon">D.N.P.</span>
										  <input type="text" class="form-control" readonly="">
										</div>
									</div>
									<div class="form-group col-sm-2">
										<div class="input-group">
										  <span class="input-group-addon">A.O.</span>
										  <input type="text" class="form-control" readonly="">
										</div>
									</div>
								</div> -->


								
								

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

													

									echo"<option id='' value='".$i." mins'>

									".$i." mins </option>";

													
									
																						


												}
												?>
												
												
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
										
									</form>
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