<?php

namespace App\Http\Controllers;

use App\Models\TasaInteres;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class TasaInteresController extends Controller
{
    /** Muestra una lista del recurso (Índice). */
    public function index()
    {
        // Ordenar por año y mes para visualización coherente
        $tasas = TasaInteres::orderBy('año', 'desc')->orderBy('mes', 'desc')->get(); 
        
        // Vista principal: resources/views/Bancos/Tasas_de_interes.blade.php
        return view('Bancos.Tasas_de_interes', compact('tasas'));
    }

    /** Muestra el formulario para crear un nuevo recurso. */
    public function create()
    {
        // Vista de creación: resources/views/Bancos/create_Tasas_de_interes.blade.php
        return view('Bancos.create_Tasas_de_interes');
    }

    /** Almacena un recurso recién creado en el almacenamiento. */
    public function store(Request $request)
    {
        $request->validate([
            'año' => 'required|integer|min:1900|max:2100',
            'mes' => 'required|integer|min:1|max:12',
            'tasa' => 'required|numeric|min:0|max:100.00',
            // Regla de unicidad combinada: única para el mismo año y mes
            'año' => 'unique:tasas_interes,año,NULL,id,mes,' . $request->mes,
        ]);

        TasaInteres::create($request->all());

        return redirect()->route('tasas_interes.index')->with('success', 'Tasa de Interés agregada.');
    }

    /** Muestra el formulario para editar el recurso especificado. */
    public function edit($id)
    {
        $tasa = TasaInteres::findOrFail($id);
        // Vista de edición: resources/views/Bancos/edit_Tasas_de_interes.blade.php
        return view('Bancos.edit_Tasas_de_interes', compact('tasa'));
    }

    /** Actualiza el recurso especificado en el almacenamiento. */
    public function update(Request $request, $id)
    {
        $tasa = TasaInteres::findOrFail($id);
        
        $request->validate([
            'año' => 'required|integer|min:1900|max:2100',
            'mes' => 'required|integer|min:1|max:12',
            'tasa' => 'required|numeric|min:0|max:100.00',
            // Regla de unicidad combinada: única para el mismo año y mes, ignorando el ID actual
            'año' => 'unique:tasas_interes,año,' . $id . ',id,mes,' . $request->mes,
        ]);
        
        $tasa->update($request->all());

        return redirect()->route('tasas_interes.index')->with('success', 'Tasa de Interés actualizada correctamente.');
    }

    /** Elimina el recurso especificado del almacenamiento. */
    public function destroy($id) 
    {
        $tasa = TasaInteres::find($id);

        if (!$tasa) {
            return redirect()->route('tasas_interes.index')
                             ->with('error', 'El registro que intentas eliminar ya no existe.');
        }
        
        try {
            $tasa->delete();
            
            return redirect()->route('tasas_interes.index')
                             ->with('success', 'La Tasa de Interés fue eliminada exitosamente.');

        } catch (\Exception $e) {
            // No suele haber FK en Tasas de Interés, pero se mantiene el catch genérico
            return redirect()->route('tasas_interes.index')
                             ->with('error', 'Ocurrió un error inesperado al intentar eliminar el registro.');
        }
    }
    
    // Función de ayuda para obtener el nombre del mes
    private function getMonthName($monthNumber)
    {
        $months = [
            1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 
            5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto', 
            9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
        ];
        return $months[$monthNumber] ?? 'Desconocido';
    }
}