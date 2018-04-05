@extends('layouts.blank')
@section('content')
<div class="container">
	<div class="panel-body">
		<div class="col-lg-6">
			<form id="buscarpaciente" action="busqueda"
		onKeypress="if(event.keyCode == 13) event.returnValue = false;">
				<!-- {{ csrf_field() }} -->
			
				
				<div class="input-group" id="datos1">
					<div class="row">
						<div class="col-sm-9">
							<input type="text" list='browsers' id="paciente" name="query" class="form-control" placeholder="Buscar..." autofocus>
						</div>
						<div class="col-sm-3">
							 <a class="btn btn-info" href="{{ route('pacientes.create')}}">
							        <strong>
							   Agregar Paciente</strong>
							</a>
						</div>
						


				
					</div>
					
				</div>
			</form>
		</div>
	</div>
                   {{-- TABLA AJAX DE CLIENTES --}}
	<div id="datos" name="datos" class="jumbotron">
			<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
			<thead>
				<tr class="info">
					<th>@sortablelink('identificador','Identificador')</th>
					<th>@sortablelink('nombre','Nombre')</th>
					<th>@sortablelink('appaterno','Apellido Paterno')</th>
					<th>@sortablelink('apmaterno','Apellido Materno')</th>
					
					<th>Acciones</th>
				</tr>
			</thead>
			@foreach ($pacientes as $paciente)
				{{-- expr --}}
				<tr class="active"
				    title="Has Click Aquì para Ver"
					style="cursor: pointer"
					href="#{{$paciente->id}}"
					>
					
					<td>{{$paciente->identificador}}</td>
					<td>{{$paciente->nombre}}</td>
					<td>{{$paciente->appaterno}}</td>
					<td>{{$paciente->apmaterno}}</td>
					
					<td>
						<a class="btn btn-success btn-sm" href="{{ route('pacientes.show',['paciente'=>$paciente]) }}"><i class="fa fa-eye" aria-hidden="true"></i> 
					<strong>Ver</strong>	</a>
						<a class="btn btn-info btn-sm" href="{{ route('pacientes.edit',['paciente'=>$paciente]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
					<strong>Editar</strong>	</a>
					</td>
				</tr>
			@endforeach
		</table>
		{{ $pacientes->links() }}
	</div>
	{{-- TABLA AJAX DE CLIENTES --}}
  </div>


  			


<!-- {{--   TABLA VISTA RÀPIDA  --}}
@foreach ($pacientes as $paciente)
	{{-- expr --}}
	<div class="persona" id="{{$paciente->id}}">
		<div class="container" id="tab">
			<div role="application" class="panel panel-group" >
				<div class="panel-default">
					<div class="panel-heading"><h4>
						
						{{ucwords($paciente->nombre)}} &nbsp;&nbsp;&nbsp;&nbsp;
						{{ucwords($paciente->appaterno)}} &nbsp;&nbsp;&nbsp;&nbsp;
						{{ucwords($paciente->identificador)}}
					</h4></div>
					
				</div>
				<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
					<li role="tab" tabindex="0" aria-controls="tabs-1" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active active"><a href="#tab1{{$paciente->id}}" tabindex="-1">Datos Generales:</a></li>
					<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false"><a href="#tab2{{$paciente->id}}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-2">Datos Laborales:</a></li>
					<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tab3{{$paciente->id}}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Estudios:</a></li>
					<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tab4{{$paciente->id}}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Datos Emergencias:</a></li>
					
				</ul>



				<div class="panel-default pestana" aria-hidden="false" id="tab1{{$paciente->id}}" style="display: block;">
					<div class="panel-heading">Datos Generales:</div>
					<div class="panel-body">
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="calle">Nombre Completo:</label>
		    					<dd>{{ $paciente->nombre }}&nbsp;{{ $paciente->appaterno }}
		    					&nbsp;{{ $paciente->apmaterno }}</dd>
		    					
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numext">RFC:</label>
		    					<dd>{{ $paciente->rfc }}</dd>
		  					</div>	
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numinter">CURP:</label>
		    					<dd>{{ $paciente->curp }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="cp">Telèfono:</label>
		    					<dd>{{ $paciente->telefono }}</dd>
		  					</div>		
						</div>
						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="colonia">Colonia:</label>
		  						<dd>{{ $paciente->colonia }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="municipio">Delegación o Municipio:</label>
		  						<dd>{{ $paciente->municipio }}</dd>
		  					</div>
		  					
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="estado">Estado:</label>
		  						<dd>{{ $paciente->estado }}</dd>
		  					</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle1">Calle:</label>
		  						<dd>{{ $paciente->calle }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle2">Nùmero Exterior:</label>
		  						<dd>{{ $paciente->numext }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="referencia">Nùmero Interior:</label>
		  						<dd>{{ $paciente->numint }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="referencia">Còdigo Postal:</label>
		  						<dd>{{ $paciente->cp }}</dd>
		  					</div>
						</div>
					</div>
				</div>




				<div class="panel-default pestana" id="tab2{{$paciente->id}}">

					<div class="panel-heading">Datos Laborales:</div>

					<div class="panel-body">
						@if (count($paciente->datosLab) == 0 )
							{{-- true expr --}}
							<h3>Aun no tiene Datos Laborales</h3>
						@else
							{{-- false expr --}}
							<?php $ultimo;?>
							@foreach($paciente->datosLab as $datos)
							<?php $ultimo=$datos;?>
							@endforeach

						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="calle">ID paciente:</label>
		    					<dd>{{$paciente->identificador}}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numext">Número de Seguro Social (IMSS):</label>
		    					<dd>{{$paciente->nss}}</dd>
		  					</div>	
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numint">Número Infonavit:</label>
		    					<dd>{{$paciente->infonavit}}</dd>
		  					</div>	
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="colonia">Fecha de contratación:</label>
		  						<dd>{{$ultimo->fechacontratacion}}</dd>
		  					</div>	
						</div>

						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">

							

		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="puesto">Puesto:</label>
		  						<?php $p='NO DEFINIDO'; ?>
		  						@foreach($puestos as $puesto)
		  						@if($ultimo->puesto_id==$puesto->id)
		  						<?php $p=$puesto->nombre; ?>
		  						
		  						
		  						@endif
		  						@endforeach
		  						<dd>{{$p}}</dd>
		  					</div>

		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="area">Area:</label>
		  						<?php $a='NO DEFINIDO'; ?>
		  						@foreach($areas as $area)
		  						@if($ultimo->area_id==$area->id)
		  						<?php $a=$area->nombre; ?>
		  						
		  						@endif
		  						@endforeach
		  						<dd>{{$a}}</dd>
		  					</div>

		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="sucursal">Sucursal:</label>
		  						<?php $s='NO DEFINIDO'; ?>
		  						@foreach($sucursales as $sucursal)
		  						@if($ultimo->sucursal_id==$sucursal->id)
		  						<?php $s=$sucursal->nombre; ?>
		  						
		  						
		  						@endif
		  						@endforeach
		  						<dd>{{$s}}</dd>
		  					</div>

		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="almacen">Almacen:</label>
		  						<?php $l='NO DEFINIDO'; ?>
		  						@foreach($almacenes as $almacen)
		  						@if($ultimo->almacen_id==$almacen->id)
		  						<?php $l=$almacen->nombre; ?>

		  						@endif
		  						@endforeach
		  						<dd>{{$l}}</dd>
		  					</div>
		  					
						</div>

						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle1">Tipo de Baja:</label>
		  						<dd>{{$ultimo->tipobaja_id}}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="estado">Fecha de la baja:</label>
		  						<dd>{{$ultimo->fechabaja}}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle2">Comentarios (Baja):</label>
		  						<dd>{{$ultimo->comentariobaja}}</dd>
		  					</div>
		  					
						</div>
						@endif
					</div>
				</div>





				<div class="panel-default pestana" id="tab3{{$paciente->id}}">
					<div class="panel-heading">
						Estudios:
					</div>
					
					@if (count($paciente->estudios) == 0)
					<div class="panel-body">
						<h3>Aún no tienes Estudios Agregados</h3>
					</div>
					@endif
					@if (count($paciente->estudios) !=0)
					<div class="panel-body">
						<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
							<thead>
								<tr class="info">
									<th>Escolaridad </th>
									<th>Instituciòn</th>
									
									<th>No. de Cèdula</th>
								</tr>
							</thead>
							
								<tr class="active">

									<td>{{ $paciente->estudios->escolaridad1 }}  </td>

									<td>{{ $paciente->estudios->institucion1 }}</td>
									
									<td>{{ $paciente->estudios->cedula1 }}</td>
									
								</tr>

								<tr >

									<td>{{ $paciente->estudios->escolaridad2 }}  </td>

									<td>{{ $paciente->estudios->institucion2 }}</td>
									
									<td>{{ $paciente->estudios->cedula2 }}</td>
									
								</tr>
								</tbody>
						
						</table>
					</div>
					@endif
				</div>
				
							
				<div class="panel-default pestana" id="tab4{{$paciente->id}}">
				 	<div class="panel-heading">Datos Emergencias:</div>
				 	@if (count($paciente->emergencias) == 0)
						<div class="panel-body">
							<h3>Aún no tienes datos de Emergencias</h3>
						</div>
						@endif
						@if (count($paciente->emergencias) !=0)
				 	<div class="panel-body">
				 		<div class="col-md-12 offset-md-2 mt-3">
				 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				 			<label class="control-label" for="nombre">Tipo de Sangre:</label>
								<dd>{{$paciente->emergencias->sangre}}</dd>
				 			</div>
				 		</div>
				 		<div class="col-md-12 offset-md-2 mt-3">
				 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				 				<label class="control-label" for="web">Enfermedades:</label>
				 				<dd>{{$paciente->emergencias->enfermedades}}</dd>
				 			</div>

				 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				 				<label class="control-label" for="comentario">Alergias:</label>
				 				<dd>{{$paciente->emergencias->alergias}}</dd>
				 			</div>
				 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				 				<label class="control-label" for="fechacontacto">Contacto para Emergencias:</label>
				 				<dd>{{$paciente->emergencias->nombrecontac1}}&nbsp;
				 					{{$paciente->emergencias->telefonocontac1}}&nbsp;
				 					{{$paciente->emergencias->parentescocontac1}}&nbsp;
				 				</dd>
				 			</div>
				 		</div>
				 	</div>
				 	@endif
				</div>





			</div>
		</div>
	</div>
@endforeach
					{{--   TABLA VISTA RÀPIDA  --}} -->

  			


@endsection