<div class="panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-sm-3">
				<h4>Datos del Convenio:</h4>
			</div>
			<div class="col-sm-3 text-center">
				<a class="btn btn-warning" href="{{ route('convenios.edit', ['convenio' => $convenio]) }}">
					<i class="fa fa-pencil"></i><strong> Editar Convenio</strong>
				</a>
			</div>
			<div class="col-sm-3 text-center">
				<a class="btn btn-success" href="{{ route('convenios.create')}}">
					<i class="fa fa-plus"></i><strong> Agregar Convenio</strong>
				</a>
			</div>
			<div class="col-sm-3 text-center">
				<a class="btn btn-primary" href="{{ route('convenios.index') }}">
					<i class="fa fa-bars"></i><strong> Lista de Convenios</strong>
				</a>
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
			@if($convenio->tipopersona == "Fisica")
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
			@else
				<div class="form-group col-sm-3">
					<label class="control-label" for="razonsocial">Razon Social:</label>
					<dd>{{ $convenio->razonsocial }}</dd>
				</div>
			@endif
		</div>
	</div>
</div>