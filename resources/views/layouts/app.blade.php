<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="shortcut icon" href="favicon.svg" type="image/svg">
    <script src="https://kit.fontawesome.com/8e770ce0b4.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div id="logo-container">
            <a href="#">
                <img src="{{ asset('imagens/qos-logo-sem-fundo.png') }}" alt="Logo da QoS Tel">
            </a>
        </div>


        <div id="menu-hamburguer">
            <i class="fa-solid fa-bars"></i>
        </div>

        <nav id="menu">
            <ul>
                <li><a href="#">Lorem ipsum dolor sit.</a></li>
                <li><a href="#">Lorem ipsum dolor sit.</a></li>
                <li><a href="#">Lorem ipsum dolor sit.</a></li>
                <li><a href="#">Lorem ipsum dolor sit.</a></li>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main> 
    <script src="scripts/script.js"></script>
</body>
</html>