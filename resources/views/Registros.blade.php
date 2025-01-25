<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Muestras</title>
    
</head>

<body>
    <header class="header">
        <h2>Información de Muestras de Suelo</h2>

    </header>
    <div class="container">
        <!-- Filtro -->
        <div class="mb-3">
            <label for="filterSelect" class="form-label">Buscar por:</label>
            <select id="filterSelect" class="form-select">
                <option value="parcela">Parcela</option>
                <option value="estru_id">ESTRU_ID</option>
                <option value="poros_id">POROS_ID</option>
                <option value="textura">Textura</option>
            </select>
    
            <input type="text" id="searchInput" class="form-control mt-2" placeholder="Buscar...">
        </div>

        @if ($muestras->isEmpty())
            <p>No hay muestras registradas.</p>
        @else
            <table class="table" id="muestrasTable">
                <thead>
                    <tr>
                        <th>MUEST_ID</th>
                        <th>PARCELA</th>
                        <th>ESTRU_ID</th>
                        <th>POROS_ID</th>
                        <th>DETAL_ARENA</th>
                        <th>DETAL_LIMO</th>
                        <th>DETAL_ARCILLA</th>
                        <th>DETAL_PESOHUMEDO</th>
                        <th>DETAL_PESOSECO</th>
                        <th>DETAL_POROSIDAD</th>
                        <th>TEXTURA</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($muestras as $muestra)
                        <tr class="muestra-row">
                            <td>{{ $muestra->muest_id }}</td>
                            <td>{{ $muestra->parcela->parc_id }}</td>
                            <td>{{ $muestra->detalles->estru_id }}</td>
                            <td>{{ $muestra->detalles->poros_id }}</td>
                            <td>{{ $muestra->detalles->detal_arena }}</td>
                            <td>{{ $muestra->detalles->detal_limo }}</td>
                            <td>{{ $muestra->detalles->detal_arcilla }}</td>
                            <td>{{ $muestra->detalles->detal_pesohumedo }}</td>
                            <td>{{ $muestra->detalles->detal_pesoseco }}</td>
                            <td>{{ $muestra->detalles->detal_porosidad }}</td>
                            <td>{{ $muestra->detalles->obtenerTextura() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    <script src="{{ asset('js/filter.js') }}"></script>
</body>


</html>
