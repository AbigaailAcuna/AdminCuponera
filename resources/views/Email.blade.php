@extends('layouts.template')

@section('title','ChangePassword')

@section('content')

<head>
    
    <link href="http://localhost/AdminCuponera/resources/css/login.css" rel="stylesheet" />
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
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