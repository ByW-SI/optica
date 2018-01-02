@extends('layouts.blank')
@section('content')
<div class="panel-default"  >
			<div class="panel-heading">Citas&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</div>
			<div class="panel-body" >
				<div class="panel-body">
					<form role="form" 
					      method="POST" 
					      action="">
						{{ csrf_field() }}
						<input type="hidden" name="provedor_id" value="">
						<div class="col-xs-4 col-xs-offset-10">
							
							<button id="submit" type="submit" class="btn btn-success">
						<strong>Agregar</strong>	</button>
							<a id="modificar" class="btn btn-primary" onclick="modificar()" style="display: none;">
						<strong>Modificar</strong>	</a>
							

						</div>


					<div class="col-md-12 offset-md-2 mt-3">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="fecha_act">Fecha Pròxima Cita:</label>
							<input type="date" class="form-control" id="fecha_act" name="fecha_act" value="" >
						</div>

					

						<div class="form-group col-lg-2 col-md-2 col-sm-4 col-xs-8">
							<label class="control-label" for="tipo_cont">Hora:</label>
							<select class="form-control" type="select" name="tipo_cont" id="tipo_cont" >
								<?php
								for($i=0;$i<24;$i++){

									if($i<=11){

					echo"<option id='' value='".$i.":00 am'>".$i.":00 am </option>";

									}else{
					echo"<option id='' value='".$i.":00 pm'>".$i.":00 pm </option>";
									}										


								}
								?>
								
								
							</select>
						</div>

						<div class="form-group col-lg-2 col-md-2 col-sm-4 col-xs-8">
							<label class="control-label" for="tipo_cont">Minutos:</label>
							<select class="form-control" type="select" name="tipo_cont" id="tipo_cont" >
								<?php
								for($i=0;$i<=60;$i+=15){

									

					echo"<option id='' value='".$i." mins'>

					".$i." mins </option>";

									
					
																		


								}
								?>
								
								
							</select>
						</div>


						<div class="form-group col-lg-4 col-md-2 col-sm-4 col-xs-8">
							<label class="control-label" for="tipo_cont">Sucursal:</label>
							<select class="form-control" type="select" name="tipo_cont" id="tipo_cont" >
								
								<option id="" value="" selected="selected">Sucursal 1</option>
								<option id="" value="">Sucursal 2</option>
								<option id="" value="">Sucursal 3</option>
								<option id="" value="">Sucursal 4</option>
							</select>
						</div>
						
					</div>
					<div class="col-md-12 offset-md-2 mt-3">
						

						<!-- <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
							<label class="control-label" for="comentarios">Comentarios/Observaciones: </label>
							<textarea class="form-control" rows="5" id="comentarios" name="comentarios" maxlength="500"></textarea>
						</div> -->

						
						
					</div>
						
					</form>
				</div>
				<div class="panel-body">
					<div class="col-md-6 offset-md-1 mt-1">
						<div style="
						height: 450px;
						overflow: scroll;">
							<table class="table table-striped table-bordered table-hover" 
						       style="color:rgb(51,51,51); 
						              border-collapse: collapse;
						              margin-bottom: 0px;
						              overflow: scroll;"
						       >
							<thead>
								<tr class="info">
									<th>Hora</th>
									<th>Estado</th>
									<th>No. de Citas</th>
									
									
								</tr>
							</thead>
							<tbody >
							
								<tr onclick='' 
								title='Has Click Aquì para ver o Modificar'
								style='cursor: pointer'>
									<td>12:45 pm</td>
									<td>Ocupado</td>
									<td>3</td>
									
									
								</tr>

								<?php
									for ($i=0; $i <45 ; $i++) { 
										echo"<tr onclick='' 
								title='Has Click Aquì para ver o Modificar'
								style='cursor: pointer'>
									<td>1:00 pm</td>
									<td>Libre</td>
									<td>0</td>
									
									
								</tr>";
									}
								?>
							</tbody>
						</table>
						</div>
						
						
				</div>
			  </div>
			</div>
		</div>
		@endsection