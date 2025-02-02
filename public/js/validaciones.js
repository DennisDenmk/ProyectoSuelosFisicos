document.addEventListener("DOMContentLoaded", function () {
    const arenaInput = document.getElementById("detal_arena");
    const limoInput = document.getElementById("detal_limo");
    const arcillaInput = document.getElementById("detal_arcilla");

    function validarSuma() {
        let arena = parseFloat(arenaInput.value) || 0;
        let limo = parseFloat(limoInput.value) || 0;
        let arcilla = parseFloat(arcillaInput.value) || 0;

        let suma = arena + limo + arcilla;

        if (suma > 100) {
            alert("La suma de Arena, Limo y Arcilla no puede ser mayor a 100.");
            return false;
        }

        return true;
    }

    function ajustarValores(input) {
        let arena = parseFloat(arenaInput.value) || 0;
        let limo = parseFloat(limoInput.value) || 0;
        let arcilla = parseFloat(arcillaInput.value) || 0;

        let suma = arena + limo + arcilla;

        if (suma > 100) {
            let diferencia = suma - 100;

            if (input === arenaInput) {
                arenaInput.value = (arena - diferencia).toFixed(2);
            } else if (input === limoInput) {
                limoInput.value = (limo - diferencia).toFixed(2);
            } else if (input === arcillaInput) {
                arcillaInput.value = (arcilla - diferencia).toFixed(2);
            }
        }
    }

    [arenaInput, limoInput, arcillaInput].forEach((input) => {
        input.addEventListener("input", function () {
            if (!validarSuma()) {
                ajustarValores(this);
            }
        });
    });
});
