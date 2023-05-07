@section('title','Empresas')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<link href="{{ asset('css/admincss.css') }}" rel="stylesheet">
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>


<h1 class="text-center">Ofertas Canjeadas</h1>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Ofertas Canjeadas
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
               @foreach($canjeadoOffer as $canjeado)
                    <tr>
                        <td>{{ $canjeado->IdCuponR }}</td>
                        <td>{{ $canjeado->Titulo }}</td>
                        <td>{{ $canjeado->PrecioRegular }}</td>
                        <td>{{ $canjeado->PrecioOferta }}</td>
                        <td>{{ $canjeado->FechaLimiteUso }}</td>
                        <td>{{ $canjeado->Descripcion }}</td>
                        <td>{{ ($canjeado->CantidadVendido) }}</td>
                        <td>{{ ($canjeado->Disponibilidad) }}</td>
                        <td>${{($canjeado->CantidadVendido)*($canjeado->PrecioRegular)}}</td>
                        <td>${{($canjeado->CantidadVendido)*($canjeado->PrecioRegular)*($canjeado->Comision)}}</td>
                          
                     </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
<a href=href="{{ route('empresa.show', $canjeado->IdEmpresaR) }}" class="btn btn-primary">Regresar</a>