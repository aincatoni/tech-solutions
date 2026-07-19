
      @extends('layouts.app')                                                                                                                                                          
                                                                                                                                                                                     
    @section('content')                                                                                                                                                              
    <div class="container">                                                                                                                                                          
        <!-- Componente UF -->                                                                                                                                                       
        <x-uf-extract />                                                                                                                                                                
  
        <div class="d-flex justify-content-between align-items-center my-4">
            <h1>Proyecto</h1>
            <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Volver</a>
        </div>
  
        <!-- Vista para mostrar los detalles de un proyecto -->
        <div class="row">
            <div class="col-md-6">
                <p><strong>Nombre:</strong> {{ $proyecto->nombre }}</p>
                <p><strong>Fecha de Inicio:</strong> {{ $proyecto->fecha_inicio }}</p>
                <p><strong>Estado:</strong> {{ $proyecto->estado }}</p>
            </div>
        </div>
    @endsection


