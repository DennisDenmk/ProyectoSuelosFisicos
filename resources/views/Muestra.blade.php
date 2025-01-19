<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de Muestra</title>
    <link rel="stylesheet" href="../CSS/MuestraDiseño.css">
</head>

<body>

    <header class="header">
            <h2>SOUL MANAGMENT</h2>
            <a href="../HTML/SueloFisico.html" class="btnvol" >Volver</a>
    </header>

    <div class="container">
        <!-- Columna Izquierda -->
        <div class="left-column">
            <h2>Suelo Físico ingreso muestra:</h2>
            <div class="info-box">
                <p><strong>Parcela:</strong> Cubilche p2</p>
                <p><strong>Código:</strong> 25</p>
                <p><strong>Coordenadas:</strong> Cubilche</p>
            </div>
        </div>

        <!-- Columna Derecha -->
        <div class="right-column">
            <h2>Ingrese Datos</h2>
            <form>
                <label for="arcilla">Textura:</label>
                <input type="text" id="arcilla" placeholder="Arcilla: 12%">

                <input type="text" id="limo" placeholder="Limo: 12%">

                <input type="text" id="arena" placeholder="Arena: 12%">

                <label for="peso-humedo">Humedad:</label>
                <input type="text" id="peso-humedo" placeholder="Peso Húmedo: 5.12">

                <input type="text" id="peso-seco" placeholder="Peso Seco: 5.12">

                <input type="text" id="porosidad" placeholder="Porosidad: 0.7">

                <button type="submit" class="action-button">Ingresar</button>
            </form>
        </div>
    </div>
</body>

</html>