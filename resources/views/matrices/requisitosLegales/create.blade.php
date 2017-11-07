@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a id="modulo" href="{{ route('requisitosLegales.index') }}"><i class="fa fa-gavel" aria-hidden="true"></i>&nbsp;&nbsp;Requisitos legales</a></li>
  <li class="active">Crear</li>
</ol>

{!! Form::open(['route' => 'requisitosLegales.store', 'method' => 'POST','enctype' => 'multipart/form-data']) !!} 

{!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
<a style="text-decoration: none;" href="{{ route('requisitosLegales.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>

<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row"> 
            <div class="col-md-3 separarBottom">
                {!! Form::label('tipo_requisito_legal_id','Tipo requisito legal')  !!}
                {!! Form::select('tipo_requisito_legal_id', $tipos_requisito, null, ['class' => 'form-control separarBottom', 'required', 'placeholder' => 'Seleccione un tipo de requisito','id'=>'tipo_requisito_legal_id'])  !!} 
            </div>  
            <div class="col-md-3 separarBottom">
                {!! Form::label('numero_fecha','Número y fecha')  !!}
                {!! Form::text('numero_fecha',null, ['class' => 'form-control', 'id'=>'numero_fecha', 'required'])  !!}
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('articulo','Artículo')  !!}
                {!! Form::text('articulo',null, ['class' => 'form-control', 'id'=>'articulo', 'required'])  !!}
            </div>
            <div class="col-md-3 separarBottom">
                {!! Form::label('autoridad_requisito_legal_id','Autoridad')  !!}
                {!! Form::select('autoridad_requisito_legal_id', $autoridades, null, ['class' => 'form-control separarBottom', 'required', 'placeholder' => 'Seleccione una autoridad','id'=>'autoridad_requisito_legal_id'])  !!} 
            </div>  
        </div>

        <div class="row"> 
            <h5 class="centrar">Tipo</h5>
            <div class="col-md-1 separarBottom">
                <label for="sst">SST</label>
                {!! Form::checkbox('sst', '1', false, ['class' => 'form-control checkbox', 'id'=>'sst'])!!}
            </div>
            <div class="col-md-1 separarBottom">
                <label for="amb">AMB</label>
                {!! Form::checkbox('amb', '1', false, ['class' => 'form-control checkbox', 'id'=>'amb'])!!}
            </div>
            <div class="col-md-1 separarBottom">
                <label for="cal">CAL</label>
                {!! Form::checkbox('cal', '1', false, ['class' => 'form-control checkbox', 'id'=>'cal'])!!}
            </div>
            <div class="col-md-1 separarBottom">
                <label for="cult">CULT</label>
                {!! Form::checkbox('cult', '1', false, ['class' => 'form-control checkbox', 'id'=>'cult'])!!}
            </div>
            <div class="col-md-1 separarBottom">
                <label for="tur">TUR</label>
                {!! Form::checkbox('tur', '1', false, ['class' => 'form-control checkbox', 'id'=>'tur'])!!}
            </div>
            <div class="col-md-1 separarBottom">
                <label for="eco">ECO</label>
                {!! Form::checkbox('eco', '1', false, ['class' => 'form-control checkbox', 'id'=>'eco'])!!}
            </div>
            <div class="col-md-1 separarBottom">
                <label for="otr">OTR</label>
                {!! Form::checkbox('otr', '1', false, ['class' => 'form-control checkbox', 'id'=>'otr'])!!}
            </div>
        </div>

        <div class="row"> 
            <div class="col-md-12 separarBottom">
                {!! Form::label('contenido','Contenido')  !!}
                {!! Form::textarea('contenido',null, ['class' => 'form-control', 'id'=>'contenido','size' => '30x2','required'])  !!}
            </div>
        </div>

        <div class="row"> 
            <div class="col-md-3 separarBottom">
                {!! Form::label('estado','Estado')  !!}
                {!! Form::select('estado', ['Vigente'=>'Vigente','Derogado'=>'Derogado','Obsoleto'=>'Obsoleto'], null, ['class' => 'form-control separarBottom', 'required', 'placeholder' => 'Seleccione un estado','id'=>'estado'])  !!} 
            </div> 
            <div class="col-md-3 separarBottom">
                {!! Form::label('cumplimiento','Cumplimiento')  !!}
                {!! Form::select('cumplimiento', ['Si'=>'Si','No'=>'No'], null, ['class' => 'form-control separarBottom', 'required', 'placeholder' => 'Seleccione el cumplimiento','id'=>'cumplimiento'])  !!} 
            </div> 
            <div class="col-md-6 separarBottom">
                {!! Form::label('responsable','Responsable')  !!}
                {!! Form::text('responsable',null, ['class' => 'form-control', 'id'=>'responsable'])  !!}
            </div>
        </div>

        <div class="row"> 
            <div class="col-md-12 separarBottom">
                {!! Form::label('evidencia_cumplimiento','Evidencia del cumplimiento')  !!}
                {!! Form::textarea('evidencia_cumplimiento',null, ['class' => 'form-control', 'id'=>'evidencia_cumplimiento','size' => '30x2','required'])  !!}
            </div>
        </div>

        <div class="row"> 
            <div class="col-md-12 separarBottom">
                {!! Form::label('plan_accion','Plan de acción')  !!}
                {!! Form::textarea('plan_accion',null, ['class' => 'form-control', 'id'=>'plan_accion','size' => '30x2','required'])  !!}
            </div>
        </div>

    </div>
</div>

{!! Form::submit('Guardar', ['class'=>'btn btn-primary separarTop separarBottomButtonn']) !!}
<a style="text-decoration: none;" href="{{ route('requisitosLegales.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>

{!! Form::close() !!}

@endsection
