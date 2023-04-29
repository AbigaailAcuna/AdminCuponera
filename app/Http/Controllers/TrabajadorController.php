<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

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
        //
        return view('Trabajador.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'IdEmpleado'=>['required'],
            'IdEmpresaR'=>['required'],
           'Nombres'=>['required'],
           'Apellidos'=>['required'],
           'Rubro'=>['required'],
           'Telefono'=>['required','numeric','digits:8'],
           'Correo'=>['required','email', 'ends_with:.com,.net,.org,.edu,.gov,.mil,.sv'],
           'Rol'=>['required']
        ]);
        $empleados=new Empleado();
        $empleados->IdEmpleado=$request->input('IdEmpleado');
        $empleados->IdEmpresaR=$request->input('IdEmpresaR');
        $empleados->Nombres=$request->input('Nombres');
        $empleados->Apellidos=$request->input('Apellidos');
        $empleados->Rubro=$request->input('Rubro');
        $empleados->Telefono=$request->input('Telefono');
        $empleados->Correo=$request->input('Correo');
        $empleados->Rol=$request->input('Rol');
        $empleados->Clave=$request->input('Clave');
        
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
        //
        return view('Trabajador.edit',compact('trabajador'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $trabajador)
    {
        $request->validate([
            'IdEmpleado'=>['required'],
            'IdEmpresaR'=>['required'],
           'Nombres'=>['required'],
           'Apellidos'=>['required'],
           'Rubro'=>['required'],
           'Telefono'=>['required','numeric','digits:8'],
           'Correo'=>['required','email', 'ends_with:.com,.net,.org,.edu,.gov,.mil,.sv'],
           'Rol'=>['required']
        ]);
       
        $trabajador->IdEmpresaR=$request->input('IdEmpresaR');
        $trabajador->Nombres=$request->input('Nombres');
        $trabajador->Apellidos=$request->input('Apellidos');
        $trabajador->Rubro=$request->input('Rubro');
        $trabajador->Telefono=$request->input('Telefono');
        $trabajador->Correo=$request->input('Correo');
        $trabajador->Rol=$request->input('Rol');
        $trabajador->Clave=$request->input('Clave');
        
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
