<?php

namespace App\Http\Controllers;

use App\Models\TipoLiquidacion;
use Illuminate\Http\Request;

class TipoLiquidacionController extends Controller
{
    public function index()
    {
        $tipos = TipoLiquidacion::all();
        return view('tipos.tipo_liquidacion', compact('tipos'));
    }

    public function create()
    {
        return view('tipos.create_tipo_liquidacion');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:50',
            'descripcion' => 'required|string|max:255',
        ]);

        TipoLiquidacion::create($request->all());

        return redirect()->route('tipo_Liquidacion.index')->with('success', 'Tipo de liquidación creado.');
    }

    public function show($id)
    {
        $tipo = TipoLiquidacion::findOrFail($id);
        return view('tipos.show_tipo_liquidacion', compact('tipo'));
    }

    public function edit($id)
    {
        $tipo = TipoLiquidacion::findOrFail($id);
        // Vista alternativa que ya tenías
        return view('tipos.edit_tipo_Liquidacion', compact('tipo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'codigo' => 'required|string|max:50',
            'descripcion' => 'required|string|max:255',
        ]);

        $tipo = TipoLiquidacion::findOrFail($id);
        // Aquí aplicamos la versión con only()
        $tipo->update($request->only('codigo', 'descripcion'));

        return redirect()->route('tipo_Liquidacion.index')->with('success', 'Tipo de liquidación actualizado.');
    }

// Métodos alternativos removidos para evitar duplicados de métodos edit/update

    public function destroy($id)
    {
        $tipo = TipoLiquidacion::findOrFail($id);
        $tipo->delete();

        return redirect()->route('tipo_Liquidacion.index')->with('success', 'Tipo de liquidación eliminado.');
    }
}