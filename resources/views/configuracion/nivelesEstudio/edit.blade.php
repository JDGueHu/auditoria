@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('nivelesEstudio.index') }}">Niveles de formación</a></li>
  <li class="active">Editar</li>
</ol>

{!! Form::model($nivelEstudio,['route' => ['nivelesEstudio.update',$nivelEstudio->id], 'method' => 'PUT']) !!}

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottom'])  !!}
<a style="text-decoration: none;" href="{{ route('nivelesEstudio.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-4 separarBottom">
                {!! Form::label('codigo','Código')  !!}
                {!! Form::text('codigo',$nivelEstudio->codigo, ['class' => 'form-control', 'id'=>'codigo'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('nivelEstudio','Nivel de estudio')  !!}
                {!! Form::text('nivelEstudio',$nivelEstudio->nivelEstudio, ['class' => 'form-control', 'required', 'id'=>'nivelEstudio'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('orden','Orden')  !!}
                {!! Form::number('orden',$nivelEstudio->orden, ['class' => 'form-control', 'required', 'id'=>'orden'])  !!}
            </div>
        </div>

        <div class="row">   
            <div class="col-md-4 separarBottom">
                {!! Form::label('tipoEstudio','Categoría')  !!}
                {!! Form::select('tipoEstudio', ['Academica'=>'Academica','Complementaria'=>'Complementaria'], $nivelEstudio->tipoEstudio, ['class' => 'form-control separarBottom', 'required', 'placeholder' => 'Seleccione un tipo de estudio','id'=>'tipoEstudio'])  !!} 
            </div>
        </div>

    </div>
</div>


{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottomButtonn'])  !!}
<a style="text-decoration: none;" href="{{ route('nivelesEstudio.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection