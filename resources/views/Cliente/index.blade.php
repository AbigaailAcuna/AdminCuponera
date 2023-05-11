@extends('Layouts.template')

@section('title','Lista de Clientes')


@section('content')
<head>
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
</head>
<br>
<br>
@if(session('user'))
<div class="container">
    <h1 class='text-center'>Lista de clientes</h1>
        <br>
        <a class="btn btn-primary" href="/index"><i class=""></i> Regresar</a>
        <div class="row">
    @if ($cliente)
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Codigo de cliente</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>DUI</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Direccion</th>
            <th>Estado</th>
            <th>Detalles</th>
                
        </tr>
        @foreach ($cliente as $cli)
        <tr>
            <td>{{$cli->IdCliente}}</td>
            <td>{{$cli->Nombres}}</td>
            <td>{{$cli->Apellidos}}</td>
            <td>{{$cli->Dui}}</td>
            <td>{{$cli->Telefono}}</td>
            <td>{{$cli->Correo}}</td>
            <td>{{$cli->Direccion}}</td>
            <td>{{$cli->Estado}}</td>
            <td><a class="btn btn-primary" href="{{ route('cliente.show', $cli->IdCliente) }}"><i class="bi bi-eye-fill"></i></a></td>

        </tr>
        @endforeach
        
    </table>

    @endif 
    
        </div>
</div>
@else
<h3>Inicia sesión para ver el contenido</h3>
<p>La página de Administración de la cuponera no puede mostrarte nada porque no has iniciado sesión.</p>
@endif
@endsection