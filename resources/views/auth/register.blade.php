@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro de usuario</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('usuarios.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombres y apellidos</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Se agrega clase duplicado para agregar clases al validar duplicidad -->
                        <div class="duplicado form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo electrónico</label>

                            <div class="col-md-6">  

                                <!-- Se agrega clase validarDuplicado para capturar onchange -->
                                <input id="email" type="email" class="form-control validarDuplicado" name="email" value="{{ old('email') }}" required>

                                <!-- Elementos para mostrar validacion -->
                                <!-- Success -->
                                <span id="inputSuccess1Status" class="ocultar glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                                <span id="inputSuccess2Status" class="ocultar sr-only">(success)</span>
                                <!-- Error -->
                                <span id="inputError1Status" class="ocultar glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                                <span id="inputError2Status" class="ocultar sr-only">(error)</span>



                                @if ($errors->has('email'))
                                    <span style="color: red" class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary boton_duplicado">
                                    Registrar
                                </button>
                                <a style="text-decoration: none;" href="{{ route('usuarios.index') }}">
                                    {!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="modulo" id="modulo" value="usuarios">
@endsection

@section('js')
    <script src="{{ asset('js/shared.js') }}"></script>
@endsection