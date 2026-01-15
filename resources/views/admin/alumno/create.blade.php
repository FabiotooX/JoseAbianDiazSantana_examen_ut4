@extends('adminlte::page')

@section('title', 'Formulario de registro de calificaciones')

@section('content_header')
    <h1>{{ __('SixSeven') }} : </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- 
                Formulario apuntando a la ruta 'store'. 
                SOLUCIÓN: Se usa POST para enviar datos seguros.
            --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form action="{{ route('admin.alumno.store') }}" method="POST">
                {{-- 
                    @csrf: Directiva OBLIGATORIA en Laravel para formularios POST.
                    Genera un token oculto para proteger contra ataques CSRF (Cross-Site Request Forgery).
                --}}
                @csrf

                {{-- Campo Nombre --}}
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    {{-- 
                        old('campo'): Mantiene el valor escrito si falla la validación.
                        @error('campo'): Añade la clase 'is-invalid' de Bootstrap si hay error.
                    --}}
                    <input type="nombre" name="nombre" id="nombre" 
                           class="form-control @error('nombre') is-invalid @enderror" 
                           value="{{ old('nombre') }}" required>
                    
                    {{-- Mensaje de error específico para el campo --}}
                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Campo Modulo --}}
                <div class="form-group">
                    <label for="modulo">Módulo</label>
                    <input type="text" name="modulo" id="modulo" 
                           class="form-control @error('modulo') is-invalid @enderror" 
                           value="{{ old('modulo') }}" required maxlength="255">
                    @error('modulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Campo Calificacion --}}
                <div class="form-group">
                    <label for="calificacion">Calificacion</label>
                    <input type="number" id="calificacion" name="calificacion" value="{{ old('calificacion') }}" 
                        class="w-full border rounded p-2" min="0" required>        
                </div>

                {{-- Botones --}}
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop