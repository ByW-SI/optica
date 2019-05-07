@if(count($crms) > 0)
    <div class="col-sm-12">
        <table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px">
            <tr class="info">
                <th>Identificador</th>
                <th>Paciente</th>
                <th>Fecha de Contacto</th>
                <th>Hora</th>
                <th>Teléfono Celular</th>
                <th>Correo</th>
                <th>Status</th>
                <th>Acción</th>
            </tr>
            @foreach($crms as $crm)
                <tr>
                    <td>{{ $crm->paciente->identificador }}</td>
                    <td>{{ $crm->paciente->nombre }} {{ $crm->paciente->appaterno }}</td>
                    <td>{{ date("d/m/Y", strtotime($crm->fecha_cont)) }}</td>
                    <td>{{ $crm->hora }}</td>
                    <td>{{ $crm->paciente->generales ? $crm->paciente->generales->telcelular : 'N/A' }}</td>
                    <td>{{ $crm->paciente->generales ? $crm->paciente->generales->email : 'N/A' }}</td>
                    <td>{{ $crm->status }}</td>
                    <td class="text-center">
                        <a data-toggle="modal" data-target="#modal{{ $crm->id }}" class="btn btn-sm btn-default">
                            <i class="fa fa-info-circle"></i> Detalles
                        </a>
                        <a data-toggle="modal" data-target="#new{{ $crm->id }}" class="btn btn-sm btn-success">
                            <i class="fa fa-plus"></i> Nuevo
                        </a>
                        <a class="btn btn-primary btn-sm" href="{{ route('pacientes.show',['id'=>$crm->paciente->id]) }}">
                            <i class="fa fa-eye" aria-hidden="true"></i> Ver
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@else
    <div class="col-sm-12">
        <h4>No hay CRMs disponibles.</h4>
    </div>
@endif