@extends('layouts.test')
@section('content1')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="container">
	<div role="application" class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-3">
						<h4><strong>Datos del Paciente:</strong></h4>
					</div>
					<div class="col-sm-2">
						<a class="btn btn-info" href="{{ route('pacientes.create') }}"><strong>Nuevo Paciente</strong></a>
					</div>
					<div class="col-sm-2">
						<a class="btn btn-primary" href="{{ route('pacientes.edit',['id'=>$paciente->id]) }}"><strong>Editar Paciente</strong></a>
					</div>
					<div class="col-sm-2">
						<a class="btn btn-primary" href="{{ route('pacientes.index') }}"><strong>Ver Pacientes</strong></a>
					</div>
				</div>
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
	</div>
</div>

	{{-- PESTAÑAS --}}
		<ul class="nav nav-pills nav-justified">
			<li role="presentation"><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}"  class="ui-tabs-anchor">Generales:</a></li> 
			

			<li role="presentation" ><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">Historial Médico:</a></li>

			<li role="presentation" class="active"><a href="" class="ui-tabs-anchor">Historial Ocular:</a></li>

			<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">Ortopédico:</a></li>

			<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">Citas:</a></li>

			<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">C.R.M:</a></li>
		</ul>
	
{{-- PESTAÑAS --}}
<div class="container">
		<div class="panel panel-group">
 {{-- HISTORIAL OCULAR --}}
						  <div id="ocular">
						  	@if ($edit == true)
				{{-- true expr --}}

		
			<form role="form" method="POST" action="{{ route('pacientes.historialocular.update',['paciente'=>$paciente,'datosgenerale'=>$paciente->generales]) }}">

				{{ csrf_field() }}
				<input type="hidden" name="_method" value="PUT">
			@else
				{{-- false expr --}}
			<form role="form" method="POST" action="{{ route('pacientes.historialocular.store',['paciente'=>$paciente]) }}">
				{{ csrf_field() }}
			@endif
						  	<div class="panel-default">
						  		<div class="panel-heading"><h5>Historial Ocular:</h5></div>

						  		<input type="hidden" name="paciente_id" value="{{$paciente->id}}">
						  		<div class="panel-body">

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
										<input type="date" class="form-control" id="fecha_act"  value="{{ date('Y-m-d') }}" readonly>

										
										<br><br>
									</div>

								<div class="row">
									<div class="col-xs-offset-1 form-group col-sm-4">
										 <label>
									<input type="hidden" name="cirugias" value="NO">	 	
						 	      	<input id="cirugias" type="checkbox" data-toggle="toggle" data-on="SI" data-off="NO"  name="cirugias" value="SI">
                                Cirugías en los Ojos:
                                 </label>
									</div>
									<div class="col-xs-offset-1 form-group col-sm-4">
										 <label>
									<input type="hidden" name="padecimientos" value="NO">
						 	      	<input id="padecimientos" type="checkbox" data-toggle="toggle" data-on="SI" data-off="NO"  name="padecimientos" value="SI">
                               Padecimientos Oculares:
                                 </label>
									</div>
								</div>	
									
                        <div class="row">
									<div class="form-group col-xs-6">
										 <div class="jumbotron"  id="cirug" style="display: none;padding: 10px;">
										 		<div class="row">
									<div class="form-group col-xs-5">
									<label class="control-label">¿Cuál?</label>
									<input class="form-control" type="text" name="cirug_1">
									</div>

									<div class="form-group col-xs-5">
									<label class="control-label">¿Hace Cuánto?</label>
									<input class="form-control" type="text" name="cirug_2">
									</div>
												</div>
												<div class="row">
									<div class="form-group col-xs-5">
									<label class="control-label">¿Tiene Tratamiento Actualmente?</label>
									<input class="form-control" type="text" name="cirug_3">
									</div>
												</div>
								</div>
							</div>

							<div class=" form-group col-xs-6">
								<div class="jumbotron"  id="padec" style="display: none;padding: 10px;">
									<div class="row">
                    					<div class="col-sm-4">
                    						<label class="col-xs-4 label-text"><input type="checkbox" class="squaredTwo" name="padecimientos_array[0]" value="Catarata">Catarata</label>
                    					</div>
                    					
                    					<div class="col-sm-4">
                    						<label class="col-xs-4 label-text"><input type="checkbox" class="squaredTwo" name="padecimientos_array[1]" value="Glaucoma"> Glaucoma</label>
                    					</div>

                    					<div class="col-sm-4">
                    						<label class="col-xs-4 label-text"><input type="checkbox" class="squaredTwo" name="padecimientos_array[2]" value="Retinopatía Diabética">Retinopatía Diabética</label>
                    					</div>
                    				</div>
                    				<div class="row">
                    					<div class="col-sm-4">
                    						<label class="col-xs-4 label-text"><input type="checkbox" class="squaredTwo" name="padecimientos_array[3]" value="Retinopatía Hipertensiva">Retinopatía Hipertensiva</label>
                    					</div>
                    					
                    					<div class="col-sm-4">
                    						<label class="col-xs-4 label-text"><input type="checkbox" class="squaredTwo" name="padecimientos_array[4]" value="Queratocono">Queratocono</label>
                    					</div>

                    					<div class="col-sm-4">
                    						<label class="col-xs-4 label-text"><input type="checkbox" class="squaredTwo" name="padecimientos_array[5]" id="padec_otra" value="Otra">Otra</label>
                    					</div>
                    				</div><br>
                    				<div class="row" id="padec_text" style="display: none;">
                    					<div class="col-sm-6">
                    					<label class="control-label">Especifíque:</label>
									    <input class="form-control" type="text" name="padec_text">
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
				<input type="radio" class="option-input radio" name="problema_visual" value="LEJOS" required>
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">CERCA</span>
				<input type="radio" class="option-input radio" name="problema_visual" value="CERCA">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">AMBAS</span>
				<input type="radio" class="option-input radio" name="problema_visual" value="AMBAS">
			</div>
		</div><br><br>
		<div class="row">
			
			<div class="col-sm-2 ">
			<label class="control-label">Usuario de Lentes</label>
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">SI</span>
				<input type="radio" class="option-input radio" name="usuario_lentes" id="usuario_lentes1" value="SI" required>
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">NO</span>
				<input type="radio" class="option-input radio" name="usuario_lentes" id="usuario_lentes2" value="NO">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">OCASIONALMENTE</span>
				<input type="radio" class="option-input radio" name="usuario_lentes" id="usuario_lentes3" value="OCASIONALMENTE">
			</div>
		    
		</div><br><br>
		<div class="row" id="edad_lentes" style="display: none;">
			<div class="col-sm-3">
			<label class="control-label">Edad a la que inició uso de Lentes</label>
			</div>
			  <div class="form-group col-xs-2">
						<select class="form-control" name="edad_lentes" id="edad_lentes_select">
							<option value="">Seleccione uno</option>
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
				<input type="radio" class="option-input radio" name="molestia_luz" value="SI" required>


			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">NO</span>
				<input type="radio" class="option-input radio" name="molestia_luz" value="NO">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">REGULAR</span>
				<input type="radio" class="option-input radio" name="molestia_luz" value="REGULAR">
			</div>
		    
		</div><br><br>
		<div class="row">
			
			<div class="col-sm-2 ">
			<label class="control-label">Usuario de Computadora</label>
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">SI</span>
				<input type="radio" class="option-input radio" name="usuario_computadora" value="SI" required>
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">NO</span>
				<input type="radio" class="option-input radio"  name="usuario_computadora" value="NO">
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
 		                                    <input type="hidden" name="antecedentes_array[0]" value="Ninguno">
									<div class="row">
                    					<div class="col-sm-4">
                    						<input type="checkbox" class="squaredTwo" name="antecedentes_array[0]" value="Usuarios de Lentes">
                    						<label class="col-xs-6 label-text">Usuarios de Lentes</label>
                    					</div>
                    					<div class="col-sm-4">
                    						<input type="checkbox" class="squaredTwo" name="antecedentes_array[1]" value="Catarata">
                    						<label class="col-xs-6 label-text">Catarata</label>
                    					</div>
                    					<div class="col-sm-4">
                    						<input type="checkbox" class="squaredTwo" name="antecedentes_array[2]" value="Glaucoma">
                    						<label class="col-xs-6 label-text"> Glaucoma</label>
                    					</div>
                    				</div><br>

                    				<div class="row">
                    					<div class="col-sm-4">
                    						<input type="checkbox" class="squaredTwo" name="antecedentes_array[3]" value="Estrabismo">
                    						<label class="col-xs-6 label-text">Estrabismo</label>
                    					</div>
                    					<div class="col-sm-4">
                    						<input type="checkbox" class="squaredTwo" name="antecedentes_array[4]" id="ante_otra" value="Otra">
                    						<label class="col-xs-6 label-text">Otra</label>
                    					</div>
                    					
                    				</div> <br>

                    				<div class="row" id="ante_text" style="display: none">
                    					<div class="col-sm-6">
                    					<label class="control-label">Especifíque:</label>
									<input class="form-control" type="text" name="antecedente_text" >
										</div>
                    				</div>
												
	</div>
 </div>



 <div class=" col-xs-10" align="left" style="border: solid; border-color: grey; padding: 15px;">
<legend><strong><h3>Revisión Visual</h3></strong></legend>
 	<!-- <div class="col-sm-4">
										<label class=" label-text ">A.V. sin Rx. de Lejos(Snellen)</label>
									  </div> -->

 	
									<div class="row" style="background-color: lightgray; padding: 15px;">
									   <div class="col-xs-4" align="left">
	<strong><h4>A.V. sin Rx. de Lejos(Snellen)</h4></strong>	
	</div>
                    				  <div class="col-sm-2">
                    						<h1><span class="badge badge-secondary">O.D.</span></h1>
                    						<select class="form-control" name="snellen_1">
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

                    					<div class="col-sm-2">
                    						<h1><span class="badge badge-secondary">O.I.</span></h1>
                    						<select class="form-control" name="snellen_2">
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
                    					

                    					
                    				</div><hr>
<div class="row" style="background-color: lightgray; padding: 15px;">
    <div class="col-sm-3" align="left">
	<strong><h4>Pantalleo</h4></strong>	
	</div>
<div class="col-xs-8">
	
	<div class="row">
		<div class="col-sm-4">
		<label class="col-xs-8 label-text ">Unilateral</label>
	    </div>
		<div class="col-sm-4">
            <span class="badge badge-secondary">Lejos</span>
                <select class="form-control" name="unilateral_lejos">
					<option value='ORTO'>ORTO</option>
					<option value='ENDO'>ENDO</option>
					<option value='EXO'>EXO</option>
					<option value='HIPER'>HIPER</option>
					<option value='HIPO'>HIPO</option>
				</select>
		</div>
		<div class="col-sm-4">
            <span class="badge badge-secondary">Cerca</span>
                <select class="form-control" name="unilateral_cerca">
					<option value='ORTO'>ORTO</option>
					<option value='Endo'>Endo</option>
					<option value='EXO'>EXO</option>
					<option value='HIPER'>HIPER</option>
					<option value='HIPO'>HIPO</option>
				</select>
		</div>
	</div><br><br>
	<div class="row">
		<div class="col-sm-4">
		<label class="col-xs-8 label-text ">Alternante</label>
	   </div>
		<div class="col-sm-4">
            <span class="badge badge-secondary">Lejos</span>
                <select class="form-control" name="alternamente_lejos">
					<option value='ORTO'>ORTO</option>
					<option value='ENDO'>ENDO</option>
					<option value='EXO'>EXO</option>
					<option value='HIPER'>HIPER</option>
					<option value='HIPO'>HIPO</option>
				</select>
		</div>
		<div class="col-sm-4">
            <span class="badge badge-secondary">Cerca</span>
                <select class="form-control" name="alternamente_cerca">
					<option value='ORTO'>ORTO</option>
					<option value='ENDO'>ENDO</option>
					<option value='EXO'>EXO</option>
					<option value='HIPER'>HIPER</option>
					<option value='HIPO'>HIPO</option>
				</select>
		</div>
	</div>
</div>
</div>
<hr>

<div class="row" style="background-color: lightgray; padding: 15px;">
<div class="col-sm-3" align="left">
	<strong><h4>Queratometría</h4></strong>	
	</div>
<div class=" col-xs-8" align="left">
	 
	<div class="row">
		<div class="col-sm-3">
			<label class="control-label"><h4><strong>O.D.</strong></h4></label>
		   </div>
		<div class="col-sm-3">
            <span class="badge badge-secondary">Plana</span>
                <select class="form-control" name="queratometria_od_plana">
					<?php for( $i=32;$i<=55;$i+=0.25){
				echo"<option value='".sprintf("%.2f", $i)."'>".sprintf("%.2f", $i)."</option>";
						}?>
				</select>
		</div>
		<div class="col-sm-3">
            <span class="badge badge-secondary">Curva</span>
                <select class="form-control" name="queratometria_od_curva">
				<?php for($i=32;$i<=55;$i+=0.25){
				echo"<option value='".sprintf("%.2f", $i)."'>".sprintf("%.2f", $i)."</option>";
						}?>
				</select>
		</div>
		<div class="col-sm-3">
            <span class="badge badge-secondary">Eje</span>
                <select class="form-control" name="queratometria_od_eje">
					<?php for($i=0;$i<=180;$i+=5){
				echo"<option value='".$i."°'>".$i."°</option>";
						}?>
				</select>
		</div>
	</div><br><br>
	<div class="row">
		<div class="col-sm-3">
			<label class="control-label"><h4><strong>O.I.</strong></h4></label>
		   </div>
		<div class="col-sm-3">
            <span class="badge badge-secondary">Plana</span>
                <select class="form-control" name="queratometria_oi_plana">
					<?php for($i=32;$i<=55;$i+=0.25){
				echo"<option value='".sprintf("%.2f", $i)."'>".sprintf("%.2f", $i)."</option>";
						}?>
				</select>
		</div>
		<div class="col-sm-3">
            <span class="badge badge-secondary">Curva</span>
                <select class="form-control" name="queratometria_oi_curva">
					<?php for($i=32;$i<=55;$i+=0.25){
				echo"<option value='".sprintf("%.2f", $i)."'>".sprintf("%.2f", $i)." </option>";
						}?>
				</select>
		</div>
		<div class="col-sm-3">
            <span class="badge badge-secondary">Eje</span>
                <select class="form-control" name="queratometria_oi_eje">
					<?php for($i=0;$i<=180;$i+=5){
				echo"<option value='".$i."°'>".$i."°</option>";
						}?>
				</select>
		</div>
	</div>
</div>
</div><hr>


	<div class="row" style="background-color: lightgray; padding: 15px;">
		<div class="col-sm-5" align="left">
	<strong><h4>Visión Estereoscópica</h4></strong>	
	</div>
		<div class="col-sm-2">
            <span class="badge badge-secondary">seg/arco</span>
                <select class="form-control" name="vision_estereo">
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
		
	</div><hr>

<div class="row" style="background-color: lightgray; padding: 15px;">
		<div class="col-sm-3" align="left">
	<strong><h4>Oftalmoscopía</h4></strong>	
	</div><br><br><br>
		<div class="row">
		<div class="col-sm-3">
			<span class="badge badge-secondary">PARÁMETROS</span>
		</div>
		<div class="col-sm-3">
			<span class="badge badge-secondary">OJO DERECHO</span>
		</div>
		<div class="col-sm-3">
			<span class="badge badge-secondary">OJO IZQUIERDO</span>
		</div>
	</div><br>

	<div class="row">
		<div class="col-sm-3">
			<label class="control-label">Papila</label>
		</div>
		<div class="col-sm-3">
			<input class="form-control" type="text" name="papila_od" id="papila_od">
        </div>
        <div class="col-sm-3">
        	<input class="form-control" type="text" name="papila_oi" id="papila_oi">
        </div>
	</div><br>
	<div class="row">
		<div class="col-sm-3">
			<label class="control-label">Excavación</label>
		</div>
		<div class="col-sm-3">
			<input class="form-control" type="text" name="excavacion_od" id="excavacion_od">
        </div>
        <div class="col-sm-3">
        	<input class="form-control" type="text" name="excavacion_oi" id="excavacion_oi">
        </div>
	</div><br>
	<div class="row">
		<div class="col-sm-3">
			<label class="control-label">Radio</label>
		</div>
		<div class="col-sm-3">
			<input class="form-control" type="text" name="radio_od" id="radio_od">
        </div>
        <div class="col-sm-3">
        	 <input class="form-control" type="text" name="radio_oi" id="radio_oi">
        </div>
	</div><br>
	<div class="row">
		<div class="col-sm-3">
			<label class="control-label">Profundidad</label>
		</div>
		<div class="col-sm-3">
			<input class="form-control" type="text" name="profundidad_od" id="profundidad_od">
        </div>
        <div class="col-sm-3">
        	<input class="form-control" type="text" name="profundidad_oi" id="profundidad_oi">
        </div>
	</div><br>
	<div class="row">
		<div class="col-sm-3">
			<label class="control-label">Vasos</label>
		</div>
		<div class="col-sm-3">
			<input class="form-control" type="text" name="vasos_od" id="vasos_od">
        </div>
        <div class="col-sm-3">
        	 <input class="form-control" type="text" name="vasos_oi" id="vasos_oi">
        </div>
	</div><br>
	<div class="row">
		<div class="col-sm-3">
			<label class="control-label">Rel. A/V</label>
		</div>
		<div class="col-sm-3">
			 <input class="form-control" type="text" name="rel_od" id="rel_od">
        </div>
        <div class="col-sm-3">
        	<input class="form-control" type="text" name="rel_oi" id="rel_oi">
        </div>
	</div><br>
	<div class="row">
		<div class="col-sm-3">
			<label class="control-label">Macula</label>
		</div>
		<div class="col-sm-3">
			<input class="form-control" type="text" name="macula_od" id="macula_od">
        </div>
        <div class="col-sm-3">
        	<input class="form-control" type="text" name="macula_oi" id="macula_oi">
        </div>
	</div><br>
	<div class="row">
		<div class="col-sm-3">
			<label class="control-label">Reflejo</label>
		</div>
		<div class="col-sm-3">
			<input class="form-control" type="text" name="reflejo_od" id="reflejo_od">
        </div>
        <div class="col-sm-3">
        	<input class="form-control" type="text" name="reflejo_oi" id="reflejo_oi">
        </div>
	</div><br>
	<div class="row">
		<div class="col-sm-3">
			<label class="control-label">Retina Periférica</label>
		</div>
		<div class="col-sm-3">
			<input class="form-control" type="text" name="retina_od" id="retina_od">
        </div>
        <div class="col-sm-3">
        	<input class="form-control" type="text" name="retina_oi" id="retina_oi">
        </div>
		</div>
</div><hr>

<div class="row" style="background-color: lightgray; padding: 15px;">
		<div class="col-sm-5" align="left">
	<strong><h4>Anexos y Biomicroscopía</h4></strong>	
	</div>
		<div class="col-sm-12">
           <textarea class="form-control" name="anexos"></textarea>
		</div><br>
		<div class="form-group col-xs-12" align="left">
<input type="file" name="archivo_foto" class="btn btn-primary" ><br>

			</div>
		
	</div><hr>

<div class="row" style="background-color: lightgray; padding: 15px;">
		<div class="col-sm-12" align="left">
	<strong><h4>Tonometría</h4></strong>	
	</div><br><br>
		<div class="row">
      	<div class="col-sm-3">
      		<label class="control-label">Fecha</label>
            <input class="form-control" type="date" name="fecha_tono" id="fecha_tono" value="{{date('Y-m-d')}}">
      	</div>
      	<div class="col-sm-3">
      		<label class="control-label">Hora</label>
            <input class="form-control" type="time" name="hora_tono" id="hora_tono" value="{{date('H:i')}}">
      	</div>
      </div><br>
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
		
	</div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>





	

	
	
      

</div>



 	

 	<div class="jumbotron col-xs-16" >
 		<div class="row" style="margin-top: 20px;">
	<strong><h3>Graduación:</h3></strong>	
	</div><br>
	
 		<div class="row">
 			<div class="col-sm-2">
			<label class="control-label"><h4><strong>Ojo Derecho.</strong></h4></label>
		   </div>
 		</div>
		<div class="row">
			
			<div class="col-sm-2">
      		<span class="badge badge-secondary">ESF.</span>
			<select class="form-control" name="esf_od" id="esf_od" required>
				<option value="Sin Valor">Seleccione uno</option>
				<?php for($i=25;$i>=(-25);$i-=0.25){
					if($i>0){echo"<option value='+".sprintf("%.2f", $i)."'>+".sprintf("%.2f", $i)."</option>";}
					    else{echo"<option value='".sprintf("%.2f", $i)."'>".sprintf("%.2f", $i)."</option>";}
				}?>
				</select>
      	</div>
      	<div class="col-sm-2">
      		<span class="badge badge-secondary">CIL.</span>
			<select class="form-control" name="cil_od" id="cil_od">
				<option value="">Seleccione uno</option>
				<?php for($i=(-0.25);$i>=(-15);$i-=0.25){
					if($i>0){echo"<option value='+".sprintf("%.2f", $i)."'>+".sprintf("%.2f", $i)."</option>";}
						else{echo"<option value='".sprintf("%.2f", $i)."'>".sprintf("%.2f", $i)."</option>";}
				
						}?>
				</select>
      	</div>
      	<div class="col-sm-2" id="eje_od_div" style="display: none;">
      		<span class="badge badge-secondary">EJE.</span>
			<select class="form-control" name="eje_od" id="eje_od">
				<option value="">Seleccione uno</option>
				<?php for($i=0;$i<=180;$i+=5){
				echo"<option value='".$i."'>".$i."°</option>";
						}?>
				</select>
      	</div>
      	<div class="col-sm-2">
      		<span class="badge badge-secondary">ADD.</span>
			<select class="form-control" name="add_od" id="add_od" required>
				<option value="">Seleccione uno</option>
				<?php for($i=1;$i<=3.50;$i+=0.25){
				echo"<option value='".sprintf("%.2f", $i)."'>+".sprintf("%.2f", $i)."</option>";
						}?>
				</select>
      	</div>
      	<div class="col-sm-2">
      		<span class="badge badge-secondary">AV.</span>
			<select class="form-control" name="av_od" id="av_od" required>
											<option value="">Seleccione uno</option>
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
      
	</div>	<br>
	<div class="row">
			<div class="col-sm-2">
      		<span class="badge badge-secondary">D.N.P. Lejos</span>
                    						<select class="form-control" name="dnp_od_lejos" required>
                    							<option value="">Seleccione uno</option>
                    							<?php for($i=20;$i<=50;$i+=0.50){
											
											   echo"<option value='".sprintf("%.2f", $i)."'>".sprintf("%.2f", $i)." mm</option>";
											}?>
											</select>
      	</div>
      	<div class="col-sm-2">
      		<span class="badge badge-secondary">D.N.P. Cerca</span>
                    						<select class="form-control" name="dnp_od_cerca" required>
                    							<option value="">Seleccione uno</option>
											<?php for($i=20;$i<=50;$i+=0.5){
											
											   echo"<option value='".sprintf("%.2f", $i)."'>".sprintf("%.2f", $i)." mm</option>";
											}?>
										</select>
      	</div>
	</div><br><hr>
    <div class="row">
    	<div class="col-sm-3">
			<label class="control-label"><h4><strong>Ojo Izquierdo</strong></h4></label>
		   </div>
    </div>
	<div class="row">
			
			<div class="col-sm-2">
      		<span class="badge badge-secondary">ESF.</span>
			<select class="form-control" name="esf_oi" id="esf_oi" required>
				<option value="">Seleccione uno</option>
				<?php for($i=25;$i>=(-25);$i-=0.25){
					if($i>0){echo"<option value='+".sprintf("%.2f", $i)."'>+".sprintf("%.2f", $i)."</option>";}
					    else{echo"<option value='".sprintf("%.2f", $i)."'>".sprintf("%.2f", $i)."</option>";}
				}?>
				</select>
      	</div>
      	<div class="col-sm-2">
      		<span class="badge badge-secondary">CIL.</span>
			<select class="form-control" name="cil_oi" id="cil_oi">
				<option value="Sin Valor">Seleccione uno</option>
				<?php for($i=(-0.25);$i>=(-15);$i-=0.25){
					if($i>0){echo"<option value='+".sprintf("%.2f", $i)."'>+".sprintf("%.2f", $i)."</option>";}
						else{echo"<option value='".sprintf("%.2f", $i)."'>".sprintf("%.2f", $i)."</option>";}
				
						}?>
				</select>
      	</div>
      	<div class="col-sm-2" id="eje_oi_div" style="display: none;">
      		<span class="badge badge-secondary">EJE.</span>
			<select class="form-control" name="eje_oi" id="eje_oi">
				<option value="">Seleccione uno</option>
				<?php for($i=0;$i<=180;$i+=5){
				echo"<option value='".$i."'>".$i."°</option>";
						}?>
				</select>
      	</div>
      	<div class="col-sm-2">
      		<span class="badge badge-secondary">ADD.</span>
			<select class="form-control" name="add_oi" id="add_oi" required>
				<option value="">Seleccione uno</option>
				<?php for($i=1;$i<=3.50;$i+=0.25){
				echo"<option value='".sprintf("%.2f", $i)."'>+".sprintf("%.2f", $i)."</option>";
						}?>
				</select>
      	</div>
      	<div class="col-sm-2">
      		<span class="badge badge-secondary">AV.</span>
			<select class="form-control" name="av_oi" id="av_oi" required>
											<option value="">Seleccione uno</option>
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
      	
	</div>	<br>
	<div class="row">
		<div class="col-sm-2">
      		<span class="badge badge-secondary">D.N.P. Lejos</span>
                    						<select class="form-control" name="dnp_oi_lejos" required>
                    							<option value="">Seleccione uno</option>
                    							<?php for($i=20;$i<=50;$i+=0.50){
											
											   echo"<option value='".sprintf("%.2f", $i)."'>".sprintf("%.2f", $i)." mm</option>";
											}?>
											</select>
      	</div>
      	<div class="col-sm-2">
      		<span class="badge badge-secondary">D.N.P. Cerca</span>
                    						<select class="form-control" name="dnp_oi_cerca" required>
                    							<option value="">Seleccione uno</option>
											<?php for($i=20;$i<=50;$i+=0.5){
											
											   echo"<option value='".sprintf("%.2f", $i)."'>".sprintf("%.2f", $i)." mm</option>";
											}?>
										</select>
      	</div>
	</div>


<br><br><br>
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
      	<div class="col-sm-3">
      		<label class="control-label">Nombre del Lic. Optometrísta</label>
            <select class="form-control" name="optometrista" id="optometrista" required>
            	<option value="">Seleccione uno</option>
				<option value="Lic.Almendares">Lic.Almendares</option>
				<option value="Lic.Barrera">Lic.Barrera</option>
				<option value="Lic.Carmona">Lic.Carmona</option>
											
				</select>
      	</div>
	</div>	
	</div><br><br>

<div class="form-group col-xs-12" align="center" style="border: solid; border-color: grey; padding: 20px;">
	 <div  align="left">
	<strong><h4>Tipo de Anteojo</h4></strong>	
	</div><br><br>
	<div class="row">
		<div class="col-sm-3">
			<label class="control-label">Armazón</label>
			<input type="radio" name="tipo_anteojo" value="ARMAZÓN" class="option-input radio" 
			id="armazon_radio1">
		</div>
		<div class="col-sm-3">
			<label class="control-label">Lentes de Contacto</label>
			<input type="radio" name="tipo_anteojo" value="LENTES DE CONTACTO" class="option-input radio"
			id="armazon_radio2">
		</div>
		<div class="col-sm-3">
			<label class="control-label">Ambos</label>
			<input type="radio" name="tipo_anteojo" value="AMBOS" class="option-input radio"
			id="armazon_radio3">
		</div>
	</div><br><br>

	<div class="jumbotron col-xs-12" id="armazon" style="display: none;">
	 <div class="row">
	 	<div class="col-sm-3">
      		<label class="control-label">Tipo de Lente</label>
            <select class="form-control" name="tipo_lente" id="tipo_lente">
            	<option value="">Seleccione uno</option>
				<option value="Monofocal">Monofocal</option>
				<option value="Bifocal">Bifocal</option>
				<option value="Progresivo">Progresivo</option>
			</select>
      	</div>
      	<div class="col-sm-8" id="monofocal_div" style="display:none;">
      		<div class="col-sm-3">
      			<span class="badge badge-secondary">LEJOS</span>
				<input type="radio" class="option-input radio"  name="monofocal" value="LEJOS">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">CERCA</span>
				<input type="radio" class="option-input radio"  name="monofocal" value="CERCA">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">AMBAS</span>
				<input type="radio" class="option-input radio"  name="monofocal" value="AMBAS">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">SUB-CORRECCIÓN</span>
				<input type="radio" class="option-input radio"  name="monofocal" value="SUB-CORRECCIÓN">
			</div>
      	</div>
      	<div class="col-sm-8" id="bifocal_div" style="display: none;">
      		<div class="col-sm-2">
      			<span class="badge badge-secondary">FLAT-TOP</span>
				<input type="radio" class="option-input radio"  name="bifocal" value="FLAT-TOP">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">BLEND</span>
				<input type="radio" class="option-input radio"  name="bifocal" value="BLEND">
			</div>
		</div>
		<div class="col-sm-8" id="progresivo_div" style="display: none;">
      		<div class="col-sm-3">
      			<span class="badge badge-secondary">BÁSICO</span>
				<input type="radio" class="option-input radio"  name="progresivo" value="BÁSICO">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">KODAK</span>
				<input type="radio" class="option-input radio"  name="progresivo" value="KODAK">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">VARILUX</span>
				<input type="radio" class="option-input radio"  name="progresivo" value="VARILUX">
			</div>
			
      	</div>
	 </div><br><br>
	 <div class="row" id="monofocal_material_div" style="display: none;">
	 	<div class="col-sm-3">
      		<label class="control-label">Material</label>
            <select class="form-control" name="monofocal_material" id="monofocal_material">
            	<option value="">Seleccione uno</option>
				<option value="Básico">Básico</option>
				<option value="Premium">Premium</option>
			</select>
      	</div>
      	<div class="col-sm-8" id="monofocal_basico_div" style="display: none;">
      		<div class="col-sm-3">
      			<span class="badge badge-secondary">CR-39 W</span>
				<input type="radio" class="option-input radio"  name="monofocal_material_basico" value="CR-39 W">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">HIGH-INDEX W</span>
				<input type="radio" class="option-input radio"  name="monofocal_material_basico" value="HIGH-INDEX W">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">POLICARBONATO</span>
				<input type="radio" class="option-input radio"  name="monofocal_material_basico" value="POLICARBONATO">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">CRISTAL W</span>
				<input type="radio" class="option-input radio"  name="monofocal_material_basico" value="CRISTAL W">
			</div>
      	</div>
      	<div class="col-sm-8" id="monofocal_premium_div" style="display: none;">
      		<div class="col-sm-2">
      			<span class="badge badge-secondary">ORMA</span>
				<input type="radio" class="option-input radio"  name="monofocal_material_premium" value="ORMA">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">AIRWEAR</span>
				<input type="radio" class="option-input radio"  name="monofocal_material_premium" value="AIRWEAR">
			</div>
		</div>
	 </div><br>
	 <div class="row" id="monofocal_tratamiento_div" style="display:block;">
	 	<div class="col-sm-8" id="monofocal_tratamiento_si_div" style="display: block;">
      		<div class="col-sm-2">
      			<span class="badge badge-secondary">SI</span>
				<input type="radio" class="option-input radio"  name="monofocal_material_premium" value="ORMA">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">AIRWEAR</span>
				<input type="radio" class="option-input radio"  name="monofocal_material_premium" value="AIRWEAR">
			</div>
		</div>
      	<div class="col-sm-8" id="monofocal_basico_div" style="display: none;">
      		<div class="col-sm-3">
      			<span class="badge badge-secondary">CR-39 W</span>
				<input type="radio" class="option-input radio"  name="monofocal_material_basico" value="CR-39 W">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">HIGH-INDEX W</span>
				<input type="radio" class="option-input radio"  name="monofocal_material_basico" value="HIGH-INDEX W">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">POLICARBONATO</span>
				<input type="radio" class="option-input radio"  name="monofocal_material_basico" value="POLICARBONATO">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">CRISTAL W</span>
				<input type="radio" class="option-input radio"  name="monofocal_material_basico" value="CRISTAL W">
			</div>
      	</div>
      	<div class="col-sm-8" id="monofocal_premium_div" style="display: none;">
      		<div class="col-sm-2">
      			<span class="badge badge-secondary">ORMA</span>
				<input type="radio" class="option-input radio"  name="monofocal_material_premium" value="ORMA">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">AIRWEAR</span>
				<input type="radio" class="option-input radio"  name="monofocal_material_premium" value="AIRWEAR">
			</div>
		</div>
	 </div>
	 <br><br><br>
	  <div class="row">
	 	<div class="col-sm-2" align="left">
      		<label class="control-label">Material</label>
        </div>
        	<div class="col-sm-10">
      		<div class="col-sm-2">
      			<span class="badge badge-secondary">CR-39 W</span>
				<input type="radio" class="option-input radio"  name="material" value="CR-39 W">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">HIGH-INDEX W</span>
				<input type="radio" class="option-input radio"  name="material" value="HIGH-INDEX W">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">POLICARBONATO</span>
				<input type="radio" class="option-input radio"  name="material" value="POLICARBONATO">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">CRISTAL W</span>
				<input type="radio" class="option-input radio"  name="material" value="CRISTAL W">
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
				<input type="radio" class="option-input radio"  name="tratamiento" id="tratamiento1" value="SI">
			</div>
			<div class="col-sm-2">
				<span class="badge badge-secondary">NO</span>
				<input type="radio" class="option-input radio"  name="tratamiento" id="tratamiento2" value="NO">
			</div>
	      	</div>
	 </div>
	 <br><br>
	<div class="col-xs-12" id="tratamiento_div" style="border: solid; border-color: grey;background-color: white; padding: 10px; display: none; ">
	    <div class="row">
            <div class="col-sm-4">
            	<input type="hidden" name="antirreflejante" value="NO">
                <input type="checkbox" class="squaredTwo" name="antirreflejante" id="antirreflejante" data-on="SI" data-off="NO" value="SI">
                <label class="col-xs-6 label-text">Antirreflejante</label>
            </div>
            <div class="col-sm-4">
            	<input type="hidden" name="fotocromatico" value="NO">
                <input type="checkbox" class="squaredTwo" name="fotocromatico" id="fotocromatico" data-on="SI" data-off="NO" value="SI">
                <label class="col-xs-6 label-text">Fotocromático</label>
            </div>
            <div class="col-sm-4">
            	<input type="hidden" name="polarizado" value="NO">
                <input type="checkbox" class="squaredTwo" name="polarizado" id="polarizado" data-on="SI" data-off="NO" value="SI">
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
				<input type="radio" class="option-input radio"  name="anti_premium" value="CRIZAL EASY">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">CRIZAL ALIZE</span>
				<input type="radio" class="option-input radio"  name="anti_premium" value="CRIZAL ALIZE">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">CRIZAL FORTE</span>
				<input type="radio" class="option-input radio"  name="anti_premium" value="CRIZAL FORTE">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">CRIZAL PREVENCIA</span>
				<input type="radio" class="option-input radio"  name="anti_premium" value="CRIZAL PREVENCIA">
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
				<input type="radio" class="option-input radio"  name="foto_premium" value="TRANSITIONS GRIS">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">TRANSITIONS CAFÉ</span>
				<input type="radio" class="option-input radio"  name="foto_premium" value="TRANSITIONS CAFÉ">
			</div>
			<div class="col-sm-3">
				<span class="badge badge-secondary">TRANSITIONS VERDE</span>
				<input type="radio" class="option-input radio"  name="foto_premium" value="TRANSITIONS VERDE">
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
                    						<input type="checkbox" class="squaredTwo" name="opciones[0]" value="Enviar">
                    						<label class="col-xs-6 label-text">Enviar al Área de Ventas</label>
                    					</div>
                    					<div class="col-sm-3">
                    						<input type="checkbox" class="squaredTwo" name="opciones[1]" value="Imprimir">
                    						<label class="col-xs-6 label-text">Imprimir</label>
                    					</div>
                    					<div class="col-sm-3">
                    						<input type="checkbox" class="squaredTwo" name="opciones[2]" checked value="Guardar" required>
                    						<label class="col-xs-6 label-text"> Guardar</label>
                    					</div>
       <div class="col-sm-3">
          <button id="submit" type="submit" class="btn btn-primary">
				<strong>Agregar</strong>	
		</button>
           </form>
      </div><br>
	 </div><br><br>
    </div>
  </div>

 </div>
 
</div>

</div>
</div>
</div>

{{-- HISTORIAL OCULAR --}}

<script type="text/javascript">

$(document).ready(function(){


	
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
       	document.getElementById('monofocal_material_div').style.display = 'block';	
       
       }else if(option  == 'Bifocal'){
       		
       	document.getElementById('monofocal_div').style.display = 'none';
       	document.getElementById('bifocal_div').style.display = 'block';
       	document.getElementById('progresivo_div').style.display = 'none';
        document.getElementById('monofocal_material_div').style.display = 'none';
       }else if(option  == 'Progresivo'){
       	
       	document.getElementById('monofocal_div').style.display = 'none';
       	document.getElementById('bifocal_div').style.display = 'none';
       	document.getElementById('progresivo_div').style.display = 'block';
       	document.getElementById('monofocal_material_div').style.display = 'none';

       }else{
       	document.getElementById('monofocal_div').style.display = 'none';
       	document.getElementById('bifocal_div').style.display = 'none';
       	document.getElementById('progresivo_div').style.display = 'none';
       	document.getElementById('monofocal_material_div').style.display = 'none';
       }
    });

      $("#monofocal_material").change(function(){

      	var option=document.getElementById("monofocal_material").value;

      	if(option == 'Básico'){
       	
       	document.getElementById('monofocal_basico_div').style.display = 'block';
       	document.getElementById('monofocal_premium_div').style.display = 'none';
       	$("#monofocal_material_basico").prop('required')=true;
       	$("#monofocal_material_premium").prop('required')=false;
       
       }else if(option  == 'Premium'){

       	document.getElementById('monofocal_basico_div').style.display = 'none';
       	document.getElementById('monofocal_premium_div').style.display = 'block';
       	$("#monofocal_material_basico").prop('required')=false;
       	$("#monofocal_material_premium").prop('required')=true;

       }else{

       	document.getElementById('monofocal_basico_div').style.display = 'none';
       	document.getElementById('monofocal_premium_div').style.display = 'none';
       	$("#monofocal_material_basico").prop('required')=false;
       	$("#monofocal_material_premium").prop('required')=false;

       }

      });


    $("#armazon_radio1").change(function(){
      document.getElementById('armazon').style.display = 'block';
      document.getElementById('contacto').style.display = 'none';
      $("#tipo_lente").prop('required')=true;
     });

     $("#armazon_radio2").change(function(){
      document.getElementById('contacto').style.display = 'block';
      document.getElementById('armazon').style.display = 'none';
      $("#tipo_lente").prop('required')=false;
      
     });

    $("#armazon_radio3").change(function(){
      document.getElementById('armazon').style.display = 'block';
      document.getElementById('contacto').style.display = 'block';
      $("#tipo_lente").prop('required')=true;
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

	
$("input[name=usuario_lentes]").change(function(){

if($("#usuario_lentes1").prop('checked')==true){


	$("#edad_lentes").show();
	$("#edad_lentes_select").prop('required')=true;

}
else if($("#usuario_lentes3").prop('checked')==true){
	$("#edad_lentes").show();
	$("#edad_lentes_select").prop('required')=true;
}
else{
	$("#edad_lentes").hide();
	$("#edad_lentes_select").prop('required')=false;
}

});




$(":text").keyup(function(){
	var lowe=$(this).val();
	$(this).val(lowe.toUpperCase());
   });	



$("#cil_od").change(function(){
	
	var option=document.getElementById("cil_od").value;
	if(option!='Sin Valor'){
		document.getElementById('eje_od_div').style.display = 'block';
		$("#eje_od").prop('required')=true;
	}else{
		document.getElementById('eje_od_div').style.display = 'none';
		$("#eje_od").prop('required')=false;
	}

      });

$("#cil_oi").change(function(){
	
	var option=document.getElementById("cil_oi").value;
	if(option!='Sin Valor'){
		document.getElementById('eje_oi_div').style.display = 'block';
		$("#eje_oi").prop('required')=true;
	}else{
		document.getElementById('eje_oi_div').style.display = 'none';
		$("#eje_oi").prop('required')=false;
	}

      });


//****************************************************************************
});
	
</script>

@endsection