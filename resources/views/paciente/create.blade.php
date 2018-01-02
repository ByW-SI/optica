@extends('layouts.blank')
@section('content')
	{{-- expr --}}
	<div class="container">
		<div class="panel panel-group">
			<div class="panel-default">
				<div class="panel-heading">
					<h4>Datos del paciente:</h4>
				</div>
				<div class="panel-body">
					<div class="form-group col-xs-3">
						<label class="control-label">Nombre:</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label">Apellido Paterno:</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label">Apellido Materno:</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label">ID:</label>
						<input class="form-control" type="text" value="001" disabled="">
					</div>
					<div class="col-xs-offset-2 form-group col-xs-3">
						<label class="control-label">Edad:</label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label">Fecha de nacimiento:</label>
						<input class="form-control" type="date">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label">Sexo:</label>
						<select class="form-control">
							<option>Masculino</option>
							<option>Femenino</option>
							<option>Otro</option>
						</select>
					</div>
					<div>
						<ul class="nav nav-pills">
							<li class="active"><a href="#tab1"  class="ui-tabs-anchor">Generales:</a></li>

							<li role="presentation" class="disabled" disabled="disabled"><a class="ui-tabs-anchor" disabled="disabled">Laborales:</a></li>

							<li role="presentation" class="disabled" disabled="disabled"><a class="ui-tabs-anchor" disabled="disabled">Estudios:</a></li>

							<li role="presentation" class="disabled" disabled="disabled"><a class="ui-tabs-anchor" disabled="disabled">Emergencias:</a></li>

							<li role="presentation" class="disabled" disabled="disabled"><a class="ui-tabs-anchor" disabled="disabled">Vacaciones:</a></li>

							<li role="presentation" class="disabled" disabled="disabled"><a class="ui-tabs-anchor" disabled="disabled">Administrativo:</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection