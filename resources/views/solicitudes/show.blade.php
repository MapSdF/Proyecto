@extends('layouts.app2')

@section('title', 'Detalle de solicitud')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Detalle de Solicitud de Ficha</h4>
                    <div>
                        <a href="{{ route('solicitudes.edit', $solFichaDs->no_solicitud) }}" 
                           class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Editar
                        </a>
                        <a href="{{ route('solicitudes.index') }}" 
                           class="btn btn-sm btn-secondary">
                            <i class="bi bi-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th class="bg-light" width="40%">No de Solicitud</th>
                                        <td>
                                            <span class="badge bg-primary fs-6">{{ $solFichaDs->no_solicitud }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Periodo</th>
                                        <td>
                                            <span class="badge bg-success fs-6">{{ $solFichaDs->periodo }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Tipo de Sangre</th>
                                        <td>{{ $solFichaDs->tipo_sangre }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tbody>
                                      <tr>
                                        <th class="bg-light" width="40%">Creado</th>
                                        <td>{{ $solFichaDs->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>

                                        <th class="bg-light">Actualizado</th>
                                        <td>{{ $solFichaDs->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <hr>

                    <div class="mt-3">
                        <h5 class="border-bottom pb-2">Datos de Vivienda</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Cuartos en casa:</strong><br>{{ $solFichaDs->cuartos_casa }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Personas en casa:</strong><br>{{ $solFichaDs->personas_casa }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Personas que dependen:</strong><br>{{ $solFichaDs->personas_dependen }}</p>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="mt-3">
                        <h5 class="border-bottom pb-2">Información de Contacto</h5>
                        <p><strong>Comunicar con:</strong> {{ $solFichaDs->comunicar_con }}</p>
                    </div>

                    <hr>

                    <div class="mt-3">
                        <h5 class="border-bottom pb-2">Domicilio</h5>
                        <p>
                            <strong>Calle y No.:</strong> {{ $solFichaDs->calle_no }}<br>
                            <strong>Colonia:</strong> {{ $solFichaDs->colonia }}<br>
                            <strong>Código Postal:</strong> {{ $solFichaDs->codigo_postal }}<br>
                            <strong>Municipio:</strong> {{ $solFichaDs->municipio }}<br>
                            <strong>Entidad Federativa:</strong> {{ $solFichaDs->entidad_federativa }}
                        </p>
                    </div>

                    <hr>

                    <div class="mt-3">
                        <h5 class="border-bottom pb-2">Datos Laborales</h5>
                        <p>
                            <strong>Teléfono personal:</strong> {{ $solFichaDs->telefono }}<br>
                            <strong>Lugar de trabajo:</strong> {{ $solFichaDs->lugar_trabajo }}<br>
                            <strong>Teléfono del trabajo:</strong> {{ $solFichaDs->telefono_trabajo }}
                        </p>
                    </div>

                    <!-- Botón de eliminar -->
                    <div class="mt-4 border-top pt-3">
                        <form action="{{ route('solicitudes.destroy', $solFichaDs->no_solicitud) }}" 
                              method="POST" 
                              onsubmit="return confirm('¿Está seguro de eliminar esta solicitud?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Eliminar Solicitud
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection