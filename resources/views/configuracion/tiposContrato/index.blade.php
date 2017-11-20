@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
	  <li><a id="modulo" href="{{ route('tiposContrato.index') }}">Tipos de contrato</a></li>
	</ol>

	
	<a href="{{ route('tiposContrato.create') }}" class="btn btn-primary separarTop">Crear</a>
	<a href="{{ route('listasDesplegables.index') }}" class="btn btn-default separarTop">Regresar</a>

	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Código</th>
					<th>Tipo de contrato</th>
					<th>¿Término indefinido?</th>
					<th>Estado</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($tiposContrato as $tipoContrato)
					<tr>
						<td>{{ $tipoContrato->codigo }}</td>
						<td>{{ $tipoContrato->tipoContrato }}</td>
						@if($tipoContrato->terminoIndefinido)
							<td><i style="color:#5cb85c" class="fa fa-check" aria-hidden="true"></i></td>
						@else
							<td><i style="color:#d43f3a" class="fa fa-times" aria-hidden="true"></i></td>
						@endif
						@if($tipoContrato->alive)
							<td><span class="label label-success">Activo</span></td>
						@else
							<td><span class="label label-danger">Inactivo</span></td>
						@endif
						<td>
							<a data-toggle="tooltip" data-placement="top" title="Detalles" href="{{ route('tiposContrato.show',$tipoContrato->id) }}" class="btn btn-default btn-xs">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('tiposContrato.edit',$tipoContrato->id) }}" class="btn btn-warning btn-xs">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Activar" href="{{ route('tiposContrato.activar',$tipoContrato->id) }}" class="btn btn-success btn-xs confirm_activar_M">
								<i class="fa fa-check-square-o" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Eliminar" href="{{ route('tiposContrato.destroy',$tipoContrato->id) }}" class="btn btn-danger btn-xs confirm_M">
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