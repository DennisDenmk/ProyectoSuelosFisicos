document.addEventListener("DOMContentLoaded", function () {
    const preloader = document.getElementById("preloader");
    if (preloader) {
        setTimeout(() => {
            preloader.style.transition = "opacity 0.5s"; // Suaviza la transición
            preloader.style.opacity = "0"; // Desaparece gradualmente
            setTimeout(() => {
                preloader.style.display = "none"; // Esconde completamente
            }, 500); // Duración de la transición
        }, 750); // 3 segundos máximo
    }
});