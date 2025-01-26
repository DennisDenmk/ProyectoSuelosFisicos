<form action="{{ route('perfil.actualizarContrasena') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Contraseña Actual</label>
        <input type="password" 
               name="current_password" 
               required
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Nueva Contraseña</label>
        <input type="password" 
               name="new_password" 
               required
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Confirmar Nueva Contraseña</label>
        <input type="password" 
               name="new_password_confirmation" 
               required
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
    </div>

    <button type="submit" 
            class="w-full bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-colors">
        Cambiar Contraseña
    </button>
</form>