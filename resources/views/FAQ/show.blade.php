@extends('layouts.app')

@section('title', 'Adicionar Depoimento')
    
@section('content')
    <x-show_container>
        <h2>{{ $testimony->nome }}</h2>
        <p class="role">{{ $testimony->cargo }}</p>

        <h3>Depoimento</h3>
        <p class="testimony-content">
            {{ $testimony->depoimento }}
        </p>

        <div id="show-details-info">
            <p>
                Publicado {{ $created_at }} por Celmira
            </p>
        </div>

    </x-show_container>
@endsection