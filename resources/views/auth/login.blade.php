<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soil Management</title>
  <link rel="stylesheet" href="{{ asset('css/Login.css')}}">
</head>
<body>
  <header class="header">
      <div class="menu container">
        <h2>SOIL MANAGMENT</h2>
        <a href="{{url('/login')}}" class="btnvol">Volver</a>
      </div>
  </header>
  <div class="container">
    <div class="login-box">
      <img src="{{asset('images/Reciclaje.jpg')}}" alt="Recycling illustration" class="image">
      <h2>Iniciar Sesión</h2>
      
      <form action="{{ route('login') }}" method="POST">
        @csrf
        <label for="email">Cédula:</label>
        <input type="text" id="user_cedula" placeholder="" class="contra" required name="user_cedula" 
        :value="old('user_cedula')" maxlength="10" minlength="10">
        <label for="password" >Contraseña:</label>
        <input type="password" id="password" placeholder="Ingrese su contraseña" class="contra" name="password">
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        <x-input-error :messages="$errors->get('user_cedula')" style="color: #dc2626; font-size: 14px; margin-top: 8px;margin-right:10%" />
      </form>
      <a href="{{url('/RegistrarNuevoUsuario')}}" style="text-decoration: none;">¿No tienes cuenta?Registrate!!</a>
      <a href="{{url('/Olvidaste-tu-contrasena')}}" style="text-decoration: none;">¿Olvidaste tu contraseña?</a>
    </div>
  </div>
</body>
</html>
