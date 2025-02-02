<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <form action="{{route('login')}}" method="GET">
            <button type="submit" class="btn btn-primary">volver</button>
        </form>
        <h2 class="mb-4">Recuperar Contraseña</h2>

        <!-- Mostrar mensajes de error -->
        

        <!-- Formulario -->
        <form action="{{ route('password.verify') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="user_cedula" class="form-label">Cédula</label>
                <input type="text" id="user_cedula" name="user_cedula" class="form-control" placeholder="Ingrese su cédula" required>
            </div>
            <div class="mb-3">
                <label for="user_nombre" class="form-label">Nombre</label>
                <input type="text" id="user_nombre" name="user_nombre" class="form-control" placeholder="Ingrese su nombre" required>
            </div>
            <div class="mb-3">
                <label for="user_apellido" class="form-label">Apellido</label>
                <input type="text" id="user_apellido" name="user_apellido" class="form-control" placeholder="Ingrese su apellido" required>
            </div>
            <div class="mb-3">
                <label for="user_email" class="form-label">Correo Electrónico</label>
                <input type="email" id="user_email" name="user_email" class="form-control" placeholder="Ingrese su correo electrónico" required>
            </div>
            <button type="submit" class="btn btn-primary">Verificar</button>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</body>
</html>
