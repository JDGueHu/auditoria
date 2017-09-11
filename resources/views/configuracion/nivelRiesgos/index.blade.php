@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
	  <li><a id="modulo" href="{{ route('nivelRiesgos.index') }}">Riesgos</a></li>
	</ol>

	
	<a href="{{ route('nivelRiesgos.create') }}" class="btn btn-primary separarTop">Crear</a>
	<hr>
	<div class="table-responsive">
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Riesgo</th>
					<th>Valor(%)</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($nivelRiesgos as $nivelRiesgo)
					<tr>
						<td>{{ $nivelRiesgo->riesgo }}</td>
						<td>{{ $nivelRiesgo->valor }}</td>
						<td>
							<a title="Detalles" href="{{ route('nivelRiesgos.show',$nivelRiesgo->id) }}" class="btn btn-default btn-xs">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>
							<a title="Editar" href="{{ route('nivelRiesgos.edit',$nivelRiesgo->id) }}" class="btn btn-warning btn-xs">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
							<a title="Eliminar" href="{{ route('nivelRiesgos.destroy',$nivelRiesgo->id) }}" class="btn btn-danger btn-xs confirm_M">
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