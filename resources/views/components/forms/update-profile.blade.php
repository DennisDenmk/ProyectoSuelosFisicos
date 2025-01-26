<form action="{{ route('perfil.actualizarnombre') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label for="user_nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
        <input type="text" 
               name="user_nombre" 
               value="{{ Auth::user()->user_nombre }}" 
               maxlength="50" 
               required
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
    </div>

    <div>
        <label for="user_apellido" class="block text-sm font-medium text-gray-700 mb-1">Apellido</label>
        <input type="text" 
               name="user_apellido" 
               value="{{ Auth::user()->user_apellido }}" 
               maxlength="50"
               required
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
    </div>

    <button type="submit" 
            class="w-full bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-colors">
        Actualizar Datos
    </button>
</form>