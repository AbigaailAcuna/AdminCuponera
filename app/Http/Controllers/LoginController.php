<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
       return view('login'); 
    }

    public function check(Request $request){
        $correo = $request -> input('correo');
        $clave = $request -> input('clave');
        
        $user = Usuario::where('Email', $correo)->first();
        if ($user){
            
            if(($user->Password ==hash('SHA256',$clave))){
                $request->session()->put('user', $user);
                return redirect('/index');
            } else {

                $alerta = [
                    'title' => 'Usuario y/o contraseña incorrectas',
                    'icon' => 'error'
                ];
    
                return redirect()->back()->with('alerta', $alerta);
            }
        }
        else{
            
            $alerta = [
                'title' => 'Usuario y/o contraseña incorrectas',
                'icon' => 'error'
            ];

            return redirect()->back()->with('alerta', $alerta);
        
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}