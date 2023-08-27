<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarea; // Agrega esta línea para importar la clase Distribuidor
use App\Distribuidor; 

class TareaController extends Controller
{
    public function adminIndex()
    {
        // Obtener las tareas del distribuidor actual
        $distribuidorId = auth()->user()->id;
        $tareas = Tarea::where('distribuidor_id', $distribuidorId)->get();

        return view('admin_tareas', compact('tareas'));
    }
       
        
    public function create()
    {
        $distribuidores = Distribuidor::all(); // Obtén la lista de distribuidores
        return view('create_tarea', compact('distribuidores'));
    }
    
    
    public function store(Request $request)
    {
        // Validación de datos
        $data = $request->validate([
            'fecha' => 'required|date',
            'nombre' => 'required',
            'direccion' => 'required',
            'latitud' => 'required',
            'longitud' => 'required',
            'mercancia' => 'required',
            'distribuidor_id' => 'required|exists:distribuidores,id',
            // Agrega más reglas de validación según tus campos
        ]);

        // Crear la tarea
        Tarea::create($data);

        return redirect()->route('admin.tareas.index')->with('success', 'Tarea creada correctamente.');
    }

    public function edit(Tarea $tarea)
    {
        $distribuidores = Distribuidor::all(); // Obtén la lista de distribuidores

        return view('edit_tarea', compact('tarea', 'distribuidores'));
    }

    public function update(Request $request, $id)
    {
        $tarea = Tarea::find($id);

        if (!$tarea) {
            return redirect()->route('admin.tareas.index')->with('error', 'Tarea no encontrada.');
        }
    
        // Validación de datos
        
        $data = $request->validate([
            'fecha' => 'required|date',
            'nombre' => 'required',
            'direccion' => 'required',
            'latitud' => 'required',
            'longitud' => 'required',
            'mercancia' => 'required',
            'distribuidor_id' => 'required|exists:distribuidores,id',
          
        ]);
  
        $tarea->update($data);

        return redirect()->route('admin.tareas.index')->with('success', 'Tarea actualizada correctamente.');
    }

    public function destroy($id)
    {
        $tarea = Tarea::findOrFail($id);

        $tarea->delete();

        return redirect()->route('admin.tareas.index')
            ->with('success', 'Tarea eliminadda exitosamente');
    }

    
}
