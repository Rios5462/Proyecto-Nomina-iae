<!-- resources/views/tipos/edit.tipo_liquidacion.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Tipo de Liquidación</h2>
    <form action="{{ route('tipo_Liquidacion.update', $tipo->id) }}" method="POST">
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
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('tipo_Liquidacion.index') }}" class="btn btn-secondary">Cancelar</a>
        
        
    </form>
</div>
@endsection
