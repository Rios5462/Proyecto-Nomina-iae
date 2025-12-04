<?php

namespace App\Http\Controllers;

use App\Models\TipoNomina;
use Illuminate\Http\Request;

class TipoNominaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoNomina = tipoNomina::all();

        return view('tipos.show_tipo_nomina' , compact('tipoNomina'));        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipos.tipo_nomina');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // PASO 1: VALIDACIÓN DE DATOS
        $request->validate([
            'descripcion_nomina' => 'required|string|max:100',
        ]);

        // PASO 2: CREACIÓN DEL REGISTRO
        // El método create() toma todos los datos validados y los guarda en la base de datos.
        tipoNomina::create($request->all());

        // PASO 3: REDIRECCIÓN CON MENSAJE
        return redirect()->route('tipo_nominas.index')
                         ->with('success', '¡Nomina registrada con éxito!');
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
