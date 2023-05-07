@extends('Layouts.template')

@section('title','Lista de Rubros')


@section('content')
<head>
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
</head>
@section('title2','Lista de Rubros')
<br>
<div class="container">
        <a class="btn btn-primary" href="{{ route('categoria.create')}}"><i class="bi bi-plus-circle"></i> Agregar rubro</a>
        <a class="btn btn-primary" href="/index"><i class=""></i> Regresar</a>
        <div class="row">
    @if ($categoria)
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Codigo de Rubro</th>
            <th>Rubro</th>
                
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
@endsection