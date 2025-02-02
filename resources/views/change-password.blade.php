<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="container mt-5">
        <h2 class="mb-4">Cambiar Contraseña</h2>
        <form action="{{ route('password.update', ['id' => $user->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="new_password">Contraseña Nueva:</label>
                <input type="password" name="new_password" id="new_password" required>
            </div>
            <div class="form-group">
                <label for="conf_password">Repita la contraseña:</label>
                <input type="password" name="conf_password" id="conf_password" required>
            </div>

            <button type="submit" class="btn btn-success">Actualizar Contraseña</button>
        </form>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const newPassword = document.getElementById('new_password');
                const confirmPassword = document.getElementById('conf_password');
                const submitButton = document.getElementById('submit-button');
                const errorMessage = document.getElementById('error-message');

                const validatePasswords = () => {
                    if (newPassword.value === confirmPassword.value && newPassword.value !== '') {
                        submitButton.disabled = false;
                        errorMessage.style.display = 'none';
                    } else {
                        submitButton.disabled = true;
                        errorMessage.style.display = 'block';
                    }
                };

                // Add event listeners to both password fields
                newPassword.addEventListener('input', validatePasswords);
                confirmPassword.addEventListener('input', validatePasswords);
            });
        </script>
    </div>
</body>

</html>
