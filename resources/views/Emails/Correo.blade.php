<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
  body {
    padding: 3rem;
    margin: 0;
    border: 0;
    font-family: Arial, Helvetica, sans-serif;
    text-align: center;
    background-color: #F1F1F1;
    font-size: 20px
  }
  
  header {
    background-color: #3AC472;
    text-anchor: 15px;
    color:White;
    border-width: 30px 30px;
    text-align: center;
  }
  
  .navbar-brand {
    margin-bottom: 0;
  }
  
  h3 {
    margin-top: 1.5rem;
    margin-bottom: 1.5rem;
    font-weight: bold;
  }
  
  p {
    margin-top: 1.5rem;
    margin-bottom: 1rem;
  }
  
  </style>
</head>
<body>
  <header>
    <nav class="navbar bg-primary" data-bs-theme="dark">
      <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">
          <h2>La cuponera</h2>
        </span>
      </div>
    </nav>
  </header>
<div>
  <h3>Se ha completado su registro</h3>
  <p>Gracias por usar los servicios de la cuponera, tu cuenta ha sido registrada, tu contraseña es: <strong>{{ $clave }}</strong></p>
</div>
<div>
  
</div>
</body>
</html>