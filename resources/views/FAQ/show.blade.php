@use('App\Helpers\DateHelper')

@extends('layouts.app')
@section('title', 'Detalhes da Pergunta Frequente')
    
@section('content')
    <x-show_container>
        <h2>{{ $question->question }}</h2>
        <div class="barra"></div>
        
        <h3>Resposta</h3>
        <p class="testimony-content">
            {{ $question->response }}
        </p>

        <div id="show-details-info">
            <p>
                Publicado {{ DateHelper::diffForHumans($question?->created_at) }} por {{ 
                            ucfirst($question->user()->first()->name) 
                    }}
            </p>
        </div>

    </x-show_container>
@endsection