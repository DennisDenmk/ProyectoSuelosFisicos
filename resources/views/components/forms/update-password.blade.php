<form action="{{ route('perfil.actualizarContrasena') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="current-password">Contraseña Actual:</label>
        <input type="password"name="current_password" required>
    </div>
    <div class="form-group">
        <label for="new-password">Nueva Contraseña:</label>
        <input type="password" name="new_password"  required>
    </div>
    <div class="form-group">
        <label for="confirm-password">Confirmar Contraseña:</label>
        <input type="password" id="confirm-password_confirmation" required>
    </div>
    <button type="submit" class="btn">Actualizar Datos</button>
</form>