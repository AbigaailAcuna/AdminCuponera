@section('title','Empresas')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<link href="{{ asset('css/admincss.css') }}" rel="stylesheet">
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

<head>
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
</head>
<h1 class="text-center">Ofertas Activas</h1>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Ofertas Activas
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Código de Cupón</th>
                    <th>Título</th>
                    <th>Precio Regular</th>
                    <th>Precio Oferta</th>
                    <th>Fecha Limite Uso </th>
                    <th>Descripción </th>
                    <th>Cupones Vendidos</th>  
                    <th>Cupones Disponibles</th> 
                    <th>Ingresos Totales</th> 
                    <th>Cargo por Servicio</th>
                    
                </tr>
            </thead>
            <tbody>
               @foreach($activeOffer as $active)
                    <tr>
                        <td>{{ $active->IdCuponR }}</td>
                        <td>{{ $active->Titulo }}</td>
                        <td>{{ $active->PrecioRegular }}</td>
                        <td>{{ $active->PrecioOferta }}</td>
                        <td>{{ $active->FechaLimiteUso }}</td>
                        <td>{{ $active->Descripcion }}</td>
                        <td>{{ ($active->CantidadVendido) }}</td>
                        <td>{{ ($active->Disponibilidad) }}</td>
                        <td>${{($active->CantidadVendido)*($active->PrecioRegular)}}</td>
                        <td>${{($active->CantidadVendido)*($active->PrecioRegular)*($active->Comision)}}</td>
                          
                     </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
<a href="{{ route('empresa.show', $active->IdEmpresaR) }}" class="btn btn-primary">Regresar</a>