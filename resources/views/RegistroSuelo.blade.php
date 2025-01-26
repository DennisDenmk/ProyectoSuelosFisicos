<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Muestras</title>

    <!-- Enlace al CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <x-navigation />
    <div class="container">
        <h2 class="mb-4">Registro de Muestras</h2>

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

        <!-- Formulario para registrar muestra -->
        <form action="{{ route('muestras.create') }}" method="POST" class="mb-5">
            @csrf

            <!-- Parcela ID -->
            <div class="mb-3">
                <label for="parc_id" class="form-label">Parcela ID</label>
                <input type="number" class="form-control" id="parc_id" name="parc_id" required>
            </div>

            <!-- Tipo de Suelo -->
            <div class="mb-3">
                <label for="estru_id" class="form-label">Tipo de Suelo</label>
                <select name="estru_id" id="estru_id" class="form-select" required>
                    <option value="" disabled selected>Selecciona un tipo de suelo</option>
                    @foreach ($estructura as $estru)
                        <option value="{{ $estru->estru_id }}">{{ $estru->estru_descripcion }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Campos de detalle -->
            <div class="row g-3">
                <div class="col-md-4">
                    <label for="detal_arena" class="form-label">Porcentaje de Arena</label>
                    <input type="number" class="form-control" id="detal_arena" name="detal_arena" step="0.01" required>
                </div>
                <div class="col-md-4">
                    <label for="detal_limo" class="form-label">Porcentaje de Limo</label>
                    <input type="number" class="form-control" id="detal_limo" name="detal_limo" step="0.01" required>
                </div>
                <div class="col-md-4">
                    <label for="detal_arcilla" class="form-label">Porcentaje de Arcilla</label>
                    <input type="number" class="form-control" id="detal_arcilla" name="detal_arcilla" step="0.01" required>
                </div>
            </div>

            <!-- Peso y porosidad -->
            <div class="row g-3 mt-3">
                <div class="col-md-4">
                    <label for="detal_pesohumedo" class="form-label">Peso Húmedo</label>
                    <input type="number" class="form-control" id="detal_pesohumedo" name="detal_pesohumedo" step="0.01" required>
                </div>
                <div class="col-md-4">
                    <label for="detal_pesoseco" class="form-label">Peso Seco</label>
                    <input type="number" class="form-control" id="detal_pesoseco" name="detal_pesoseco" step="0.01" required>
                </div>
                <div class="col-md-4">
                    <label for="detal_porosidad" class="form-label">Porosidad</label>
                    <input type="number" class="form-control" id="detal_porosidad" name="detal_porosidad" step="0.01" required>
                </div>
            </div>

            <!-- Botón -->
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Registrar Muestra</button>
            </div>
        </form>

        <!-- Formulario para registrar parcela -->
        <h2 class="mb-4">Registrar Parcela</h2>
        <form action="{{ route('parcelas.crear') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="tipos_id" class="form-label">Tipo de Suelo</label>
                <select name="tipos_id" id="tipos_id" class="form-select" required>
                    <option value="" disabled selected>Selecciona un tipo de suelo</option>
                    @foreach ($tiposSuelos as $tipo)
                        <option value="{{ $tipo->tipos_id }}">{{ $tipo->tipos_nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="parc_nombre" class="form-label">Nombre Parcela</label>
                <input type="text" name="parc_nombre" id="parc_nombre" class="form-control" maxlength="50">
            </div>

            <div class="mb-3">
                <label for="parc_area" class="form-label">Área</label>
                <input type="number" name="parc_area" id="parc_area" class="form-control" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="parc_coord_la" class="form-label">Coordenada Latitud</label>
                <input type="number" name="parc_coord_la" id="parc_coord_la" class="form-control" step="0.000001" required>
            </div>

            <div class="mb-3">
                <label for="parc_coord_lo" class="form-label">Coordenada Longitud</label>
                <input type="number" name="parc_coord_lo" id="parc_coord_lo" class="form-control" step="0.000001" required>
            </div>

            <div class="mb-3">
                <label for="parc_descripcion" class="form-label">Descripción</label>
                <textarea name="parc_descripcion" id="parc_descripcion" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Crear Parcela</button>
        </form>
    </div>

    <!-- Enlace al JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
