@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
	  <li><a id="modulo" href="{{ route('tipoRequisitoLegal.index') }}">Tipos de requisitos legales</a></li>
	</ol>

	
	<a href="{{ route('tipoRequisitoLegal.create') }}" class="btn btn-primary separarTop">Crear</a>
	<a href="{{ route('listasDesplegables.index') }}" class="btn btn-default separarTop">Regresar</a>
	
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Código</th>
					<th>Tipo de requisito</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($tiposRequisitos as $tipoRequisito)
					<tr>
						<td>{{ $tipoRequisito->codigo }}</td>
						<td>{{ $tipoRequisito->tipo_requisito_legal }}</td>
						<td>
							<a data-toggle="tooltip" data-placement="top" title="Detalles" href="{{ route('tipoRequisitoLegal.show',$tipoRequisito->id) }}" class="btn btn-default btn-xs">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('tipoRequisitoLegal.edit',$tipoRequisito->id) }}" class="btn btn-warning btn-xs">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Eliminar" href="{{ route('tipoRequisitoLegal.destroy',$tipoRequisito->id) }}" class="btn btn-danger btn-xs confirm_M">
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