<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Registro | Soil Management</title>
  <link rel="stylesheet" href="{{ asset('css/Register.css') }}">
  <script src="{{ asset('js/auth.js') }}" defer></script>
</head>
<body>
  <header class="header">
    <div class="menu container">
      <h2>Registro</h2>
      <a href="{{ asset('/') }}" class="btnvol">Volver</a>
    </div>
  </header>

  <div class="container">
    <div class="register-box">
      <h2>Crear Cuenta</h2>
      <form id="formRegister">
        @csrf
        <label for="rol">Rol:</label>
        <select name="rol" id="rol" required>
          <option value="Estudiante">Estudiante</option>
          <option value="Docente">Docente</option>
        </select>

        <label for="user_cedula">Cédula:</label>
        <input type="text" id="user_cedula" name="user_cedula" required maxlength="10" minlength="10">

        <label for="user_nombre">Nombre:</label>
        <input type="text" id="user_nombre" name="user_nombre" required>

        <label for="user_apellido">Apellido:</label>
        <input type="text" id="user_apellido" name="user_apellido" required>

        <label for="user_email">Correo:</label>
        <input type="email" id="user_email" name="user_email" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required minlength="8">

        <label for="user_telefono">Teléfono:</label>
        <input type="text" id="user_telefono" name="user_telefono" required>

        <button type="submit" class="btn btn-primary">Registrarse</button>
      </form>
    </div>
  </div>
</body>
</html>
