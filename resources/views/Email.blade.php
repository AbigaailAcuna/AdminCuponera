@extends('layouts.template')

@section('title','ChangePassword')

@section('content')

<head>
    
    <link href="http://localhost/AdminCuponera/resources/css/login.css" rel="stylesheet" />
</head>

<div class="login-page">
    <div class="form">
        <form class="login-form" action="{{ route('sendemail') }}" method="POST">
        @csrf
            <h1>Cambio de contraseña</h1>
            <input type="text" name="correo" id="correo" placeholder="Email"/>
            <button name="login" id="login">Enviar correo</button>
        </form>
    </div>
</div>
@endsection