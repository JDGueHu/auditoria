@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('eps.index') }}">EPS</a></li>
  <li class="active">Ver</li>
</ol>


{!! Form::model($eps) !!}

<a style="text-decoration: none;" href="{{ route('eps.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-6 separarBottom">
                {!! Form::label('codigo','Código')  !!}
                {!! Form::text('codigo',$eps->codigo, ['class' => 'form-control', 'id'=>'codigo'])  !!}
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('eps','EPS')  !!}
                {!! Form::text('eps',$eps->eps, ['class' => 'form-control', 'required', 'id'=>'eps'])  !!}
            </div>
        </div>

    </div>
</div>


<a style="text-decoration: none;" href="{{ route('eps.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection

@section('js')
    <script src="{{ asset('js/eps/show.js') }}"></script>
@endsection