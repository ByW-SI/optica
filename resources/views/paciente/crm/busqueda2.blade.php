@foreach($crms as $crm)
    <div class="modal fade" id="new{{ $crm->id }}" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="modal-title">
                                <strong>Detalles del CRM</strong>
                            </h4>
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
                            <h4 class="modal-title">
                                <strong>Detalles del CRM</strong>
                            </h4>
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