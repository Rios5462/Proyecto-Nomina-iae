@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Nuevo tipo de Tabulador</h1>
    
    {{-- Botón de referencia a la otra vista --}}
    <a href="{{ route('tabulador_categorias.index') }}" class="btn btn-secondary mb-3">
        Ver detalles de los Tabuladores de Categorias
    </a>

    {{-- 
        El action apunta a la ruta empleados.store (POST), que 
        será el método para guardar los datos en la base de datos.
    --}}
    <form action="{{ route('tabulador_categorias.store') }}" method="POST">
        @csrf {{-- ¡Directiva de seguridad obligatoria en Laravel! --}}


        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@error('descripcion_tipo')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror


        {{-- FILA 1: Nombre, Cédula, Sexo --}}
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="nombre" class="form-label">Nuevo Grupo:</label>
                <input type="text" class="form-control" id="grupo" name="grupo" required>
                <label for="nombre" class="form-label">Nuevo Salario:</label>
                <input type="text" class="form-control" id="salario" name="salario" required>
                <label for="nombre" class="form-label">Nuevo Bono Mes:</label>
                <input type="text" class="form-control" id="bono_mes" name="bono_mes" required>
                <label for="nombre" class="form-label">Nuevo Bono Dia:</label>
                <input type="text" class="form-control" id="bono_dia" name="bono_dia" required>
            </div>  
        </div>
        <button type="submit" class="btn btn-primary mt-4">Guardar Tabulador</button>
    </form>
</div>
@endsection