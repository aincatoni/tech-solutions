@extends('layouts.app')

@section('title', 'Editar Proyecto')

@section('content')
<div class="container">
    <div class="page-heading">
        <div>
            <h1>Editar Proyecto</h1>
            <p class="page-copy text-muted-hero mb-0">Actualiza la informacion del proyecto sin alterar el usuario que lo creo.</p>
        </div>
        <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Volver</a>
    </div>

    <div class="mb-4">
        <x-uf-extract />
    </div>

    <div class="card section-card">
        <div class="card-body p-4 p-lg-5">
            <form action="{{ route('proyectos.update', $proyecto->id) }}" method="POST" class="d-grid gap-3">
                @csrf
                @method('PUT')

                <div>
                    <label for="nombre" class="form-label">Nombre del Proyecto</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre', $proyecto->nombre) }}" required>
                    @error('nombre')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                        <input type="date" class="form-control @error('fecha_inicio') is-invalid @enderror" id="fecha_inicio" name="fecha_inicio" value="{{ old('fecha_inicio', $proyecto->fecha_inicio) }}" required>
                        @error('fecha_inicio')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select @error('estado') is-invalid @enderror" id="estado" name="estado" required>
                            <option value="En Proceso" {{ old('estado', $proyecto->estado) == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                            <option value="Completado" {{ old('estado', $proyecto->estado) == 'Completado' ? 'selected' : '' }}>Completado</option>
                            <option value="Cancelado" {{ old('estado', $proyecto->estado) == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
                        </select>
                        @error('estado')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="responsable" class="form-label">Responsable</label>
                        <input type="text" class="form-control @error('responsable') is-invalid @enderror" id="responsable" name="responsable" value="{{ old('responsable', $proyecto->responsable) }}" required>
                        @error('responsable')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="monto" class="form-label">Monto</label>
                        <input type="number" step="0.01" class="form-control @error('monto') is-invalid @enderror" id="monto" name="monto" value="{{ old('monto', $proyecto->monto) }}" required>
                        @error('monto')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 pt-2">
                    <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Actualizar Proyecto</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
