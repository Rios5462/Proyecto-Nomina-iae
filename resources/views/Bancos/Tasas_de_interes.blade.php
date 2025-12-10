@extends('layouts.app') 

@section('content')
<div class="container">
    {{-- Título de la vista según la imagen --}}
    <h1>Examinando el archivo Tasas de Interés</h1>
    
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
        <a href="{{ route('tasas_interes.create') }}" class="btn btn-primary me-2">
            Agregar
        </a>
        
       

        {{-- Botón Cerrar --}}
        <button type="button" onclick="window.close()" class="btn btn-secondary ms-auto">
            Cerrar
        </button>
    </div>
    
    {{-- Tabla de Tasas de Interés --}}
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Año</th>
                    <th scope="col">Mes</th>
                    <th scope="col">Tasa (%)</th>
                    <th scope="col" style="width: 15%;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasas as $tasa)
                <tr>
                    <td>{{ $tasa->año }}</td>
                    <td>{{ $tasa->mes }}</td>
                    <td>{{ number_format($tasa->tasa, 2) }}</td> {{-- Formatear la tasa --}}
                    <td>
                        {{-- Botón Editar/Modificar --}}
                        <a href="{{ route('tasas_interes.edit', $tasa->id) }}" class="btn btn-warning btn-sm me-1">
                            Editar
                        </a>
                        
                        {{-- Formulario para Borrar --}}
                        <form action="{{ route('tasas_interes.destroy', $tasa->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Confirma eliminar la tasa de {{ $tasa->mes }}/{{ $tasa->año }}?')">
                                Borrar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if(count($tasas) === 0)
                    <tr>
                        <td colspan="4" class="text-center">No hay Tasas de Interés registradas.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection