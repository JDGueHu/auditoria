@extends('layouts.app')

@section('content')

    <ol class="breadcrumb">
      <li><a id="modulo" href="{{ route('contratos.index') }}"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;&nbsp;Roles y responsabilidades</a></li>
    </ol>

    <a href="{{ route('contratos.create') }}" class="btn btn-primary separarTop">Crear</a>

    <hr>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Identificación</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Tipo Contrato</th>
                    <th>Duración (Meses)</th>
                    <th>Fecha inicio</th>
                    <th>Fecha fin</th>
<!--                     <th>Adjunto</th> -->
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contratos as $contrato)
                    <tr>
                        <td>{{ $contrato->identificacion }}</td> 
                        <td>{{ $contrato->nombres }}</td> 
                        <td>{{ $contrato->apellidos }}</td>   
                        <td>{{ $contrato->tipoContrato }}</td>    
                        <td>{{ $contrato->duracion }}</td>
                        <td>{{ $contrato->fechaInicio }}</td>
                        <td>{{ $contrato->fechaFin }}</td>
<!--                         <td>
                            <a title="Adjunto" href="{{ $contrato->adjunto }}" target="_blank">
                               <i class="fa fa-file" aria-hidden="true"></i>  Archivo adjunto
                            </a>
                        </td> -->
                        <td>
                            <a data-toggle="tooltip" data-placement="top" title="Detalles" href="{{ route('contratos.show',$contrato->id) }}" class="btn btn-default btn-xs">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('contratos.edit',$contrato->id) }}" class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Eliminar" href="{{ route('contratos.destroy',$contrato->id) }}" class="btn btn-danger btn-xs confirm_M">
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