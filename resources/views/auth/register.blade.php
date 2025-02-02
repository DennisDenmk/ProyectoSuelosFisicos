<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/Register.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
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

    <header class="header">
        <h2>Registrar Cuenta</h2>
        <a href="{{ route('login') }}" class="btnvol">Volver</a>
    </header>

    <div class="container">
        <!-- Columna Derecha -->
        <div class="right-column">
            <form action="{{ route('register.create') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Tipo de Usuario:</label>
                    <select name="tipus_id" id="tipus_id" class="Parcelas" required>
                        <option value="3">Estudiante</option>
                        <option value="4">Docente</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Cédula:</label>
                    <input type="text" name="user_cedula" id="user_cedula" placeholder="Ingrese su Cédula" maxlength="10" required>
                </div>

                <div class="form-group">
                    <label>Nombre:</label>
                    <input type="text" name="user_nombre" id="user_nombre" placeholder="Ingrese su Nombre" required>
                </div>

                <div class="form-group">
                    <label>Apellido:</label>
                    <input type="text" name="user_apellido" id="user_apellido" placeholder="Ingrese su Apellido" required>
                </div>

                <div class="form-group">
                    <label>Correo Electrónico:</label>
                    <input type="email" name="user_email" id="user_email" placeholder="Ingrese su Correo Electrónico" required>
                </div>

                <div class="form-group">
                    <label>Contraseña:</label>
                    <input type="password" name="user_password" id="user_password" placeholder="Ingrese su Contraseña" minlength="8" required>
                </div>

                <div class="form-group">
                    <label>Confirmar Contraseña:</label>
                    <input type="password" name="user_password_confirmation" id="user_password_confirmation" placeholder="Confirme su Contraseña" minlength="8" required>
                </div>

                <div class="form-group">
                    <label>Teléfono:</label>
                    <input type="text" name="user_telefono" id="user_telefono" placeholder="Ingrese su Teléfono" maxlength="10" required>
                </div>

                <button type="submit" class="btn">Registrarse</button>
            </form>
        </div>
    </div>

</body>

</html>
