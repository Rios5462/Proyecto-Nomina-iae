<!-- resources/views/tipos/edit.tipo_ausencia.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Tipo de Ausencia</h2>
    <form action="{{ route('tipo_ausencia.update', $tipo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" class="form-control" id="codigo" name="codigo" value="{{ $tipo->codigo }}" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $tipo->descripcion }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('tipo_ausencia.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="button" class="btn btn-secondary" onclick="window.close()">Cerrar</button>
    </form>
</div>
@endsection
