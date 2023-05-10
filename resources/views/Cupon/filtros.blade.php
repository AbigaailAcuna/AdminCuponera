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

<h2 class="mt-5 text-center">Lista de Cupones</h1>
<form action="">
<label for="">Filtrar estado: </label>
<select name="indice">
    <option value="4" {{Request::get('indice') == '4'}}>En espera</option>
    <option value="6" {{Request::get('indice') == '6'}}>Rechazados</option>
    <option value="1" {{Request::get('indice') == '1'}}>Activos</option>
    <option value="3" {{Request::get('indice') == '3'}}>Vencidos</option>
    <option value="5" {{Request::get('indice') == '5'}}>Descartados</option>
</select>
<button name='Enviar' type="submit" class="btn btn-success">Filtrar</button>
</form>
@if($cupon)



<table class="table  mt-4">
  <thead>
    <tr>
      
      <th scope="col">IdCupon</th>
      <th scope="col">Empresa</th>
      <th scope="col">Titulo</th>
      <th scope="col">Estado</th>
      <th scope="col">Detalles</th>
    </tr>
  </thead>
  <tbody>
  @foreach($cupon as $elemento)
  
    <tr>
      
      <td>{{$elemento->IdCuponR}}</td>
      <td>{{$elemento->IdEmpresaR}}</td>
      <td>{{$elemento->Titulo}}</td>
      <td>{{$elemento->Estado}}</td>
      <td><p type="button" class="btn btn-primary"><a href="#" style="text-decoration:none; color:white;">Mas detalles</a></p></td>
    </tr>
    
    @endforeach
  
 
  </tbody>
</table>
@endif
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>




