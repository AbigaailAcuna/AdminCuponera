@extends('Layouts.template')

@section('title','Lista de Empleados')


@section('content')
<head>
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
</head>


<div class="container">
    <h1 class='text-center'>Lista de trabajadores</h1>
        <br>
        <a class="btn btn-primary" href="{{ route('trabajador.create')}}"><i class="bi bi-plus-circle"></i> Registrar Empleado</a>
        <a class="btn btn-primary" href="/index"><i class=""></i> Regresar</a>
        <div class="row">
    @if ($empleados)
    <table class="table table-bordered">
        <tr>
            <th>Código Empleado</th>
            <th>Código Empresa</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Rubro</th>
            <th>Opciones</th>
            
            
                
        </tr>
        @foreach ($empleados as $Empleado)
        <tr>
            <td>{{$Empleado->IdEmpleado}}</td>
            <td>{{$Empleado->IdEmpresaR}}</td>
            <td>{{$Empleado->Nombres}}</td>
            <td>{{$Empleado->Apellidos}}</td>
            <td>{{$Empleado->Telefono}}</td>
            <td>{{$Empleado->Email}}</td>
            <td>{{$Empleado->Rol}}</td>
            <td>{{$Empleado->Rubro}}</td>
            <td><a class="btn btn-success" href="{{ route('trabajador.edit', $Empleado->IdEmpleado) }}"><i class="bi bi-pencil-square"></i></a>
            <a class="btn btn-primary" href="{{ route('trabajador.show', $Empleado->IdEmpleado) }}"><i class="bi bi-eye-fill"></i></a>
            <a class="btn btn-danger" href="{{ route('trabajador.destroy', $Empleado->IdEmpleado) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $Empleado->IdEmpleado }}').submit();">
    <i class="bi bi-trash"></i>
</a>
<form id="delete-form-{{ $Empleado->IdEmpleado }}" action="{{ route('trabajador.destroy', $Empleado->IdEmpleado) }}" method="POST" style="display: none;">
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
