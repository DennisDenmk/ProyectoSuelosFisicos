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
            <!-- Estru ID -->
            <div class="mb-3">
                <label for="estru_id" class="form-label">Estructura ID</label>
                <input type="text" class="form-control" id="estru_id" name="estru_id" maxlength="5" required>
            </div>
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
            <form action="{{ route('parcelas.create') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tipos_id">Tipo de Suelo</label>
                    <select name="tipos_id" id="tipos_id" class="form-control" required>
                        <option value="" disabled selected>Selecciona un tipo de suelo</option>
                        @foreach ($tiposSuelos as $tipo)
                            <option value="{{ $tipo->tipos_id }}">{{ $tipo->tipos_nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="parc_nombre" class="form-label">Nombre de la Parcela</label>
                    <input type="text" class="form-control" id="parc_nombre" name="parc_nombre" maxlength="50">
                </div>
                <div class="mb-3">
                    <label for="parc_area" class="form-label">Área</label>
                    <input type="number" step="0.01" class="form-control" id="parc_area" name="parc_area"
                        required>
                </div>
                <div class="mb-3">
                    <label for="parc_coord_la" class="form-label">Coordenada Latitude</label>
                    <input type="number" step="0.000001" class="form-control" id="parc_coord_la"
                        name="parc_coord_la" required>
                </div>
                <div class="mb-3">
                    <label for="parc_coord_lo" class="form-label">Coordenada Longitude</label>
                    <input type="number" step="0.000001" class="form-control" id="parc_coord_lo"
                        name="parc_coord_lo" required>
                </div>
                <div class="mb-3">
                    <label for="parc_descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="parc_descripcion" name="parc_descripcion"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Parcela</button>
            </form>

        </div>


</body>

</html>
