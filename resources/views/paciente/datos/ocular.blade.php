<div class="panel-default">
	<div class="panel-heading">
		<h4>Historial Ocular:</h4>
	</div>
	@if($paciente->ocular->count() == 0)
	<div class="panel-body">
		<div class="row">
			<div class="col-sm-9">
				<h2><strong>Aun no se ha agregado Historial Ocular:</strong></h2>
			</div>
			<div class="col-sm-3">
				<br>
				<a class="btn btn-primary" href="{{ route('pacientes.historialocular.create',['paciente'=>$paciente]) }}">
					<strong>Agregar</strong>
				</a>
			</div>
		</div>
		<br>
	</div>
	@else
	<!-- TABLA HISTORIAL OCULAR -->
	<div class="panel-body">
		@include('paciente.datos.tablas.ocular')
	</div>
	@endif
</div>	