@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('examenes.index') }}"><i class="fa fa-heartbeat" aria-hidden="true"></i>&nbsp;Exámenes</a></li>
  <li class="active">Editar</li>
</ol>

{!! Form::model($examen,['route' => ['examenes.update',$examen[0]->id], 'method' => 'PUT','id'=>'examen','enctype' => 'multipart/form-data']) !!}

{!! Form::button('Guardar', ['class'=>'btn btn-primary crearExamen']) !!}
<a style="text-decoration: none;" href="{{ route('examenes.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>

<h1 id="nombreEmpleado">{{$examen[0]->nombres}} {{$examen[0]->apellidos}}</h1>
<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-4 separarBottom">
                {!! Form::label('tipoIdentificacion','Tipo identificación')  !!}
                {!! Form::text('tipoIdentificacion',$examen[0]->tipoDocumento, ['class' => 'form-control', 'id'=>'tipoIdentificacion', 'required', 'readonly'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('identificacion','Identificación')  !!}
                {!! Form::text('identificacion',$examen[0]->identificacion, ['class' => 'form-control', 'required', 'id'=>'identificacion', 'readonly'])  !!}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4 separarBottom">
                {!! Form::label('tipoExamen','Tipo')  !!}
                {!! Form::select('tipoExamen', ['Ingreso'=>'Ingreso','Periodico'=>'Periodico','Extraordinario'=>'Extraordinario','Retiro'=>'Retiro'], $examen[0]->tipoExamen, ['class' => 'form-control', 'placeholder' => 'Seleccione un tipo de formación','id'=>'tipoExamen', 'required'])  !!} 
            </div> 
            <div class="col-md-4 separarBottom">
                {!! Form::label('fechaExamen','Fecha del examen')  !!}
                {!! Form::date('fechaExamen',$examen[0]->fechaExamen, ['class' => 'form-control', 'required', 'id'=>'fechaExamen'])  !!}
            </div> 
        </div>
        <div class="row">
            <div class="col-md-8 separarBottom">
                {!! Form::label('adjunto','Adjunto')  !!}
                {{ Form::file('adjunto', ['class' => 'form-control','id'=>'adjunto']) }}
                <a title="Adjunto" href="{{ $examen[0]->adjunto }}" target="_blank">
                    {{ $examen[0]->adjunto  }}
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 separarBottom">
                {!! Form::label('concepto','Concepto médico')  !!}
                {!! Form::textarea('concepto',$examen[0]->concepto, ['class' => 'form-control', 'required', 'id'=>'concepto','size' => '30x3'])  !!}
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
                {!! Form::button('Agregar', ['class'=>' btn btn-danger', 'id'=>'addRestriccionMedica']) !!}
            </div> 
        </div>
        <hr>
        <table id="restriccionesInlineTable" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Restricción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($restricciones as $restriccion)
                    <tr>
                        <td>{{ $restriccion->restriccion }}<span style="opacity:0">z$&{{ $restriccion->id}}</span></td>
                        <td>
                            <a title="Eliminar" class="btn btn-danger btn-xs buttonDestroyRestriccion"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>

        </div>
    </div>
</div>

{!! Form::button('Guardar', ['class'=>'btn btn-primary separarTop separarBottomButtonn crearExamen']) !!}
<a style="text-decoration: none;" href="{{ route('examenes.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

<input type="hidden" id='tmp' name='tmp' value='{{ $tmp }}'>

{!! Form::close() !!}

@endsection

@section('js')
    <script src="{{ asset('js/examenes/create.js') }}"></script>
    <script src="{{ asset('js/tableInlineExamenes.js') }}"></script>
@endsection