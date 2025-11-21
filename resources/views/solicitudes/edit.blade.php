@extends('layouts.app2')

@section('title', 'Editar Solicitud de Ficha')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">Editar Solicitud de Ficha</h4>
                </div>
                <div class="card-body">

                    {{-- Mostrar errores de validación --}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>¡Error!</strong> Por favor corrige los siguientes errores:
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('solicitudes.update', $solFichaDs->no_solicitud) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- No. Solicitud (solo lectura) -->
                            <div class="col-md-6 mb-3">
                                <label for="no_solicitud" class="form-label">No. Solicitud</label>
                                <input 
                                    type="text" 
                                    id="no_solicitud" 
                                    class="form-control bg-light"
                                    value="{{ $solFichaDs->no_solicitud }}" 
                                    readonly disabled>
                                <small class="text-muted">Este campo no se puede modificar</small>
                            </div>

                            <!-- Periodo -->
                            <div class="col-md-6 mb-3">
                                <label for="periodo" class="form-label">Periodo</label>
                                <input 
                                    type="text" 
                                    name="periodo" 
                                    id="periodo" 
                                    class="form-control @error('periodo') is-invalid @enderror" 
                                    value="{{ old('periodo', $solFichaDs->periodo) }}">
                                @error('periodo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <!-- Datos de Vivienda -->
                        <h5 class="mt-3">Datos de Vivienda</h5>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="cuartos_casa" class="form-label">Cuartos en la casa</label>
                                <input 
                                    type="number" 
                                    name="cuartos_casa" 
                                    id="cuartos_casa"
                                    class="form-control @error('cuartos_casa') is-invalid @enderror"
                                    value="{{ old('cuartos_casa', $solFichaDs->cuartos_casa) }}">
                                @error('cuartos_casa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="personas_casa" class="form-label">Personas en casa</label>
                                <input 
                                    type="number" 
                                    name="personas_casa" 
                                    id="personas_casa"
                                    class="form-control @error('personas_casa') is-invalid @enderror"
                                    value="{{ old('personas_casa', $solFichaDs->personas_casa) }}">
                                @error('personas_casa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="personas_dependen" class="form-label">Personas que dependen</label>
                                <input 
                                    type="number" 
                                    name="personas_dependen" 
                                    id="personas_dependen"
                                    class="form-control @error('personas_dependen') is-invalid @enderror"
                                    value="{{ old('personas_dependen', $solFichaDs->personas_dependen) }}">
                                @error('personas_dependen')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <!-- Información Personal -->
                        <h5 class="mt-3">Información Personal</h5>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tipo_sangre" class="form-label">Tipo de Sangre</label>
                                <input 
                                    type="text" 
                                    name="tipo_sangre" 
                                    id="tipo_sangre"
                                    class="form-control @error('tipo_sangre') is-invalid @enderror"
                                    value="{{ old('tipo_sangre', $solFichaDs->tipo_sangre) }}">
                                @error('tipo_sangre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="comunicar_con" class="form-label">Comunicar en caso de emergencia con</label>
                                <input 
                                    type="text" 
                                    name="comunicar_con" 
                                    id="comunicar_con"
                                    class="form-control @error('comunicar_con') is-invalid @enderror"
                                    value="{{ old('comunicar_con', $solFichaDs->comunicar_con) }}">
                                @error('comunicar_con')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <!-- Domicilio -->
                        <h5 class="mt-3">Domicilio</h5>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="calle_no" class="form-label">Calle y No.</label>
                                <input 
                                    type="text" 
                                    name="calle_no" 
                                    id="calle_no"
                                    class="form-control @error('calle_no') is-invalid @enderror"
                                    value="{{ old('calle_no', $solFichaDs->calle_no) }}">
                                @error('calle_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="colonia" class="form-label">Colonia</label>
                                <input 
                                    type="text" 
                                    name="colonia" 
                                    id="colonia"
                                    class="form-control @error('colonia') is-invalid @enderror"
                                    value="{{ old('colonia', $solFichaDs->colonia) }}">
                                @error('colonia')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="codigo_postal" class="form-label">Código Postal</label>
                                <input 
                                    type="text" 
                                    name="codigo_postal" 
                                    id="codigo_postal"
                                    class="form-control @error('codigo_postal') is-invalid @enderror"
                                    value="{{ old('codigo_postal', $solFichaDs->codigo_postal) }}">
                                @error('codigo_postal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="municipio" class="form-label">Municipio</label>
                                <input 
                                    type="text" 
                                    name="municipio" 
                                    id="municipio"
                                    class="form-control @error('municipio') is-invalid @enderror"
                                    value="{{ old('municipio', $solFichaDs->municipio) }}">
                                @error('municipio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="entidad_federativa" class="form-label">Entidad Federativa</label>
                                <input 
                                    type="text" 
                                    name="entidad_federativa" 
                                    id="entidad_federativa"
                                    class="form-control @error('entidad_federativa') is-invalid @enderror"
                                    value="{{ old('entidad_federativa', $solFichaDs->entidad_federativa) }}">
                                @error('entidad_federativa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <!-- Contacto -->
                        <h5 class="mt-3">Contacto</h5>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input 
                                    type="text" 
                                    name="telefono" 
                                    id="telefono"
                                    class="form-control @error('telefono') is-invalid @enderror"
                                    value="{{ old('telefono', $solFichaDs->telefono) }}">
                                @error('telefono')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="telefono_trabajo" class="form-label">Teléfono del trabajo</label>
                                <input 
                                    type="text" 
                                    name="telefono_trabajo" 
                                    id="telefono_trabajo"
                                    class="form-control @error('telefono_trabajo') is-invalid @enderror"
                                    value="{{ old('telefono_trabajo', $solFichaDs->telefono_trabajo) }}">
                                @error('telefono_trabajo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="lugar_trabajo" class="form-label">Lugar de trabajo</label>
                            <input 
                                type="text" 
                                name="lugar_trabajo" 
                                id="lugar_trabajo"
                                class="form-control @error('lugar_trabajo') is-invalid @enderror"
                                value="{{ old('lugar_trabajo', $solFichaDs->lugar_trabajo) }}">
                            @error('lugar_trabajo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr>

                        <!-- Información adicional -->
                        <div class="alert alert-secondary">
                            <small>
                                <strong>Fecha de creación:</strong> {{ $solFichaDs->created_at->format('d/m/Y H:i') }}<br>
                                <strong>Última actualización:</strong> {{ $solFichaDs->updated_at->format('d/m/Y H:i') }}
                            </small>
                        </div>

                        <!-- Botones -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-save"></i> Actualizar
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
