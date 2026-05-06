{{-- Mensagem de erro! --}}
<div  class="error-messages">
    @if (session('error'))
        <p id="error">{{ session('error') }}</p>
    @endif
</div>

{{-- Mensagem de sucesso! --}}
<div class="error-messages">
    @if (session('success'))
        <p id="success">{{ session('success') }}</p>
    @endif
</div>