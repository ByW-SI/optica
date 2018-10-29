@extends('layouts.blank')
@section('content')

	<div class="container">
	    <div class="panel panel-group">
	        <div class="panel-default">
	            <div class="panel-heading">
	                <div class="row">
	                    <div class="col-sm-4">
	                        <h4>Alta por Excel:</h4>
	                    </div>
	                </div>
	            </div>
	            <div class="panel-body">
	            	<form action="{{ route('excel.pacientes.upload') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
	            		{{ csrf_field() }}
		            	<div class="row">
		            		<div class="col-sm-6 col-sm-offset-2 form-group">
		            			<label class="control-label">Selecciona el Archivo:</label>
		            			<input class="form-control" type="file" name="pacientes" required="">
		            		</div>
		            		<div class="col-sm-2 form-group" style="margin-top: 26px;">
								<button class="btn btn-success">Enviar</button>
		            		</div>
		            	</div>
	            	</form>
	            </div>
	        </div>
	    </div>
	</div>

@endsection