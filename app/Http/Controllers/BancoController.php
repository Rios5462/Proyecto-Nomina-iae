<?php

namespace App\Http\Controllers;

use App\Models\Banco;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class BancoController extends Controller
{
    /** Muestra una lista del recurso (Índice). */
    public function index()
    {
        $bancos = Banco::all(); 
        // Vista principal: resources/views/Bancos/Bancos.blade.php
        return view('Bancos.Bancos', compact('bancos'));
    }

    /** Muestra el formulario para crear un nuevo recurso. */
    public function create()
    {
        // Vista de creación: resources/views/Bancos/create_Bancos.blade.php
        return view('Bancos.create_Bancos');
    }

    /** Almacena un recurso recién creado en el almacenamiento. */
    public function store(Request $request)
    {
        $request->validate([
            'grupo' => 'required|string|max:50',
            'codigo_banco' => 'required|string|max:50|unique:bancos',
            'nombre' => 'required|string|max:255',
            'tipo_cuenta' => 'required|in:Corriente,Ahorro,Otra',
            // Los demás campos son opcionales (nullable en la migración)
        ]);

        Banco::create($request->all());

        return redirect()->route('bancos.index')->with('success', 'Banco agregado exitosamente.');
    }

    /** Muestra el formulario para editar el recurso especificado. */
    public function edit($id)
    {
        $banco = Banco::findOrFail($id);
        // Vista de edición: resources/views/Bancos/edit_Bancos.blade.php
        return view('Bancos.edit_Bancos', compact('banco'));
    }

    /** Actualiza el recurso especificado en el almacenamiento. */
    public function update(Request $request, $id)
    {
        $banco = Banco::findOrFail($id);
        
        $request->validate([
            'grupo' => 'required|string|max:50',
            // El código del banco debe ser único, excluyendo el ID actual
            'codigo_banco' => 'required|string|max:50|unique:bancos,codigo_banco,' . $id,
            'nombre' => 'required|string|max:255',
            'tipo_cuenta' => 'required|in:Corriente,Ahorro,Otra',
        ]);
        
        $banco->update($request->all());

        return redirect()->route('bancos.index')->with('success', 'Banco actualizado correctamente.');
    }

    /** Elimina el recurso especificado del almacenamiento. */
    public function destroy($id) 
    {
        $banco = Banco::find($id);

        if (!$banco) {
            return redirect()->route('bancos.index')
                             ->with('error', 'El registro que intentas eliminar ya no existe.');
        }
        
        try {
            $banco->delete();
            
            return redirect()->route('bancos.index')
                             ->with('success', 'El Banco fue eliminado exitosamente.');

        } catch (QueryException $e) {
            return redirect()->route('bancos.index')
                             ->with('error', '🚫 No se puede eliminar este banco. Podría estar asociado a otros registros.');
            
        } catch (\Exception $e) {
            return redirect()->route('bancos.index')
                             ->with('error', 'Ocurrió un error inesperado al intentar eliminar el registro.');
        }
    }
}