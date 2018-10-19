@extends('layouts.blank')
@section('content')

<div class="container">
    <div class="panel panel-group">
        <div class="panel-default">
            @if(count($crms) == 0)
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        @isset($todos) 
                        <h4 style="color: red;">No hay CRMs en ese rango de fechas.</h4>
                        @else 
                        <h4>Aún no hay CRMs registrados.</h4>
                        @endisset 
                    </div>
                </div>
            </div>
            @endif
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4 form-group">
                        <label for="" class="control-label">Desde:</label>
                        <input name="fechaD" type="date" form="filtrado" class="form-control" id="fechafrom" required>
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="" class="control-label">Hasta:</label>
                        <input name="fechaH" type="date" form="filtrado" class="form-control" id="fechato" required disabled>
                    </div>
                    <div class="col-sm-4 form-group text-center">
                        <form role="form" id="filtrado" method="GET" action="{{ route('fecha') }}" name="form" style="margin-top: 22px;">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary">
                                <strong>Buscar</strong>
                            </button>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Modal-crm">
                                <strong>Crear CRM</strong>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-striped table-bordered table-hover" style = "margin-bottom: 0px">
                            <tr class="info">
                                <th>Paciente</th>
                                <th>Fecha de Contacto</th>
                                <th>Hora</th>
                                <th>Teléfono Cel</th>
                                <th>Correo</th>
                                <th>Status</th>
                                <th>Fecha de Aviso</th>
                                <th>Detalle de Paciente</th>
                            </tr>
                            @foreach($crms as $crm)
                            <tr title="Has Click Aquì para ver o modificar" style="cursor: pointer" data-toggle="modal" data-target="#modal{{ $crm->id }}" class="active tupla">
                                <td>{{ $crm->paciente->nombre }} {{ $crm->paciente->appaterno }}</td>
                                <td>{{ $crm->fecha_cont }}</td>
                                <td>{{ $crm->hora }}</td>
                                @if($crm->paciente->generales != null)
                                <td>{{ $crm->paciente->generales->telcelular  }}</td>
                                <td>{{ $crm->paciente->generales->email }}</td>
                                @else
                                <td>No hay datos generales.</td>
                                <td>No hay datos generales.</td>
                                @endif
                                <td>{{ $crm->status }}</td>
                                <td>{{ $crm->fecha_aviso }}</td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" href="{{ route('pacientes.show',['id'=>$crm->paciente->id]) }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i> <strong>Ver Paciente</strong>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
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
            <form method="POST" action="{{ route('crm2.store') }}">
                <input type="hidden" name="paciente_id" value="{{ $crm->paciente->id }}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label class="control-label">Nombre:</label>
                            <input type="text" class="form-control" disabled value="{{ $crm->paciente->nombre }}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="control-label">Apellido paterno:</label>
                            <input type="text" class="form-control" disabled value="{{ $crm->paciente->appaterno }}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="control-label">Apellido materno:</label>
                            <input type="text" class="form-control" disabled value="{{ $crm->paciente->apmaterno }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label class="control-label">Forma de contacto:</label>
                            <select type="select" name="tipo_cont" class="form-control" required="">
                                <option value="">Seleccionar</option>
                                <option value="Mail">Email/Correo Electronico</option>
                                <option value="Telefono">Telefono</option>
                                <option value="Cita">Cita</option>
                                <option value="Whatsapp">Whatsapp</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="status" class="control-label">Estado:</label>
                            <select type="select" name="status" class="form-control" required="">
                                <option value="">Seleccionar</option>
                                <option value="Pendiente">Pendiente</option>
                                <option value="Cotizando">En Cotización</option>
                                <option value="Cancelado">Cancelado</option>
                                <option value="Toma_decision">Tomando decisión</option>
                                <option value="Espera">En espera</option>
                                <option value="Revisa_doc">Revisando documento</option>
                                <option value="Proceso_aceptar">Proceso de Aceptación</option>
                                <option value="Entrega">Para entrega</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="correo" class="control-label">Correo:</label>
                            <input type="email" name="correo" class="form-control" disabled value="{{ $crm->paciente->generales != null  ? $crm->paciente->generales->email : 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="telefono" class="control-label">Teléfono:</label>
                            <input type="number" name="telefono" class="form-control" disabled value="{{ $crm->paciente->generales != null  ? $crm->paciente->generales->telcasa : 'N/A' }}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="celular" class="control-label">Celular:</label>
                            <input type="number" name="celular" class="form-control" disabled value="{{ $crm->paciente->generales != null  ? $crm->paciente->generales->telcelular : 'N/A' }}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="fecha_cont" class="control-label">Fecha Contacto:</label>
                            <input type="date" name="fecha_cont" class="form-control" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="fecha_aviso" class="control-label">Fecha aviso:</label>
                            <input type="date" name="fecha_aviso" class="form-control" required="">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="hora" class="control-label">Hora:</label>
                            <input type="time" name="hora" class="form-control" required="">
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
                        <div class="col-sm-2 col-sm-offset-5 text-center">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                        <div class="col-sm-2 col-sm-offset-3 text-center">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
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
                        <label class="control-label">Nombre:</label>
                        <input type="text" class="form-control" disabled value="{{ $crm->paciente->nombre }}">
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Apellido paterno:</label>
                        <input type="text" class="form-control" disabled value="{{ $crm->paciente->appaterno }}">
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Apellido materno:</label>
                        <input type="text" class="form-control" disabled value="{{ $crm->paciente->apmaterno }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label class="control-label">Forma de contacto:</label>
                        <input type="text" class="form-control" disabled value="{{ $crm->tipo_cont }}">
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Estado:</label>
                        <input type="text" class="form-control" disabled value="{{ $crm->status }}">
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Correo:</label>
                        <input type="email" class="form-control" disabled value="{{ $crm->paciente->generales != null  ? $crm->paciente->generales->email : 'N/A' }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label class="control-label">Teléfono:</label>
                        <input type="number" class="form-control" disabled value="{{ $crm->paciente->generales != null  ? $crm->paciente->generales->telcasa : 'N/A' }}">
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Celular:</label>
                        <input type="number" class="form-control" disabled value="{{ $crm->paciente->generales != null  ? $crm->paciente->generales->telcelular : 'N/A' }}">
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Fecha Contacto:</label>
                        <input type="date" class="form-control" disabled value="{{ $crm->fecha_cont }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label class="control-label">Fecha aviso:</label>
                        <input type="date" class="form-control" disabled value="{{ $crm->fecha_aviso }}">
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Hora:</label><br>
                        <input type="text" class="form-control" disabled value="{{ $crm->hora }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label class="control-label">Acuerdos: </label>
                        <textarea rows="5" maxlength="500" class="form-control" disabled>{{ $crm->acuerdos }}</textarea>
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Comentarios: </label>
                        <textarea rows="5" maxlength="500" class="form-control" disabled>{{ $crm->comentarios }}</textarea>
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Observaciones:</label>
                        <textarea rows="5" maxlength="500" class="form-control" disabled>{{ $crm->observaciones }}</textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 col-sm-offset-5 text-center">
                        <button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#new{{ $crm->id }}">Crear Nuevo</button>
                    </div>
                    <div class="col-sm-2 col-sm-offset-3 text-center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
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
            <form role="form" id="enviadordecrm" method="POST" action="{{ route('crm2.store') }}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3 form-group">
                            <label class="control-label">Paciente:</label>
                            <select class="form-control" name="paciente_id" id="paciente_id_sel" required>
                                <option value="">Seleccionar paciente</option>
                                @foreach($pacientes as $paciente)
                                    <option value="{{$paciente->id}}">{{$paciente->nombre}} {{$paciente->appaterno}}</option>
                                @endforeach
                            </select>
                        </div>
                        @foreach($pacientes as $paciente)
                        <div id="info{{ $paciente->id }}" style="display: none;"> 
                            <div class="col-sm-3 form-group">
                                <label class="control-label">ID:</label>
                                <input type="text" name="" readonly value="{{ $paciente->identificador }}"  class="form-control">
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-sm-3 form-group">
                            <label class="control-label" for="fecha_act">Fecha Actual:</label>
                            <input type="date" class="form-control" id="fecha_act" name="fecha_act" value="{{ date('Y-m-d') }}" readonly>
                        </div>
                        <div class="col-sm-3 form-group">
                            <label class="control-label" for="fecha_aviso"><i class="fa fa-asterisk" aria-hidden="true"></i> Fecha Aviso:</label>
                            <input type="date" class="form-control" id="fecha_uno" name="fecha_aviso" required="required" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d',strtotime('+2 Months')) }}">
                        </div>
                        <div class="col-sm-3 form-group">
                            <label class="control-label" for="fecha_cont"><i class="fa fa-asterisk" aria-hidden="true"></i> Fecha siguiente contacto:</label>
                            <input type="date" class="form-control" id="fecha_dos" name="fecha_cont" required="required" min="{{ date('Y-m-d',strtotime('+2 Days')) }}" max="{{ date('Y-m-d',strtotime('+2 Months')) }}" disabled>
                        </div>
                        <div class="col-sm-3 form-group">
                            <label class="control-label" for="hora">Hora:</label>
                            <input type="text" class="form-control" id="hora" name="hora" name="hora" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 form-group">
                            <label class="control-label" for="tipo_cont">Forma de contacto:</label>
                            <select class="form-control" type="select" name="tipo_cont" id="tipo_cont" >
                                <option id="Mail" value="Mail">Email/Correo Electronico</option>
                                <option id="Telefono" value="Telefono">Telefono</option>
                                <option id="Cita" value="Cita">Cita</option>
                                <option id="Whatsapp" value="Whatsapp">Whatsapp</option>
                                <option id="Otro" value="Otro" selected="selected">Otro</option>
                            </select>
                        </div>
                        <div class="col-sm-3 form-group">
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
                    <div class="row">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-4 text-center">
                            <input type="submit" name="submit" class="btn btn-success" value="Guardar">
                        </div>
                        <div class="col-sm-2 col-sm-offset-2 text-center">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection