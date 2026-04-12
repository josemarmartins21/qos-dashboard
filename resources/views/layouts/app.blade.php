@use('Illuminate\Support\Facades\Auth')
@use('App\Helpers\DateHelper')
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/estilos/style.css">
    <link rel="shortcut icon" href="favicon.svg" type="image/svg">
    <script src="https://kit.fontawesome.com/8e770ce0b4.js" crossorigin="anonymous"></script>
    @vite(['resources/js/app.js'])
</head>
<body>
    <header>
        <div id="logo-container">
            <a href="{{ route('home') }}">
                <img src="{{ asset('imagens/qos-logo-sem-fundo.png') }}" alt="Logo da QoS Tel">
            </a>
        </div>


        <div id="menu-hamburguer">
            <i class="fa-solid fa-bars" id="menu"></i>
        </div>

        <nav id="menu-container" class="esconder">
           @include('components.nav_dashboard')
        </nav>
        <div class="current-date">
             <p>{{ DateHelper::currentExtendedDate() }}</p> 
        </div>
    </header>
    <main>
        <section id="ficha">
            <img src="{{ asset('imagens/guanabara-perfil.jpeg') }}" alt="Josemar Martins" class="foto">
            <h1>{{ Auth::user()->name }}</h1>
            <div id="pages-container">
               @include('components.nav_dashboard')
            </div>
        </section>
        @yield('content')
    </main> 
    <x-float_btn />
    <script src="{{ asset('scripts/script.js') }}"></script>
</body>
</html>