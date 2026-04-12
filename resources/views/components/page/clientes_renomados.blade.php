<div class="fundo-preto-2">
<h2>Nossos Clientes</h2>
<div id="logos-container">
    @foreach ($querys['clientes_renomados'] as $client)
        <img src="{{ asset('images/logos_client/'. $client->image) }}" alt="{{ $client->name }}" class="logo-empresa">
    @endforeach
</div>
</div>