<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soil Management</title>
  <link rel="stylesheet" href="{{ asset('css/LoginDiseño.css') }}">
</head>
<body>
  <header class="header">
      <div class="menu container">
        <h2>SOUL MANAGMENT</h2>
      </div>
  </header>
  <div class="container">
    <div class="login-box">
      <img src="{{ asset('images/Reciclaje.png') }}" alt="Recycling illustration" class="image">
      <form>
        <h2>Iniciar Sesión</h2>
        <label for="email">Email:</label>
        <input type="email" id="email" placeholder="ejemplo@gmail.com" class="contra">
        <label for="password" >Contraseña:</label>
        <input type="password" id="password" placeholder="Ingrese su contraseña" class="contra">
        <a href="../HTML/PrimerPag.html" class="btn">Iniciar Sesion</a>
        <!--<button a href="../HTML/PrimerPag.html" class="btn" type="submit">Iniciar Sesion</button>-->
      </form>
    </div>
  </div>
</body>
</html>
