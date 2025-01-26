<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Parcelas</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEJv3p9Fjk9a5a1km3sfxTgG1QfbbV54SZQZnauKz6M4r9zSg9T/3uxhPL2M9" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
        

</head>

<body>
    <x-navigation />
   

        @if (session('success'))
            <div class="alert alert-success mt-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <!-- Agregar el script de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-KyZXEJv3p9Fjk9a5a1km3sfxTgG1QfbbV54SZQZnauKz6M4r9zSg9T/3uxhPL2M9" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener('click', function(event) {
            const dropdownButton = document.querySelector('button[aria-haspopup="true"]');
            const dropdownMenu = dropdownButton.nextElementSibling;

            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>

</body>

</html>
