@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modificando registro (Editar Grupo Bancario)</h1>
    
    <hr>
    
    {{-- Mostrar errores de validación si existen --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('grupo_bancos.update', $grupo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            {{-- Código del Banco (Grupo) --}}
            <div class="col-md-4 mb-3">
                <label for="codigo_banco_grupo" class="form-label">Código del Banco (Grupo):</label>
                <input type="text" class="form-control" id="codigo_banco_grupo" name="codigo_banco_grupo" 
                       value="{{ old('codigo_banco_grupo', $grupo->codigo_banco_grupo) }}" required>
            </div>
            
            {{-- Descripción --}}
            <div class="col-md-8 mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" 
                       value="{{ old('descripcion', $grupo->descripcion) }}" required>
            </div>
        </div>
        
        <div class="row">
            {{-- Sucursal --}}
            <div class="col-md-6 mb-3">
                <label for="sucursal" class="form-label">Sucursal:</label>
                <input type="text" class="form-control" id="sucursal" name="sucursal" 
                       value="{{ old('sucursal', $grupo->sucursal) }}">
            </div>
            
            {{-- Dirección --}}
            <div class="col-md-6 mb-3">
                <label for="direccion" class="form-label">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" 
                       value="{{ old('direccion', $grupo->direccion) }}">
            </div>
        </div>

        <div class="row">
            {{-- Gerente --}}
            <div class="col-md-6 mb-3">
                <label for="gerente" class="form-label">Gerente:</label>
                <input type="text" class="form-control" id="gerente" name="gerente" 
                       value="{{ old('gerente', $grupo->gerente) }}">
            </div>
            
            {{-- Cuenta y Tipo de Cuenta (Simulación de la imagen) --}}
            <div class="col-md-6 mb-3 d-flex align-items-end">
                <div class="me-3" style="flex-grow: 1;">
                    <label for="cuenta" class="form-label">Cuenta:</label>
                    <input type="text" class="form-control" id="cuenta" name="cuenta" 
                           value="{{ old('cuenta', $grupo->cuenta) }}">
                </div>
                <div>
                    <span class="form-label d-block mb-1">Tipo Cuenta:</span>
                    {{-- Nota: El campo Tipo de Cuenta no se guardó en la migración por simplicidad, 
                         pero se mantiene visualmente como en la imagen. --}}
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo_cuenta" id="corriente" value="Corriente" checked>
                        <label class="form-check-label" for="corriente">Corriente</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo_cuenta" id="ahorro" value="Ahorro">
                        <label class="form-check-label" for="ahorro">Ahorro</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo_cuenta" id="otra" value="Otra">
                        <label class="form-check-label" for="otra">Otra</label>
                    </div>
                </div>
            </div>
        </div>

        {{-- Texto Inicial Carta --}}
        <div class="mb-3">
            <label for="texto_inicial_carta" class="form-label">Texto Inicial Carta:</label>
            <textarea class="form-control" id="texto_inicial_carta" name="texto_inicial_carta" rows="4">{{ old('texto_inicial_carta', $grupo->texto_inicial_carta) }}</textarea>
        </div>

        {{-- Texto Final Carta --}}
        <div class="mb-3">
            <label for="texto_final_carta" class="form-label">Texto Final Carta:</label>
            <textarea class="form-control" id="texto_final_carta" name="texto_final_carta" rows="4">{{ old('texto_final_carta', $grupo->texto_final_carta) }}</textarea>
        </div>
        
        {{-- Botones Inferiores (Aceptar y Cancelar) --}}
        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-success me-2">Aceptar</button>
            <a href="{{ route('grupo_bancos.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>
@endsection 