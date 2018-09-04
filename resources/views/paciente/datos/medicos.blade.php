<div class="panel-default">
    <div class="panel-heading">
        <h4><strong>Historial Médico:</strong></h4>
    </div>
    @if($paciente->medico->count() == 0)
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-9">
                <h2><strong>Aun no se ha agregado Historial Médico:</strong></h2>
            </div>
            <div class="col-sm-3">
                <br>
                <a class="btn btn-primary" href="{{ route('pacientes.historialmedico.create',['paciente'=>$paciente]) }}">
                    <strong>Agregar</strong>
                </a>
            </div>
        </div>
        <br>
    </div>
    @else
    <!-- TABLA HISTORIAL MÉDICO -->
    <div class="panel-body">
        @include('paciente.datos.tablas.medicos')
    </div>
    @endif
</div>