@extends('layouts.test')
@section('content1')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="container">
	<div role="application" class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading jumbotron">
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
						<a class="btn btn-info" href="{{ route('pacientes.index') }}"><strong>Lista de Pacientes</strong></a>
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

							<li role="presentation"><a data-toggle="tab" href="#hmedico">Historial Medico:</a></li> 

							<li role="presentation"><a data-toggle="tab" href="#ocular">Historial Ocular:</a></li>
							<!--<li role="presentation"><a data-toggle="tab" href="#" class="ui-tabs-anchor">Ortopedico:(En desarrollo)</a></li>
							<li role="presentation"><a data-toggle="tab" href="#cita" class="ui-tabs-anchor">Citas:</a></li>
							<li role="presentation"><a data-toggle="tab" href="#crm" class="ui-tabs-anchor">C.R.M:</a></li> -->
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
										
											<tr class="active"{{--  onclick="vistarapida({{$personal->id}})" --}}>
											</tr>
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
						 		 @if(count($paciente->medico)==0)
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
						  {{-- TABLA HISTORIAL --}}
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
						{{-- TABLA HISTORIAL --}}
					

						 		

									@endif
						 		</div>
						 	</div>
						 
					{{-- HISTORIAL MEDICO --}}

					{{--  HISTORIAL OCULAR --}}
					<div class="tab-pane fade" id="ocular">
					 <div class="panel-default">
					 	<div class="panel-heading"><h4><strong>Historial Ocular:</strong></h4></div>
					 	 @if(count($paciente->ocular)==0)
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
						  <h2><strong>Ya existe Historial Ocular:</strong></h2>
						  @endif
					 </div>	
					</div>
					{{--  HISTORIAL OCULAR --}}
				</div>
					{{-- TAB-CONTENT --}}
	</div>
</div>


                     {{-- Modal Tutores --}} 
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
								{{-- Modal Tutores--}} 


						 
						 	@foreach($paciente->medico as $medico)
								{{-- Modal Historial Médico--}} 
								<div class="modal fade" id="medico_modal{{$medico->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="position: 0,0 !important; right: -200px;">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
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
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
								        <button type="button" class="btn btn-primary">Agregar</button>
								      </div>
								    </div>
								  </div>
								</div>
								{{-- Modal Historial Médico --}} 
								@endforeach


@endsection