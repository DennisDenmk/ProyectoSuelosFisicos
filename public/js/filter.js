document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const filterSelect = document.getElementById('filterSelect');
    const searchContainer = document.getElementById('searchContainer');

    // Lista de estructuras para mostrar en el filtro
    const estructuras = [
        { code: 'E001', description: 'Estructura Granular' },
        { code: 'E002', description: 'Estructura en Bloques' },
        { code: 'E003', description: 'Estructura Laminar' },
        { code: 'E004', description: 'Estructura Prismática' },
        { code: 'E005', description: 'Estructura Columnar' },
        { code: 'E006', description: 'Estructura Masiva' },
        { code: 'E007', description: 'Estructura Friable' },
    ];

    // Lista de parcelas (esto dependerá de los datos que tienes disponibles)
    const parcelas = [
        { id: 'P001', description: 'Parcela 1' },
        { id: 'P002', description: 'Parcela 2' },
        { id: 'P003', description: 'Parcela 3' },
        // Agrega las parcelas correspondientes
    ];

    // Lista de porosidades
    const porosidades = [
        { code: 'MP1', description: 'Macroporos grandes (>30 µm)' },
        { code: 'MP2', description: 'Macroporos pequeños (30-9 µm)' },
        { code: 'MS1', description: 'Mesoporos grandes (9-3 µm)' },
        { code: 'MS2', description: 'Mesoporos pequeños (3-0.2 µm)' },
        { code: 'MI', description: 'Microporos (<0.2 µm)' },
    ];

    // Actualiza el lugar del input según el filtro seleccionado
    function updateSearchInput() {
        const selectedFilter = filterSelect.value;
        searchInput.value = ''; // Limpiar búsqueda al cambiar filtro

        if (selectedFilter === 'parcela') {
            createDropdown(parcelas);
        } else if (selectedFilter === 'estructura') {
            createDropdown(estructuras);
        } else if (selectedFilter === 'porosidad') {
            createDropdown(porosidades);
        } else {
            createTextInput();
        }
    }

    // Crear un campo de entrada de texto para búsqueda
    function createTextInput() {
        searchContainer.innerHTML = '<input type="text" id="searchInput" class="border p-2 mt-2" placeholder="Buscar...">';
        searchInput = document.getElementById('searchInput');
    }

    // Crear un dropdown con las opciones disponibles
    function createDropdown(options) {
        let dropdown = '<select id="searchInput" class="border p-2 mt-2"><option value="">Seleccionar...</option>';
        options.forEach(option => {
            dropdown += `<option value="${option.code}">${option.description}</option>`;
        });
        dropdown += '</select>';
        searchContainer.innerHTML = dropdown;

        // Volver a obtener el nuevo select
        searchInput = document.getElementById('searchInput');
    }

    // Filtrar las muestras según la búsqueda
    searchInput.addEventListener('input', function() {
        const filterValue = searchInput.value.toLowerCase();
        const selectedFilter = filterSelect.value;
        const rows = document.querySelectorAll('table tbody tr');

        rows.forEach(row => {
            let match = false;
            const parcela = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
            const estructura = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            const porosidad = row.querySelector('td:nth-child(3)').textContent.toLowerCase();

            switch (selectedFilter) {
                case 'parcela':
                    match = parcela.includes(filterValue);
                    break;
                case 'estructura':
                    match = estructura.includes(filterValue);
                    break;
                case 'porosidad':
                    match = porosidad.includes(filterValue);
                    break;
                default:
                    break;
            }

            row.style.display = match ? '' : 'none';
        });
    });

    // Inicialización de la página
    filterSelect.addEventListener('change', updateSearchInput);
    updateSearchInput(); // Llamar la función para crear el filtro adecuado al inicio
});
