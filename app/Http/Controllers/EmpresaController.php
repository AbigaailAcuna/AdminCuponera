<?php

namespace App\Http\Controllers;

use App\Models\Cuponr;
use App\Models\Empresar;
use App\Models\Categorium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresa=Empresar::get();
        return view('Empresa.index',compact('empresa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoria=Categorium::all();
        return view('Empresa.create',compact('categoria'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'IdEmpresaR'=>['required','regex:/^EMP\d{3}$/'],
            'IdCategeoria'=>['required'],
           'NombreEmpresa'=>['required'],
           'Direccion'=>['required'],
           'NombreContacto'=>['required','regex:/^[a-zA-Z ]+$/'],
           'Telefono'=>['required','numeric','digits:8'],
           'Correo'=>['required','email', 'ends_with:.com,.net,.org,.edu,.gov,.mil,.sv'],
           'Comision'=>['required','numeric']
        ]);
        $empresa=new Empresar();
        $empresa->IdEmpresaR=$request->input('IdEmpresaR');
        $empresa->IdCategeoria=$request->input('IdCategeoria');
        $empresa->NombreEmpresa=$request->input('NombreEmpresa');
        $empresa->Direccion=$request->input('Direccion');
        $empresa->NombreContacto=$request->input('NombreContacto');
        $empresa->Telefono=$request->input('Telefono');
        $empresa->Correo=$request->input('Correo');
        $empresa->Comision=$request->input('Comision');
        $empresa->save();
        if($empresa==true)
            {
                $alerta = [
                    'title' => 'Empresa guardada con éxito',
                    'icon' => 'success'
                ];
                return to_route('empresa.index')->with('alerta', $alerta);  
                
            }else{
                $alerta = [
                    'title' => 'Empresa no guardada',
                    'icon' => 'error'
                ];
                return redirect()->back()->with('alerta', $alerta);
            }

    }

    /**
     * Display the specified resource.
     */
    public function show(Empresar $empresa)
    {
        return view('Empresa.empresa',compact('empresa'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $empresa = Empresar::findOrFail($id);
        $empresa->delete();
        if($empresa==true)
            {
                $alerta = [
                    'title' => 'Empresa eliminada con éxito',
                    'icon' => 'success'
                ];
                return to_route('empresa.index')->with('alerta', $alerta);  
                
            }else{
                $alerta = [
                    'title' => 'Empresa no eliminada',
                    'icon' => 'error'
                ];
                return redirect()->back()->with('alerta', $alerta);
            }

    }
    
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresar $empresa,Categorium $categoria)
    {
        $categoria=Categorium::all();
        $categoriaSeleccionada = Categorium::findOrFail($empresa->IdCategeoria);
        return view('Empresa.edit',compact('empresa','categoria','categoriaSeleccionada'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empresar $empresa)
    {
        $request->validate([
            'IdCategeoria'=>['required'],
           'NombreEmpresa'=>['required'],
           'Direccion'=>['required'],
           'NombreContacto'=>['required','regex:/^[a-zA-Z ]+$/'],
           'Telefono'=>['required','numeric','digits:8'],
           'Correo'=>['required','email', 'ends_with:.com,.net,.org,.edu,.gov,.mil,.sv'],
           'Comision'=>['required','numeric']
        ]);

       $empresa->IdCategeoria=$request->input('IdCategeoria');
        $empresa->NombreEmpresa=$request->input('NombreEmpresa');
        $empresa->Direccion=$request->input('Direccion');
        $empresa->NombreContacto=$request->input('NombreContacto');
        $empresa->Telefono=$request->input('Telefono');
        $empresa->Correo=$request->input('Correo');
        $empresa->Comision=$request->input('Comision');
        $empresa->save();
        if($empresa==true)
            {
                $alerta = [
                    'title' => 'Empresa editada con éxito',
                    'icon' => 'success'
                ];
                return to_route('empresa.index')->with('alerta', $alerta);  
                
            }else{
                $alerta = [
                    'title' => 'Empresa no editada',
                    'icon' => 'error'
                ];
                return redirect()->back()->with('alerta', $alerta);
            }

        
    }


    public function active(string $id)
    {
        $activeOffer = Cuponr::with('empresar')
            ->join('empresar', 'cuponr.IdEmpresaR', '=', 'empresar.IdEmpresaR')
            ->where('Estado', 1)
            ->where('empresar.IdEmpresaR', $id)
            ->get();
    
        if ($activeOffer->isEmpty()) {
            $alerta = [
                'title' => 'No hay cupones de esta categoria',
                'icon' => 'error'
            ];
            return to_route('empresa.show', $id)->with('alerta', $alerta);  
        } else {
            return view('Empresa.activas', compact('activeOffer'));
        }
    }
    
    public function canjeado(string $id){
        $canjeadoOffer = Cuponr::with('empresar')
               ->join('empresar', 'cuponr.IdEmpresaR', '=', 'empresar.IdEmpresaR')
               ->where('Estado', 2)
               ->where('empresar.IdEmpresaR', $id)
               ->get();
               if ($canjeadoOffer->isEmpty()) {
                $alerta = [
                    'title' => 'No hay cupones de esta categoria',
                    'icon' => 'error'
                ];
                return to_route('empresa.show', $id)->with('alerta', $alerta);  
            } else {
                return view('Empresa.canjeados', compact('canjeadoOffer'));
            }     
}
public function vencido(string $id){
    $vencidoOffer = Cuponr::with('empresar')
           ->join('empresar', 'cuponr.IdEmpresaR', '=', 'empresar.IdEmpresaR')
           ->where('Estado', 3)
           ->where('empresar.IdEmpresaR', $id)
           ->get();
           if ($vencidoOffer->isEmpty()) {
            $alerta = [
                'title' => 'No hay cupones de esta categoria',
                'icon' => 'error'
            ];
            return to_route('empresa.show', $id)->with('alerta', $alerta);  
        } else {
            return view('Empresa.vencidos', compact('vencidoOffer'));
        }
}
public function espera(string $id){
    $esperaOffer = Cuponr::with('empresar')
           ->join('empresar', 'cuponr.IdEmpresaR', '=', 'empresar.IdEmpresaR')
           ->where('Estado', 4)
           ->where('empresar.IdEmpresaR', $id)
           ->get();
           if ($esperaOffer->isEmpty()) {
            $alerta = [
                'title' => 'No hay cupones de esta categoria',
                'icon' => 'error'
            ];
            return to_route('empresa.show', $id)->with('alerta', $alerta);  
        } else {
            return view('Empresa.esperas', compact('esperaOffer'));
        }  
}
public function descartado(string $id){
    $descartadoOffer = Cuponr::with('empresar')
           ->join('empresar', 'cuponr.IdEmpresaR', '=', 'empresar.IdEmpresaR')
           ->where('Estado', 5)
           ->where('empresar.IdEmpresaR', $id)
           ->get();
           if ($descartadoOffer->isEmpty()) {
            $alerta = [
                'title' => 'No hay cupones de esta categoria',
                'icon' => 'error'
            ];
            return to_route('empresa.show', $id)->with('alerta', $alerta);  
        } else {
            return view('Empresa.descartados', compact('descartadoOffer'));
        }     
}
public function rechazado(string $id){
    $rechazadoOffer = Cuponr::with('empresar')
           ->join('empresar', 'cuponr.IdEmpresaR', '=', 'empresar.IdEmpresaR')
           ->where('Estado', 6)
           ->where('empresar.IdEmpresaR', $id)
           ->get();
           if ($rechazadoOffer->isEmpty()) {
            $alerta = [
                'title' => 'No hay cupones de esta categoria',
                'icon' => 'error'
            ];
            return to_route('empresa.show', $id)->with('alerta', $alerta);  
        } else {
            return view('Empresa.rechazados', compact('rechazadoOffer'));
        }    
}
}
