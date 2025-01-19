<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suelo Fisico</title>
    <link rel="stylesheet" href="../CSS/SueloFisicoDiseño.css">
</head>

<body>
    <header>
        <div class="Superior">
            <div class="titulo">
                <h1>Suelo Fisico</h1>
            </div>
        </div>

        <div class="menu">
            <div class="menuDes">
                <nav>
                    <ul>
                        <li><a href="#">☰</a>
                            <ul>
                                <li><a href="{{route('home')}}">Menu Principal</a></li>
                                <li><a href="#">Quimico</a></li>
                                <li><a href="#">Biológico</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Informacion</a></li>
                        <li><a href="#">Forma de Uso</a></li>
                        <li><a href="#">Contactos</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <div class="content">
            <!-- Contenedor de dos columnas -->
            <div class="columns">
                <!-- Columna izquierda -->
                <div class="left-column">
                    <select class="select-box">
                        <option>Seleccione una Parcela</option>
                    </select>
                    <a href="../HTML/Muestra.html" class="action-button">Ingresar Muestra</a>

                </div>
                <!-- Columna derecha -->
                <div class="right-column">
                    <img src="{{asset('images/Muestras.png')}}" alt="Muestras de suelo" class="soil-image">
                    <button class="action-button">Registro de Muestras</button>

                </div>
            </div>
        </div>
    </main>

</body>

</html>