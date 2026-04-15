@use('Illuminate\Support\Facades\Auth')

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página não encontrada</title>
    <link rel="stylesheet" href="{{ asset('estilos/errors.css') }}">
</head>
<body>
    <main>
        <h1>404</h1>
        <p>Eita! Essa página deu um 404 daqueles...</p>
        <p>Mas não se preocupe, às vezes até os melhores desenvolvedores se perdem no código!</p>
        <a href="{{ route('home') }}" class="back">Voltar a página inicial</a>
    </main>
</body>
</html>
