@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
	  <li><a id="modulo" href="{{ route('vacaciones.index') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Ausentismos</a></li>
	</ol>

	<a href="{{ route('vacaciones.create') }}" class="btn btn-primary separarTop">Crear</a>
	
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
                    <th>Identificación</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
					<th>Tipo de ausentismo</th>
					<th>Fecha inicio</th>
					<th>Fecha fin</th>
					<th>Estado</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($ausentismos as $ausentismo)
					<tr>
                        <td>{{ $ausentismo->Empleado->identificacion }}</td> 
                        <td>{{ $ausentismo->Empleado->nombres }}</td> 
                        <td>{{ $ausentismo->Empleado->apellidos }}</td> 
						<td>{{ $ausentismo->TipoVacaciones->tipoVacaciones }}</td>
						<td>{{ $ausentismo->fechaInicio }}</td>
						<td>{{ $ausentismo->fechaFin }}</td>
						@if($ausentismo->alive)
							<td><span class="label label-success">Activo</span></td>
						@else
							<td><span class="label label-danger">Inactivo</span></td>
						@endif
						<td>
							<a data-toggle="tooltip" data-placement="top" title="Detalles" href="{{ route('vacaciones.show',$ausentismo->id) }}" class="btn btn-default btn-xs">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('vacaciones.edit',$ausentismo->id) }}" class="btn btn-warning btn-xs">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Activar" href="{{ route('vacaciones.activar',$ausentismo->id) }}" class="btn btn-success btn-xs confirm_activar_F">
								<i class="fa fa-check-square-o" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Inactivar" href="{{ route('vacaciones.destroy',$ausentismo->id) }}" class="btn btn-danger btn-xs confirm_M">
								<i class="fa fa-times" aria-hidden="true"></i>
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