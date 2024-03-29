<?php

namespace App\Http\Controllers;

use App\Mail\CorreoEnv;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

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
            
            if($user->Password ==hash('SHA256',$clave)){
                $request->session()->put('user', $user);
                if($user->Password_c == 1){

                    return redirect('/index');
                }
                else {
                    return view('password');
                }
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

    public function changepass (Request $request){
        
        $user = $request->session()->get('user');
    
        if ($request->isMethod('post')) {

            if($user->Password_c == 1){
                $nuevaContrasena = $request->input('nueva_contrasena');
    
                $user->Password = hash('SHA256', $nuevaContrasena);
                $user->save();

                $alerta = [
                    'title' => 'Contraseña actualizada correctamente',
                    'icon' => 'success'
                ];
    

                return redirect('/index')->with('alerta', $alerta);
            }
            else {
                $nuevaContrasena = $request->input('nueva_contrasena');
    
                $user->Password = hash('SHA256', $nuevaContrasena);
                $user->Password_c = 1;
                $user->save();
        
                $alerta = [
                    'title' => 'Contraseña actualizada correctamente',
                    'icon' => 'success'
                ];
    

                return redirect('/index')->with('alerta', $alerta);
            }

        }

    }

    public function sendemail(Request $request){

        $claveGenerada = Str::random(15);
        $clave = hash('sha256', $claveGenerada);
        $correo = $request->input('correo'); 

        $usuario = Usuario::where('Email', $correo)->first();
        if ($usuario) {
            $usuario->Password = $clave;
            $usuario->save();

            $titulo = "Nueva contraseña";
            $msg ="Se ha generado una contraseña para que recupere su contraseña, su nueva contraseña es:";
            
            Mail::to($correo)->send(new CorreoEnv ($claveGenerada, $msg, $titulo));
            
            $alerta = [
                'title' => 'Recibio en su correo su contraseña temporal',
                'icon' => 'info'
            ];


            return redirect('/login')->with('alerta', $alerta);
        } 
        else {
            $alerta = [
                'title' => 'Ingrese una direccion de correo valida',
                'icon' => 'error'
            ];


            return redirect('/Email')->with('alerta', $alerta);

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
