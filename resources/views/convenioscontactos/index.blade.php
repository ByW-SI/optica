@extends('layouts.infoconvenio')
	@section('cliente')
	<ul role="tablist" class="nav nav-tabs">
		<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('convenios.show',['convenio'=>$convenio]) }}">Dirección Fisica:</a></li>
		<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('convenios.direccionfiscal.index',['convenio'=>$convenio]) }}">Dirección Fiscal:</a></li>
		<li class="active"><a href="{{ route('convenios.contactos.index',['convenio'=>$convenio]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a></li>
		<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="{{-- {{ route('convenios.tipoconvenio.index', ['convenio'=>$convenio]) }} --}}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Tipo de convenio:</a></li>
		
	</ul>
	<div class="panel panel-default">
		<div class="panel-heading">
			Contactos:
		</div>
		<div class="panel-body">
			<div class="form-group col-lg-offset-11">
				<a type="button" class="btn btn-success" href="{{ route('convenios.contactos.create',['convenio'=>$convenio]) }}">
			<strong>Agregar</strong>	</a>
			</div>
		@if ($contactos->count() == 0)
			<h3>Aún no tienes contactos</h3>
		@endif
		@if ($contactos->count() !=0)
			
		<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
				<thead>
					<tr class="info">
						<th>Nombre del contacto</th>
						<th>Telefono Directo</th>
						<th>Celular</th>
						<th>Correo Electronico</th>
						<th>Operaciones</th>
					</tr>
				</thead>
				@foreach ($contactos as $contacto)
					<tr class="active">
						<td>{{ $contacto->nombre }} {{$contacto->apater}} {{$contacto->amater}}</td>
						<td>{{$contacto->telefonodir}}</td>
						<td>{{$contacto->celular1}}</td>
						<td>{{$contacto->email1}}</td>
						<td>
							<a class="btn btn-success btn-sm" href="{{ route('convenios.contactos.show',['convenio'=>$convenio,'contacto'=>$contacto]) }}">
						<strong>Ver</strong>	</a>
							<a class="btn btn-info btn-sm" href="{{ route('convenios.contactos.edit',['convenio'=>$convenio,'contacto'=>$contacto]) }}">
						<strong>Editar</strong>	</a>
					</tr>
						</td>
					</tbody>
				@endforeach
			</table>
		@endif
		
		</div>
	</div>
		@endsection