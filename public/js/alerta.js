document.addEventListener('DOMContentLoaded', function() {
    // Verificar si hay un mensaje de éxito en la sesión y mostrar una alerta
    if (document.querySelector('.alert-success')) {
        alert(document.querySelector('.alert-success').textContent.trim());
    }

    // Función para validar que las contraseñas coincidan antes de enviar el formulario
    document.querySelector('form').addEventListener('submit', function(event) {
        const newPassword = document.getElementById('new_password').value;
        const confirmPassword = document.getElementById('conf_password').value;

        if (newPassword !== confirmPassword) {
            alert('Las contraseñas no coinciden.');
            event.preventDefault(); // Evitar que el formulario se envíe
        }
    });
});