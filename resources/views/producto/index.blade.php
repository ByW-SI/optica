@extends('layouts.blank')
@section('content')
<table id="tablagene" class=" formu table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
			<thead>
				<tr class="info">
					<th>Código de Barras</th>
					<th>SKU</th>
					<th>Proveedor</th>
					<th>Descripción</th>
					<th>Producto</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Fecha Alta</th>
					<th>Foto</th>
					<th>Operación</th>
				</tr>
			</thead>
			@foreach ($generales as $gene)
				{{-- expr --}}
				<tr class="active"
				    title="Has Click Aquì para Ver"
					style="cursor: pointer"
					>
					
					<td>123</td>
					<td>123</td>
					<td>123</td>
					<td>123</td>
					<td>123</td>
					<td>123</td>
					<td>123</td>
					<td>{{$gene->created_at}}</td>
					<td>{{$gene->foto}}</td>
					<td>
						<a class="btn btn-success btn-sm" href="{{ route('progene.show',['gene'=>$gene]) }}"><i class="fa fa-eye" aria-hidden="true"></i> 
					<strong>Ver</strong>	</a>
                    
					</td>
				</tr>
			@endforeach
		</table>
@endsection