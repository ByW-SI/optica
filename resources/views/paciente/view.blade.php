@extends('layouts.test')
@section('content1')

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
						<div  class="tab-pane" id="generales">
							
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
						
						 <div class="tab-pane fade in active " id="hmedico">
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