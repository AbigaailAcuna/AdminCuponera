@extends('layouts.template')

@section('title','Login')

@section('content')

<head>
    
    <link href="http://localhost/AdminCuponera/resources/css/login.css" rel="stylesheet" />
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
@endsection