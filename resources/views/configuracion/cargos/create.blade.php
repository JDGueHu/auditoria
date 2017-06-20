@extends('layouts.app')

@section('titulo','Cargos/Crear')

@section('content')

{!! Form::open(['route' => 'cargos.store', 'method' => 'POST']) !!}

	<div class="form-group">
		{!! Form::label('cargo','Cargo')  !!}
		{!! Form::text('area',null,['class' => 'form-control separarBottom', 'required','placeholder' => 'Nombre del cargo','id'=>'cargo'])  !!}
	</div>

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('cargos.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>

{!! Form::close() !!}


@endsection