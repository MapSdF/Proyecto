@extends('layouts.app2')

@section('title', 'SolFichaDs')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h2>Lista de solfichads</h2>
        </div>
        <div class="col text-end">
            <a href="{{ route('solicitudes.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Nueva SolFichaDs
            </a>
        </div>
    </div>

    <!-- Mensajes de éxito/error -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Tabla de solfichads -->
    <div class="card">
        <div class="card-body">
            @if($solfichads->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Cuartos de Casa</th>
                                <th>Personas de Casa</th>
                                <th>El Tipo de Sangre</th>
                                <th>Numero de Calle</th>
                                <th>Colonia</th>
                                <th>Codigo Postal</th>
                                <th>Municipio</th>
                                <th>Periodo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($solfichads as $solficha)
                                <tr>
                                    <td>{{ $solficha->cuartos_casa }}</td>
                                    <td>{{ $solficha->personas_casa }}</td>
                                    <td>{{ $solficha->calle_no }}</td>
                                    <td>{{ $solficha->colonia }}</td>
                                    <td>{{ $solficha->codigo_postal }}</td>
                                    <td>{{ $solficha->municipio }}</td>
                                    <td>{{ $solficha->periodo }}</td>
                                    
                                    <td>


                                        <div class="btn-group" role="group">
                                            <a href="{{ route('solicitudes.show', $solficha->no_solicitud) }}" class="btn btn-sm btn-info">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                            <a href="{{ route('solicitudes.edit', $solficha->no_solicitud) }}" class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil"></i> Editar
                                            </a>
                                            <form action="{{ route('solicitudes.destroy', $solficha->no_solicitud) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" 
                                                    onclick="return confirm('¿Está seguro de eliminar esta solicitud?')">
                                                    <i class="bi bi-trash"></i> Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info">
                    <i class="bi bi-info-circle"></i> No hay SolFichaDs registradas.
                    <a href="{{ route('solicitudes.create') }}">Crear la primera</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
