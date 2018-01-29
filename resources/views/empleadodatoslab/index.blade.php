@extends('layouts.infoempleado')
@section('infoempleado')

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


	@if (count($datoslab) == 0)
			<h3>Aún no tienes historial laboral</h3>
		@endif
		@if (count($datoslab) !=0)
            
			
<div class="panel panel-default">
      <div class="panel-heading" align="center"><strong>Datos Laborales Actuales</strong></div>
      <div class="panel-body" >

      	<div class="col-md-12 offset-md-2 mt-3"> 

				<div class="form-group col-xs-3">
					<label class="control-label" for="fechacontratacion">Fecha de contratación:</label>
					
					<dd><strong> {{ $actual->fechacontratacion }}</strong></dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="contrato">Tipo de contrato:</label>
					@if($contrato==null)
					<dd>NO DEFINIDO</dd>
					@else
					<dd>{{ $contrato->nombre }}</dd>
					@endif
				</div>

                <div class="form-group col-xs-3">
					<label class="control-label" for="area">Área:</label>
					@if($area==null)
					<dd>NO DEFINIDO</dd>
					@else
					<dd>{{ $area->nombre }}</dd>
					@endif
					
				</div>
				
				<div class="form-group col-xs-3">
					<label class="control-label" for="puesto">Puesto:</label>
					@if($puesto==null)
					<dd>NO DEFINIDO</dd>
					@else
					<dd>{{ $puesto->nombre }}</dd>
					@endif
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="sucursal">Sucursal:</label>
					@if($sucursal==null)
					<dd>NO DEFINIDO</dd>
					@else
					<dd>{{ $sucursal->nombre }}</dd>
					@endif
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="almacen">almacen:</label>
					@if($almacen==null)
					<dd>NO DEFINIDO</dd>
					@else
					<dd>{{ $almacen->nombre }}</dd>
					@endif
				</div>
				



			</div>
			<div class="col-md-12 offset-md-2 mt-3">
				<div class="form-group col-xs-3">
					<label class="control-label" for="salarionom">Salario Nóminal:</label>
					<dd>{{ $actual->salarionom }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="salariodia">Salario Diario:</label>
					<dd>{{ $actual->salariodia }}</dd>
				</div>

				

				<div class="form-group col-xs-3">
					<label class="control-label" for="periodopaga">Periodicidad de Pago:</label>
					<dd>{{ $actual->periodopaga }}</dd>
				</div>
			</div>
			<div class="col-md-12 offset-md-2 mt-3">
				<div class="form-group col-xs-3">
					<label class="control-label" for="prestaciones">Prestaciones:</label>
					<dd>{{ $actual->prestaciones }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="regimen">Régimen de Contratación:</label>
					<dd>{{ $actual->regimen }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="hentrada">Hora de Entrada:</label>
					<dd>{{ $actual->hentrada }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="hsalida">Hora de Salida:</label>
					<dd>{{ $actual->hsalida }}</dd>
				</div>
			</div>
			<div class="col-md-12 offset-md-2 mt-3">
				<div class="form-group col-xs-3">
					<label class="control-label" for="hcomida">Tiempo de Comida:</label>
					<dd>{{ $actual->hcomida }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="lugartrabajo">Lugar de Trabajo:</label>
					<dd>{{ $actual->lugartrabajo }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="banco">Banco:</label>
					<dd>{{ $actual->banco }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="cuenta">Cuenta:</label>
					<dd>{{ $actual->cuenta }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="clabe">CLABE:</label>
					<dd>{{ $actual->clabe }}</dd>
				</div>
			</div>


        <div align="right">
      	<a class="btn btn-success btn-md" href="{{ route('empleados.datoslaborales.edit',['empleado'=>$empleado,'actual'=>$actual]) }}">
				<strong>Agregar</strong>
			</a></div>

      </div>
    </div>

<div class="well well-sm" align="center"><strong>Historial Laboral</strong></div>
    <table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
				<thead>
					<tr class="info">
						<th>Área</th>
						<th>Puesto</th>
						<th>Sucursal</th>
						<th>Almacen</th>
						<th>Salario Nominal</th>
						<th>Fecha de Actualización</th>


						<th>Operaciones</th>
					</tr>
				</thead>
                <tbody>
				@foreach ($datoslab as $dato)
					<tr class="active">

 					@if($dato->area_id==null)
						<td>NO DEFINIDO</td>
						@else
						 <?php $a='';?>
							@foreach($areas as $area)
								@if($dato->area_id==$area->id)
								<?php $a=$area->nombre; ?>
								<td>{{$a}}</td>
								@endif
							@endforeach
						@endif


						@if($dato->puesto_id==null)
						<td>NO DEFINIDO</td>
						@else
						 <?php $p='';?>
							@foreach($puestos as $puesto)
								@if($dato->puesto_id==$puesto->id)
								<?php $p=$puesto->nombre; ?>
								<td>{{$p}}</td>
								@endif
							@endforeach
						@endif


 						@if($dato->sucursal_id==null)
						<td>NO DEFINIDO</td>
						@else
						 <?php $s='';?>
							@foreach($sucursales as $sucursal)
								@if($dato->sucursal_id==$sucursal->id)
								<?php $s=$sucursal->nombre; ?>
								<td>{{$s}}</td>
								@endif
							@endforeach
						@endif

						@if($dato->almacen_id==null)
						<td>NO DEFINIDO</td>
						@else
						 <?php $l='';?>
							@foreach($almacenes as $almacen)
								@if($dato->almacen_id==$almacen->id)
								<?php $l=$almacen->nombre; ?>
								<td>{{$l}}</td>
								@endif
							@endforeach
						@endif

						<td>{{$dato->salarionom}}</td>
						<td>{{$dato->fechaactualizacion}}</td>  


						<td>

							<a class="btn btn-success btn-sm" href="{{ route('empleados.datoslaborales.show',['empleado'=>$empleado,'datoslaborale'=>$dato]) }}">
						<strong>Ver</strong>	</a>

							

					</tr>
						</td>


					</tbody>
				@endforeach
			</table>
		@endif



@endsection