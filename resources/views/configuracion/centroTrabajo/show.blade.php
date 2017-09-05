@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="#">Centros de trabajo</a></li>
  <li class="active">Ver</li>
</ol>

{!! Form::model($centroTrabajo) !!}

<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-6 separarBottom">
                {!! Form::label('identificador','Id centro de trabajo')  !!}
                {!! Form::text('identificador', $centroTrabajo->identificador, ['class' => 'form-control', 'id'=>'identificador'])  !!}
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('centroTrabajo','Centro de operación')  !!}
                {!! Form::text('centroTrabajo', $centroTrabajo->centroTrabajo, ['class' => 'form-control', 'required', 'id'=>'centroTrabajo'])  !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 separarBottom">
                {!! Form::label('riesgo','Nivel de riesgo')  !!}
                {!! Form::select('riesgo', $riesgos, $centroTrabajo->nivelRiesgo_id, ['class' => 'form-control separarBottom', 'required','id'=>'riesgo'])  !!} 
            </div>  
        </div>

    </div>
</div>



<a style="text-decoration: none;" href="{{ route('centroTrabajo.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection

@section('js')
    <script src="{{ asset('js/centroTrabajo/show.js') }}"></script>
@endsection