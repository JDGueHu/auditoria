@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('roles.index') }}"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;&nbsp;Roles y responsabilidades</a></li>
  <li class="active">Detalles</li>
</ol>


{!! Form::model($rol) !!}

<a style="text-decoration: none;" href="{{ route('roles.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottom'])  !!}
</a>

<div class="panel panel-primary">    
    <div class="panel-heading">Datos básicos</div>
    <div class="panel-body">

        <div class="row">   
            <div class="col-md-4 separarBottom">
                {!! Form::label('rol','Rol')  !!}
                {!! Form::text('rol',null, ['class' => 'form-control', 'id'=>'rol', 'readonly'])  !!}
            </div>
            <div class="col-md-8 separarBottom">
                {!! Form::label('descripcion','Descripción')  !!}
                {!! Form::textarea('descripcion',null, ['class' => 'form-control', 'readonly', 'id'=>'descripcion','size' => '30x2'])  !!}
            </div>
        </div>
    </div>
</div>

<div class="panel panel-primary">    
    <div class="panel-heading" role="button" data-toggle="collapse" href="#ventana2" aria-expanded="false" aria-controls="ventana2">Responsabilidades</div>
        <div class="collapse in" id="ventana2">
        <div class="panel-body">

        <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Responsabilidades</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($responsabilidades as $responsabilidad)
                    <tr>
                        <td>{{ $responsabilidad->responsabilidad }}</td>
                    </tr>
                @endforeach
            </tbody>
            </table>

        </div>
    </div>
</div>

<a style="text-decoration: none;" href="{{ route('roles.index') }}">
    {!! Form::button('Regresar',['class' => 'btn btn-default separarTop separarBottomButtonn'])  !!}
</a>


{!! Form::close() !!}

@endsection

@section('js')
    <script src="{{ asset('js/tableBasic.js') }}"></script>
@endsection