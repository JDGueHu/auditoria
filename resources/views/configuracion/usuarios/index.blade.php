@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
	  <li><a id="modulo" href="{{ route('usuarios.index') }}"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Usuarios</a></li>
	</ol>
	
	<a href="{{ route('usuarios.create') }}" class="btn btn-primary separarTop">Crear</a>
	
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Nombre y apellidos</th>
					<th>Correo electrónico</th>
					<th>Estado</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($usuarios as $usuario)
					<tr>
						<td>{{ $usuario->name }}</td>
						<td>{{ $usuario->email }}</td>
						@if($usuario->alive)
							<td><span class="label label-success">Activo</span></td>
						@else
							<td><span class="label label-danger">Inactivo</span></td>
						@endif
						<td>
<!-- 							<a title="Detalles" href="{{ route('usuarios.show',$usuario->id) }}" class="btn btn-default btn-xs">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a> -->
							<a data-toggle="tooltip" data-placement="top" title="Activar" href="{{ route('usuarios.activar',$usuario->id) }}" class="btn btn-success btn-xs">
								<i class="fa fa-check-square-o" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Inactivar" href="{{ route('usuarios.destroy',$usuario->id) }}" class="btn btn-danger btn-xs confirm_M">
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