@extends('layouts.app')

@section('content')
<div class="container">
    <x-uf-extract />

    <div class="d-flex justify-content-between align-items-center my-4">
        <h1>Eliminar Proyecto</h1>
        <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Volver</a>
    </div>

    <div class="card border-danger shadow-sm">
        <div class="card-body">
            <p class="mb-3">Estas a punto de eliminar este proyecto:</p>

            <ul class="list-group mb-4">
                <li class="list-group-item"><strong>ID:</strong> {{ $proyecto->id }}</li>
                <li class="list-group-item"><strong>Nombre:</strong> {{ $proyecto->nombre }}</li>
                <li class="list-group-item"><strong>Fecha Inicio:</strong> {{ $proyecto->fecha_inicio }}</li>
                <li class="list-group-item"><strong>Estado:</strong> {{ $proyecto->estado }}</li>
                <li class="list-group-item"><strong>Responsable:</strong> {{ $proyecto->responsable }}</li>
                <li class="list-group-item"><strong>Monto:</strong> ${{ number_format($proyecto->monto, 0, ',', '.') }}</li>
            </ul>

            <form action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Confirmar Eliminacion</button>
            </form>
        </div>
    </div>
</div>
@endsection
