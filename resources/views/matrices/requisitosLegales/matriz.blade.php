@extends('layouts.appMatriz')

@section('content')

<ol class="breadcrumb">
      <li><a id="modulo" href="{{ route('requisitosLegales.index') }}"><i class="fa fa-gavel" aria-hidden="true"></i>&nbsp;&nbsp;Requisitos legales</a></li>
  <li class="active">Matriz de requisitos legales y otros</li>
</ol>

<div class="row" style="overflow-y: scroll; overflow-x: auto; white-space:nowrap; height: 500px">
<table class="table table-striped" style="width: 3000px">
	<thead>
		<tr style="background-color: #337ab7; color: #ffffff;">
			<th rowspan="2">Tipo</th>
			<th rowspan="2">Número y fecha</th>
			<th colspan="7" style="text-align: center;">Tipo</th>
			<th rowspan="2">Articulo</th>
			<th rowspan="2">Autoridad</th>
			<th rowspan="2">Contenido</th>
			<th rowspan="2">Estado</th>
			<th colspan="2" style="text-align: center;">Cumplimiento</th>
			<th rowspan="2">Evidencia de cumplimiento</th>
			<th rowspan="2">Responsable</th>
			<th rowspan="2">Plan de acción</th>
		</tr>
		<tr style="background-color: #337ab7; color: #ffffff">
			<th>SST</th>
			<th>AMB</th>
			<th>CAL</th>
			<th>CULT</th>
			<th>TUR</th>
			<th>ECO</th>
			<th>OTR</th>
			<th>Si</th>
			<th>No</th>

		</tr>
	</thead>
	<tbody>
		@foreach($requisitos as $requisito)
			<tr>
				<td>{{ $requisito->tipoRequisito->tipo_requisito_legal }}</td> 
				<td>{{ $requisito->numero_fecha }}</td>
				@if($requisito->sst)
					<td>X</td>
				@else
					<td></td>
				@endif
				@if($requisito->amb)
					<td>X</td>
				@else
					<td></td>
				@endif
				@if($requisito->cal)
					<td>X</td>
				@else
					<td></td>
				@endif
				@if($requisito->cult)
					<td>X</td>
				@else
					<td></td>
				@endif
				@if($requisito->tur)
					<td>X</td>
				@else
					<td></td>
				@endif
				@if($requisito->eco)
					<td>X</td>
				@else
					<td></td>
				@endif
				@if($requisito->otr)
					<td>X</td>
				@else
					<td></td>
				@endif
				<td>{{ $requisito->articulo }}</td>
				<td>{{ $requisito->autoridad->tipo_autoridad }}</td>
				<td>{{ $requisito->contenido }}</td>
				<td>{{ $requisito->estado }}</td>
				@if($requisito->cumplimiento == "Si")
					<td>X</td>
					<td></td>
				@else
					<td></td>
					<td>X</td>
				@endif
				<td>{{ $requisito->evidencia_cumplimiento }}</td>
				<td>{{ $requisito->responsable }}</td>
				<td>{{ $requisito->plan_accion }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
</div>

@endsection