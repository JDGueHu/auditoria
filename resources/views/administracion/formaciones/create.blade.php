@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('formaciones.index') }}"><i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;Formaciones</a></li>
  <li class="active">Crear</li>
</ol>

{!! Form::open(['route' => 'formaciones.store', 'method' => 'POST','id'=>'contrato']) !!} 

{!! Form::button('Guardar', ['class'=>'btn btn-primary botonCrearFormacion']) !!}
{!! Form::button('Buscar empleado', ['class'=>'btn btn-success', 'id'=>'buscarEmpleado','data-toggle'=>'modal', 'data-target'=>'#exampleModalLong']) !!}
<a style="text-decoration: none;" href="{{ route('formaciones.index') }}">
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
                {!! Form::label('tipoEstudio','Tipo')  !!}
                {!! Form::select('tipoEstudio', ['Academica'=>'Académica','Complementaria'=>'Complementaria'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione un tipo de formación','id'=>'tipoEstudio'])  !!} 
                {!! Form::label('tipoEstudio','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoTipoFormacion'])  !!}
            </div> 
            <div class="col-md-4 separarBottom">
                {!! Form::label('intExt','Categoría')  !!}
                {!! Form::select('intExt', ['Interna'=>'Interna','Externa'=>'Externa'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione un categoría','id'=>'intExt','disabled'])  !!} 
                {!! Form::label('intExt','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoCategoriaFormacion'])  !!}
            </div> 
            <div class="col-md-4 separarBottom">
                {!! Form::label('nivelEstudio_id','Nivel de estudio')  !!}
                {!! Form::select('nivelEstudio_id', $nivelesFormacion, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un nivel de estudio','id'=>'nivelEstudio_id','disabled'])  !!} 
                {!! Form::label('nivelEstudio_id','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoNivelEstudio'])  !!}
            </div> 
        </div>
        <div class="row">
            <div class="col-md-4 separarBottom">
                {!! Form::label('areaEstudio_id','Área')  !!}
                {!! Form::select('areaEstudio_id', $areasformacion, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una área','id'=>'areaEstudio_id'])  !!} 
                {!! Form::label('areaEstudio_id','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoAreaFormacion'])  !!}
            </div> 
            <div class="col-md-4 separarBottom">
                {!! Form::label('titulacion','Titulación')  !!}
                {!! Form::text('titulacion',null, ['class' => 'form-control', 'required', 'id'=>'titulacion'])  !!}
                {!! Form::label('titulacion','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoTitulacionFormacion'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('institucionEducativa','Institución educativa')  !!}
                {!! Form::text('institucionEducativa',null, ['class' => 'form-control', 'required', 'id'=>'institucionEducativa'])  !!}
                {!! Form::label('institucionEducativa','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoInstitucionEducativaFormacion'])  !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 separarBottom">
                {!! Form::label('estadoFormacion','Estado')  !!}
                {!! Form::select('estadoFormacion', ['Abandonado'=>'Abandonado', 'Aplazado'=>'Aplazado', 'Culminado'=>'Culminado','En curso'=>'En curso'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione un estado','id'=>'estadoFormacion'])  !!} 
                {!! Form::label('estadoFormacion','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoEstadoFormacion'])  !!}
            </div> 
            <div class="col-md-4 separarBottom">
                {!! Form::label('fechaInicioFormacion','Fecha de inicio')  !!}
                {!! Form::date('fechaInicioFormacion',null, ['class' => 'form-control', 'required', 'id'=>'fechaInicioFormacion'])  !!}
                {!! Form::label('fechaInicioFormacion','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoFechaIniFormacion'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('fechaFinFormacion','Fecha de finalización')  !!}
                {!! Form::date('fechaFinFormacion',null, ['class' => 'form-control', 'required', 'id'=>'fechaFinFormacion','readonly'])  !!}
                {!! Form::label('fechaFinFormacion','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoFechaFinFormacion'])  !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 separarBottom">
                {!! Form::label('ciudadNacimientoFormacion','Ciudad de estudio')  !!}
                {!! Form::text('ciudadNacimientoFormacion',null, ['class' => 'form-control', 'required', 'id'=>'ciudadNacimientoFormacion'])  !!}
                {!! Form::label('ciudadNacimientoFormacion','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoCiudadFormacion'])  !!}
            </div> 
        </div>
                    <input type="hidden" id="departamentoNacimiento" name="departamentoNacimiento">
            <input type="hidden" id="paisNacimiento" name="paisNacimiento">
    </div>
</div>

{!! Form::button('Guardar', ['class'=>'btn btn-primary separarTop separarBottomButtonn botonCrearFormacion']) !!}
<a style="text-decoration: none;" href="{{ route('formaciones.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection

@section('js')
    <script src="{{ asset('js/formacion/shared.js') }}"></script>
    <script src="{{ asset('js/tableInlineFormaciones.js') }}"></script>
   
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMM_PbONiaS31YzuFXQn9upMXPeVUkUyI&libraries=places&callback=initAutocomplete"
        async defer></script>
@endsection