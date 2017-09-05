@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
	  <li><a id="modulo" href="{{ route('centroTrabajo.index') }}">Centros de trabajo</a></li>
	</ol>

	
	<a href="{{ route('centroTrabajo.create') }}" class="btn btn-primary separarTop">Crear</a>
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Identificador</th>
					<th>Centro de trabajo</th>
					<th>Riesgo</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($centrosTrabajo as $centroTrabajo)
					<tr>
						<td>{{ $centroTrabajo->identificador }}</td>
						<td>{{ $centroTrabajo->centroTrabajo }}</td>
						<td>{{ $centroTrabajo->NivelRiesgo->riesgo.' - '.$centroTrabajo->NivelRiesgo->valor.'%' }}</td>
						<td>
							<a title="Ver" href="{{ route('centroTrabajo.show',$centroTrabajo->id) }}" class="btn btn-default btn-xs">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>
							<a title="Editar" href="{{ route('centroTrabajo.edit',$centroTrabajo->id) }}" class="btn btn-warning btn-xs">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
							<a title="Eliminar" href="{{ route('centroTrabajo.destroy',$centroTrabajo->id) }}" class="btn btn-danger btn-xs confirm_M">
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
	<script src="{{ asset('js/centroTrabajo/confirm.js') }}"></script>
@endsection