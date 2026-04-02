{{-- Mensagem de erro! --}}
<div id="error">
    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif
</div>

{{-- Mensagem de sucesso! --}}
<div id="success">
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
</div>

<div id="errors">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
</div>