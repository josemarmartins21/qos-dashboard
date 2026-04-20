@use('Illuminate\Support\Facades\Auth')


@extends('layouts.app')
@section('title', 'Adicionar Depoimento')
    
@section('content')
    <x-show_container>
        <h2>{{ $testimony->nome }}</h2>
        <p class="role">Cargo de {{ $testimony->cargo }}</p>
        <div class="barra"></div>
        <h3>Depoimento</h3>
        <p class="testimony-content">
            {{ $testimony->depoimento }}
        </p>

        <div id="show-details-info">
            <p>
                Publicado {{ $created_at }} por {{ Auth::user()->name }}
            </p>
        </div>

    </x-show_container>
@endsection