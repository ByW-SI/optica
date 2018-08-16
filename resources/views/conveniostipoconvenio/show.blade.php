@extends('layouts.infoconvenio')
@section('cliente')
	{{-- expr --}}
	<ul role="tablist" class="nav nav-tabs">
		<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('convenios.show',['convenio'=>$convenio]) }}">Dirección Fisica:</a></li>
		<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('convenios.direccionfiscal.index',['convenio'=>$convenio]) }}">Dirección Fiscal:</a></li>
		<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('convenios.contactos.index',['convenio'=>$convenio]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a></li>
		<li role="presentation" tabindex="-1" class="active" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="{{ route('convenios.tipoconvenios.index', ['convenio'=>$convenio]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Tipo de Convenio:</a></li>
		
	</ul>
	<div class="panel panel-default">
		<div class="panel-heading"> Tipo de Convenio:
		&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</div>
		<div class="panel-body">
				<div class="col-xs-offset-10">
						<a href="{{ route('convenios.tipoconvenios.edit',['convenio'=>$convenio,'tipoconvenio'=>$tipoconvenio]) }}" class="btn btn-success">
					<strong>Editar</strong>	</a>
						
				</div>
				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  					<label class="control-label" for="desc_prod"> Descuento por producto:</label>
  					<div class="input-group">
  					<label type="number" class="form-control" id="desc_prod" name="desc_prod">{{$tipoconvenio->desc_prod}}</label><span class="input-group-addon">%</span>
  					</div>
  				</div>
  				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  					<label class="control-label" for="num_prod"> Número de producto(s) por año:</label>
  					<div class="input-group">
  					<span class="input-group-addon">#</span><label type="number" class="form-control" id="num_prod" name="num_prod">{{$tipoconvenio->num_prod}}</label>
  					</div>
  				</div>
  				<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
  					<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i> Nombre del convenio:</label>
  					
  					<label class="form-control" name="nombre" id="nombre">{{$tipoconvenio->nombre}}</label>
  				</div>
  				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  					<label class="control-label" for="desc_cita"> Descuento por cita:</label>
  					<div class="input-group">
  					<label type="number" class="form-control" id="desc_cita" name="desc_cita">{{$tipoconvenio->desc_cita}}</label><span class="input-group-addon">%</span>
  					</div>
					</div>
  				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  					<label class="control-label" for="num_cita"> Número de cita(s) por año:</label>
  					<div class="input-group">
  					<span class="input-group-addon">#</span><label type="number" class="form-control" id="num_cita" name="num_cita">{{$tipoconvenio->num_cita}}</label></div>
  				</div>
  				<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
  					<label class="control-label" for="descripcion"><i class="fa fa-asterisk" aria-hidden="true"></i> Descripción del convenio:</label>
  					
  					<label class="form-control" name="descripcion" id="descripcion">{{$tipoconvenio->descripcion}}</label>
  				</div>
  				<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  					<label class="control-label" for="valido_inicio"> Valido de:</label>
  					<label type="date" class="form-control" id="valido_inicio" name="valido_inicio">{{$tipoconvenio->valido_inicio}}</label>
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  					<label class="control-label" for="valido_fin"> Valido hasta:</label>
  					<label type="date" class="form-control" id="valido_fin" name="valido_fin">{{$tipoconvenio->valido_fin}}</label>
					</div>

					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  					<label class="control-label" for="aplican"> ¿A quién aplica?:</label>
  					<label type="text" class="form-control" id="aplican" name="aplican">{{$tipoconvenio->aplican}}</label>
					</div>
  		  </div>
  					<div class="jumbotron">
  						<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
							<thead>
								<tr class="info">
									<th>Nombre</th>
									<th>Descuento</th>
									<th>Numero de citas y productos (por año)</th>
									<th>Valido de</th>
									<th>Hasta</th>
									<th>Operacion</th>
								</tr>
							</thead>
  							<tbody>
                  @foreach ($convenio->tipos as $tipo_convenio)
                    {{-- expr --}}
                    <tr class="active" title="Haz click aquí para ver/editar" style="cursor: pointer;">
                    <td>{{$tipo_convenio->nombre}}</td>
                    <td>{{$tipo_convenio->desc_prod ? $tipo_convenio->desc_prod.'% en productos' : '' }}
                      <br>
                      {{$tipo_convenio->desc_cita ? $tipo_convenio->desc_cita.'% en citas' : '' }}
                    </td>
                    <td>{{$tipo_convenio->num_prod ? $tipo_convenio->num_prod.' productos' : '' }}
                      <br>
                      {{$tipo_convenio->num_cita ? $tipo_convenio->num_cita.' citas' : '' }}</td>
                    <td>{{$tipo_convenio->valido_inicio}}</td>
                    <td>{{$tipo_convenio->valido_fin}}</td>
                    <td>
                      <a class="btn btn-success btn-sm" href="{{ route('convenios.tipoconvenios.show',['convenio'=>$convenio,'tipoconvenio'=>$tipo_convenio]) }}"><i class="fa fa-eye" aria-hidden="true"></i><strong>Ver</strong></a>

                    <a class="btn btn-info btn-sm" href="{{ route('convenios.tipoconvenios.edit',['convenio'=>$convenio,'tipoconvenio'=>$tipo_convenio]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><strong>Editar</strong></a>
                    </td>
                  </tr>
                  @endforeach							
							</tbody>
						</table>
  					</div>
	</div>
@endsection