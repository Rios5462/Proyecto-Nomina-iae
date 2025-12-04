@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Listado de Nominas</h1>

    {{-- Botón de referencia a la otra vista --}}
    <a href="{{ route('tipo_nominas.create') }}" class="btn btn-success mb-3">
        + Registrar Nueva Nomina
    </a>

    @if($tipoNomina->isEmpty())
        <div class="alert alert-warning">
            Aún no hay nominas registradas.
        </div>
    @else
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripcion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipoNomina as $nomina)
                <tr>
                    <td>{{ $nomina->id }}</td>
                    <td>{{ $nomina->descripcion_nomina }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection