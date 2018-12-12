@foreach($paciente->anteojo as $anteojo)
<div class="modal fade"  id="anteojo_modal{{$anteojo->id}}" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			@switch($anteojo->tipo_anteojo)
				@case('ARMAZÓN')
					@include('paciente.modals.sub.armazon')
					@break
				@case('LENTES DE CONTACTO')
					@include('paciente.modals.sub.contacto')
					@break
				@case('AMBOS')
					@include('paciente.modals.sub.armazon')
					@include('paciente.modals.sub.contacto')
					@break
				@default
					@break
			@endswitch
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><strong>Cerrar</strong></button>
			</div>
		</div>
	</div>
</div>
@endforeach