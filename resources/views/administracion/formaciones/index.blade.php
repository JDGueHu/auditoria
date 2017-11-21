@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
	  <li><a id="modulo" href="{{ route('formaciones.index') }}"><i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;&nbsp;Formaciones</a></li>
	</ol>

	
	<a href="{{ route('formaciones.create') }}" class="btn btn-primary separarTop">Crear</a>
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
                    <th>Identificación</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
					<th>Tipo formación</th>
					<th>Nivel de formación</th>
					<th>Área de formación</th>
					<th>Estado formación</th>
					<th>Estado</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($formaciones as $formacion)
					<tr>
                        <td>{{ $formacion->Empleado->identificacion }}</td> 
                        <td>{{ $formacion->Empleado->nombres }}</td> 
                        <td>{{ $formacion->Empleado->apellidos }}</td>  
						<td>{{ $formacion->tipoEstudio }}</td>
						<td>{{ $formacion->NivelEstudio->nivelEstudio }}</td>
						<td>{{ $formacion->AreaEstudio->areaEstudio }}</td>
						<td>{{ $formacion->estado }}</td>
						@if($formacion->alive)
							<td><span class="label label-success">Activo</span></td>
						@else
							<td><span class="label label-danger">Inactivo</span></td>
						@endif
						<td>
							<a data-toggle="tooltip" data-placement="top" title="Detalles" href="{{ route('formaciones.show',$formacion->id) }}" class="btn btn-default btn-xs">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('formaciones.edit',$formacion->id) }}" class="btn btn-warning btn-xs">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Activar" href="{{ route('formaciones.activar',$formacion->id) }}" class="btn btn-success btn-xs confirm_activar_F">
								<i class="fa fa-check-square-o" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Inactivar" href="{{ route('formaciones.destroy',$formacion->id) }}" class="btn btn-danger btn-xs confirm_F">
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