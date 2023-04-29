<?php

namespace App\Http\Controllers;


use App\Models\Categorium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoria=Categorium::get();
        return view('Categoria.index',compact('categoria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'IdCategoria'=>['required'],
            'NombreCategoria'=>['required'],
        ]);
        $categoria=new Categorium();
        $categoria->IdCategoria=$request->input('IdCategoria');
        $categoria->NombreCategoria=$request->input('NombreCategoria');

        $categoria->save();
        if($categoria==true)
            {
                $alerta = [
                    'title' => 'Rubro guardado con éxito',
                    'icon' => 'success'
                ];
                return to_route('categoria.index')->with('alerta', $alerta);  
                
            }else{
                $alerta = [
                    'title' => 'Rubro no guardado',
                    'icon' => 'error'
                ];
                return redirect()->back()->with('alerta', $alerta);
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorium $categorium)
    {
        return view('Categoria.categoria',compact('categorium'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorium $categorium)
    {
        return view('Categoria.edit',compact('categorium'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorium $categorium)
    {
        $request->validate([
            'IdCategoria'=>['required'],
            'NombreCategoria'=>['required'],
        ]);
        $categorium->IdCategoria=$request->input('IdCategoria');
        $categorium->NombreCategoria=$request->input('NombreCategoria');

        $categorium->save();
        if($categorium==true)
            {
                $alerta = [
                    'title' => 'Rubro editado con éxito',
                    'icon' => 'success'
                ];
                return to_route('categoria.index')->with('alerta', $alerta);  
                
            }else{
                $alerta = [
                    'title' => 'Rubro no editado',
                    'icon' => 'error'
                ];
                return redirect()->back()->with('alerta', $alerta);
            }

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoria = Categorium::findOrFail($id);
        $categoria->delete();
        if($categoria==true)
            {
                $alerta = [
                    'title' => 'Rubro eliminado con éxito',
                    'icon' => 'success'
                ];
                return to_route('categoria.index')->with('alerta', $alerta);  
                
            }else{
                $alerta = [
                    'title' => 'Rubro no eliminado',
                    'icon' => 'error'
                ];
                return redirect()->back()->with('alerta', $alerta);
            }

    }
}
