<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Erro interno no servidor</title>
    <link rel="stylesheet" href="{{ asset('errors.css') }}">
</head>
<body>
    <main>
        <h1>500</h1>
        <p>Eita! Essa página deu um erro 500 daqueles, vamos solucionar já já...</p>
        <a href="{{ route('home') }}">Voltar a página inicial</a>
    </main>
</body>
</html>
