@foreach($paciente->ocular as $ocular)
	@include('paciente.modals.sub.ocular1')
	@include('paciente.modals.sub.ocular2')
	@include('paciente.modals.sub.ocular3')
	@include('paciente.modals.sub.ocular4')
	@include('paciente.modals.sub.ocular5')
@endforeach