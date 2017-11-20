@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('tiposDocumento.index') }}">Tipos de documento</a></li>
  <li class="active">Crear</li>
</ol>

{!! Form::model($tipoDocumento,['route' => ['tiposDocumento.update',$tipoDocumento->id], 'method' => 'PUT']) !!}

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottom'])  !!}
<a style="text-decoration: none;" href="{{ route('tiposDocumento.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>

<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-6 separarBottom">
                {!! Form::label('sigla','Código')  !!}
                {!! Form::text('sigla',$tipoDocumento->sigla, ['class' => 'form-control', 'id'=>'sigla', 'required'])  !!}
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('tipoDocumento','Tipo de documento')  !!}
                {!! Form::text('tipoDocumento',$tipoDocumento->tipoDocumento, ['class' => 'form-control mayusculas', 'required', 'id'=>'tipoDocumento'])  !!}
            </div>
        </div>

    </div>
</div>


{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottomButtonn'])  !!}
<a style="text-decoration: none;" href="{{ route('tiposDocumento.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection