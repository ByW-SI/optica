@if ($paciente->crms->count() ==0)
						<p>Aun no tienes C.R.M.'s</p>
					@endif
					
					@if ($paciente->crms->count() !=0)
						<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse;margin-bottom: 0px">
							<thead>
								<tr class="info">
									<th>Fecha contacto</th>
									<th>Fecha aviso</th>
									<th>Hora</th>
									<th>Estado</th>
									<th>Forma de contacto</th>
									<th>Acuerdos</th>
									<th>Observaciones</th>
									
								</tr>
							</thead>

							@foreach($paciente->crms as $crm)
								
								<tr onclick="crm({{$crm}})" 
								title="Has Click Aquì para ver o modificar"
								style="cursor: pointer">
									<td>{{$crm->fecha_cont}}</td>
									<td>{{$crm->fecha_aviso}}</td>
									<td>{{$crm->hora}}</td>
									<td>{{$crm->tipo_cont}}</td>
									<td>{{$crm->status}}</td>
									<td>{{substr($crm->acuerdos,0,50)}}...</td>
									<td>{{substr($crm->observaciones,0,50)}}...</td>
									
								</tr>
							@endforeach
						</table>
					@endif
					