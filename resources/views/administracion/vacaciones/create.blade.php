@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('vacaciones.index') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Ausentismo</a></li>
  <li class="active">Crear</li>
</ol>

{!! Form::open(['route' => 'vacaciones.store', 'method' => 'POST', 'id' => 'createVacaciones']) !!} 

{!! Form::button('Guardar', ['class'=>'btn btn-primary validateForm']) !!}
{!! Form::button('Buscar empleado', ['class'=>'btn btn-success', 'id'=>'buscarEmpleado','data-toggle'=>'modal', 'data-target'=>'#exampleModalLong']) !!}
<a style="text-decoration: none;" href="{{ route('vacaciones.index') }}">
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
            <div class="col-md-3 separarBottom">
                {!! Form::label('tipoVacacion','Tipo ausentismo')  !!}
                {!! Form::select('tipoVacacion', $tiposAusentismo, null, ['class' => 'form-control', 'placeholder' => 'Seleccione tipo de ausentismo','id'=>'tipoVacacion','required'])  !!} 
                {!! Form::label('tipoVacacion','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoTipoVecaciones'])  !!}
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('fechaInicio','Fecha de inicio')  !!}
                {!! Form::date('fechaInicio',null, ['class' => 'form-control', 'required', 'id'=>'fechaInicio'])  !!}
                {!! Form::label('fechaInicio','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoFechaIniVacaciones'])  !!}
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('fechaFin','Fecha de finalización')  !!}
                {!! Form::date('fechaFin',null, ['class' => 'form-control', 'required', 'id'=>'fechaFin', 'readonly'])  !!}
                {!! Form::label('tipoVacacion','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoFechaFinVacaciones'])  !!}
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('dias','Número de días')  !!}
                {!! Form::text('dias',null, ['class' => 'form-control', 'readonly', 'id'=>'dias'])  !!}
            </div>
        </div>

        <div class="row">  
            <div class="col-md-12 separarBottom">
                {!! Form::label('detalles','Detalles')  !!}
                {!! Form::textarea('detalles',null, ['class' => 'form-control', 'required', 'id'=>'detalles','size' => '30x3'])  !!}
                {!! Form::label('tipoVacacion','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoDetallesVacaciones'])  !!}
            </div>
        </div>

    </div>
</div>


{!! Form::button('Guardar', ['class'=>'btn btn-primary separarTop separarBottomButtonn validateForm']) !!}
<a style="text-decoration: none;" href="{{ route('vacaciones.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection

@section('js')
    <script src="{{ asset('js/shared.js') }}"></script>
    <script src="{{ asset('js/vacaciones/shared.js') }}"></script>
@endsection