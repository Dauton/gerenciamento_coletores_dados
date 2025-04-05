<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gerenciamento de colteres de dados</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">

</head>

<body>
    <main class="principal">
        <?php
        if ($_SERVER['REQUEST_URI'] !== '/') : ?>
            @include('layouts.cabecalho-mobile')
        <?php endif ?>
        @yield('content')
        @include('layouts.alerts')
    </main>

    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>