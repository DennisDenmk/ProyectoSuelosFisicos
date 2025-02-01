<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Parcelas</title>
    <link rel="stylesheet" href="../CSS/ResgitrarParcelas.css">
</head>

<body>

    <header class="header">
        <h2>Registrar Parcelas</h2>
        <a href="{{url('/Docente')}}" class="btnvol">Volver</a>
    </header>

    <div class="container">
        <!-- Columna Derecha -->
        <div class="right-column">

            <form action="{{ route('parcelas.crear') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Tipo Suelo:</label>
                    <br>
                    <select name="tipos_id" id="tipos_id" class="Parcelas" required>
                        <option value="" disabled selected>Selecciona un tipo de suelo</option>
                        @foreach ($tiposSuelos as $tipo)
                            <option value="{{ $tipo->tipos_id }}">{{ $tipo->tipos_nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Nombre Parcela:</label>
                    <br>
                    <input type="text" name="parc_nombre" id="parc_nombre" class="form-control" maxlength="50">
                </div>

                <div class="form-group">
                    <label>Area:</label>
                    <br>
                    <input type="number" name="parc_area" id="parc_area" class="form-control" step="0.01" required>
                </div>

                <div class="form-group">
                    <label>Coordenadas Latitud:</label>
                    <br>
                    <input type="number" name="parc_coord_la" id="parc_coord_la" class="form-control" step="0.000001" required>
                </div>

                <div class="form-group">
                    <label>Coordenadas Longitud:</label>
                    <br>
                    <input type="number" name="parc_coord_lo" id="parc_coord_lo" class="form-control" step="0.000001" required>
                </div>

                <div class="form-group">
                    <label>Descripción:</label>
                    <br>
                    <textarea name="parc_descripcion" id="parc_descripcion" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn">Registrar Parcela</button>
            </form>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>

</body>

</html>