@extends('layouts.test')
@section('content1')

	{{-- expr --}}
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<div class="container">
		<div class="panel panel-group">
			<div class="panel-default">
				<div class="panel-heading">
					<h4>Datos del paciente:&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-asterisk" aria-hidden="true"></i>
					Campos Requeridos</h4>
				</div>
				<div class="panel-body">
		{{-- FORM DATOS PERSONALES --}}
		<form role="form" id="form-empleado" method="POST" action="{{ route('pacientes.store') }}" name="form">
			{{ csrf_field()}}
					<div class="form-group col-xs-3">
						<label class="control-label"><i class="fa fa-asterisk" aria-hidden="true"></i>Nombre:</label>
						<input class="form-control" type="text" name="nombre" id="nombre">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label"><i class="fa fa-asterisk" aria-hidden="true"></i>Apellido Paterno:</label>
						<input class="form-control" type="text" name="appaterno" id="appaterno">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label">Apellido Materno:</label>
						<input class="form-control" type="text" name="apmaterno" id="apmaterno">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label">ID:(Automàtico)</label>
						<input class="form-control" type="text" readonly style="width:150px" name="identificador" id="identificador">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label">Edad:(Automàtico)</label>
						<input class="form-control" type="text" readonly="" placeholder="Edad" id="edad" name="edad" style="width: 91px" name="edad" id="edad">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label"><i class="fa fa-asterisk" aria-hidden="true"></i>Fecha de nacimiento:</label>
						<input class="form-control" type="date" id="fechanacimiento" name="fecha_nacimiento" required>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label">Sexo:</label>
						<select class="form-control" name="sexo" id="sexo">
							<option>Masculino</option>
							<option>Femenino</option>
							<option>Otro</option>
						</select>
					</div>
					<div class="col-xs-2" align="center">
						<input type="submit" class="btn btn-success" name="submit_1" value="Guardar">
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