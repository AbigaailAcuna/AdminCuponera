@section('title','Clientes')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<link href="{{ asset('css/admincss.css') }}" rel="stylesheet">
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

<head>
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
</head>
<h1 class="text-center">Cupones Vencidos</h1>
@if(session('user'))
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Cupones Vencidos
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
               @foreach($vencidoOffer as $vencido)
                    <tr>
                        <td>{{ $vencido->IdCuponR }}</td>
                        <td>{{ $vencido->Titulo }}</td>
                        <td>{{ $vencido->PrecioCupon }}</td>
                        <td>{{ $vencido->FechaInicio }}</td>
                        <td>{{ $vencido->FechaFin }}</td>
                        <td>{{ $vencido->FechaLimiteUso }}</td>
                        <td>{{ $vencido->Descripcion }}</td>
                        <td>{{ $vencido->FechaCompra->format('Y-m-d') }}</td>
                          
                     </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
<a href="{{ route('cliente.show', $vencido->IdCliente) }}" class="btn btn-primary">Regresar</a>
@else
<h3>Inicia sesión para ver el contenido</h3>
<p>La página de Administración de la cuponera no puede mostrarte nada porque no has iniciado sesión.</p>
@endif