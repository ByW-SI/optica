@extends('layouts.test')
@section('content1')

	{{-- expr --}}
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<div class="container">
		<div class="panel panel-group">
			<div class="panel-default">
				<div class="panel-heading jumbotron">
					<h4>Datos del paciente:&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-asterisk" aria-hidden="true"></i>
					Campos Requeridos</h4>
				</div>
				<div class="panel-body">
		{{-- FORM DATOS PERSONALES --}}
		@if($edit==false)
		<form role="form" id="form-empleado" method="POST" action="{{ route('pacientes.store') }}" name="form">
			{{ csrf_field()}}
			@else
		<form role="form" id="form-empleado" method="POST" action="{{ route('pacientes.update',['id'=>$paciente->id]) }}" name="form">
			{{ csrf_field()}}
			<input type="hidden" name="_method" value="PUT">
			@endif
					<div class="form-group col-xs-3">
						<label class="control-label"><i class="fa fa-asterisk" aria-hidden="true"></i>Nombre:</label>
						<input class="form-control" type="text" name="nombre" id="nombre" 
						@if($edit==true)
						value="{{$paciente->nombre}}"
						@endif>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label"><i class="fa fa-asterisk" aria-hidden="true"></i>Apellido Paterno:</label>
						<input class="form-control" type="text" name="appaterno" id="appaterno"
						@if($edit==true)
						value="{{$paciente->appaterno}}"
						@endif>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label">Apellido Materno:</label>
						<input class="form-control" type="text" name="apmaterno" id="apmaterno"
						@if($edit==true)
						value="{{$paciente->apmaterno}}"
						@endif>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label">ID:(Automàtico)</label>
						<input class="form-control" type="text" readonly style="width:150px" name="identificador" id="identificador"
						@if($edit==true)
						value="{{$paciente->identificador}}"
						@endif>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label">Edad:(Automàtico)</label>
						<input class="form-control" type="text" readonly="" placeholder="Edad" id="edad" name="edad" style="width: 91px" name="edad" id="edad"
						@if($edit==true)
						value="{{$paciente->edad}}"
						@endif>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label"><i class="fa fa-asterisk" aria-hidden="true"></i>Fecha de nacimiento:</label>
						<input class="form-control" type="date" id="fechanacimiento" name="fecha_nacimiento" required
						@if($edit==true)
						value="{{$paciente->fecha_nacimiento}}"
						@endif>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label">Sexo:</label>
						<select class="form-control" name="sexo" id="sexo">
							<option @if($edit==true && $paciente->sexo=='Masculino')
							selected="selected"
							@endif>Masculino</option>
							<option @if($edit==true && $paciente->sexo=='Femenino')
							selected="selected"
							@endif>Femenino</option>
							<option @if($edit==true  && $paciente->sexo=='Otro')
							selected="selected"
							@endif>Otro</option>
						</select>
					</div>
					<div class="col-xs-2" align="center"><br>
						<input type="submit" class="btn btn-info" name="submit_1" value="Guardar">
					</div>
				</div>
		</form><br>
		{{-- FORM DATOS PERSONALES --}}

					{{-- PESTAÑAS --}}
				
						<ul class="nav nav-justified">
							<li role="presentation" ><a data-toggle="tab" href="#generales"  class="ui-tabs-anchor">Generales:</a></li>

							<li role="presentation"><a data-toggle="tab" href="#hmedico" class="ui-tabs-anchor">Historial Medico:</a></li>

							<li role="presentation"><a data-toggle="tab" href="#ocular" class="ui-tabs-anchor">Ocular:</a></li>

							<li role="presentation"><a data-toggle="tab" href="#" class="ui-tabs-anchor">Ortopedico:(En desarrollo)</a></li>

							<li role="presentation"><a data-toggle="tab" href="#cita" class="ui-tabs-anchor">Citas:</a></li>

							<li role="presentation"><a data-toggle="tab" href="#crm" class="ui-tabs-anchor">C.R.M:</a></li>
						</ul>
					{{-- PESTAÑAS --}}

				</div>
			</div>
		</div>
<script type="text/javascript">

$(document).ready(function(){

	$("#nombre").keyup(function(){

		
      var nombre=$("#nombre").val();
      var prim=nombre.substring(0,1);
      var appaterno=$("#appaterno").val();
      var seg=appaterno.substring(0,1);
      var apmaterno=$("#apmaterno").val();
      var ter=apmaterno.substring(0,1);
      var año1=$("#fechanacimiento").val();
      var id=prim+seg+ter+año1;
      var bid=id.toUpperCase(id);
       $("#identificador").val(bid);
	});

	$("#appaterno").keyup(function(){

		
      var nombre=$("#nombre").val();
      var prim=nombre.substring(0,1);
      var appaterno=$("#appaterno").val();
      var seg=appaterno.substring(0,1);
      var apmaterno=$("#apmaterno").val();
      var ter=apmaterno.substring(0,1);
      var año1=$("#fechanacimiento").val();
      var id=prim+seg+ter+año1;
      var bid=id.toUpperCase(id);
       $("#identificador").val(bid);
	});

		$("#apmaterno").keyup(function(){

		
      var nombre=$("#nombre").val();
      var prim=nombre.substring(0,1);
      var appaterno=$("#appaterno").val();
      var seg=appaterno.substring(0,1);
      var apmaterno=$("#apmaterno").val();
      var ter=apmaterno.substring(0,1);
      var año1=$("#fechanacimiento").val();
      var id=prim+seg+ter+año1;
      var bid=id.toUpperCase(id);
       $("#identificador").val(bid);
	});


	

    $("#fechanacimiento").change(function(){

        var año1=$("#fechanacimiento").val();
        var año2= Date();
        var nacimiento=año1.substring(0,4);
        var actual=año2.substring(11,15);
        var edad=actual-nacimiento;
       $("#edad").val(edad);

      var nombre=$("#nombre").val();
      var prim=nombre.substring(0,1);
      var appaterno=$("#appaterno").val();
      var seg=appaterno.substring(0,1);
      var apmaterno=$("#apmaterno").val();
      var ter=apmaterno.substring(0,1);
      var id=prim+seg+ter+año1;
      var bid=id.toUpperCase(id);
       $("#identificador").val(bid);
    });



});
	











</script>

@endsection