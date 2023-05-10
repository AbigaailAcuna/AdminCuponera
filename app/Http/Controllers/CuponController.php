<?php

namespace App\Http\Controllers;

use App\Models\Cuponr;
use App\Models\Empresar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CuponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cupon=Cuponr::get();
        return view('Cupon.index',compact('cupon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresas=Empresar::get();
        return view('Cupon.create',compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'IdCuponR'=>['required','regex:/^CUP\d{4}$/'],
            'IdEmpresaR'=>['required'],
            'Titulo'=>['required','regex:/^[a-zA-Z ]+$/'],
           'PrecioRegular'=>['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/', 'min:1.00'],
           'PrecioOferta'=>['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/', 'min:1.00'],
           'PrecioCupon'=>['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/', 'min:1.00'],
            'FechaInicio'=>['required', 'date_format:Y-m-d', 'after_or_equal:today'],
            'FechaFin'=>['required','date_format:Y-m-d', 'after_or_equal:FechaInicio'],
           'FechaLimiteUso'=>['required','date_format:Y-m-d', 'after_or_equal:FechaFin'],
           'Descripcion'=>['required'],
           'OtrosDetalles'=>['required'],
           'Disponibilidad'=>['required','numeric','gt:0'],
           'imagen'=>['required','ends_with:.png,.jpg'],
           'CantidadVendido'=>['required'],
           'Estado' => ['required', 'numeric', 'between:1,5']


        ]);
        $cupon=new Cuponr();
        $cupon->IdCuponR=$request->input('IdCuponR');
        $cupon->IdEmpresaR=$request->input('IdEmpresaR');
        $cupon->Titulo=$request->input('Titulo');
        $cupon->PrecioRegular=$request->input('PrecioRegular');
        $cupon->PrecioOferta=$request->input('PrecioOferta');
        $cupon->PrecioCupon=$request->input('PrecioCupon');
        $cupon->FechaInicio=$request->input('FechaInicio');
        $cupon->FechaFin=$request->input('FechaFin');
        $cupon->FechaLimiteUso=$request->input('FechaLimiteUso');
        $cupon->Descripcion=$request->input('Descripcion');
        $cupon->OtrosDetalles=$request->input('OtrosDetalles');
        $cupon->Disponibilidad=$request->input('Disponibilidad');
        $cupon->imagen=$request->input('imagen');
        $cupon->CantidadVendido=$request->input('CantidadVendido');
        $cupon->Estado=$request->input('Estado');

        $cupon->save();
        if($cupon==true)
            {
                $alerta = [
                    'title' => 'Cupon guardado con éxito',
                    'icon' => 'success'
                ];
                return to_route('cupon.index')->with('alerta', $alerta);  
                
            }else{
                $alerta = [
                    'title' => 'Cupon no guardado',
                    'icon' => 'error'
                ];
                return redirect()->back()->with('alerta', $alerta);
            }

    }

    /**
     * Display the specified resource.
     */
    public function show(Cuponr $cupon)
    {
        return view('Cupon.cupon',compact('cupon'));
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cuponr $cupon)
    {
        return view('Cupon.edit',compact('cupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cuponr $cupon)
    {
        $request->validate([

            'Titulo'=>['required','regex:/^[a-zA-Z ]+$/'],
           'PrecioRegular'=>['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/', 'min:1.00'],
           'PrecioOferta'=>['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/', 'min:1.00'],
           'PrecioCupon'=>['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/', 'min:1.00'],
           'FechaInicio'=>['required', 'date_format:Y-m-d', 'after_or_equal:today'],
           'FechaFin'=>['required','date_format:Y-m-d', 'after_or_equal:FechaInicio'],
          'FechaLimiteUso'=>['required','date_format:Y-m-d', 'after_or_equal:FechaFin'],
           'Descripcion'=>['required'],
           'OtrosDetalles'=>['required'],
           'Disponibilidad'=>['required'],
           'imagen'=>['ends_with:.png,.jpg'],
           'CantidadVendido' => ['required', 'numeric', 'min:0'],
           'Estado' => ['required', 'numeric', 'between:1,5']

        ]);


        $cupon->Titulo=$request->input('Titulo');
        $cupon->PrecioRegular=$request->input('PrecioRegular');
        $cupon->PrecioOferta=$request->input('PrecioOferta');
        $cupon->PrecioCupon=$request->input('PrecioCupon');
        $cupon->FechaInicio=$request->input('FechaInicio');
        $cupon->FechaFin=$request->input('FechaFin');
        $cupon->FechaLimiteUso=$request->input('FechaLimiteUso');
        $cupon->Descripcion=$request->input('Descripcion');
        $cupon->OtrosDetalles=$request->input('OtrosDetalles');
        $cupon->Disponibilidad=$request->input('Disponibilidad');
        $cupon->imagen=$request->input('imagen');
        $cupon->CantidadVendido=$request->input('CantidadVendido');
        $cupon->Estado=$request->input('Estado');

        $cupon->save();
        if($cupon==true)
            {
                $alerta = [
                    'title' => 'Cupon editado con éxito',
                    'icon' => 'success'
                ];
                return to_route('cupon.index')->with('alerta', $alerta);  
                
            }else{
                $alerta = [
                    'title' => 'Cupon no editado',
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
        $cupon = CuponR::findOrFail($id);
        $cupon->delete();
        if($cupon==true)
            {
                $alerta = [
                    'title' => 'Cupon eliminado con éxito',
                    'icon' => 'success'
                ];
                return to_route('cupon.index')->with('alerta', $alerta);  
                
            }else{
                $alerta = [
                    'title' => 'Cupon no eliminado',
                    'icon' => 'error'
                ];
                return redirect()->back()->with('alerta', $alerta);
            }

    }
    

}
