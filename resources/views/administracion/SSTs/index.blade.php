@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
	  <li><a id="modulo" href="{{ route('SST.index') }}"><i class="fa fa-shield" aria-hidden="true"></i>&nbsp;SST (Seguridad y Salud en el Trabajo)</a></li>
	</ol>

	<a href="{{ route('SST.create') }}" class="btn btn-primary separarTop">Crear</a>
	
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
                    <th>Tipo SST</th>
					<th>Fecha</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($SSTs as $SST)
					<tr>
						<td>{{ $SST->tipoSST_id }}</td>
						<td>{{ $SST->fechaSST }}</td>
						<td>
							<a title="Detalles" href="{{ route('SST.show',$SST->id) }}" class="btn btn-default btn-xs">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>
							<a title="Editar" href="{{ route('SST.edit',$SST->id) }}" class="btn btn-warning btn-xs">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
							<a title="Eliminar" href="{{ route('SST.destroy',$SST->id) }}" class="btn btn-danger btn-xs confirm_F">
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