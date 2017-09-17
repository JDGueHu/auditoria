@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('tiposContrato.index') }}">Tipos de contratos</a></li>
  <li class="active">Editar</li>
</ol>

{!! Form::model($tipoContrato,['route' => ['tiposContrato.update',$tipoContrato->id], 'method' => 'PUT']) !!}

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottom'])  !!}
<a style="text-decoration: none;" href="{{ route('tiposContrato.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-4 separarBottom">
                {!! Form::label('codigo','Código')  !!}
                {!! Form::text('codigo',$tipoContrato->codigo, ['class' => 'form-control', 'id'=>'codigo'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('tipoContrato','Tipo de contrato')  !!}
                {!! Form::text('tipoContrato',$tipoContrato->tipoContrato, ['class' => 'form-control', 'required', 'id'=>'tipoContrato'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                <label for="terminoIndefinido">¿Termino indefinido?</label>
                {!! Form::checkbox('terminoIndefinido', 'value', $tipoContrato->terminoIndefinido, ['class' => 'form-control checkbox', 'id'=>'terminoIndefinido'])!!}
            </div>
        </div>

    </div>
</div>


{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottomButtonn'])  !!}
<a style="text-decoration: none;" href="{{ route('tiposContrato.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection