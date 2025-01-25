<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/RegistroSueloDiseño.css">
    <title>Registro de Muestras</title>

</head>

<body>
    <header class="header">
        <h2>Informacion Suelo</h2>
        <a href="../HTML/SueloFisico.html" class="btnvol">Volver</a>
    </header>

    <div class="container">
        <!-- Panel Izquierdo -->
        <div class="left-panel">
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($parcelas->isEmpty())
                    <p>No tienes parcelas registradas.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Área</th>
                                <th>Coordenadas</th>
                                <th>Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($parcelas as $parcela)
                                <tr>
                                    <td>{{ $parcela->parc_id }}</td>
                                    <td>{{ $parcela->parc_nombre }}</td>
                                    <td>{{ $parcela->parc_area }}</td>
                                    <td>{{ $parcela->parc_coord_la }}, {{ $parcela->parc_coord_lo }}</td>
                                    <td>{{ $parcela->parc_descripcion }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

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
                <!-- Estru ID -->
                <div class="mb-3">
                    <label for="estru_id" class="form-label">Estructura ID</label>
                    <input type="text" class="form-control" id="estru_id" name="estru_id" maxlength="5" required>
                </div>
                <!-- Poros ID -->
                <div class="mb-3">
                    <label for="poros_id" class="form-label">Porosidad ID</label>
                    <input type="text" class="form-control" id="poros_id" name="poros_id" maxlength="5" required>
                </div>
                <!-- Detal Arena -->
                <div class="mb-3">
                    <label for="detal_arena" class="form-label">Porcentaje de Arena</label>
                    <input type="number" class="form-control" id="detal_arena" name="detal_arena" step="0.01"
                        required>
                </div>
                <!-- Detal Limo -->
                <div class="mb-3">
                    <label for="detal_limo" class="form-label">Porcentaje de Limo</label>
                    <input type="number" class="form-control" id="detal_limo" name="detal_limo" step="0.01"
                        required>
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
                    <input type="number" class="form-control" id="detal_pesohumedo" name="detal_pesohumedo"
                        step="0.01" required>
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
                    <input type="number" class="form-control" id="detal_porosidad" name="detal_porosidad"
                        step="0.01" required>
                </div>
                <!-- Botón para enviar -->
                <button type="submit" class="btn btn-primary">Registrar Muestra</button>
            </form>
        </div>

</body>

</html>
