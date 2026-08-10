@extends('layouts.app')

@section('title', 'Detalle del Proyecto')

@section('content')
<div class="container">
    <div class="page-heading">
        <div>
            <h1>Detalle del Proyecto</h1>
            <p class="page-copy text-muted-hero mb-0">Consulta los datos principales y su trazabilidad con el usuario creador.</p>
        </div>
        <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Volver</a>
    </div>

    <div class="mb-4">
        <x-uf-extract />
    </div>

    <div class="card section-card">
        <div class="card-body p-4 p-lg-5">
            <div class="row g-4">
                <div class="col-md-6"><strong>ID:</strong><div class="text-muted-hero mt-1">{{ $proyecto->id }}</div></div>
                <div class="col-md-6"><strong>Nombre:</strong><div class="text-muted-hero mt-1">{{ $proyecto->nombre }}</div></div>
                <div class="col-md-6"><strong>Fecha de Inicio:</strong><div class="text-muted-hero mt-1">{{ $proyecto->fecha_inicio }}</div></div>
                <div class="col-md-6"><strong>Estado:</strong><div class="mt-2"><span class="badge bg-info">{{ $proyecto->estado }}</span></div></div>
                <div class="col-md-6"><strong>Responsable:</strong><div class="text-muted-hero mt-1">{{ $proyecto->responsable }}</div></div>
                <div class="col-md-6"><strong>Monto:</strong><div class="text-muted-hero mt-1">${{ number_format($proyecto->monto, 0, ',', '.') }}</div></div>
                <div class="col-md-6"><strong>Creado por:</strong><div class="text-muted-hero mt-1">{{ $proyecto->creator?->name ?? 'Sin usuario' }}</div></div>
                <div class="col-md-6"><strong>ID creador:</strong><div class="text-muted-hero mt-1">{{ $proyecto->created_by ?? 'Sin asignar' }}</div></div>
            </div>
        </div>
    </div>
</div>
@endsection
