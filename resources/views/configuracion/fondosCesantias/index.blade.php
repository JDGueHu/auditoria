@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
	  <li><a id="modulo" href="{{ route('fondosCesantias.index') }}">Fondos de cesantías</a></li>
	</ol>

	
	<a href="{{ route('fondosCesantias.create') }}" class="btn btn-primary separarTop">Crear</a>
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Código</th>
					<th>Fondo de pensiones</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($fondosCesantias as $fondoPensione)
					<tr>
						<td>{{ $fondoPensione->codigo }}</td>
						<td>{{ $fondoPensione->fondosCesantias }}</td>
						<td>
							<a title="Detalles" href="{{ route('fondosCesantias.show',$fondoPensione->id) }}" class="btn btn-default btn-xs">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>
							<a title="Editar" href="{{ route('fondosCesantias.edit',$fondoPensione->id) }}" class="btn btn-warning btn-xs">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
							<a title="Eliminar" href="{{ route('fondosCesantias.destroy',$fondoPensione->id) }}" class="btn btn-danger btn-xs confirm_M">
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