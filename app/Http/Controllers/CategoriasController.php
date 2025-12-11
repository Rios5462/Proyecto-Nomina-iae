<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categorias::all();

        return view('PCC.show_categorias', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('PCC.categorias');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:100|unique:categorias'
        ]);

        Categorias::create($request->all());

        return redirect()->route('categorias.index')
                         ->with('success', 'Categoria registrado con éxito!');
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
    public function edit(Categorias $categoria)
    {
        return view('PCC.edit_categorias', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorias $categoria)
    {
        $request->validate([
            'descripcion' => 'required|string|max:100|unique:categorias,descripcion,' . $categoria->id,
        ]);

        $categoria->update($request->all());

        return redirect()->route('categorias.index')
                         ->with('success', 'Categoría actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorias $categoria)
    {
        // Elimina el registro de la base de datos
        $categoria->delete();
        
        // Redirecciona de vuelta al listado con un mensaje de éxito.
        return redirect()->route('categorias.index')
                         ->with('success', 'Categoria eliminado con éxito!');
    }
}
