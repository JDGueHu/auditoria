@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
	  <li><a id="modulo" href="{{ route('nivelesEstudio.index') }}">Niveles de formación</a></li>
	</ol>

	
	<a href="{{ route('nivelesEstudio.create') }}" class="btn btn-primary separarTop">Crear</a>
	<a href="{{ route('listasDesplegables.index') }}" class="btn btn-default separarTop">Regresar</a>
	
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Código</th>
					<th>Nivel de estudio</th>
					<th>Orden</th>
					<th>CategoríaCategoría</th>
					<th>Estado</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($nivelesEstudio as $nivelEstudio)
					<tr>
						<td>{{ $nivelEstudio->codigo }}</td>
						<td>{{ $nivelEstudio->nivelEstudio }}</td>
						<td>{{ $nivelEstudio->orden }}</td>
						<td>{{ $nivelEstudio->tipoEstudio }}</td>
						@if($nivelEstudio->alive)
							<td><span class="label label-success">Activo</span></td>
						@else
							<td><span class="label label-danger">Inactivo</span></td>
						@endif
						<td>
							<a data-toggle="tooltip" data-placement="top" title="Detalles" href="{{ route('nivelesEstudio.show',$nivelEstudio->id) }}" class="btn btn-default btn-xs">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('nivelesEstudio.edit',$nivelEstudio->id) }}" class="btn btn-warning btn-xs">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Activar" href="{{ route('nivelesEstudio.activar',$nivelEstudio->id) }}" class="btn btn-success btn-xs confirm_activar_M">
								<i class="fa fa-check-square-o" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Eliminar" href="{{ route('nivelesEstudio.destroy',$nivelEstudio->id) }}" class="btn btn-danger btn-xs confirm_M">
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