<!-- resources/views/tipos/create.tipo_liquidacion.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Agregar Tipo de Liquidación</h2>
    <form action="{{ route('tipo_Liquidacion.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" class="form-control" id="codigo" name="codigo" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
        <a href="{{ route('tipo_Liquidacion.index') }}" class="btn btn-secondary">Cancelar</a>
        <a href="{{ route('tipo_Liquidacion.index') }}" class="btn btn-secondary">Cerrar</a>
    </form>
</div>
@endsection
