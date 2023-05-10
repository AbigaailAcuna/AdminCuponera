@extends('Layouts.template')

@section('title','Historial de Ventas')


@section('content')

<head>
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
</head>
<div class="container">
    <h1 class='text-center'>Lista de ventas</h1>
        <br>
        <a class="btn btn-primary" href="/index"><i class=""></i> Regresar</a>
        <div class="row">
    @if ($Ventas)
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Codigo de Venta</th>
            <th>Código de Cupón Comprado</th>
            <th>Código de Cliente</th>
            <th>Cantidad Comprada</th>
            <th>Fecha de Compra</th>
            <th>Opciones</th>
                
        </tr>
        @foreach ($Ventas as $Venta)
        <tr>
            <td>{{$Venta->IdVenta}}</td>
            <td>{{$Venta->IdCuponR}}</td>
            <td>{{$Venta->IdCliente}}</td>
            <td>{{$Venta->Cantidad}}</td>
            <td>{{$Venta->FechaCompra->format('Y-m-d')}}</td>
            <td><a class="btn btn-success" href="/venta/{{ $Venta->IdVenta }}/pdf" target="_blank"><i class="bi bi-file-earmark-pdf"></i></a>
           
        </tr>
        @endforeach    
    </table>
    @endif 
     </div>
</div>
@endsection
