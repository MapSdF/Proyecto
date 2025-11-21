@extends('layouts.app2')

@section('title', 'Nueva solfichads')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Nueva Solicitud de Ficha</h4>
                </div>
                <div class="card-body">
                    
                    <!-- Mostrar errores de validación -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>¡Error!</strong> Por favor corrija los siguientes errores:
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Formulario -->
                    <form action="{{ route('solicitudes.store') }}" method="POST">
                        @csrf

                        <!-- Cuartos casa -->
                        <div class="mb-3">
                            <label for="cuartos_casa" class="form-label">
                                Cuartos de Casa <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="number" 
                                class="form-control @error('cuartos_casa') is-invalid @enderror" 
                                id="cuartos_casa" 
                                name="cuartos_casa" 
                                value="{{ old('cuartos_casa') }}"
                                placeholder="Ej: 2"
                                min="1"
                                max="100"
                                required>
                            @error('cuartos_casa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Personas casa -->
                        <div class="mb-3">
                            <label for="personas_casa" class="form-label">
                                ¿Cuántas Personas Viven en Casa? <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="number" 
                                class="form-control @error('personas_casa') is-invalid @enderror" 
                                id="personas_casa" 
                                name="personas_casa" 
                                value="{{ old('personas_casa') }}"
                                placeholder="Ej: 4"
                                required>
                            @error('personas_casa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Personas dependen -->
                        <div class="mb-3">
                            <label for="personas_dependen" class="form-label">
                               ¿Cuántas Personas Dependen? <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="number" 
                                class="form-control @error('personas_dependen') is-invalid @enderror" 
                                id="personas_dependen" 
                                name="personas_dependen" 
                                value="{{ old('personas_dependen') }}"
                                placeholder="Ej: 2"
                                required>
                            @error('personas_dependen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tipo sangre -->
                        <div class="mb-3">
                            <label for="tipo_sangre" class="form-label">
                               Tipo de Sangre <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('tipo_sangre') is-invalid @enderror" 
                                id="tipo_sangre" 
                                name="tipo_sangre" 
                                value="{{ old('tipo_sangre') }}"
                                placeholder="Ej: O+"
                                required>
                            @error('tipo_sangre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                         
                           <!-- Comunicar_con -->
                              <div class="mb-3">
                             <label for="comunicar_con" class="form-label">
                              ¿Con Quién Comunicarse? <span class="text-danger">*</span>
                             </label>
                             <input 
                              type="text" 
                              class="form-control @error('comunicar_con') is-invalid @enderror" 
                              id="comunicar_con" 
                              name="comunicar_con" 
                              value="{{ old('comunicar_con') }}"
                              placeholder="Ej: Juan Pérez"
                              required>
                               @error('comunicar_con')
                              <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                              </div>
                            
                         <!-- Calle_no -->
                        <div class="mb-3">
                            <label for="calle_no" class="form-label">
                               Calle y Número <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('calle_no') is-invalid @enderror" 
                                id="calle_no" 
                                name="calle_no" 
                                value="{{ old('calle_no') }}"
                                placeholder="Ej: Av. Juárez #123"
                                required>
                            @error('calle_no')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                         <!-- Colonia -->
                        <div class="mb-3">
                            <label for="colonia" class="form-label">
                                Nombre de la Colonia <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('colonia') is-invalid @enderror" 
                                id="colonia" 
                                name="colonia" 
                                value="{{ old('colonia') }}"
                                placeholder="Ej: Colonia Progreso"
                                required>
                            @error('colonia')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Código postal -->
                        <div class="mb-3">
                            <label for="codigo_postal" class="form-label">
                                Código Postal <span class="text-danger">*</span>
                            </label>
                            <input 
                             type="text" 
                             class="form-control @error('codigo_postal') is-invalid @enderror" 
                             id="codigo_postal" 
                             name="codigo_postal" 
                             value="{{ old('codigo_postal') }}"
                             placeholder="Ej: 12345"
                             maxlength="5"
                             pattern="[0-9]{5}"
                             required>
                            @error('codigo_postal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Municipio -->
                        <div class="mb-3">
                            <label for="municipio" class="form-label">
                                Municipio <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('municipio') is-invalid @enderror" 
                                id="municipio" 
                                name="municipio" 
                                value="{{ old('municipio') }}"
                                placeholder="Ej: Celaya"
                                required>
                            @error('municipio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Entidad federativa -->
                        <div class="mb-3">
                            <label for="entidad_federativa" class="form-label">
                                Entidad Federativa <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('entidad_federativa') is-invalid @enderror" 
                                id="entidad_federativa" 
                                name="entidad_federativa" 
                                value="{{ old('entidad_federativa') }}"
                                placeholder="Ej: Guanajuato"
                                required>
                            @error('entidad_federativa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Teléfono -->
                        <div class="mb-3">
                            <label for="telefono" class="form-label">
                                Número de Teléfono <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="tel" 
                                class="form-control @error('telefono') is-invalid @enderror" 
                                id="telefono" 
                                name="telefono" 
                                value="{{ old('telefono') }}"
                                placeholder="Ej: 4611234567"
                                maxlength="10"
                                pattern="[0-9]{10}"
                                required>
                            @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Lugar trabajo -->
                        <div class="mb-3">
                            <label for="lugar_trabajo" class="form-label">
                                Lugar de Trabajo <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('lugar_trabajo') is-invalid @enderror" 
                                id="lugar_trabajo" 
                                name="lugar_trabajo" 
                                value="{{ old('lugar_trabajo') }}"
                                placeholder="Ej: Ciudad Altamirano"
                                required>
                            @error('lugar_trabajo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                           
                        <!-- Teléfono trabajo -->
                        <div class="mb-3">
                            <label for="telefono_trabajo" class="form-label">
                                Teléfono del Trabajo <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="tel" 
                                class="form-control @error('telefono_trabajo') is-invalid @enderror" 
                                id="telefono_trabajo" 
                                name="telefono_trabajo" 
                                value="{{ old('telefono_trabajo') }}"
                                placeholder="Ej: 7326730758"
                                maxlength="10"
                                pattern="[0-9]{10}"
                                required>
                            @error('telefono_trabajo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- No solicitud -->
                        <div class="mb-3">
                            <label for="no_solicitud" class="form-label">
                                Número de Solicitud <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="number" 
                                class="form-control @error('no_solicitud') is-invalid @enderror" 
                                id="no_solicitud" 
                                name="no_solicitud" 
                                value="{{ old('no_solicitud') }}"
                                placeholder="Ej: SOL-2025-001"
                                required>
                            @error('no_solicitud')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Periodo -->
                        <div class="mb-3">
                            <label for="periodo" class="form-label">
                                Periodo <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('periodo') is-invalid @enderror" 
                                id="periodo" 
                                name="periodo" 
                                value="{{ old('periodo') }}"
                                placeholder="Ej: 2024-2025"
                                required>
                            @error('periodo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Botones -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Guardar
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

