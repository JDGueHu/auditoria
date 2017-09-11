@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('arl.index') }}">ARL</a></li>
  <li class="active">Detalles</li>
</ol>


{!! Form::model($arl) !!}

<a style="text-decoration: none;" href="{{ route('arl.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>


<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-6 separarBottom">
                {!! Form::label('codigo','Código')  !!}
                {!! Form::text('codigo',$arl->codigo, ['class' => 'form-control', 'id'=>'codigo'])  !!}
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('arl','ARL')  !!}
                {!! Form::text('arl',$arl->arl, ['class' => 'form-control', 'required', 'id'=>'arl'])  !!}
            </div>
        </div>

    </div>
</div>


<a style="text-decoration: none;" href="{{ route('arl.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection

@section('js')
    <script src="{{ asset('js/arl/show.js') }}"></script>
@endsection