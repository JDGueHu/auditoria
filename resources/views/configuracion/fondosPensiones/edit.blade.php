@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('fondosPensiones.index') }}">Fondos de pensiones</a></li>
  <li class="active">Editar</li>
</ol>


{!! Form::model($fondoPensiones,['route' => ['fondosPensiones.update',$fondoPensiones->id], 'method' => 'PUT']) !!}

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottom'])  !!}
<a style="text-decoration: none;" href="{{ route('fondosPensiones.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-6 separarBottom">
                {!! Form::label('codigo','Código')  !!}
                {!! Form::text('codigo',$fondoPensiones->codigo, ['class' => 'form-control', 'id'=>'codigo'])  !!}
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('fondoPensiones','Fondo de pensiones')  !!}
                {!! Form::text('fondoPensiones',$fondoPensiones->fondosPensiones, ['class' => 'form-control mayusculas', 'required', 'id'=>'fondoPensiones'])  !!}
            </div>
        </div>

    </div>
</div>


{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottomButtonn'])  !!}
<a style="text-decoration: none;" href="{{ route('fondosPensiones.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection