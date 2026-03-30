<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste</title>
</head>
<style>
    div {
        margin-bottom: 10px;
    }
</style>
<body>
    <h1>Teste Mensagem</h1>
    <form action="{{ route('visitors.store') }}" method="post">
        @csrf
            <div>
                <label for="full_name">Nome</label>
                <input type="text" name="full_name" value="{{ old('full_name', 'Josemar Martins') }}" >
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email', 'Josemarburguel@gmail.com') }}" >
            </div>
            <div>
                <label for="phone">Telefone</label>
                <input type="tel" name="phone" value="{{ old('phone', '930710346') }}" >
            </div>
            <div>
                <label for="subject">Assunto</label>
                <select name="subject" id="">
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}"> {{ $subject->subject }} </option>
                    @endforeach
                </select>
            </div>

            <div>
                <textarea name="body" id="" cols="50" rows="10">
                        {{ old('body', 'test etes') }}
                </textarea>
            </div>

            <button>
                enviar
            </button>
    </form>
</body>
</html>