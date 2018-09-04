<div class="panel-default">
	<div class="panel-heading">
		<h5><strong>Datos Generales:</strong></h5>
	</div>
	@if($paciente->generales == null)
	<div class="panel-body">
		<div class="row">
			<div class="col-sm-9">
				<h2><strong>Aun no se han agregado los Datos Generales:</strong></h2>
			</div>
			<div class="col-sm-3">
				<br>
				<a class="btn btn-primary" href="{{ route('pacientes.datosgenerales.create', ['paciente'=>$paciente]) }}"><strong>Agregar</strong></a>
			</div>
		</div>
		<br>
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
				<a id="modificar" class="btn btn-primary" href="{{ route('pacientes.datosgenerales.edit',['paciente'=>$paciente,'datosgenerale'=>$paciente->generales]) }}">
				<strong>Modificar</strong></a>
			</div>
		</div>		
	</div>
	<div class="panel-heading">
		<h5><strong>Dirección:</strong></h5>
	</div>
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
		</div>
		<br>
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
	<div class="panel-heading">
		<h5><strong>Contacto:</strong></h5>
	</div>
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
		</div>
		<br>
	</div>
	<div class="panel-heading">
		<h5><strong>Tutores:</strong></h5>
	</div>
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
					<td>
						<div class="row">
							<div class="col-sm-3">
								<button class="btn btn-warning" data-toggle="modal" data-target="#tutor_{{$tutor->id}}">
									<strong>Editar</strong>
								</button>
							</div>
							<div class="col-sm-3">
								<button class="btn btn-danger">
									<strong>Eliminar</strong>
								</button>
							</div>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@endif
</div>