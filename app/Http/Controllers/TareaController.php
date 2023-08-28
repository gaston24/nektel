<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TareaService;
use App\Services\DistribuidorService;
use App\Tarea;

class TareaController extends Controller
{

    protected $tareaService;
    protected $distribuidorService;

    public function __construct(TareaService $tareaService, DistribuidorService $distribuidorService)
    {
        $this->tareaService = $tareaService;
        $this->distribuidorService = $distribuidorService;

    }

    public function adminIndex()
    {
   
        $distribuidorId = auth()->user()->id;
        $tareas = $this->tareaService->getTareasByDistribuidorId($distribuidorId);

        return view('admin_tareas', compact('tareas'));
    }
       
    public function create()
    {
        $distribuidores = $this->distribuidorService->getAllDistribuidores();
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

 
        $this->tareaService->create($data);

        return redirect()->route('admin.tareas.index')->with('success', 'Tarea creada correctamente.');
    }

    public function edit(Tarea $tarea)
    {
        $distribuidores = $this->distribuidorService->getAllDistribuidores();

        return view('edit_tarea', compact('tarea', 'distribuidores'));
    }

    public function update(Request $request, $id)
    {
        $tarea = $this->tareaService->findById($id);

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
  
        $this->tareaService->update($tarea, $data);

        return redirect()->route('admin.tareas.index')->with('success', 'Tarea actualizada correctamente.');
    }

    public function destroy($id)
    {

        $this->tareaService->delete($id);

        return redirect()->route('admin.tareas.index')
            ->with('success', 'Tarea eliminadda exitosamente');
    }

    
}
