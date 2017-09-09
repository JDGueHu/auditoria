@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('empleados.index') }}">Empleados</a></li>
  <li class="active">Ver</li>
</ol>

{!! Form::model($empleado) !!}

<a style="text-decoration: none;" href="{{ route('empleados.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarBottom'])  !!}
</a>

<div class="panel panel-primary">    
    <div class="panel-heading" role="button" data-toggle="collapse" href="#ventana1" aria-expanded="true" aria-controls="ventana1">Datos básicos</div>
        <div class="collapse in" id="ventana1">
        <div class="panel-body">

            <div class="row">
                <div class="col-md-3 separarBottom">
                    {!! Form::label('tipo_documento','Tipo documento')  !!}
                    {!! Form::select('tipo_documento', $tiposDocumento, $empleado->tipoDocumento_id, ['class' => 'form-control separarBottom', 'required', 'placeholder' => 'Sleccione un tipo de documento','id'=>'tipo_documento'])  !!} 
                </div>
                <div class="col-md-3 separarBottom">
                    {!! Form::label('identificacion','Número de identidad')  !!}
                    {!! Form::number('identificacion',$empleado->identificacion, ['class' => 'form-control', 'required', 'id'=>'identificacion'])  !!}
                </div>    
                <div class="col-md-3 separarBottom">
                    {!! Form::label('nombres','Nombres')  !!}
                    {!! Form::text('nombres',$empleado->nombres, ['class' => 'form-control', 'required', 'id'=>'nombres'])  !!}
                </div>
                <div class="col-md-3 separarBottom">
                    {!! Form::label('apellidos','Apellidos')  !!}
                    {!! Form::text('apellidos',$empleado->apellidos, ['class' => 'form-control', 'required', 'id'=>'apellidos'])  !!}
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 separarBottom">
                    {!! Form::label('genero','Género')  !!}
                    {!! Form::select('genero', ['Femenino' => 'Femenino', 'Masculino' => 'Masculino'], $empleado->genero, ['class' => 'form-control separarBottom', 'required', 'placeholder' => 'Sleccione un genero','id'=>'genero'])  !!} 
                </div>  
                <div class="col-md-3 separarBottom">
                    {!! Form::label('grupoSanguineo','Grupo sanguíneo y Factor RH')  !!}
                    {!! Form::select('grupoSanguineo', ['O+' => 'O+', 'O-' => 'O-','A+' => 'A+', 'A-' => 'A-','B+' => 'B+', 'B-' => 'B-','AB+' => 'AB+', 'AB-' => 'AB-'], $empleado->grupoSanguineo, ['class' => 'form-control separarBottom', 'required', 'placeholder' => 'Sleccione un grupo sanguíneo','id'=>'grupoSanguineo'])  !!} 
                </div>  
                <div class="col-md-3 separarBottom">
                    {!! Form::label('fechaNacimiento','Fecha de nacimiento')  !!}
                    {!! Form::date('fechaNacimiento',$empleado->fechaNacimiento, ['class' => 'form-control', 'required', 'id'=>'fechaNacimiento'])  !!}
                </div>
                <div class="col-md-3 separarBottom">
                    {!! Form::label('edad','Edad (Años)')  !!}
                    {!! Form::number('edad',null, ['class' => 'form-control', 'id'=>'edad', 'readonly'])  !!}
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 separarBottom">
                    {!! Form::label('ciudadNacimiento','Ciudad de nacimiento')  !!}
                    {!! Form::text('ciudadNacimiento',$empleado->ciudadNacimiento, ['class' => 'form-control', 'required', 'id'=>'ciudadNacimiento'])  !!}
                </div>  
                <div class="col-md-3 separarBottom">
                    {!! Form::label('departamentoNacimiento','Departamento de nacimiento')  !!}
                    {!! Form::text('departamentoNacimiento',$empleado->departamentoNacimiento, ['class' => 'form-control','id'=>'departamentoNacimiento','readonly'])  !!}
                </div>  
                <div class="col-md-3 separarBottom">
                    {!! Form::label('paisNacimiento','País de nacimiento')  !!}
                    {!! Form::text('paisNacimiento',$empleado->paisNacimiento, ['class' => 'form-control', 'id'=>'paisNacimiento','readonly'])  !!}
                </div>
                <div class="col-md-3 separarBottom">
                    {!! Form::label('estadoCivil','Estado civil')  !!}
                    {!! Form::select('estadoCivil', ['Casad@' => 'Casad@', 'Divorciad@' => 'Divorciad@', 'Solter@' => 'Solter@',  'Union libre' => 'Union libre'], $empleado->estadoCivil, ['class' => 'form-control', 'placeholder' => 'Seleccione un estado civil','id'=>'estadoCivil'])  !!} 
                </div> 
            </div>

            <div class="row">
                <div class="col-md-3 separarBottom">
                    {!! Form::label('numeroHijos','Número de hijos')  !!}
                    {!! Form::number('numeroHijos',$empleado->numeroHijos, ['class' => 'form-control', 'id'=>'numeroHijos'])  !!}
                </div>  
            </div>

        </div>
    </div>
</div>

<div class="panel panel-primary">    
    <div class="panel-heading" role="button" data-toggle="collapse" href="#ventana2" aria-expanded="false" aria-controls="ventana2">Datos de contacto</div>
        <div class="collapse" id="ventana2">
        <div class="panel-body">

            <div class="row">
                <div class="col-md-3 separarBottom">
                    {!! Form::label('ciudadDireccion','Ciudad')  !!}
                    {!! Form::text('ciudadDireccion',$empleado->ciudadDireccion, ['class' => 'form-control', 'required', 'id'=>'ciudadDireccion'])  !!}
                </div>
                <div class="col-md-3 separarBottom">
                    {!! Form::label('departamentoDireccion','Departamento')  !!}
                    {!! Form::text('departamentoDireccion',$empleado->departamentoDireccion, ['class' => 'form-control', 'id'=>'departamentoDireccion','readonly'])  !!}
                </div>    
                <div class="col-md-3 separarBottom">
                    {!! Form::label('paisDireccion','Pais')  !!}
                    {!! Form::text('paisDireccion',$empleado->paisDireccion, ['class' => 'form-control', 'id'=>'paisDireccion','readonly'])  !!}
                </div>  
                <div class="col-md-3 separarBottom">
                    {!! Form::label('direccion','Dirección')  !!}
                    {!! Form::text('direccion',$empleado->direccion, ['class' => 'form-control', 'required', 'id'=>'direccion'])  !!}
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 separarBottom">
                    {!! Form::label('emailPersonal','Correo electrónico personal')  !!}
                    {!! Form::email('emailPersonal',$empleado->emailPersonal, ['class' => 'form-control', 'required', 'id'=>'emailPersonal'])  !!}
                </div>
                <div class="col-md-3 separarBottom">
                    {!! Form::label('telefonoFijo','Teléfono fijo')  !!}
                    {!! Form::number('telefonoFijo',$empleado->telefonoFijo, ['class' => 'form-control', 'id'=>'telefonoFijo'])  !!}
                </div>    
                <div class="col-md-3 separarBottom">
                    {!! Form::label('telefonoCelular','Celular')  !!}
                    {!! Form::number('telefonoCelular',$empleado->telefonoCelular, ['class' => 'form-control', 'id'=>'telefonoCelular'])  !!}
                </div>  
            </div>

        </div>
    </div>
</div>

<div class="panel panel-primary">    
    <div class="panel-heading" role="button" data-toggle="collapse" href="#ventana3" aria-expanded="false" aria-controls="ventana3">Datos laborales</div>
        <div class="collapse" id="ventana3">
        <div class="panel-body">

            <div class="row">
                <div class="col-md-3 separarBottom">
                    {!! Form::label('fechaIngreso','Fecha de ingreso')  !!}
                    {!! Form::date('fechaIngreso',$empleado->fechaIngreso, ['class' => 'form-control', 'required', 'id'=>'fechaIngreso'])  !!}
                </div>
                <div class="col-md-3 separarBottom">
                    {!! Form::label('antiguedad','Antigüedad (días)')  !!}
                    {!! Form::text('antiguedad',null, ['class' => 'form-control', 'id'=>'antiguedad','readonly'])  !!}
                </div>  
                <div class="col-md-3 separarBottom">
                    {!! Form::label('emailCorporativo','Email corporativo')  !!}
                    {!! Form::email('emailCorporativo',$empleado->emailCorporativo, ['class' => 'form-control', 'id'=>'emailCorporativo'])  !!}
                </div>  
                <div class="col-md-3 separarBottom">
                    {!! Form::label('cargo','Cargo')  !!}
                    {!! Form::select('cargo', $cargos, $empleado->cargo_id, ['class' => 'form-control', 'required', 'placeholder' => 'Sleccione un cargo','id'=>'cargo'])  !!} 
                </div>  
            </div>

            <div class="row">
                <div class="col-md-3 separarBottom">
                    {!! Form::label('eps','EPS')  !!}
                    {!! Form::text('eps',$empleado->eps, ['class' => 'form-control', 'id'=>'eps'])  !!}
                </div>
                <div class="col-md-3 separarBottom">
                    {!! Form::label('arl','ARL')  !!}
                    {!! Form::text('arl',$empleado->arl, ['class' => 'form-control', 'id'=>'arl'])  !!}
                </div>  
                <div class="col-md-3 separarBottom">
                    {!! Form::label('fondoPensiones','Fondo de pensiones')  !!}
                    {!! Form::text('fondoPensiones',$empleado->fondoPensiones, ['class' => 'form-control', 'id'=>'fondoPensiones'])  !!}
                </div>  
                <div class="col-md-3 separarBottom">
                    {!! Form::label('fondoCesantias','Fondo de cesantías')  !!}
                    {!! Form::text('fondoCesantias',$empleado->fondoCesantias, ['class' => 'form-control', 'id'=>'fondoCesantias'])  !!}
                </div>  
            </div>

            <div class="row">
                <div class="col-md-3 separarBottom">
                    {!! Form::label('centroTrabajo','Centro de trabajo')  !!}
                    {!! Form::select('centroTrabajo', $centrosTrabajo, $empleado->centro_trabajo_id, ['class' => 'form-control', 'required', 'placeholder' => 'Sleccione un centro de trabajo','id'=>'centroTrabajo'])  !!} 
                </div> 
                <div class="col-md-3 separarBottom">
                    {!! Form::label('riesgo','Riesgo')  !!}
                    {!! Form::text('riesgo',null, ['class' => 'form-control', 'required', 'id'=>'riesgo', 'readonly'])  !!}
                </div> 
                <div class="col-md-3 separarBottom">
                    {!! Form::label('tasa','Tasa')  !!}
                    {!! Form::text('tasa',null, ['class' => 'form-control', 'id'=>'tasa', 'readonly'])  !!}
                </div> 
                <div class="col-md-3 separarBottom">
                    {!! Form::label('estado','Estado')  !!}
                    {!! Form::select('estado', ['Activo' => 'Activo', 'Inactivo' => 'Inactivo'], $empleado->estado, ['class' => 'form-control', 'required', 'placeholder' => 'Sleccione un estado','id'=>'estado'])  !!} 
                </div> 

            </div>

            <div class="row">
                <div class="col-md-3 separarBottom">
                    {!! Form::label('fechaRetiro','Fecha de retiro')  !!}
                    {!! Form::date('fechaRetiro',$empleado->fechaRetiro, ['class' => 'form-control', 'id'=>'fechaRetiro'])  !!}
                </div>   
            </div>

        </div>
    </div>
</div>

<div class="panel panel-info">    
    <div class="panel-heading" role="button" data-toggle="collapse" href="#ventana4" aria-expanded="false" aria-controls="ventana4">Contratación</div>
        <div class="collapse" id="ventana4">
        <div class="panel-body">

        </div>
    </div>
</div>

<div class="panel panel-info">    
    <div class="panel-heading" role="button" data-toggle="collapse" href="#ventana5" aria-expanded="false" aria-controls="ventana5">Formación</div>
        <div class="collapse" id="ventana5">
        <div class="panel-body">

        </div>
    </div>
</div>

<div class="panel panel-info">    
    <div class="panel-heading" role="button" data-toggle="collapse" href="#ventana6" aria-expanded="false" aria-controls="ventana6">Exámenes</div>
        <div class="collapse" id="ventana6">
        <div class="panel-body">

        </div>
    </div>
</div>

<div class="panel panel-info">    
    <div class="panel-heading" role="button" data-toggle="collapse" href="#ventana7" aria-expanded="false" aria-controls="ventana7">Vacaciones, permisos, licencias o similares</div>
        <div class="collapse" id="ventana7">
        <div class="panel-body">

        </div>
    </div>
</div>

<div class="panel panel-info">    
    <div class="panel-heading" role="button" data-toggle="collapse" href="#ventana8" aria-expanded="false" aria-controls="ventana8">Adjuntos</div>
        <div class="collapse" id="ventana8">
        <div class="panel-body">

        </div>
    </div>
</div>

<a style="text-decoration: none;" href="{{ route('empleados.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection

@section('js')
    <script src="{{ asset('js/empleados/show.js') }}"></script>
@endsection