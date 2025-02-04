<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soil Management</title>
    <link rel="stylesheet" href="{{ asset('css/PrimeraPag.css') }}">
</head>

<body>
    <header>
        <div class="Superior">
            <div class="titulo">
                <h1>SOILD MANAGEMENT</h1>
            </div>
        </div>

        <div class="menu">
            <div class="menuDes">
                <nav>
                    <ul>
                        <li><a href="#">Menu</a>
                            <ul>
                                <li><a href="{{ url('login') }}">Fisico</a></li>
                                <li><a href="https://sistema-gestionsuelos-biologica.onrender.com">Quimico</a></li>
                                <li><a href="#">Biológico</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Informacion</a>
                            <ul>
                                <li><a href="{{ url('/Informacion') }}">Propiedades Suelo</a></li>
                                <li><a href="{{ url('/Vision') }}">Vision</a></li>
                                <li><a href="{{ url('/Mision') }}">Mision</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ url('/FormaUso') }}">Forma de Uso</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <div class="content">
        <img src="{{ asset('images/Planta.png') }}" alt="Main Image" class="main-image">
        <div class="text">
            <p>
                La gestión de suelos es el conjunto de prácticas, estrategias y decisiones orientadas a garantizar el
                uso
                sostenible, productivo y eficiente del suelo, minimizando la degradación y conservando sus funciones
                ecológicas, económicas y sociales. El suelo es un recurso natural no renovable a escala humana, esencial
                para la producción de alimentos, la regulación de los ciclos hídricos y la biodiversidad, por lo que su
                manejo adecuado es clave para la sostenibilidad.
                <br>
                Objetivos de la gestión de suelos:
                <br>
                1.-Conservación del recurso: Prevenir la erosión, la pérdida de nutrientes, la salinización y otras
                formas
                de degradación.
                <br>
                2.-Aumento de la productividad: Optimizar el uso del suelo para la agricultura, la silvicultura o la
                ganadería, asegurando rendimientos sostenibles.
                <br>
                3.-Protección ambiental: Evitar la contaminación del suelo por agroquímicos, desechos industriales y
                otros
                contaminantes.
                <br>
                4.-Mitigación del cambio climático: Promover prácticas que incrementen el almacenamiento de carbono en
                el
                suelo y reduzcan las emisiones de gases de efecto invernadero.
            </p>
        </div>
    </div>

    <footer>
        <div class="footer-content">
            <h3>Contactos:</h3>
            <div class="contacts">
                <p>Jurado Oskar- 09 89 111 235</p>
                <p>Mejia Dennis- 09 98 724 2851</p>
                <p>Ramos David- 09 98 335 037</p>
                <p>Rueda Carlos- 09 59 102 450</p>
            </div>
            <div class="emails">
                <p>opjuradoa@utn.edu.ec</p>
                <p>damejiaj@utn.edu.ec</p>
                <p>fdramosm@utn.edu.ec</p>
                <p>crruedaf@utn.edu.ec</p>
            </div>
        </div>
    </footer>
</body>

</html>
