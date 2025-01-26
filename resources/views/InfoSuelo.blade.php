<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacion Suelo</title>
    
    <link rel="stylesheet" href="{{ asset('css/InfoSueloDiseño.css') }}">
</head>

<body>

    <header class="header">
        <h2>Informacion Suelo</h2>
        <a href="{{asset('/')}}" class="btnvol">Volver</a>
    </header>

    <div class="container">
        <!-- Columna Izquierda -->
        <div class="left-column">
            <div class="info-box">
                <p>Los suelos físicos se analizan en términos de sus propiedades físicas principales, que influyen en su
                    comportamiento y función:
                    Porosidad:
                    Es el porcentaje del volumen del suelo que está ocupado por poros. Los poros permiten el
                    almacenamiento y movimiento del aire y agua en el suelo. Su tamaño y distribución dependen de la
                    textura y estructura del suelo.
                    Poros grandes (macroporos): Facilitan el drenaje y la aireación.
                    Poros pequeños (microporos): Retienen agua disponible para las plantas.
                    Estructura:
                    Se refiere a la forma en que las partículas del suelo (arena, limo, arcilla) se agrupan formando
                    agregados. La estructura afecta la porosidad, la infiltración de agua, la aireación y el crecimiento
                    de las raíces.
                    Tipos comunes de estructura: Granular, laminar, bloque angular y prismática.
                    La estructura puede ser modificada por actividades humanas como el cultivo o compactación.</p>
            </div>
        </div>

        <!-- Columna Derecha -->
        <div class="right-column">
            <form>
                <img src="{{asset('images/Triangulo.jpeg')}}" alt="Triangulo de Propiedades" width="300" >
            </form>
        </div>
    </div>
</body>

</html>