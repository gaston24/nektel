<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // Asegúrate de importar Request también
use Illuminate\Support\Facades\Auth; // Agrega esta importación
use Tymon\JWTAuth\Facades\JWTAuth; // Importa la fachada JWTAuth

class DistribuidorLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard'; 

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login'); 
    }

    public function login(Request $request)
    {
       
        $credentials = $request->only('login', 'password');
    
        if (Auth::guard('web')->attempt($credentials)) {
       
            if ($request->wantsJson()) {

                $token = JWTAuth::fromUser(Auth::guard('web')->user());
        
                // Retornar el token en formato JSON
                return response()->json(['token' => $token]);

            }

            return redirect()->intended('/home'); 
        }

        if ($request->wantsJson()) {

            return response()->json(['message' => "Credenciales incorrectas"]);

        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas',
        ]);
    }
    
    public function logout(Request $request)
    {
        Auth::guard('web')->logout(); // Cerrar sesión

        // Redirigir al usuario a la página de inicio de sesión
        return redirect()->route('login');
    }
    
}
