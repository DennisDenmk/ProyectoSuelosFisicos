<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opciones Docente</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="text-center bg-white p-10 rounded-2xl shadow-lg">
        <h1 class="text-2xl font-bold mb-6">¿Qué deseas hacer?</h1>

        <div class="space-y-4">
            <a href="{{ route('perfil') }}" class="block w-full">
                <button class="w-full px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    Perfil
                </button>
            </a>
            <a href="{{ route('muestras') }}" class="block w-full">
                <button class="w-full px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    Registrar Datos
                </button>
            </a>
            <a href="{{ route('parcelasestudiante') }}" class="block w-full">
                <button class="w-full px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    Ver Parcelas
                </button>
            </a>

            <a href="{{ route('muestrasestudiante') }}" class="block w-full">
                <button class="w-full px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                    Ver Muestras
                </button>
            </a>

            <form action="{{route('logout')}}" method="POST" block w-full">
                @csrf
                <button class="w-full px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                    Cerrar Sesion
                </button>
            </form>

        </div>
    </div>
</body>

</html>
