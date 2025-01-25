document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const filterSelect = document.getElementById('filterSelect');
    const muestrasTable = document.querySelector('table tbody');

    // Asegúrate de que `muestras` se esté pasando correctamente desde PHP a JavaScript
    const muestras =
        @json($muestras); // Blade convierte la variable $muestras en un objeto JSON

    muestras.forEach((muestra, index) => {
        const ctx = document.getElementById(`chart-${index}`).getContext("2d");

        if (ctx) {
            const data = {
                labels: ["Arena", "Limo", "Arcilla"],
                datasets: [{
                    label: "Composición del Suelo",
                    data: [
                        muestra.detalles.detal_arena,
                        muestra.detalles.detal_limo,
                        muestra.detalles.detal_arcilla,
                    ],
                    backgroundColor: ["#FDB45C", "#46BFBD", "#F7464A"],
                    hoverBackgroundColor: ["#FFC870", "#5AD3D1", "#FF5A5E"],
                }]
            };

            const options = {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: "top"
                    }
                }
            };

            // Crear gráfico
            new Chart(ctx, {
                type: "pie",
                data: data,
                options: options
            });
        }
    });

    // Filtrar tabla
    searchInput.addEventListener('input', function() {
        const filterValue = filterSelect.value.toLowerCase();
        const searchValue = searchInput.value.toLowerCase();
        const rows = muestrasTable.querySelectorAll('tr');

        rows.forEach(row => {
            let cellText = '';

            switch (filterValue) {
                case 'parcela':
                    cellText = row.querySelector('td:nth-child(2)').textContent;
                    break;
                case 'estru_id':
                    cellText = row.querySelector('td:nth-child(3)').textContent;
                    break;
                case 'poros_id':
                    cellText = row.querySelector('td:nth-child(4)').textContent;
                    break;
                case 'textura':
                    cellText = row.querySelector('td:nth-child(6)').textContent;
                    break;
                default:
                    break;
            }

            if (cellText && cellText.toLowerCase().includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});
