<!-- resources/views/tipos/tipo_liquidacion.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tipos de Liquidación</h1>
    <a href="{{ route('tipo_Liquidacion.create') }}" class="btn btn-primary mb-3">+Agregar Nueva Liquidacion</a>
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
                    <a href="{{ route('tipo_Liquidacion.edit', $tipo->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('tipo_Liquidacion.destroy', $tipo->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Borrar este elemento?')">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
