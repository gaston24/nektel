<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // Asegúrate de importar Request también
use Illuminate\Support\Facades\Auth; // Agrega esta importación


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
    
}
