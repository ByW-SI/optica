@extends('layouts.test')
@section('content1')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="container">
	<div role="application" class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading"><h4><strong>Datos del Paciente:</strong></h4>
				<a class="btn btn-info" href="{{ route('pacientes.create') }}"><strong>Nuevo Paciente</strong></a>
			</div>
			<div class="panel-body">
				<div class="col-xs-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="identificador">ID de Paciente:</label>
						<dd><strong>{{$paciente->identificador}}</strong></dd>
					</div>
				</div>
				<div class="col-xs-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="appaterno">Apellido Paterno:</label>
						<dd>{{$paciente->appaterno}}</dd>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="apmaterno">Apellido Materno:</label>
						<dd>{{$paciente->apmaterno}}</dd>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="nombre">Nombre(s):</label>
						<dd>{{$paciente->nombre}}</dd>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="edad">Edad:</label>
						<dd>{{$paciente->edad}}</dd>
					</div>
				</div>
				<div class="col-xs-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="fecha_nacimiento">Fecha de Nacimiento:</label>
						<dd>{{$paciente->fecha_nacimiento}}</dd>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="sexo">Sexo:</label>
						<dd>{{$paciente->sexo}}</dd>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	{{-- PESTAÑAS --}}
		<ul class="nav nav-pills nav-justified">
			<li role="presentation"><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}"  class="ui-tabs-anchor">Generales:</a></li> 
			

			<li role="presentation" class="active"><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">Historial Médico:</a></li>

			<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">Historial Ocular:</a></li>

      <li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">Anteojos:</a></li>

			<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">Ortopédico:</a></li>

			<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">Citas:</a></li>

			<li role="presentation" class=""><a href="{{ route('pacientes.show',['paciente'=>$paciente]) }}" class="ui-tabs-anchor">C.R.M:</a></li>
		</ul>
	</div>
{{-- PESTAÑAS --}}

	{{-- HISTORIAL MEDICO --}}
						
						 <div  id="hmedico">

			@if ($edit == true)
				{{-- true expr --}}

		
			<form role="form" method="POST" action="{{ route('pacientes.historialmedico.update',['paciente'=>$paciente,'datosgenerale'=>$paciente->generales]) }}">

				{{ csrf_field() }}
				<input type="hidden" name="_method" value="PUT">
			@else
				{{-- false expr --}}
			<form role="form" method="POST" action="{{ route('pacientes.historialmedico.store',['paciente'=>$paciente]) }}">
				{{ csrf_field() }}
			@endif
						 	<div class="panel-default container">
						 		<div class="panel-heading"><h4><strong>Historial Médico:</strong> </h4></div>
						 		<div class="panel-body">
						 			
					<div class="form-group col-xs-6">
						<div class="boton checkbox-disabled">
                            <label>
                              <input id="chkalerg" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios" onchange="alergias();" name="alergia">
                                ¿Alérgico a algùn medicamento ò alguna alèrgia en especial? .
                            </label>
                        </div>
                    </div>

						 	<div class="form-group col-xs-3" style="display: none;" id="alergias1" name="alergias1">
						<label class="control-label"><i class="fa fa-asterisk" aria-hidden="true"></i>¿Cuàl?:</label>
						<input class="form-control" type="text" name="cual_alergia" id="cual_alergia">
							</div>
							<div class="form-group col-xs-3"  id="alergias2" style="display: none;">
						<label class="control-label">¿Tiene algún Tratamiento?</label>
						<input class="form-control" type="text" name="tratamiento_alergia" id="tratamiento_alergia">
							</div>
						 		</div>

						 		<div class="panel-heading"><h4>Enfermedades</h4></div>
						 		<div class="panel-body">

					<div class="form-group col-xs-6">
						<div class="boton checkbox-disabled">
                            <label><input id="cronica" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios" name="enfermedad">¿Padece alguna Enfermedad Crónica? .</label>
                        </div>
                    </div></div>

                    <div class="jumbotron"  id="enfermedades" style="display: none"> 

                    				<div class="row">
                    					<div class="col-sm-3">
                    						<label class="col-xs-4 label-text">
                    						<input type="checkbox" class="squaredTwo"
                    						 name="enfermedades[0]" value="Diabetes">Diabetes</label>
                    					</div>
                    					
                    					<div class="col-sm-3">
                    						<label class="col-xs-4 label-text">
                    						<input type="checkbox" class="squaredTwo"
                    						name="enfermedades[1]" value="Epilepsia">Epilepsia</label>
                    					</div>

                    					<div class="col-sm-3" id="especifique" style="display: none">
                    						<label class="control-label">Especifique:</label>
									        <input class="form-control" type="text" name="enfermedad_cronica" id="enfermedad_cronica">
                    					</div>

                    					<div class="col-sm-3">
                    						<div class="boton checkbox-disabled">
                            <label>
                            	 ¿Tiene Tratamiento/Control ?
                            </label>
                                <input id="control" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios" onchange="chkalerg()" name="tratamiento">
                               
                       						 </div>
                    					</div>
                    				</div>

                    				<div class="row">
                    					<div class="col-sm-3">
                    						<label class="col-xs-4 label-text">
                    						<input type="checkbox" class="squaredTwo"
                    						name="enfermedades[2]" value="Hipertensión">Hipertensión</label>
                    					</div>
                    					
                    					<div class="col-sm-3">
                    						<label class="col-xs-4 label-text">
                    						<input type="checkbox" class="squaredTwo"
                    						name="enfermedades[3]" value="Migraña">Migraña</label>
                    					</div>

                    				</div>

                    				<div class="row">
                    					<div class="col-sm-3">
                    						<label class="col-xs-4 label-text">
                    						<input type="checkbox" class="squaredTwo"
                    						name="enfermedades[4]" value="Asma">Asma</label>
                    					</div>
                    					
                    					<div class="col-sm-3">
                    						<label class="col-xs-4 label-text">
                    						<input type="checkbox" class="squaredTwo" id="otra"
                    						name="enfermedades[5]" value="Otra">Otra</label>
                    					</div>

                    					<div class="col-sm-3" id="trat" style="display: none;">
                    						<label class="control-label">Tratamiento Actual:</label>
			<input class="form-control" type="text" id="tratamiento_actual" name="tratamiento_actual">
                    					</div>
                    				</div>
					</div>


					<div class="form-group col-xs-6">
						      @if($paciente->sexo=='Femenino')
                    			<div class="col-sm-5">
						 	      <label>
						 	      	<input id="embarazo" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios"  name="embarazo">
                                ¿Embarazo?.
                                 </label>	
                                </div>
                                @endif
                                <div class="col-sm-5" style="display: none" id="emb_tiempo">
						 	     <label class="control-label">¿Cuanto Tiempo?:</label>
                                 <input id="tiempo_embarazo" type="text" class="form-control" name="tiempo_embarazo">	
                                </div>
                                
                                	<div class="col-xs-4 col-xs-offset-10">
					<input type="hidden" name="paciente_id" value="{{$paciente->id}}">
										<button id="submit" type="submit" class="btn btn-success">
									<strong>Agregar</strong>	</button>

										
										

									</div>
                              
                        
                    </div>
						 			
						 			
						 		</div>
						 	</form>
						 	</div>
						 </div>
					{{-- HISTORIAL MEDICO --}}

<script type="text/javascript">
	$(document).ready(function(){
	 $("#embarazo").change(function(){
       
       if($(this).prop('checked') == true){
       	document.getElementById('emb_tiempo').style.display = 'block';
        $('#tiempo_embarazo').prop('required',true);
       }else{
       	document.getElementById('emb_tiempo').style.display = 'none';
       $('#tiempo_embarazo').prop('required',false);
       }
    });
	 $("#chkalerg").change(function(){
       
       if($(this).prop('checked') == true){
       	document.getElementById('alergias1').style.display = 'block';
       document.getElementById('alergias2').style.display = 'block';
       
       $('#cual_alergia').prop('required',true);
       }else{
       	document.getElementById('alergias1').style.display = 'none';
       document.getElementById('alergias2').style.display = 'none';
       
       $('#cual_alergia').prop('required',false);
       }
    });
     $("#cronica").change(function(){
       
       if($(this).prop('checked') == true){
       	document.getElementById('enfermedades').style.display = 'block';
       
       }else{
       	document.getElementById('enfermedades').style.display = 'none';
       
       }
    });
     $("#otra").change(function(){
       
       if($(this).prop('checked') == true){
       	document.getElementById('especifique').style.display = 'block';
        $('#enfermedad_cronica').prop('required',true);
       }else{
       	document.getElementById('especifique').style.display = 'none';
       $('#enfermedad_cronica').prop('required',false);
       }
    });
        $("#control").change(function(){
       
       if($(this).prop('checked') == true){
       	document.getElementById('trat').style.display = 'block';
       $('#tratamiento_actual').prop('required',true);
       }else{
       	document.getElementById('trat').style.display = 'none';
       $('#tratamiento_actual').prop('required',false);
       }
    });
});
</script>

@endsection