<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarea; 
use App\Distribuidor; 

class TareaController extends Controller
{
    public function adminIndex()
    {
   
        $distribuidorId = auth()->user()->id;
        $tareas = Tarea::where('distribuidor_id', $distribuidorId)->get();

        return view('admin_tareas', compact('tareas'));
    }
       
        
    public function create()
    {
        $distribuidores = Distribuidor::all(); 
        return view('create_tarea', compact('distribuidores'));
    }
    
    
    public function store(Request $request)
    {

        $data = $request->validate([
            'fecha' => 'required|date',
            'nombre' => 'required',
            'direccion' => 'required',
            'latitud' => 'required',
            'longitud' => 'required',
            'mercancia' => 'required',
            'distribuidor_id' => 'required|exists:distribuidores,id',
        
        ]);

 
        Tarea::create($data);

        return redirect()->route('admin.tareas.index')->with('success', 'Tarea creada correctamente.');
    }

    public function edit(Tarea $tarea)
    {
        $distribuidores = Distribuidor::all(); 

        return view('edit_tarea', compact('tarea', 'distribuidores'));
    }

    public function update(Request $request, $id)
    {
        $tarea = Tarea::find($id);

        if (!$tarea) {
            return redirect()->route('admin.tareas.index')->with('error', 'Tarea no encontrada.');
        }
    
  
        
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
