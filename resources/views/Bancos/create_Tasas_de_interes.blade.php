@extends('layouts.app') 

@section('content')
<div class="container">
    {{-- Título de la vista --}}
    <h1 class="mb-4">Modificando registro (Nueva Tasa de Interés)</h1> 
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasas_interes.store') }}" method="POST">
        @csrf

        {{-- Campos: Año, Mes, Tasa --}}
        <div class="row">
            {{-- Año --}}
            <div class="col-md-4 mb-3">
                <label for="año" class="form-label">Año:</label>
                <input type="number" class="form-control" id="año" name="año" 
                       value="{{ old('año', date('Y')) }}" required min="1900" max="2100">
            </div>
            
            {{-- Mes (Dropdown para mejor usabilidad) --}}
            <div class="col-md-4 mb-3">
                <label for="mes" class="form-label">Mes:</label>
                <select class="form-select" id="mes" name="mes" required>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ old('mes', date('n')) == $i ? 'selected' : '' }}>
                            {{ DateTime::createFromFormat('!m', $i)->format('F') }} {{-- Muestra el nombre del mes --}}
                        </option>
                    @endfor
                </select>
            </div>

            {{-- Tasa --}}
            <div class="col-md-4 mb-3">
                <label for="tasa" class="form-label">Tasa (%):</label>
                <input type="number" step="0.01" class="form-control" id="tasa" name="tasa" 
                       value="{{ old('tasa') }}" required min="0" max="100">
                <div class="form-text">Ejemplo: 10.50 para 10.50%</div>
            </div>
        </div>
        
        {{-- Botones Inferiores (Aceptar y Cancelar) --}}
        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-success me-2">Aceptar</button>
            <a href="{{ route('tasas_interes.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>
@endsection