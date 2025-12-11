@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Modificando registro (Editar Banco ID: {{ $banco->id }})</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('bancos.update', $banco->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- FILA 1: Grupo, Código del Banco, Nombre --}}
        <div class="row">
            {{-- Grupo --}}
            <div class="col-md-3 mb-3">
                <label for="grupo" class="form-label">Grupo:</label>
                <input type="text" class="form-control" id="grupo" name="grupo" 
                       value="{{ old('grupo', $banco->grupo) }}" required>
            </div>
            
            {{-- Código del Banco --}}
            <div class="col-md-3 mb-3">
                <label for="codigo_banco" class="form-label">Codigo del Banco:</label>
                <input type="text" class="form-control" id="codigo_banco" name="codigo_banco" 
                       value="{{ old('codigo_banco', $banco->codigo_banco) }}" required>
            </div>

            {{-- Nombre --}}
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" 
                       value="{{ old('nombre', $banco->nombre) }}" required>
            </div>
        </div>
        
        {{-- FILA 2: Sucursal, Dirección --}}
        <div class="row">
            {{-- Sucursal --}}
            <div class="col-md-6 mb-3">
                <label for="sucursal" class="form-label">Sucursal:</label>
                <input type="text" class="form-control" id="sucursal" name="sucursal" 
                       value="{{ old('sucursal', $banco->sucursal) }}">
            </div>
            
            {{-- Dirección --}}
            <div class="col-md-6 mb-3">
                <label for="direccion" class="form-label">Direccion:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" 
                       value="{{ old('direccion', $banco->direccion) }}">
            </div>
        </div>

        {{-- FILA 3: Gerente, Cuenta, Tipo Cuenta --}}
        <div class="row">
            {{-- Gerente --}}
            <div class="col-md-4 mb-3">
                <label for="gerente" class="form-label">Gerente:</label>
                <input type="text" class="form-control" id="gerente" name="gerente" 
                       value="{{ old('gerente', $banco->gerente) }}">
            </div>
            
            {{-- Cuenta --}}
            <div class="col-md-4 mb-3">
                <label for="cuenta" class="form-label">Cuenta:</label>
                <input type="text" class="form-control" id="cuenta" name="cuenta" 
                       value="{{ old('cuenta', $banco->cuenta) }}">
            </div>
            
            {{-- Tipo Cuenta (Radio Buttons) --}}
            <div class="col-md-4 mb-3">
                <label class="form-label d-block">Tipo Cuenta:</label>
                <div class="pt-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo_cuenta" id="corriente" value="Corriente" 
                               {{ old('tipo_cuenta', $banco->tipo_cuenta) == 'Corriente' ? 'checked' : '' }}>
                        <label class="form-check-label" for="corriente">Corriente</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo_cuenta" id="ahorro" value="Ahorro" 
                               {{ old('tipo_cuenta', $banco->tipo_cuenta) == 'Ahorro' ? 'checked' : '' }}>
                        <label class="form-check-label" for="ahorro">Ahorro</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo_cuenta" id="otra" value="Otra" 
                               {{ old('tipo_cuenta', $banco->tipo_cuenta) == 'Otra' ? 'checked' : '' }}>
                        <label class="form-check-label" for="otra">Otra</label>
                    </div>
                </div>
            </div>
        </div>

        {{-- TEXTO INICIAL CARTA (Textarea Grande) --}}
        <div class="mb-3">
            <label for="texto_inicial_carta" class="form-label">Texto Inicial Carta:</label>
            <textarea class="form-control" id="texto_inicial_carta" name="texto_inicial_carta" rows="6">{{ old('texto_inicial_carta', $banco->texto_inicial_carta) }}</textarea>
        </div>

        {{-- TEXTO FINAL CARTA (Textarea Grande) --}}
        <div class="mb-3">
            <label for="texto_final_carta" class="form-label">Texto Final Carta:</label>
            <textarea class="form-control" id="texto_final_carta" name="texto_final_carta" rows="6">{{ old('texto_final_carta', $banco->texto_final_carta) }}</textarea>
        </div>
        
        {{-- Botones Inferiores (Aceptar y Cancelar) --}}
        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-success me-2">Aceptar</button>
            <a href="{{ route('bancos.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>
@endsection