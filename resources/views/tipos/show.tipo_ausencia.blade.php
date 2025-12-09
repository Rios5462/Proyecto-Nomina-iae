<!-- resources/views/tipos/show.tipo_ausencia.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalle del Tipo de Ausencia</h2>
    <p><strong>Código:</strong> {{ $tipo->codigo }}</p>
    <p><strong>Descripción:</strong> {{ $tipo->descripcion }}</p>
    <a href="{{ route('tipo_ausencia.index') }}" class="btn btn-secondary">Volver</a>
    <button class="btn btn-secondary" onclick="window.close()">Cerrar</button>
</div>
@endsection
