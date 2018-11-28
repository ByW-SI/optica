@extends('layouts.blank')
	@section('content')
	<div class="container">
    <h2>Precios</h2>
		
			<div class="panel panel-default">
				<div class="panel-heading">
					Productos ortopédicos
				</div>
				<div class="panel-body">
                    <table id="tablaorto" class=" formu table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
                        <thead>
                            <tr class="info">
                                <th>Código de Barras</th>
                                <th>SKU</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        @foreach ($ortos as $orto)
                        
                            <tr>
                                <td>{{$orto->codigobarras}}</td>
                                <td>{{$orto->sku}}</td>
                                <td>
                                <form action="{{route('cambiarprecioorto', ['orto'=> $orto])}}" method="POST">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <input type="number" name="precio" value="{{$orto->precio}}">
                                    <input class="btn btn-primary" type="submit" value="Actualizar">
                                </form>
                                </td>
                                
                            </tr>
                        
                        @endforeach
                    </table>
				</div>
			</div>

            <div class="panel panel-default">
				<div class="panel-heading">
					Micas
				</div>
				<div class="panel-body">
                    <table id="tablamica" class=" formu table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
                        <thead>
                            <tr class="info">
                                <th>Código de Barras</th>
                                <th>SKU</th>
                                <th>precio</th>
                            </tr>
                        </thead>
                        @foreach ($micas as $mica)
                            {{-- expr --}}
                            <tr>
                                <td>{{$mica->codigobarras}}</td>
                                <td>{{$mica->sku}}</td>
                                <td>
                                <form action="{{route('cambiarpreciomica', ['orto'=> $mica])}}" method="POST">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <input type="number" name="precio" value="{{$mica->precio}}">
                                    <input class="btn btn-primary" type="submit" value="Actualizar">
                                </form>
                                </td>
                                
                            </tr>
                        @endforeach
                    </table>
				</div>
				
			</div>

            <div class="panel panel-default">
				<div class="panel-heading">
					Armazones
				</div>
				<div class="panel-body">
                <table id="tablaarma" class=" formu table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
                        <thead>
                            <tr class="info">
                                <th>Código de Barras</th>
                                <th>SKU</th>
                                <th>precio</th>
                            </tr>
                        </thead>
                        @foreach ($armazones as $arma)
                            {{-- expr --}}
                            <tr>
                                <td>{{$arma->codigobarras}}</td>
                                <td>{{$arma->sku}}</td>
                                <td>
                                <form action="{{route('cambiarprecioarma', ['orto'=> $arma])}}" method="POST">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <input type="number" name="precio" value="{{$arma->precio}}">
                                    <input class="btn btn-primary" type="submit" value="Actualizar">
                                </form>
                                </td>
                                
                            </tr>
                        @endforeach
                    </table>
				</div>
					
			</div>

            <div class="panel panel-default">
				<div class="panel-heading">
					Productos en general
				</div>
				<div class="panel-body">
                <table id="tablagene" class=" formu table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
                        <thead>
                            <tr class="info">
                                <th>Código de Barras</th>
                                <th>SKU</th>
                                <th>precio</th>
                            </tr>
                        </thead>
                        @foreach ($generales as $gene)
                            {{-- expr --}}
                            <tr>
                                <td>{{$gene->codigobarras}}</td>
                                <td>{{$gene->sku}}</td>
                                <td>
                                <form action="{{route('cambiarpreciogene', ['orto'=> $gene])}}" method="POST">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <input type="number" name="precio" value="{{$gene->precio}}">
                                    <input class="btn btn-primary" type="submit" value="Actualizar">
                                </form>
                                </td>
                                
                            </tr>
                        @endforeach
                    </table>
				</div>
					
				</div>	
			</div>
	</div>
	@endsection