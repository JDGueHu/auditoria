@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('areasEstudio.index') }}">Áreas de formación</a></li>
  <li class="active">Detalles</li>
</ol>

{!! Form::model($areaEstudio) !!}

<a style="text-decoration: none;" href="{{ route('areasEstudio.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-6 separarBottom">
                {!! Form::label('codigo','Código')  !!}
                {!! Form::text('codigo',$areaEstudio->codigo, ['class' => 'form-control', 'id'=>'codigo','readonly'])  !!}
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('areaEstudio','Área formación')  !!}
                {!! Form::text('areaEstudio',$areaEstudio->areaEstudio, ['class' => 'form-control', 'required', 'id'=>'areaEstudio','readonly'])  !!}
            </div>
        </div>

    </div>
</div>

<a style="text-decoration: none;" href="{{ route('areasEstudio.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection