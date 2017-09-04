@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('nivelRiesgos.index') }}">Riesgo</a></li>
  <li class="active">Crear</li>
</ol>

{!! Form::open(['route' => 'nivelRiesgos.store', 'method' => 'POST']) !!}

<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-6 separarBottom">
                {!! Form::label('riesgo','Riesgo')  !!}
                {!! Form::text('riesgo',null, ['class' => 'form-control', 'id'=>'riesgo', 'required'])  !!}
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('valor','Valor(%)')  !!}
                {!! Form::number('valor',null, ['class' => 'form-control', 'required', 'id'=>'valor', 'step'=>'0.0001'])  !!}
            </div>
        </div>

    </div>
</div>


{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottomButtonn'])  !!}
<a style="text-decoration: none;" href="{{ route('nivelRiesgos.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection