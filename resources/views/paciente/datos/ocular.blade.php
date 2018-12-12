<div class="panel-default">
	<div class="panel-heading">
        <div class="row">
            <div class="col-sm-4">
                <h5>Historial Ocular:</h5>
            </div>
            <div class="col-sm-4 text-center">
				<a class="btn btn-success" href="{{ route('pacientes.historialocular.create', ['paciente' => $paciente]) }}">
                    <i class="fa fa-plus"></i><strong> Agregar</strong>
                </a>
            </div>
        </div>
	</div>
    <div class="panel-body">
        @if(count($paciente->ocular) > 0)
			@include('paciente.datos.tablas.ocular')
        @else
            <div class="row">
                <div class="col-sm-12">
                    <h4>Aún no se ha agregado el historial ocular.</h4>
                </div>
            </div>
        @endif
    </div>
</div>	