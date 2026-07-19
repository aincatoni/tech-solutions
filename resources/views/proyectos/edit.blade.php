
      @extends('layouts.app')                                                                                                                                                          
                                                                                                                                                                                     
    @section('content')                                                                                                                                                              
    <div class="container">                                                                                                                                                          
        <!-- Componente UF -->                                                                                                                                                       
        <x-uf-extract />                                                                                                                                                                
  
        <div class="d-flex justify-content-between align-items-center my-4">
            <h1>Editar Proyecto</h1>
            <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Volver</a>
        </div>
  
        <!-- Formulario para editar un proyecto -->
        <form action="{{ route('proyectos.update', $proyecto->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Proyecto</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $proyecto->nombre }}" required>
            </div>
            <div class="mb-3">
                <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ $proyecto->fecha_inicio }}" required>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-select" id="estado" name="estado" required>
                    <option value="En Progreso" {{ $proyecto->estado == 'En Progreso' ? 'selected' : '' }}>En Progreso</option>
                    <option value="Completado" {{ $proyecto->estado == 'Completado' ? 'selected' : '' }}>Completado</option>
                    <option value="Cancelado" {{ $proyecto->estado == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
                </select>       
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Proyecto</button>
        </form>
        
    </div>
    @endsection

