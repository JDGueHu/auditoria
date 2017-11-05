@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('tipoRequisitoLegal.index') }}">Tipos de requisitos legales</a></li>
  <li class="active">Detalles</li>
</ol>

{!! Form::model($tipoRequisito) !!} 

<a style="text-decoration: none;" href="{{ route('tipoRequisitoLegal.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-6 separarBottom">
                {!! Form::label('codigo','Código')  !!}
                {!! Form::text('codigo',$tipoRequisito->codigo, ['class' => 'form-control', 'id'=>'codigo', 'readonly'])  !!}
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('tipo_requisito_legal','Tipo de requisito legal')  !!}
                {!! Form::text('tipo_requisito_legal',$tipoRequisito->tipo_requisito_legal, ['class' => 'form-control', 'required', 'id'=>'tipo_requisito_legal', 'readonly'])  !!}
            </div>
        </div>

    </div>
</div>

<a style="text-decoration: none;" href="{{ route('tipoRequisitoLegal.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection