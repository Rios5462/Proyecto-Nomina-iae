<?php

namespace App\Http\Controllers;

use App\Models\GrupoBanco;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class GrupoBancoController extends Controller
{
    /** Muestra una lista del recurso (Índice). */
    public function index()
    {
        $grupos = GrupoBanco::all(); 
        // Nota: Cambiamos 'tipos' a 'Bancos' en el path de la vista
        return view('Bancos.grupo_bancos', compact('grupos'));
    }

    /** Muestra el formulario para crear un nuevo recurso. */
    public function create()
    {
        return view('Bancos.create_grupo_bancos');
    }

    /** Almacena un recurso recién creado en el almacenamiento. */
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'codigo_banco_grupo' => 'required|string|max:50|unique:grupos_bancos',
            'descripcion' => 'required|string|max:255',
            // Los demás campos son opcionales y pueden dejarse sin validación 'required'
        ]);

        GrupoBanco::create($request->all());

        return redirect()->route('grupo_bancos.index')->with('success', 'Grupo Bancario agregado exitosamente.');
    }

    /** Muestra el formulario para editar el recurso especificado. */
    public function edit($id)
    {
        $grupo = GrupoBanco::findOrFail($id);
        return view('Bancos.edit_grupo_bancos', compact('grupo'));
    }

    /** Actualiza el recurso especificado en el almacenamiento. */
    public function update(Request $request, $id)
    {
        $grupo = GrupoBanco::findOrFail($id);
        
        // Validación, ignorando el ID actual para permitir que el código sea el mismo
        $request->validate([
            'codigo_banco_grupo' => 'required|string|max:50|unique:grupos_bancos,codigo_banco_grupo,' . $id,
            'descripcion' => 'required|string|max:255',
        ]);
        
        $grupo->update($request->all());

        return redirect()->route('grupo_bancos.index')->with('success', 'Grupo Bancario actualizado correctamente.');
    }

    /** Elimina el recurso especificado del almacenamiento. */
    public function destroy($id) 
    {
        $grupo = GrupoBanco::find($id);

        if (!$grupo) {
            return redirect()->route('grupo_bancos.index')
                             ->with('error', 'El registro que intentas eliminar ya no existe.');
        }
        
        try {
            $grupo->delete();
            
            return redirect()->route('grupo_bancos.index')
                             ->with('success', 'El Grupo Bancario fue eliminado exitosamente.');

        } catch (QueryException $e) {
            // Manejo de error de clave foránea
            return redirect()->route('grupo_bancos.index')
                             ->with('error', '🚫 No se puede eliminar este grupo bancario. Está asociado a otros registros.');
            
        } catch (\Exception $e) {
            return redirect()->route('grupos_bancos.index')
                             ->with('error', 'Ocurrió un error inesperado al intentar eliminar el registro.');
        }
    }
}