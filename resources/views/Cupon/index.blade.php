@extends('Layouts.template')

@section('title','Lista de Cupones')


@section('content')
<head>
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
</head>
@section('title2','Lista de Cupones')
<br>
<div class="container">
        <a class="btn btn-primary" href="{{ route('cupon.create')}}"><i class="bi bi-plus-circle"></i> Ofertar Cupon</a>
        <a class="btn btn-primary" href="/index"><i class=""></i> Regresar</a>
        <div class="row">
    @if ($cupon)
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Codigo</th>
            <th>Empresa Ofertante</th>
            <th>Titulo</th>
            <th>Precio Regular</th>
            <th>Precio Oferta</th>
            <th>Precio Cupon</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th>Fecha Limite Uso</th>
            <th>Descripcion</th>
            <th>otrosDetalles</th>
            <th>Disponibilidad</th>
            <th>Imagen</th>
            <th>Cantidad Vendido</th>
            <th>Estado</th>
            
                
        </tr>
        @foreach ($cupon as $cup)
        <tr>
            <td>{{$cup->IdCuponR}}</td>
            <td>{{$cup->IdEmpresaR}}</td>
            <td>{{$cup->Titulo}}</td>
            <td>{{$cup->PrecioRegular}}</td>
            <td>{{$cup->PrecioOferta}}</td>
            <td>{{$cup->PrecioCupon}}</td>
            <td>{{$cup->FechaInicio}}</td>
            <td>{{$cup->FechaFin}}</td>
            <td>{{$cup->FechaLimiteUso}}</td>
            <td>{{$cup->Descripcion}}</td>
            <td>{{$cup->OtrosDetalles}}</td>
            <td>{{$cup->Disponibilidad}}</td>
            <td><img src="{{ asset('img/' . $cup->imagen) }}" width="100px" /></td>
            <td>{{$cup->CantidadVendido}}</td>
            <td>{{$cup->Estado}}</td>
            <td><a class="btn btn-success" href="/cupon/{{$cup->IdCuponR}}/edit"><i class="bi bi-pencil-square"></i></a>
            <a class="btn btn-primary" href="/cupon/{{$cup->IdCuponR}}"><i class="bi bi-eye-fill"></i></a>
            <a class="btn btn-danger" href="{{ route('cupon.destroy', $cup->IdCuponR) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $cup->IdCuponR }}').submit();">
    <i class="bi bi-trash"></i>
</a>
<form id="delete-form-{{ $cup->IdCuponR }}" action="{{ route('cupon.destroy', $cup->IdCuponR) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

        </tr>
        @endforeach
        
    </table>

    @endif 
    
    @if(session('alerta'))
<script>
    swal({
        title: "{{ session('alerta.title') }}",
        text: "{{ session('alerta.text') }}",
        icon: "{{ session('alerta.icon') }}",
    });
</script>
@endif   
        </div>
</div>
@endsection