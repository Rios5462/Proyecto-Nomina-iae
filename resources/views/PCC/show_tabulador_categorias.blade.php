@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>detalles de Tabuladores de Categorias</h1>

    {{-- Botón de referencia a la otra vista --}}
    <a href="{{ route('tabulador_categorias.create') }}" class="btn btn-success mb-3">
        + Registrar Nuevo Tabulador de Categoria
    </a>

    @if($tabuladorCategorias->isEmpty())
        <div class="alert alert-warning">
            Aún no hay Tabuladores registradas.
        </div>
    @else
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Grupo</th>
                    <th>Salario</th>
                    <th>Bono Mes</th>
                    <th>Bono Dia</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tabuladorCategorias as $tabulador)
                <tr>
                    <td>{{ $tabulador->grupo }}</td>
                    <td>{{ $tabulador->salario }}</td>
                    <td>{{ $tabulador->bono_mes }}</td>
                    <td>{{ $tabulador->bono_dia }}</td>
                    <td class="d-flex justify-content-center">
                        {{-- BOTÓN DE ACTUALIZAR (EDITAR) --}}
                        <a href="{{ route('tabulador_categorias.edit', $tabulador) }}" class="btn btn-sm btn-primary me-2" title="Editar">
                            <i class="fas fa-edit"></i> Editar
                        </a>
    
                        {{-- BOTÓN DE ELIMINAR (usando un formulario POST para seguridad) --}}
                        <form action="{{ route('tabulador_categorias.destroy', $tabulador->id) }}" method="POST" onsubmit="return confirm('¿Está seguro de que desea eliminar este registro?');">
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