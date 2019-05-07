@extends('layouts.infopaciente')
@section('infopaciente')
						
<form role="form" method="POST" action="{{ route('pacientes.datosgenerales.update', ['paciente' => $paciente, 'datos' => $paciente->generales]) }}">
	{{ csrf_field() }}
	<input type="hidden" name="_method" value="PUT">
	<div class="panel-default">
		<div class="panel-heading">
			<div class="row">
				<div class="col-sm-4">
					<h5>Datos Generales:</h5>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-3 form-group">
					<label class="control-label">✱Ocupación:</label>
					<input class="form-control" type="text" name="ocupacion" required value="{{ $paciente->generales->ocupacion }}">
				</div>
				<div class="col-sm-3 form-group">
					<label class="control-label">✱Convenio:</label>
					<select class="form-control" name="convenio" required>
						<option value="">Seleccionar</option>
						@if(count($convenios) > 0)
							@foreach($convenios as $convenio)
								<option value="{{ $convenio->nombre }}{{ $convenio->razonsocial }}" {{ $paciente->generales->convenio == $convenio->nombre || $paciente->generales->convenio == $convenio->razonsocial ? 'selected' : '' }}>{{ $convenio->razonsocial }}{{ $convenio->nombre }}</option>
							@endforeach
							<option value="Particular" {{ $paciente->generales->convenio == 'Particular' ? 'selected' : '' }}>Particular</option>
						@endif
					</select>
				</div>
				<div class="col-sm-3 form-group">
					<label class="control-label">Número de Trabajo:</label>
					<input class="form-control" type="text" name="trabajo" value="{{ $paciente->generales->trabajo }}">
				</div>
				<div class="col-sm-3 form-group">
					<label class="control-label">Número de Servicio:</label>
					<input class="form-control" type="text" name="servicio" value="{{ $paciente->generales->servicio }}">
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
				<div class="form-group col-sm-3">
					<label class="control-label">✱Calle:</label>
					<input class="form-control" type="text" name="calle" required value="{{ $paciente->generales->calle }}">
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label">Número Interior:</label>
					<input class="form-control" type="text" name="numint" value="{{ $paciente->generales->numint }}">
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label">✱Número Exterior:</label>
					<input class="form-control" type="text" name="numext" required value="{{ $paciente->generales->numext }}">
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label">Código Postal:</label>
					<input class="form-control" type="text" name="cp" value="{{ $paciente->generales->cp }}">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-3">
					<label class="control-label">✱Municipio:</label>
					<input class="form-control" type="text" name="municipio" value="{{ $paciente->generales->municipio }}">
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label">✱Estado:</label>
					<input class="form-control" type="text" name="estado" value="{{ $paciente->generales->estado }}">
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
				<div class="form-group col-sm-3">
					<label class="control-label">✱Telefono Casa:</label>
					<input class="form-control" type="text" name="telcasa" value="{{ $paciente->generales->telcasa }}">
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label">✱Teléfono Oficina:</label>
					<input class="form-control" type="text" name="teloficina" required value="{{ $paciente->generales->teloficina }}">
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label">✱Teléfono Celular:</label>
					<input class="form-control" type="text" name="telcelular" required value="{{ $paciente->generales->telcelular }}">
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label">✱E-mail:</label>
					<input class="form-control" type="mail" name="email" required value="{{ $paciente->generales->email }}">
				</div>
			</div>
		</div>
		<div class="panel-footer">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4 text-center">
	  				<button type="submit" class="btn btn-success">
		  				<i class="fa fa-check-circle"></i> Guardar
		  			</button>
				</div>
				<div class="col-sm-4 text-right text-danger">
					<h5>✱Campos Requeridos</h5>
				</div>
			</div>
		</div>
	</div>
</form>

@endsection