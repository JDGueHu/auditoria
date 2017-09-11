@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('tiposDocumento.index') }}">Tipos de documento</a></li>
  <li class="active">Ver</li>
</ol>

{!! Form::model($tipoDocumento) !!} 

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
                {!! Form::text('tipoDocumento',$tipoDocumento->tipoDocumento, ['class' => 'form-control', 'required', 'id'=>'tipoDocumento'])  !!}
            </div>
        </div>

    </div>
</div>

<a style="text-decoration: none;" href="{{ route('tiposDocumento.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection

@section('js')
    <script src="{{ asset('js/tiposDocumento/show.js') }}"></script>
@endsection