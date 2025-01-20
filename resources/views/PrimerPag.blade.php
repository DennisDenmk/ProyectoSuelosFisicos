<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soil Management</title>
    <link rel="stylesheet" href="{{ asset('css/PrimeraPagDiseño.css')}}">
</head>

<body>
    <header class="navbar">
        <h1>SOIL MANAGEMENT</h1>
        <nav>
            <ul>
                <li><a href="{{route('login')}}">Suelo Físico</a></li>
                <li><a href="#">Suelo Químico</a></li>
                <li><a href="#">Suelo Biológico</a></li>
                <li><a href="{{route('login')}}">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <div class="centro">
        <img src="{{asset('images/Planta.png')}}" alt="Hands holding soil with a plant" class="main-image">
    </div>
</body>

</html>