@extends('layouts.blank')
@section('content')

<div class="container">
    <div class="panel panel-group">
        <div class="panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-4">
                        <h4>CRMs:</h4>
                    </div>
                    <div class="col-sm-4 text-center">
                        <a data-toggle="modal" data-target="#Modal-crm" class="btn btn-success">
                            <i class="fa fa-plus"></i><strong> Agregar CRM</strong>
                        </a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4 form-group">
                        <label class="control-label">Desde:</label>
                        <input name="fechaD" type="date" class="form-control" id="desde">
                    </div>
                    <div class="col-sm-4 form-group">
                        <label class="control-label">Hasta:</label>
                        <input name="fechaH" type="date" class="form-control" id="hasta">
                    </div>
                    <div class="col-sm-4 form-group">
                        <label class="control-label">Identificador:</label>
                        <div class="input-group">
                            <input type="text" id="buscador" class="form-control" autofocus placeholder="Identificador">
                            <span class="input-group-btn">
                                <a class="btn btn-default" onclick="buscar()"><i class="fa fa-search"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row" id="crms">
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
                </div>
            </div>
        </div>
    </div>
</div>

@foreach($crms as $crm)
    <div class="modal fade" id="new{{ $crm->id }}" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="modal-title"><strong>Detalles del CRM</strong></h4>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('crms.store') }}">
                    <input type="hidden" name="paciente_id" value="{{ $crm->paciente->id }}">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label class="control-label">Paciente:</label>
                                <input type="text" class="form-control" disabled value="{{ $crm->paciente->nombre }} {{ $crm->paciente->appaterno }}">
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="control-label">ID:</label>
                                <input type="text" class="form-control" disabled value="{{ $crm->paciente->identificador }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label class="control-label" for="fecha_act">Fecha Actual:</label>
                                <input type="date" class="form-control" name="fecha_act" value="{{ date('Y-m-d') }}" readonly>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label class="control-label" for="fecha_aviso">✱Fecha de aviso:</label>
                                <input type="date" class="form-control" name="fecha_aviso" required="required" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+2 Months')) }}">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label class="control-label" for="fecha_cont">✱Fecha de contacto:</label>
                                <input type="date" class="form-control" name="fecha_cont" required="required" min="{{ date('Y-m-d', strtotime('+2 Days')) }}" max="{{ date('Y-m-d', strtotime('+2 Months')) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="hora" class="control-label">Hora:</label>
                                <input type="text" name="hora" class="form-control">
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="control-label">Forma de contacto:</label>
                                <select type="select" name="tipo_cont" class="form-control" required="">
                                    <option value="Mail">Email/Correo Electronico</option>
                                    <option value="Telefono">Telefono</option>
                                    <option value="Cita">Cita</option>
                                    <option value="Whatsapp">Whatsapp</option>
                                    <option value="Otro" selected="">Otro</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="status" class="control-label">Estado:</label>
                                <select type="select" name="status" class="form-control" required="">
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="Cotizando">En Cotización</option>
                                    <option value="Cancelado">Cancelado</option>
                                    <option value="Toma_decision">Tomando decisión</option>
                                    <option value="Espera">En espera</option>
                                    <option value="Revisa_doc">Revisando documento</option>
                                    <option value="Proceso_aceptar">Proceso de Aceptación</option>
                                    <option value="Entrega">Para entrega</option>
                                    <option value="Otro" selected="">Otro</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="acuerdos" class="control-label">Acuerdos:</label>
                                <textarea rows="5" name="acuerdos" maxlength="500" class="form-control"></textarea>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="comentarios" class="control-label">Comentarios:</label>
                                <textarea rows="5" name="comentarios" maxlength="500" class="form-control"></textarea>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="observaciones" class="control-label">Observaciones:</label>
                                <textarea rows="5" name="observaciones" maxlength="500" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-sm-4 text-left text-danger">
                                <h5>✱Campos Requeridos</h5>
                            </div>
                            <div class="col-sm-4 text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check"></i> Guardar
                                </button>
                            </div>
                            <div class="col-sm-4 text-right">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                    <i class="fa fa-times"></i> Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal{{ $crm->id }}" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="modal-title"><strong>Detalles del CRM</strong></h4>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label class="control-label">Paciente:</label>
                            <input type="text" class="form-control" disabled value="{{ $crm->paciente->nombre }} {{ $crm->paciente->appaterno }}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="control-label">ID:</label>
                            <input type="text" class="form-control" disabled value="{{ $crm->paciente->identificador }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label class="control-label">Fecha:</label>
                            <input type="date" class="form-control" disabled value="{{ $crm->fecha_act }}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="control-label">Fecha Contacto:</label>
                            <input type="date" class="form-control" disabled value="{{ $crm->fecha_cont }}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="control-label">Fecha aviso:</label>
                            <input type="date" class="form-control" disabled value="{{ $crm->fecha_aviso }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label class="control-label">Hora:</label><br>
                            <input type="text" class="form-control" disabled value="{{ $crm->hora }}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="control-label">Forma de contacto:</label>
                            <input type="text" class="form-control" disabled value="{{ $crm->tipo_cont }}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="control-label">Estado:</label>
                            <input type="text" class="form-control" disabled value="{{ $crm->status }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label class="control-label">Acuerdos: </label>
                            <textarea rows="5" maxlength="500" class="form-control" disabled>{{ $crm->acuerdos ? $crm->acuerdos : 'N/A' }}</textarea>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="control-label">Comentarios: </label>
                            <textarea rows="5" maxlength="500" class="form-control" disabled>{{ $crm->comentarios ? $crm->comentarios : 'N/A' }}</textarea>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="control-label">Observaciones:</label>
                            <textarea rows="5" maxlength="500" class="form-control" disabled>{{ $crm->observaciones ? $crm->observaciones : 'N/A' }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-4 text-center">
                            <button class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#new{{ $crm->id }}">
                                <i class="fa fa-plus"></i> Agregar CRM
                            </button>
                        </div>
                        <div class="col-sm-4 text-right">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <i class="fa fa-times"></i> Cerrar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

<div class="modal fade" id="Modal-crm" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="modal-title"><strong>Nuevo CRM</strong></h4>
                    </div>
                </div>
            </div>
            <form role="form" id="enviadordecrm" method="POST" action="{{ route('crms.store') }}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label class="control-label">ID:</label>
                            <div class="input-group">
                                <input type="text" id="identificador_paciente" class="form-control">
                                <span class="input-group-btn">
                                    <a class="btn btn-default" onclick="paciente()"><i class="fa fa-search"></i></a>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label class="control-label">✱Paciente:</label>
                            <select class="form-control" name="paciente_id" id="pacientes" required>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label class="control-label" for="fecha_act">Fecha Actual:</label>
                            <input type="date" class="form-control" id="fecha_act" name="fecha_act" value="{{ date('Y-m-d') }}" readonly>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label class="control-label" for="fecha_aviso">✱Fecha de aviso:</label>
                            <input type="date" class="form-control" id="fecha_uno" name="fecha_aviso" required="required" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+2 Months')) }}">
                        </div>
                        <div class="col-sm-4 form-group">
                            <label class="control-label" for="fecha_cont">✱Fecha de contacto:</label>
                            <input type="date" class="form-control" id="fecha_dos" name="fecha_cont" required="required" min="{{ date('Y-m-d', strtotime('+2 Days')) }}" max="{{ date('Y-m-d', strtotime('+2 Months')) }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label class="control-label" for="hora">Hora:</label>
                            <input type="text" class="form-control" id="hora" name="hora" name="hora" value="">
                        </div>
                        <div class="col-sm-4 form-group">
                            <label class="control-label" for="tipo_cont">Forma de contacto:</label>
                            <select class="form-control" type="select" name="tipo_cont" id="tipo_cont" >
                                <option id="Mail" value="Mail">Email/Correo Electronico</option>
                                <option id="Telefono" value="Telefono">Telefono</option>
                                <option id="Cita" value="Cita">Cita</option>
                                <option id="Whatsapp" value="Whatsapp">Whatsapp</option>
                                <option id="Otro" value="Otro" selected="selected">Otro</option>
                            </select>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label class="control-label" for="status">Estado:</label>
                            <select class="form-control" type="select" name="status" id="status" >
                                <option id="Pendiente" value="Pendiente">Pendiente</option>
                                <option id="Cotizando" value="Cotizando">En Cotización</option>
                                <option id="Cancelado" value="Cancelado">Cancelado</option>
                                <option id="Toma_decision" value="Toma_decision">Tomando decisión</option>
                                <option id="Espera" value="Espera">En espera</option>
                                <option id="Revisa_doc" value="Revisa_doc">Revisando documento</option>
                                <option id="Proceso_aceptar" value="Proceso_aceptar">Proceso de Aceptación</option>
                                <option id="Entrega" value="Entrega">Para entrega</option>
                                <option id="Otro" value="Otro" selected="selected">Otro</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label class="control-label" for="acuerdos">Acuerdos: </label>
                            <textarea class="form-control" rows="5" id="acuerdos" name="acuerdos" maxlength="500"></textarea>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label class="control-label" for="comentarios">Comentarios: </label>
                            <textarea class="form-control" rows="5" id="comentarios" name="comentarios" maxlength="500"></textarea>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label class="control-label" for="observaciones">Observaciones: </label>
                            <textarea class="form-control" rows="5" id="observaciones" name="observaciones" maxlength="500"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-4 text-left text-danger">
                            <h5>✱Campos Requeridos</h5>
                        </div>
                        <div class="col-sm-4 text-center">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check"></i> Guardar
                            </button>
                        </div>
                        <div class="col-sm-4 text-right">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <i class="fa fa-times"></i> Cerrar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">

    function paciente() {
        var identificador = $('#identificador_paciente').val();
        if(identificador.length > 2) {
            $.ajax({
                url : "{{ route('crms.pacientes') }}",
                type : "GET",
                dataType : "html",
                data : {
                    query : identificador
                },
            }).done(function(resultado){
                $("#pacientes").html(resultado);
            });
        } else
            alert('Mínimo 3 caracteres!')
    }
    
    function buscar() {
        var desde = $('#desde').val();
        var hasta = $('#hasta').val();
        var buscador = $('#buscador').val();
        $.ajax({
            url : "{{ route('crms.buscar') }}",
            type : "GET",
            dataType : "html",
            data : {
                desde : desde,
                hasta : hasta,
                query : buscador
            },
        }).done(function(resultado){
            $("#crms").html(resultado);
        });
    }

</script>

@endsection