
      @extends('layouts.app')                                                                                                                                                          
                                                                                                                                                                                     
    @section('content')                                                                                                                                                              
    <div class="container">                                                                                                                                                          
        <!-- Componente UF -->                                                                                                                                                       
        <x-uf-extract />                                                                                                                                                                
  
        <div class="d-flex justify-content-between align-items-center my-4">
            <h1>Proyectos Registrados</h1>
            <a href="{{ route('proyectos.create') }}" class="btn btn-primary">+ Agregar Proyecto</a>
        </div>
  
        <!-- Tabla con los datos del Modelo retornados por el Controlador -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha Inicio</th>
                    <th>Estado</th>
                    <th>Responsable</th>
                    <th>Monto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($proyectos as $proyecto)
                <tr>
                    <td>{{ $proyecto['id'] }}</td>
                    <td>{{ $proyecto['nombre'] }}</td>
                    <td>{{ $proyecto['fecha_inicio'] }}</td>
                    <td><span class="badge bg-info">{{ $proyecto['estado'] }}</span></td>
                    <td>{{ $proyecto['responsable'] }}</td>
                    <td>${{ number_format($proyecto['monto'], 0, ',', '.') }}</td>
                    <td>
    			<a href="{{ route('proyectos.show', $proyecto['id']) }}" class="btn btn-sm btn-info">Ver</a>
    			<a href="{{ route('proyectos.edit', $proyecto['id']) }}" class="btn btn-sm btn-warning">Editar</a>
    			<a href="{{ route('proyectos.delete', $proyecto['id']) }}" class="btn btn-sm btn-danger">Eliminar</a>
                     </td>
                 </tr>
                 @endforeach
            </tbody>
        </table>
    </div>
    @endsection
