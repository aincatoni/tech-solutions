@extends('layouts.app')

@section('title', 'Proyectos Registrados')

@section('content')
<div class="container">
    <div class="hero-block pb-2">
        <span class="metric-chip mb-3">Panel principal</span>
        <div class="page-heading mt-0">
            <div>
                <h1>Proyectos Registrados</h1>
                <p class="page-copy text-muted-hero mb-0">Consulta el estado, responsable y creador de cada proyecto del sistema.</p>
            </div>
            <a href="{{ route('proyectos.create') }}" class="btn btn-primary">+ Agregar Proyecto</a>
        </div>
    </div>

    <div class="mb-4">
        <x-uf-extract />
    </div>

    <div class="table-wrap">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha Inicio</th>
                    <th>Estado</th>
                    <th>Responsable</th>
                    <th>Monto</th>
                    <th>Creado por</th>
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($proyectos as $proyecto)
                    <tr>
                        <td>{{ $proyecto->id }}</td>
                        <td>{{ $proyecto->nombre }}</td>
                        <td>{{ $proyecto->fecha_inicio }}</td>
                        <td><span class="badge bg-info">{{ $proyecto->estado }}</span></td>
                        <td>{{ $proyecto->responsable }}</td>
                        <td>${{ number_format($proyecto->monto, 0, ',', '.') }}</td>
                        <td>{{ $proyecto->creator?->name ?? 'Sin usuario' }}</td>
                        <td>
                            <div class="d-flex justify-content-end gap-2 flex-wrap">
                                <a href="{{ route('proyectos.show', $proyecto->id) }}" class="btn btn-sm btn-info">Ver</a>
                                <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                <a href="{{ route('proyectos.delete', $proyecto->id) }}" class="btn btn-sm btn-danger">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted-hero">No hay proyectos registrados todavia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
