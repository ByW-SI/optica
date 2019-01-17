<option id="precarga0" value="">Seleccionar</option>
@foreach ($precargas as $precarga)
	<option id="{{ $precarga->id }}" value="{{ $precarga->id }}">{{ $precarga->nombre }}</option>
@endforeach