@extends('layouts.template')

@section('title','Login')

@section('content')

<head>
    
    <link href="http://localhost/AdminCuponera/resources/css/login.css" rel="stylesheet" />
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
</head>

<div class="login-page">
    <div class="form">
        <form class="login-form" action="{{route('login.check')}}" method="POST">
            @csrf 
            <h1>Inicio de Sesión</h1>
            <input name="correo" id="correo" placeholder="Correo">
            <input type="password" name="clave" id="clave" placeholder="Contraseña">
            <button name="login" id="login">Iniciar Sesión</button>
        </form>
    </div>
</div>
@if(session('alerta'))
<script>
    swal({
        title: "{{ session('alerta.title') }}",
        text: "{{ session('alerta.text') }}",
        icon: "{{ session('alerta.icon') }}",
    });
</script>
@endif 
@endsection