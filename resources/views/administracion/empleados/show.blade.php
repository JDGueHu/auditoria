@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('empleados.index') }}"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Empleados</a></li>
  <li class="active">Detalles</li>
</ol>

{!! Form::model($empleado) !!}

<a style="text-decoration: none;" href="{{ route('empleados.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarBottom'])  !!}
</a>
<h1>{{$empleado->nombres}} {{$empleado->apellidos}}</h1>
<div class="panel panel-primary">    
    <div class="panel-heading" role="button" data-toggle="collapse" href="#ventana1" aria-expanded="true" aria-controls="ventana1">Datos básicos</div>
        <div class="collapse in" id="ventana1">
        <div class="panel-body">

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
                    {!! Form::select('fondoPensiones', $fondosPensiones, $empleado->fondoPensiones, ['class' => 'form-control', 'required', 'placeholder' => 'Sleccione un F. Pensiones','id'=>'fondoPensiones'])  !!}
                </div>  
                <div class="col-md-3 separarBottom">
                    {!! Form::label('fondoCesantias','Fondo de cesantías')  !!}
                    {!! Form::select('fondoCesantias', $fondosCesantias, $empleado->fondoCesantias, ['class' => 'form-control', 'required', 'placeholder' => 'Sleccione un F. Cesantías','id'=>'fondoCesantias'])  !!}
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

{!! Form::close() !!}

<div class="panel panel-info">    
    <div class="panel-heading" role="button" data-toggle="collapse" href="#ventana4" aria-expanded="false" aria-controls="ventana4">Contratación</div>
        <div class="collapse" id="ventana4">
        <div class="panel-body">

            {!! Form::button('Nuevo', ['class'=>'btn btn-primary separarTop separarBottomButtonn', 'id'=>'nuevo', 'data-toggle'=>'modal', 'data-target'=>'#exampleModalLong']) !!}

             <!--  Modal Contratos -->
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><span style="font-size: 16px">Contrato</span></h5>
                  </div>
                  <div class="modal-body"> 
                    {!! Form::open(['enctype' => 'multipart/form-data']) !!}
                        <div class="row">
                            <div class="col-md-6 separarBottom">
                                {!! Form::label('tipoContrato','Tipo de contrato')  !!}
                                {!! Form::select('tipoContrato', $tiposContrato, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un tipo de contrato','id'=>'tipoContrato'])  !!} 
                                {!! Form::label('tipoContrato','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoTipoContrato'])  !!}
                            </div> 
                            <div class="col-md-6 separarBottom">
                                {!! Form::label('duracion','Duración (Meses)')  !!}
                                {!! Form::number('duracion',null, ['class' => 'form-control', 'id'=>'duracion','readonly'])  !!}
                                {!! Form::label('duracion','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoDuracionContrato'])  !!}
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col-md-6 separarBottom">
                                {!! Form::label('fechaInicio','Fecha inicio')  !!}
                                {!! Form::date('fechaInicio',null, ['class' => 'form-control', 'id'=>'fechaInicio','readonly'])  !!}
                                {!! Form::label('fechaInicio','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoFechaIniContrato'])  !!}
                            </div> 
                            <div class="col-md-6 separarBottom">
                                {!! Form::label('fechaFin','Fecha finalización')  !!}
                                {!! Form::date('fechaFin',null, ['class' => 'form-control', 'id'=>'fechaFin','readonly'])  !!}
                                {!! Form::label('fechaFin','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoFechaFinContrato'])  !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 separarBottom">
                                {!! Form::label('estadContrato','Estado')  !!}
                                {!! Form::select('estadContrato', ['Activo'=>'Activo','Finalizado'=>'Finalizado'], 'Activo', ['class' => 'form-control', 'placeholder' => 'Seleccione un estado','id'=>'estadContrato'])  !!} 
                                {!! Form::label('estadContrato','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoEstadoContrato'])  !!}
                            </div> 
                            <div class="col-md-6 separarBottom ocultarShowContrato">
                                {!! Form::label('adjuntoContrato','Adjunto')  !!}
                                {{ Form::file('adjuntoContrato', ['class' => 'form-control','id'=>'adjuntoContrato']) }}
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col-md-12 separarBottom">
                                {!! Form::label('detalles','Detalles')  !!}
                                {{ Form::textarea('detalles', null, ['size' => '3x3','class' => 'form-control', 'placeholder' => 'Detalles de contratación','id'=>'detalles']) }}
                            </div> 
                        </div>
                  {!! Form::close() !!}
                  </div>

                  <div class="modal-footer">
                    {!! Form::button('Cerrar', ['class'=>'btn btn-secondary', 'data-dismiss'=>'modal']) !!}
                    {!! Form::button('Agregar', ['class'=>'btn btn-primary addRow']) !!}
                    {!! Form::button('Editar', ['class'=>'btn btn-primary editRow']) !!}
                  </div>
                 </div>
              </div>
            </div>


            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Tipo contrato</th>
                        <th>Estado</th>
                        <th>Fecha inicio</th>
                        <th>Fecha fin</th>
                        <th>Adjunto</th>
                        <th>Acciones</th>
                    </tr>
                    <tbody>
                        @foreach($contratos as $contrato)
                            <tr>
                                <td>{{ $contrato->tipoContrato->tipoContrato }}</td>
                                <td>{{ $contrato->estado}}<span style="opacity: 0">-{{$contrato->id }}</span></td>
                                <td>{{ $contrato->fechaInicio }}</td>
                                <td>{{ $contrato->fechaFin }}</td>
                                <td>
                                    <a title="Adjunto" href="{{ $contrato->adjunto }}" target="_blank">
                                       <i class="fa fa-file" aria-hidden="true"></i> Archivo adjunto
                                    </a>
                                </td>
                                <td>
                                    <a title="Detalles" class="btn btn-default btn-xs buttonDetail">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a title="Eliminar" name="Hola" class="btn btn-danger btn-xs buttonDestroy">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </thead>
            </table>

        </div>

    </div>
</div>

<div class="panel panel-info">    
    <div class="panel-heading" role="button" data-toggle="collapse" href="#ventana5" aria-expanded="false" aria-controls="ventana5">Formación</div>
        <div class="collapse" id="ventana5">
        <div class="panel-body">

            {!! Form::button('Nuevo', ['class'=>'btn btn-primary separarTop separarBottomButtonn', 'id'=>'nuevoFormacion', 'data-toggle'=>'modal', 'data-target'=>'#modalFormaciones']) !!}

            <!-- Modal Formacion-->
            <div class="modal fade" id="modalFormaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><span style="font-size: 16px">Formación</span></h5>
                  </div>
                  <div class="modal-body">
                        {!! Form::open(['enctype' => 'multipart/form-data']) !!}
                            <div class="row">
                                <div class="col-md-6 separarBottom">
                                    {!! Form::label('tipoEstudio','Tipo')  !!}
                                    {!! Form::select('tipoEstudio', ['Academica'=>'Académica','Complementaria'=>'Complementaria'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione un tipo de formación','id'=>'tipoEstudio'])  !!} 
                                    {!! Form::label('tipoEstudio','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoTipoFormacion'])  !!}
                                </div> 
                                <div class="col-md-6 separarBottom">
                                    {!! Form::label('intExt','Categoría')  !!}
                                    {!! Form::select('intExt', ['Interna'=>'Interna','Externa'=>'Externa'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione un categoría','id'=>'intExt','disabled'])  !!} 
                                    {!! Form::label('intExt','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoCategoriaFormacion'])  !!}
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-6 separarBottom">
                                    {!! Form::label('nivelEstudio_id','Nivel de estudio')  !!}
                                    {!! Form::select('nivelEstudio_id', $nivelesFormacion, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un nivel de estudio','id'=>'nivelEstudio_id','disabled'])  !!} 
                                    {!! Form::label('nivelEstudio_id','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoNivelEstudio'])  !!}
                                </div> 
                                <div class="col-md-6 separarBottom">
                                    {!! Form::label('areaEstudio_id','Área')  !!}
                                    {!! Form::select('areaEstudio_id', $areasformacion, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una área','id'=>'areaEstudio_id'])  !!} 
                                    {!! Form::label('areaEstudio_id','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoAreaFormacion'])  !!}
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-6 separarBottom">
                                    {!! Form::label('titulacion','Titulación')  !!}
                                    {!! Form::text('titulacion',null, ['class' => 'form-control', 'required', 'id'=>'titulacion'])  !!}
                                    {!! Form::label('titulacion','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoTitulacionFormacion'])  !!}
                                </div>
                                <div class="col-md-6 separarBottom">
                                    {!! Form::label('institucionEducativa','Institución educativa')  !!}
                                    {!! Form::text('institucionEducativa',null, ['class' => 'form-control', 'required', 'id'=>'institucionEducativa'])  !!}
                                    {!! Form::label('institucionEducativa','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoInstitucionEducativaFormacion'])  !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 separarBottom">
                                    {!! Form::label('estadoFormacion','Estado')  !!}
                                    {!! Form::select('estadoFormacion', ['Abandonado'=>'Abandonado', 'Aplazado'=>'Aplazado', 'Culminado'=>'Culminado','En curso'=>'En curso'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione un estado','id'=>'estadoFormacion'])  !!} 
                                    {!! Form::label('estadoFormacion','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoEstadoFormacion'])  !!}
                                </div> 
                                <div class="col-md-6 separarBottom">
                                    {!! Form::label('fechaInicioFormacion','Fecha de inicio')  !!}
                                    {!! Form::date('fechaInicioFormacion',null, ['class' => 'form-control', 'required', 'id'=>'fechaInicioFormacion'])  !!}
                                    {!! Form::label('fechaInicioFormacion','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoFechaIniFormacion'])  !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 separarBottom">
                                    {!! Form::label('fechaFinFormacion','Fecha de finalización')  !!}
                                    {!! Form::date('fechaFinFormacion',null, ['class' => 'form-control', 'id'=>'fechaFinFormacion','readonly'])  !!}
                                    {!! Form::label('fechaFinFormacion','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoFechaFinFormacion'])  !!}
                                </div>
                                <div class="col-md-6 separarBottom">
                                    {!! Form::label('ciudadNacimientoFormacion','Ciudad de estudio')  !!}
                                    {!! Form::text('ciudadNacimientoFormacion',null, ['class' => 'form-control', 'required', 'id'=>'ciudadNacimientoFormacion'])  !!}
                                    {!! Form::label('ciudadNacimientoFormacion','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoCiudadFormacion'])  !!}
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-6 separarBottom ocultarShowFormacion">
                                    {!! Form::label('adjuntoFormacion','Adjunto')  !!}
                                    {{ Form::file('adjuntoFormacion', ['class' => 'form-control','id'=>'adjuntoFormacion']) }}
                                </div> 
                            </div>
                        {!! Form::close() !!}
                  </div>
                  <div class="modal-footer">
                    {!! Form::button('Cerrar', ['class'=>'btn btn-secondary', 'data-dismiss'=>'modal']) !!}
                    {!! Form::button('Agregar', ['class'=>'btn btn-primary addRowFormacion']) !!}
                    {!! Form::button('Editar', ['class'=>'btn btn-primary editRowFormacion']) !!}
                  </div>
                </div>
              </div>
            </div>

            <table id="inlineFormaciones" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Tipo formación</th>
                        <th>Clasificación</th>
                        <th>Nivel de formación</th>
                        <th>Área de formación</th>
                        <th>Estado</th>
                        <th>Adjunto</th>
                        <th>Acciones</th>
                    </tr>
                    <tbody>
                        @foreach($formaciones as $formacion)
                            <tr>
                                <td>{{ $formacion->tipoEstudio }}</td>
                                <td>{{ $formacion->intExt}}<span style="opacity: 0">-{{$formacion->id }}</span></td>
                                <td>{{ $formacion->NivelEstudio->nivelEstudio }}</td>
                                <td>{{ $formacion->AreaEstudio->areaEstudio }}</td>
                                <td>{{ $formacion->estado }}</td>
                                <td>
                                    <a title="Adjunto" href="{{ $formacion->adjunto }}" target="_blank">
                                       <i class="fa fa-file" aria-hidden="true"></i>  Archivo adjunto
                                    </a>
                                </td>
                                <td>
                                    <a title="Detalles" class="btn btn-default btn-xs buttonDetailFormaciones">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a title="Eliminar" class="btn btn-danger btn-xs buttonDestroyFormaciones">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </thead>
            </table>

        </div>
    </div>
</div>

<input type="hidden" id='tmp' name='tmp' value='{{ $tmp }}'> <!-- Para agregar el id temporal en la restriccion medica, se va a usar la identificacion del empleado -->
<div class="panel panel-info">    
    <div class="panel-heading" role="button" data-toggle="collapse" href="#ventana6" aria-expanded="false" aria-controls="ventana6">Exámenes</div>
        <div class="collapse" id="ventana6">
        <div class="panel-body">

            {!! Form::button('Nuevo', ['class'=>'btn btn-primary separarTop separarBottomButtonn', 'id'=>'nuevoExamen', 'data-toggle'=>'modal', 'data-target'=>'#modalExamenes']) !!}

            <!-- Modal Examen-->
            <div class="modal fade" id="modalExamenes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><span style="font-size: 16px">Exámen</span></h5>
                  </div>
                  <div class="modal-body">
                    {!! Form::open(['enctype' => 'multipart/form-data']) !!}
                        <div class="row">
                            <div class="col-md-6 separarBottom">
                                {!! Form::label('tipoExamen','Tipo')  !!}
                                {!! Form::select('tipoExamen', ['Ingreso'=>'Ingreso','Periodico'=>'Periodico','Extraordinario'=>'Extraordinario','Retiro'=>'Retiro'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione un tipo de formación','id'=>'tipoExamen', 'required'])  !!} 
                                {!! Form::label('tipoExamen','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoTipoExamen'])  !!}
                            </div> 
                            <div class="col-md-6 separarBottom">
                                {!! Form::label('fechaExamen','Fecha del examen')  !!}
                                {!! Form::date('fechaExamen',null, ['class' => 'form-control', 'required', 'id'=>'fechaExamen'])  !!}
                                {!! Form::label('fechaExamen','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoFechaExamen'])  !!}
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-md-8 separarBottom ocultarShowExamen">
                                {!! Form::label('adjuntoExamen','Adjunto')  !!}
                                {{ Form::file('adjuntoExamen', ['class' => 'form-control','id'=>'adjuntoExamen']) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 separarBottom">
                                {!! Form::label('concepto','Concepto médico')  !!}
                                {!! Form::textarea('concepto',null, ['class' => 'form-control', 'required', 'id'=>'concepto','size' => '30x3'])  !!}
                                {!! Form::label('fechaExamen','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoConceptoExamen'])  !!}
                            </div>
                        </div>
                        <hr>
                        <span id="secionRestriccionesModal">
                        <hr>                        
                            <div class="row">
                                <div class="col-md-12 separarBottom">
                                    {!! Form::label('restriccion','Restricción')  !!}
                                    {!! Form::textarea('restriccion',null, ['class' => 'form-control', 'id'=>'restriccion','size' => '30x2'])  !!}
                                    {!! Form::label('restriccion','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoRestriccion'])  !!}
                                </div> 
                                <div class="col-md-4 separarBottom">
                                    {!! Form::button('Agregar', ['class'=>' btn btn-danger', 'id'=>'addRestriccionMedica']) !!}
                                </div> 
                            </div>                           
                            <hr> 
                        </span>                    
                            <table id="restriccionesInlineTable" class="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Restricciones médicas</th>
                                        <th>Acciones</th>
                                    </tr>
                                    <tbody>
                                    </tbody>
                                </thead>
                            </table>

                    {!! Form::close() !!}
                  </div>
                  <div class="modal-footer">
                    {!! Form::button('Cerrar', ['class'=>'btn btn-secondary', 'data-dismiss'=>'modal']) !!}
                    {!! Form::button('Agregar', ['class'=>'btn btn-primary agregarExamenSubpanel']) !!}
                  </div>
                </div>
              </div>
            </div>

            <table id="inlineExamenes" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Tipo examen</th>
                        <th>Fecha</th>
                        <th>Adjunto</th>
                        <th>Acciones</th>
                    </tr>
                    <tbody>
                        @foreach($examenes as $examen)
                            <tr>
                                <td>{{ $examen->tipoExamen}}<span style="opacity: 0">-{{$examen->id }}</td>
                                <td>{{ $examen->fechaExamen}}</td>
                                <td>
                                    <a title="Adjunto" href="{{ $formacion->adjunto }}" target="_blank">
                                       <i class="fa fa-file" aria-hidden="true"></i>  Archivo adjunto
                                    </a>
                                </td>
                                <td>
                                    <a title="Detalles" class="btn btn-default btn-xs buttonDetailExamenes">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a title="Eliminar" class="btn btn-danger btn-xs buttonDestroyExamen">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </thead>
            </table>

        </div>
    </div>
</div>

<div class="panel panel-info">    
    <div class="panel-heading" role="button" data-toggle="collapse" href="#ventana7" aria-expanded="false" aria-controls="ventana7">Vacaciones, permisos o similares</div>
        <div class="collapse" id="ventana7">
        <div class="panel-body">

            {!! Form::button('Nuevo', ['class'=>'btn btn-primary separarTop separarBottomButtonn', 'id'=>'nuevoVacaciones', 'data-toggle'=>'modal', 'data-target'=>'#modalAusentismo']) !!}

            <!-- Modal Ausentismo-->
            <div class="modal fade" id="modalAusentismo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><span style="font-size: 16px">Ausentismo</span></h5>
                  </div>
                  <div class="modal-body">
                    {!! Form::open(['enctype' => 'multipart/form-data']) !!}
                        <div class="row">   
                            <div class="col-md-6 separarBottom">
                                {!! Form::label('tipoVacacion','Tipo ausentismo')  !!}
                                {!! Form::select('tipoVacacion', $tiposAusentismo, null, ['class' => 'form-control', 'placeholder' => 'Seleccione tipo de ausentismo','id'=>'tipoVacacion','required'])  !!} 
                                {!! Form::label('tipoVacacion','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoTipoVecaciones'])  !!}
                            </div>
                            <div class="col-md-6 separarBottom">
                                {!! Form::label('fechaInicioAusentismo','Fecha de inicio')  !!}
                                {!! Form::date('fechaInicioAusentismo',null, ['class' => 'form-control', 'required', 'id'=>'fechaInicioAusentismo'])  !!}
                                {!! Form::label('fechaInicioAusentismo','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoFechaIniVacaciones'])  !!}
                            </div>
                        </div>

                        <div class="row">   
                            <div class="col-md-6 separarBottom">
                                {!! Form::label('fechaFinAusentismo','Fecha de finalización')  !!}
                                {!! Form::date('fechaFinAusentismo',null, ['class' => 'form-control', 'required', 'id'=>'fechaFinAusentismo', 'readonly'])  !!}
                                {!! Form::label('fechaFinAusentismo','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoFechaFinVacaciones'])  !!}
                            </div>
                            <div class="col-md-6 separarBottom">
                                {!! Form::label('diasAusentismo','Número de días')  !!}
                                {!! Form::text('diasAusentismo',null, ['class' => 'form-control', 'readonly', 'id'=>'diasAusentismo'])  !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 separarBottom ocultarShowAusentismo">
                                {!! Form::label('adjuntoAusentismo','Adjunto')  !!}
                                {{ Form::file('adjuntoAusentismo', ['class' => 'form-control','id'=>'adjuntoAusentismo']) }}
                            </div>
                        </div>
                        <div class="row">  
                            <div class="col-md-12 separarBottom">
                                {!! Form::label('detallesAusentismo','Detalles')  !!}
                                {!! Form::textarea('detallesAusentismo',null, ['class' => 'form-control', 'required', 'id'=>'detallesAusentismo','size' => '30x3'])  !!}
                                {!! Form::label('detallesAusentismo','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoDetallesVacaciones'])  !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                  </div>
                  <div class="modal-footer">
                    {!! Form::button('Cerrar', ['class'=>'btn btn-secondary', 'data-dismiss'=>'modal']) !!}
                    {!! Form::button('Agregar', ['class'=>'btn btn-primary addRowAusentismo']) !!}
                    {!! Form::button('Editar', ['class'=>'btn btn-primary editRowAusentismo']) !!}
                  </div>
                </div>
              </div>
            </div>

            <table id="inlineAusentismos" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Tipo de ausentismo</th>
                        <th>Fecha inicio</th>
                        <th>Fecha fin</th>
                        <th>Adjunto</th>
                        <th>Acciones</th>
                    </tr>
                    <tbody>
                        @foreach($ausentismos as $ausentismo)
                            <tr>
                                <td>{{ $ausentismo->TipoVacaciones->tipoVacaciones}}<span style="opacity: 0">-{{$ausentismo->id }}</span></td>
                                <td>{{ $ausentismo->fechaInicio}}</td>
                                <td>{{ $ausentismo->fechaFin }}</td>
                                <td>
                                    <a title="Adjunto" href="{{ $ausentismo->adjunto }}" target="_blank">
                                       <i class="fa fa-file" aria-hidden="true"></i>  Archivo adjunto
                                    </a>
                                </td>
                                <td>
                                    <a title="Detalles" class="btn btn-default btn-xs buttonDetailAusentismo">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a title="Eliminar" class="btn btn-danger btn-xs buttonDestroyAusentismo">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </thead>
            </table>

        </div>
    </div>
</div>

<div class="panel panel-info">    
    <div class="panel-heading" role="button" data-toggle="collapse" href="#ventana8" aria-expanded="false" aria-controls="ventana8">Seguimiento SST (Seguridad y salud en el trabajo)</div>
        <div class="collapse" id="ventana8">
        <div class="panel-body">

            {!! Form::button('Nuevo', ['class'=>'btn btn-primary separarTop separarBottomButtonn', 'id'=>'nuevo_sst', 'data-toggle'=>'modal', 'data-target'=>'#modalSST']) !!}

            <!-- Modal SST-->
            <div class="modal fade" id="modalSST" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><span style="font-size: 16px">SST</span></h5>
                  </div>
                  <div class="modal-body">
                    {!! Form::open(['enctype' => 'multipart/form-data']) !!}
                        <div class="row">   
                            <div class="col-md-6 separarBottom">
                                {!! Form::label('tipoSST_id','Tipo SST')  !!}
                                {!! Form::select('tipoSST_id', $tipoSST, null, ['class' => 'form-control', 'placeholder' => 'Seleccione tipo de SST','id'=>'tipoSST_id','required'])  !!} 
                                {!! Form::label('tipoSST_id','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoTipoSST'])  !!}
                            </div>
                            <div class="col-md-6 separarBottom">
                                {!! Form::label('fechaSST','Fecha')  !!}
                                {!! Form::date('fechaSST',null, ['class' => 'form-control', 'required', 'id'=>'fechaSST'])  !!}
                                {!! Form::label('fechaSST','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoFechaSST'])  !!}
                            </div>
                        </div>

                        <div class="row">  
                            <div class="col-md-12 separarBottom">
                                {!! Form::label('causaPrincipal_id','Causa principal')  !!}
                                {!! Form::select('causaPrincipal_id', $causasSSt_principales, null, ['class' => 'form-control chosen', 'placeholder' => 'Seleccione una causa','id'=>'causaPrincipal_id','required'])  !!} 
                                {!! Form::label('causaPrincipal_id','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoCausaPrinSST'])  !!}
                            </div>
                        </div>

                        <div class="row">  
                            <div class="col-md-12 separarBottom">
                                {!! Form::label('causaComplementaria_id','Causa complementaria')  !!}
                                {!! Form::select('causaComplementaria_id', $causasSSt_complementarias, null, ['class' => 'form-control chosen', 'placeholder' => 'Seleccione una causa','id'=>'causaComplementaria_id','required'])  !!} 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 separarBottom ocultarShow_sst">
                                {!! Form::label('adjunto_sst','Adjunto')  !!}
                                {{ Form::file('adjunto_sst', ['class' => 'form-control','id'=>'adjunto_sst']) }}
                            </div>
                        </div>
                        <div class="row">  
                            <div class="col-md-12 separarBottom">
                                {!! Form::label('detallesSST','Detalles')  !!}
                                {!! Form::textarea('detallesSST',null, ['class' => 'form-control', 'required', 'id'=>'detallesSST','size' => '30x3'])  !!}
                                {!! Form::label('detalles','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoDetallesSST'])  !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                  </div>

                  <div class="modal-footer">
                    {!! Form::button('Cerrar', ['class'=>'btn btn-secondary', 'data-dismiss'=>'modal']) !!}
                    {!! Form::button('Agregar', ['class'=>'btn btn-primary addRow_sst']) !!}
                    {!! Form::button('Editar', ['class'=>'btn btn-primary editRow_sst']) !!}
                  </div>
                </div>
              </div>
            </div>

            <table id="inlineSST" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Tipo SST</th>
                        <th>Fecha</th>
                        <th>Adjunto</th>
                        <th>Acciones</th>
                    </tr>
                    <tbody>
                        @foreach($SSTs as $SST)
                            <tr>
                                <td>{{ $SST->TipoSST->tipoSST}}<span style="opacity: 0">-{{$SST->id }}</span></td>
                                <td>{{ $SST->fechaSST }}</td>
                                <td>
                                    <a title="Adjunto" href="{{ $SST->adjunto }}" target="_blank">
                                       <i class="fa fa-file" aria-hidden="true"></i>  Archivo adjunto
                                    </a>
                                </td>
                                <td>
                                    <a title="Detalles" class="btn btn-default btn-xs buttonDetailSST">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a title="Eliminar" class="btn btn-danger btn-xs buttonDestroySST">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </thead>
            </table>

        </div>
    </div>
</div>

<div class="panel panel-info">    
    <div class="panel-heading" role="button" data-toggle="collapse" href="#ventana9" aria-expanded="false" aria-controls="ventana9">Adjuntos</div>
        <div class="collapse" id="ventana9">
        <div class="panel-body">

            {!! Form::button('Nuevo', ['class'=>'btn btn-primary separarTop separarBottomButtonn', 'id'=>'nuevoAdjunto', 'data-toggle'=>'modal', 'data-target'=>'#modalAdjunto']) !!}

            <!-- Modal Adjunto-->
            <div class="modal fade" id="modalAdjunto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><span style="font-size: 16px">Adjunto</span></h5>
                  </div>
                  <div class="modal-body">

                    <div class="row">
                        <div class="col-md-8 separarBottom">
                            {!! Form::label('nombre','Nombre adjunto')  !!}
                            {!! Form::text('nombre',null, ['class' => 'form-control', 'id'=>'nombre'])  !!}
                            {!! Form::label('nombre','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoNombreAdjunto'])  !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 separarBottom ocultarShowAdjunto">
                            {!! Form::label('adjuntoAdjunto','Adjunto')  !!}
                            {{ Form::file('adjuntoAdjunto', ['class' => 'form-control','id'=>'adjuntoAdjunto']) }}
                            {!! Form::label('adjuntoAdjunto','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoRutaAdjunto'])  !!}
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-md-12 separarBottom">
                            {!! Form::label('detallesAdjunto','Detalles')  !!}
                            {!! Form::textarea('detallesAdjunto',null, ['class' => 'form-control', 'id'=>'detallesAdjunto', 'size' => '2x3'])  !!}
                        </div>
                    </div>

                  </div>

                  <div class="modal-footer">
                    {!! Form::button('Cerrar', ['class'=>'btn btn-secondary', 'data-dismiss'=>'modal']) !!}
                    {!! Form::button('Agregar', ['class'=>'btn btn-primary addRowAdjunto']) !!}
                    {!! Form::button('Editar', ['class'=>'btn btn-primary editRowAdjunto']) !!}
                  </div>
                </div>
              </div>
            </div>

            <table id="inlineAdjuntos" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Adjunto</th>
                        <th>Acciones</th>
                    </tr>
                    <tbody>
                        @foreach($adjuntos as $adjunto)
                            <tr>
                                <td>{{ $adjunto->nombre}}<span style="opacity: 0">-{{$adjunto->id }}</span></td>
                                <td>
                                    <a title="Adjunto" href="{{ $adjunto->adjunto }}" target="_blank">
                                        <i class="fa fa-file" aria-hidden="true"></i> Archivo adjunto
                                    </a>
                                </td>
                                <td>
                                    <a title="Detalles" class="btn btn-default btn-xs buttonDetailAdjunto">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a title="Eliminar" class="btn btn-danger btn-xs buttonDestroyAdjunto">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </thead>
            </table>

        </div>
    </div>
</div>

<a style="text-decoration: none;" href="{{ route('empleados.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>


@endsection

@section('js')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMM_PbONiaS31YzuFXQn9upMXPeVUkUyI&libraries=places&callback=initAutocomplete"
        async defer></script>

    <script src="{{ asset('js/empleados/shared.js') }}"></script>
    <script src="{{ asset('js/empleados/show.js') }}"></script>
    <script src="{{ asset('js/shared.js') }}"></script>
    <!-- Para submodulos -->
    <script src="{{ asset('js/contratos/shared.js') }}"></script>
    <script src="{{ asset('js/tableInlineContrato.js') }}"></script>

    <script src="{{ asset('js/formacion/shared.js') }}"></script>
    <script src="{{ asset('js/tableInlineFormaciones.js') }}"></script>
    

    <script src="{{ asset('js/examenes/create.js') }}"></script>
    <script src="{{ asset('js/tableInlineExamenes.js') }}"></script>

    <script src="{{ asset('js/vacaciones/shared.js') }}"></script>
    <script src="{{ asset('js/tableInlineAusentismos.js') }}"></script>

    <script src="{{ asset('js/SST/shared.js') }}"></script>
    <script src="{{ asset('js/tableInlineSST.js') }}"></script>

    <script src="{{ asset('js/adjuntos/shared.js') }}"></script>
    <script src="{{ asset('js/tableInlineAdjuntos.js') }}"></script>
@endsection