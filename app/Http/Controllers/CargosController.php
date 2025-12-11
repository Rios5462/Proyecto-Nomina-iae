<?php

namespace App\Http\Controllers;

use App\Models\Cargos;
use Illuminate\Http\Request;

class CargosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cargos = Cargos::all();

        return view('PCC.show_cargos', compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('PCC.cargos');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:100|unique:cargos',
        ]);

        Cargos::create($request->all());

        return redirect()->route('cargos.index')
                         ->with('success', '¡Cargo registrado con éxito!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cargos $cargo)
    {
        return view('PCC.edit_cargos', compact('cargo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cargos $cargo)
    {
        
        $request->validate([
            'descripcion' => 'required|string|max:100|unique:cargos,descripcion,' . $cargo->id,
        ]);
        
        $cargo->update($request->all());

        return redirect()->route('cargos.index')
                         ->with('success', 'Cargo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cargos $cargo)
    {
        // Elimina el registro de la base de datos
        $cargo->delete();
        
        // Redirecciona de vuelta al listado con un mensaje de éxito.
        return redirect()->route('cargos.index')
                         ->with('success', 'cargo eliminado con éxito!');
    }
}
