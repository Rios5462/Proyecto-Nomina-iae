<?php

namespace App\Http\Controllers;

use App\Models\Profesiones;
use Illuminate\Http\Request;

class ProfesionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profesiones = Profesiones::all();

        return view('PCC.show_profesiones', compact('profesiones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('PCC.profesiones');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:100|unique:profesiones',
        ]);

        Profesiones::create($request->all());

        return redirect()->route('profesiones.index')
                         ->with('success', '¡Profesión registrada con éxito!');
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
    public function edit(Profesiones $profesion)
    {
        return view('PCC.edit_profesiones', compact('profesion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profesiones $profesion)
    {
        $request->validate([
            'descripcion' => 'required|string|max:100|unique:profesiones,descripcion,' . $profesion->id,
        ]);

        $profesion->update($request->all());

        return redirect()->route('profesiones.index')
                         ->with('success', 'Profesión actualizada correctamente');
    }   
   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profesiones $profesiones)
    {
        // Elimina el registro de la base de datos
        $profesiones->delete();
        
        // Redirecciona de vuelta al listado con un mensaje de éxito.
        return redirect()->route('profesinoes.index')
                         ->with('success', 'Profesion eliminada con éxito!');
    }
}
