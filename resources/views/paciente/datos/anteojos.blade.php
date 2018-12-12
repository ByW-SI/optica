<div class="panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-sm-4">
				<h5>Anteojos:</h5>
			</div>
			<div class="col-sm-4 text-center">
				<a class="btn btn-success" href="{{ route('pacientes.anteojos.create', ['paciente' => $paciente]) }}">
					<i class="fa fa-plus"></i><strong> Agregar</strong>
				</a>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-sm-12">
				@if(count($paciente->anteojo) > 0)
					@include('paciente.datos.tablas.anteojos')
				@else
					<h4>Aún no se ha agregado el historial de anteojos.</h4>
				@endif
			</div>
		</div>
	</div>
</div>