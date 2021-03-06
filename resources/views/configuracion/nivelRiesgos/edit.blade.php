@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('nivelRiesgos.index') }}">Nivel de riesgo</a></li>
  <li class="active">Editar</li>
</ol>

{!! Form::model($nivelRiesgo,['route' => ['nivelRiesgos.update',$nivelRiesgo->id], 'method' => 'PUT']) !!}

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottom'])  !!}
<a style="text-decoration: none;" href="{{ route('nivelRiesgos.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>

<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-6 separarBottom">
                {!! Form::label('riesgo','Riesgo')  !!}
                {!! Form::text('riesgo',$nivelRiesgo->riesgo, ['class' => 'form-control', 'id'=>'riesgo', 'required'])  !!}
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('valor','Valor(%)')  !!}
                {!! Form::number('valor',$nivelRiesgo->valor, ['class' => 'form-control mayusculas', 'required', 'id'=>'valor', 'step'=>'0.0001'])  !!}
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