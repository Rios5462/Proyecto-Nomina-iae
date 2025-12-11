@extends('layouts.app') 

@section('content')
<div class="container">
    {{-- Título de la vista --}}
    <h1>Examinando el Archivo Grupos de Bancos</h1>
    
    <hr>
    
    {{-- Mensajes de Sesión (Éxito o Error) --}}
    @if(session('success'))
    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
    @endif

    {{-- Botones de Acción Principal (Agregando los botones solicitados en el diseño) --}}
    <div class="mb-3 d-flex justify-content-start align-items-center">
        {{-- Botón Agregar --}}
        <a href="{{ route('grupo_bancos.create') }}" class="btn btn-primary me-2">
            <i class="fas fa-plus-circle"></i> Agregar
        </a>
        
        {{-- Botón Cerrar (Generalmente al final, pero lo colocamos aquí para coincidir con la solicitud) --}}
        <button type="button" onclick="window.close()" class="btn btn-dark ms-auto">
            Cerrar
        </button>
    </div>
    
    {{-- Tabla de Grupos Bancarios --}}
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Grupo</th>
                    <th scope="col">Banco</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Sucursal</th>
                    <th scope="col" style="width: 15%;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($grupos as $grupo)
                <tr>
                    <td>{{ $grupo->codigo_banco_grupo }}</td>
                    <td>{{ $grupo->codigo_banco_grupo }}</td> {{-- Se repite el código como en la imagen --}}
                    <td>{{ $grupo->descripcion }}</td>
                    <td>{{ $grupo->sucursal }}</td>
                    <td>
                        {{-- Botón Editar --}}
                        <a href="{{ route('grupo_bancos.edit', $grupo->id) }}" class="btn btn-warning btn-sm me-1">
                            Modificar
                        </a>
                        
                        {{-- Formulario para Borrar --}}
                        <form action="{{ route('grupo_bancos.destroy', $grupo->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar el grupo: {{ $grupo->descripcion }}?')">
                                Borrar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if(count($grupos) === 0)
                    <tr>
                        <td colspan="5" class="text-center">No hay Grupos Bancarios registrados.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    
    
@endsection