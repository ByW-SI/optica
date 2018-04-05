<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
			<thead>
				<tr class="info">
					<th>@sortablelink('identificador','Identificador')</th>
					<th>@sortablelink('nombre','Nombre')</th>
					<th>@sortablelink('appaterno','Apellido Paterno')</th>
					<th>@sortablelink('apmaterno','Apellido Materno')</th>
					
					<th>Acciones</th>
				</tr>
			</thead>
			@foreach ($pacientes as $paciente)
				{{-- expr --}}
				<tr class="active"
				    title="Has Click Aquì para Ver"
					style="cursor: pointer"
					href="#{{$paciente->id}}">
					
					<td>{{$paciente->identificador}}</td>
					<td>{{$paciente->nombre}}</td>
					<td>{{$paciente->appaterno}}</td>
					<td>{{$paciente->apmaterno}}</td>
					
					<td>
						<a class="btn btn-success btn-sm" href="{{ route('pacientes.show',['paciente'=>$paciente]) }}"><i class="fa fa-eye" aria-hidden="true"></i> 
					<strong>Ver</strong>	</a>
						<a class="btn btn-info btn-sm" href="{{ route('pacientes.edit',['paciente'=>$paciente]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
					<strong>Editar</strong>	</a>
					</td>
				</tr>
			@endforeach
		</table>
		<script type="text/javascript" src="{{ asset('js/forms.js') }}"></script>