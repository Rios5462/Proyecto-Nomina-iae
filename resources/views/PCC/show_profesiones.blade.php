@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>detalles de Profesiones</h1>

    {{-- Botón de referencia a la otra vista --}}
    <a href="{{ route('profesiones.create') }}" class="btn btn-success mb-3">
        + Registrar Nueva Profesion
    </a>

    @if($profesiones->isEmpty())
        <div class="alert alert-warning">
            Aún no hay Profesiones registradas.
        </div>
    @else
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripcion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profesiones as $profesion)
                <tr>
                    <td>{{ $profesion->id }}</td>
                    <td>{{ $profesion->descripcion }}</td>
                    <td class="d-flex justify-content-center">
                        {{-- BOTÓN DE ACTUALIZAR (EDITAR) --}}
                        <a href="{{ route('profesiones.edit', $profesion) }}" class="btn btn-sm btn-primary me-2" title="Editar">
                            <i class="fas fa-edit"></i> Editar
                        </a>
    
                        {{-- BOTÓN DE ELIMINAR (usando un formulario POST para seguridad) --}}
                        <form action="{{ route('profesiones.destroy', $profesion->id) }}" method="POST" onsubmit="return confirm('¿Está seguro de que desea eliminar este registro?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection