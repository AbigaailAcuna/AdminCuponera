@extends('Layouts.template')

@section('title','Lista de Empresas')


@section('content')
<head>
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
</head>
@section('title2','Lista de Empresas')

<div class="container">
        <a class="btn btn-primary" href="{{ route('empresa.create')}}"><i class="bi bi-plus-circle"></i> Agregar Nueva Empresa</a>
        <a class="btn btn-primary" href="/index"><i class=""></i> Regresar</a>
        <div class="row">
    @if ($empresa)
    <table class="table table-bordered">
        <tr>
            <th>Codigo</th>
            <th>Rubro</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Nombre de Contacto</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Comisión</th>
            <th>Operaciones</th>
            
                
        </tr>
        @foreach ($empresa as $empre)
        <tr>
            <td>{{$empre->IdEmpresaR}}</td>
            <td>{{$empre->IdCategeoria}}</td>
            <td>{{$empre->NombreEmpresa}}</td>
            <td>{{$empre->Direccion}}</td>
            <td>{{$empre->NombreContacto}}</td>
            <td>{{$empre->Telefono}}</td>
            <td>{{$empre->Correo}}</td>
            <td>{{$empre->Comision}}</td>
            <td><a class="btn btn-success" href="{{ route('empresa.edit', $empre->IdEmpresaR) }}"><i class="bi bi-pencil-square"></i></a>
            <a class="btn btn-primary" href="{{ route('empresa.show', $empre->IdEmpresaR) }}"><i class="bi bi-eye-fill"></i></a>
            <a class="btn btn-danger" href="{{ route('empresa.destroy', $empre->IdEmpresaR) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $empre->IdEmpresaR }}').submit();">
    <i class="bi bi-trash"></i>
</a>
<form id="delete-form-{{ $empre->IdEmpresaR }}" action="{{ route('empresa.destroy', $empre->IdEmpresaR) }}" method="POST" style="display: none;">
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