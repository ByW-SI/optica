@extends('layouts.infoempleado')
@section('infoempleado')
	{{-- expr --}}
	<div>
		<ul class="nav nav-pills nav-justified">
			<li role="presentation" class=""><a href="{{ route('empleados.show',['empleado'=>$empleado]) }}"  class="ui-tabs-anchor">Generales:</a></li>

			<li role="presentation" class="active"><a href="{{ route('empleados.datoslaborales.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Laborales:</a></li>

			<li role="presentation" class=""><a href="{{ route('empleados.estudios.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Estudios:</a></li>

			<li role="presentation" class=""><a href="{{ route('empleados.emergencias.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Emergencias:</a></li>

			<li role="presentation" class=""><a href="{{ route('empleados.vacaciones.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Vacaciones:</a></li>

			<li role="presentation" class=""><a href="{{ route('empleados.faltas.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Administrativo:</a></li>
		</ul>
	</div>
	<div class="panel-default">
		<div class="panel-heading"><h5>Laborales:
		&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</h5></div>
		<div class="panel-body">
			@if ($edit == true)
				{{-- true expr --}}

		
				<form role="form" method="POST" action="{{ route('empleados.datoslaborales.store',['empleado'=>$empleado]) }}">

				{{ csrf_field() }}
			@else
				{{-- false expr --}}
			<form role="form" method="POST" action="{{ route('empleados.datoslaborales.store',['empleado'=>$empleado]) }}">
				{{ csrf_field() }}
			@endif
				<input type="hidden" name="empleado_id" value="{{$empleado->id}}">
				<div class="col-md-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="fechacontratacion"><i class="fa fa-asterisk" aria-hidden="true"></i>Fecha de contratación:</label>
						<input class="form-control" 
						       type="date" 
						       id="fechacontratacion" 
						       name="fechacontratacion" 
						       value="{{ $datoslab->fechacontratacion }}" 
						       required
						       @if ($edit == true)
						       readonly
						       @else
						       @endif>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="contrato">Tipo de contrato:</label>
						<div class="input-group">
						<span class="input-group-addon" id="basic-addon3" onclick='getContratos()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
						<select type="select" class="form-control" name="contrato_id" id="contrato_id" >
							<option  value="">Sin Definir</option>
							@foreach ($contratos as $contrato)
								{{-- expr --}}
								<option id="{{$contrato->id}}" value="{{$contrato->id}}" @if ($datoslab->contrato_id == $contrato->id)
									{{-- expr --}}
									selected="selected" 
								@endif>{{$contrato->nombre}}</option>
							@endforeach
						</select>
					   </div>
					</div>



					<div class="form-group col-xs-3">
						<label class="control-label" for="area_id">
						Área:</label>
						<div class="input-group">
  						<span class="input-group-addon" id="basic-addon3" onclick='getAreas()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
						<select type="select" 
						        class="form-control" 
						        name="area_id" id="area_id"
						        >
						        <option  value="">Sin Definir</option>
 
							@foreach ($areas as $area)
								{{-- expr --}}
								<option id="{{$area->id}}" 
									    value="{{$area->id}}" 
							@if ($datoslab->area_id == $area->id)
									{{-- expr --}}
									selected="selected" 
								@endif>{{$area->nombre}}</option>
							@endforeach
						</select>
					  </div>
					</div>


					
					<div class="form-group col-xs-3">
						<label class="control-label" for="puesto_id">
						Puesto:</label>
						<div class="input-group">
  						<span class="input-group-addon" id="basic-addon3" onclick='getPuestos()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
						<select type="select" name="puesto_id" id="puesto_id" class="form-control" >
							<option  value="">Sin Definir</option>
							@foreach ($puestos as $puesto)
								{{-- expr --}}
								<option id="{{$puesto->id}}" 
									    value="{{$puesto->id}}" 
									    
							@if ($datoslab->puesto_id == $puesto->id)
									{{-- expr --}}
									selected
								@endif>{{$puesto->nombre}}</option>
							@endforeach
						</select>
						</div>
					</div>


					@if ($empleado->datosLab->count() == 0)
						{{-- true expr --}}
						<div class="form-group col-xs-3">
							<label class="control-label" for="contrato">Sucursal:</label>
							<br>
							<div class="input-group">
		  						<dd>{{$empleado->sucursal->nombre}}</dd>
							</div>
						</div>
					@else
						{{-- false expr --}}
						<div class="form-group col-xs-3">
							<label class="control-label" for="contrato">Sucursal:</label>
							<div class="input-group">
		  						<span class="input-group-addon" id="basic-addon3" onclick='getSucursal()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
								<select type="select" class="form-control" name="sucursal_id" id="sucursal_id" required>
									<option  value="">Sin Definir</option>
									@foreach ($sucursales as $sucursal)
										
										<option id="{{$sucursal->id}}" value="{{$sucursal->id}}" @if ($datoslab->sucursal_id == $sucursal->id)
											
											selected="selected" 
										@endif>{{$sucursal->nombre}}</option>
									@endforeach
								</select>
							</div>
						</div>
					@endif
						<div class="form-group col-xs-3">
						<label class="control-label" for="contrato">Almacen:</label>
						<div class="input-group">
  						<span class="input-group-addon" id="basic-addon3" onclick='getAlmacen()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
						<select type="select" class="form-control" name="almacen_id" id="almacen_id">
							<option  value="">Sin Definir</option>
							@foreach ($almacenes as $almacen)
								{{-- expr --}}
								<option id="{{$almacen->id}}" value="{{$almacen->id}}" @if ($datoslab->almacen_id == $almacen->id)
									{{-- expr --}}
									selected="selected" 
								@endif>{{$almacen->nombre}}</option>
							@endforeach
						</select>
					  </div>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="lugartrabajo">Lugar de Trabajo:</label>
						<select type="select" name="lugartrabajo" class="form-control" id="lugartrabajo" value="{{ $datoslab->lugartrabajo }}">
							<option id="1" value="Oficinas" @if ($datoslab->lugartrabajo == "Oficinas")
								{{-- expr --}}
								selected="selected" 
							@endif>Oficinas</option>
							<option id="2" value="Campo" @if ($datoslab->lugartrabajo == "Campo")
								{{-- expr --}}
								selected="selected" 
							@endif>Campo</option>
						</select>
					</div>


				</div>
				<div class="col-md-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="salarionom"><i class="fa fa-asterisk" aria-hidden="true"></i>Salario Nóminal:</label>
						<input class="form-control" type="text" id="salarionom" name="salarionom" value="{{ $datoslab->salarionom }}" required>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="salariodia">Salario Diario:</label>
						<input class="form-control" type="text" id="salariodia" name="salariodia" value="{{ $datoslab->salariodia }}">
					</div>
					
					<div class="form-group col-xs-3">
						<label class="control-label" for="periodopaga">Periodicidad de Pago:</label>
						<select type="select" class="form-control" name="periodopaga" id="periodopaga">
							<option id="1" value="Semanal" @if ($datoslab->periodopaga == "Semanal")
								{{-- expr --}}
								selected="selected" 
							@endif>Semanal</option>
							<option id="2" value="Quincenal" @if ($datoslab->periodopaga == "Quincenal")
								{{-- expr --}}
								selected="selected" 
							@endif>Quincenal</option>
							<option id="3" value="Mensual" @if ($datoslab->periodopaga == "Mensual")
								{{-- expr --}}
								selected="selected" 
							@endif>Mensual</option>
						</select>
					</div>
				</div>
				<div class="col-md-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="prestaciones">Prestaciones:</label>
						<select class="form-control" type="select" name="prestaciones" id="prestaciones">
							<option id="1" value="De Ley" @if ($datoslab->prestaciones == "De Ley")
								{{-- expr --}}
								selected="selected" 
							@endif>De Ley</option>
						</select>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="regimen">Régimen de Contratación:</label>
						<select class="form-control" type="select" name="regimen" id="regimen" value="{{ $datoslab->regimen }}">
							<option id="1" value="Sueldos y Salarios" @if ($datoslab->regimen == "Sueldos y Salarios")
								{{-- expr --}}
								selected="selected" 
							@endif>Sueldos y Salarios</option>
							<option id="2" value="Jubilados" @if ($datoslab->regimen == "Jubilados")
								{{-- expr --}}
								selected="selected" 
							@endif>Jubilados</option>
							<option id="3" value="Pensionados" @if ($datoslab->regimen == "Pensionados")
								{{-- expr --}}
								selected="selected" 
							@endif>Pensionados</option>
						</select>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="hentrada">Hora de Entrada:</label>
						<input class="form-control" type="text" id="hentrada" name="hentrada" value="{{ $datoslab->hentrada }}">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="hsalida">Hora de Salida:</label>
						<input class="form-control" type="text" id="hsalida" name="hsalida" value="{{ $datoslab->hsalida }}">
					</div>
				</div>
				<div class="col-md-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="hcomida">Tiempo de Comida:</label>
						<select class="form-control" type="select" name="hcomida" id="hcomida" value="{{ $datoslab->hcomida }}">
							<option id="1" value="0 min" @if ($datoslab->hcomida == "0 min")
								{{-- expr --}}
								selected="selected" 
							@endif>0 min.</option>
							<option id="2" value="30 min" @if ($datoslab->hcomida == "30 min")
								{{-- expr --}}
								selected="selected" 
							@endif>30 min.</option>
							<option id="3" value="45 min" @if ($datoslab->hcomida == "45 min")
								{{-- expr --}}
								selected="selected" 
							@endif>45 min.</option>
							<option id="4" value="60 min" @if ($datoslab->hcomida == "60 min")
								{{-- expr --}}
								selected="selected" 
							@endif>60 min.</option>
							<option id="5" value="1 hr 15 min" @if ($datoslab->hcomida == "1 hr 15 min")
								{{-- expr --}}
								selected="selected" 
							@endif>1 hr 15 min.</option>
							<option id="6" value="1 hr 30 min" @if ($datoslab->hcomida == "1 hr 30 min")
								{{-- expr --}}
								selected="selected" 
							@endif>1 hr 30 min.</option>
							<option id="7" value="2 hrs" @if ($datoslab->hcomida == "2 hrs")
								{{-- expr --}}
								selected="selected" 
							@endif>2 hrs.</option>
							<option id="8" value="2 hrs 30 min" @if ($datoslab->hcomida == "2 hrs 30 min")
								{{-- expr --}}
								selected="selected" 
							@endif>2 hrs 30 min.</option>
							<option id="9" value="3 hrs" @if ($datoslab->hcomida == "3 hrs")
								{{-- expr --}}
								selected="selected" 
							@endif>3 hrs.</option>
						</select>
					</div>
									
					<div class="form-group col-xs-3">
						<label class="control-label" for="banco">Banco:</label>
						<div class="input-group">
  						<span class="input-group-addon" id="basic-addon3" onclick='getBancos()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
						<select class="form-control" type="select" name="banco" id="banco">
							<option value="">Sin Definir</option>
							@foreach ($bancos as $banco)
								{{-- expr --}}
								<option id="{{$banco->nombre}}" value="{{$banco->nombre}}" @if ($datoslab->banco == $banco->nombre)
									{{-- expr --}}
									selected="selected" 
								@endif>{{$banco->nombre}}</option>
							@endforeach
						</select>
					  </div>
					</div>

					<div class="form-group col-xs-3">
						<label class="control-label" for="cuenta">Cuenta:</label>
						<input class="form-control" type="text" id="cuenta" name="cuenta" value="{{ $datoslab->cuenta }}">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="clabe">CLABE:</label>
						<input class="form-control" type="clabe" name="clabe" id="clabe" value="{{ $datoslab->clabe }}">
					</div>
				
					<!-- <div class="form-group col-xs-3">
						<label class="control-label" for="bonopuntualidad" id="lbl_inst2">Bono Puntualidad:</label>
						<input id="boton-toggle" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios" name="bonopuntualidad" @if ($datoslab->bonopuntualidad == 1)
							
							checked="checked"
						@endif>
					</div> -->
				</div>
				<div class="panel">
					<div class="panel-heading">Datos de Baja:</div>
					<div class="col-md-12 offset-md-2 mt-3">
						<div class="form-group col-xs-3">
							<label class="control-label" for="fechabaja">Fecha de la baja:</label>
							<input class="form-control" type="date" id="fechabaja" name="fechabaja" value="{{ $datoslab->fechabaja }}">
						</div>

						<div class="form-group col-xs-3">
							<label class="control-label" for="tipobaja_id">Tipo de Baja:</label>
							<div class="input-group">
  							<span class="input-group-addon" id="basic-addon3" onclick='getBajas()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
							<select class="form-control" type="select" name="tipobaja_id" id="tipobaja_id">
								<option id="0" value="">No hay baja</option>
								@foreach ($bajas as $baja)
									{{-- expr --}}
									<option id="{{$baja->id}}" value="{{$baja->id}}" @if ($datoslab->tipobaja_id == $baja->id)
										{{-- expr --}}
										selected="selected" 
									@endif>{{ $baja->nombre }}</option>
								@endforeach
							</select>
						  </div>
						</div>

						<div class="form-group col-xs-3">
							<label class="control-label" for="comentariobaja">Comentarios:</label>
							<textarea class="form-control" id="comentariobaja" name="comentariobaja" maxlength="500">{{$datoslab->comentariobaja}}</textarea>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-success">
			<strong>Guardar</strong>	
			</button>
				
			</form>
		</div>
	</div>
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
	<script type="text/javascript">
		function getAreas()
		{
		  $.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		  });
		  $.ajax({
		    url: "{{ url('/getareas') }}",
		    type: "GET",
		    dataType: "html",
		  }).done(function(resultado){
		    $("#area_id").html(resultado);
		  });
		}
		function getContratos(){
			$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
			});
			$.ajax({
				url: "{{ url('/getcontratos') }}",
			    type: "GET",
			    dataType: "html",
			}).done(function(resultado){
			    $("#contrato_id").html(resultado);
			});
		}
		function getPuestos(){
			$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
			});
			$.ajax({
				url: "{{ url('/getpuestos') }}",
			    type: "GET",
			    dataType: "html",
			}).done(function(resultado){
			    $("#puesto_id").html(resultado);
			});
		}
		function getBajas(){
			$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
			});
			$.ajax({
				url: "{{ url('/getbajas') }}",
			    type: "GET",
			    dataType: "html",
			}).done(function(resultado){
			    $("#tipobaja_id").html(resultado);
			});
		}
		function getBancos(){
			$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
			});
			$.ajax({
				url: "{{ url('/getbancos') }}",
			    type: "GET",
			    dataType: "html",
			}).done(function(resultado){
			    $("#banco").html(resultado);
			});
		}

		function getSucursal(){
			$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
			});
			$.ajax({
				url: "{{ url('/getsucursal') }}",
			    type: "GET",
			    dataType: "html",
			}).done(function(resultado){
			    $("#sucursal_id").html(resultado);
			});
		}

		function getAlmacen(){
			$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
			});
			$.ajax({
				url: "{{ url('/getalmacen') }}",
			    type: "GET",
			    dataType: "html",
			}).done(function(resultado){
			    $("#almacen_id").html(resultado);
			});
		}

	</script>
@endsection