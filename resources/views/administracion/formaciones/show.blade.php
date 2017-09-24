@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('formaciones.index') }}"><i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;Formaciones</a></li>
  <li class="active">Detalles</li>
</ol>

{!! Form::model($formacion) !!}

<a style="text-decoration: none;" href="{{ route('formaciones.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>

<h1 id="nombreEmpleado">{{$formacion[0]->nombres}} {{$formacion[0]->apellidos}}</h1>
<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-4 separarBottom">
                {!! Form::label('tipoIdentificacion','Tipo identificación')  !!}
                {!! Form::text('tipoIdentificacion',$formacion[0]->tipoDocumento, ['class' => 'form-control', 'id'=>'tipoIdentificacion', 'required', 'readonly'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('identificacion','Identificación')  !!}
                {!! Form::text('identificacion',$formacion[0]->identificacion, ['class' => 'form-control', 'required', 'id'=>'identificacion', 'readonly'])  !!}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4 separarBottom">
                {!! Form::label('tipoEstudio','Tipo')  !!}
                {!! Form::select('tipoEstudio', ['Academica'=>'Académica','Complementaria'=>'Complementaria'], $formacion[0]->tipoEstudio, ['class' => 'form-control', 'placeholder' => 'Seleccione un tipo de formación','id'=>'tipoEstudio','disabled'])  !!} 
            </div> 
            <div class="col-md-4 separarBottom">
                {!! Form::label('intExt','Categoría')  !!}
                {!! Form::select('intExt', ['Interna'=>'Interna','Externa'=>'Externa'], $formacion[0]->intExt, ['class' => 'form-control', 'placeholder' => 'Seleccione un categoría','id'=>'intExt','disabled'])  !!} 
            </div> 
            <div class="col-md-4 separarBottom">
                {!! Form::label('nivelEstudio_id','Nivel de estudio')  !!}
                {!! Form::select('nivelEstudio_id', $nivelesFormacion, $formacion[0]->nivelEstudio, ['class' => 'form-control', 'placeholder' => 'Seleccione un nivel de estudio','id'=>'nivelEstudio_id','disabled'])  !!} 
            </div> 
        </div>
        <div class="row">
            <div class="col-md-4 separarBottom">
                {!! Form::label('areaEstudio_id','Área')  !!}
                {!! Form::select('areaEstudio_id', $areasformacion, $formacion[0]->areaEstudio_id, ['class' => 'form-control', 'placeholder' => 'Seleccione una área','id'=>'areaEstudio_id','disabled'])  !!} 
            </div> 
            <div class="col-md-4 separarBottom">
                {!! Form::label('titulacion','Titulación')  !!}
                {!! Form::text('titulacion',$formacion[0]->titulacion, ['class' => 'form-control', 'required', 'id'=>'titulacion','readonly'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('institucionEducativa','Institución educativa')  !!}
                {!! Form::text('institucionEducativa',$formacion[0]->institucionEducativa, ['class' => 'form-control', 'required', 'id'=>'institucionEducativa','readonly'])  !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 separarBottom">
                {!! Form::label('estado','Estado')  !!}
                {!! Form::select('estado', ['Abandonado'=>'Abandonado', 'Aplazado'=>'Aplazado', 'Culminado'=>'Culminado','En curso'=>'En curso'], $formacion[0]->estado, ['class' => 'form-control', 'placeholder' => 'Seleccione un estado','id'=>'estado','disabled'])  !!} 
            </div> 
            <div class="col-md-4 separarBottom">
                {!! Form::label('fechaInicio','Fecha de inicio')  !!}
                {!! Form::date('fechaNacimfechaInicioiento', $formacion[0]->fechaInicio, ['class' => 'form-control', 'required', 'id'=>'fechaInicio','readonly'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('fechaFin','Fecha de finalización')  !!}
                {!! Form::date('fechaFin', $formacion[0]->fechaFin, ['class' => 'form-control', 'required', 'id'=>'fechaFin','readonly'])  !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 separarBottom">
                {!! Form::label('ciudadNacimiento','Ciudad de estudio')  !!}
                {!! Form::text('ciudadNacimiento',$formacion[0]->ciudadEstudio, ['class' => 'form-control', 'required', 'id'=>'ciudadNacimiento','readonly'])  !!}
            </div> 
            <input type="hidden" id="departamentoNacimiento" name="departamentoNacimiento">
            <input type="hidden" id="paisNacimiento" name="paisNacimiento">
        </div>
    </div>
</div>

<a style="text-decoration: none;" href="{{ route('formaciones.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection

@section('js')
    <script src="{{ asset('js/formacion/shared.js') }}"></script>
    <script src="{{ asset('js/shared.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMM_PbONiaS31YzuFXQn9upMXPeVUkUyI&libraries=places&callback=initAutocomplete"
        async defer></script>
@endsection