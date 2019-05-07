@extends('layouts.blank')
@section('content')

<div class="container" id="tab">
	<div role="application" class="panel panel-group">
		@include('convenios.head')
		<ul role="tablist" class="nav nav-tabs">
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('convenios.show', ['convenio' => $convenio]) }}" class="ui-tabs-anchor" id="ui-id-3">Dirección Fisica:</a></li>
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('convenios.direccionfiscal.index', ['convenio' => $convenio]) }}" class="ui-tabs-anchor" id="ui-id-3">Dirección Fiscal:</a></li>
			<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('convenios.contactos.index', ['convenio' => $convenio]) }}" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a></li>
			<li class="active"><a href="{{ route('convenios.tipoconvenios.index', ['convenio' => $convenio]) }}" class="ui-tabs-anchor" id="ui-id-3">Tipo de Convenio:</a></li>
		</ul>
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h5>
							Tipo de Convenio: <small><i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</small>
						</h5>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<form role="form" name="conv" id="conv" method="POST" action="{{ route('convenios.tipoconvenios.store', ['convenio' => $convenio]) }}"> {{-- por agregar información --}}
					{{ csrf_field() }}
					<input type="hidden" name="convenio_id" value="{{ $convenio->id }}" required>
					<div class="row">
						<div class="form-group col-sm-3">
							<label class="control-label" for="desc_prod"> Monto</label>
							<input class="form-control" type="number" step="1" min="1" name="monto" required>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-3">
							<label class="control-label" for="desc_prod"> Descuento por producto:</label>
							<div class="input-group">
								<input type="number" class="form-control" id="desc_prod" name="desc_prod" value=""><span class="input-group-addon">%</span>
							</div>
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="num_prod"> Número de producto(s) por año:</label>
							<div class="input-group">
								<span class="input-group-addon">#</span><input type="number" class="form-control" id="num_prod" name="num_prod" value="">
							</div>
						</div>
						<div class="form-group col-sm-6">
							<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i> Nombre del convenio:</label>
							<textarea class="form-control" name="nombre" id="nombre" required=""></textarea>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-3">
							<label class="control-label" for="desc_cita"> Descuento por cita:</label>
							<div class="input-group">
								<input type="number" class="form-control" id="desc_cita" name="desc_cita" value=""><span class="input-group-addon">%</span>
							</div>
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="num_cita"> Número de cita(s) por año:</label>
							<div class="input-group">
								<span class="input-group-addon">#</span><input type="number" class="form-control" id="num_cita" name="num_cita" value="">
							</div>
						</div>
						<div class="form-group col-sm-6">
							<label class="control-label" for="descripcion"><i class="fa fa-asterisk" aria-hidden="true"></i> Descripción del convenio:</label>
							<textarea class="form-control" name="descripcion" id="descripcion"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-3">
							<label class="control-label" for="valido_inicio"> Valido de:</label>
							<input type="date" class="form-control" id="valido_inicio" name="valido_inicio" value="" required="">
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="valido_fin"> Valido hasta:</label>
							<input type="date" class="form-control" id="valido_fin" name="valido_fin" value="" required="">
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="aplican"> ¿A quién aplica?:</label>
							<input type="text" class="form-control" id="aplican" name="aplican" value="">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 text-center">
							<button type="submit" class="btn btn-success">
								<strong>Guardar</strong>
							</button>
						</div>
					</div>
				</form>
				<div class="row">
					<div class="col-sm-12">
						<table class="table table-striped table-bordered table-hover" style="margin-top: 12px; margin-bottom: 0px">
							<tr class="info">
								<th>Nombre</th>
								<th>Descuento</th>
								<th>Numero de citas y productos (por año)</th>
								<th>Monto</th>
								<th>Valido de</th>
								<th>Hasta</th>
								<th>Operacion</th>
							</tr>
							@foreach ($convenio->tipos as $tipo_convenio)
							<tr class="active" title="Haz click aquí para ver/editar" style="cursor: pointer;">
								<td>{{ $tipo_convenio->nombre }}</td>
								<td>{{ $tipo_convenio->desc_prod ? $tipo_convenio->desc_prod.'% en productos' : '' }}
									<br>
									{{ $tipo_convenio->desc_cita ? $tipo_convenio->desc_cita.'% en citas' : '' }}
								</td>
								<td>{{ $tipo_convenio->num_prod ? $tipo_convenio->num_prod.' productos' : '' }}
									<br>
									{{ $tipo_convenio->num_cita ? $tipo_convenio->num_cita.' citas' : '' }}
								</td>
								<td>{{ $tipo_convenio->monto }}</td>
								<td>{{ $tipo_convenio->valido_inicio }}</td>
								<td>{{ $tipo_convenio->valido_fin }}</td>
								<td class="text-center">
									<a class="btn btn-primary btn-sm" href="{{ route('convenios.tipoconvenios.show', ['convenio' => $convenio,'tipoconvenio' => $tipo_convenio]) }}"><i class="fa fa-eye" aria-hidden="true"></i><strong>Ver</strong></a>
									<a class="btn btn-warning btn-sm" href="{{ route('convenios.tipoconvenios.edit', ['convenio' => $convenio,'tipoconvenio' => $tipo_convenio]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><strong>Editar</strong></a>
								</td>
							</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection