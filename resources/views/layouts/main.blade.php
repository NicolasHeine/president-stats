<html lang="fr-FR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Statistiques Président - @yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    @section('assets')
        @vite('resources/scss/style.scss')
    @show
</head>
<body>
    @yield('main')
    @section('js')
      @vite('resources/js/app.js')
    @show
</body>
</html>
