<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Cuponv;
use App\Models\Ventum;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cliente=Cliente::get();
        return view('Cliente.index',compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     */
    /*public function create()
    {
        return view('Cliente.create');
    }*/

    /**
     * Store a newly created resource in storage.
     */
 /*   public function store(Request $request)
    {
        $request->validate([
            'IdCliente'=>['required'],
            'Nombres'=>['required'],
            'Apellidos'=>['required'],
            'DUI'=>['required'],
            'Telefono'=>['required'],
            'Correo'=>['required'],
            'Direccion'=>['required'],
        ]);
        $cliente=new Cliente();
        $cliente->IdCliente=$request->input('IdCliente');
        $cliente->Nombres=$request->input('Nombres');


        $cliente->save();
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
    }*/

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view('Cliente.cliente',compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    /*public function edit(string $id)
    {
        //
    }*/

    /**
     * Update the specified resource in storage.
     */
   /* public function update(Request $request, string $id)
    {
        //
    }*/

    /**
     * Remove the specified resource from storage.
     */
    /*public function destroy(string $id)
    {
        //
    }*/
    
    public function active(string $id){
        $activoOffer = Ventum::with('cuponv')
            ->join('cuponv', 'cuponv.IdVenta', '=', 'venta.IdVenta')
            ->join('cuponr', 'cuponr.IdCuponR', '=', 'cuponv.IdCupon')
            ->where('cuponv.Estado', 1)
            ->where('venta.IdCliente', $id)
            ->get();
               if ($activoOffer->isEmpty()) {
                $alerta = [
                    'title' => 'No hay cupones de esta categoria',
                    'icon' => 'error'
                ];
                return to_route('cliente.show', $id)->with('alerta', $alerta);  
            } else {
            return view('Cliente.disponibles', compact('activoOffer'));
            }

    }
    public function canjeado(string $id){
        $canjeadoOffer = Ventum::with('cuponv')
            ->join('cuponv', 'cuponv.IdVenta', '=', 'venta.IdVenta')
            ->join('cuponr', 'cuponr.IdCuponR', '=', 'cuponv.IdCupon')
            ->where('cuponv.Estado', 2)
            ->where('venta.IdCliente', $id)
            ->get();
               if ($canjeadoOffer->isEmpty()) {
                $alerta = [
                    'title' => 'No hay cupones de esta categoria',
                    'icon' => 'error'
                ];
                return to_route('cliente.show', $id)->with('alerta', $alerta);  
            } else {
            return view('Cliente.canjeados', compact('canjeadoOffer'));
            }

    }
    public function vencido(string $id){
        $date=date('Y-m-d');
        $vencidoOffer = Ventum::with('cuponv')
            ->join('cuponv', 'cuponv.IdVenta', '=', 'venta.IdVenta')
            ->join('cuponr', 'cuponr.IdCuponR', '=', 'cuponv.IdCupon')
            ->where('cuponr.FechaFin', '<', $date)
            ->where('venta.IdCliente', $id)
            ->get();
               if ($vencidoOffer->isEmpty()) {
                $alerta = [
                    'title' => 'No hay cupones de esta categoria',
                    'icon' => 'error'
                ];
                return to_route('cliente.show', $id)->with('alerta', $alerta);  
            } else {
            return view('Cliente.vencidos', compact('vencidoOffer'));
            }

    }
}
