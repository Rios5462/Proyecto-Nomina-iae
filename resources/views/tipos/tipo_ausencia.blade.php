<!-- resources/views/tipos/tipo_ausencia.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tipos de Ausencia</h1>
    <a href="{{ route('tipo_ausencia.create') }}" class="btn btn-primary mb-3">+Agregar Nueva Ausencia</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tipos as $tipo)
            <tr>
                <td>{{ $tipo->codigo }}</td>
                <td>{{ $tipo->descripcion }}</td>
                <td>
                    <a href="{{ route('tipo_ausencia.edit', $tipo->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('tipo_ausencia.destroy', $tipo->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que desea eliminar?')">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button class="btn btn-secondary" onclick="window.close()">Cerrar</button>
</div>
@endsection
