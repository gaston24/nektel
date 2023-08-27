<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Distribuidor; // Asegúrate de importar el modelo Distribuidor
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class DistribuidorLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';


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

        if (! Auth::attempt($credentials)) {
            return response()->json(['error' => 'Credenciales inválidas'], 401);
        }

        $distribuidor = Auth::user(); // Obtén el distribuidor autenticado

        try {
            $token = JWTAuth::fromUser($distribuidor); // Genera el token JWT
        } catch (JWTException $e) {
            return response()->json(['error' => 'No se pudo crear el token'], 500);
        }

        return response()->json([
            'token' => $token,
        ]);
    }


    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Cierre de sesión exitoso']);
    }

}
