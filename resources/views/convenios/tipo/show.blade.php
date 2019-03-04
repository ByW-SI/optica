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
						<h5>Tipo de Convenio: <small><i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</h5></small>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
						<div class="form-group col-sm-3">
							<label class="control-label" for="desc_prod"> Número de tramites</label>
							<div class="input-group">
								<span class="input-group-addon">#</span><label type="number" class="form-control" id="num_tramites" name="num_tramites">{{$tipoconvenio->num_tramites}}</label>
							</div>
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="desc_prod"> Monto</label>
							<div class="input-group">
								<span class="input-group-addon">$</span><label type="number" class="form-control" id="monto" name="monto">{{$tipoconvenio->monto}}</label>
							</div>
						</div>
					</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="desc_prod"> Descuento por producto:</label>
						<div class="input-group">
							<label type="number" class="form-control" id="desc_prod" name="desc_prod">{{$tipoconvenio->desc_prod}}</label><span class="input-group-addon">%</span>
						</div>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="num_prod"> Número de producto(s) por año:</label>
						<div class="input-group">
							<span class="input-group-addon">#</span><label type="number" class="form-control" id="num_prod" name="num_prod">{{$tipoconvenio->num_prod}}</label>
						</div>
					</div>
					<div class="form-group col-sm-6">
						<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i> Nombre del convenio:</label>
							<textarea class="form-control" name="nombre" id="nombre" readonly="">{{$tipoconvenio->nombre}}</textarea>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="desc_cita"> Descuento por cita:</label>
						<div class="input-group">
							<label type="number" class="form-control" id="desc_cita" name="desc_cita">{{$tipoconvenio->desc_cita}}</label><span class="input-group-addon">%</span>
						</div>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="num_cita"> Número de cita(s) por año:</label>
						<div class="input-group">
						<span class="input-group-addon">#</span><label type="number" class="form-control" id="num_cita" name="num_cita">{{$tipoconvenio->num_cita}}</label></div>
					</div>
					<div class="form-group col-sm-6">
						<label class="control-label" for="descripcion"><i class="fa fa-asterisk" aria-hidden="true"></i> Descripción del convenio:</label>
						<textarea class="form-control" name="descripcion" id="descripcion" readonly="">{{$tipoconvenio->descripcion}}</textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="valido_inicio"> Valido de:</label>
						<label type="date" class="form-control" id="valido_inicio" name="valido_inicio">{{$tipoconvenio->valido_inicio}}</label>
					</div>
					<div class="col-sm-3">
						<label class="control-label" for="valido_fin"> Valido hasta:</label>
						<label type="date" class="form-control" id="valido_fin" name="valido_fin">{{$tipoconvenio->valido_fin}}</label>
					</div>
					<div class="col-sm-3">
						<label class="control-label" for="aplican"> ¿A quién aplica?:</label>
						<label type="text" class="form-control" id="aplican" name="aplican">{{$tipoconvenio->aplican}}</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 text-center">
						<h5><a href="{{ route('convenios.tipoconvenios.edit', ['convenio' => $convenio, 'tipoconvenio' => $tipoconvenio]) }}" class="btn btn-warning"><strong>Editar</strong></a></h5>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px">
							<tr class="info">
								<th>Nombre</th>
								<th>Descuento</th>
								<th>Numero de citas y productos (por año)</th>
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
									{{ $tipo_convenio->num_cita ? $tipo_convenio->num_cita.' citas' : '' }}</td>
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
		</h5>
	</div>
@endsection