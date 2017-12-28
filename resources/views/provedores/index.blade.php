@extends('layouts.blank')
@section('content')
<div class="container">
	<div class="panel-body">
		<div class="col-lg-6">
			<form id="empleados" action="buscarempleado"
		onKeypress="if(event.keyCode == 13) event.returnValue = false;">
				<div class="input-group" id="datos1">
					 <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
					<input type="text" list='browsers' id="buscarproveedor" name="query" class="form-control" placeholder="Buscar..." autofocus>
				</div>
			</form>
		</div>
	</div>
	<div id="datos" name="datos" class="jumbotron">
		
	</div>
</div>


@endsection