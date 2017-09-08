@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
	  <li><a id="modulo" href="{{ route('centroTrabajo.index') }}">Empleados</a></li>
	</ol>

	
	<a href="{{ route('empleados.create') }}" class="btn btn-primary separarTop">Crear</a>
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Identificación</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Centro de trabajo</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($empleados as $empleado)
					<tr>
						<td>{{ $empleado->identificacion }}</td>
						<td>{{ $empleado->nombres }}</td>
						<td>{{ $empleado->apellidos }}</td>
						<td>{{ $empleado->CentroTrabajo->centroTrabajo }}</td>
						<td>
							<a title="Ver" href="{{ route('empleados.show',$empleado->id) }}" class="btn btn-default btn-xs">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>
							<a title="Editar" href="{{ route('empleados.edit',$empleado->id) }}" class="btn btn-warning btn-xs">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
							<a title="Eliminar" href="{{ route('empleados.destroy',$empleado->id) }}" class="btn btn-danger btn-xs confirm_M">
								<i class="fa fa-trash-o" aria-hidden="true"></i>
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection

@section('js')
	<script src="{{ asset('js/table.js') }}"></script>
	<script src="{{ asset('js/confirm.js') }}"></script>
@endsection