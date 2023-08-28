<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth; 
// use Tymon\JWTAuth\Facades\JWTAuth;

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
       
            return redirect()->intended('/home'); 
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas',
        ]);
    }

    public function loginApi(Request $request)
    {
        $credentials = $request->only('login', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);
    }

    
    public function logout(Request $request)
    {
        Auth::guard('web')->logout(); 
        return view('auth/login');
    }
    
}
