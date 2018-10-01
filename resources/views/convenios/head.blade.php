<div class="panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-sm-3">
				<h4>Datos del Convenio:</h4>
			</div>
			<div class="col-sm-3 text-center">
				<a class="btn btn-success" href="{{ route('convenios.create')}}"><strong>Agregar Convenio</strong></a>
			</div>
			<div class="col-sm-3 text-center">
				<a class="btn btn-warning" href="{{ route('convenios.edit', ['id' => $convenio->id]) }}"><strong>Editar Convenio</strong></a>
			</div>
			<div class="col-sm-3 text-center">
				<a class="btn btn-info" href="{{ route('convenios.index') }}"><strong>Lista de Convenios</strong></a>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="form-group col-sm-3">
				<label class="control-label" for="tipopersona">Tipo de Persona:</label>
				<dd>{{ $convenio->tipopersona }}</dd>
			</div>
			<div class="form-group col-sm-3">
				<label class="control-label" for="alias">Alias:</label>
				<dd>{{ $convenio->alias }}</dd>
			</div>
			<div class="form-group col-sm-3">
				<label class="control-label" for="rfc">RFC:</label>
				<dd>{{ $convenio->rfc }}</dd>
			</div>
			<div class="form-group col-sm-3">
				<label class="control-label" for="vendedor">Vendedor:</label>
				<dd>{{ $convenio->vendedor }}</dd>
			</div>
		</div>
		@if($convenio->tipopersona == "Fisica")
		<div class="row" id="perfisica">
			<div class="form-group col-sm-3">
				<label class="control-label" for="nombre">Nombre(s):</label>
				<dd>{{ $convenio->nombre }}</dd>
			</div>
			<div class="form-group col-sm-3">
				<label class="control-label" for="apellidopaterno">Apellido Paterno:</label>
				<dd>{{ $convenio->apellidopaterno }}</dd>
			</div>
			<div class="form-group col-sm-3">
				<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
				<dd>{{ $convenio->apellidomaterno }}</dd>
			</div>
		</div>
		@else
		<div class="row" id="permoral">
			<div class="form-group col-sm-3">
				<label class="control-label" for="razonsocial">Razon Social:</label>
				<dd>{{ $convenio->razonsocial }}</dd>
			</div>
		</div>
		@endif
	</div>
</div>