@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('autoridadRequisitoLegal.index') }}">Autoridades de requisitos legales</a></li>
  <li class="active">Detalles</li>
</ol>

{!! Form::model($autoridad) !!} 

<a style="text-decoration: none;" href="{{ route('autoridadRequisitoLegal.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-6 separarBottom">
                {!! Form::label('codigo','Código')  !!}
                {!! Form::text('codigo',$autoridad->codigo, ['class' => 'form-control', 'id'=>'codigo', 'readonly'])  !!}
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('tipo_autoridad','Autoridad requisito legal')  !!}
                {!! Form::text('tipo_autoridad',$autoridad->tipo_autoridad, ['class' => 'form-control', 'readonly', 'id'=>'tipo_autoridad'])  !!}
            </div>
        </div>

    </div>
</div>

<a style="text-decoration: none;" href="{{ route('autoridadRequisitoLegal.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection