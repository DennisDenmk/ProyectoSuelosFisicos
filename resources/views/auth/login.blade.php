<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soil Management</title>
  <link rel="stylesheet" href="{{ asset('css/LoginDiseno.css')}}">
</head>
<body>
  <header class="header">
      <div class="menu container">
        <h2>SOUL MANAGMENT</h2>
      </div>
  </header>
  <div class="container">
    <div class="login-box">
      <img src="{{asset('images/Reciclaje.jpg')}}" alt="Recycling illustration" class="image">
      <h2>Iniciar Sesión</h2>
      <form action="{{ route('login') }}" method="POST" >
        @csrf
        <label for="user_cedula">Cédula:</label>
        <input type="text" id="user_cedula" placeholder=".." class="contra" required name="user_cedula" 
        :value="old('user_cedula')">
        <label for="password" >Contraseña:</label>
        <input type="password" id="password" placeholder="Ingrese su contraseña" class="contra" required  name="password">
        <x-input-error :messages="$errors->get('user_cedula')" class="mt-2 text-red-600" />
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
      </form>
      <a href="{{url('/Olvidaste-tu-contrasena')}}">Propiedades Suelo</a>
      
    </div>
  </div>
</body>
</html>


