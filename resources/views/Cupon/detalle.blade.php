<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid px-4">
                  <a class="navbar-brand"  href="{{ url('/index') }}">Cuponera-Administrador</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                              <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/index') }}">Inicio</a></li>
                              </li>
                        </ul>
                  </div>
            </div>
</nav>

<div class="container" >
<h2 class="mt-5 text-center">Detalle de la oferta</h1>




<table class="table  mt-4">

  <tbody>
 

  
  
    <tr>
      <th class="table-dark">IdCupon</th>
      <td>{{$cupon->IdCuponR}}</td>
    </tr>
    <tr>
      <th class="table-dark">IdEmpresa</th>
      <td>{{$cupon->IdEmpresaR}}</td>
    </tr>
    <tr>
      <th class="table-dark">Titulo</th>
      <td>{{$cupon->Titulo}}</td>
    </tr>
    <tr>
      <th class="table-dark">Precio Regular</th>
      <td>${{$cupon->PrecioRegular}}</td>
    </tr>
    <tr>
      <th class="table-dark">Precio Oferta</th>
      <td>${{$cupon->PrecioOferta}}</td>
    </tr>
    <tr>
      <th class="table-dark" >Precio Cupon</th>
      <td>${{$cupon->PrecioCupon}}</td>
    </tr>
    <tr>
      <th class="table-dark">Fecha Inicio</th>
      <td>{{$cupon->FechaInicio}}</td>
    </tr>
    <tr>
      <th class="table-dark">Fecha Fin</th>
      <td>{{$cupon->FechaFin}}</td>
    </tr>
    <tr>
      <th class="table-dark">Fecha Limite</th>
      <td>{{$cupon->FechaLimiteUso}}</td>
    </tr>
    <tr>
      <th class="table-dark">Descripcion</th>
      <td>{{$cupon->Descripcion}}</td>
    </tr>
    <tr>
      <th class="table-dark">Estado</th>
      <td>{{$estado[0]->NombreEstado}}</td>
    </tr>
   
  
    
   
    
 
  </tbody>
</table>
@if(session('user')->Rol == 1)
@if($cupon->Estado == 4)

<div class="container text-center">

<form action="/cupon/detalle/{{$cupon->IdCuponR}}" method="POST">
@csrf
  <label for="">Cambiar estado del cupon:</label>
  <select name="indice">

    <option value="6"  >Rechazado</option>
    <option value="1" >Activo</option>
    <option value="5" >Descartado</option>
</select>
<button type="submit" class="btn btn-success">Cambiar</button>
</form>
</div>

@endif
@endif
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>

