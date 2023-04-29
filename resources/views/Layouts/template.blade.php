<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>@yield('title')</title>
      <!-- Favicon-->
      <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
      <!-- Bootstrap icons-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    
      <!-- Core theme JS-->

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" defer></script>
      <!-- others-->
      <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"/>
      <link href="{{asset('css/alertify.core.css')}}" rel="stylesheet" type="text/css"/>
      <link href="{{asset('css/alertify.default.css')}}" rel="stylesheet" type="text/css"/>
      <script src="{{asset('js/jquery-1.12.0.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('js/bootstrap.min.js')}}"></script>
      <script src="{{asset('js/alertify.js')}}" type="text/javascript"></script>
      <script src="{{asset('js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('js/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>

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
    <section>
      <h2 class="text-center">@yield('title2')</h2>
      
        @yield('content')
      
    </section>
        <link href="{{ asset('css/header.css') }}" rel="stylesheet" />
</body>
</html>