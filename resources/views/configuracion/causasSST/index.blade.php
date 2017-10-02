@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
	  <li><a id="modulo" href="{{ route('causasSST.index') }}">Causas SST</a></li>
	</ol>

	
	<a href="{{ route('causasSST.create') }}" class="btn btn-primary separarTop">Crear</a>
	<a href="{{ route('listasDesplegables.index') }}" class="btn btn-default separarTop">Regresar</a>
	
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Código</th>
					<th>Causa</th>
					<th>Tipo causa</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($causasSST as $causaSST)
					<tr>
						<td>{{ $causaSST->codigo }}</td>
						<td>{{ $causaSST->causa }}</td>
						@if ($causaSST->principal)
						    <td><span class="label label-success">Principal</span></td>
						@else
						    <td><span class="label label-warning">Complementaria</span></td>
						@endif
						
						<td>
							<a data-toggle="tooltip" data-placement="top" title="Detalles" href="{{ route('causasSST.show',$causaSST->id) }}" class="btn btn-default btn-xs">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('causasSST.edit',$causaSST->id) }}" class="btn btn-warning btn-xs">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Eliminar" href="{{ route('causasSST.destroy',$causaSST->id) }}" class="btn btn-danger btn-xs confirm_F">
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