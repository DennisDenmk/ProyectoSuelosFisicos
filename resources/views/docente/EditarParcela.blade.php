<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Parcela</title>    
    <link rel="stylesheet" href="{{asset('css/EditarParcela.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header class="header">
        <h2>Editar Parcela</h2>
        <a href="{{ route('parcelas.docente') }}" class="btnvol">Volver</a>
    </header>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: "{{ session('success') }}",
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            let errors = @json($errors->all());
            Swal.fire({
                icon: 'error',
                title: 'Error al procesar',
                html: errors.map(error => <li>${error}</li>).join(''),
            });
        </script>
    @endif

    <div class="container">
        <form action="{{ route('parcelas.actualizar', ['id' => $parcela->parc_id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="parc_nombre" class="form-label">Nombre de la Parcela</label>
                <input type="text" name="parc_nombre" class="form-control" value="{{ $parcela->parc_nombre }}">
            </div>

            <div class="mb-3">
                <label for="parc_area" class="form-label">Área</label>
                <input type="number" name="parc_area" class="form-control" value="{{ $parcela->parc_area }}" required>
            </div>

            <div class="mb-3">
                <label for="parc_coord_la" class="form-label">Coordenada Latitud</label>
                <input type="number" name="parc_coord_la" class="form-control" step="0.01"  value="{{ $parcela->parc_coord_la }}" required>
            </div>

            <div class="mb-3">
                <label for="parc_coord_lo" class="form-label">Coordenada Longitud</label>
                <input type="number" name="parc_coord_lo" class="form-control" step="0.01"  value="{{ $parcela->parc_coord_lo }}" required>
            </div>

            <div class="mb-3">
                <label for="parc_descripcion" class="form-label">Descripción</label>
                <textarea name="parc_descripcion" class="form-control">{{ $parcela->parc_descripcion }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Guardar Cambios</button>
        </form>
    </div>
</body>

</html>
