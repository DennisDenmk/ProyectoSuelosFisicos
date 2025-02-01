<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcelas</title>
    <link rel="stylesheet" href="../CSS/ParcelasInvestigador.css">
</head>

<body>

    <header class="header">
        <h2>Parcelas</h2>
        <a href="{{url('/Docente')}}" class="btnvol">Volver</a>
    </header>

    <div class="table-container">
        <!-- Tabla de Parcelas -->
        @if ($parcelas->isEmpty())
        <p class="text-muted">No tienes parcelas registradas.</p>
        @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Área</th>
                    <th>Coordenadas</th>
                    <th>Descripción</th>
                    <th>Muestras</th>
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
</body>

</html>