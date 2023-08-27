<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Distribuidor; // Agrega esta línea para importar la clase Distribuidor

class DistribuidorController extends Controller
{
    public function adminIndex()
    {
        $distribuidores = Distribuidor::all(); // Utiliza el espacio de nombres completo
        return view('admin_distribuidores', compact('distribuidores'));
    }

    public function create()
    {
        return view('create_distribuidor');
    }
    
    public function store(Request $request)
    {
        // Validación de datos
        $data = $request->validate([
            'login' => 'required',
            'email' => 'required|email',
            'password' => 'required',

        ]);

        $data['password'] = bcrypt($data['password']);
        
        // Crear el distribuidor
        Distribuidor::create($data);
    
        return redirect()->route('admin.distribuidores.index')->with('success', 'Distribuidor creado correctamente.');
    } 
    

    public function edit(Distribuidor $distribuidor)
    {
        return view('edit_distribuidor', compact('distribuidor'));
    }

    public function update(Request $request, Distribuidor $distribuidor)
    {
        // Validación de los campos de nombre y email
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
            
            
            $distribuidor->update([
                'login' => $request->login,
                'email' => $request->email,
                'password' => bcrypt($request->new_password),
            ]);

        }
    
        return redirect()->route('admin.distribuidores.index')->with('success', 'Distribuidor actualizado correctamente.');
    }
    

    public function destroy($id)
    {
        $distribuidor = Distribuidor::findOrFail($id);

        // Eliminar tareas relacionadas con el distribuidor
        $distribuidor->tareas()->delete();

        // Eliminar el distribuidor
        $distribuidor->delete();

        return redirect()->route('admin.distribuidores.index')
            ->with('success', 'Distribuidor y tareas relacionadas eliminados exitosamente');
    }

    
}
