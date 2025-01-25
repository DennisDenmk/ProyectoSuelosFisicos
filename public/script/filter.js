document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const filterSelect = document.getElementById('filterSelect');

    searchInput.addEventListener('input', function() {
        const filterValue = searchInput.value.toLowerCase();
        const selectedFilter = filterSelect.value;
        const rows = document.querySelectorAll('#muestrasTable tbody .muestra-row');

        rows.forEach(row => {
            let match = false;
            const parcela = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            const estru_id = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
            const poros_id = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
            const textura = row.querySelector('td:nth-child(11)').textContent.toLowerCase();

            switch (selectedFilter) {
                case 'parcela':
                    match = parcela.includes(filterValue);
                    break;
                case 'estru_id':
                    match = estru_id.includes(filterValue);
                    break;
                case 'poros_id':
                    match = poros_id.includes(filterValue);
                    break;
                case 'textura':
                    match = textura.includes(filterValue);
                    break;
                default:
                    break;
            }

            // Mostrar o esconder la fila dependiendo si hay coincidencia
            if (match) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});
