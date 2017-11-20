@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('tiposVacaciones.index') }}">Tipos de vacaciones</a></li>
  <li class="active">Detalles</li>
</ol>

{!! Form::model($tipoVacaciones,['route' => ['tiposVacaciones.update',$tipoVacaciones->id], 'method' => 'PUT']) !!}

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottom'])  !!}
<a style="text-decoration: none;" href="{{ route('tiposVacaciones.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-6 separarBottom">
                {!! Form::label('codigo','Código')  !!}
                {!! Form::text('codigo',$tipoVacaciones->codigo, ['class' => 'form-control', 'id'=>'codigo'])  !!}
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('tipoVacaciones','Tipo de ausentismo')  !!}
                {!! Form::text('tipoVacaciones',$tipoVacaciones->tipoVacaciones, ['class' => 'form-control mayusculas', 'required', 'id'=>'tipoVacaciones'])  !!}
            </div>
        </div>

    </div>
</div>

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottomButtonn'])  !!}
<a style="text-decoration: none;" href="{{ route('tiposVacaciones.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection