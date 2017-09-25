@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
	  <li><a id="modulo" href="{{ route('examenes.index') }}"><i class="fa fa-heartbeat" aria-hidden="true"></i>&nbsp;&nbsp;Exámenes</a></li>
	</ol>

	
	<a href="{{ route('examenes.create') }}" class="btn btn-primary separarTop">Crear</a>
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
                    <th>Identificación</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
					<th>Tipo examen</th>
					<th>Fecha</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($examenes as $examen)
					<tr>
                        <td>{{ $examen->Empleado->identificacion }}</td> 
                        <td>{{ $examen->Empleado->nombres }}</td> 
                        <td>{{ $examen->Empleado->apellidos }}</td> 
						<td>{{ $examen->tipoExamen }}</td>
						<td>{{ $examen->fechaExamen }}</td>
						<td>
							<a title="Detalles" href="{{ route('examenes.show',$examen->id) }}" class="btn btn-default btn-xs">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>
							<a title="Editar" href="{{ route('examenes.edit',$examen->id) }}" class="btn btn-warning btn-xs">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
							<a title="Eliminar" href="{{ route('examenes.destroy',$examen->id) }}" class="btn btn-danger btn-xs confirm_M">
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