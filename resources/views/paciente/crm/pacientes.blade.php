<option value="">Seleccionar</option>
@foreach($pacientes as $paciente)
    <option value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->appaterno }}</option>
@endforeach