<?php

namespace App\Http\Controllers;

use App\Mail\CorreoEnv;
use App\Models\Empleado;
use App\Models\Empresar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class TrabajadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados=Empleado::get();
        return view('Trabajador.index',compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresas=Empresar::get();
        return view('Trabajador.create',compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'IdEmpleado'=>['required','regex:/^TRA\d{3}$/'],
            'IdEmpresaR'=>['required'],
            'Nombres'=>['required','regex:/^[a-zA-Z ]+$/'],
            'Apellidos'=>['required','regex:/^[a-zA-Z ]+$/'],
            'Telefono'=>['required','numeric','digits:8'],
            'Correo'=>['required','email', 'ends_with:.com,.net,.org,.edu,.gov,.mil,.sv'],
        ]);
        
        $claveGenerada = Str::random(15);
        $clave = hash('sha256', $claveGenerada);
        $correo = $request->input('Correo');
        $rol = 3;
        
        $titulo = "Se ha completado su registro";
        $msg ="Gracias por usar los servicios de la cuponera, tu cuenta ha sido registrada, tu contraseña es:";
        
        $empleados=new Empleado();
        $empleados->IdEmpleado=$request->input('IdEmpleado');
        $empleados->IdEmpresaR=$request->input('IdEmpresaR');
        $empleados->Nombres=$request->input('Nombres');
        $empleados->Apellidos=$request->input('Apellidos');
        $empleados->Telefono=$request->input('Telefono');
        $empleados->Email=$request->input('Correo');
        $empleados->Rol=$rol;
        $empleados->Password=$clave;
        
        $empleados->save();
        if($empleados==true)
            {
                $alerta = [
                    'title' => 'Empleado registrado con éxito',
                    'icon' => 'success'
                ];
                return to_route('trabajador.index')->with('alerta', $alerta);  
                
            }else{
                $alerta = [
                    'title' => 'Empleado no registrado',
                    'icon' => 'error'
                ];
                return redirect()->back()->with('alerta', $alerta);
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $trabajador)
    {
        //
        return view('Trabajador.trabajador',compact('trabajador'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $trabajador)
    {
        $empresas=Empresar::get();
        $EmpresaSeleccionada = Empresar::findOrFail($trabajador->IdEmpresaR);
        return view('Trabajador.edit',compact('trabajador','empresas','EmpresaSeleccionada'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $trabajador)
    {
        $request->validate([
           'Nombres'=>['required','regex:/^[a-zA-Z ]+$/'],
           'Apellidos'=>['required','regex:/^[a-zA-Z ]+$/'],
           'Telefono'=>['required','numeric','digits:8'],
           'Correo'=>['required','email', 'ends_with:.com,.net,.org,.edu,.gov,.mil,.sv'],

        ]);
       

        $trabajador->Nombres=$request->input('Nombres');
        $trabajador->Apellidos=$request->input('Apellidos');
        $trabajador->Telefono=$request->input('Telefono');
        $trabajador->Email=$request->input('Correo');
        
        $trabajador->save();
        if($trabajador==true)
            {
                $alerta = [
                    'title' => 'Empleado editado con éxito',
                    'icon' => 'success'
                ];
                return to_route('trabajador.index')->with('alerta', $alerta);  
                
            }else{
                $alerta = [
                    'title' => 'Empleado no editado',
                    'icon' => 'error'
                ];
                return redirect()->back()->with('alerta', $alerta);
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trabajador = Empleado::findOrFail($id);
        $trabajador->delete();
        if($trabajador==true)
            {
                $alerta = [
                    'title' => 'Empleado eliminado con éxito',
                    'icon' => 'success'
                ];
                return to_route('trabajador.index')->with('alerta', $alerta);  
                
            }else{
                $alerta = [
                    'title' => 'Empleado no eliminado',
                    'icon' => 'error'
                ];
                return redirect()->back()->with('alerta', $alerta);
            }

    }
    
}
