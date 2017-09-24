@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
	  <li><a id="modulo" href="{{ route('areasEstudio.index') }}">Áreas de formación</a></li>
	</ol>

	
	<a href="{{ route('areasEstudio.create') }}" class="btn btn-primary separarTop">Crear</a>
	<a href="{{ route('listasDesplegables.index') }}" class="btn btn-default separarTop">Regresar</a>
	
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Código</th>
					<th>Nivel de estudio</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($areasEstudio as $areaEstudio)
					<tr>
						<td>{{ $areaEstudio->codigo }}</td>
						<td>{{ $areaEstudio->areaEstudio }}</td>
						<td>
							<a title="Detalles" href="{{ route('areasEstudio.show',$areaEstudio->id) }}" class="btn btn-default btn-xs">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>
							<a title="Editar" href="{{ route('areasEstudio.edit',$areaEstudio->id) }}" class="btn btn-warning btn-xs">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
							<a title="Eliminar" href="{{ route('areasEstudio.destroy',$areaEstudio->id) }}" class="btn btn-danger btn-xs confirm_F">
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