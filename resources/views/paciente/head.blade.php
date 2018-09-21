<div class="panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-sm-3">
				<h4>Datos del Paciente:</h4>
			</div>
			<div class="col-sm-3 text-center">
				<a class="btn btn-success" href="{{ route('pacientes.create') }}"><strong>Nuevo Paciente</strong></a>
			</div>
			<div class="col-sm-3 text-center">
				<a class="btn btn-warning" href="{{ route('pacientes.edit',['id'=>$paciente->id]) }}"><strong>Editar Paciente</strong></a>
			</div>
			<div class="col-sm-3 text-center">
				<a class="btn btn-info" href="{{ route('pacientes.index') }}"><strong>Lista de Pacientes</strong></a>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="form-group col-sm-3">
				<label class="control-label" for="identificador">ID de Paciente:</label>
				<dd>{{ $paciente->identificador }}</dd>
			</div>
			<div class="form-group col-sm-3">
				<label class="control-label" for="appaterno">Apellido Paterno:</label>
				<dd>{{$paciente->appaterno}}</dd>
			</div>
			<div class="form-group col-sm-3">
				<label class="control-label" for="apmaterno">Apellido Materno:</label>
				<dd>{{$paciente->apmaterno}}</dd>
			</div>
			<div class="form-group col-sm-3">
				<label class="control-label" for="nombre">Nombre(s):</label>
				<dd>{{$paciente->nombre}}</dd>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-sm-3">
				<label class="control-label" for="fecha_nacimiento">Fecha de Nacimiento:</label>
				<dd>{{$paciente->fecha_nacimiento}}</dd>
			</div>
			<div class="form-group col-sm-3">
				<label class="control-label" for="edad">Edad:</label>
				<dd>{{$paciente->edad}}</dd>
			</div>
			<div class="form-group col-sm-3">
				<label class="control-label" for="sexo">Sexo:</label>
				<dd>{{$paciente->sexo}}</dd>
			</div>
		</div>
	</div>
</div>
<!-- PESTAÑAS -->
<ul class="nav nav-pills nav-justified">
	<li  role="presentation" class="active"><a data-toggle="tab" href="#generales" >Generales:</a></li>
	<li role="presentation"><a data-toggle="tab" href="#hmedico">Historial Médico:</a></li>
	<li role="presentation"><a data-toggle="tab" href="#ocular">Historial Ocular:</a></li>
	<li role="presentation"><a data-toggle="tab" href="#anteojos">Anteojos:</a></li>
	<li role="presentation"><a data-toggle="tab" href="#ortopedico" class="ui-tabs-anchor">Ortopédico:</a></li>
	<li role="presentation"><a data-toggle="tab" href="#cita" class="ui-tabs-anchor">Citas:</a></li>
	<li role="presentation"><a data-toggle="tab" href="#crm" class="ui-tabs-anchor">C.R.M:</a></li> 
</ul>