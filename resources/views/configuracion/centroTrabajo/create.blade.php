@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('centroTrabajo.index') }}">Centros de trabajo</a></li>
  <li class="active">Crear</li>
</ol>

{!! Form::open(['route' => 'centroTrabajo.store', 'method' => 'POST']) !!}

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottom'])  !!}
<a style="text-decoration: none;" href="{{ route('centroTrabajo.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>

<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-6 separarBottom">
                {!! Form::label('identificador','Id centro de trabajo')  !!}
                {!! Form::text('identificador',null, ['class' => 'form-control', 'id'=>'identificador'])  !!}
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('centroTrabajo','Centro de operación')  !!}
                {!! Form::text('centroTrabajo',null, ['class' => 'form-control mayusculas', 'required', 'id'=>'centroTrabajo'])  !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 separarBottom">
                {!! Form::label('riesgo','Nivel de riesgo')  !!}
                {!! Form::select('riesgo', $riesgos, null, ['class' => 'form-control separarBottom', 'required','id'=>'riesgo', 'placeholder' => 'Sleccione un riesgo'])  !!} 
            </div>  
        </div>

    </div>
</div>

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottomButtonn'])  !!}
<a style="text-decoration: none;" href="{{ route('centroTrabajo.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>
{!! Form::close() !!}

@endsection