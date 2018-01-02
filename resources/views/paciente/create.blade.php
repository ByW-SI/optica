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
					{{-- PESTAÑAS --}}
					<div>
						<ul class="nav nav-pills">
							<li class="active"><a href="#tab1"  class="ui-tabs-anchor">Generales:</a></li>

							<li role="presentation"><a class="ui-tabs-anchor">Historial Medico:</a></li>

							<li role="presentation"><a class="ui-tabs-anchor">Ocular:</a></li>

							<li role="presentation"><a class="ui-tabs-anchor">Ortopedico:</a></li>

							<li role="presentation"><a class="ui-tabs-anchor">Citas:</a></li>

							<li role="presentation"><a class="ui-tabs-anchor">C.R.M.:</a></li>
						</ul>
					</div>
					{{-- DATOS GENERALES --}}
					<div class="panel-default">
						<div class="panel-heading"><h5>Datos Generales:</h5></div>
						<div class="panel-body">
							<div class="col-xs-offset-2 form-group col-xs-4">
								<label class="control-label">Ocupación:</label>
								<input class="form-control" type="text">
							</div>
							<div class="form-group col-xs-4">
								<label class="control-label">Convenio:</label>
								<select class="form-control">
									<option>Convenio 1</option>
									<option>Convenio 2</option>
									<option>Convenio ...</option>
								</select>
							</div>
						</div>
						<div class="panel-heading"><h6>Dirección:</h6></div>
						<div class="panel-body">
						<div class="form-group col-xs-3">
							<label class="control-label">Calle:</label>
							<input class="form-control" type="text">
						</div>
						<div class="form-group col-xs-3">
							<label class="control-label">Número Interior:</label>
							<input class="form-control" type="text">
						</div>
						<div class="form-group col-xs-3">
							<label class="control-label">Número Exterior:</label>
							<input class="form-control" type="text">
						</div>
						<div class="form-group col-xs-3">
							<label class="control-label">Codigo Postal:</label>
							<input class="form-control" type="text">
						</div>
						<div class="form-group col-xs-3">
							<label class="control-label">Delegación/Municipio:</label>
							<input class="form-control" type="text">
						</div>
						<div class="form-group col-xs-3">
							<label class="control-label">Estado:</label>
							<input class="form-control" type="text">
						</div>
						</div>
						<div class="panel-heading"><h6>Contacto:</h6></div>
						<div class="panel-body">
						<div class="form-group col-xs-4">
							<label class="control-label">Telefono Casa:</label>
							<input class="form-control" type="text">
						</div>
						<div class="form-group col-xs-4">
							<label class="control-label">Telefono Oficina:</label>
							<input class="form-control" type="text">
						</div>
						<div class="form-group col-xs-4">
							<label class="control-label">Telefono celular:</label>
							<input class="form-control" type="text">
						</div>
						<div class="form-group col-xs-4">
							<label class="control-label">Email:</label>
							<input class="form-control" type="mail">
						</div>
						<div class="col-md-12 offset-md-2 mt-3">
							<button class="btn btn-success">Guardar</button>
	  						<p><strong>*Campo requerido</strong></p>
						</div>
						</div>
						<div class="panel-heading">Tutores:</div>
						<div class="panel-body">
							<button class="btn btn-info">Agregar Tutores</button>
							<div class="container">
								
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
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection