@extends('layouts.app')

@section('title', 'Eliminar Proyecto')

@section('content')
<div class="container">
    <div class="page-heading">
        <div>
            <h1>Eliminar Proyecto</h1>
            <p class="page-copy text-muted-hero mb-0">Confirma la eliminacion del proyecto antes de aplicar el cambio.</p>
        </div>
        <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Volver</a>
    </div>

    <div class="mb-4">
        <x-uf-extract />
    </div>

    <div class="card section-card border-danger-subtle">
        <div class="card-body p-4 p-lg-5">
            <p class="mb-4">Estas a punto de eliminar este proyecto de forma permanente:</p>

            <div class="row g-3 mb-4">
                <div class="col-md-6"><strong>ID:</strong><div class="text-muted-hero mt-1">{{ $proyecto->id }}</div></div>
                <div class="col-md-6"><strong>Nombre:</strong><div class="text-muted-hero mt-1">{{ $proyecto->nombre }}</div></div>
                <div class="col-md-6"><strong>Fecha Inicio:</strong><div class="text-muted-hero mt-1">{{ $proyecto->fecha_inicio }}</div></div>
                <div class="col-md-6"><strong>Estado:</strong><div class="text-muted-hero mt-1">{{ $proyecto->estado }}</div></div>
                <div class="col-md-6"><strong>Responsable:</strong><div class="text-muted-hero mt-1">{{ $proyecto->responsable }}</div></div>
                <div class="col-md-6"><strong>Monto:</strong><div class="text-muted-hero mt-1">${{ number_format($proyecto->monto, 0, ',', '.') }}</div></div>
            </div>

            <form action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST" class="d-flex justify-content-end gap-2">
                @csrf
                @method('DELETE')
                <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-danger">Confirmar Eliminacion</button>
            </form>
        </div>
    </div>
</div>
@endsection
