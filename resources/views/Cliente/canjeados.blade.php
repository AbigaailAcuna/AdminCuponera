@section('title','Clientes')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<link href="{{ asset('css/admincss.css') }}" rel="stylesheet">
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

<head>
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
</head>
<h1 class="text-center">Cupones Canjeados</h1>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Cupones Canjeados
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Código de Cupón</th>
                    <th>Titulo</th>
                    <th>Precio Cupon</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Fecha Limite de uso</th>
                    <th>Descripción </th>
                    <th>Fecha Compra</th>
                    
                </tr>
            </thead>
            <tbody>
               @foreach($canjeadoOffer as $canjeado)
                    <tr>
                        <td>{{ $canjeado->IdCuponR }}</td>
                        <td>{{ $canjeado->Titulo }}</td>
                        <td>{{ $canjeado->PrecioCupon }}</td>
                        <td>{{ $canjeado->FechaInicio }}</td>
                        <td>{{ $canjeado->FechaFin }}</td>
                        <td>{{ $canjeado->FechaLimiteUso }}</td>
                        <td>{{ $canjeado->Descripcion }}</td>
                        <td>{{ $canjeado->FechaCompra }}</td>
                          
                     </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
<a href="{{ route('cliente.show', $canjeado->IdCliente) }}" class="btn btn-primary">Regresar</a>