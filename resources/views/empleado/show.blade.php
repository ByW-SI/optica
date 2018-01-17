@extends('layouts.test')
@section('content1')



<div class="container" align="left">
	
	
		<h4> <strong>Empleados</strong>
			
		</h4>
			 	 <br />
			 	 <div class="container-fluid">
			 	 	 <br /> 
  	<table class="table table-hover">
    	<thead>
      	<tr>
        	<th>Nombre</th>
        	<th>Apellido Paterno</th>
        	<th>Area</th>
        	<th>Puesto</th>
      	</tr>
    	</thead>

    	<tbody>

@foreach($empleados as $empleado)
 @foreach($empleado as $emplead)
      	<tr>
        	<td>{{$emplead->nombre}}</td>
        	<td>{{$emplead->appaterno}}</td>
        	<td>{{$emplead->datosLab->area}}</td>
        	<td>{{$emplead->datosLab->puesto}}</td>
      	</tr>
  @endforeach 
@endforeach
      

        </tbody>

  </table>


			 	 </div>

	</div>

	@endsection

