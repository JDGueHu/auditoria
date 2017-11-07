@extends('layouts.appMatriz')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('roles.index') }}"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;&nbsp;Roles y responsabilidades</a></li>
  <li class="active">Matriz de roles y responsabilidades</li>
</ol>

<p style="margin-top: 2%; font-size: 16px">El Sistema de Gestión de la Seguridad y Salud en el trabajo SG-SST está bajo la responsabilidad de la gerencia con el apoyo de:</p>


<ul class="list-group">
	@foreach($roles as $rol)
		<li class="list-group-item">{{$rol->rol}}</li>
	@endforeach
</ul>

<div class="row">
  <div style="background-color: #337ab7; color: #ffffff; border-left: 1px solid black; border-top: 1px solid black; border-bottom: 1px solid black;" class="col-md-4">
  	Rol
  </div>
  <div style="background-color: #337ab7; color: #ffffff; border: 1px solid black" class="col-md-8">
  	Responsabilidades
  </div>
</div>
@foreach($roles as $rol)	
	<div class="row" style="border-left: 1px solid black; border-bottom: 1px solid black; border-right: 1px solid black">
	  <div class="col-md-4"">
	  	{{$rol->rol}}
	  </div>
	  <div class="col-md-8" style="border-left: 1px solid black;"">
	  	<ul>
	  	@foreach($responsabilidades as $responsabilidad)
	  		@if($responsabilidad->rol_id == $rol->id)
	  			<li>{{$responsabilidad->responsabilidad}}</li>	
	  		@endif	  		  		
	  	@endforeach
	  	</ul>
	  </div>
	</div>
@endforeach

@endsection