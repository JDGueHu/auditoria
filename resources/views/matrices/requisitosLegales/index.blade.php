@extends('layouts.app')

@section('content')

    <ol class="breadcrumb">
      <li><a id="modulo" href="{{ route('requisitosLegales.index') }}"><i class="fa fa-gavel" aria-hidden="true"></i>&nbsp;&nbsp;Requisitos legales</a></li>
    </ol>

    <a href="{{ route('requisitosLegales.create') }}" class="btn btn-primary separarTop">Crear</a>

    <hr>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Número y fecha</th>
                    <th>Artículo</th>
                    <th>Estado</th>
                    <th>Cumplimiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requisitos as $requisito)
                    <tr>
                        <td>{{ $requisito->tipoRequisito->tipo_requisito_legal }}</td> 
                        <td>{{ $requisito->numero_fecha }}</td> 
                        <td>{{ $requisito->articulo }}</td> 
                        <td>{{ $requisito->estado }}</td> 
                        <td>{{ $requisito->cumplimiento }}</td> 
                        <td>
                            <a data-toggle="tooltip" data-placement="top" title="Detalles" href="{{ route('requisitosLegales.show',$requisito->id) }}" class="btn btn-default btn-xs">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('requisitosLegales.edit',$requisito->id) }}" class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Eliminar" href="{{ route('requisitosLegales.destroy',$requisito->id) }}" class="btn btn-danger btn-xs confirm_M">
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