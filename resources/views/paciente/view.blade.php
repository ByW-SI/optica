@extends('layouts.test')
@section('content1')

	<div class="container">
	  	<div role="application" class="panel panel-group">
			@include('paciente.head')
	  		<!-- TAB-CONTENT -->
	  		<div class="tab-content">
	  			<!-- DATOS GENERALES -->
	  			<div  class="tab-pane fade in active" id="generales">
	  				@include('paciente.datos.generales')
  				</div>
  				<!-- HISTORIAL MEDICO -->
  				<div class="tab-pane fade" id="hmedico">
	  				@include('paciente.datos.medicos')
				</div>
				<!-- HISTORIAL OCULAR -->
				<div class="tab-pane fade" id="ocular">
	  				@include('paciente.datos.ocular')
				</div>
				<!-- ANTEOJOS -->
				<div class="tab-pane fade" id="anteojos">
					@include('paciente.datos.anteojos')
				</div>
				<!-- ORTOPÉDICO -->
				<div class="tab-pane" id="ortopedico">
					@include('paciente.ortopedia')
				</div>
				<!-- CITAS -->
				<div class="tab-pane" id="cita">
					@include('paciente.datos.citas')
				</div>
				<!-- CRM -->
				<div class="tab-pane" id="crm">
					@include('paciente.datos.crm')
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Tutores -->
	@include('paciente.modals.tutor')
	<!-- Modal Historial Médico -->
	@include('paciente.modals.medico')
	<!-- Modales Historial Ocular -->
	@include('paciente.modals.ocular')
	<!-- Modales Anteojos -->
	@include('paciente.modals.anteojos')

	  										{{-- Modal Edit Tutor --}}	
	  										@foreach($paciente->tutores as $tutor)
	  										<form role="form" method="POST" action="{{ route('pacientes.tutor.update',['paciente'=>$paciente,'tutor'=>$tutor]) }}">

	  											{{ csrf_field() }}
	  											<input type="hidden" name="_method" value="PUT">

	  											<div class="modal fade" id="tutor_{{$tutor->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="position: 0,0 !important; right: -200px;">
	  												<div class="modal-dialog" role="document">
	  													<div class="modal-content">
	  														<div class="modal-header">
	  															<h5 class="modal-title" id="exampleModalLongTitle">Editarar Tutor</h5>
	  															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  																<span aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
	  															</button>
	  														</div>
	  														<div class="modal-body">
	  															<div class="panel-default">
	  																<div class="panel-heading"><h5>Tutor:</h5></div>
	  																<div class="panel-body">

	  																	<input type="hidden" name="id" value="{{$tutor->id}}">
	  																	<div class="form-group col-xs-4">
	  																		<label class="control-label">Nombre:</label>
	  																		<input class="form-control" type="text" name="nombre" value="{{$tutor->nombre}}">
	  																	</div>
	  																	<div class="form-group col-xs-4">
	  																		<label class="control-label">Apellido Paterno:</label>
	  																		<input class="form-control" type="text" name="appaterno" value="{{$tutor->appaterno}}">
	  																	</div>
	  																	<div class="form-group col-xs-4">
	  																		<label class="control-label">Apellido Materno:</label>
	  																		<input class="form-control" type="text" name="apmaterno" value="{{$tutor->apmaterno}}">
	  																	</div>
	  																	<div class="form-group col-xs-4">
	  																		<label class="control-label">Edad:(Automàtico)</label>
	  																		<input class="form-control" type="text" name="edad" value="{{$tutor->edad}}" readonly id="edad_2">
	  																	</div>
	  																	<div class="form-group col-xs-4">
	  																		<label class="control-label">Fecha de nacimiento:</label>
	  																		<input class="form-control" type="date" name="fecha_nacimiento" value="{{$tutor->fecha_nacimiento}}" id="fecha_2">
	  																	</div>
	  																	<div class="form-group col-xs-4">
	  																		<label class="control-label">Sexo:</label>
	  																		<select class="form-control" name="sexo">
	  																			<option value="Masculino"
	  																			@if($tutor->sexo=='Masculino')
	  																			selected='selected'
	  																			@endif>Masculino</option>
	  																			<option value="Femenino"
	  																			@if($tutor->sexo=='Femenino')
	  																			selected='selected'
	  																			@endif>Femenino</option>
	  																			<option value="Otro"
	  																			@if($tutor->sexo=='Otro')
	  																			selected='selected'
	  																			@endif>Otro</option>
	  																		</select>
	  																	</div>
	  																	<div class="form-group col-xs-4">
	  																		<label class="control-label">Relación con el paciente:</label>
	  																		<select class="form-control" name="relacion" id="relacion">
	  																			<option value="Padre"
	  																			@if($tutor->relacion=='Padre')
	  																			selected='selected'
	  																			@endif>Padre</option>
	  																			<option value="Madre"
	  																			@if($tutor->relacion=='Madre')
	  																			selected='selected'
	  																			@endif>Madre</option>
	  																			<option value="Tio/Tia"
	  																			@if($tutor->relacion=='Tio/Tia')
	  																			selected='selected'
	  																			@endif>Tio/Tia</option>
	  																			<option value="Abuelo/Abuela"
	  																			@if($tutor->relacion=='Abuelo/Abuela')
	  																			selected='selected'
	  																			@endif>Abuelo/Abuela</option>
	  																			<option value="Hermano/Hermana"
	  																			@if($tutor->relacion=='Hermano/Hermana')
	  																			selected='selected'
	  																			@endif>Hermano/Hermana</option>
	  																			<option value="Primos"
	  																			@if($tutor->relacion=='Primos')
	  																			selected='selected'
	  																			@endif>Primos</option>
	  																			<option value="Otros"
	  																			@if($tutor->relacion=='Otros')
	  																			selected='selected'
	  																			@endif>Otros</option>
	  																		</select>
	  																	</div>
	  																	<div class="form-group col-xs-4">
	  																		<label class="control-label">Teléfono de Casa:</label>
	  																		<input class="form-control" type="text" name="tel_casa" value="{{$tutor->tel_casa}}">
	  																	</div>
	  																	<div class="form-group col-xs-4">
	  																		<label class="control-label">Teléfono Celular:</label>
	  																		<input class="form-control" type="text" name="tel_cel" value="{{$tutor->tel_cel}}">
	  																	</div>

	  																</div>
	  															</div>
	  														</div>
	  														<div class="modal-footer">
	  															<button type="button" class="btn btn-danger" data-dismiss="modal"><strong>Cerrar</strong></button>
	  															<button type="submit" class="btn btn-primary"><strong>Guardar</strong></button>
	  														</div>
	  													</div>
	  												</div>
	  											</div></form>
	  											@endforeach
	  											{{-- Modal Edit Tutor --}}


	  											<script type="text/javascript">


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
	  														$("#sucursal").html(resultado);
	  													});
	  												}



	  											</script>

	  											@endsection