@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('adjuntos.index') }}"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;&nbsp;Adjuntos</a></li>
  <li class="active">Crear</li>
</ol>

{!! Form::model($adjunto) !!}

<a style="text-decoration: none;" href="{{ route('adjuntos.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>

<h1 id="nombreEmpleado">{{$empleado[0]->nombres}} {{$empleado[0]->apellidos}}</h1>
<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-4 separarBottom">
                {!! Form::label('tipoIdentificacion','Tipo identificación')  !!}
                {!! Form::text('tipoIdentificacion',$empleado[0]->tipoDocumento, ['class' => 'form-control', 'id'=>'tipoIdentificacion', 'required', 'readonly'])  !!}
                {!! Form::label('tipoIdentificacion','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoTipoIdentificacionEmpleado'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('identificacion','Identificación')  !!}
                {!! Form::text('identificacion',$empleado[0]->tipoDocumento, ['class' => 'form-control', 'required', 'id'=>'identificacion', 'readonly'])  !!}
                {!! Form::label('identificacion','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoIdentificacionEmpleado'])  !!}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4 separarBottom">
                {!! Form::label('nombre','Nombre')  !!}
                {!! Form::text('nombre',$adjunto->nombre, ['class' => 'form-control', 'id'=>'nombre','readonly'])  !!}
                {!! Form::label('nombre','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoNombreAdjunto'])  !!}
            </div>
            <div class="col-md-8 separarBottom">
                {!! Form::label('ruta','Ruta')  !!}                
                <a title="Adjunto" href="{{ $adjunto->ruta }}" target="_blank">
                    {{ $adjunto->ruta }}
                </a>
                {!! Form::label('ruta','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoRutaAdjunto'])  !!}
            </div> 
        </div>
        <div class="row">
            <div class="col-md-12 separarBottom">
                {!! Form::label('detalles','Detalles')  !!}
                {!! Form::textarea('detalles',$adjunto->detalles, ['class' => 'form-control', 'id'=>'detalles', 'size' => '2x3','readonly'])  !!}
                {!! Form::label('detalles','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoDetallesAdjunto'])  !!}
            </div>
        </div>
    </div>
</div>

<a style="text-decoration: none;" href="{{ route('adjuntos.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection
