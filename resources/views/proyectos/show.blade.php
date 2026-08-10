@extends('layouts.app')

@section('title', 'Detalle del Proyecto')

@section('content')
<div class="container">
    <x-uf-extract />

    <div class="d-flex justify-content-between align-items-center my-4">
        <h1>Detalle del Proyecto</h1>
        <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Volver</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $proyecto->id }}</p>
            <p><strong>Nombre:</strong> {{ $proyecto->nombre }}</p>
            <p><strong>Fecha de Inicio:</strong> {{ $proyecto->fecha_inicio }}</p>
            <p><strong>Estado:</strong> {{ $proyecto->estado }}</p>
            <p><strong>Responsable:</strong> {{ $proyecto->responsable }}</p>
            <p><strong>Monto:</strong> ${{ number_format($proyecto->monto, 0, ',', '.') }}</p>
            <p><strong>Creado por:</strong> {{ $proyecto->creator?->name ?? 'Sin usuario' }}</p>
            <p class="mb-0"><strong>ID creador:</strong> {{ $proyecto->created_by ?? 'Sin asignar' }}</p>
        </div>
    </div>
</div>
@endsection
