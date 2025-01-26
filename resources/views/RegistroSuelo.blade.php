<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registro de Muestras</title>

</head>

<body>
    <header class="header">
        <h2>Informacion Suelo</h2>
        <a href="../HTML/SueloFisico.html" class="btnvol">Volver</a>
    </header>
    <x-parcelas-table :parcelas="$parcelas" :success="session('success')" :error="session('error')" />

    <!-- Panel Derecho -->
    <div class="container mt-5">
        <h2>Registro de Muestras</h2>
        <!-- Mostrar mensajes de éxito o error -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario -->
        <form action="{{ route('muestras.create') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="parc_id" class="form-label">Parcela ID</label>
                <input type="number" class="form-control" id="parc_id" name="parc_id" required>
            </div>
            <label for="estru_id">Tipo de Suelo</label>
            <select name="estru_id" id="estru_id" class="form-control" required>
                <option value="" disabled selected>Selecciona un tipo de suelo</option>
                @foreach ($estructura as $estru)
                    <option value="{{ $estru->estru_id }}">{{ $estru->estru_descripcion }}</option>
                @endforeach
            </select>
            <!-- Detal Arena -->
            <div class="mb-3">
                <label for="detal_arena" class="form-label">Porcentaje de Arena</label>
                <input type="number" class="form-control" id="detal_arena" name="detal_arena" step="0.01" required>
            </div>
            <!-- Detal Limo -->
            <div class="mb-3">
                <label for="detal_limo" class="form-label">Porcentaje de Limo</label>
                <input type="number" class="form-control" id="detal_limo" name="detal_limo" step="0.01" required>
            </div>
            <!-- Detal Arcilla -->
            <div class="mb-3">
                <label for="detal_arcilla" class="form-label">Porcentaje de Arcilla</label>
                <input type="number" class="form-control" id="detal_arcilla" name="detal_arcilla" step="0.01"
                    required>
            </div>
            <!-- Detal Peso Húmedo -->
            <div class="mb-3">
                <label for="detal_pesohumedo" class="form-label">Peso Húmedo</label>
                <input type="number" class="form-control" id="detal_pesohumedo" name="detal_pesohumedo" step="0.01"
                    required>
            </div>
            <!-- Detal Peso Seco -->
            <div class="mb-3">
                <label for="detal_pesoseco" class="form-label">Peso Seco</label>
                <input type="number" class="form-control" id="detal_pesoseco" name="detal_pesoseco" step="0.01"
                    required>
            </div>
            <!-- Detal Porosidad -->
            <div class="mb-3">
                <label for="detal_porosidad" class="form-label">Porosidad</label>
                <input type="number" class="form-control" id="detal_porosidad" name="detal_porosidad" step="0.01"
                    required>
            </div>
            <!-- Botón para enviar -->
            <button type="submit" class="btn btn-primary">Registrar Muestra</button>
        </form>
        <div class="container mt-4">
            <h2 class="mb-4">Registrar Parcela</h2>
            <form action="{{ route('parcelas.crear') }}" method="POST">
                @csrf
                <div>
                    <label>Tipo de Suelo</label>
                    <select name="tipos_id" required>
                        <option value="" disabled selected>Selecciona un tipo de suelo</option>
                        @foreach ($tiposSuelos as $tipo)
                            <option value="{{ $tipo->tipos_id }}">{{ $tipo->tipos_nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Nombre Parcela</label>
                    <input type="text" name="parc_nombre" maxlength="50">
                </div>

                <div>
                    <label>Área</label>
                    <input type="number" name="parc_area" step="0.01" required>
                </div>

                <div>
                    <label>Coordenada Latitud</label>
                    <input type="number" name="parc_coord_la" step="0.000001" required>
                </div>

                <div>
                    <label>Coordenada Longitud</label>
                    <input type="number" name="parc_coord_lo" step="0.000001" required>
                </div>

                <div>
                    <label>Descripción</label>
                    <textarea name="parc_descripcion"></textarea>
                </div>

                <button type="submit">Crear Parcela</button>
            </form>

        </div>


</body>

</html>
