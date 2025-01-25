<nav class="bg-green-700 text-white p-4">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <!-- Logo o nombre -->
        <a href="#" class="text-2xl font-semibold">Suelo Lab</a>

        <!-- Opciones de navegación -->
        <div class="space-x-4 flex items-center">
            <!-- Muestras desplegable -->
            <div class="relative">
                <button class="flex items-center space-x-2 px-4 py-2 rounded hover:bg-green-600 focus:outline-none">
                    <span>Muestras</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div class="absolute hidden bg-white text-green-700 rounded shadow-lg mt-2 w-48 z-10 right-0">
                    <form action="{{ route('muestras') }}" method="GET">
                        <button type="submit" class="btn">Ir a Registro</button>
                    </form>
                    <form action="{{ route('verregistro') }}" method="GET">
                        <button type="submit" class="btn">Ver Muestras</button>
                    </form>
                </div>
            </div>
            <a href="{{ url('/parcelas') }}" class="hover:text-green-200">Parcelas</a>
            <a href="{{ url('/perfil') }}" class="hover:text-green-200">Perfil</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</nav>
