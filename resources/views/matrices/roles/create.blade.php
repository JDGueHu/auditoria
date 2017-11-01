@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('roles.index') }}"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;&nbsp;Roles y responsabilidades</a></li>
  <li class="active">Crear</li>
</ol>

{!! Form::open(['route' => 'roles.store', 'method' => 'POST','id'=>'rol_respon','enctype' => 'multipart/form-data']) !!} 

{!! Form::button('Guardar', ['class'=>'btn btn-primary crearExamen']) !!}
<a style="text-decoration: none;" href="{{ route('roles.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>

<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-4 separarBottom">
                {!! Form::label('rol','Rol')  !!}
                {!! Form::text('rol',null, ['class' => 'form-control', 'id'=>'rol', 'required'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('descripci','Identificación')  !!}
                {!! Form::text('descripción',null, ['class' => 'form-control', 'required', 'id'=>'descripción', 'readonly'])  !!}
            </div>
        </div>
    </div>
</div>

<div class="panel panel-primary">    
    <div class="panel-heading" role="button" data-toggle="collapse" href="#ventana2" aria-expanded="false" aria-controls="ventana2">Responsabilidades</div>
        <div class="collapse in" id="ventana2">
        <div class="panel-body">

        <div class="row">
            <div class="col-md-12 separarBottom">
                {!! Form::label('responsabilidad','Responsabilidad')  !!}
                {!! Form::textarea('responsabilidad',null, ['class' => 'form-control', 'id'=>'responsabilidad','size' => '30x2'])  !!}
                {!! Form::label('responsabilidad','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoResponsabilidad'])  !!}
            </div> 
            <div class="col-md-4 separarBottom">
                {!! Form::button('Agregar', ['class'=>' btn btn-danger', 'id'=>'addResponsabilidad']) !!}
            </div> 
        </div>
        <hr>
        <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Responsabilidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>
</div>

{!! Form::button('Guardar', ['class'=>'btn btn-primary separarTop separarBottomButtonn crearExamen']) !!}
<a style="text-decoration: none;" href="{{ route('roles.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

<input type="hidden" id='tmp' name='tmp' value='{{ $tmp }}'>

{!! Form::close() !!}

@endsection

@section('js')
    <script src="{{ asset('js/roles_responsabilidades/responsabilidad.js') }}"></script>
    <script src="{{ asset('js/tableBasic.js') }}"></script>
@endsection