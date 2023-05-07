@section('title','Empresas')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<link href="{{ asset('css/admincss.css') }}" rel="stylesheet">
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>


<h1 class="text-center">Ofertas Descartadas</h1>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Ofertas Descartadas
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
               @foreach($descartadoOffer as $descartado)
                    <tr>
                        <td>{{ $descartado->IdCuponR }}</td>
                        <td>{{ $descartado->Titulo }}</td>
                        <td>{{ $descartado->PrecioRegular }}</td>
                        <td>{{ $descartado->PrecioOferta }}</td>
                        <td>{{ $descartado->FechaLimiteUso }}</td>
                        <td>{{ $descartado->Descripcion }}</td>
                        <td>{{ ($descartado->CantidadVendido) }}</td>
                        <td>{{ ($descartado->Disponibilidad) }}</td>
                        <td>${{($descartado->CantidadVendido)*($descartado->PrecioRegular)}}</td>
                        <td>${{($descartado->CantidadVendido)*($descartado->PrecioRegular)*($descartado->Comision)}}</td>
                          
                     </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
<a href="{{ route('empresa.show', $descartado->IdEmpresaR) }}" class="btn btn-primary">Regresar</a>