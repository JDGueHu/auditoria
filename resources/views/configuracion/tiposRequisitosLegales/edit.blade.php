@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('tipoRequisitoLegal.index') }}">Tipos de requisitos legales</a></li>
  <li class="active">Editar</li>
</ol>

{!! Form::model($tipoRequisito,['route' => ['tipoRequisitoLegal.update',$tipoRequisito->id], 'method' => 'PUT']) !!}

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottom'])  !!}
<a style="text-decoration: none;" href="{{ route('tipoRequisitoLegal.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-6 separarBottom">
                {!! Form::label('codigo','Código')  !!}
                {!! Form::text('codigo',$tipoRequisito->codigo, ['class' => 'form-control', 'id'=>'codigo'])  !!}
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('tipo_requisito_legal','Tipo de requisito legal')  !!}
                {!! Form::text('tipo_requisito_legal',$tipoRequisito->tipo_requisito_legal, ['class' => 'form-control', 'required', 'id'=>'tipo_requisito_legal'])  !!}
            </div>
        </div>

    </div>
</div>


{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottomButtonn'])  !!}
<a style="text-decoration: none;" href="{{ route('tipoRequisitoLegal.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection