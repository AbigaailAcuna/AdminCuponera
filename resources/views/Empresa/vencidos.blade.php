@section('title','Empresas')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<link href="{{ asset('css/admincss.css') }}" rel="stylesheet">
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>


<h1 class="text-center">Ofertas Vencidas</h1>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Ofertas Vencidas
    </div>
    <div class="card-body">
        @if($vencidoOffer)
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
               @foreach($vencidoOffer as $vencido)
                    <tr>
                        <td>{{ $vencido->IdCuponR }}</td>
                        <td>{{ $vencido->Titulo }}</td>
                        <td>{{ $vencido->PrecioRegular }}</td>
                        <td>{{ $vencido->PrecioOferta }}</td>
                        <td>{{ $vencido->FechaLimiteUso }}</td>
                        <td>{{ $vencido->Descripcion }}</td>
                        <td>{{ ($vencido->CantidadVendido) }}</td>
                        <td>{{ ($vencido->Disponibilidad) }}</td>
                        <td>${{($vencido->CantidadVendido)*($vencido->PrecioRegular)}}</td>
                        <td>${{($vencido->CantidadVendido)*($vencido->PrecioRegular)*($vencido->Comision)}}</td>
                          
                     </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
<a href="{{ route('empresa.show', $vencido->IdEmpresaR) }}" class="btn btn-primary">Regresar</a>
@else
<h1 class="text-center">No hay ofertas vencidas</h1>
@endif
