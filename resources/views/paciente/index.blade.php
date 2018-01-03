@extends('layouts.blank')
@section('content')
	{{-- expr --}}
	<div class="container">
		<div class="panel-body">
			<div class="col-lg-6">
				<form onKeypress="if(event.keyCode == 13) event.returnValue = false;">
					<div class="input-group">
					  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
					  <input type="text" class="form-control" placeholder="Buscar" aria-describedby="basic-addon1">
					</div>
				</form>
			</div>
		</div>
		<div id="datos" name="datos" class="jumbotron">
			<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
				<thead>
					<tr class="info">
						<th>ID</th>
						<th>Nombre</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>Proxima Cita</th>
						<th>Acciones</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
@endsection