<div>
    <div class="container">
        <!-- Panel Izquierdo -->
        <div class="left-panel">
            <div class="container">
                @if ($success)
                    <div class="alert alert-success">
                        {{ $success }}
                    </div>
                @endif

                @if ($error)
                    <div class="alert alert-danger">
                        {{ $error }}
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
    </div>

</div>
