<div class="panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-sm-4">
				<h5>Datos Generales:</h5>
			</div>
			@if($paciente->generales)
			<div class="col-sm-4 text-center">
				<a id="modificar" class="btn btn-warning" href="{{ route('pacientes.datosgenerales.edit',['paciente'=>$paciente,'datosgenerale'=>$paciente->generales]) }}">
				<strong>Modificar</strong></a>
			</div>
			@endif
		</div>
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
		</div>		
	</div>
	<div class="panel-heading">
		<div class="row">
			<div class="col-sm-4">
				<h5>Dirección:</h5>
			</div>
		</div>
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
		<div class="row">
			<div class="col-sm-4">
				<h5>Contacto:</h5>
			</div>
		</div>
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
		<div class="row">
			<div class="col-sm-4">
				<h5>Tutores:</h5>
			</div>
			<div class="col-sm-4 text-center">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#formularioTutor">
					<strong>Agregar Tutores</strong>
				</button>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-sm-12">
        		@include('paciente.datos.tablas.tutores')
			</div>
		</div>
	</div>
	@endif
</div>