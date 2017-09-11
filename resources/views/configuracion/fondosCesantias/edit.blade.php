@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('fondosCesantias.index') }}">Fondos de cesantías</a></li>
  <li class="active">Editar</li>
</ol>


{!! Form::model($fondoCesantias,['route' => ['fondosCesantias.update',$fondoCesantias->id], 'method' => 'PUT']) !!}

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottom'])  !!}
<a style="text-decoration: none;" href="{{ route('fondosCesantias.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-6 separarBottom">
                {!! Form::label('codigo','Código')  !!}
                {!! Form::text('codigo',$fondoCesantias->codigo, ['class' => 'form-control', 'id'=>'codigo'])  !!}
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('fondoCesantias','Fondo de pensiones')  !!}
                {!! Form::text('fondoCesantias',$fondoCesantias->fondosCesantias, ['class' => 'form-control', 'required', 'id'=>'fondoPensiones'])  !!}
            </div>
        </div>

    </div>
</div>


{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottomButtonn'])  !!}
<a style="text-decoration: none;" href="{{ route('fondosCesantias.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection