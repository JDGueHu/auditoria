@extends('layouts.app')

@section('titulo','Cargos')

@section('content')

	<a href="{{ route('cargos.create') }}" class="btn btn-primary">Crear</a>
	<div class="hr"></div>
	<div class="table-responsive">
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	        <thead>
	            <tr>
	                <th>Cargo</th>
	                <th>Acciones</th>
	            </tr>
	        </thead>
	        <tbody>
	        	@foreach($cargos as $cargo)
					<tr>
						<td>{{ $cargo->cargo }}</td>
						<td>
							<a title="Ver" data-toggle="tooltip" href="{{ route('cargos.show',$cargo->id) }}" class="btn btn-default btn-xs">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							</a>
							<a title="Editar" data-toggle="tooltip" href="{{ route('cargos.edit',$cargo->id) }}" class="btn btn-warning btn-xs">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
							<a title="Inactivar" data-toggle="tooltip" href="{{ route('cargos.inactivar',$cargo->id) }}" class="btn btn-danger btn-xs confirm">
								<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
							</a>
							<a title="Activar" data-toggle="tooltip" href="{{ route('cargos.activar',$cargo->id) }}" class="btn btn-success btn-xs confirm">
								<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
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