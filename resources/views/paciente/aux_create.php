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
						{{-- PESTAÑAS --}}
					<div class="tab-content">
						




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