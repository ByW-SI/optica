@extends('layouts.blank')
@section('content')
<script src="{{asset('js/crm.js')}}"></script>
                    @if($crms->count()==0)
        <div class="container">
            <div class="row">
                         @isset($todos) 
                <div class="col">
                    <div class="alert alert-danger" style="text-align: center;">
                        <strong> No hay C.R.M.'s Registrados con ese Rango de Fechas.</strong>
                    </div>
                </div>
                         @else 

                <div class="col">
                    <div class="alert alert-primary" style="background-color: darkgray;color: black;text-align: center;">
                        <strong>No hay C.R.M.'s  Registrados Aún.</strong>
                   </div>
                </div>
                        @endisset 

            </div>
        </div><hr>
					@endif



        

					{{--BUSCADOR--}}
                    <div class="panel-default">
                        <div class="panel-heading" style="background-color: lightgray !important;">
                            <div class="row">
                                <br>
                                <div class="col-sm-6 col-md-offset-2">
                                    <div class="row">
                                        <div class="col-sm-4">
                                        Desde
                                        </div>
                                        <div class="col-sm-1">
                                        
                                        </div>
                                        <div class="col-sm-4">
                                        Hasta
                                        </div>
                                        <div class="col-sm-4">
                                            <input name="fechaD" type="date" form="filtrado" class="form-control" id="fechafrom" required>
                                        </div>
                                        <div class="col-sm-1">
                                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong>
                                        </div>
                                        <div class="col-sm-4">
                                            <input name="fechaH" type="date" form="filtrado" class="form-control" id="fechato" required disabled>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>

                                    






                        {{--MODAL CON DETALLES--}} 
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color:#660066;color: white;  ">
                                        <button type="button" class="badge pull-right" data-dismiss="modal">Cerrar</button>
                                        <h4 class="modal-title">Detalles de C.R.M.</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" id="enviadordecrm" method="POST" action="{{ route('crm2.store')}}">{{ csrf_field() }}</form>
                                            <div class="col-sm-12">
                                                <input type="hidden" name="paciente_id" id="id_paciente" form="enviadordecrm" class="form-control">
                                                <input type="hidden" name="fecha_act" id="fecha_act" form="enviadordecrm" value="{{date('Y-m-d')}}">
                                                <div class="form-group col-sm-4">
                                                    <label for="nombre" class="control-label">Nombre:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
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
                                                <div class="form-group col-sm-4 col-sm-offset-2">
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
                                                    <label for="correo" class="control-label">Correo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                    <input type="email" name="correo" id="correo" form="enviadordecrm" class="form-control" disabled>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="telefono" class="control-label">Teléfono:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                    <input type="number" name="telefono" id="telefono" form="enviadordecrm" class="form-control" disabled>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="celular" class="control-label">Celular:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                    <input type="number" name="celular" id="celular" form="enviadordecrm" class="form-control" disabled>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="fecha_cont" class="control-label">Fecha Contacto:</label>
                                                    <input type="date" name="fecha_cont" id="fecha_cont" form="enviadordecrm" class="form-control" disabled>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="fecha_aviso" class="control-label">Fecha aviso:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                    <input type="date" name="fecha_aviso" id="fecha_aviso" form="enviadordecrm" class="form-control" disabled>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="hora" class="control-label">Hora:</label><br>
                                                    <input type="text" name="hora" id="hora" form="enviadordecrm" class="form-control" disabled>
                                                </div>
                                                <div class="col-md-12 offset-md-2 mt-3">
                                                    <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                                        <label for="acuerdos" class="control-label">Acuerdos: </label>
                                                        <textarea rows="5" id="acuerdos" name="acuerdos" maxlength="500" class="form-control" form="enviadordecrm" disabled></textarea>
                                                    </div>
                                                    <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                                        <label for="comentarios" class="control-label">Comentarios: </label>
                                                        <textarea rows="5" id="comentarios" name="comentarios" maxlength="500" class="form-control" form="enviadordecrm" disabled></textarea>
                                                    </div>
                                                    <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                                        <label for="observaciones" class="control-label">Observaciones:</label>
                                                        <textarea rows="5" id="observaciones" name="observaciones" maxlength="500" class="form-control" form="enviadordecrm" disabled></textarea>
                                                    </div>
                                                    <input type="hidden" id="paciente_id" name="paciente_id">
                                                </div>     
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="row">
                                            <div class="col-sm-4 col-md-offset-4">
                                            <button name="vinculo" id="vinculo" class="btn btn-block btn-success">Crear Nuevo</button>
                                            <button type="submit" form="enviadordecrm" name="enviador" id="enviador" style="display: none;" class="btn btn-block btn-success">Crear Nueasduhasdhvo</button>
                                            </div>
                                            <div class="col-sm-4">
                                                <button type="button" class="btn btn-block btn-danger" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                                </div>
                              
                                
                            </div>  
                        </div>


                        {{--TABLA--}}
                        <div class="panel-body">
                            <div class="row">
                                <!-- <div class="col-md-10 col-sm-offset-1"> -->
                                    <table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse;margin-bottom: 0px">
                                        <thead>
                                            <tr class="info">
                                                <th>paciente</th>
                                                <th>Fecha de Contacto</th>
                                                <th>Hora</th>
                                                <th>Teléfono Cel</th>
                                                <th>Correo</th>
                                                <th>Status</th>
                                                <th>Fecha de Aviso</th>
                                                <th>Detalle de paciente</th>
                                                
                                            </tr>
                                        </thead>

                                        @foreach($crms as $crm)
                                            {{-- expr --}}
                                            <tr title="Has Click Aquì para ver o modificar"
                                            style="cursor: pointer" data-toggle="modal" data-target="#myModal" class="active tupla">
                                                <td>{{$crm->paciente->nombre}}&nbsp;&nbsp;{{$crm->paciente->apellidopaterno}}</td>
                                                <td>{{$crm->fecha_cont}}</td>
                                                <td>{{$crm->hora}}</td>
                                                <td>{{$crm->paciente->generales->telcelular}}</td>
                                                <td>{{$crm->paciente->generales->email}}</td>
                                                <td>{{$crm->status}}</td>
                                                <td>{{$crm->fecha_aviso}}</td>
                                                <td>
                                                    <a class="btn btn-success btn-sm" href="{{ route('pacientes.show',['id'=>$crm->paciente->id]) }}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> 
                                                    <strong>Crear Nuevo(paciente Actual)
                                                </strong></a>
                                                </td>
                                                
                                                
                                                <input type="hidden" name="id_paciente" value="{{$crm->paciente->id}}">
                                                <input type="hidden" name="nombre" value="{{$crm->paciente->nombre}}">
                                                <input type="hidden" name="ap" value="{{$crm->paciente->apellidopaterno}}">
                                                <input type="hidden" name="am" value="{{$crm->paciente->apellidomaterno}}">
                                                <input type="hidden" name="correo" value="{{$crm->paciente->mail}}">
                                                <input type="hidden" name="telefono" value="{{$crm->paciente->telefono}}">
                                                <input type="hidden" name="celular" value="{{$crm->paciente->telefonocel}}">

                                                <input type="hidden" name="fecha_cont" value="{{$crm->fecha_cont}}">
                                                <input type="hidden" name="fecha_aviso" value="{{$crm->fecha_aviso}}">
                                                <input type="hidden" name="hora" value="{{$crm->hora}}">
                                                <input type="hidden" name="status" value="{{$crm->status}}">
                                                <input type="hidden" name="tipo_cont" value="{{$crm->tipo_cont}}">
                                                <input type="hidden" name="comentarios" value="{{$crm->comentarios}}...">
                                                <input type="hidden" name="acuerdos" value="{{$crm->acuerdos}}...">
                                                <input type="hidden" name="observaciones" value="{{$crm->observaciones}}...">

                                                






                                            </tr>
                                        @endforeach
                                    </table>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                        




{{-- Modal Nuevo CRM --}}
<div class="modal fade" id="Modal-crm" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#ff9900;color: white;  ">
                <button type="button" class="badge  pull-right" data-dismiss="modal" style="right:0px;">Cerrar</button>
                <h4 class="modal-title"><strong>Nuevo Registro de C.R.M.</strong></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="enviadordecrm" method="POST" action="{{ route('crm2.store')}}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-3 form-group">
                            <label class="control-label">paciente:</label>
                            <select class="form-control" name="paciente_id" id="paciente_id_sel" required>
                                <option value="">Seleccionar paciente</option>
                                @foreach($pacientes as $paciente)
                                    @isset($paciente->nombre)
                                        <option value="{{$paciente->id}}">{{$paciente->nombre}}&nbsp;{{$paciente->apellidopaterno}}</option>
                                    @else
                                        <option value="{{$paciente->id}}">{{$paciente->razonsocial}}</option>
                                    @endisset
                                @endforeach
                            </select>
                        </div>
                        @foreach($pacientes as $paciente)
                            <div id="info{{$paciente->id}}" style="display: none;"> 
                                <div class="col-sm-3 form-group">
                                    <label class="control-label">ID:</label>
                                    <input type="text" name="" readonly value="{{$paciente->identificador}}"  class="form-control">
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label class="control-label">R.F.C:</label>
                                    <input type="text" name="" readonly value="{{$paciente->rfc}}"  class="form-control">
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label class="control-label">Regimen Fiscal:</label>
                                    <input type="text" name="" readonly value="{{$paciente->tipopersona}}"  class="form-control">
                                </div>
                            </div>
                         @endforeach
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3 form-group">
                            <label class="control-label" for="fecha_act">Fecha Actual:</label>
                            <input type="date" class="form-control" id="fecha_act" name="fecha_act" value="{{ date('Y-m-d') }}" readonly>
                        </div>
                        <div class="col-sm-3 form-group">
                            <label class="control-label" for="fecha_aviso"><i class="fa fa-asterisk" aria-hidden="true"></i> Fecha Aviso:</label>
                            <input type="date" class="form-control" id="fecha_uno" name="fecha_aviso" required="required" min="{{date('Y-m-d')}}" max="{{date('Y-m-d',strtotime('+2 Months'))}}">
                        </div>
                        <div class="col-sm-3 form-group">
                            <label class="control-label" for="fecha_cont"><i class="fa fa-asterisk" aria-hidden="true"></i> Fecha siguiente contacto:</label>
                            <input type="date" class="form-control" id="fecha_dos" name="fecha_cont" required="required" min="{{date('Y-m-d',strtotime('+2 Days'))}}" max="{{date('Y-m-d',strtotime('+2 Months'))}}" disabled>
                        </div>
                        <div class="col-sm-3 form-group">
                            <label class="control-label" for="hora">Hora:</label>
                            <input type="text" class="form-control" id="hora" name="hora" name="hora" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3  col-sm-offset-3 form-group">
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
                        <div class="row">
                            <div class="col-sm-3 col-md-offset-5">
                                <input type="submit" name="submit" class="btn btn-success" value="Guardar">
                            </div>
                        </div>
                </form>                       
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-4 col-md-offset-8">
                        <button type="button" class="btn btn-block btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Modal NUevo CRM --}}


     {{-- Values --}}
        @foreach($pacientes as $pacientes)
        <input type="hidden" id="{{$paciente->id}}" value="{{$paciente->identificador}}">
        @endforeach
    {{-- Values --}}                        
                
                            

<script type="text/javascript">
    $(document).ready(function(){
            $("#paciente_id_sel").change(function(){
                var id=$("#paciente_id_sel").val();
                var x = document.getElementById("paciente_id_sel");

                for (i = 1; i < x.length; i++) {

                     var j=x.options[i].value;
                     if(j!=null||j!=''){
                        name="info"+j;
                        document.getElementById(name).style.display='none';
                     }
                      
                     
            }
                 nombre="info"+id;

                 document.getElementById(nombre).style.display='block';

        });

        $('#vinculo').click(function(){
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