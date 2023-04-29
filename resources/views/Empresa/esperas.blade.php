@section('title','Empresas')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<link href="{{ asset('css/admincss.css') }}" rel="stylesheet">
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>


<h1 class="text-center">Ofertas En Espera</h1>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Ofertas en espera
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
               @foreach($esperaOffer as $espera)
                    <tr>
                        <td>{{ $espera->IdCuponR }}</td>
                        <td>{{ $espera->Titulo }}</td>
                        <td>{{ $espera->PrecioRegular }}</td>
                        <td>{{ $espera->PrecioOferta }}</td>
                        <td>{{ $espera->FechaLimiteUso }}</td>
                        <td>{{ $espera->Descripcion }}</td>
                        <td>{{ ($espera->CantidadVendido) }}</td>
                        <td>{{ ($espera->Disponibilidad) }}</td>
                        <td>${{($espera->CantidadVendido)*($espera->PrecioRegular)}}</td>
                        <td>${{($espera->CantidadVendido)*($espera->PrecioRegular)*($espera->Comision)}}</td>
                          
                     </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
<a href="{{ route('empresa.show', $espera->IdEmpresaR) }}" class="btn btn-primary">Regresar</a>