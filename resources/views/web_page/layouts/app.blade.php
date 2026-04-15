<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'QoS Tel')</title>
    <link rel="stylesheet" href="{{ asset('estilos/index.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/company_images/' . $companyInfos['logotipo']->value) }}" type="image/x-icon">

    <!-- Link do fontawesome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Link do Google Font  -->

    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

</head>
<body onload="atualizarAno()" id="corpo">
    <main>
        @yield('content')
    </main>
    <!-- Rodapé -->
    @include('components.page.footer')
    {{-- <footer>
       <div id="redes-sociais">
            <ul>
                <a href="https://www.facebook.com/profile.php?id=100092364702262" target="_blank">
                    <i class="fa-brands fa-facebook"></i>
                </a>

                <a href="#">
                    <i class="fa-brands fa-square-instagram"></i>
                </a>
            </ul>
        </div>
        <h1>QoS Tel</h1>
        <p id="dev">Desenvolvido por: <a href="https://josemarmartins21.github.io/portifolio" target="_blank">Josemar Martins</a></p>
        <p>&copy;<span id="ano"></span> Todos os direitos reservados a QoS Tel</p>
        <p><a href="{{ route('home') }}">Zona Restrita</a></p>
    </footer> --}}
    <script src="{{ asset('scripts/index.js') }}"></script>
</body>
</html>