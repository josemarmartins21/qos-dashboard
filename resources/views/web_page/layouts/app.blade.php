<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'QoS Tel')</title>
    <link rel="stylesheet" href="{{ asset('estilos/index.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/company_images/' . $companyInfos['logotipo']?->value) }}" type="image/x-icon">

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
    <script src="{{ asset('scripts/index.js') }}"></script>
</body>
</html>