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
<!-- Modales Historial Ocular -->
@include('paciente.modals.ocular')
<!-- Modales Anteojos -->
@include('paciente.modals.anteojos')

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

</script>

@endsection