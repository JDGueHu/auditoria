@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('cargos.index') }}">Cargos</a></li>
  <li class="active">Detalles</li>
</ol>

{!! Form::model($cargo) !!}

<a style="text-decoration: none;" href="{{ route('cargos.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>

<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-6 separarBottom">
                {!! Form::label('codigo','Código')  !!}
                {!! Form::text('codigo',$cargo->codigo, ['class' => 'form-control', 'id'=>'codigo'])  !!}
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('cargo','Cargo')  !!}
                {!! Form::text('cargo',$cargo->cargo, ['class' => 'form-control', 'required', 'id'=>'cargo'])  !!}
            </div>
        </div>

    </div>
</div>


<a style="text-decoration: none;" href="{{ route('cargos.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection

@section('js')
    <script src="{{ asset('js/cargos/show.js') }}"></script>
@endsection