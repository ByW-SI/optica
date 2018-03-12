@extends('layouts.blank')
@section('content')
<div class="panel-default">
	<div class="panel-heading"><h4>Registro de Productos:
					&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-asterisk" aria-hidden="true"></i>
					Campos Requeridos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a class="btn btn-info" href="{{ route('empleados.create') }}"><strong>Registrar</strong></a>
				</h4>
	</div>
	<div class="panel-body"><br>
		<div class="row">
		  <div class="col-sm-2">
            <label class="control-label"><i class="fa fa-asterisk" aria-hidden="true"></i>Código:(Automático)</label>
             <input class="form-control" type="text" name="codigo" id="codigo" readonly="">
		  </div>
		  <div class="col-sm-2">
            <label class="control-label"><i class="fa fa-asterisk" aria-hidden="true"></i>Negocio:</label>
              <select class="form-control">
                <option value='OP'>Óptica</option>
				<option value='OR'>Ortopedia</option>
			 </select>
		  </div>
		   <div class="col-sm-2">
            <label class="control-label"><i class="fa fa-asterisk" aria-hidden="true"></i>Proveedor:</label>
              <select class="form-control">
                <option value='17'>Essilor</option>
				<option value='18'>Nueva Italia</option>
				<option value='03'>Arquer</option>
			 </select>
		  </div>
		   <div class="col-sm-2">
            <label class="control-label"><i class="fa fa-asterisk" aria-hidden="true"></i>Producto:</label>
              <select class="form-control">
                <option value='M5'>Monofocales Terminadas</option>
				<option value='M6'>Monofocales Terminadas Premium</option>
				<option value='M7'>Monofocales Terminadas Transitions</option>
				<option value='P8'>Progresivos Línea Clásica Adaptar</option>
			 </select>
		  </div>
		  <div class="col-sm-2">
            <label class="control-label"><i class="fa fa-asterisk" aria-hidden="true"></i>Marca:</label>
              <select class="form-control">
                <option value='A6'>AIRWEAR</option>
				<option value='O3'>ORMA</option>
				<option value='M2'>MATERIALES NACIONALES</option>
				<option value='S0'>SENSASUAVE</option>
			 </select>
		  </div>
		   <div class="col-sm-2">
            <label class="control-label"><i class="fa fa-asterisk" aria-hidden="true"></i>Modelo:</label>
              <select class="form-control">
                <option value='A5'>604</option>
				<option value='A6'>617</option>
				<option value='B1'>644</option>
				<option value='B8'>974</option>
			 </select>
		  </div>
		</div><br><br>
		<div class="row">
		   <div class="col-sm-2">
            <label class="control-label"><i class="fa fa-asterisk" aria-hidden="true"></i>Tamaño/Tallas:</label>
              <select class="form-control">
                <option value='AE'>26-29</option>
				<option value='AD'>22-25</option>
				<option value='AA'>14-17</option>
				<option value='30'>3 PUL</option>
				<option value='GD'>GDE</option>
			 </select>
		  </div>
		</div>
	</div>
</div>
@endsection