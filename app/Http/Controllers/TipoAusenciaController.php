<?php

// app/Http/Controllers/TipoAusenciaController.php

namespace App\Http\Controllers;

use App\Models\TipoAusencia;
use Illuminate\Http\Request;

class TipoAusenciaController extends Controller
{
    public function index()
    {
        $tipos = TipoAusencia::all();
        return view('tipos.tipo_ausencia', compact('tipos'));
    }

    public function create()
    {
        return view('tipos.create_tipo_ausencia');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:tipos_ausencia,codigo',
            'descripcion' => 'required',
        ]);
        TipoAusencia::create($request->all());
        return redirect()->route('tipos.tipo_ausencia.index');
    }

    public function show($id)
    {
        $tipo = TipoAusencia::findOrFail($id);
        return view('tipos.show_tipo_ausencia', compact('tipo'));
    }

    public function edit($id)
    {
        $tipo = TipoAusencia::findOrFail($id);
        return view('tipos.edit_tipo_ausencia', compact('tipo'));
    }

    public function update(Request $request, $id)
    {
        $tipo = TipoAusencia::findOrFail($id);
        $request->validate([
            'codigo' => 'required|unique:tipos_ausencia,codigo,' . $tipo->id,
            'descripcion' => 'required',
        ]);
        $tipo->update($request->all());
        return redirect()->route('tipo_ausencia.index');
    }

    public function destroy($id)
    {
        $tipo = TipoAusencia::findOrFail($id);
        $tipo->delete();
        return redirect()->route('tipo_ausencia.index');
    }
}
