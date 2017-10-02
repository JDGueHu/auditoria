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
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($usuarios as $usuario)
					<tr>
						<td>{{ $usuario->name }}</td>
						<td>{{ $usuario->email }}</td>
						<td>
<!-- 							<a title="Detalles" href="{{ route('usuarios.show',$usuario->id) }}" class="btn btn-default btn-xs">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>
							<a title="Editar" href="{{ route('usuarios.edit',$usuario->id) }}" class="btn btn-warning btn-xs">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</a> -->
							<a title="Eliminar" href="{{ route('usuarios.destroy',$usuario->id) }}" class="btn btn-danger btn-xs confirm_M">
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