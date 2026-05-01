@use('Illuminate\Support\Facades\Auth')
@use('App\Helpers\DateHelper')

@php
    $user = Auth::user();
@endphp
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="/estilos/style.css">

    <link rel="shortcut icon" href="favicon.svg" type="image/svg">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

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
            <img src="{{ asset('images/users/' . $user->image) }}" alt="{{ $user->name }}" class="foto">
            <h1>
                <a href="{{ route('users.show', ['user' => $user->id]) }}">{{ $user->name }}</a>
            </h1>
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