@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="#">Empleados</a></li>
  <li class="active">Crear</li>
</ol>

{!! Form::open(['route' => 'empleados.store', 'method' => 'POST', 'id' => 'example-form']) !!}

<div class="panel panel-primary">    
    <div class="panel-heading" role="button" data-toggle="collapse" href="#ventana1" aria-expanded="true" aria-controls="ventana1">Datos básicos</div>
        <div class="collapse in" id="ventana1">
        <div class="panel-body">

            <div class="row">
                <div class="col-md-3 separarBottom">
                    {!! Form::label('tipo_documento','Tipo documento')  !!}
                    {!! Form::select('tipo_documento', ['' => '', 'CC' => 'Cédula de ciudadanía'], null, ['class' => 'form-control separarBottom', 'required', 'placeholder' => 'Sleccione un tipo de documento','id'=>'tipo_documento'])  !!} 
                </div>
                <div class="col-md-3 separarBottom">
                    {!! Form::label('identificacion','Número de identidad')  !!}
                    {!! Form::number('identificacion',null, ['class' => 'form-control', 'required', 'id'=>'identificacion'])  !!}
                </div>    
                <div class="col-md-3 separarBottom">
                    {!! Form::label('nombres','Nombres')  !!}
                    {!! Form::text('nombres',null, ['class' => 'form-control', 'required', 'id'=>'nombres'])  !!}
                </div>
                <div class="col-md-3 separarBottom">
                    {!! Form::label('apellidos','Apellidos')  !!}
                    {!! Form::text('apellidos',null, ['class' => 'form-control', 'required', 'id'=>'apellidos'])  !!}
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 separarBottom">
                    {!! Form::label('genero','Género')  !!}
                    {!! Form::select('genero', ['' => '', 'M' => 'Masculino', 'F' => 'Femenino'], null, ['class' => 'form-control separarBottom', 'required', 'placeholder' => 'Sleccione un tipo de documento','id'=>'genero'])  !!} 
                </div>  
                <div class="col-md-3 separarBottom">
                    {!! Form::label('tipo_documento','Grupo sanguíneo y Factor RH')  !!}
                    {!! Form::select('tipo_documento', ['' => '', 'O+' => 'O+', 'O-' => 'O-'], null, ['class' => 'form-control separarBottom', 'required', 'placeholder' => 'Sleccione un tipo de documento','id'=>'tipo_documento'])  !!} 
                </div>  
                <div class="col-md-3 separarBottom">
                    {!! Form::label('fechaNacimiento','Fecha de nacimiento')  !!}
                    {!! Form::text('fechaNacimiento',null, ['class' => 'form-control', 'required', 'id'=>'fechaNacimiento'])  !!}
                </div>
                <div class="col-md-3 separarBottom">
                    {!! Form::label('edad','Edad')  !!}
                    {!! Form::number('edad',null, ['class' => 'form-control', 'required', 'id'=>'edad', 'readonly'])  !!}
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 separarBottom">
                    {!! Form::label('ciudadNacimiento','Ciudad de nacimiento')  !!}
                    {!! Form::text('ciudadNacimiento',null, ['class' => 'form-control', 'required', 'id'=>'ciudadNacimiento'])  !!}
                </div>  
                <div class="col-md-3 separarBottom">
                    {!! Form::label('departamentoNacimiento','Departamento de nacimiento')  !!}
                    {!! Form::text('departamentoNacimiento',null, ['class' => 'form-control', 'required', 'id'=>'departamentoNacimiento','readonly'])  !!}
                </div>  
                <div class="col-md-3 separarBottom">
                    {!! Form::label('paisNacimiento','País de nacimiento')  !!}
                    {!! Form::text('paisNacimiento',null, ['class' => 'form-control', 'required', 'id'=>'paisNacimiento','readonly'])  !!}
                </div>
                <div class="col-md-3 separarBottom">
                    {!! Form::label('estadoCivil','Estado civil')  !!}
                    {!! Form::select('estadoCivil', ['' => '', 'Soltero' => 'Soltero', 'Casado' => 'Casado'], null, ['class' => 'form-control', 'required', 'placeholder' => 'Sleccione un tipo de documento','id'=>'estadoCivil'])  !!} 
                </div> 
            </div>

            <div class="row">
                <div class="col-md-3 separarBottom">
                    {!! Form::label('numeroHijos','Número de hijos')  !!}
                    {!! Form::number('numeroHijos',null, ['class' => 'form-control', 'required', 'id'=>'numeroHijos'])  !!}
                </div>  
            </div>

        </div>
    </div>
</div>

<div class="panel panel-primary">    
    <div class="panel-heading" role="button" data-toggle="collapse" href="#ventana2" aria-expanded="false" aria-controls="ventana2">Datos de contacto</div>
        <div class="collapse" id="ventana2">
        <div class="panel-body">
        </div>
    </div>
</div>

<div class="panel panel-primary">    
    <div class="panel-heading" role="button" data-toggle="collapse" href="#ventana3" aria-expanded="false" aria-controls="ventana3">Datos laborales</div>
        <div class="collapse" id="ventana3">
        <div class="panel-body">
        </div>
    </div>
</div>

{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
{!! Form::close() !!}

@endsection