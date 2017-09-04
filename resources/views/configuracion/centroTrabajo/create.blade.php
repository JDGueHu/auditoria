@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="#">Centros de trabajo</a></li>
  <li class="active">Crear</li>
</ol>

{!! Form::open(['route' => 'centroTrabajo.store', 'method' => 'POST']) !!}

<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-6 separarBottom">
                {!! Form::label('id','Id centro de trabajo')  !!}
                {!! Form::text('id',null, ['class' => 'form-control', 'id'=>'id'])  !!}
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('nombre','Centro de operación')  !!}
                {!! Form::text('nombre',null, ['class' => 'form-control', 'required', 'id'=>'nombre'])  !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 separarBottom">
                {!! Form::label('riesgo','Nivel de riesgo')  !!}
                {!! Form::select('riesgo', ['' => '', '1' => '1', '2' => '2'], null, ['class' => 'form-control separarBottom', 'required','id'=>'riesgo'])  !!} 
            </div>  
        </div>

    </div>
</div>



<a style="text-decoration: none;" href="#">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>
{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottomButtonn'])  !!}
{!! Form::close() !!}

@endsection