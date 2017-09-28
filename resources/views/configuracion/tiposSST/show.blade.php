@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('tiposSST.index') }}">Tipos de SST</a></li>
  <li class="active">Detalles</li>
</ol>

{!! Form::model($tipoSST) !!} 

<a style="text-decoration: none;" href="{{ route('tiposSST.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>

<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-6 separarBottom">
                {!! Form::label('codigo','Código')  !!}
                {!! Form::text('codigo',$tipoSST->codigo, ['class' => 'form-control', 'id'=>'codigo', 'required','readonly'])  !!}
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('tipoSST','Tipo de SST')  !!}
                {!! Form::text('tipoSST',$tipoSST->tipoSST, ['class' => 'form-control', 'required', 'id'=>'tipoSST','readonly'])  !!}
            </div>
        </div>

    </div>
</div>

<a style="text-decoration: none;" href="{{ route('tiposSST.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection
