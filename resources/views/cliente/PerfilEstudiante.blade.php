<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil Estudiante</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <!-- Botón Volver -->
        <div class="mb-8">
            <a href="{{ url('/Estudiante') }}"
                class="inline-flex items-center bg-green-600 text-white rounded-md px-4 py-2 hover:bg-green-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-green-400 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Volver
            </a>
        </div>

        <!-- Contenedor de Formularios -->
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Formulario de Actualización de Perfil -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Actualizar Perfil</h2>
                <x-forms.update-profile />
            </div>

            <!-- Formulario de Cambio de Contraseña -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Cambiar Contraseña</h2>
                <x-forms.update-password />
            </div>
        </div>

        <!-- Alertas -->
        <div class="mt-8">
            @if (session('success'))
                <x-alert type="success" :messages="session('success')" />
            @endif

            @if ($errors->any())
                <x-alert type="danger" :messages="$errors->all()" />
            @endif
        </div>
    </div>
</body>
</html>