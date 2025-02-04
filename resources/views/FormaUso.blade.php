<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forma de Uso</title>
    <link rel="stylesheet" href="{{ asset('css/FormaUso.css') }}">
</head>

<body>

    <header class=" header">
        <h2>Forma de Uso</h2>
        <a href="{{ asset('/') }}" class="btnvol">Volver</a>
    </header>

    <div class="container">
        <!-- Columna Derecha -->
        <div class="right-column">
            <p>
            <h2>1. Inicio de Sesión</h2>
            <p> El usuario accede al sistema ingresando su correo electrónico y contraseña.
                Opción de recuperar contraseña en caso de olvido.</p>
            </p>
            </p>

            <p>
            <h2>2. Panel Principal</h2>
            <p>Acceso a distintas secciones:</p>
            <p>Ver Muestras (para analizar datos del suelo).</p>
            <p>Ver Perfil (para gestionar información personal).</p>
            <p>Ver Parcelas (para gestionar las parcelas registradas).</p>
            </p>

            <p>
            <h2>3. Registro de una Nueva Parcela</h2>
            <p>Acceder a la opción "Registrar Parcela".</p>
            <p>Ingresar los siguientes datos:</p>
            <p>Nombre de la Parcela.</p>
            <p> Área en metros cuadrados.</p>
            <p>Latitud y longitud.</p>
            <p>Descripción opcional del terreno.</p>
            <p>Confirmar y guardar la información.</p>
            </p>

            <p>
            <h2>4. Registro de Muestras de Suelo</h2>
            <p>Acceder a la opción "Agregar Muestra".</p>
            <p>Seleccionar una parcela previamente registrada.</p>
            <p>Ingresar datos de la muestra:</p>
            <p>Estructura del suelo (granular, prismática, etc.).</p>
            <p>Porosidad (macroporos o microporos).</p>
            <p>Composición del suelo (% de arena, limo y arcilla).</p>
            <p>Peso húmedo y seco.</p>
            <p>Fecha de registro.</p>
            <p>Guardar la muestra.</p>
            </p>

            <p>
            <h2>5.Gestión de Datos</h2>
            <p>Buscar parcelas y muestras.</p>
            <p>Actualizar datos en el perfil.</p>
            </p>
        </div>
    </div>

</body>

</html>
