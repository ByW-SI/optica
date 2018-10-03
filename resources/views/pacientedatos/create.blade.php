@extends('layouts.infopaciente')
@section('infopaciente')
						

@if ($edit)
<form role="form" method="POST" action="{{ route('pacientes.datosgenerales.update',['paciente'=>$paciente,'datosgenerale'=>$paciente->generales]) }}">
	{{ csrf_field() }}
	<input type="hidden" name="_method" value="PUT">
@else
<form role="form" method="POST" action="{{ route('pacientes.datosgenerales.store',['paciente'=>$paciente]) }}">
	{{ csrf_field() }}
@endif
	<div class="panel-default">
		<div class="panel-heading">
			<h5>Datos Generales: <small><i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</small></h5>
		</div>
		<div class="panel-body">
			<input type="hidden" name="paciente_id" value="{{$paciente->id}}" id="paciente_id">	
			<div class="row">
				<div class="col-sm-3">
					<label class="control-label"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Ocupación:</label>
					<input class="form-control" type="text" name="ocupacion" 
					@if ($edit == true)
					value="{{$paciente->generales->ocupacion}}"
					@endif required>
				</div>
				<div class="col-sm-3">
					<label class="control-label"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Convenio:</label>
					<select class="form-control" name="convenio" required>
						<option value="">Seleccionar</option>
						@if(count($convenios) != 0)
						@foreach($convenios as $convenio)
						<option value="{{ $convenio->nombre }}{{ $convenio->razonsocial }}"<?php echo $paciente->generales != null && ($paciente->generales->convenio == $convenio->nombre || $paciente->generales->convenio == $convenio->razonsocial)? ' selected' : '' ?>>{{ $convenio->razonsocial }}{{ $convenio->nombre }}</option>
						@endforeach
						<option value="Particular"<?php echo $paciente->generales != null && $paciente->generales->convenio == 'Particular' ? ' selected' : '' ?>>Particular</option>
						@endif
					</select>
				</div>
				<div class="col-sm-3">
					<label class="control-label">Número de Trabajo:</label>
					<input class="form-control" type="text" name="trabajo" value="{{ $paciente->generales != null ? $paciente->generales->trabajo : '' }}">
				</div>
				<div class="col-sm-3">
					<label class="control-label">Número de Servicio:</label>
					<input class="form-control" type="text" name="servicio" value="{{ $paciente->generales != null ? $paciente->generales->servicio : '' }}">
				</div>
			</div>
		</div>
		<div class="panel-heading">
			<h5>Dirección: <small><i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</small></h5>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="form-group col-sm-3">
					<label class="control-label"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Calle:</label>
					<input class="form-control" type="text" name="calle" 
					@if ($edit == true)
						value="{{$paciente->generales->calle}}"
						@endif required>
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label">Número Interior:</label>
					<input class="form-control" type="text" name="numint" 
					@if ($edit == true)
						value="{{$paciente->generales->numint}}"
						@endif>
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Número Exterior:</label>
					<input required class="form-control" type="text" 
					name="numext"

					@if ($edit == true)
						value="{{$paciente->generales->numext}}"
						@endif>
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label">Código Postal:</label>
					<input class="form-control" type="text" name="cp"
					@if ($edit == true)s
						value="{{$paciente->generales->cp}}"
						@endif>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-3">
					<label class="control-label"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Delegación/Municipio:</label>
					<input class="form-control" type="text" name="municipio"
					@if ($edit == true)
						value="{{$paciente->generales->municipio}}"
						@endif required>
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Estado:</label>
					<input class="form-control" type="text" name="estado"
					@if ($edit == true)
						value="{{$paciente->generales->estado}}"
						@endif required>
				</div>
			</div>
		</div>
		<div class="panel-heading">
			<h5>Contacto: <small><i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</small></h5>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="form-group col-sm-3">
					<label class="control-label"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Telefono Casa:</label>
					<input class="form-control" type="text" name="telcasa"
					@if ($edit == true)
						value="{{$paciente->generales->telcasa}}"
						@endif required>
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Teléfono Oficina:</label>
					<input class="form-control" type="text" name="teloficina"
					@if ($edit == true)
						value="{{$paciente->generales->teloficina}}"
						@endif required>
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Teléfono Celular:</label>
					<input class="form-control" type="text" name="telcelular"
					@if ($edit == true)
						value="{{$paciente->generales->telcelular}}"
						@endif required>
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> E-mail:</label>
					<input class="form-control" type="mail" name="email"
					@if ($edit == true)
						value="{{$paciente->generales->email}}"
						@endif required>
				</div>
				<div class="row">
					<div class="col-sm-12 text-center">
						<button id="submit" type="submit" class="btn btn-success">
								<strong>Guardar</strong>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

@endsection