<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suelo Físico</title>
    <link rel="stylesheet" href="{{ asset('css/SesionUsuario.css') }}">
</head>

<body>

    <header>
        <h1>Suelo Físico</h1>
    </header>

    <main>
        <div class="card-container">
            <div class="card">
                <img src="{{ asset('images/User.png') }}" alt="Perfil">
                <a href="{{ url('/Estudiante/Perfil') }}" class="btn">Ver Perfil</a>
            </div>
            <div class="card">
                <img src="{{ asset('images/Plots.png') }}" alt="Parcelas">
                <a href="{{ url('/ParcelasEstudiante') }}" class="btn">Ver Parcelas</a>
            </div>
            <div class="card">
                <img src="{{ asset('images/World.png') }}" alt="Muestras">
                <a href="{{ url('/MuestrasEstudiante') }}" class="btn">Ver Muestras</a>
            </div>
            <div class="card">
                <img src="{{ asset('images/out.png') }}" alt="Salir">
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button class="btn">Salir</button>
                </form>
            </div>
        </div>
    </main>

</body>
</html>