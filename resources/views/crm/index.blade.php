@extends('layouts.blank')
@section('content')

<script src="{{ asset('js/crm.js') }}"></script>

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
                            <tr title="Has Click Aquì para ver o modificar" style="cursor: pointer" data-toggle="modal" data-target="#myModal" class="active tupla">
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
                                <input type="hidden" name="id_paciente" value="{{ $crm->paciente->id }}">
                                <input type="hidden" name="nombre" value="{{ $crm->paciente->nombre }}">
                                <input type="hidden" name="ap" value="{{ $crm->paciente->appaterno }}">
                                <input type="hidden" name="am" value="{{ $crm->paciente->apmaterno }}">
                                @if($crm->paciente->generales != null)
                                <input type="hidden" name="correo" value="{{ $crm->paciente->generales->email }}">
                                <input type="hidden" name="telefono" value="{{ $crm->paciente->generales->telcasa }}">
                                <input type="hidden" name="celular" value="{{ $crm->paciente->generales->telcelular }}">
                                @else
                                <input type="hidden" name="correo" value="No hay datos generales.">
                                <input type="hidden" name="telefono" value="No hay datos generales.">
                                <input type="hidden" name="celular" value="No hay datos generales.">
                                @endif
                                <input type="hidden" name="fecha_cont" value="{{ $crm->fecha_cont }}">
                                <input type="hidden" name="fecha_aviso" value="{{ $crm->fecha_aviso }}">
                                <input type="hidden" name="hora" value="{{ $crm->hora }}">
                                <input type="hidden" name="status" value="{{ $crm->status }}">
                                <input type="hidden" name="tipo_cont" value="{{ $crm->tipo_cont }}">
                                <input type="hidden" name="comentarios" value="{{ $crm->comentarios }}...">
                                <input type="hidden" name="acuerdos" value="{{ $crm->acuerdos }}...">
                                <input type="hidden" name="observaciones" value="{{ $crm->observaciones }}...">
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" role="dialog">
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
                <form role="form" id="enviadordecrm" method="POST" action="{{ route('crm2.store') }}">
                    {{ csrf_field() }}
                </form>
                <div class="row">
                    <input type="hidden" name="paciente_id" id="id_paciente" form="enviadordecrm" class="form-control">
                    <input type="hidden" name="fecha_act" id="fecha_act" form="enviadordecrm" value="{{ date('Y-m-d') }}">
                    <div class="form-group col-sm-4">
                        <label for="nombre" class="control-label">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" form="enviadordecrm" class="form-control" disabled>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="ap" class="control-label">Apellido paterno:</label>
                        <input type="text" name="ap" id="ap" form="enviadordecrm" class="form-control" disabled>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="am" class="control-label">Apellido materno:</label>
                        <input type="text" name="am" id="am" form="enviadordecrm" class="form-control" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="tipo_cont" class="control-label">Forma de contacto:</label><br>
                        <select type="select" name="tipo_cont" form="enviadordecrm" id="tipo_cont" class="form-control" disabled>
                            <option id="Mail" value="Mail">Email/Correo Electronico</option>
                            <option id="Telefono" value="Telefono">Telefono</option>
                            <option id="Cita" value="Cita">Cita</option>
                            <option id="Whatsapp" value="Whatsapp">Whatsapp</option>
                            <option id="Otro" value="Otro" selected="selected">Otro</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="status" class="control-label">Estado:</label><br>
                        <select type="select" name="status" form="enviadordecrm" id="status" class="form-control" disabled>
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
                    <div class="form-group col-sm-4">
                        <label for="correo" class="control-label">Correo:</label>
                        <input type="email" name="correo" id="correo" form="enviadordecrm" class="form-control" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="telefono" class="control-label">Teléfono:</label>
                        <input type="number" name="telefono" id="telefono" form="enviadordecrm" class="form-control" disabled>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="celular" class="control-label">Celular:</label>
                        <input type="number" name="celular" id="celular" form="enviadordecrm" class="form-control" disabled>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="fecha_cont" class="control-label">Fecha Contacto:</label>
                        <input type="date" name="fecha_cont" id="fecha_cont" form="enviadordecrm" class="form-control" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="fecha_aviso" class="control-label">Fecha aviso:</label>
                        <input type="date" name="fecha_aviso" id="fecha_aviso" form="enviadordecrm" class="form-control" disabled>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="hora" class="control-label">Hora:</label><br>
                        <input type="text" name="hora" id="hora" form="enviadordecrm" class="form-control" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="acuerdos" class="control-label">Acuerdos: </label>
                        <textarea rows="5" id="acuerdos" name="acuerdos" maxlength="500" class="form-control" form="enviadordecrm" disabled></textarea>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="comentarios" class="control-label">Comentarios: </label>
                        <textarea rows="5" id="comentarios" name="comentarios" maxlength="500" class="form-control" form="enviadordecrm" disabled></textarea>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="observaciones" class="control-label">Observaciones:</label>
                        <textarea rows="5" id="observaciones" name="observaciones" maxlength="500" class="form-control" form="enviadordecrm" disabled></textarea>
                    </div>
                    <input type="hidden" id="paciente_id" name="paciente_id">
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 col-sm-offset-5 text-center">
                        <button name="vinculo" id="vinculo" class="btn btn-block btn-success">Crear Nuevo</button>
                        <button type="submit" form="enviadordecrm" name="enviador" id="enviador" style="display: none;" class="btn btn-block btn-success">Crear Nuevo</button>
                    </div>
                    <div class="col-sm-2 col-sm-offset-3 text-center">
                        <button type="button" class="btn btn-block btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                            <button type="button" class="btn btn-block btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach($pacientes as $pacientes)
<input type="hidden" id="{{$paciente->id}}" value="{{$paciente->identificador}}">
@endforeach

<script type="text/javascript">

    $(document).ready(function() {
        $("#paciente_id_sel").change(function() {
            var id = $("#paciente_id_sel").val();
            var x = document.getElementById("paciente_id_sel");
            for (i = 1; i < x.length; i++) {
                var j = x.options[i].value;
                if(j != null || j != '') {
                    name = "info" + j;
                    document.getElementById(name).style.display = 'none';
                }
            }
            nombre = "info" + id;
            document.getElementById(nombre).style.display='block';
        });
        $('#vinculo').click(function() {
            $('#tipo_cont').removeAttr('disabled');
            $('#status').removeAttr('disabled');
            $('#fecha_cont').removeAttr('disabled');
            $('#fecha_aviso').removeAttr('disabled');
            $('#comentarios').removeAttr('disabled');
            $('#observaciones').removeAttr('disabled');
            $('#acuerdos').removeAttr('disabled');
            $('#hora').removeAttr('disabled');
            $('#tipo_cont').attr('required', true);
            $('#status').attr('required', true);
            $('#fecha_cont').attr('required', true);
            $('#fecha_aviso').attr('required', true);
            $('#comentarios').attr('required', true);
            $('#observaciones').attr('required', true);
            $('#acuerdos').attr('required', true);
            $('#hora').attr('required', true);
            $('#vinculo').hide(function(){
                $('#enviador').show();
                $('#enviadordecrm').trigger('reset');
            });
        });

    });

</script>

@endsection