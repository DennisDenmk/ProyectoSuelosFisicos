<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de Muestra</title>
    <link rel="stylesheet" href="{{ asset('css/MuestraDiseno.css') }}">
    <script src="{{ asset('js/validaciones.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
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
                    html: errors.map(error => `<li>${error}</li>`).join(''),
                });
            </script>
        @endif

    <header class="header">
    <h2>SOUL MANAGMENT</h2>
    <a href="{{ route('parcelas') }}" class="btnvol">Volver</a>
    </header>

    <div class="container">
        <!-- Columna Izquierda -->
        <div class="left-column">
            <h2>Datos de Parcela:</h2>
            <div class="info-box">
                <p><strong>Parcela:</strong>{{ $parcela->parc_nombre }}</p>
                <p><strong>Código:</strong> {{ $parcela->parc_id }}</p>
                <p><strong>Coordenadas:</strong> Cubilche</p>
                <p><strong>Descripcion:</strong>{{ $parcela->parc_descripcion }}</p>
            </div>
        </div>

        <!-- Columna Derecha -->
        <div class="right-column">
            <form action="{{ route('muestras.create') }}" method="POST" class="mb-5">
                @csrf

                <!-- Parcela ID -->
                <input type="hidden" name="parc_id" value="{{ $parcela->parc_id }}">

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
                        <input type="number" class="form-control" id="detal_arena" name="detal_arena" step="1"
                            required>
                    </div>
                    <div class="col-md-4">
                        <label for="detal_limo" class="form-label">Porcentaje de Limo</label>
                        <input type="number" class="form-control" id="detal_limo" name="detal_limo" step="1"
                            required>
                    </div>
                    <div class="col-md-4">
                        <label for="detal_arcilla" class="form-label">Porcentaje de Arcilla</label>
                        <input type="number" class="form-control" id="detal_arcilla" name="detal_arcilla"
                            step="1" required>
                    </div>
                </div>
                <div id="warning-message" style="display:none; color: red; margin-top: 10px;">
                    <strong>La suma de los porcentajes debe ser 100.</strong>
                </div>

                <!-- Peso y porosidad -->
                <div class="row g-3 mt-3">
                    <div class="col-md-4">
                        <label for="detal_pesohumedo" class="form-label">Peso Húmedo</label>
                        <input type="number" class="form-control" id="detal_pesohumedo" name="detal_pesohumedo"
                            step="0.01" required>
                    </div>
                    <div class="col-md-4">
                        <label for="detal_pesoseco" class="form-label">Peso Seco</label>
                        <input type="number" class="form-control" id="detal_pesoseco" name="detal_pesoseco"
                            step="0.01" required>
                    </div>
                    <div class="col-md-4">
                        <label for="detal_porosidad" class="form-label">Porosidad</label>
                        <input type="number" class="form-control" id="detal_porosidad" name="detal_porosidad"
                            step="0.01" required>
                    </div>
                </div>

                <!-- Botón -->
                <div class="mt-4">
                    <button type="submit" class="btn">Registrar Muestra</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        // Function to check if the sum equals 100
        function checkSum() {
            const arena = parseFloat(document.getElementById("detal_arena").value) || 0;
            const limo = parseFloat(document.getElementById("detal_limo").value) || 0;
            const arcilla = parseFloat(document.getElementById("detal_arcilla").value) || 0;
    
            const total = arena + limo + arcilla;
    
            // Show warning if sum is not 100, hide warning if sum is 100
            const warningMessage = document.getElementById("warning-message");
            if (total !== 100) {
                warningMessage.style.display = "block";  // Show warning
                return false;
            } else {
                warningMessage.style.display = "none";  // Hide warning
            }
    
            return true;
        }
    
        // Add event listeners to check the sum when the inputs change
        document.getElementById("detal_arena").addEventListener("input", checkSum);
        document.getElementById("detal_limo").addEventListener("input", checkSum);
        document.getElementById("detal_arcilla").addEventListener("input", checkSum);
    
        // Check the sum before form submission
        const form = document.querySelector("form");
        form.addEventListener("submit", function(event) {
            if (!checkSum()) {
                event.preventDefault();  // Prevent form submission if the sum is not 100
            }
        });
    </script>
    </body>

</html>
