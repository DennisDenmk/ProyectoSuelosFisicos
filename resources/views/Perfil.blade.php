<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil</title>
</head>

<body>
    <form action="{{ route('perfil.actualizarnombre') }}" method="POST">
        @csrf
        <div>
            <label for="user_nombre">Nombre</label>
            <input type="text" name="user_nombre" value="{{ Auth::user()->user_nombre }}" maxlength="50" required>
        </div>

        <div>
            <label for="user_apellido">Apellido</label>
            <input type="text" name="user_apellido" value="{{ Auth::user()->user_apellido }}" maxlength="50"
                required>
        </div>

        <button type="submit">Actualizar Datos</button>
    </form>

    <form action="{{ route('perfil.actualizarContrasena') }}" method="POST">
        @csrf
        <div>
            <label>Contraseña Actual</label>
            <input type="password" name="current_password" required>
        </div>

        <div>
            <label>Nueva Contraseña</label>
            <input type="password" name="new_password" required>
        </div>

        <div>
            <label>Confirmar Nueva Contraseña</label>
            <input type="password" name="new_password_confirmation" required>
        </div>

        <button type="submit">Cambiar Contraseña</button>
    </form>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif


</body>

</html>
