@extends('layouts.test')
@section('content1')

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
      
<div class="container">
	<div role="application" class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-3">
						<h4>Datos del Paciente:</h4>
					</div>
					<div class="col-sm-3">
						<a class="btn btn-info" href="{{ route('pacientes.create') }}"><strong>Nuevo Paciente</strong></a>
					</div>
					<div class="col-sm-3">
						<a class="btn btn-warning" href="{{ route('pacientes.edit',['id'=>$paciente->id]) }}"><strong>Editar Paciente</strong></a>
					</div>
					<div class="col-sm-3">
						<a class="btn btn-primary" href="{{ route('pacientes.index') }}"><strong>Lista de Pacientes</strong></a>
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

		{{-- PESTAÑAS --}}
				
						<ul class="nav nav-pills nav-justified" >

							<li  role="presentation" class="active"><a data-toggle="tab" href="#generales" >Generales:</a></li>

							<li role="presentation"><a data-toggle="tab" href="#hmedico">Historial Médico:</a></li> 

							<li role="presentation"><a data-toggle="tab" href="#ocular">Historial Ocular:</a></li>
							<li role="presentation"><a data-toggle="tab" href="#anteojos">Anteojos:</a></li>
							<li role="presentation"><a data-toggle="tab" href="#ortopedico" class="ui-tabs-anchor">Ortopdico:(En desarrollo)</a></li>
							<li role="presentation"><a data-toggle="tab" href="#cita" class="ui-tabs-anchor">Citas:</a></li>
							<li role="presentation"><a data-toggle="tab" href="#crm" class="ui-tabs-anchor">C.R.M:</a></li> 
						</ul>
		{{-- PESTAÑAS --}}


			{{-- TAB-CONTENT --}}
                   <div class="tab-content">
		{{-- DATOS GENERALES --}}
					 <div  class="tab-pane fade in active" id="generales">
					   <div class="panel-default">
						  <div class="panel-heading"><h5><strong>Datos Generales:</strong></h5></div>
						  @if($paciente->generales==null)
						    <div class="panel-body">
						      <div class="row">
						      	<div class="col-sm-9">
						      		<h2><strong>Aun no se han agregado los Datos Generales:</strong></h2>
						      	</div>
						      	<div class="col-sm-3">
						      		<br>
						      		<a  class="btn btn-primary" href="{{ route('pacientes.datosgenerales.create',['paciente'=>$paciente]) }}">
									<strong>Agregar</strong>	</a>
						      	</div>
						      </div><br>
						    </div>
						  @else
							<div class="panel-body">
							  <div class="row">
							  	<div class="col-sm-3">
							  	  <label class="control-label">Ocupación:</label>
							  	  <dd>{{$paciente->generales->ocupacion}}</dd>	
							  	</div>
							  		<div class="col-sm-3">
							  	  <label class="control-label">Convenio:</label>
							  	  <dd>{{$paciente->generales->convenio}}</dd>	
							  	</div>
							  	<div class="col-sm-3">
							  		<a id="modificar" class="btn btn-primary" 
							  		href="{{ route('pacientes.datosgenerales.edit',['paciente'=>$paciente,'datosgenerale'=>$paciente->generales]) }}">
									<strong>Modificar</strong></a>
							  	</div>
							  </div>		
							</div>

						  <div class="panel-heading"><h5><strong>Dirección:</strong></h5></div>
							<div class="panel-body">
							  <div class="row">
							  	<div class="col-sm-3">
							  	 <label class="control-label">Calle:</label>
							  	 <dd>{{$paciente->generales->calle}}</dd>	
							  	</div>
							  	<div class="col-sm-3">
							  	 <label class="control-label">Número Interior:</label>
							  	 <dd>{{$paciente->generales->numint}}</dd>	
							  	</div>
							  	<div class="col-sm-3">
							  	 <label class="control-label">Número Exterior:</label>
							  	 <dd>{{$paciente->generales->numext}}</dd>	
							  	</div>
							  	<div class="col-sm-3">
							  	 <label class="control-label">Codigo Postal:</label>
							  	 <dd>{{$paciente->generales->cp}}</dd>	
							  	</div>
							  </div><br>
							  <div class="row">
							  	<div class="col-sm-3">
							  	 <label class="control-label">Delegación/Municipio:</label>
							  	 <dd>{{$paciente->generales->municipio}}</dd>	
							  	</div>
							  	<div class="col-sm-3">
							  	 <label class="control-label">Estado:</label>
							  	 <dd>{{$paciente->generales->estado}}</dd>	
							  	</div>
							  </div>	
							</div>

								<div class="panel-heading"><h5><strong>Contacto:</strong></h5></div>
								<div class="panel-body">
							  <div class="row">
							  	<div class="col-sm-3">
							  	 <label class="control-label">Teléfono de Casa:</label>
							  	 <dd>{{$paciente->generales->telcasa}}</dd>	
							  	</div>
							  	<div class="col-sm-3">
							  	 <label class="control-label">Teléfono de Oficina:</label>
							  	 <dd>{{$paciente->generales->teloficina}}</dd>	
							  	</div>
							  	<div class="col-sm-3">
							  	 <label class="control-label">Teléfono Celular:</label>
							  	 <dd>{{$paciente->generales->telcelular}}</dd>	
							  	</div>
							  	<div class="col-sm-3">
							  	 <label class="control-label">E-Mail:</label>
							  	 <dd>{{$paciente->generales->email}}</dd>	
							  	</div>
							  </div><br>
							</div>

								<div class="panel-heading"><h5><strong>Tutores:</strong></h5></div>
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
										<tbody>
										@foreach($paciente->tutores as $tutor)
										<tr class="active">
										<td>{{$tutor->nombre}}</td>
										<td>{{$tutor->appaterno}}</td>
										<td>{{$tutor->apmaterno}}</td>
										<td>{{$tutor->relacion}}</td>
										<td>{{$tutor->tel_casa}}</td>
										<td>{{$tutor->tel_cel}}</td>
										<td><div class="row">
											<div class="col-sm-3">
												<button class="btn btn-warning" data-toggle="modal" 
												data-target="#tutor_{{$tutor->id}}"><strong>Editar</strong></button>
											</div>
											<div class="col-sm-3">
												<button class="btn btn-danger"><strong>Eliminar</strong></button>
											</div>
										</div></td>
										</tr>
										@endforeach
										</tbody>
										
										
											
									</table>
								</div>
								@endif
							</div>
						</div>
						
						
				{{-- DATOS GENERALES --}}

				{{-- HISTORIAL MEDICO --}}
						
						 <div class="tab-pane fade" id="hmedico">
						 	<div class="panel-default">
						 		<div class="panel-heading"><h4><strong>Historial Médico:</strong> </h4></div>
						 		 @if($paciente->medico->count() ==0)
						    <div class="panel-body">
						      <div class="row">
						      	<div class="col-sm-9">
						      		<h2><strong>Aun no se ha agregado Historial Médico:</strong></h2>
						      	</div>
						      	<div class="col-sm-3">
						      		<br>
						      		<a  class="btn btn-primary" href="{{ route('pacientes.historialmedico.create',['paciente'=>$paciente]) }}">
									<strong>Agregar</strong>	</a>
						      	</div>
						      </div><br>
						    </div>
						  @else
						  {{-- TABLA HISTORIAL MÉDICO --}}
						<div class="panel-body">

							<div class="col-sm-12 offset-md-12" align="center">

						      		<br>
						      		<a  class="btn btn-primary" href="{{ route('pacientes.historialmedico.create',['paciente'=>$paciente]) }}">
									<strong>Agregar</strong>	</a>
						      	</div>
							<br>

							<br><br>

							<br>
						  <table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
										<thead>
											<tr class="info">

												<th>Fecha de la Cita</th>
												<th>Alergias</th>
												<th>Enfermedades Crónicas</th>
												<th>Tratamiento</th>
												@if($paciente->sexo=='Femenino')
												<th>Embarazo</th>
												@endif
											</tr>
										</thead>
										<tbody>
											@foreach($paciente->medico as $medico)
											<tr class="active"
											    title="Has Click Aquì para Ver"
												style="cursor: pointer"
												data-toggle="modal" 
												data-target="#medico_modal{{$medico->id}}">
												<td>{{$medico->created_at}}</td>
												<td>{{$medico->alergia}}</td>
												<td>{{$medico->enfermedad}}</td>
												<td>{{$medico->tratamiento}}</td>
												@if($paciente->sexo=='Femenino')
												<td>{{$medico->embarazo}}</td>
												@endif
											</tr>
											@endforeach
										</tbody>
							</table>

						</div>
						{{-- TABLA HISTORIAL MÉDICO --}}
					

						 		

									@endif
						 		</div>
						 	</div>
						 
					{{-- HISTORIAL MEDICO --}}

					{{--  HISTORIAL OCULAR --}}
					<div class="tab-pane fade" id="ocular">
					 <div class="panel-default">
					 	<div class="panel-heading"><h4><strong>Historial Ocular:</strong></h4></div>
					 	 @if($paciente->ocular->count() ==0)
						    <div class="panel-body">
						      <div class="row">
						      	<div class="col-sm-9">
						      		<h2><strong>Aun no se ha agregado Historial Ocular:</strong></h2>
						      	</div>
						      	<div class="col-sm-3">
						      		<br>
						      		<a  class="btn btn-primary" href="{{ route('pacientes.historialocular.create',['paciente'=>$paciente]) }}">
									<strong>Agregar</strong>	</a>
						      	</div>
						      </div><br>
						    </div>
						  @else
						   {{-- TABLA HISTORIAL OCULAR --}}
						<div class="panel-body">

							<div class="col-sm-12 offset-md-12" align="center">

						      		<br>
						      		<a  class="btn btn-primary" href="{{ route('pacientes.historialocular.create',['paciente'=>$paciente]) }}">
									<strong>Agregar</strong>	</a>
						      	</div>
							<br><br><br><br>
	<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;font-size: 11px;">
		<thead>
		<tr class="info">
			<th>Información General</th>
			<th>Problemas Visuales y <br>Antecedentes Oculares<br> Familiares</th>
			<th>Revisión Visual</th>
			<th>Anexos/Biomicroscopía e<br>Archivo de Imagen</th>
			<th>Graduación</th>
			<th>Opciones</th>
			
		</thead>
		<tbody>
			@foreach($paciente->ocular as $ocular)
			<tr class="active">
				<td title="Has Click Aquì para Ver" class="oc" data-toggle="modal" data-target="#ocular_modal{{$ocular->id}}1"><strong>{{$ocular->created_at}}</strong><br>&nbsp;&nbsp;Click para Ver</td>
				<td title="Has Click Aquì para Ver" class="oc" data-toggle="modal" data-target="#ocular_modal{{$ocular->id}}2">&nbsp;&nbsp;Click para Ver</td>
				<td title="Has Click Aquì para Ver" class="oc" data-toggle="modal" data-target="#ocular_modal{{$ocular->id}}3">&nbsp;&nbsp;Click para Ver</td>
				<td title="Has Click Aquì para Ver" class="oc" data-toggle="modal" data-target="#ocular_modal{{$ocular->id}}4">&nbsp;&nbsp;Click para Ver</td>
				<td title="Has Click Aquì para Ver" class="oc" data-toggle="modal" data-target="#ocular_modal{{$ocular->id}}5">&nbsp;&nbsp;Click para Ver</td>
				<td ><button class="btn btn-warning" data-toggle="modal" data-target="#ocular_modal{{$ocular->id}}6">Imprimir</button></td>
				
											@endforeach
		</tbody>
	</table>

						</div>
						{{-- TABLA HISTORIAL OCULAR --}}
						  @endif
					 </div>	
					</div>
					{{--  HISTORIAL OCULAR --}}

					{{--  ANTEOJOS --}}
					<div class="tab-pane fade" id="anteojos">
					 <div class="panel-default">
					 	<div class="panel-heading"><h4><strong>Anteojos:</strong></h4></div>
					 	@if($paciente->anteojo->count()==0)
						    <div class="panel-body">
						      <div class="row">
						      	<div class="col-sm-9">
						      		<h2><strong>Aun no se ha agregado Historial de Anteojos:</strong></h2>
						      	</div>
						      	<div class="col-sm-3">
						      		<br>
<a class="btn btn-primary" href="{{ route('pacientes.anteojos.create',['paciente'=>$paciente]) }}">
									<strong>Agregar</strong>	</a>
						      	</div>
						      </div><br>
						    </div>
						 @else
						 <div class="panel-body">
						      <div class="col-sm-12 offset-md-12" align="center">
						      	<br>
						      		<a  class="btn btn-primary" href="{{ route('pacientes.anteojos.create',['paciente'=>$paciente]) }}">
									<strong>Agregar</strong>	</a>
						      	</div>
							<br><br><br><br>
		<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;font-size: 16px;">
		<thead>
		<tr class="info">
			<th>Fecha de Registro</th>
			<th>Tipo de Anteojos</th>
			<th>Tipo de Lente</th>
			<th>Caracteristicas</th>
			<th>Operaciones de Registro</th>
			
		</tr>
		</thead>
		<tbody>
			@foreach($paciente->anteojo as $anteojo)
			<tr class="oc" data-toggle="modal" data-target="#anteojo_modal{{$anteojo->id}}">
				<td>{{$anteojo->created_at}}</td>
				<td>{{$anteojo->tipo_anteojo}}</td>
				<td>{{$anteojo->tipo_lente}}</td>
				@switch($anteojo->tipo_lente)
    @case('MONOFOCAL')
        <td>{{$anteojo->monofocal}}</td>
        @break

    @case('BIFOCAL')
        <td>{{$anteojo->bifocal}}</td>
        @break

    @case('PROGRESIVO')
        <td>{{$anteojo->progresivo}}</td>
        @break

    @default
        <td>Contacto</td>
@endswitch
				<td>{{$anteojo->opciones}}</td>
			</tr>
			@endforeach
		</tbody>
</table>
						    </div>
						 @endif
						  
						  
					 </div>	
					</div>
					{{-- ANTEOJOS --}}


					{{--ORTOPÉDICO--}}

<div class="tab-pane" id="ortopedico">
	<div class="row">
		<div class="col-sm-5">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="fecha" class="col-sm-4 control-label">Fecha Actual</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" readonly="" id="fecha" value="{{ date('Y-m-d') }}">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="col-sm-10">
						<div class="form-group">
							<table class="table table-striped table-bordered table-hover" style="margin-top: 20px;">
								<tr class="info">
									<th>Fecha</th>
									<th>Cita</th>
									<th>Nombre</th>
								</tr>
								<tr>
									<td>fecha1</td>
									<td>cita1</td>
									<td id="citaradio">nombre1</td>
								</tr>
								<tr>
									<td>fecha1</td>
									<td>cita1</td>
									<td id="citaradio">nombre1</td>
								</tr>
							</table>
						</div>
					</div>
				</div>								
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="vienecita" class="col-sm-4 control-label">Viene a cita:</label>
						<div class="col-sm-10">
							<div class="radio">
								<div class="col-sm-3">
									<label>
										<input class="radiocita" type="radio" name="citaradio" id="optionsRadios1" onchange="cocultar(this)" value="si">
										Sí
								</div>
								<div class="col-sm-3">
									<label>
										<input class="radiocita" type="radio" name="citaradio" id="optionsRadios2" onchange="cocultar(this)" value="no">
										No
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="si-cita">
			<div class="col-sm-7">
				<div class="row">
					<div class="row">
						<div class="col-sm-12">
							<div class="col-sm-8">
								<div class="form-group">
									<div class="col-sm-10 text-center">
										<div class="thumbnail" style="display: inline; float: none; margin-top: 10px; margin-bottom: 0px;">
											<img id="imagenpie" src="https://upmaa-pennmuseum.netdna-ssl.com/collections/images/image_not_available_300.jpg" alt="Previa..." style="width: 100%; height: auto;">
									      	<div class="caption">
												<label for="pie" class="col-sm control-label" style="margin-top: 10px;">Subir foto del pie</label>
									        	<p><input type="file" class="imagen" id="pie" onchange="previewFile2(this)" style="display: none;">
												<input type="button" value="Examinar" class="btn btn-primary" onclick="document.getElementById('pie').click();" />
												<input type="file" class="imagen" id="pie" onchange="previewFile2(this)" style="display: none;">
												<input type="button" value="Subir" class="btn btn-success" onclick="document.getElementById('pie').click();" /></p>
									      </div>
									    </div>
									</div>
								</div>
							</div>
						</div>
					</div>
						
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="col-sm-12">
						<div class="form-group">
							<div class="col-sm-4">
								<label for="diag" class="col-sm control-label" style="margin-top: 10px;">Diagnóstico:</label>
								<textarea class="form-control" maxlength="1000" rows="4"></textarea>
							</div>
							<div class="col-sm-4">
								<label for="reco" class="col-sm control-label" style="margin-top: 10px;">Recomendación:</label>
								<textarea class="form-control" maxlength="1000" rows="4"></textarea>
							</div>
							<div class="col-sm-4">
								<label for="trat" class="col-sm control-label" style="margin-top: 10px;">Tipo de tratamiento:</label>
								<textarea class="form-control" maxlength="1000" rows="4"></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-7">
			<div class="row">
				<div id="no-cita">
					<div class="row">
						<div class="col-sm-12">
							<div class="col-sm-5">
								<div class="form-group">
									<label for="donde" class="col-sm-4 control-label" style="margin-top: 10px;">¿De dónde viene?</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="donde">
									</div>
								</div>
							</div>
						</div>
					</div>
		<!--
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group row">
								<label for="receta" class="col-sm-2 control-label">Subir receta</label>
								<div class="col-sm-10">
									<input type="file" class="imagen" id="receta" onchange="previewFile(this)">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<img id="imagenpre" src="https://upmaa-pennmuseum.netdna-ssl.com/collections/images/image_not_available_300.jpg" alt="Previa...">
						</div>
					</div>
		-->
					<div class="row">
						<div class="col-sm-12">
							<div class="col-sm-5">
								<div class="form-group">
									<div class="col-sm-10">
										<div class="thumbnail" style="margin-top: 10px; margin-bottom: 0px;">
											<img id="imagenpre" src="https://upmaa-pennmuseum.netdna-ssl.com/collections/images/image_not_available_300.jpg" alt="Previa..." style="width: 100%; height: auto;">
									      	<div class="caption">
												<label for="pie" class="col-sm control-label" style="margin-top: 10px;">Subir receta</label>
									        	<p><input type="file" class="imagen" id="receta" onchange="previewFile(this)" style="display: none;">
												<input type="button" value="Examinar" class="btn btn-primary" onclick="document.getElementById('receta').click();" />
												<input type="file" class="imagen" id="pie" onchange="previewFile(this)" style="display: none;">
												<input type="button" value="Subir" class="btn btn-success" onclick="document.getElementById('receta').click();" /></p>
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

	

			

			
			


		
				

		<div class="row">
			<div class="col-sm-12">
				<h3>Tipo de tratamiento</h3>
			</div>

			<div class="col-sm-12">
				<h4>Calzado</h4>
			</div>
			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-12">
						<div class="radio">
							<label>
								<input type="radio" name="calzado" id="calzado1" value="zapato">
									Zapato
							</label>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="radio">
							<label>
								<input type="radio" name="calzado" id="calzado2" value="tenis">
									Tenis
							</label>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="radio">
							<label>
								<input type="radio" name="calzado" id="calzado3" value="ambos">
									Ambos
							</label>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
			<div class="row">
				<div class="col-sm-offset-4 col-sm-4">
					<h4>Tipo</h4>
				</div>
				<div class="col-sm-offset-4 col-sm-4">
					<input type="text" class="form-control">
				</div>
				<div class="col-sm-offset-4 col-sm-4">
					<input type="text" class="form-control">
				</div>
			</div>
			</div>

			<div class="col-sm-12">
				<h4>Plantilla</h4>
			</div>
			<div class="col-sm-6">
			<div class="row">
					<div class="col-sm-12">
						<div class="radio">
							<label>
								<input type="radio" name="plantilla" id="planilla1" value="piel">
									Piel
							</label>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="radio">
							<label>
								<input type="radio" name="plantilla" id="plantilla2" value="pelite">
									Pelite
							</label>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="radio">
							<label>
								<input type="radio" name="plantilla" id="plantilla3" value="otro">
									otro
							</label>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6">c</div>

			<div class="col-sm-offset-4 col-sm-4">
				<button class="btn btn-primary btn-lg btn-block">Guardar</button>
			</div>
		</div>
		

</div>




{{--ORTOPÉDICO--}}
 {{-- CITAS --}}

<div class="tab-pane" id="cita">
	<div class="panel-default"  >
		<div class="panel-heading" >
			<div class="row">
				<div class="col-sm-1">
					<h5>Citas</h5>
				</div>
				<div class="col-sm-3">
					<i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos
				</div>
			</div>
			   
		</div>
			<div class="panel-body" >
				
										{{ csrf_field() }} 
					<input type="hidden" name="paciente_id" value="{{$paciente->id}}" 
					id="paciente_id">
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="proxima_cita"><i class="fa fa-asterisk" aria-hidden="true"></i>Fecha Pròxima Cita:</label>
						<input type="date" class="form-control" id="proxima_cita" name="proxima_cita"  required min="{{date('Y-m-d')}}" max="2030-12-31">
					</div>

					<div class="col-sm-3">
						<label class="control-label" for="hora"><i class="fa fa-asterisk" aria-hidden="true"></i>Hora:</label>
						<select class="form-control" type="select" name="hora" id="hora" required>
							<option value="">Seleccione una Hora</option>
							<?php for($i=0;$i<24;$i++){
								if($i<=11){

									echo"<option id='' value='".$i.":00 am'>".$i.":00 am </option>";

													}else{
									echo"<option id='' value='".$i.":00 pm'>".$i.":00 pm </option>";
													}}?>
						</select>
					</div>
					<div class="col-sm-3">
						<label class="control-label" for="minutos"><i class="fa fa-asterisk" aria-hidden="true"></i>Minutos:</label>
						<select class="form-control" type="select" name="minutos" id="minutos" required>
							<option value="">Seleccione el Minuto</option>
							<?php
								for($i=0;$i<60;$i+=15){
							echo"<option id='' value='".$i." mins'>".$i." mins </option>";
											}?>
						</select>
					</div>


			<div class="col-sm-3">
				<label class="control-label" for="sucursal_clave"><i class="fa fa-asterisk" aria-hidden="true"></i>Sucursal:</label>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon3" onclick="getSucursal()"><i class="fa fa-refresh" aria-hidden="true"></i></span>
				<select type="select" name="sucursal_clave" class="form-control" 
				id="sucursal" required>
							<option id="sin_definir" value="sin_definir">Sin Definir</option>
						@foreach ($sucursales as $sucursal)
							<option  value="{{$sucursal->claveid}}">{{$sucursal->nombre}}</option>
						@endforeach
				</select>
				</div>
  				
				 </div>
			</div><br>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group ">
						<label class="control-label" for="comentarios">Comentarios/Observaciones: </label>
						<textarea class="form-control" rows="5" id="comentarios" name="comentarios" maxlength="500"></textarea>
					</div> 
				</div>
				<div class="col-sm-3 col-sm-offset-2"><button  type="submit" class="btn btn-primary" onclick="cita()">
					<strong>Agregar</strong></button>
				</div>
			</div>
		  
		</div>
				<div class="panel-body" id="todas">
					<div class="row">
						<div class="col-sm-6" >
							<label class="control-label"><strong>Todas las Citas</strong></label>
							<div style="height: 450px;overflow: scroll;">
							<table class="table table-striped table-bordered table-hover" 
										       style="color:rgb(51,51,51); 
										              border-collapse: collapse;
										              margin-bottom: 0px;
										              overflow: scroll;">
											<thead>
												<tr class="info">
													<th>Fecha Próxima Cita</th>
													<th>Hora</th>
													<th>Paciente</th>
													<th>Sucursal</th>
												</tr>
											</thead>
											<tbody >
											@foreach($citas as $cita)
												<tr>
													<td>{{$cita->proxima_cita}}</td>
													<td>{{$cita->hora}}:{{$cita->minutos}}</td>
													<td>{{$cita->paciente->nombre}}&nbsp;&nbsp;
														{{$cita->paciente->appaterno}}&nbsp;&nbsp;
														{{$cita->paciente->apmaterno}}
													</td>
													<td>{{$cita->sucursal_clave}}</td>
													
													
												</tr>
											@endforeach
											</tbody>
										</table>
										</div>

						</div>
						<div class="col-sm-6">
							<label class="control-label"><strong>Citas del Paciente: {{$paciente->nombre}}&nbsp;&nbsp;{{$paciente->appaterno}}</strong></label>
							<div style="height: 450px;overflow: scroll;">
							<table class="table table-striped table-bordered table-hover" 
								   style="color:rgb(51,51,51); 
										  border-collapse: collapse;
										   margin-bottom: 0px;
										   overflow: scroll;"
									id="c_paciente">
											<thead>
												<tr class="info">
													<th>Fecha Próxima Cita</th>
													<th>Hora</th>
													<th>Sucursal</th>
													
													
												</tr>
											</thead>
											<tbody >
											@foreach($paciente->citas as $cita)
												<tr>
													<td>{{$cita->proxima_cita}}</td>
													<td>{{$cita->hora}}</td>
													<td>{{$cita->sucursal_clave}}</td>
												</tr>
											@endforeach
											</tbody>
										</table>
										</div>

						</div>
					</div>

							  </div>
							</div>
</div>

						{{-- CITAS --}}

	{{-- CRM --}}
    <div class="tab-pane" id="crm">
    	<div class="panel-default">
			<div class="panel-heading">C.R.M.&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</div>
			<div class="panel-body">
				<div class="panel-body">
					<form role="form" method="POST" action="{{ route('pacientes.crm.store',['paciente'=>$paciente]) }}">
						{{ csrf_field() }}
						<input type="hidden" name="paciente_id" value="{{ $paciente->id }}" id="paciente_id_crm">

						<div class="col-xs-4 col-xs-offset-10">
							<a class="btn btn-warning" id="limpiar" onclick="limpiar()"><strong>Limpiar</strong> </a>
							<button  type="submit" class="btn btn-success" 
							onclick='crm()'>
						<strong>Guardar</strong>	</button>
							<a id="modificar" class="btn btn-primary" onclick="modificar()" style="display: none;">
						<strong>Modificar</strong>	</a>
							

						</div>
					<div class="col-md-12 offset-md-2 mt-3">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="fecha_act">Fecha Actual:</label>
							<input type="date" class="form-control" id="fecha_act" name="fecha_act" value="{{ date('Y-m-d') }}" readonly>
						</div>
						
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="fecha_aviso"><i class="fa fa-asterisk" aria-hidden="true"></i> Fecha Aviso:</label>
							<input type="date" class="form-control" id="fecha_aviso" name="fecha_aviso" required="required" required min="{{date('Y-m-d')}}" max="2030-12-31">
						</div>
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="fecha_cont"><i class="fa fa-asterisk" aria-hidden="true"></i> Fecha siguiente contacto:</label>
							<input type="date" class="form-control" id="fecha_cont" name="fecha_cont" required="required" required min="{{date('Y-m-d')}}" max="2030-12-31">
						</div>
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="hora"><i class="fa fa-asterisk" aria-hidden="true"></i>Hora:</label>
							<input type="text" class="form-control" id="hora_crm" name="hora"  value="">
						</div>
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="tipo_cont"><i class="fa fa-asterisk" aria-hidden="true"></i>Forma de contacto:</label>
							<select class="form-control" type="select" name="tipo_cont" id="tipo_cont" >  <option value="">Seleccione una Opción</option>
								<option id="Mail" value="Mail">Email/Correo Electronico</option>
								<option  value="Telefono">Telefono</option>
								<option  value="Cita">Cita</option>
								<option  value="Whatsapp">Whatsapp</option>
								<option  value="Otro">Otro</option>
							</select>
						</div>
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="status"><i class="fa fa-asterisk" aria-hidden="true"></i>Estado:</label>
							<select class="form-control" type="select" name="status" id="status" >
								<option value="">Seleccione una Opción</option>
								<option id="Pendiente" value="Pendiente">Pendiente</option>
								<option id="Cotizando" value="Cotizando">En Cotización</option>
								<option id="Cancelado" value="Cancelado">Cancelado</option>
								<option id="Toma_decision" value="Toma_decision">Tomando decisión</option>
								<option id="Espera" value="Espera">En espera</option>
								<option id="Revisa_doc" value="Revisa_doc">Revisando documento</option>
								<option id="Proceso_aceptar" value="Proceso_aceptar">Proceso de Aceptación</option>
								<option id="Entrega" value="Entrega">Para entrega</option>
								<option id="Otro" value="Otro">Otro</option>
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
							<textarea class="form-control" rows="5" id="comentarios_crm" name="comentarios" maxlength="500"></textarea>
						</div>

						<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="observaciones">Observaciones: </label>
							<textarea class="form-control" rows="5" id="observaciones" name="observaciones" maxlength="500"></textarea>
						</div>
						
					</div>
						
					</form>
				</div>

				<div class="panel-body" id="crm_body">
					@if ($paciente->crms->count() ==0)
						<p>Aun no tienes C.R.M.'s</p>
					@endif
					
					@if ($paciente->crms->count() !=0)
						<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse;margin-bottom: 0px">
							<thead>
								<tr class="info">
									<th>Fecha contacto</th>
									<th>Fecha aviso</th>
									<th>Hora</th>
									<th>Estado</th>
									<th>Forma de contacto</th>
									<th>Acuerdos</th>
									<th>Observaciones</th>
									
								</tr>
							</thead>

							@foreach($paciente->crms as $crm)
								
								<tr onclick="crm({{$crm}})" 
								title="Has Click Aquì para ver o modificar"
								style="cursor: pointer">
									<td>{{$crm->fecha_cont}}</td>
									<td>{{$crm->fecha_aviso}}</td>
									<td>{{$crm->hora}}</td>
									<td>{{$crm->tipo_cont}}</td>
									<td>{{$crm->status}}</td>
									<td>{{substr($crm->acuerdos,0,50)}}...</td>
									<td>{{substr($crm->observaciones,0,50)}}...</td>
									
								</tr>
							@endforeach
						</table>
					@endif	
				</div>
			</div>
		</div>
    </div>
	{{-- CRM --}}


				</div>
					{{-- TAB-CONTENT --}}
	</div>
</div>


                     {{-- Modal Tutores --}} 
                     <form role="form" method="POST" action="{{ route('pacientes.tutor.store',['paciente'=>$paciente]) }}">
				{{ csrf_field() }}
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

			<input type="hidden" name="paciente_id" value="{{$paciente->id}}">
								        		<div class="form-group col-xs-4">
													<label class="control-label">Nombre:</label>
													<input class="form-control" type="text" name="nombre">
												</div>
												<div class="form-group col-xs-4">
													<label class="control-label">Apellido Paterno:</label>
													<input class="form-control" type="text" name="appaterno">
												</div>
												<div class="form-group col-xs-4">
													<label class="control-label">Apellido Materno:</label>
													<input class="form-control" type="text" name="apmaterno">
												</div>
												<div class="form-group col-xs-4">
													<label class="control-label">Edad:(Automático)</label>
													<input class="form-control" type="text" name="edad" id="edad" readonly>
												</div>
												<div class="form-group col-xs-4">
													<label class="control-label">Fecha de nacimiento:</label>
													<input class="form-control" type="date" name="fecha_nacimiento" id="fecha_nacimiento">
												</div>
												<div class="form-group col-xs-4">
													<label class="control-label">Sexo:</label>
													<select class="form-control" name="sexo">
														<option value="Masculino">Masculino</option>
														<option value="Femenino">Femenino</option>
														<option value="Otro">Otro</option>
													</select>
												</div>
												<div class="form-group col-xs-4">
													<label class="control-label">Relación con el paciente:</label>
													<select class="form-control" name="relacion" id="relacion">
														<option value="Padre">Padre</option>
														<option value="Madre">Madre</option>
														<option value="Tio/Tia">Tio/Tia</option>
														<option value="Abuelo/Abuela">Abuelo/Abuela</option>
														<option value="Hermano/Hermana">Hermano/Hermana</option>
														<option value="Primos">Primos</option>
														<option value="Otros">Otros</option>
													</select>
												</div>
												<div class="form-group col-xs-4">
													<label class="control-label">Teléfono de Casa:</label>
													<input class="form-control" type="text" name="tel_casa">
												</div>
												<div class="form-group col-xs-4">
													<label class="control-label">Teléfono Celular:</label>
													<input class="form-control" type="text" name="tel_cel">
												</div>
											
								        	</div>
								        </div>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-danger" data-dismiss="modal"><strong>Cerrar</strong></button>
								        <button type="submit" class="btn btn-primary"><strong>Agregar</strong></button>
								      </div>
								    </div>
								  </div>
								</div></form>
								{{-- Modal Tutores--}} 


						 
						 	@foreach($paciente->medico as $medico)
								{{-- Modal Historial Médico--}} 
								<div class="modal fade"  id="medico_modal{{$medico->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="position: 0,0 !important; right: -200px;">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header jumbotron">
								        <h5 class="modal-title" id="exampleModalLongTitle"><strong>Datos Médicos</strong>&nbsp;&nbsp;&nbsp;&nbsp;{{$medico->created_at}} </h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
								        </button>
								      </div>
								      <div class="modal-body">
								        <div class="panel-default">
								          <div class="panel-body">
								        	<div class="row">
								        	 
								        	  	@if($medico->alergia=='SI')
								        	  <div class="col-sm-3">
								        	  	<label class="control-label" for="apmaterno">Alergia:</label>
												<dd>{{$medico->cual_alergia}}</dd>
								        	  </div>
								        	  	@endif
								        	  	@if($medico->tratamiento_alergia!=null)
								        	  <div class="col-sm-3">
								        	  	<label class="control-label" for="apmaterno">Tratamiento a Alergia:</label>
												<dd>{{$medico->tratamiento_alergia}}</dd>
								        	  </div>
								        	  	@endif
								        	  		@if($paciente->sexo=='Femenino' && $medico->embarazo=='SI')
								        	  <div class="col-sm-3">
								        	  	<label class="control-label" for="apmaterno">Embarazo/Tiempo:</label>
												<dd>{{$medico->tiempo_embarazo}}</dd>
								        	  </div>
								        	  	@endif
								        	</div><br>
								        	<div class="row">
								        		@if($medico->enfermedad=='SI')
								        	  <div class="col-sm-6">
								        	  	<label class="control-label" for="apmaterno">Enfermedades Crónicas:</label>
												<dd>{{$medico->enfermedades_array}},{{$medico->enfermedad_cronica}}</dd>
								        	  </div>
								        	  	@endif
								        	  	@if($medico->tratamiento=='SI')
								        	  <div class="col-sm-4">
								        	  	<label class="control-label" for="apmaterno">Tratamiento Enfermedad Crónica:</label>
												<dd>{{$medico->tratamiento_actual}}</dd>
								        	  </div>
								        	  	@endif
								        	  
								        	</div>
										  </div>
								        </div>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal"><strong>Cerrar</strong></button>
								        <button type="button" class="btn btn-primary"><strong>Agregar</strong></button>
								      </div>
								    </div>
								  </div>
								</div>


								{{-- Modal Historial Médico --}} 
								@endforeach



								@foreach($paciente->ocular as $ocular)
								{{-- Modal Historial Ocular 1 --}} 
								<div class="modal fade"  id="ocular_modal{{$ocular->id}}1"  role="dialog"  style="overflow-y: scroll;">
									 
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header jumbotron">
								        <h5 class="modal-title" id="exampleModalLongTitle"><strong>Fecha de Cita</strong>&nbsp;&nbsp;&nbsp;&nbsp;{{$ocular->created_at}} </h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
								        </button>
								      </div>
								      <div class="modal-body">
								        <div class="panel-default">
								          <div class="panel-body">
								        	<div class="row">
								        	 <div class="col-sm-3">
								        	  	<label class="control-label" for="apmaterno">Óperaciones de Documentación:</label>
												<dd>{{$ocular->opciones}}</dd>
								        	  </div>
								        	   <div class="col-sm-3">
								        	  	<label class="control-label" for="apmaterno">Optometrísta:</label>
												<dd>{{$ocular->optometrista}}</dd>
								        	  </div>
								        	</div><br>
								        </div>
								        </div>
								      </div>
								       <div class="modal-header jumbotron">
								        <h5 class="modal-title" id="exampleModalLongTitle"><strong>Cirugías y Padecimientos</strong></h5>
								       </div>
								      <div class="modal-body">
								        <div class="panel-default">
								          <div class="panel-body">
								        	<div class="row">
								        		@if($ocular->cirugias=='SI')
								        		<div class="col-sm-3">
								        		<label class="control-label" for="apmaterno">Cirugía:</label>
												<dd>{{$ocular->cirug_1}}</dd>
								        		</div>
								        		<div class="col-sm-3">
								        		<label class="control-label" for="apmaterno">Tiempo de la Cirugía:</label>
												<dd>{{$ocular->cirug_2}}</dd>	
								        		</div>
								        		<div class="col-sm-3">
								        		<label class="control-label" for="apmaterno">Tratamiento:</label>
												<dd>{{$ocular->cirug_3}}</dd>	
								        		</div>
								        		@else
								        		<div class="col-sm-3">
								        		<label class="control-label" for="apmaterno">Cirugía:</label>
												<dd>NINGUNA</dd>	
								        		</div>
								        		@endif
								        	</div><br>
								        	<div class="row">
								        		@if($ocular->padecimientos=='SI')
								        		<div class="col-sm-9">
								        		<label class="control-label" for="apmaterno">Padecimientos:</label>
												<dd>{{$ocular->padecimientos_array}}</dd>
								        		</div>
								        		@else
								        		<div class="col-sm-3">
								        		<label class="control-label" for="apmaterno">Padecimientos:</label>
												<dd><dd>NINGUNO</dd></dd>	
								        		</div>
								        		@endif
								        	</div>
										  </div>
								        </div>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-danger" data-dismiss="modal"><strong>Cerrar</strong></button>
								       
								      </div>
								    </div>
								  </div>
								</div>
								{{-- Modal Historial Ocular 1 --}} 

								{{-- Modal Historial Ocular 2 --}} 
								<div class="modal fade"  id="ocular_modal{{$ocular->id}}2"  role="dialog"  style="overflow-y: scroll;">
								
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header jumbotron">
								        <h5 class="modal-title" id="exampleModalLongTitle"><strong>Problemas Visuales</strong></h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
								        </button>
								      </div>
								      <div class="modal-body">
								        <div class="panel-default">
								          <div class="panel-body">
								        	<div class="row">
								        	 <div class="col-sm-2">
								        	  	<label class="control-label" for="apmaterno">Problema Visual:</label>
								        	  	<dd>{{$ocular->problema_visual}}</dd><br>
											</div>
											<div class="col-sm-2">
								        	  	<label class="control-label" for="apmaterno">Uso de Lentes:</label>
								        	  	<dd>{{$ocular->usuario_lentes}}</dd>
											</div>
											@if($ocular->usuario_lentes=='SI')
											<div class="col-sm-3">
								        	  	<label class="control-label" for="apmaterno">Edad a la que usó Lentes:</label>
								        	  	<dd>{{$ocular->edad_lentes}}</dd>
											</div>
											@endif
								        	 <div class="col-sm-3">
								        	  	<label class="control-label" for="apmaterno">Molestia a la Luz Solar:</label>
								        	  	<dd>{{$ocular->molestia_luz}}</dd>
											 </div>
											</div><br>
								        	<div class="row">
								        		<div class="col-sm-3">
								        	  	<label class="control-label" for="apmaterno">Usuario de Computadora:</label>
								        	  	<dd>{{$ocular->usuario_computadora}}</dd>
											</div>
								        	</div>
										  </div>
								        </div>
								      </div>
								      <div class="modal-header jumbotron">
								        <h5 class="modal-title" id="exampleModalLongTitle"><strong> Antecedentes Oculares Familiares</strong></h5>
								      </div>
								       <div class="modal-body">
								        <div class="panel-default">
								          <div class="panel-body">
								        	<div class="row">
								        		@if($ocular->antecedente_array==null)
								        		<div class="col-sm-8">
								        			<dd>NINGUNO</dd>
								        		</div>
								        		@else
								        		 <div class="col-sm-8">
								        	  <dd>{{$ocular->antecedente_array}}</dd><br>
											</div>
								        		@endif
								        	</div><br>
								        	</div>
								        </div>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
								        
								      </div>
								    </div>
								  </div>
								</div>

								{{-- Modal Historial Ocular 2 --}}

								{{-- Modal Historial Ocular 3 --}} 
								<div class="modal fade"  id="ocular_modal{{$ocular->id}}3"  role="dialog"  style="overflow-y: scroll;">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header jumbotron">
								        <h5 class="modal-title" id="exampleModalLongTitle"><strong>Revisión Visual</strong></h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
								        </button>
								      </div>
								      <div class="modal-body">
								        <div class="panel-default">
								          <div class="panel-body">
								        	<div class="row">
								        	 <div class="col-sm-6">
								        	  	<label class="control-label" for="apmaterno">A.V. sin Rx. de Lejos (Snellen):</label>
								        	 </div>
											   <div class="col-sm-3">
								        	  	<label class="control-label" for="apmaterno">Ojo Derecho:</label>
								        	  	<dd>{{$ocular->snellen_1}}</dd>
											   </div>
								        	  <div class="col-sm-3">
								        	  	<label class="control-label" for="apmaterno">Ojo Izquierdo:</label>
												<dd>{{$ocular->snellen_2}}</dd>
								        	  </div>
								        	 </div><hr>
											<div class="row">
								        	 <div class="col-sm-3">
								        	  	<label class="control-label" for="apmaterno">Pantalleo:</label>
								        	 </div>
								        	  <div class="col-sm-3">
								        	  	<label class="control-label" for="apmaterno">Unilateral</label>
								        	  </div>
											   <div class="col-sm-3">
								        	  	<label class="control-label" for="apmaterno">Lejos:</label>
								        	  	<dd>{{$ocular->unilateral_lejos}}</dd>
											   </div>
								        	  <div class="col-sm-3">
								        	  	<label class="control-label" for="apmaterno">Cerca:</label>
												<dd>{{$ocular->unilateral_cerca}}</dd>
								        	  </div>
								        	 </div><br>
								        	 <div class="row">
								        	 <div class="col-sm-3 col-sm-offset-3">
								        	  	<label class="control-label" for="apmaterno">Alternante</label>
								        	  </div>
											   <div class="col-sm-3">
								        	  	<label class="control-label" for="apmaterno">Lejos:</label>
								        	  	<dd>{{$ocular->alternamente_lejos}}</dd>
											   </div>
								        	  <div class="col-sm-3">
								        	  	<label class="control-label" for="apmaterno">Cerca:</label>
												<dd>{{$ocular->alternamente_cerca}}</dd>
								        	  </div>
								        	 </div><hr>
								        	 <div class="row">
								        	 <div class="col-sm-3">
								        	  	<label class="control-label" for="apmaterno">Queratometría</label>
								        	 </div>
								        	   <div class="col-sm-2">
								        	   	<label class="control-label" for="apmaterno">Ojo Derecho:</label>
								        	   </div>
											   <div class="col-sm-2">
								        	  	<label class="control-label" for="apmaterno">Plana</label>
								        	  	<dd>{{$ocular->queratometria_od_plana}}</dd>
											   </div>
								        	  <div class="col-sm-2">
								        	  	<label class="control-label" for="apmaterno">Curva</label>
												<dd>{{$ocular->queratometria_od_curva}}</dd>
								        	  </div>
								        	  <div class="col-sm-2">
								        	  	<label class="control-label" for="apmaterno">Eje</label>
												<dd>{{$ocular->queratometria_od_eje}}</dd>
								        	  </div>
								        	 </div>
								        	 <div class="row">
								        	 <div class="col-sm-2 col-sm-offset-3">
								        	  	<label class="control-label" for="apmaterno">Ojo Izquierdo:</label>
								        	  </div>
											   <div class="col-sm-2">
								        	  	<label class="control-label" for="apmaterno">Plana</label>
								        	  	<dd>{{$ocular->queratometria_oi_plana}}</dd>
											   </div>
								        	  <div class="col-sm-2">
								        	  	<label class="control-label" for="apmaterno">Curva</label>
												<dd>{{$ocular->queratometria_oi_curva}}</dd>
								        	  </div>
								        	  <div class="col-sm-2">
								        	  	<label class="control-label" for="apmaterno">Eje</label>
												<dd>{{$ocular->queratometria_oi_eje}}</dd>
								        	  </div>
								        	 </div><hr>
								        	 <div class="row">
								        	 <div class="col-sm-3">
								        	  	<label class="control-label" for="apmaterno">Visión Estereoscópica</label>
								        	 </div>
								        	   <div class="col-sm-3">
								        	   	<label class="control-label" for="apmaterno">Seg / Arco </label>
								        	   	<dd>{{$ocular->vision_estereo}}</dd>
								        	   </div>
											 </div>
										  </div>
								        </div>
								      </div>
								      <div class="modal-header jumbotron">
								        <h5 class="modal-title" id="exampleModalLongTitle"><strong>Oftalmoscopía</strong></h5>
								      </div>
								       <div class="modal-body">
								        <div class="panel-default">
								          <div class="panel-body">
								          	 <div class="row">
								        	 <div class="col-sm-3">
								        	  	<label class="control-label" for="apmaterno">Parámetros</label>
								        	 </div>
								        	   <div class="col-sm-3">
								        	   	<label class="control-label" for="apmaterno">Ojo Derecho</label>
								        	   </div>
											   <div class="col-sm-3">
								        	  	<label class="control-label" for="apmaterno">Ojo Izquierdo</label>
								        	  	</div>
								        	</div><br>
								        	<div class="row">
								        	  <div class="col-sm-3">
								        	   	<label class="control-label" for="apmaterno">Papila:</label>
								        	   </div>
											   <div class="col-sm-3">
								        	  	<dd>{{$ocular->papila_od}}</dd>
											   </div>
								        	  <div class="col-sm-2">
								        	  	<dd>{{$ocular->papila_oi}}</dd>
								        	  </div>
								        	  </div><br>
								        	<div class="row">
								        	  <div class="col-sm-3">
								        	   	<label class="control-label" for="apmaterno">Excavación:</label>
								        	   </div>
											   <div class="col-sm-3">
								        	  	<dd>{{$ocular->excavacion_od}}</dd>
											   </div>
								        	  <div class="col-sm-2">
								        	  	<dd>{{$ocular->excavacion_oi}}</dd>
								        	  </div>
								        	  </div><br>
								        	  <div class="row">
								        	  <div class="col-sm-3">
								        	   	<label class="control-label" for="apmaterno">Radio:</label>
								        	   </div>
											   <div class="col-sm-3">
								        	  	<dd>{{$ocular->radio_od}}</dd>
											   </div>
								        	  <div class="col-sm-2">
								        	  	<dd>{{$ocular->radio_oi}}</dd>
								        	  </div>
								        	  </div><br>
								        	  <div class="row">
								        	  <div class="col-sm-3">
								        	   	<label class="control-label" for="apmaterno">Profundidad:</label>
								        	   </div>
											   <div class="col-sm-3">
								        	  	<dd>{{$ocular->profundidad_od}}</dd>
											   </div>
								        	  <div class="col-sm-2">
								        	  	<dd>{{$ocular->profundidad_oi}}</dd>
								        	  </div>
								        	  </div><br>
								        	  <div class="row">
								        	  <div class="col-sm-3">
								        	   	<label class="control-label" for="apmaterno">Vasos:</label>
								        	   </div>
											   <div class="col-sm-3">
								        	  	<dd>{{$ocular->vasos_od}}</dd>
											   </div>
								        	  <div class="col-sm-2">
								        	  	<dd>{{$ocular->vasos_oi}}</dd>
								        	  </div>
								        	  </div><br>
								        	  <div class="row">
								        	  <div class="col-sm-3">
								        	   	<label class="control-label" for="apmaterno">Rel. A/V:</label>
								        	   </div>
											   <div class="col-sm-3">
								        	  	<dd>{{$ocular->rel_od}}</dd>
											   </div>
								        	  <div class="col-sm-2">
								        	  	<dd>{{$ocular->rel_oi}}</dd>
								        	  </div>
								        	  </div><br>
								        	   <div class="row">
								        	  <div class="col-sm-3">
								        	   	<label class="control-label" for="apmaterno">Macula:</label>
								        	   </div>
											   <div class="col-sm-3">
								        	  	<dd>{{$ocular->macula_od}}</dd>
											   </div>
								        	  <div class="col-sm-2">
								        	  	<dd>{{$ocular->macula_oi}}</dd>
								        	  </div>
								        	  </div><br>
								        	   <div class="row">
								        	 <div class="col-sm-3">
								        	   	<label class="control-label" for="apmaterno">Reflejo:</label>
								        	   </div>
											   <div class="col-sm-3">
								        	  	<dd>{{$ocular->reflejo_od}}</dd>
											   </div>
								        	  <div class="col-sm-2">
								        	  	<dd>{{$ocular->reflejo_oi}}</dd>
								        	  </div>
								        	  </div><br>
								        	   <div class="row">
								        	 <div class="col-sm-3">
								        	   	<label class="control-label" for="apmaterno">Retina:</label>
								        	   </div>
											   <div class="col-sm-3">
								        	  	<dd>{{$ocular->retina_od}}</dd>
											   </div>
								        	  <div class="col-sm-2">
								        	  	<dd>{{$ocular->retina_oi}}</dd>
								        	  </div>
								        	  </div><br>
								        </div>
								        </div>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-danger" data-dismiss="modal"><strong>Cerrar</strong></button>
								        
								      </div>
								    </div>
								  </div>
								</div>

								{{-- Modal Historial Ocular 3 --}}

								{{-- Modal Historial Ocular 4 --}} 
								<div class="modal fade"  id="ocular_modal{{$ocular->id}}4"  role="dialog"  style="overflow-y: scroll;">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content" >
								      <div class="modal-header jumbotron">
								        <h5 class="modal-title" id="exampleModalLongTitle"><strong>Anexos y Biomicroscopía</strong></h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
								        </button>
								      </div>
								      <div class="modal-body" >
								        <div class="panel-default">
								          <div class="panel-body">
								        	<div class="row">
								        	 <div class="col-sm-12">
								        	  	<dd>{{$ocular->anexos}}</dd>
								        	 </div>
											 </div>
											</div>
								        </div>
								      </div>
								      <div class="modal-header jumbotron">
								        <h5 class="modal-title" id="exampleModalLongTitle"><strong>Archivo de Imagen</strong></h5>
								      </div>
								       <div class="modal-body" >
								        <div class="panel-default">
								          <div class="panel-body">
								          	 <div class="row">
								        	 <div class="col-sm-12">
								        	  	<img src="{{asset('storage/'.$ocular->archivo_imagen)}}" width="500px" height="500px">
								        	 </div>
								        	</div>
								        	</div>
								        </div>
								      </div>
								       <div class="modal-header jumbotron">
								        <h5 class="modal-title" id="exampleModalLongTitle"><strong>Tonometría</strong></h5>
								      </div>
								       <div class="modal-body">
								        <div class="panel-default">
								          <div class="panel-body">
								        	 <div class="row">
								        	 <div class="col-sm-3">
								        	   	<label class="control-label" for="apmaterno">Fecha:</label>
								        	   	<dd>{{$ocular->fecha_tono}}</dd>
								        	   </div>
											   <div class="col-sm-3">
								        	  	<label class="control-label" for="apmaterno">Hora</label>
								        	  	<dd>{{$ocular->hora_tono}}</dd>
								        	  	</div>
								        	</div><br>
								        	<div class="row">
								        	 <div class="col-sm-3">
								        	   	<label class="control-label" for="apmaterno">Ojo derecho:</label>
								        	   	<dd>{{$ocular->tonometria_od}}</dd>
								        	   </div>
											   <div class="col-sm-3">
								        	  	<label class="control-label" for="apmaterno">Ojo Izquierdo</label>
								        	  	<dd>{{$ocular->tonometria_oi}}</dd>
								        	  	</div>
								        	</div>
											</div>
								        </div>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-danger" data-dismiss="modal"><strong>Cerrar</strong></button>
								        
								      </div>
								    </div>
								  </div>
								</div>

								{{-- Modal Historial Ocular 4 --}}

								{{-- Modal Historial Ocular 5 --}} 
								<div class="modal fade"  id="ocular_modal{{$ocular->id}}5"  role="dialog"  style="overflow-y: scroll;">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header jumbotron">
								        <h5 class="modal-title" id="exampleModalLongTitle"><strong>Graduación</strong></h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
								        </button>
								      </div>
								      <div class="modal-body">
								        <div class="panel-default">
								          <div class="panel-body">
								        	<div class="row">
								        	 <div class="col-sm-2">
								        	  	<label class="control-label" for="apmaterno">Ojo Derecho:</label>
								        	 </div>
											<div class="col-sm-2">
								        	  	<label class="control-label" for="apmaterno">ESF</label>
								        	  	<dd>{{$ocular->esf_od}}</dd>
											</div>
											@if($ocular->cil_od!=null)
											<div class="col-sm-2">
								        	  	<label class="control-label" for="apmaterno">CIL</label>
								        	  	<dd>{{$ocular->cil_od}}</dd>
											</div>
											
											<div class="col-sm-2">
								        	  	<label class="control-label" for="apmaterno">EJE</label>
								        	  	<dd>{{$ocular->eje_od}}</dd>
											</div>
											@endif
								        	<div class="col-sm-2">
								        	  	<label class="control-label" for="apmaterno">ADD</label>
								        	  	<dd>{{$ocular->add_od}}</dd>
											</div>
											<div class="col-sm-2">
								        	  	<label class="control-label" for="apmaterno">AV</label>
								        	  	<dd>{{$ocular->av_od}}</dd>
											</div>
											</div><br>
										<div class="row">
								        	 <div class="col-sm-2">
								        	  	<label class="control-label" for="apmaterno">Ojo Izquierdo:</label>
								        	 </div>
											<div class="col-sm-2">
								        	  	<label class="control-label" for="apmaterno">ESF</label>
								        	  	<dd>{{$ocular->esf_oi}}</dd>
											</div>
											@if($ocular->cil_oi!=null)
											<div class="col-sm-2">
								        	  	<label class="control-label" for="apmaterno">CIL</label>
								        	  	<dd>{{$ocular->cil_oi}}</dd>
											</div>
											
											<div class="col-sm-2">
								        	  	<label class="control-label" for="apmaterno">EJE</label>
								        	  	<dd>{{$ocular->eje_oi}}</dd>
											</div>
											@endif
								        	<div class="col-sm-2">
								        	  	<label class="control-label" for="apmaterno">ADD</label>
								        	  	<dd>{{$ocular->add_oi}}</dd>
											</div>
											<div class="col-sm-2">
								        	  	<label class="control-label" for="apmaterno">AV</label>
								        	  	<dd>{{$ocular->av_oi}}</dd>
											</div>
											</div><br>
								        	</div>
								        </div>
								      </div>
								      <div class="modal-header jumbotron">
								        <h5 class="modal-title" id="exampleModalLongTitle"><strong>Diagnóstico</strong></h5>
								      </div>
								       <div class="modal-body">
								        <div class="panel-default">
								          <div class="panel-body">
								        	<div class="row">
								        		<div class="col-sm-8">
								        			<label class="control-label" for="apmaterno">Refractivo</label>
								        			<dd>{{$ocular->refractivo}}</dd>
								        		</div>
								        	</div><br>
								        	<div class="row">
								        		<div class="col-sm-8">
								        			<label class="control-label" for="apmaterno">Patológico</label>
								        			<dd>{{$ocular->patologico}}</dd>
								        		</div>
								        	</div><br>
								        <div class="row">
								        		<div class="col-sm-8">
								        			<label class="control-label" for="apmaterno">Binocularidad</label>
								        			<dd>{{$ocular->binocularidad}}</dd>
								        		</div>
								        	</div><br>
								        	</div>
								        </div>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
								        
								      </div>
								    </div>
								  </div>
								</div>

								{{-- Modal Historial Ocular 5 --}}

								@endforeach

		@foreach($paciente->anteojo as $anteojo)
		{{-- Modal Anteojos --}} 
								<div class="modal fade"  id="anteojo_modal{{$anteojo->id}}"  role="dialog"  style="overflow-y: scroll;">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content" >
								      
@switch($anteojo->tipo_anteojo)
	@case('ARMAZÓN')

								<div class="modal-header jumbotron">
								        <h5 class="modal-title" id="exampleModalLongTitle"><strong>Lentes de Armazón</strong></h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
								        </button>
								      </div>

							        <div class="modal-body" >
								        <div class="panel-default">
								          <div class="panel-body">


	@switch($anteojo->tipo_lente)
	    @case('MONOFOCAL')
	    <div class="row">
				 <div class="col-sm-3">
				 	<label class="control-label">Tipo de Lentes</label>
					<dd>{{$anteojo->tipo_lente}}</dd>
				 </div>
	      
				 <div class="col-sm-3">
				 	<label class="control-label">Tipo de Monofocal</label>
					<dd>{{$anteojo->monofocal}}</dd>
				 </div>
				 <div class="col-sm-3">
				 	<label class="control-label">Material</label>
					<dd>{{$anteojo->monofocal_material}}</dd>
				 </div>
				 @if($anteojo->monofocal_material=='BÁSICO')
				 <div class="col-sm-3">
				 	<label class="control-label">Material Báscio</label>
					<dd>{{$anteojo->monofocal_material_basico}}</dd>
				 </div>
				 @else
				 <div class="col-sm-3">
				 	<label class="control-label">Material Premium</label>
					<dd>{{$anteojo->monofocal_material_premium}}</dd>
				 </div>
				 @endif
			</div><br>
			<div class="row">
				<div class="col-sm-3">
				 	<label class="control-label">Tratamiento</label>
				 	<dd>{{$anteojo->tratamiento}}</dd>
				</div>
				 @if($anteojo->tratamiento=='SI')
				 	
				 	<div class="col-sm-3">
				 	<label class="control-label">Antirreflejante</label>	
				 	<dd>{{$anteojo->anti_basico}}{{$anteojo->anti_premium}}</dd>
				 </div>
				 	
				 	<div class="col-sm-3">
				 		<label class="control-label">Fotocromático</label>
				 	<dd>{{$anteojo->foto_basico}}{{$anteojo->foto_premium}}</dd>
				 </div>
				 	
				 <div class="col-sm-3">
				 		<label class="control-label">Polarizado</label>
				 	<dd>{{$anteojo->polarizado_basico}}{{$anteojo->polarizado_premium}}</dd>
				 </div>	

				 @else
				 
				 @endif
			</div>
	        @break

	    @case('BIFOCAL')
	      <div class="row">
				 <div class="col-sm-3">
				 	<label class="control-label">Tipo de Lentes</label>
					<dd>{{$anteojo->tipo_lente}}</dd>
				 </div>
	      
				 <div class="col-sm-3">
				 	<label class="control-label">Tipo de Bifocal</label>
					<dd>{{$anteojo->bifocal}}</dd>
				 </div>
				 <div class="col-sm-3">
				 	<label class="control-label">Material</label>
					<dd>{{$anteojo->bifocal_flat_material}} 
						@if($anteojo->bifocal_blend_material=='NO')
						
						@else
						CR-39 W
						@endif
						
					</dd>
				 </div>
			</div><br>
				 <div class="row">
				 @if($anteojo->tratamiento_flat=='SI')
				 <div class="col-sm-3">
				 	<label class="control-label">Tratamientos:</label>
					<dd>{{$anteojo->monofocal_material_basico}}</dd>
				 </div>
				  <div class="col-sm-3">
				 	<label class="control-label">Antirreflejante Básico</label>
					<dd>{{$anteojo->tratamiento_flat_antirreflejante_basico}}</dd>
				 </div>
				  <div class="col-sm-3">
				 	<label class="control-label">Fotocromático Básico</label>
					<dd>{{$anteojo->tratamiento_flat_fotocromatico_basico}}</dd>
				 </div>
				 @elseif($anteojo->tratamiento_blend=='SI')
				 <div class="col-sm-3">
				 	<label class="control-label">Tratamientos:</label>
					<dd>{{$anteojo->monofocal_material_basico}}</dd>
				 </div>
				  <div class="col-sm-3">
				 	<label class="control-label">Antirreflejante Básico</label>
					<dd>{{$anteojo->tratamiento_blend_basico}}</dd>
				 </div>
				  
				 @endif
			</div><br>
	        @break

	    @case('PROGRESIVO')
	        <div class="row">
				 <div class="col-sm-3">
				 	<label class="control-label">Tipo de Lentes</label>
					<dd>{{$anteojo->tipo_lente}}</dd>
				 </div>
	      
				 <div class="col-sm-3">
				 	<label class="control-label">Tipo de Progresivo</label>
					<dd>{{$anteojo->progresivo}}</dd>
				 </div>
				 @isset($anteojo->progresivo_premium_kodak)
    				<div class="col-sm-3">
				 	<label class="control-label">KODAK</label>
					<dd>{{$anteojo->progresivo_premium_kodak}}</dd>
				 </div>
                 @endisset
				 <div class="col-sm-3">
				 	<label class="control-label">Material</label>
					<dd>{{$anteojo->progresivo_basico_material}} 
						{{$anteojo->progresivo_premium_material}} 
					</dd>
				 </div>
			</div><br>
			<div class="row">
				<div class="col-sm-3">
				 	<label class="control-label">Tratamiento:</label>
				 	<dd>{{$anteojo->tratamiento_progresivo_basico}}
				 		{{$anteojo->tratamiento_progresivo_premium}}</dd>
				</div>
				@if($anteojo->tratamiento_progresivo_basico=='SI'||$anteojo->tratamiento_progresivo_premium=='SI')
				<div class="col-sm-3">
				 	<label class="control-label">Antirreflejante</label>
				 	<dd>@if($anteojo->tratamiento_progresivo_basico_antirreflejante=='NO')

				 		@else
				 		{{$anteojo->tratamiento_progresivo_basico_antirreflejante}}
				 		@endif
				 		{{$anteojo->anti_premium_progresivo}}
				 	</dd>
				</div>
				<div class="col-sm-3">
				 	<label class="control-label">Fotocromático</label>
				 	<dd>@if($anteojo->tratamiento_progresivo_basico_fotocromatico=='NO')
				 		
				 		@else
				 		{{$anteojo->tratamiento_progresivo_basico_fotocromatico}}
				 		@endif
				 		{{$anteojo->foto_premium_progresivo}}
				 	</dd>
				</div>
				@endif

			</div>
	        @break

	    @default
	        Default case...
	@endswitch
								        	

											</div>
								        </div>
								      </div>
			 @break

@case('LENTES DE CONTACTO')
		<div class="modal-header jumbotron">
			<h5 class="modal-title" id="exampleModalLongTitle"><strong>Lentes de Contacto</strong></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
				</button>
		</div>
		@break
	@case('AMBOS')
	<div class="modal-header jumbotron">
		<h5 class="modal-title" id="exampleModalLongTitle"><strong>Lentes de Armazón</strong></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
		</button>
	</div>

	<div class="modal-body" >
		<div class="panel-default">
			<div class="panel-body">
	@switch($anteojo->tipo_lente)
	    @case('MONOFOCAL')
	    <div class="row">
				 <div class="col-sm-3">
				 	<label class="control-label">Tipo de Lentes</label>
					<dd>{{$anteojo->tipo_lente}}</dd>
				 </div>
	      
				 <div class="col-sm-3">
				 	<label class="control-label">Tipo de Monofocal</label>
					<dd>{{$anteojo->monofocal}}</dd>
				 </div>
				 <div class="col-sm-3">
				 	<label class="control-label">Material</label>
					<dd>{{$anteojo->monofocal_material}}</dd>
				 </div>
				 @if($anteojo->monofocal_material=='BÁSICO')
				 <div class="col-sm-3">
				 	<label class="control-label">Material Báscio</label>
					<dd>{{$anteojo->monofocal_material_basico}}</dd>
				 </div>
				 @else
				 <div class="col-sm-3">
				 	<label class="control-label">Material Premium</label>
					<dd>{{$anteojo->monofocal_material_premium}}</dd>
				 </div>
				 @endif
			</div><br>
			<div class="row">
				<div class="col-sm-3">
				 	<label class="control-label">Tratamiento</label>
				 	<dd>{{$anteojo->tratamiento}}</dd>
				</div>
				 @if($anteojo->tratamiento=='SI')
				 	
				 	<div class="col-sm-3">
				 	<label class="control-label">Antirreflejante</label>	
				 	<dd>{{$anteojo->anti_basico}}{{$anteojo->anti_premium}}</dd>
				 </div>
				 	
				 	<div class="col-sm-3">
				 		<label class="control-label">Fotocromático</label>
				 	<dd>{{$anteojo->foto_basico}}{{$anteojo->foto_premium}}</dd>
				 </div>
				 	
				 <div class="col-sm-3">
				 		<label class="control-label">Polarizado</label>
				 	<dd>{{$anteojo->polarizado_basico}}{{$anteojo->polarizado_premium}}</dd>
				 </div>	

				 @else
				 
				 @endif
			</div>
	        @break

	    @case('BIFOCAL')
	      <div class="row">
				 <div class="col-sm-3">
				 	<label class="control-label">Tipo de Lentes</label>
					<dd>{{$anteojo->tipo_lente}}</dd>
				 </div>
	      
				 <div class="col-sm-3">
				 	<label class="control-label">Tipo de Bifocal</label>
					<dd>{{$anteojo->bifocal}}</dd>
				 </div>
				 <div class="col-sm-3">
				 	<label class="control-label">Material</label>
					<dd>{{$anteojo->bifocal_flat_material}} 
						@if($anteojo->bifocal_blend_material=='NO')
						
						@else
						CR-39 W
						@endif
						
					</dd>
				 </div>
			</div><br>
				 <div class="row">
				 @if($anteojo->tratamiento_flat=='SI')
				 <div class="col-sm-3">
				 	<label class="control-label">Tratamientos:</label>
					<dd>{{$anteojo->monofocal_material_basico}}</dd>
				 </div>
				  <div class="col-sm-3">
				 	<label class="control-label">Antirreflejante Básico</label>
					<dd>{{$anteojo->tratamiento_flat_antirreflejante_basico}}</dd>
				 </div>
				  <div class="col-sm-3">
				 	<label class="control-label">Fotocromático Básico</label>
					<dd>{{$anteojo->tratamiento_flat_fotocromatico_basico}}</dd>
				 </div>
				 @elseif($anteojo->tratamiento_blend=='SI')
				 <div class="col-sm-3">
				 	<label class="control-label">Tratamientos:</label>
					<dd>{{$anteojo->monofocal_material_basico}}</dd>
				 </div>
				  <div class="col-sm-3">
				 	<label class="control-label">Antirreflejante Básico</label>
					<dd>{{$anteojo->tratamiento_blend_basico}}</dd>
				 </div>
				  
				 @endif
			</div><br>
	        @break

	    @case('PROGRESIVO')
	        <div class="row">
				 <div class="col-sm-3">
				 	<label class="control-label">Tipo de Lentes</label>
					<dd>{{$anteojo->tipo_lente}}</dd>
				 </div>
	      
				 <div class="col-sm-3">
				 	<label class="control-label">Tipo de Progresivo</label>
					<dd>{{$anteojo->progresivo}}</dd>
				 </div>
				 @isset($anteojo->progresivo_premium_kodak)
    				<div class="col-sm-3">
				 	<label class="control-label">KODAK</label>
					<dd>{{$anteojo->progresivo_premium_kodak}}</dd>
				 </div>
                 @endisset
				 <div class="col-sm-3">
				 	<label class="control-label">Material</label>
					<dd>{{$anteojo->progresivo_basico_material}} 
						{{$anteojo->progresivo_premium_material}} 
					</dd>
				 </div>
			</div><br>
			<div class="row">
				<div class="col-sm-3">
				 	<label class="control-label">Tratamiento:</label>
				 	<dd>{{$anteojo->tratamiento_progresivo_basico}}
				 		{{$anteojo->tratamiento_progresivo_premium}}</dd>
				</div>
				@if($anteojo->tratamiento_progresivo_basico=='SI'||$anteojo->tratamiento_progresivo_premium=='SI')
				<div class="col-sm-3">
				 	<label class="control-label">Antirreflejante</label>
				 	<dd>@if($anteojo->tratamiento_progresivo_basico_antirreflejante=='NO')

				 		@else
				 		{{$anteojo->tratamiento_progresivo_basico_antirreflejante}}
				 		@endif
				 		{{$anteojo->anti_premium_progresivo}}
				 	</dd>
				</div>
				<div class="col-sm-3">
				 	<label class="control-label">Fotocromático</label>
				 	<dd>@if($anteojo->tratamiento_progresivo_basico_fotocromatico=='NO')
				 		
				 		@else
				 		{{$anteojo->tratamiento_progresivo_basico_fotocromatico}}
				 		@endif
				 		{{$anteojo->foto_premium_progresivo}}
				 	</dd>
				</div>
				@endif

			</div>
	        @break

	    @default
	        Default case...
	@endswitch
			</div>
		</div>
	</div>
	 <div class="modal-header jumbotron">
		<h5 class="modal-title" id="exampleModalLongTitle"><strong>Lentes de Contacto</strong></h5>
	 </div>
	 <div class="modal-body" >
		<div class="panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<dd>Aquí va Sección de Lentes de Contacto</dd>
					</div>
				</div>
			</div>
		</div>
	</div>
		@break
	@default
	  @break
@endswitch
								      

								     
								      
								      
								      
								      <div class="modal-footer">
								        <button type="button" class="btn btn-danger" data-dismiss="modal"><strong>Cerrar</strong></button>
								        
								      </div>
								    </div>
								  </div>
								</div>

								{{-- Modal Anteojos --}}
		@endforeach

							{{-- Modal Edit Tutor --}}	
         @foreach($paciente->tutores as $tutor)
        <form role="form" method="POST" action="{{ route('pacientes.tutor.update',['paciente'=>$paciente,'tutor'=>$tutor]) }}">

				{{ csrf_field() }}
				<input type="hidden" name="_method" value="PUT">
				
								<div class="modal fade" id="tutor_{{$tutor->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="position: 0,0 !important; right: -200px;">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLongTitle">Editarar Tutor</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
								        </button>
								      </div>
								      <div class="modal-body">
								        <div class="panel-default">
								        	<div class="panel-heading"><h5>Tutor:</h5></div>
								        	<div class="panel-body">

			<input type="hidden" name="id" value="{{$tutor->id}}">
								        		<div class="form-group col-xs-4">
													<label class="control-label">Nombre:</label>
													<input class="form-control" type="text" name="nombre" value="{{$tutor->nombre}}">
												</div>
												<div class="form-group col-xs-4">
													<label class="control-label">Apellido Paterno:</label>
													<input class="form-control" type="text" name="appaterno" value="{{$tutor->appaterno}}">
												</div>
												<div class="form-group col-xs-4">
													<label class="control-label">Apellido Materno:</label>
													<input class="form-control" type="text" name="apmaterno" value="{{$tutor->apmaterno}}">
												</div>
												<div class="form-group col-xs-4">
													<label class="control-label">Edad:(Automàtico)</label>
													<input class="form-control" type="text" name="edad" value="{{$tutor->edad}}" readonly id="edad_2">
												</div>
												<div class="form-group col-xs-4">
													<label class="control-label">Fecha de nacimiento:</label>
													<input class="form-control" type="date" name="fecha_nacimiento" value="{{$tutor->fecha_nacimiento}}" id="fecha_2">
												</div>
												<div class="form-group col-xs-4">
													<label class="control-label">Sexo:</label>
													<select class="form-control" name="sexo">
														<option value="Masculino"
														@if($tutor->sexo=='Masculino')
														selected='selected'
														@endif>Masculino</option>
														<option value="Femenino"
														@if($tutor->sexo=='Femenino')
														selected='selected'
														@endif>Femenino</option>
														<option value="Otro"
														@if($tutor->sexo=='Otro')
														selected='selected'
														@endif>Otro</option>
													</select>
												</div>
												<div class="form-group col-xs-4">
													<label class="control-label">Relación con el paciente:</label>
													<select class="form-control" name="relacion" id="relacion">
														<option value="Padre"
														@if($tutor->relacion=='Padre')
														selected='selected'
														@endif>Padre</option>
														<option value="Madre"
														@if($tutor->relacion=='Madre')
														selected='selected'
														@endif>Madre</option>
														<option value="Tio/Tia"
														@if($tutor->relacion=='Tio/Tia')
														selected='selected'
														@endif>Tio/Tia</option>
														<option value="Abuelo/Abuela"
														@if($tutor->relacion=='Abuelo/Abuela')
														selected='selected'
														@endif>Abuelo/Abuela</option>
														<option value="Hermano/Hermana"
														@if($tutor->relacion=='Hermano/Hermana')
														selected='selected'
														@endif>Hermano/Hermana</option>
														<option value="Primos"
														@if($tutor->relacion=='Primos')
														selected='selected'
														@endif>Primos</option>
														<option value="Otros"
														@if($tutor->relacion=='Otros')
														selected='selected'
														@endif>Otros</option>
													</select>
												</div>
												<div class="form-group col-xs-4">
													<label class="control-label">Teléfono de Casa:</label>
													<input class="form-control" type="text" name="tel_casa" value="{{$tutor->tel_casa}}">
												</div>
												<div class="form-group col-xs-4">
													<label class="control-label">Teléfono Celular:</label>
													<input class="form-control" type="text" name="tel_cel" value="{{$tutor->tel_cel}}">
												</div>
											
								        	</div>
								        </div>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-danger" data-dismiss="modal"><strong>Cerrar</strong></button>
								        <button type="submit" class="btn btn-primary"><strong>Guardar</strong></button>
								      </div>
								    </div>
								  </div>
								</div></form>
         @endforeach
         					{{-- Modal Edit Tutor --}}


<script type="text/javascript">
		

		function getSucursal(){
			$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
			});
			$.ajax({
				url: "{{ url('/getsucursal') }}",
			    type: "GET",
			    dataType: "html",
			}).done(function(resultado){
			    $("#sucursal").html(resultado);
			});
		}

		

	</script>

@endsection