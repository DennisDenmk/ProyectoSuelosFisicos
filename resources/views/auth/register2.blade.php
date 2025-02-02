<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container mt-5">
        <a href="{{ url('/login') }}">Volver</a>
        <h2>Registro de Usuario</h2>
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: "{{ session('success') }}",
                });
            </script>
        @endif

        @if ($errors->any())
            <script>
                let errors = @json($errors->all());
                Swal.fire({
                    icon: 'error',
                    title: 'Error al procesar',
                    html: errors.map(error => `<li>${error}</li>`).join(''),
                });
            </script>
        @endif
        <!-- Success or Error Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('register.create') }}" method="POST">
            @csrf

            <!-- Tipo de Usuario -->
            <div class="mb-3">
                <label for="tipus_id" class="form-label">Tipo de Usuario</label>
                <select name="tipus_id" id="tipus_id" class="form-select" required>
                    <option value="" disabled selected>Selecciona un tipo de usuario</option>
                    <option value="3">Estudiante</option>
                    <option value="4">Docente</option>
                </select>
                @error('tipus_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Cédula -->
            <div class="mb-3">
                <label for="user_cedula" class="form-label">Cédula</label>
                <input type="text" class="form-control" id="user_cedula" name="user_cedula" required>
                @error('user_cedula')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nombre -->
            <div class="mb-3">
                <label for="user_nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="user_nombre" name="user_nombre" required>
                @error('user_nombre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Apellido -->
            <div class="mb-3">
                <label for="user_apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="user_apellido" name="user_apellido" required>
                @error('user_apellido')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Correo Electrónico -->
            <div class="mb-3">
                <label for="user_email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="user_email" name="user_email" required>
                @error('user_email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <label for="user_password">Contraseña:</label>
            <input type="password"class="form-control" name="user_password" id="user_password" required>
            @error('user_password')
                <div>{{ $message }}</div>
            @enderror

            <!-- Campo para confirmar la contraseña -->
            <label for="user_password_confirmation">Confirmar Contraseña:</label>
            <input type="password" class="form-control" name="user_password_confirmation"
                id="user_password_confirmation" required>
            @error('user_password_confirmation')
                <div>{{ $message }}</div>
            @enderror

            <!-- Teléfono -->
            <div class="mb-3">
                <label for="user_telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="user_telefono" name="user_telefono" required>
                @error('user_telefono')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Registrar Usuario</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
