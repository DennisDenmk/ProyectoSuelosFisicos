document.addEventListener('DOMContentLoaded', function () {
    // Seleccionar el formulario específico para la contraseña
    const passwordForm = document.getElementById('password-form');

    // Función para validar que las contraseñas coincidan antes de enviar el formulario
    passwordForm.addEventListener('submit', function (event) {
        const newPassword = document.getElementById('new_password').value;
        const confirmPassword = document.getElementById('conf_password').value;

        if (newPassword !== confirmPassword) {
            alert('Las contraseñas no coinciden.');
            event.preventDefault(); // Evitar que el formulario se envíe
        }
    });

    // Activar o desactivar el botón de enviar según la coincidencia de contraseñas
    passwordForm.addEventListener('input', function () {
        const newPassword = document.getElementById('new_password').value;
        const confirmPassword = document.getElementById('conf_password').value;
        const submitButton = document.getElementById('submit-button');
        const errorMessage = document.getElementById('error-message');

        if (newPassword === confirmPassword && newPassword.length > 0) {
            submitButton.disabled = false;
            errorMessage.style.display = 'none';
        } else {
            submitButton.disabled = true;
            if (newPassword.length > 0 || confirmPassword.length > 0) {
                errorMessage.style.display = 'block';
            } else {
                errorMessage.style.display = 'none';
            }
        }
    });
});
