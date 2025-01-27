<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Parcelas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.1/dist/minty/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navegación -->
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <form action="{{ route('parcelas') }}" method="GET">
                <button type="submit" class="btn btn-primary">
                    Volver
                </button>
            </form>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">

                <!-- Tabla de Parcelas -->
                @if ($parcelas->isEmpty())
                    <p class="text-muted">No tienes parcelas registradas.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
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
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
