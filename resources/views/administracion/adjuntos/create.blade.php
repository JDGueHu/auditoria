@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('adjuntos.index') }}"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;&nbsp;Adjuntos</a></li>
  <li class="active">Crear</li>
</ol>

{!! Form::open(['route' => 'adjuntos.store', 'method' => 'POST', 'enctype' => 'multipart/form-data','id'=>'crearAdjunto']) !!} 

{!! Form::button('Guardar', ['class'=>'btn btn-primary crearAdjunto']) !!}
{!! Form::button('Buscar empleado', ['class'=>'btn btn-success', 'id'=>'buscarEmpleado','data-toggle'=>'modal', 'data-target'=>'#exampleModalLong']) !!}
<a style="text-decoration: none;" href="{{ route('adjuntos.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>

    <!-- Modal Create-->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"><span style="font-size: 16px">Empleado</span></h5>
          </div>
          <div class="modal-body">     
                @include('layouts.buscarEmpleado', $empleados)
          </div>
          <div class="modal-footer">
            {!! Form::button('Cerrar', ['class'=>'btn btn-secondary', 'data-dismiss'=>'modal']) !!}
          </div>
        </div>
      </div>
    </div>

<h1 id="nombreEmpleado"></h1>
<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-4 separarBottom">
                {!! Form::label('tipoIdentificacion','Tipo identificación')  !!}
                {!! Form::text('tipoIdentificacion',null, ['class' => 'form-control', 'id'=>'tipoIdentificacion', 'required', 'readonly'])  !!}
                {!! Form::label('tipoIdentificacion','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoTipoIdentificacionEmpleado'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('identificacion','Identificación')  !!}
                {!! Form::text('identificacion',null, ['class' => 'form-control', 'required', 'id'=>'identificacion', 'readonly'])  !!}
                {!! Form::label('identificacion','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoIdentificacionEmpleado'])  !!}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4 separarBottom">
                {!! Form::label('nombre','Nombre')  !!}
                {!! Form::text('nombre',null, ['class' => 'form-control', 'id'=>'nombre'])  !!}
                {!! Form::label('nombre','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoNombreAdjunto'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('adjunto','Adjunto')  !!}
                {{ Form::file('adjunto', ['class' => 'form-control','id'=>'adjunto']) }}
                {!! Form::label('adjunto','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoRutaAdjunto'])  !!}
            </div> 
        </div>
        <div class="row">
            <div class="col-md-12 separarBottom">
                {!! Form::label('detalles','Detalles')  !!}
                {!! Form::textarea('detalles',null, ['class' => 'form-control', 'id'=>'detalles', 'size' => '2x3'])  !!}
                {!! Form::label('detalles','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoDetallesAdjunto'])  !!}
            </div>
        </div>
    </div>
</div>

{!! Form::button('Guardar', ['class'=>'btn btn-primary separarTop separarBottomButtonn crearAdjunto']) !!}
<a style="text-decoration: none;" href="{{ route('adjuntos.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection

@section('js')
    <script src="{{ asset('js/adjuntos/shared.js') }}"></script>
@endsection