<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Vue</title>

    <link rel="stylesheet" href="{{ url(mix('/assets/css/style.css')) }}">
</head>
<body>

    <div id="app" class="container mt-5">
        @yield('content')
    </div>

    <script src="{{ url(mix('/assets/js/app.js')) }}"></script>
</body>
</html>
