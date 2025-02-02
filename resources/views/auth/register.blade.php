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
        <a href="../HTML/SesionInvestigador.html" class="btnvol">Volver</a>
    </header>

    <div class="container">
        <!-- Columna Derecha -->
        <div class="right-column">
            <form action="{{ route('register.create') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Tipo de Usuario:</label>
                    <form>
                        <select name="Parcelas" id="tipus_id" class="Parcelas" placeholder="Usuario">
                            <option value="3">Estudiante</option>
                            <option value="4">Investigador</option>
                        </select>
                    </form>
                </div>

                <div class="form-group">
                    <label>Cedula:</label>
                    <br>
                    <input type="text" id="user_cedula" placeholder="Ingrese su Cedula" maxlength="10" required>
                </div>

                <div class="form-group">
                    <label>Nombre:</label>
                    <br>
                    <input type="text" id="user_nombre" placeholder="Ingrese su Nombre" required>
                </div>

                <div class="form-group">
                    <label>Apellido:</label>
                    <br>
                    <input type="text" id="user_apellido" placeholder="Ingrese su Apellido" required>
                </div>

                <div class="form-group">
                    <label>Correo Electronico:</label>
                    <br>
                    <input type="email" id="user_email" placeholder="Ingrese su correo" required>
                </div>

                <div class="form-group">
                    <label>Contraseña:</label>
                    <br>
                    <input type="password" id="user_password"placeholder="Ingrese su correo" required>
                </div>

                <div class="form-group">
                    <label>Confirmar contraseña:</label>
                    <br>
                    <input type="password" name="user_password_confirmation" placeholder="Ingrese su correo" required>
                </div>

                <div class="form-group">
                    <label>Telefono:</label>
                    <br>
                    <input type="text" id="user_telefono" placeholder="Ingrese su correo" required>
                </div>

                <button type="submit" class="btn">Registrarse</button>
            </form>

        </div>
    </div>

</body>

</html>
