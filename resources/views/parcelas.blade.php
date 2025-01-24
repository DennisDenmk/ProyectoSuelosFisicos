<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Parcelas</title>
</head>

<body>
    <form action="{{ route('parcelas.create') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="cons_id" class="form-label">CONS ID</label>
            <input type="number" class="form-control" id="cons_id" name="cons_id" value="1" required>
        </div>
        <div class="mb-3">
            <label for="tipos_id" class="form-label">TIPOS ID</label>
            <input type="text" class="form-control" id="tipos_id" name="tipos_id" maxlength="5" required>
        </div>
        <div class="mb-3">
            <label for="parc_nombre" class="form-label">Nombre de la Parcela</label>
            <input type="text" class="form-control" id="parc_nombre" name="parc_nombre" maxlength="50">
        </div>
        <div class="mb-3">
            <label for="parc_area" class="form-label">Área</label>
            <input type="number" step="0.01" class="form-control" id="parc_area" name="parc_area" required>
        </div>
        <div class="mb-3">
            <label for="parc_coord_la" class="form-label">Coordenada Latitude</label>
            <input type="number" step="0.000001" class="form-control" id="parc_coord_la" name="parc_coord_la" required>
        </div>
        <div class="mb-3">
            <label for="parc_coord_lo" class="form-label">Coordenada Longitude</label>
            <input type="number" step="0.000001" class="form-control" id="parc_coord_lo" name="parc_coord_lo" required>
        </div>
        <div class="mb-3">
            <label for="parc_descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="parc_descripcion" name="parc_descripcion"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Parcela</button>
    </form>

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

    <form action="{{ url('/RegistroMuestra') }}" method="GET">
        <button type="submit" class="btn btn-primary">Ir a Registro</button>
    </form>
    

</body>

</html>
