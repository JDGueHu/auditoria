@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('contratos.index') }}"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;Contratos</a></li>
  <li class="active">Crear</li>
</ol>

{!! Form::open(['route' => 'contratos.store', 'method' => 'POST','id'=>'contrato']) !!} 

{!! Form::button('Guardar', ['class'=>'btn btn-primary', 'id'=>'botonEditarTop']) !!}
{!! Form::button('Buscar empleado', ['class'=>'btn btn-success', 'id'=>'buscarEmpleado','data-toggle'=>'modal', 'data-target'=>'#exampleModalLong']) !!}
<a style="text-decoration: none;" href="{{ route('contratos.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>

    <!-- Modal Create-->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"><span style="font-size: 16px">Contrato</span></h5>
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
                {!! Form::label('fechaInicio','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoTipoIdentificacionEmpleado'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('identificacion','Identificación')  !!}
                {!! Form::text('identificacion',null, ['class' => 'form-control', 'required', 'id'=>'identificacion', 'readonly'])  !!}
                {!! Form::label('fechaInicio','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoIdentificacionEmpleado'])  !!}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4 separarBottom">
                {!! Form::label('tipoContrato','Tipo de contrato')  !!}
                {!! Form::select('tipoContrato', $tiposContrato, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un tipo de contrato','id'=>'tipoContrato'])  !!} 
                {!! Form::label('tipoContrato','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoTipoContrato'])  !!}
            </div> 
            <div class="col-md-4 separarBottom">
                {!! Form::label('fechaInicio','Fecha inicio')  !!}
                {!! Form::date('fechaInicio',null, ['class' => 'form-control', 'id'=>'fechaInicio','readonly'])  !!}
                {!! Form::label('fechaInicio','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoFechaIniContrato'])  !!}
            </div> 
            <div class="col-md-4 separarBottom">
                {!! Form::label('duracion','Duración (Meses)')  !!}
                {!! Form::number('duracion',null, ['class' => 'form-control', 'id'=>'duracion','readonly'])  !!}
                {!! Form::label('duracion','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoDuracionContrato'])  !!}
            </div> 
        </div>
        <div class="row">
            <div class="col-md-4 separarBottom">
                {!! Form::label('fechaFin','Fecha finalización')  !!}
                {!! Form::date('fechaFin',null, ['class' => 'form-control', 'id'=>'fechaFin','readonly'])  !!}
                {!! Form::label('fechaFin','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoFechaFinContrato'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('estadContrato','Estado')  !!}
                {!! Form::select('estadContrato', ['Activo'=>'Activo','Finalizado'=>'Finalizado'], 'Activo', ['class' => 'form-control', 'placeholder' => 'Seleccione un estado','id'=>'estadContrato'])  !!} 
                {!! Form::label('estadContrato','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoEstadoContrato'])  !!}
            </div> 
        </div>
        <div class="row">
            <div class="col-md-12 separarBottom">
                {!! Form::label('detalles','Detalles')  !!}
                {{ Form::textarea('detalles', null, ['size' => '3x3','class' => 'form-control', 'placeholder' => 'Detalles de contratación','id'=>'detalles']) }}
            </div> 
        </div>

    </div>
</div>

{!! Form::button('Guardar', ['class'=>'btn btn-primary separarTop separarBottomButtonn', 'id'=>'botonEditarBottom']) !!}
<a style="text-decoration: none;" href="{{ route('contratos.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection

@section('js')
    <script src="{{ asset('js/contratos/shared.js') }}"></script>
    <script src="{{ asset('js/shared.js') }}"></script>
@endsection