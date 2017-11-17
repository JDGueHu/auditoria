@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('areasEstudio.index') }}">Áreas de formación</a></li>
  <li class="active">Editar</li>
</ol>

{!! Form::model($areaEstudio,['route' => ['areasEstudio.update',$areaEstudio->id], 'method' => 'PUT']) !!}

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarBottom'])  !!}
<a style="text-decoration: none;" href="{{ route('areasEstudio.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>

<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-6 separarBottom">
                {!! Form::label('codigo','Código')  !!}
                {!! Form::text('codigo',$areaEstudio->codigo, ['class' => 'form-control', 'id'=>'codigo'])  !!}
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('areaEstudio','Área formación')  !!}
                {!! Form::text('areaEstudio',$areaEstudio->areaEstudio, ['class' => 'form-control mayusculas', 'id'=>'areaEstudio','required'])  !!}
            </div>
        </div>

    </div>
</div>

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottomButtonn'])  !!}
<a style="text-decoration: none;" href="{{ route('areasEstudio.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection