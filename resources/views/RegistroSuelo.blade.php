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
            <label for="sampleSelect">Seleccione una Muestra:</label>
            <select id="sampleSelect" onchange="updateInfo()">
                <option value="muestra1">Muestra 1</option>
                <option value="muestra2">Muestra 2</option>
                <option value="muestra3">Muestra 3</option>
            </select>
        </div>

        <!-- Panel Derecho -->
        <div class="right-panel">
            <h2>Información de la Muestra</h2>
            <div class="data-grid">
                <div>Textura:</div>
                <div id="texture">-</div>
                <div>Arcilla:</div>
                <div id="clay">-</div>
                <div>Limo:</div>
                <div id="silt">-</div>
                <div>Arena:</div>
                <div id="sand">-</div>
                <div>Humedad:</div>
                <div id="moisture">-</div>
                <div>Peso Húmedo:</div>
                <div id="wetWeight">-</div>
                <div>Peso Seco:</div>
                <div id="dryWeight">-</div>
                <div>Porosidad:</div>
                <div id="porosity">-</div>
            </div>
            <div class="texture-image">
                <img id="textureImage" src="" alt="Imagen de textura">
                <p id="description">Seleccione una muestra para ver la información.</p>
            </div>
        </div>
    </div>
    <script src="../script/RegistroSueloScript.js"></script>
</body>

</html>