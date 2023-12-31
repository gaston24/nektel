<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DistribuidorService;
use App\Distribuidor;


class DistribuidorController extends Controller
{
    protected $distribuidorService;

    public function __construct(DistribuidorService $distribuidorService)
    {
        $this->distribuidorService = $distribuidorService;
    }

    public function adminIndex(Request $request)
    {
        $distribuidores = $this->distribuidorService->getAllDistribuidores();

        if ($request->wantsJson()) {
            return response()->json(['data' => $distribuidores]);
        }

        return view('admin_distribuidores', compact('distribuidores'));
    }

    public function create()
    {
        return view('create_distribuidor');
    }
    
    public function store(Request $request)
    {
   
        $data = $request->validate([
            'login' => 'required',
            'email' => 'required|email',
            'password' => 'required',

        ]);

        $data['password'] = bcrypt($data['password']);

        $this->distribuidorService->createDistribuidor($data);

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Distribuidor creado correctamente.']);
        }
    
        return redirect()->route('admin.distribuidores.index')->with('success', 'Distribuidor creado correctamente.');
    } 
    

    public function edit(Distribuidor $distribuidor)
    {
        return view('edit_distribuidor', compact('distribuidor'));
    }

    public function update(Request $request, Distribuidor $distribuidor)
    {
    
        $request->validate([
            'login' => 'required',
            'email' => 'required|email',
        ]);
        
      
        if ($request->filled('nueva_contraseña')) {
          
            $request->validate([
                'contraseña_actual' => 'required',
                'nueva_contraseña' => 'required|string|min:8|confirmed',
            ]);

            if (!password_verify($request->contraseña_actual, $distribuidor->password)) {

                if ($request->wantsJson()) {
                    return response()->json(['message' => 'Contraseña actual incorrecta.']);
                }

                return redirect()->back()->withInput()->withErrors(['contraseña_actual' => 'Contraseña actual incorrecta.']);

            }


        }

        $this->distribuidorService->updateDistribuidor($distribuidor, $request->all());
        
        if ($request->wantsJson()) {
            return response()->json(['message' => 'Distribuidor modificado correctamente.']);
        }
        
        return redirect()->route('admin.distribuidores.index')->with('success', 'Distribuidor actualizado correctamente.');
    }
    

    public function destroy(Request $request, $id)
    {
        $this->distribuidorService->deleteDistribuidor($id);

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Distribuidor eliminado correctamente.']);
        }
    
        return redirect()->route('admin.distribuidores.index')
            ->with('success', 'Distribuidor y tareas relacionadas eliminados exitosamente');
    }

    
}
