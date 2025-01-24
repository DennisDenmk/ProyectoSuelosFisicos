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
        <div class="right-panel">
            <form action="{{ route('muestras.create') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="estru_id" class="form-label">ID de Estructura</label>
                    <input type="text" class="form-control" id="estru_id" name="estru_id" maxlength="5" required>
                </div>
                <div class="mb-3">
                    <label for="poros_id" class="form-label">ID de Porosidad</label>
                    <input type="text" class="form-control" id="poros_id" name="poros_id" maxlength="5" required>
                </div>
                <div class="mb-3">
                    <label for="detal_arena" class="form-label">Porcentaje de Arena</label>
                    <input type="number" step="0.01" class="form-control" id="detal_arena" name="detal_arena"
                        required>
                </div>
                <div class="mb-3">
                    <label for="detal_limo" class="form-label">Porcentaje de Limo</label>
                    <input type="number" step="0.01" class="form-control" id="detal_limo" name="detal_limo"
                        required>
                </div>
                <div class="mb-3">
                    <label for="detal_arcilla" class="form-label">Porcentaje de Arcilla</label>
                    <input type="number" step="0.01" class="form-control" id="detal_arcilla" name="detal_arcilla"
                        required>
                </div>
                <div class="mb-3">
                    <label for="detal_pesohumedo" class="form-label">Peso Húmedo</label>
                    <input type="number" step="0.01" class="form-control" id="detal_pesohumedo"
                        name="detal_pesohumedo" required>
                </div>
                <div class="mb-3">
                    <label for="detal_pesoseco" class="form-label">Peso Seco</label>
                    <input type="number" step="0.01" class="form-control" id="detal_pesoseco" name="detal_pesoseco"
                        required>
                </div>
                <div class="mb-3">
                    <label for="detal_porosidad" class="form-label">Porosidad</label>
                    <input type="number" step="0.01" class="form-control" id="detal_porosidad"
                        name="detal_porosidad" required>
                </div>
                <div class="mb-3">
                    <label for="parc_id" class="form-label">ID Parcela</label>
                    <input type="number" class="form-control" id="parc_id" name="parc_id" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Detalles</button>
            </form>
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
                </div>
            </div>

</body>

</html>
