@extends('layouts.template')

@section('title','Administracion La Cuponera')

@section('content')
<head>
  <!-- Other head elements -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="{{ asset('css/principal.css') }}" rel="stylesheet">

</head>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
    @if(session('user'))
    
        <h3>Panel de Administracion</h3>

            <div class="card-body">
            <div class="table-responsive">
            <table class="table" style="overflow-x: hidden; overflow-y: hidden;">
    <tr>
        <td colspan="3">
            <div class="row">
                @if(session('user')->Rol == 2)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-tags"></i> Cupones</h5>
                            <p class="card-text">Administra los cupones ofertados.</p>
                            <a href="{{ url('/cupon') }}" class="btn btn-primary">Ir a la lista de cupones</a>
                        </div>
                    </div>
                </div>
                @endif
                
                @if(session('user')->Rol == 1)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-tags"></i> Rubros</h5>
                            <p class="card-text">Administra los rubros.</p>
                            <a href="{{ url('/categoria') }}" class="btn btn-primary">Ir a la lista de rubros</a>
                        </div>
                    </div>
                </div>
                @endif
                
                @if(session('user')->Rol == 1)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-users"></i> Clientes</h5>
                            <p class="card-text">Administra los clientes de la cuponera.</p>
                            <a href="{{ url('/cliente') }}" class="btn btn-primary">Ir a Clientes</a>
                        </div>
                    </div>
                </div>
                @endif
                
                @if(session('user')->Rol == 1)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-building"></i> Empresas</h5>
                            <p class="card-text">Administra las empresas ofertantes.</p>
                            <a href="{{ url('/empresa') }}" class="btn btn-primary">Ir a Empresas</a>
                        </div>
                    </div>
                </div>
                @endif
                
                @if(session('user')->Rol == 2)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-users-cog"></i> Trabajadores</h5>
                            <p class="card-text">Administra los trabajadores de la cuponera.</p>
                            <a href="{{ url('/trabajador') }}" class="btn btn-primary">Ir a Trabajadores</a>
                        </div>
                    </div>
                </div>
                @endif
                
                @if(session('user')->Rol == 2)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-shopping-cart"></i> Ventas</h5>
                            <p class="card-text">Administra las ventas de cupones.</p>
                            <a href="{{ url('/venta') }}" class="btn btn-primary">Ir a Ventas</a>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </tr>

                </table>
                @else
                <h3>Inicia sesión para ver el contenido</h3>
                <p>La página de Administración de la cuponera no puede mostrarte nada porque no has iniciado sesión.</p>
                @endif
            </div>
            </div>
      </div>

  </div>
</div>

@endsection
