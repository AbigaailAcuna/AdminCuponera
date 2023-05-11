@extends('Layouts.template')

@section('title','Lista de Rubros')


@section('content')
<head>
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
</head>
<br>
@if(session('user'))
@if(session('user')->Rol == 1)
<div class="container">
        <h1 class='text-center'>Lista de rubros</h1>
        <br>
        <a class="btn btn-primary" href="{{ route('categoria.create')}}"><i class="bi bi-plus-circle"></i> Agregar rubro</a>
        <a class="btn btn-primary" href="/index"><i class=""></i> Regresar</a>
        <div class="row">
    @if ($categoria)
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Codigo de Rubro</th>
            <th>Rubro</th>
            <th>Opciones</th>
                
        </tr>
        @foreach ($categoria as $cat)
        <tr>
            <td>{{$cat->IdCategoria}}</td>
            <td>{{$cat->NombreCategoria}}</td>
            <td><a class="btn btn-success" href="/categoria/{{$cat->IdCategoria}}/edit"><i class="bi bi-pencil-square"></i></a>
            <a class="btn btn-primary" href="/categoria/{{$cat->IdCategoria}}"><i class="bi bi-eye-fill"></i></a>
            <a class="btn btn-danger" href="{{ route('categoria.destroy', $cat->IdCategoria) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $cat->IdCategoria }}').submit();">
    <i class="bi bi-trash"></i>
</a>
<form id="delete-form-{{ $cat->IdCategoria }}" action="{{ route('categoria.destroy', $cat->IdCategoria) }}" method="POST" style="display: none;">
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
@else
<h3>Usted no tiene permisos para acceder a esta pagina</h3>
<p>La página de Administración de la cuponera no puede mostrarte nada porque no tienes los permisos necesarios.</p>
@endif
@else
<h3>Inicie sesion para ver contenido</h3>
<p>La página de Administración de la cuponera no puede mostrarte nada porque no has iniciado sesión.</p>
@endif
@endsection