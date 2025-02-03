<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacion Perfil</title>
    <link rel="stylesheet" href="{{ asset('css/Perfil.css') }}">
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
        <h2>Perfil</h2>

        <a href="{{ url('/Estudiante') }}" class="btnvol">Volver</a>
    </header>

    <div class="container">
        <!-- Columna Izquierda -->
        <div class="left-column">
            <x-forms.update-profile />
        </div>

        <!-- Columna Derecha -->
        <div class="right-column">
            <h3>Actualizar Datos</h3>
            <x-forms.update-password />
        </div>
    </div>
    <script src="{{ asset('js/alerta.js') }}" defer></script>
</body>

</html>
