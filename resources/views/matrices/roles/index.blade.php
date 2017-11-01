@extends('layouts.app')

@section('content')

    <ol class="breadcrumb">
      <li><a id="modulo" href="{{ route('roles.index') }}"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;&nbsp;Roles y responsabilidades</a></li>
    </ol>

    <a href="{{ route('roles.create') }}" class="btn btn-primary separarTop">Crear</a>

    <hr>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Rol</th>
                    <th>Fecha creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles_responsabilidades as $roles_responsabilidad)
                    <tr>
                        <td>{{ $roles_responsabilidad->rol }}</td> 
                        <td>{{ $roles_responsabilidad->created_at }}</td> 
                        <td>
                            <a data-toggle="tooltip" data-placement="top" title="Detalles" href="{{ route('roles.show',$roles_responsabilidad->id) }}" class="btn btn-default btn-xs">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('roles.edit',$roles_responsabilidad->id) }}" class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Eliminar" href="{{ route('roles.destroy',$roles_responsabilidad->id) }}" class="btn btn-danger btn-xs confirm_M">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/table.js') }}"></script>
    <script src="{{ asset('js/confirm.js') }}"></script>
@endsection