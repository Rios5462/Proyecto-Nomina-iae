@extends('layouts.app') 

@section('content')
<div class="container">
    {{-- Título de la vista según la imagen --}}
    <h1>Examinando el Archivo Bancos</h1>
    
    <hr>
    
    @if(session('success'))
    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
    @endif

    {{-- Botones de Acción Principal según la imagen --}}
    <div class="mb-3 d-flex justify-content-start align-items-center">
        
        {{-- Botón Agregar --}}
        <a href="{{ route('bancos.create') }}" class="btn btn-primary me-2">
            Agregar
        </a>
        
        {{-- Botones de acción general (Modificar y Borrar se harán con el formulario) --}}
       
        {{-- Botón Cerrar --}}
        <button type="button" onclick="window.close()" class="btn btn-secondary ms-auto">
            Cerrar Ventana
        </button>
    </div>
    
    {{-- Tabla de Bancos --}}
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Grupo</th>
                    <th scope="col">Banco </th>
                    <th scope="col">Descripción </th>
                    <th scope="col">Sucursal</th>
                    <th scope="col" style="width: 15%;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bancos as $banco)
                <tr>
                    <td>{{ $banco->grupo }}</td>
                    <td>{{ $banco->codigo_banco }}</td>
                    <td>{{ $banco->nombre }}</td>
                    <td>{{ $banco->sucursal }}</td>
                    <td>
                        {{-- Botón Editar/Modificar --}}
                        <a href="{{ route('bancos.edit', $banco->id) }}" class="btn btn-warning btn-sm me-1">
                            Editar
                        </a>
                        
                        {{-- Formulario para Borrar --}}
                        <form action="{{ route('bancos.destroy', $banco->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Confirma eliminar el banco: {{ $banco->nombre }}?')">
                                Borrar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if(count($bancos) === 0)
                    <tr>
                        <td colspan="5" class="text-center">No hay Bancos registrados.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection