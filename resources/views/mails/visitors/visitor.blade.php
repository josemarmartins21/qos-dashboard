<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QoS Tel</title>
</head>
<body>
    <hr>
    <h2>Dados do visitante</h2>
    <ul>
        <li>Nome: {{ $visitor->full_name }} </li>
        <li>Telefone: {{ $visitor->phone }} </li>
        <li>Email: {{ $visitor->email }} </li>
    </ul>
</body>
</html>