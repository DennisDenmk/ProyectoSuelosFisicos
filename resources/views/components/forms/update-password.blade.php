<form action="{{ route('perfil.actualizarContrasena') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="new_password">Contraseña Nueva:</label>
        <input type="password" name="new_password" id="new_password" required>
    </div>
    <div class="form-group">
        <label for="conf_password">Repita la contraseña:</label>
        <input type="password" name="conf_password" id="conf_password" required>
    </div>
    <button type="submit" class="btn" id="submit-button" disabled>Actualizar contraseña</button>
    <p id="error-message" style="color: red; display: none;">Las contraseñas no coinciden.</p>
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

