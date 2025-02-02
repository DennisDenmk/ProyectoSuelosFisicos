<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tus Muestras</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: "{{ session('success') }}",
        });
    </script>
@endif

@if ($errors->any())
    <script>
        let errors = @json($errors->all());
        Swal.fire({
            icon: 'error',
            title: 'Error al procesar',
            html: errors.map(error => `<li>${error}</li>`).join(''),
        });
    </script>
@endif

<body class="bg-[#6B882E] text-gray-800">

    <header class="header py-8 bg-[#6B882E] text-white">
        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-semibold">Información de Muestras de Suelo</h2>
            <a href="{{ url('/Docente') }}"
                class="rounded-md px-4 py-2 hover:bg-[#6B882E] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#6B882E]">
                Volver
            </a>
        </div>
    </header>
    <div class="container mx-auto mt-8">
        <!-- Filtro -->
        <div class="mb-6">
            <label for="filterSelect" class="block text-[#6B882E] font-medium">Buscar por:</label>
            <select id="filterSelect"
                class="block w-full border border-green-300 rounded mt-2 p-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                <option value="parcela">Parcela</option>
                <option value="porosidad">Porosidad</option>
                <option value="textura">Textura</option>
                <option value="estructura">Estructura</option>
            </select>

            <div id="searchContainer">
                <!-- Aquí se actualizará el input o dropdown según el filtro seleccionado -->
                <input type="text" id="searchInput" class="border p-2 mt-2" placeholder="Buscar...">
            </div>
        </div>

        @if ($muestras->isEmpty())
            <p class="text-gray-600 text-center">No hay muestras registradas.</p>
        @else
            <table class="table-auto w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-green-700 text-white">
                    <tr>
                        <th class="px-4 py-2">ID de Muestra</th>
                        <th class="px-4 py-2">PARCELA</th>
                        <th class="px-4 py-2">ESTRUCTURA</th>
                        <th class="px-4 py-2">POROSIDAD</th>
                        <th class="px-4 py-2">Composición (Gráfico)</th>
                        <th class="px-4 py-2">TEXTURA</th>
                        <th class="px-4 py-2">Fecha de Registro</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($muestras as $muestra)
                        <tr class="text-center border-b">
                            <td class="px-4 py-2">{{ $muestra->muest_id }}</td>
                            <td class="px-4 py-2">{{ $muestra->parcela->parc_id }}</td>
                            <td class="px-4 py-2">
                                {{ $muestra->detalles->estructura->estru_descripcion }}
                            </td>
                            <td class="px-4 py-2">
                                <!-- Mostrar el valor de detal_porosidad -->
                                Valor de muestra:{{ $muestra->detalles->detal_porosidad }}
                                <br>
                                Tipo:
                                <span
                                    class="text-gray-600">{{ $muestra->detalles->porosidad->poros_descripcion }}</span>
                            </td>

                            <td class="px-4 py-2">
                                <canvas id="chart-{{ $loop->index }}" class="mx-auto"></canvas>
                            </td>
                            <td class="px-4 py-2">
                                @php
                                    // Mapea las claves de estructura con las rutas de las imágenes
                                    $estructura_imagen = [
                                        'E001' => 'E001.jpg',
                                        'E002' => 'E002.jpg',
                                        'E003' => 'E003.jpg',
                                        'E004' => 'E004.jpg',
                                        'E005' => 'E005.jpg',
                                        'E006' => 'E006.jpg',
                                        'E007' => 'E007.jpg',
                                    ];

                                    // Obtiene la imagen según la estructura
                                    $imagen = isset($estructura_imagen[$muestra->detalles->estru_id])
                                        ? $estructura_imagen[$muestra->detalles->estru_id]
                                        : 'default.jpg';
                                @endphp

                                <!-- Mostrar la imagen de la estructura -->
                                <img src="{{ asset('images/' . $imagen) }}" alt="{{ $muestra->detalles->estru_id }}"
                                    class="w-32 h-32 object-cover">
                            </td>
                            <td class="px-4 py-2">{{ $muestra->muest_fecharegistro }}</td>
                            <td>
                                
                                @if ($muestra->Parcela->user_id == $user->user_id)
                                    <form action="{{ route('borrar.muestra', $muestra->muest_id) }}" method="POST"
                                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta muestra?');">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button type="submit" class="btn btn-danger">Eliminar</button>

                                    </form>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>
        @endif
    </div>
    <script>
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
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const filterSelect = document.getElementById('filterSelect');
            const searchContainer = document.getElementById('searchContainer');
            const muestrasTable = document.querySelector('table tbody');

            // Listas de opciones
            const porosidadOptions = [{
                    code: 'P001',
                    description: 'Porosidad Baja'
                },
                {
                    code: 'P002',
                    description: 'Porosidad Media'
                },
                {
                    code: 'P003',
                    description: 'Porosidad Alta'
                },
            ];

            const texturaOptions = [{
                    code: 'T001',
                    description: 'Textura Arenosa'
                },
                {
                    code: 'T002',
                    description: 'Textura Arcillosa'
                },
                {
                    code: 'T003',
                    description: 'Textura Limoso-arenosa'
                },
            ];

            const estructuraOptions = [{
                    code: 'E001',
                    description: 'Estructura Granular'
                },
                {
                    code: 'E002',
                    description: 'Estructura en Bloques'
                },
                {
                    code: 'E003',
                    description: 'Estructura Laminar'
                },
                {
                    code: 'E004',
                    description: 'Estructura Prismática'
                },
                {
                    code: 'E005',
                    description: 'Estructura Columnar'
                },
                {
                    code: 'E006',
                    description: 'Estructura Masiva'
                },
                {
                    code: 'E007',
                    description: 'Estructura Friable'
                },
            ];

            const parcelas = [{
                    id: 'P001',
                    description: 'Parcela 1'
                },
                {
                    id: 'P002',
                    description: 'Parcela 2'
                },
                {
                    id: 'P003',
                    description: 'Parcela 3'
                },
                // Agrega más parcelas aquí
            ];

            // Actualiza el campo de búsqueda según el filtro seleccionado
            function updateSearchInput() {
                const selectedFilter = filterSelect.value;
                searchInput.value = ''; // Limpiar el campo de búsqueda al cambiar el filtro

                if (selectedFilter === 'parcela') {
                    createTextInput(); // Campo de texto para parcelas
                } else if (selectedFilter === 'porosidad') {
                    createDropdown(porosidadOptions, 'Porosidad'); // Dropdown para porosidad
                } else if (selectedFilter === 'textura') {
                    createDropdown(texturaOptions, 'Textura'); // Dropdown para textura
                } else if (selectedFilter === 'estructura') {
                    createDropdown(estructuraOptions, 'Estructura'); // Dropdown para estructura
                }
            }

            // Crear un campo de entrada de texto para parcelas
            function createTextInput() {
                searchContainer.innerHTML =
                    '<input type="text" id="searchInput" class="border p-2 mt-2" placeholder="Ingresar parcela...">';
                searchInput = document.getElementById('searchInput');
            }

            // Crear un dropdown con las opciones disponibles
            function createDropdown(options, label) {
                let dropdown =
                    `<select id="searchInput" class="border p-2 mt-2"><option value="">Seleccionar ${label}...</option>`;
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
                    const parcela = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                    const porosidad = row.querySelector('td:nth-child(4)').textContent
                        .toLowerCase();
                    const estructura = row.querySelector('td:nth-child(3)').textContent
                        .toLowerCase();
                    const textura = row.querySelector('td:nth-child(6)').textContent.toLowerCase();

                    switch (selectedFilter) {
                        case 'parcela':
                            match = parcela.includes(filterValue);
                            break;
                        case 'porosidad':
                            match = porosidad.includes(filterValue);
                            break;
                        case 'textura':
                            match = textura.includes(filterValue);
                            break;
                        case 'estructura':
                            match = estructura.includes(filterValue);
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
    </script>



</body>

</html>
