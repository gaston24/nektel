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

    public function adminIndex()
    {
        $distribuidores = $this->distribuidorService->getAllDistribuidores();
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
                return redirect()->back()->withInput()->withErrors(['contraseña_actual' => 'Contraseña actual incorrecta.']);
            }

            $this->distribuidorService->updateDistribuidor($distribuidor, $request->all());

        }
    
        return redirect()->route('admin.distribuidores.index')->with('success', 'Distribuidor actualizado correctamente.');
    }
    

    public function destroy($id)
    {
        $this->distribuidorService->deleteDistribuidor($id);
    
        return redirect()->route('admin.distribuidores.index')
            ->with('success', 'Distribuidor y tareas relacionadas eliminados exitosamente');
    }

    
}
