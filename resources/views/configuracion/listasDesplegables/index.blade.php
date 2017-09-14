@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
	  <li><a id="modulo" href="{{ route('listasDesplegables.index') }}"><i class="fa fa-angle-double-down" aria-hidden="true"></i>&nbsp;&nbsp;Listas desplegables</a></li>
	</ol>

	<div class="list-group">
	  <a href="{{ route('arl.index') }}" class="list-group-item list-group-item-action">ARL</a>
      <a href="{{ route('cargos.index') }}" class="list-group-item list-group-item-action">Cargos</a>
      <a href="{{ route('centroTrabajo.index') }}" class="list-group-item list-group-item-action">Centros de trabajo</a>
      <a href="{{ route('eps.index') }}" class="list-group-item list-group-item-action">EPS</a>
      <a href="{{ route('fondosCesantias.index') }}" class="list-group-item list-group-item-action">Fondos de cesantias</a>
      <a href="{{ route('fondosPensiones.index') }}" class="list-group-item list-group-item-action">Fondos de pensiones</a>
      <a href="{{ route('nivelRiesgos.index') }}" class="list-group-item list-group-item-action">Riesgos</a>
      <a href="{{ route('tiposContrato.index') }}" class="list-group-item list-group-item-action">Tipos de contrato</a>
      <a href="{{ route('tiposDocumento.index') }}" class="list-group-item list-group-item-action">Tipos de documento</a>

	</div>
@endsection
