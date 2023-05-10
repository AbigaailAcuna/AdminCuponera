<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Ventum;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Ventas=Ventum::get();
        return view('Venta.index',compact('Ventas'));
    }
    public function show(Ventum $ventum)
    {
        return view('Venta.pdf',compact('ventum'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function pdf($id)
    {
        // Retrieve the sales data for the specified ID
        
        $ventas = Ventum::select('venta.*', 'cliente.*', 'cuponr.*')
    ->join('cliente', 'cliente.IdCliente', '=', 'venta.IdCliente')
    ->join('cuponr', 'cuponr.IdCuponR', '=', 'venta.IdCuponR')
    ->where('venta.IdVenta', $id)
    ->first();


        // Generate the PDF using dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('Venta.pdf', compact('ventas')));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
    
        // Return the PDF as a response
        $pdfContent = $dompdf->output();
        return response($pdfContent)
                    ->header('Content-Type', 'application/pdf')
                    ->header('Content-Disposition', 'inline; filename="Venta.pdf"');
    }
    
}
