@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('causasSST.index') }}">Causas SST</a></li>
  <li class="active">Detalles</li>
</ol>

{!! Form::model($causaSST) !!}

<a style="text-decoration: none;" href="{{ route('causasSST.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-4 separarBottom">
                {!! Form::label('codigo','Código')  !!}
                {!! Form::text('codigo', $causaSST->codigo, ['class' => 'form-control', 'id'=>'codigo','readonly'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('causa','Causa')  !!}
                {!! Form::text('causa', $causaSST->causa, ['class' => 'form-control', 'required', 'id'=>'causa','readonly'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                <label for="principal">¿Causa principal?</label>
                {!! Form::checkbox('principal', 'value', $causaSST->principal, ['class' => 'form-control checkbox', 'id'=>'principal','readonly'])!!}
            </div>
        </div>

    </div>
</div>

<a style="text-decoration: none;" href="{{ route('causasSST.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection