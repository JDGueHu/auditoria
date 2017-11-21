@extends('layouts.app')

@section('css')
    <link href="{{ asset('plugins/dataTable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('empleados.index') }}"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Empleados</a></li>
  <li class="active">Editar</li>
</ol>

{!! Form::model($empleado,['route' => ['empleados.update',$empleado->id], 'method' => 'PUT']) !!}

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarBottom'])  !!}
<a style="text-decoration: none;" href="{{ route('empleados.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarBottom'])  !!}
</a>
<h1>{{$empleado->nombres}} {{$empleado->apellidos}}</h1>
<div class="panel panel-primary">    
    <div class="panel-heading" role="button" data-toggle="collapse" href="#ventana1" aria-expanded="true" aria-controls="ventana1">Datos básicos</div>
        <div class="collapse in" id="ventana1">
        <div class="panel-body">
            <input type="hidden" id="nombres" name="nombres" value="{{ $empleado->nombres }}">
            <input type="hidden" id="apellidos" name="apellidos" value="{{ $empleado->apellidos }}">
            <div class="row">
                <div class="col-md-3 separarBottom">
                    {!! Form::label('tipo_documento','Tipo documento')  !!}
                    {!! Form::select('tipo_documento', $tiposDocumento, $empleado->tipoDocumento_id, ['class' => 'form-control separarBottom', 'required', 'placeholder' => 'Seleccione un tipo de documento','id'=>'tipo_documento'])  !!} 
                </div>
                <div class="col-md-3 separarBottom">
                    {!! Form::label('identificacion','Número de identidad')  !!}
                    {!! Form::number('identificacion',$empleado->identificacion, ['class' => 'form-control', 'required', 'id'=>'identificacion'])  !!}
                </div>    
                <div class="col-md-3 separarBottom">
                    {!! Form::label('genero','Género')  !!}
                    {!! Form::select('genero', ['Femenino' => 'Femenino', 'Masculino' => 'Masculino'], $empleado->genero, ['class' => 'form-control separarBottom', 'required', 'placeholder' => 'Seleccione un genero','id'=>'genero'])  !!} 
                </div>  
                <div class="col-md-3 separarBottom">
                    {!! Form::label('grupoSanguineo','Grupo sanguíneo y Factor RH')  !!}
                    {!! Form::select('grupoSanguineo', ['O+' => 'O+', 'O-' => 'O-','A+' => 'A+', 'A-' => 'A-','B+' => 'B+', 'B-' => 'B-','AB+' => 'AB+', 'AB-' => 'AB-'], $empleado->grupoSanguineo, ['class' => 'form-control separarBottom', 'required', 'placeholder' => 'Seleccione un grupo sanguíneo','id'=>'grupoSanguineo'])  !!} 
                </div>  
            </div>

            <div class="row">
                <div class="col-md-3 separarBottom">
                    {!! Form::label('fechaNacimiento','Fecha de nacimiento')  !!}
                    {!! Form::date('fechaNacimiento',$empleado->fechaNacimiento, ['class' => 'form-control', 'required', 'id'=>'fechaNacimiento'])  !!}
                </div>
                <div class="col-md-3 separarBottom">
                    {!! Form::label('edad','Edad (Años)')  !!}
                    {!! Form::number('edad',null, ['class' => 'form-control', 'id'=>'edad', 'readonly'])  !!}
                </div>
                <div class="col-md-3 separarBottom">
                    {!! Form::label('ciudadNacimiento','Ciudad de nacimiento')  !!}
                    {!! Form::text('ciudadNacimiento',$empleado->ciudadNacimiento, ['class' => 'form-control', 'required', 'id'=>'ciudadNacimiento'])  !!}
                </div>  
                <div class="col-md-3 separarBottom">
                    {!! Form::label('departamentoNacimiento','Departamento de nacimiento')  !!}
                    {!! Form::text('departamentoNacimiento',$empleado->departamentoNacimiento, ['class' => 'form-control','id'=>'departamentoNacimiento','readonly'])  !!}
                </div>  
            </div>

            <div class="row">
                <div class="col-md-3 separarBottom">
                    {!! Form::label('paisNacimiento','País de nacimiento')  !!}
                    {!! Form::text('paisNacimiento',$empleado->paisNacimiento, ['class' => 'form-control', 'id'=>'paisNacimiento','readonly'])  !!}
                </div>
                <div class="col-md-3 separarBottom">
                    {!! Form::label('estadoCivil','Estado civil')  !!}
                    {!! Form::select('estadoCivil', ['Casad@' => 'Casad@', 'Divorciad@' => 'Divorciad@', 'Solter@' => 'Solter@',  'Union libre' => 'Union libre'], $empleado->estadoCivil, ['class' => 'form-control', 'placeholder' => 'Seleccione un estado civil','id'=>'estadoCivil'])  !!} 
                </div> 
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
                    {!! Form::select('eps', $epss, $empleado->eps, ['class' => 'form-control', 'required', 'placeholder' => 'Sleccione una EPS','id'=>'eps'])  !!}
                </div>
                <div class="col-md-3 separarBottom">
                    {!! Form::label('arl','ARL')  !!}
                    {!! Form::select('arl', $arls, $empleado->arl, ['class' => 'form-control', 'required', 'placeholder' => 'Sleccione una ARL','id'=>'arl'])  !!}
                </div>  
                <div class="col-md-3 separarBottom">
                    {!! Form::label('fondoPensiones','Fondo de pensiones')  !!}
                    {!! Form::select('fondoPensiones', $fondosPensiones, $empleado->fondoPensiones, ['class' => 'form-control', 'required', 'placeholder' => 'Seleccione un F. Pensiones','id'=>'fondoPensiones'])  !!}
                </div>  
                <div class="col-md-3 separarBottom">
                    {!! Form::label('fondoCesantias','Fondo de cesantías')  !!}
                    {!! Form::select('fondoCesantias', $fondosCesantias, $empleado->fondoCesantias, ['class' => 'form-control', 'required', 'placeholder' => 'Seleccione un F. Cesantías','id'=>'fondoCesantias'])  !!}
                </div>  
            </div>

            <div class="row">
                <div class="col-md-3 separarBottom">
                    {!! Form::label('centroTrabajo','Centro de trabajo')  !!}
                    {!! Form::select('centroTrabajo', $centrosTrabajo, $empleado->centro_trabajo_id, ['class' => 'form-control', 'required', 'placeholder' => 'Seleccione un centro de trabajo','id'=>'centroTrabajo'])  !!} 
                </div> 
                <div class="col-md-3 separarBottom">
                    {!! Form::label('riesgo','Riesgo')  !!}
                    {!! Form::text('riesgo',null, ['class' => 'form-control', 'required', 'id'=>'riesgo', 'readonly'])  !!}
                </div> 
                <div class="col-md-3 separarBottom">
                    {!! Form::label('tasa','Tasa')  !!}
                    {!! Form::text('tasa',null, ['class' => 'form-control', 'id'=>'tasa', 'readonly'])  !!}
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

{!! Form::submit('Guardar',['class' => 'btn btn-primary separarTop separarBottomButtonn'])  !!}
<a style="text-decoration: none;" href="{{ route('empleados.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection

@section('js')
    <!-- Libreria google place  -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMM_PbONiaS31YzuFXQn9upMXPeVUkUyI&libraries=places&callback=initAutocomplete"
        async defer></script>
    <!-- Para codigo compartido del modulo  -->
    <script src="{{ asset('js/empleados/shared.js') }}"></script>
    <!-- Para fechas  -->
    <script src="{{ asset('js/shared.js') }}"></script>
    <!-- Para cargar los datos automaticamente al cargar la vista de edicion  -->
    <script src="{{ asset('js/empleados/edit.js') }}"></script>   
    <!-- Para cargar los datos por eventos como en la vista de creación  -->
    <script src="{{ asset('js/empleados/create.js') }}"></script> 
    <!-- Para tablas en submodulos  -->
    <script src="{{ asset('js/tableInlineContrato.js') }}"></script>
@endsection