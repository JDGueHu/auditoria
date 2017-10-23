@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('vacaciones.index') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Ausentismo</a></li>
  <li class="active">Crear</li>
</ol>

{!! Form::open(['route' => 'vacaciones.store', 'method' => 'POST', 'id' => 'vacaciones','enctype' => 'multipart/form-data']) !!} 

{!! Form::button('Guardar', ['class'=>'btn btn-primary crearAusentismo']) !!}
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
                {!! Form::label('fechaInicioAusentismo','Fecha de inicio')  !!}
                {!! Form::date('fechaInicioAusentismo',null, ['class' => 'form-control', 'required', 'id'=>'fechaInicioAusentismo'])  !!}
                {!! Form::label('fechaInicioAusentismo','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoFechaIniVacaciones'])  !!}
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('fechaFinAusentismo','Fecha de finalización')  !!}
                {!! Form::date('fechaFinAusentismo',null, ['class' => 'form-control', 'required', 'id'=>'fechaFinAusentismo', 'readonly'])  !!}
                {!! Form::label('fechaFinAusentismo','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoFechaFinVacaciones'])  !!}
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('diasAusentismo','Número de días')  !!}
                {!! Form::text('diasAusentismo',null, ['class' => 'form-control', 'readonly', 'id'=>'diasAusentismo'])  !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 separarBottom ocultarShowAusentismo">
                {!! Form::label('adjunto','Adjunto')  !!}
                {{ Form::file('adjunto', ['class' => 'form-control','id'=>'adjunto']) }}
            </div>
        </div>
        <div class="row">  
            <div class="col-md-12 separarBottom">
                {!! Form::label('detallesAusentismo','Detalles')  !!}
                {!! Form::textarea('detallesAusentismo',null, ['class' => 'form-control', 'required', 'id'=>'detallesAusentismo','size' => '30x3'])  !!}
                {!! Form::label('detallesAusentismo','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoDetallesVacaciones'])  !!}
            </div>
        </div>

    </div>
</div>


{!! Form::button('Guardar', ['class'=>'btn btn-primary separarTop separarBottomButtonn crearAusentismo']) !!}
<a style="text-decoration: none;" href="{{ route('vacaciones.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection

@section('js')
    <script src="{{ asset('js/vacaciones/shared.js') }}"></script>
@endsection