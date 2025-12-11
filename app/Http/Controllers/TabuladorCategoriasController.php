<?php

namespace App\Http\Controllers;

use App\Models\TabuladorCategorias;
use Illuminate\Http\Request;

class TabuladorCategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tabuladorCategorias = TabuladorCategorias::all();

        return view('PCC.show_tabulador_categorias' , compact('tabuladorCategorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('PCC.tabulador_categorias');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'grupo' => 'required|string|max:50|unique:tabulador_categorias',
            'salario' => 'nullable|numeric',
            'bono_mes' => 'nullable|numeric',   
            'bono_dia' => 'nullable|numeric',
        ]);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
