@use('App\Helpers\DateHelper')
@extends('layouts.app')

@section('title', 'Mensagem de ' . $message->visitor->full_name)
    
@section('content')
    <x-show_container>
        <div id="message-container">
            <h2>Lorem, ipsum.</h2>
            <div class="barra"></div>
            <p class="body">
                {{ $message->body }}
            </p>
            <div id="details">
                <p>
                    Enviada por {{ $message->visitor->full_name }} {{ DateHelper::diffForHumans($message->created_at) }}
                </p>
            </div>
        </div>
    </x-show_container>
@endsection