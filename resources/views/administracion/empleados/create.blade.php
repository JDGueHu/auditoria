@extends('layouts.app')

@section('titulo','Empleados/Crear')

@section('content')

{!! Form::open(['route' => 'empleados.store', 'method' => 'POST']) !!}

	<div class="row">
	  <div class="col-md-6">
		{!! Form::label('tipo_documento','Tipo documento de identidad')  !!}
		{!! Form::select('tipo_documento', ['' => 'Seleccione una opcion'], null, ['class' => 'form-control separarBottom', 'required', 'placeholder' => 'Sleccione un tipo de documento','id'=>'tipo_documento'])  !!}	
	  </div>
	  <div class="col-md-6">
	  	{!! Form::label('identificacion','Número de documento de identidad')  !!}
		{!! Form::number('identificacion',null, ['class' => 'form-control separarBottom', 'required', 'id'=>'identificacion'])  !!}
	  </div>
	</div>

	<div class="row">
	  <div class="col-md-6">
		{!! Form::label('nombres','Nombres')  !!}
		{!! Form::text('nombres',null,['class' => 'form-control separarBottom', 'required','placeholder' => 'Nombres','id'=>'nombres'])  !!}
	  </div>
	  <div class="col-md-6">
		{!! Form::label('apellidos','Apellidos')  !!}
		{!! Form::text('apellidos',null,['class' => 'form-control separarBottom', 'required','placeholder' => 'Apellidos','id'=>'apellidos'])  !!}
	  </div>
	</div>

	<div class="row">
	  <div class="col-md-6">
		{!! Form::label('grupo_sanguineo','Grupo sanguineo')  !!}
		{!! Form::select('grupo_sanguineo', ['' => 'Seleccione una opcion'], null, ['class' => 'form-control separarBottom', 'required','id'=>'grupo_sanguineo'])  !!}	
	  </div>
	  <div class="col-md-6">
		{!! Form::label('rh','Factor RH')  !!}
		{!! Form::select('rh', ['' => 'Seleccione una opcion'], null, ['class' => 'form-control separarBottom', 'required','id'=>'rh'])  !!}
	  </div>
	</div>

	<div class="row">
	  <div class="col-md-6">
		{!! Form::label('sexo','Sexo')  !!}
		{!! Form::select('sexo', ['' => 'Seleccione una opcion'], null, ['class' => 'form-control separarBottom', 'required','id'=>'sexo'])  !!}	
	  </div>
	  <div class="col-md-6">
		{!! Form::label('estado_civil','Estado civil')  !!}
		{!! Form::select('estado_civil', ['' => 'Seleccione una opcion'], null, ['class' => 'form-control separarBottom', 'required','id'=>'estado_civil'])  !!}
	  </div>
	</div>

	<div class="row">
	  <div class="col-md-6">
		{!! Form::label('fecha_nacimiento','Fecha de nacimiento')  !!}
		{!! Form::date('fecha_nacimiento', null, ['class' => 'form-control separarBottom','required','id'=>'fecha_nacimiento'])!!}	
	  </div>
	  <div class="col-md-6">
		{!! Form::label('numero_hijos','Número de hijos')  !!}
		{!! Form::number('numero_hijos',null, ['class' => 'form-control separarBottom','id'=>'numero_hijos'])  !!}
	  </div>
	</div>

	<div class="row">
	  <div class="col-md-6">
		{!! Form::label('telefono_fijo','Teléfono fijo')  !!}
		{!! Form::number('telefono_fijo',null, ['class' => 'form-control separarBottom','id'=>'telefono_fijo'])  !!}	
	  </div>
	  <div class="col-md-6">
		{!! Form::label('telefono_celular','Teléfono celular')  !!}
		{!! Form::number('telefono_celular',null, ['class' => 'form-control separarBottom','id'=>'telefono_celular'])  !!}
	  </div>
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('empleados.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>

{!! Form::close() !!}


@endsection