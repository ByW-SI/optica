@extends('layouts.test')
@section('content1')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="container">
  	<div role="application" class="panel panel-group">
		@include('paciente.head')
  		<!-- TAB-CONTENT -->
  		<div class="tab-content">
  			<!-- DATOS GENERALES -->
  			<div  class="tab-pane fade in active" id="generales">
  				@include('paciente.datos.generales')
			</div>
			<!-- HISTORIAL MEDICO -->
			<div class="tab-pane fade" id="hmedico">
  				@include('paciente.datos.medicos')
			</div>
			<!-- HISTORIAL OCULAR -->
			<div class="tab-pane fade" id="ocular">
  				@include('paciente.datos.ocular')
			</div>
			<!-- ANTEOJOS -->
			<div class="tab-pane fade" id="anteojos">
				@include('paciente.datos.anteojos')
			</div>
			<!-- ORTOPÉDICO -->
			<div class="tab-pane" id="ortopedico">
				@include('paciente.datos.ortopedia')
			</div>
			<!-- CITAS -->
			<div class="tab-pane" id="cita">
				@include('paciente.datos.citas')
			</div>
			<!-- CRM -->
			<div class="tab-pane" id="crm">
				@include('paciente.datos.crm')
			</div>
		</div>
	</div>
</div>
<!-- Modal Tutores -->
@include('paciente.modals.tutor')
<!-- Modal Historial Médico -->
@include('paciente.modals.medico')
<!-- Modales Historial Ocular -->
@include('paciente.modals.ocular')
<!-- Modales Anteojos -->
@include('paciente.modals.anteojos')
<!-- Modal Editar Tutor -->
@include('paciente.modals.editarTutor')

<script type="text/javascript">

	function getSucursal(){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url: "{{ url('/getsucursal') }}",
			type: "GET",
			dataType: "html",
		}).done(function(resultado){
			$("#sucursal").html(resultado);
		});
	}

	function calculateAge(birthday) {
	   	var ageDifMs = Date.now() - new Date(birthday).getTime();
	   	var ageDate = new Date(ageDifMs);
	   	var res = Math.abs(ageDate.getFullYear() - 1970);
	   	if(res <= 90)
	   		return res;
 	}

    $(document).ready(function() {
    	$('#fecha_nacimiento').change(function() {
    		var val = document.getElementById('fecha_nacimiento').value;
    		var edad = calculateAge(val);
    		$('#edad').val(edad);
    	});

    	@php($j = 1)
    	@foreach($paciente->tutores as $tutor)
    	$('#fecha_editar_{{ $j }}').change(function() {
    		var val = document.getElementById('fecha_editar_{{ $j }}').value;
    		var edad = calculateAge(val);
    		$('#edad_editar_{{ $j }}').val(edad);
    	});
    	@php($j++)
    	@endforeach
    });

</script>

@endsection