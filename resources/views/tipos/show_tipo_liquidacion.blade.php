<!-- resources/views/tipos/show.tipo_liquidacion.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalle del Tipo de Liquidación</h2>
    <p><strong>Código:</strong> {{ $tipo->codigo }}</p>
    <p><strong>Descripción:</strong> {{ $tipo->descripcion }}</p>
    <a href="{{ route('tipos.index') }}" class="btn btn-secondary">Volver</a>
    <!-- Botón para cerrar la ventana -->
    <button onclick="window.close()" class="btn btn-secondary mt-2">Cerrar</button>
</div>
@endsection
