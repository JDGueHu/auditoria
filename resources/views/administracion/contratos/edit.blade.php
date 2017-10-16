@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('contratos.index') }}"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;Contratos</a></li>
  <li class="active">Editar</li>
</ol>

{!! Form::model($contrato,['route' => ['contratos.update',$contrato[0]->id], 'method' => 'PUT','id'=>'contrato','enctype' => 'multipart/form-data']) !!}

{!! Form::button('Guardar', ['class'=>'btn btn-primary botonEditarTop']) !!}
<a style="text-decoration: none;" href="{{ route('contratos.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>

<h1 id="nombreEmpleado">{{$contrato[0]->nombres}} {{$contrato[0]->apellidos}}</h1>
<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-4 separarBottom">
                {!! Form::label('tipoIdentificacion','Tipo identificación')  !!}
                {!! Form::text('tipoIdentificacion',$contrato[0]->tipoDocumento, ['class' => 'form-control', 'id'=>'tipoIdentificacion', 'required', 'readonly'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('identificacion','Identificación')  !!}
                {!! Form::text('identificacion',$contrato[0]->identificacion, ['class' => 'form-control', 'required', 'id'=>'identificacion', 'readonly'])  !!}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4 separarBottom">
                {!! Form::label('tipoContrato','Tipo de contrato')  !!}
                {!! Form::select('tipoContrato', $tiposContrato, $contrato[0]->tipoContrato_id, ['class' => 'form-control', 'placeholder' => 'Seleccione un tipo de contrato','id'=>'tipoContrato',])  !!} 
            </div> 
            <div class="col-md-4 separarBottom">
                {!! Form::label('fechaInicio','Fecha inicio')  !!}
                {!! Form::date('fechaInicio',$contrato[0]->fechaInicio, ['class' => 'form-control', 'id'=>'fechaInicio'])  !!}
            </div> 
            <div class="col-md-4 separarBottom">
                {!! Form::label('duracion','Duración (Meses)')  !!}
                {!! Form::number('duracion',$contrato[0]->duracion, ['class' => 'form-control', 'id'=>'duracion'])  !!}
            </div> 
        </div>
        <div class="row">
            <div class="col-md-4 separarBottom">
                {!! Form::label('fechaFin','Fecha finalización')  !!}
                {!! Form::date('fechaFin',$contrato[0]->fechaFin, ['class' => 'form-control', 'id'=>'fechaFin','readonly'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('estadContrato','Estado')  !!}
                {!! Form::select('estadContrato', ['Activo'=>'Activo','Finalizado'=>'Finalizado'], $contrato[0]->estado, ['class' => 'form-control', 'placeholder' => 'Seleccione un estado','id'=>'estadContrato'])  !!} 
            </div> 
            <div class="col-md-4 separarBottom">
                {!! Form::label('adjunto','Adjunto')  !!}
                {{ Form::file('adjunto', ['class' => 'form-control','id'=>'adjunto']) }}
                <a title="Adjunto" href="{{ $contrato[0]->adjunto }}" target="_blank">
                    {{ $contrato[0]->adjunto  }}
                </a>
            </div> 
        </div>
        <div class="row">
            <div class="col-md-12 separarBottom">
                {!! Form::label('detalles','Detalles')  !!}
                {{ Form::textarea('detalles', $contrato[0]->detalles, ['size' => '3x3','class' => 'form-control', 'placeholder' => 'Detalles de contratación','id'=>'detalles']) }}
            </div> 
        </div>

    </div>
</div>

{!! Form::button('Guardar', ['class'=>'btn btn-primary separarTop separarBottomButtonn botonEditarTop']) !!}
<a style="text-decoration: none;" href="{{ route('contratos.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

<input type="hidden" id="empleado_id" name="empleado_id" value="{{$contrato[0]->empleado_id}}">

{!! Form::close() !!}


@endsection

@section('js')
    <script src="{{ asset('js/contratos/shared.js') }}"></script>
    <script src="{{ asset('js/shared.js') }}"></script>
@endsection