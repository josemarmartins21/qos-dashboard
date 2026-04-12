<h2>Dempoimento de clientes</h2>
@foreach ($querys['testimonies'] as $testimony)
    <div class="depoimento">
        <div>
            <h4>{{ $testimony->name }}</h4>
        </div>

        <p>
            {{ $testimony->testimony }}
        </p>
    </div>
@endforeach
