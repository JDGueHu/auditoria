
<div class="table-responsive"> 
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Tipo identificación</th>
				<th>Identificación</th>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Seleccionar</th>
			</tr>
		</thead>
		<tbody>
			@foreach($empleados as $empleado)
				<tr>
					<td>{{ $empleado->tipoDocumento }}</td>
					<td>{{ $empleado->identificacion }}</td>
					<td>{{ $empleado->nombres }}</td>
					<td>{{ $empleado->apellidos }}</td>
					<td style="text-align: center;">
						<a title="Detalles" class="btn btn-success btn-xs empleadoSel">
							<i class="fa fa-check" aria-hidden="true"></i>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

<script src="{{ asset('plugins/jquery/js/jquery-3.1.1.js') }}"></script>
<script src="{{ asset('plugins/dataTable/js/jquery.dataTables.min.js') }}"></script>  
<script src="{{ asset('js/tableBasic.js') }}"></script>
<script src="{{ asset('js/contratos/buscarEmpleado.js') }}"></script>
