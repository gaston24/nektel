<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // Asegúrate de importar Request también
use Illuminate\Support\Facades\Auth; // Agrega esta importación


class DistribuidorLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard'; // Cambia a la ruta que desees después del login

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login'); // Crea la vista "auth/login.blade.php"
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('web')->attempt($credentials)) {
            // El usuario ha sido autenticado correctamente
            return redirect()->intended('/home'); // Cambia '/dashboard' por la ruta a la que deseas redireccionar al usuario autenticado
        }
    
        // Si las credenciales no son válidas, muestra un mensaje de error y redirige de vuelta al formulario de inicio de sesión
        return back()->withErrors([
            'email' => 'Credenciales incorrectas',
        ]);
    }
}
