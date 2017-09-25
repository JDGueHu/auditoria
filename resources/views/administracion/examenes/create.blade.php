@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('examenes.index') }}"><i class="fa fa-heartbeat" aria-hidden="true"></i>&nbsp;Exámenes</a></li>
  <li class="active">Crear</li>
</ol>

{!! Form::open(['route' => 'examenes.store', 'method' => 'POST','id'=>'examen']) !!} 

{!! Form::button('Guardar', ['class'=>'btn btn-primary validarButton']) !!}
{!! Form::button('Buscar empleado', ['class'=>'btn btn-success', 'id'=>'buscarEmpleado','data-toggle'=>'modal', 'data-target'=>'#exampleModalLong']) !!}
<a style="text-decoration: none;" href="{{ route('examenes.index') }}">
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
                {!! Form::label('tipoExamen','Tipo')  !!}
                {!! Form::select('tipoExamen', ['Ingreso'=>'Ingreso','Periodico'=>'Periodico','Extraordinario'=>'Extraordinario','Retiro'=>'Retiro'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione un tipo de formación','id'=>'tipoExamen', 'required'])  !!} 
                {!! Form::label('tipoExamen','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoTipoExamen'])  !!}
            </div> 
            <div class="col-md-4 separarBottom">
                {!! Form::label('fechaExamen','Fecha del examen')  !!}
                {!! Form::date('fechaExamen',null, ['class' => 'form-control', 'required', 'id'=>'fechaExamen'])  !!}
                {!! Form::label('fechaExamen','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoFechaExamen'])  !!}
            </div> 
        </div>
        <div class="row">
            <div class="col-md-12 separarBottom">
                {!! Form::label('concepto','Concepto médico')  !!}
                {!! Form::textarea('concepto',null, ['class' => 'form-control', 'required', 'id'=>'concepto','size' => '30x3'])  !!}
                {!! Form::label('fechaExamen','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoConceptoExamen'])  !!}
            </div>
        </div>
    </div>
</div>

<div class="panel panel-primary">    
    <div class="panel-heading" role="button" data-toggle="collapse" href="#ventana2" aria-expanded="false" aria-controls="ventana2">Restricciones médicas</div>
        <div class="collapse in" id="ventana2">
        <div class="panel-body">

        <div class="row">
            <div class="col-md-12 separarBottom">
                {!! Form::label('restriccion','Restricción')  !!}
                {!! Form::textarea('restriccion',null, ['class' => 'form-control', 'id'=>'restriccion','size' => '30x2'])  !!}
                {!! Form::label('concepto','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoRestriccion'])  !!}
            </div> 
            <div class="col-md-4 separarBottom">
                {!! Form::button('Agregar', ['class'=>' btn btn-danger', 'id'=>'addRow']) !!}
            </div> 
        </div>
        <hr>
        <table id="restricciones" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Restricción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>
</div>

{!! Form::button('Guardar', ['class'=>'btn btn-primary separarTop separarBottomButtonn validarButton']) !!}
<a style="text-decoration: none;" href="{{ route('examenes.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

<input type="hidden" id='tmp' name='tmp' value='{{ $tmp }}'>

{!! Form::close() !!}

@endsection

@section('js')
    <script src="{{ asset('js/examenes/create.js') }}"></script>
    <script src="{{ asset('js/examenes/inline_create_restriccion.js') }}"></script>
@endsection