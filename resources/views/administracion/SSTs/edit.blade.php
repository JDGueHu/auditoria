@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('SST.index') }}"><i class="fa fa-shield" aria-hidden="true"></i>&nbsp;SST (Seguridad y Salud en el Trabajo)</a></li>
  <li class="active">Editar</li>
</ol>

{!! Form::model($SST,['route' => ['SST.update',$SST[0]->id], 'method' => 'PUT', 'id' => 'crearSST', 'enctype' => 'multipart/form-data']) !!}

{!! Form::button('Guardar', ['class'=>'btn btn-primary crear_sst']) !!}
<a style="text-decoration: none;" href="{{ route('SST.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>

<h1 id="nombreEmpleado">{{$SST[0]->nombres}} {{$SST[0]->apellidos}}</h1>
<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-4 separarBottom">
                {!! Form::label('tipoIdentificacion','Tipo identificación')  !!}
                {!! Form::text('tipoIdentificacion',$SST[0]->tipoDocumento, ['class' => 'form-control', 'id'=>'tipoIdentificacion', 'required', 'readonly'])  !!}
                {!! Form::label('tipoIdentificacion','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoTipoIdentificacionEmpleado'])  !!}
            </div>
            <div class="col-md-4 separarBottom">
                {!! Form::label('identificacion','Identificación')  !!}
                {!! Form::text('identificacion',$SST[0]->identificacion, ['class' => 'form-control', 'required', 'id'=>'identificacion', 'readonly'])  !!}
                {!! Form::label('identificacion','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoIdentificacionEmpleado'])  !!}
            </div>
        </div>
        <hr>

        <div class="row">   
            <div class="col-md-3 separarBottom">
                {!! Form::label('tipoSST_id','Tipo SST')  !!}
                {!! Form::select('tipoSST_id', $tipoSST, $SST[0]->tipoSST_id, ['class' => 'form-control', 'placeholder' => 'Seleccione tipo de SST','id'=>'tipoSST_id','required'])  !!} 
                {!! Form::label('tipoSST_id','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoTipoSST'])  !!}
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('fechaSST','Fecha')  !!}
                {!! Form::date('fechaSST', $SST[0]->fechaSST, ['class' => 'form-control', 'required', 'id'=>'fechaSST'])  !!}
                {!! Form::label('fechaSST','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoFechaSST'])  !!}
            </div>
        </div>

        <div class="row">  
            <div class="col-md-6 separarBottom">
                {!! Form::label('causaPrincipal_id','Causa principal')  !!}
                {!! Form::select('causaPrincipal_id', $causasSSt_principales, $SST[0]->causaPrincipal_id, ['class' => 'form-control chosen', 'placeholder' => 'Seleccione tipo de SST','id'=>'causaPrincipal_id','required'])  !!} 
                {!! Form::label('causaPrincipal_id','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoCausaPrinSST'])  !!}
            </div>
            <div class="col-md-6 separarBottom">
                {!! Form::label('causaComplementaria_id','Causa complementaria')  !!}
                {!! Form::select('causaComplementaria_id', $causasSSt_complementarias, $SST[0]->causaComplementaria_id, ['class' => 'form-control chosen', 'placeholder' => 'Seleccione tipo de SST','id'=>'causaComplementaria_id','required'])  !!} 
                {!! Form::label('causaComplementaria_id','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoCausaComSST'])  !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 separarBottom">
                {!! Form::label('adjunto','Adjunto')  !!}
                {{ Form::file('adjunto', ['class' => 'form-control','id'=>'adjunto']) }}
                <a title="Adjunto" href="{{ $SST[0]->adjunto }}" target="_blank">
                    {{ $SST[0]->adjunto  }}
                </a>
            </div>
        </div>
        <div class="row">  
            <div class="col-md-12 separarBottom">
                {!! Form::label('detalles','Detalles')  !!}
                {!! Form::textarea('detalles',$SST[0]->detalles, ['class' => 'form-control', 'required', 'id'=>'detalles','size' => '30x3'])  !!}
                {!! Form::label('detalles','Campo requerido', ['class' => 'textoAlerta ocultar','id'=>'requeridoDetallesSST'])  !!}
            </div>
        </div>

    </div>
</div>

{!! Form::button('Guardar', ['class'=>'btn btn-primary separarTop separarBottomButtonn crear_sst']) !!}
<a style="text-decoration: none;" href="{{ route('SST.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection

@section('js')
    <script src="{{ asset('js/shared.js') }}"></script>
    <script src="{{ asset('js/SST/shared.js') }}"></script>
    <script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
    <script >
        $(document).ready(function() {
            $(".chosen").chosen();
        });
    </script>
@endsection